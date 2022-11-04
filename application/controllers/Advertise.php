<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Advertise extends Member_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->model(['m_advertise', 'm_coupon', 'm_achievements']);
        checkDailyBonus($this->data['user']);
	}

	public function index()
	{
		$this->data['page'] = 'Advertise';
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
		$this->data['options'] = $this->m_advertise->getOptions();
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->render('advertise', $this->data);
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('security');

		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[75]|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[0]|max_length[200]|xss_clean');
		$this->form_validation->set_rules('url', 'Url', 'trim|required|min_length[10]|max_length[100]|valid_url|xss_clean');
		$this->form_validation->set_rules('view', 'View', 'trim|required|greater_than[0]|integer');
		$this->form_validation->set_rules('option', 'Option', 'trim|required|integer');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', faucet_alert('danger', validation_errors()));
			return redirect(site_url('/advertise'));
		}

		$name = strip_tags($this->db->escape_str($this->input->post('name')));
		$description = strip_tags($this->db->escape_str($this->input->post('description')));
		$url = $this->db->escape_str($this->input->post('url'));
		$view = $this->db->escape_str($this->input->post('view'));
		$option = $this->db->escape_str($this->input->post('option'));

		if (!filter_var($url, FILTER_VALIDATE_URL)) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Invalid URL'));
			return redirect(site_url('/advertise'));
		}

		$getOption = $this->m_advertise->validOption($option);
		if (!$getOption) {
			$this->session->set_flashdata('sweet_message', faucet_q('question', 'Huh'));
			return redirect(site_url('/advertise'));
		}
		if ($getOption['min_view'] > $view) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'You have to purchase at least ' . $getOption['min_view'] . ' views'));
			return redirect(site_url('/advertise'));
		}

		// check coupon
		$code = $this->db->escape_str($this->input->post('code'));
		$discount = 0;
		if ($code) {
			$coupon = $this->m_coupon->getCoupon($code);

			if (!$coupon) {
				$this->session->set_flashdata('message', faucet_alert('danger', 'Invalid coupon code'));
				return redirect(site_url('advertise'));
			}

			if ($this->m_coupon->checkCouponHistory($this->data['user']['id'], $coupon['id'])) {
				$this->session->set_flashdata('message', faucet_alert('danger', 'You have already redeemed this coupon'));
				return redirect(site_url('advertise'));
			}

			if (($coupon['number_of_use'] > 0 && $coupon['used'] >= $coupon['number_of_use']) || ($coupon['expired_at'] > 0 && time() > $coupon['expired_at'])) {
				$this->session->set_flashdata('message', faucet_alert('danger', 'This coupon code is expired'));
				return redirect(site_url('advertise'));
			}

			$this->m_coupon->increaseUsed($coupon['id']);
			$this->m_coupon->insertHistory($this->data['user']['id'], $coupon['id']);
			$this->m_core->rewardUser($this->data['user'], 'coupon', $coupon['balance_reward'], $coupon['energy_reward'], 0, $coupon['dep_balance_reward']);
			$discount = $coupon['advertising_discount'];
		}

		$cost = $view * $getOption['price'] * (1 - $discount / 100);
		if ($cost > $this->data['user']['dep_balance']) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'You dont have enough tokens'));
			return redirect(site_url('/advertise'));
		}

		$this->m_advertise->add($this->data['user']['id'], $name, $description, $getOption['reward'], $getOption['timer'], $url, $view, $getOption['id']);
		$this->m_advertise->reduceBalance($this->data['user']['id'], $cost);

		redirect(site_url('advertise/manage'));
	}

	public function add_view($adId)
	{
		if (!is_numeric($adId)) {
			return redirect(site_url('/advertise/manage'));
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('view', 'View', 'trim|required|greater_than[0]|integer');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', validation_errors()));
			return redirect(site_url('/advertise'));
		}
		$view = $this->db->escape_str($this->input->post('view'));
		$ad = $this->m_advertise->validAds($this->data['user']['id'], $adId);
		if (!$ad) {
			return redirect(site_url('/advertise/manage'));
		}

		$amount = $ad['price'] * $view;
		if ($this->data['user']['dep_balance'] < $amount) {
			return redirect(site_url('/advertise/manage'));
		}

		$this->m_advertise->addView($adId, $view);
		$this->m_advertise->reduceBalance($this->data['user']['id'], $amount);
		$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'You have added views to campaign #' . $adId . ' successfully.'));
		return redirect(site_url('/advertise/manage'));
	}

	public function manage()
	{
		$this->data['page'] = 'Manage Campaigns';
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->data['ads'] = $this->m_advertise->getAds($this->data['user']['id']);

		$this->render('advertise_manage', $this->data);
	}

	public function pause($id = 0)
	{
		if (!is_numeric($id)) {
			return redirect(site_url('/advertise/manage'));
		}

		$ad = $this->m_advertise->validAds($this->data['user']['id'], $id);
		if (!$ad) {
			return redirect(site_url('/advertise/manage'));
		}

		if ($ad['status'] == 'pending') {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'You have to wait for admin to approve this ad'));
			return redirect(site_url('/advertise/manage'));
		}
		$this->m_advertise->pause($id);
		return redirect(site_url('/advertise/manage'));
	}

	public function start($id = 0)
	{
		if (!is_numeric($id)) {
			return redirect(site_url('/advertise/manage'));
		}

		$ad = $this->m_advertise->validAds($this->data['user']['id'], $id);
		if (!$ad) {
			return redirect(site_url('/advertise/manage'));
		}

		if ($ad['status'] == 'pending') {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'You have to wait for admin to approve this ad'));
			return redirect(site_url('/advertise/manage'));
		}
		$this->m_advertise->start($id);
		return redirect(site_url('/advertise/manage'));
	}

	public function delete($id = 0)
	{
		if (!is_numeric($id)) {
			return redirect(site_url('/advertise/manage'));
		}

		$ad = $this->m_advertise->validAds($this->data['user']['id'], $id);
		if (!$ad) {
			return redirect(site_url('/advertise/manage'));
		}

		$refund = ($ad['total_view'] - $ad['views']) * $ad['reward'];
		$this->m_advertise->delete($id, $ad['owner'], $refund);
		return redirect(site_url('/advertise/manage'));
	}
}
