<?php
defined('BASEPATH') or exit('No direct script access allowed');
//class DailyBonus extends Member_Controller{
class DailyBonus extends Member_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('global_helper');
        $this->load->model(['m_account', 'm_active', 'm_achievements']);
        $this->load->library('form_validation');
        checkDailyBonus($this->data['user']);
    }
    public function index(){
        $this->data['page'] = 'Daily Bonus';
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

        $this->data['offers'] = dailyBonusList();
        $this->data['captcha_display'] = get_captcha($this->data['settings'], base_url(), 'login_captcha');
        $this->render('daily_bonus', $this->data);
    }

    public function add()
    {
        $item = $this->input->get('item');
        $captcha = $this->input->get('captcha');
        $checkCaptcha = false;
        switch ($captcha) {
            case "recaptchav3":
                $checkCaptcha = verifyRecaptchaV3($this->input->get('recaptchav3'), $this->data['settings']['recaptcha_v3_secret_key']);
                break;
            case "recaptchav2":
                $checkCaptcha = verifyRecaptchaV2($this->input->get('g-recaptcha-response'), $this->data['settings']['recaptcha_v2_secret_key']);
                break;
            case "solvemedia":
                $checkCaptcha = verifySolvemedia($this->data['v_key'], $this->data['h_key'], $this->input->ip_address(), $this->input->get('adcopy_challenge'), $this->input->get('adcopy_response'));
                break;
            case "hcaptcha":
                $checkCaptcha = verifyHcaptcha($this->input->get('h-captcha-response'), $this->data['settings']['hcaptcha_secret_key'], $this->input->ip_address());
                break;
        }

        if (!$checkCaptcha) {
            $this->session->set_flashdata('sweet_message', faucet_alert('error', 'Invalid Captcha'));
            return redirect(site_url('/daily-bonus'));
        }

        $package = dailyBonusSingle($item);
        //$bonus = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $package['earning'];
        $usd = ($package['token'] * $this->data['settings']['currency_rate']);
        $exp = $package['exp'];
        //$bonus = $this->data['user']['bonus_claim'] + $package['earning'];

        $this->db->where('id',$this->data['user']['id']);
        if ($usd) {
            $this->db->set('balance', 'balance+' . $usd, FALSE);
            $this->db->set('total_earned', 'total_earned+' . $usd, FALSE);
        }
        if ($exp) {
            $this->db->set('exp', 'exp+' . $exp, FALSE);
            if ($this->data['user']['exp'] + $exp >= ($this->data['user']['level'] + 1) * 100) {
                $this->db->set('level', 'level+1', FALSE);
            }
        }

        $add = $this->db->update('users');
        if ($add){
            $data = [
                'user_id'=>$this->data['user']['id'],
                'streak'=>$package['streak'],
                'date'=>date('Y-m-d')
            ];
            $this->db->insert('bonus_history',$data);
            $this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'Bonus claim successfully'));
        }else{
            $this->session->set_flashdata('sweet_message', faucet_sweet_alert('error', 'Bonus not claimed'));
        }
        redirect(site_url('/daily-bonus'));
    }
}