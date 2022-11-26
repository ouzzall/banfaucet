<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leaderboard extends Member_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['m_leaderboard', 'm_achievements']);
        checkDailyBonus($this->data['user']);
	}
	public function index()
	{
		$this->data['page'] = 'Leaderboard';
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
		$this->data['leaderboardSettings'] = $this->m_leaderboard->getSettings();
		$this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }

		$leaderboardInfo = $this->cache->get('leaderboard_info');
		if (!$leaderboardInfo) {
			$leaderboardInfo = [
				'topLevel' => $this->m_leaderboard->getTopLevel(),
				'topClaimer' => $this->m_leaderboard->getTopClaimer($this->data['settings']['admin_username'], $this->data['leaderboardSettings']['activity_contest_requirement']),
				'topReferral' => $this->m_leaderboard->getTopReferral($this->data['settings']['admin_username'], $this->data['leaderboardSettings']['referral_contest_requirement']),
				'topFaucet' => $this->m_leaderboard->getTopFaucet($this->data['settings']['admin_username'], $this->data['leaderboardSettings']['faucet_contest_requirement']),
				'topShortlink' => $this->m_leaderboard->getTopShortlink($this->data['settings']['admin_username'], $this->data['leaderboardSettings']['shortlink_contest_requirement']),
				'topOfferwall' => $this->m_leaderboard->getTopOfferwall($this->data['settings']['admin_username'], $this->data['leaderboardSettings']['offerwall_contest_requirement'])
			];
			$this->cache->save('leaderboard_info', $leaderboardInfo, 600);
		}

		$this->data = array_merge($this->data, $leaderboardInfo);
		$this->render('leaderboard', $this->data);
	}
}
