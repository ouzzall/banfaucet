<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Leaderboard extends CI_Model
{
    public function getSettings()
    {
        $settings = $this->db->get('setting_leaderboard')->result_array();
        foreach ($settings as $value) {
            $result[$value['name']] = $value['value'];
        }
        return $result;
    }
    public function getTopLevel()
    {
        $this->db->select('id, username, exp, level, claims, ref_count, faucet_count_tmp, shortlink_count_tmp, offerwall_count_tmp');
        $this->db->order_by('exp', "desc")->limit(15, 0);
        return $this->db->get_where('users', ['exp>' => 0])->result_array();
    }
    public function getTopClaimer($adminUsername)
    {
        $this->db->select('id, username, exp, level, claims, ref_count, faucet_count_tmp, shortlink_count_tmp, offerwall_count_tmp');
        $this->db->order_by('claims', "desc")->limit(15, 0);
        $this->db->order_by('exp', "desc")->limit(15, 0);
        return $this->db->get_where('users', ['username<>' => $adminUsername, 'claims>' => 0])->result_array();
    }
    public function getTopReferral($adminUsername, $requirement)
    {
        $this->db->select('id, username, exp, level, claims, ref_count, faucet_count_tmp, shortlink_count_tmp, offerwall_count_tmp');
        $this->db->order_by('ref_count', "desc")->limit(15, 0);
        $this->db->order_by('exp', "desc")->limit(15, 0);
        return $this->db->get_where('users', ['username<>' => $adminUsername, 'ref_count>' => $requirement])->result_array();
    }
    public function getTopFaucet($adminUsername, $requirement)
    {
        $this->db->select('id, username, exp, level, claims, ref_count, faucet_count_tmp, shortlink_count_tmp, offerwall_count_tmp');
        $this->db->order_by('faucet_count_tmp', "desc")->limit(15, 0);
        $this->db->order_by('exp', "desc")->limit(15, 0);
        return $this->db->get_where('users', ['username<>' => $adminUsername, 'faucet_count_tmp>=' => $requirement])->result_array();
    }
    public function getTopShortlink($adminUsername, $requirement)
    {
        $this->db->select('id, username, exp, level, claims, ref_count, faucet_count_tmp, shortlink_count_tmp, offerwall_count_tmp');
        $this->db->order_by('shortlink_count_tmp', "desc")->limit(15, 0);
        $this->db->order_by('exp', "desc")->limit(15, 0);
        return $this->db->get_where('users', ['username<>' => $adminUsername, 'shortlink_count_tmp>=' => $requirement])->result_array();
    }
    public function getTopOfferwall($adminUsername, $requirement)
    {
        $this->db->select('id, username, exp, level, claims, ref_count, faucet_count_tmp, shortlink_count_tmp, offerwall_count_tmp');
        $this->db->order_by('offerwall_count_tmp', "desc")->limit(15, 0);
        $this->db->order_by('exp', "desc")->limit(15, 0);
        return $this->db->get_where('users', ['username<>' => $adminUsername, 'offerwall_count_tmp>=' => $requirement])->result_array();
    }
}
