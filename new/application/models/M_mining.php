<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Mining extends CI_Model
{
    public function userWithdraw($id, $amount)
    {
        $this->db->where('id', $id);
        $this->db->set('balance', 'balance+' . $amount, FALSE);
        $this->db->set('total_earned', 'total_earned+' . $amount, FALSE);
        $this->db->set('last_active', time());
        $this->db->update('users');
    }
}
