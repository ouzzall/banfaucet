<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auto extends Member_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->data['settings']['autofaucet_status'] != 'on') {
            return redirect(site_url('dashboard'));
        }
        $this->load->helper('string');
        $this->load->model(['m_auto', 'm_achievements']);
        checkDailyBonus($this->data['user']);
    }
    public function index()
    {
        $this->data['csrf_name'] = $this->security->get_csrf_token_name();
        $this->data['csrf_hash'] = $this->security->get_csrf_hash();
	   	$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
 	   	$this->data['totalAchievements'] = count($this->data['achievements']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->data['captcha_display'] = get_captcha($this->data['settings'], base_url(), 'faucet_captcha');
		$this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
        $this->data['page'] = 'Fast Faucet';

        if ($this->data['user']['energy'] < $this->data['settings']['autofaucet_cost']) {
            $this->data['error'] = true;
        } else {
            $this->session->set_userdata('autoFaucetStart', time());
            $this->session->set_userdata('autoFaucetToken', random_string('alnum', 20));
        }
        $this->render('auto', $this->data);
    }

    public function verify()
    {
        if ($this->input->post('token') != $this->session->autoFaucetToken) {
            $this->session->set_flashdata('message', faucet_alert('danger', 'Invalid Claim'));
            return redirect(site_url('/auto'));
        }

        if ($this->session->autoFaucetStart == NULL || time() - $this->session->autoFaucetStart < $this->data['settings']['autofaucet_timer']) {
            $this->session->set_flashdata('message', faucet_alert('danger', 'Invalid Claim'));
            return redirect(site_url('/auto'));
        }

        if (time() - $this->data['user']['last_auto'] < $this->data['settings']['autofaucet_timer']) {
            $this->session->set_flashdata('message', faucet_alert('danger', 'Invalid Claim'));
            return redirect(site_url('/auto'));
        }

        $this->session->set_userdata('autoFaucetStart', time() + 100000);
        #CHECK BAD IP
        if ($this->m_core->newIp()) {
            $check = false;
            $isocode = 'N/A';
            if (!empty($this->data['settings']['proxycheck'])) {
                $check = proxycheck($this->data['settings'], $this->input->ip_address());
                $isocode = $check['isocode'];
            } else if (!empty($this->data['settings']['iphub'])) {
                $check = iphub($this->data['settings'], $this->input->ip_address());
                $isocode = $check['isocode'];
            }
            if ($check) {
                if ($check['status'] == 1) {
                    $this->session->set_flashdata('message', faucet_alert('danger', 'VPN/ Proxy is not allowed!'));
                    session_destroy();
                    return redirect(site_url('login'));
                }

                if ($isocode != 'N/A') {
                    if ($this->data['user']['isocode'] == 'N/A') {
                        $this->m_core->updateIsocode($this->data['user']['id'], $isocode, $check['country']);
                    } else if ($isocode != $this->data['user']['isocode']) {
                        $this->m_core->ban($this->data['user']['id'], 'Using Proxy ' . $this->data['user']['isocode'] . ' to ' . $isocode . ', IP: ' . $this->input->ip_address());
                        session_destroy();
                        return redirect(site_url('login'));
                    }
                }
            }
        }

        if ($this->data['user']['energy'] < $this->data['settings']['autofaucet_cost']) {
            $this->session->set_flashdata('message', faucet_alert('danger', 'Invalid Claim'));
            return redirect(site_url('/auto'));
        }

        $this->m_core->rewardUser($this->data['user'], 'auto-faucet', $this->data['settings']['autofaucet_reward'], $this->data['settings']['autofaucet_cost'] * -1, $this->data['settings']['autofaucet_exp_reward']);
        $this->m_auto->updateStat($this->data['settings']['autofaucet_reward']);
        $this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', currencyDisplay($this->data['settings']['autofaucet_reward'], $this->data['settings']) . ' has been added to your balance'));
        return redirect(site_url('/auto'));
    }
}
