<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mining extends Member_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->data['settings']['mining_status'] != 'on') {
            return redirect(site_url('dashboard'));
        }
        $this->load->helper('string');
        $this->load->model(['m_mining', 'm_achievements']);
        $this->data['min_withdrawal'] = 0.01; // USD
    }
    public function index()
    {
        $this->data['page'] = 'Mining';
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
        $balance = 0;
        $hashBalance = @json_decode(get_data('https://webminepool.com/api/' . $this->data['settings']['webminepool_secret_key'] . '/user_hashes/' . $this->data['user']['username']), TRUE);
        if ($hashBalance['success']) {
            $hashes = $hashBalance['hashes'];
            $satBalance = @json_decode(get_data('https://webminepool.com/api/' . $this->data['settings']['webminepool_secret_key'] . '/hash_rate/' . $hashes), TRUE);
            if ($satBalance['success']) {
                $balance = $satBalance['satoshi'];
            } else {
                $balance = 0;
            }
        } else {
            $balance = 0;
        }
        $this->data['balance'] = $balance * $this->data['settings']['mining_share'] * $this->data['settings']['btc_price'] / 10000000000;
        $this->render('mining', $this->data);
    }

    public function withdraw()
    {
        $balance = 0;
        $hashBalance = @json_decode(get_data('https://webminepool.com/api/' . $this->data['settings']['webminepool_secret_key'] . '/user_hashes/' . $this->data['user']['username']), TRUE);
        if ($hashBalance['success'] == 1) {
            $hashes = $hashBalance['hashes'];
            $satBalance = @json_decode(get_data('https://webminepool.com/api/' . $this->data['settings']['webminepool_secret_key'] . '/hash_rate/' . $hashes), TRUE);
            if ($satBalance['success'] == 1) {
                $balance = $satBalance['satoshi'];
            } else {
                $balance = 0;
            }
        } else {
            $balance = 0;
        }

        $usdAmount = $balance * $this->data['settings']['mining_share'] * $this->data['settings']['btc_price'] / 10000000000;
        if ($usdAmount < $this->data['min_withdrawal']) {
            return redirect(site_url('/mining'));
        }
        $withdraw = @json_decode(get_data('https://webminepool.com/api/' . $this->data['settings']['webminepool_secret_key'] . '/reset_user_hashes/' . $this->data['user']['username']), TRUE);
        if ($withdraw['success'] == 1) {
            $this->m_mining->userWithdraw($this->data['user']['id'], $usdAmount);
        }
        redirect(site_url('/mining'));
    }
}
