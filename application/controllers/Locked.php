<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Locked extends Member_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_achievements');
        checkDailyBonus($this->data['user']);
	}
    public function index()
    {
        if ($this->data['user']['locked_until'] < time()) {
            return redirect(site_url('dashboard'));
        }
        $this->data['page'] = 'Locked';
        $this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    	  $this->data['totalAchievements'] = count($this->data['achievements']);
	  $this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
        $this->render('locked', $this->data);
    }
}
