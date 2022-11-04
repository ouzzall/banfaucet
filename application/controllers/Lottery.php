<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lottery extends Member_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->data['settings']['lottery_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}
		$this->load->helper(array('string', 'date'));
		$this->load->model(array(['m_lottery', 'm_faucet', 'm_achievements']));
        checkDailyBonus($this->data['user']);
	}
	public function index()
	{
		$this->data['page'] = 'Lottery';
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
		$this->data['lotteries'] = $this->m_lottery->get_lotteries($this->data['user']['id']);
		$this->data['countLotteries'] = $this->m_lottery->countLotteries($this->data['user']['id']);
		$this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
		$this->data['winners'] = $this->m_lottery->get_winners();
		$this->data['totalLottery'] = $this->db->get('lotteries')->num_rows();
		$this->data['current_reward'] = $this->data['settings']['lottery_reward'] * $this->data['totalLottery'] + $this->data['settings']['lottery_base_reward'];
		$this->data['total_lottery'] = $this->db->query("SELECT COUNT(*) as cnt FROM lotteries")->result_array()[0]['cnt'];
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->render('lottery', $this->data);
	}

	public function buy()
	{

		if (!is_numeric($this->input->post('amount'))) {
			return redirect(site_url('/lottery'));
		}
		if (time() > $this->data['settings']['lottery_date']) {
			$this->session->set_flashdata('sweet_message', faucet_info('info', 'Please wait for a new round'));
			return redirect(site_url('/lottery'));
		}

		$amount = $this->db->escape_str(floor($this->input->post('amount')));
		if ($amount <= 0) {
			return redirect(site_url('/lottery'));
		}
		$money = $amount * $this->data['settings']['lottery_price'];
		if ($this->data['user']['balance'] < $money) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'You dont have enough tokens'));
			return redirect(site_url('/lottery'));
		}
		$this->m_lottery->reduce_balance($this->data['user']['id'], $money);
		$loop = $amount;
		while ($loop--) {
			$number = -1;
			do {
				$number = rand(1, 10000000);
			} while ($this->m_lottery->duplicate($number));

			$this->m_lottery->insert_lottery($this->data['user']['id'], $number);
			$this->m_core->addExp($this->data['user']['id'], $this->data['settings']['lottery_exp_reward']);
			$this->data['user']['exp'] += $this->data['settings']['lottery_exp_reward'];
			if (($this->data['user']['exp']) >= ($this->data['user']['level'] + 1) * 100) {
				$this->data['user']['level'] += 1;
				$this->m_core->levelUp($this->data['user']['id']);
			}
		}

		$tik = ($amount < 2) ? 'ticket' : 'tickets';
		$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'You have bought ' . $amount . ' ' . $tik . ' successfully'));
		return redirect(site_url('/lottery'));
	}
}
