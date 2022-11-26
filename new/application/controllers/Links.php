<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Links extends Member_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->data['settings']['shortlink_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}
		$this->load->model('m_links');
		$this->load->helper('string');
        checkDailyBonus($this->data['user']);
	}

	public function index()
	{
		$this->data['page'] = 'Shortlinks Wall';
		$this->data['availableLinks'] = $this->m_links->availableLinks($this->data['user']['id']);
		$this->data['totalReward'] = 0;
		$this->data['totalEnergy'] = 0;
		for ($i = 0; $i < count($this->data['availableLinks']); ++$i) {
			$countHistory = $this->m_links->countHistory($this->data['user']['id'], $this->data['availableLinks'][$i]['id']);
			$this->data['availableLinks'][$i]['rmnViews'] = $this->data['availableLinks'][$i]['view_per_day'] - $countHistory;
			$this->data['totalReward'] += $this->data['availableLinks'][$i]['rmnViews'] * $this->data['availableLinks'][$i]['reward'];
			$this->data['totalEnergy'] += $this->data['availableLinks'][$i]['rmnViews'] * $this->data['availableLinks'][$i]['energy'];
		}

		usort($this->data['availableLinks'], 'compare_links');

		$this->render('links', $this->data);
	}

	public function go($link_id = 0)
	{
		$link_id = $this->db->escape_str($link_id);
		$link_data = $this->m_links->valid_id($link_id, $this->data['user']['id']);
		if (!$link_data) {
			return redirect(site_url('/links'));
		}

		$key = random_string('alnum', 20);

		// generate short link
		$url = urlencode(site_url('/links/back/' . $key));
		$api_url = str_replace('{url}', $url, $link_data['url']);
		$result = @json_decode(get_data($api_url), TRUE);
		if ($result['status'] == 'success') {
			$this->m_links->insert_link($this->data['user']['id'], $key, $link_id, $result['shortenedUrl']);
			echo '<script> location.href = "' . $result['shortenedUrl'] . '"; </script>';
			die();
		}
		$this->session->set_flashdata('message', faucet_alert('danger', 'Failed to generate this link'));
		return redirect(site_url('/links'));
	}

	public function verify($key = '')
	{
		if (strlen($key) != 20 || !preg_match("/^[a-zA-Z0-9]+$/", $key)) {
			$this->session->set_flashdata('message', faucet_alert('danger', 'Invalid Keys'));
			return redirect(site_url('/links'));
		}

		$key = trim($this->db->escape_str($key));
		$link = $this->m_links->check_key($key, $this->data['user']['id']);
		if (!$link || $link['ip_address'] != $this->input->ip_address()) {
			$this->session->set_flashdata('message', faucet_alert('danger', 'Invalid Keys'));
			return redirect(site_url('/links'));
		}

		$link_data = $this->m_links->valid_id($link['link_id'], $this->data['user']['id']);
		if (!$link_data) {
			if ($this->data['user']['fail'] >= $this->data['settings']['captcha_fail_limit'] - 1) {
				$this->m_core->insertCheatLog($this->data['user']['id'], 'Too many wrong captcha.', 0);
				$this->m_core->lockUser($this->data['user']['id']);
				return redirect(site_url('locked'));
			} else {
				$this->m_core->wrongCaptcha($this->data['user']['id']);
			}
			return redirect(site_url('/links'));
		}
		// update balance
		$this->m_core->rewardUser($this->data['user'], 'link', $link_data['reward'], $link_data['energy'], $this->data['settings']['shortlink_exp_reward']);

		$this->m_links->insert_history($this->data['user']['id'], $link_data['reward'], $link_data['id']);

		if ($this->data['user']['fail'] > 0) {
			$this->m_core->resetFail($this->data['user']['id']);
		}
		$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', currencyDisplay($link_data['reward'], $this->data['settings']) . ' has been added to your balance'));
		return redirect(site_url('/links'));
	}

	public function back($key = '')
	{
		if (strlen($key) == 20) {
			return redirect(site_url('/links/verify/' . $key));
		}
	}
}
