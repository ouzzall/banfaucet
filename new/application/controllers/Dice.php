<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dice extends Member_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->data['settings']['dice_status'] != 'on') {
            return redirect(site_url('dashboard'));
        }
        $this->load->helper('string');
        $this->load->model('m_dice');
        checkDailyBonus($this->data['user']);
    }

    private function generateRoll()
    {
        $game = [
            'salt' => bin2hex(openssl_random_pseudo_bytes(32)),
            'luckyNumber' => mt_rand(0, 10000)
        ];
        $game['percent'] = $game['luckyNumber'] / 100;
        $game['proof'] = sha1($game['salt'] . '+' . $game['percent']);
        return $game;
    }
    public function index()
    {
        $this->data['page'] = 'Dice';
        $game = $this->generateRoll();
        $this->m_dice->insertHistory($this->data['user']['id'], $game['salt'], $game['percent']);

        $this->data['proof'] = $game['proof'];
        $this->data['history'] = $this->m_dice->getHistory($this->data['user']['id']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
        $this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
	  $this->render('dice', $this->data);
    }
    public function roll()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('betAmount', 'Amount', 'trim|required|is_numeric');
        $this->form_validation->set_rules('multiplier', 'Multiplier', 'trim|required|is_numeric');

        $result = [
            'status' => 'false'
        ];
        if ($this->form_validation->run() == FALSE) {
            $result['status'] = 'false';
            $result['message'] = 'An error has occurred';
            echo json_encode($result);
            die();
        }

        $rollType = $this->input->post('rollType');
        $betAmount = $this->input->post('betAmount') * $this->data['settings']['currency_rate'];
        $probability = $this->input->post('multiplier');
        $betAmount = filter_var($betAmount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $probability = filter_var($probability, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        $multi = 100 / $probability;
        $multiReal = $multi - $this->data['settings']['house_edge'] / 100;
        $grossProfit = $betAmount * $multiReal;
        $netProfit = format_money($grossProfit - $betAmount);

        $amount = 0;

        if ($betAmount > $this->data['user']['balance']) {
            $result['message'] = "Insufficient Funds";
            echo json_encode($result);
            die();
        } else if ($probability > 97 || $probability < 2) {
            $result['message'] = "Win Chance must be between 2 - 97";
            echo json_encode($result);
            die();
        } else if ($betAmount < $this->data['settings']['min_bet'] || $betAmount > $this->data['settings']['max_bet']) {
            $result['message'] = "Bets must be between " . currencyDisplay($this->data['settings']['min_bet'], $this->data['settings']) . " - " . currencyDisplay($this->data['settings']['max_bet'], $this->data['settings']);
            echo json_encode($result);
            die();
        }

        $latestGame = $this->m_dice->getOneLastRoll($this->data['user']['id']);
        $luckyNum = $latestGame['roll'];

        if (!$latestGame) {
            $result['message'] = "An error occurred, please reload";
            echo json_encode($result);
            die();
        }

        if ($rollType == 'rollHi') {
            $calcHiRoll = 100 - $probability;
            $this->m_dice->openLastRoll($latestGame['id'], $betAmount, $calcHiRoll, 2);

            if ($luckyNum > $calcHiRoll) {
                //user wins
                $result['message'] = "You Won " . currencyDisplay($netProfit, $this->data['settings']);
                $result['type'] = 'win';
                $this->m_dice->updateRollProfit($latestGame['id'], $netProfit);
                $this->m_dice->addBalance($this->data['user']['id'], $netProfit);
                $amount = $netProfit;
            } else if ($luckyNum < $calcHiRoll) {
                //user loses
                $lossBet = $betAmount * -1;
                $result['message'] = "You Lost " . currencyDisplay($betAmount, $this->data['settings']);
                $result['type'] = 'loose';

                $this->m_dice->updateRollProfit($latestGame['id'], $lossBet);
                $this->m_dice->reduceBalance($this->data['user']['id'], $betAmount);
                $amount = -1 * $betAmount;
            }
        }

        if ($rollType == 'rollLo') {
            $this->m_dice->openLastRoll($latestGame['id'], $betAmount, $probability, 1);

            if ($luckyNum < $probability) {
                //user wins
                $result['message'] = "You Won " . currencyDisplay($netProfit, $this->data['settings']);
                $result['type'] = 'win';

                $this->m_dice->updateRollProfit($latestGame['id'], $netProfit);
                $this->m_dice->addBalance($this->data['user']['id'], $netProfit);
                $amount = $netProfit;
            } else  if ($luckyNum > $probability) {
                //user loses
                $lossBet = $betAmount * -1;
                $result['message'] = "You Lost " . currencyDisplay($betAmount, $this->data['settings']);
                $result['type'] = 'loose';

                $this->m_dice->updateRollProfit($latestGame['id'], $lossBet);
                $this->m_dice->reduceBalance($this->data['user']['id'], $betAmount);
                $amount = -1 * $betAmount;
            }
        }

        $game = $this->generateRoll();
        $this->m_dice->insertHistory($this->data['user']['id'], $game['salt'], $game['percent']);

        $result['proof'] = sha1($game['salt'] . '+' . $game['percent']);

        $latestGame = $this->m_dice->getRoll($latestGame['id']);
        $result['recent'] = [
            'id' => $latestGame['id'],
            'secret' => $latestGame['salt'],
            'target' => ($latestGame['type'] == 1 ? '&lt;' : '&gt;') . $latestGame['target'],
            'bet' => currencyDisplay($latestGame['bet'], $this->data['settings']),
            'roll' => $latestGame['roll'],
            'profit' => currencyDisplay($latestGame['profit'], $this->data['settings'])
        ];

        $result['status'] = 'success';

        $newBalance = $this->data['user']['balance'] + $amount;
        $result['balance'] = currencyDisplay($newBalance, $this->data['settings']);
        echo json_encode($result);
        die();
    }

    public function verify()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('secret', 'Secret', 'trim|required');
        $this->form_validation->set_rules('roll', 'Roll', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', faucet_alert('danger', 'Invalid Game!'));
            return redirect(site_url('dice'));
        }

        $this->session->set_flashdata('message', faucet_alert('info', 'SHA1 hash: ' . sha1($this->input->post('secret') . '+' . $this->input->post('roll'))));
        redirect(site_url('dice#verify'));
    }
}
