<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Offerwalls extends Member_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('global_helper');
        $this->load->model(['m_account', 'm_active', 'm_achievements']);
        $this->load->library('form_validation');
        checkDailyBonus($this->data['user']);
    }
    public function index(){
        $this->data['page'] = 'Offerwalls';
       // $this->data['referral_count'] = $this->m_account->get_ref($this->data['user']['id']);
        $this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
        $this->data['totalAchievements'] = count($this->data['achievements']);
        //$this->data['countLotteries'] = $this->m_account->countLotteries($this->data['user']['id']);
        //$this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
				$this->render('offerwalls', $this->data);

}
}