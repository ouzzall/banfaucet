<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Achievements extends Member_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->data['settings']['achievement_status'] != 'on') {
            return redirect(site_url('dashboard'));
        }
        $this->load->model('m_achievements');
        checkDailyBonus($this->data['user']);
    }

    public function index()
    {
        $this->data['page'] = 'Challenges';
        $this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
        $this->data['totalAchievements'] = count($this->data['achievements']);
        $this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
        $dailyBonus = $this->db->where('user_id', $this->data['user']['id'])->where('date', date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)) {
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        } else {
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }

        //pp($this->data['achievements']);
        $this->data['categoried'] = [];
        for ($i = 0; $i < count($this->data['achievements']); ++$i) {
            if ($this->data['achievements'][$i]['type'] == 0) {
                $this->data['achievements'][$i]['name'] = 'faucet';
                $this->data['achievements'][$i]['completed'] = $this->data['user']['today_faucet'];
                $this->data['achievements'][$i]['description'] = 'Claim ' . $this->data['achievements'][$i]['condition'] . ' times';
            } else if ($this->data['achievements'][$i]['type'] == 1) {
                $this->data['achievements'][$i]['name'] = 'shortlink';
                $this->data['achievements'][$i]['completed'] = $this->m_achievements->checkLink($this->data['user']['id']);
                $this->data['achievements'][$i]['description'] = 'Complete ' . $this->data['achievements'][$i]['condition'] . ' shortlinks';
            } else if ($this->data['achievements'][$i]['type'] == 2) {
                $this->data['achievements'][$i]['name'] = 'ptc';
                $this->data['achievements'][$i]['completed'] = $this->m_achievements->checkPtc($this->data['user']['id']);
                $this->data['achievements'][$i]['description'] = 'View ' . $this->data['achievements'][$i]['condition'] . ' PTC ads';
            } else if ($this->data['achievements'][$i]['type'] == 3) {
                $this->data['achievements'][$i]['name'] = 'lottery';
                $this->data['achievements'][$i]['completed'] = $this->m_achievements->checkLottery($this->data['user']['id']);
                $this->data['achievements'][$i]['description'] = 'Buy ' . $this->data['achievements'][$i]['condition'] . ' lottery tickets';
      	} else if ($this->data['achievements'][$i]['type'] == 4) {
        	    $this->data['achievements'][$i]['name'] = 'offerwall';
                $this->data['achievements'][$i]['completed'] = $this->m_achievements->checkOfferwall($this->data['user']['id']);
                $this->data['achievements'][$i]['description'] = 'Complete ' . $this->data['achievements'][$i]['condition'] . ' offers';
      }

      $this->data['achievements'][$i]['progress'] = min(100, $this->data['achievements'][$i]['completed'] * 100 / $this->data['achievements'][$i]['condition']);
    }
        $startTime = strtotime(date('Y-m-d').' 00:00:00');
        $endTime = strtotime(date('Y-m-d').' 23:59:59');
        $offerwallEarning = $this->db->select('SUM(amount) as total')
            ->where('claim_time >=',$startTime)
            ->where('claim_time <=',$endTime)
            ->where('user_id',$this->data['user']['id'])->get('offerwall_history')->row();

        if (empty(@$offerwallEarning->total)){
            $offerwallEarning->total = 0;
        }
        //pp(strtotime(date('Y-m-d').' 00:30:50'));
        $this->data['offerwallEarning'] = $offerwallEarning;
        $this->render('achievements', $this->data);
    }

    public function claim($id = 0)
    {

        if (!is_numeric($id)) {
            return redirect('achievements');
        }

        $achievement = $this->m_achievements->getAchievementFromId($id);
        if (!$achievement) {
            return redirect('achievements');
        }

        if (!$this->m_achievements->checkHistory($id, $this->data['user']['id'])) {
            return redirect('achievements');
        }

        if ($achievement['type'] == 0) {
            if ($achievement['condition'] > $this->data['user']['today_faucet']) {
                return redirect(site_url('achievements'));
            }
        } else if ($achievement['type'] == 1) {
            if ($achievement['condition'] > $this->m_achievements->checkLink($this->data['user']['id'])) {
                return redirect(site_url('achievements'));
            }
        } else if ($achievement['type'] == 2) {
            if ($achievement['condition'] > $this->m_achievements->checkPtc($this->data['user']['id'])) {
                return redirect(site_url('achievements'));
            }
        } else if ($achievement['type'] == 3) {
            if ($achievement['condition'] > $this->m_achievements->checkLottery($this->data['user']['id'])) {
                return redirect(site_url('achievements'));
            }
        } else if ($achievement['type'] == 4) {
            if ($achievement['condition'] > $this->m_achievements->checkOfferwall($this->data['user']['id'])) {
                return redirect(site_url('achievements'));
            }
        }


        $this->m_core->rewardUser($this->data['user'], 'achievement', $achievement['reward_usd'], $achievement['reward_energy'], $this->data['settings']['achievement_exp_reward']);
        $this->m_achievements->insertHistory($this->data['user']['id'], $achievement['id'], $achievement['reward_usd']);
        $this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', currencyDisplay($achievement['reward_usd'], $this->data['settings']) . ' has been added to your balance'));
        return redirect(site_url('/achievements'));
    }

    public function claim_offerwall()
    {
        if (!todayOffwewallClaim($this->data['user'])){
            $usd = (50 * $this->data['settings']['currency_rate']);
            $this->db->where('id',$this->data['user']['id']);
            $this->db->set('balance', 'balance+' . $usd, FALSE);
            $add = $this->db->update('users');
            if ($add){
                $this->db->insert('offerwall_claim_history',['user_id'=>$this->data['user']['id'],'date'=>date('Y-m-d')]);
                $this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', '50 tokens has been added to your balance'));
            }else{
                $this->session->set_flashdata('sweet_message', faucet_sweet_alert('error', 'Tokens has not added to your balance'));
            }
        }else{
            $this->session->set_flashdata('sweet_message', faucet_sweet_alert('error', 'Tokens has not added to your balance'));
        }
        redirect(site_url('/achievements'));
    }
}
