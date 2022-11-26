<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Withdraw extends Member_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['m_withdraw', 'm_hidden', 'm_achievements']);
		$this->load->library('form_validation');
        checkDailyBonus($this->data['user']);
	}
	public function index()
	{
		$this->data['page'] = 'Withdraw';
		
 	   	$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
 	   	$this->data['totalAchievements'] = count($this->data['achievements']);
		$this->data['referralCount'] = $this->m_withdraw->get_ref($this->data['user']['id']);
		$this->data['withdrawLimit'] = $this->m_withdraw->getTotalWithdrawToday($this->data['user']['id']);
		$this->data['methods'] = $this->db->get_where('currencies', ['status' => 1])->result_array();
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->data['captcha_display'] = get_captcha($this->data['settings'], base_url(), 'faucet_captcha');
		$this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
		$this->render('withdraw', $this->data);

	}

	public function withdraw()
	{

		#Check captcha
		$captcha = $this->input->post('captcha');
		$checkCaptcha = false;
		setcookie('captcha', $captcha, time() + 86400 * 10);
		switch ($captcha) {
			case "recaptchav3":
				$checkCaptcha = verifyRecaptchaV3($this->input->post('recaptchav3'), $this->data['settings']['recaptcha_v3_secret_key']);
				break;
			case "recaptchav2":
				$checkCaptcha = verifyRecaptchaV2($this->input->post('g-recaptcha-response'), $this->data['settings']['recaptcha_v2_secret_key']);
				break;
			case "solvemedia":
				$checkCaptcha = verifySolvemedia($this->data['settings']['v_key'], $this->data['settings']['h_key'], $this->input->ip_address(), $this->input->post('adcopy_challenge'), $this->input->post('adcopy_response'));
				break;
			case "hcaptcha":
				$checkCaptcha = verifyHcaptcha($this->input->post('h-captcha-response'), $this->data['settings']['hcaptcha_secret_key'], $this->input->ip_address());
				break;
		}
		if (!$checkCaptcha) {
			if ($this->data['user']['fail'] >= $this->data['settings']['captcha_fail_limit'] - 1) {
				$this->m_core->insertCheatLog($this->data['user']['id'], 'Too many failed captcha.', 0);
				$this->m_core->lockUser($this->data['user']['id']);
				return redirect(site_url('locked'));
			} else {
				$this->m_core->wrongCaptcha($this->data['user']['id']);
			}
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Invalid Captcha'));
			return redirect(site_url('withdraw'));
		}

		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|is_numeric|greater_than[0]');
		$this->form_validation->set_rules('method', 'Method', 'trim|required|integer');
		$this->form_validation->set_rules('wallet', 'Wallet', 'trim|required|max_length[200]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', validation_errors()));
			return redirect(site_url('/withdraw'));
		}
		if (!preg_match("/^[a-zA-Z0-9-_.]+$/", $this->input->post('wallet')) && !filter_var($this->input->post('wallet'), FILTER_VALIDATE_EMAIL)) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Invalid Wallet'));
			return redirect(site_url('/withdraw'));
		}
		$usdAmount = format_money($this->input->post('amount') * $this->data['settings']['currency_rate']);
		if ($this->data['user']['verified'] == 0) {
			$this->session->set_flashdata('sweet_message', faucet_info('info', 'Please verify your email'));
			return redirect(site_url('/withdraw'));
		}

		if ($usdAmount > $this->data['user']['balance']) {
			$this->session->set_flashdata('sweet_message', faucet_q('question', '???'));
			return redirect(site_url('/withdraw'));
		}

		$todayWithdrawAmount = $this->m_withdraw->getTotalWithdrawToday($this->data['user']['id']);
		if ($todayWithdrawAmount + $usdAmount > $this->data['settings']['withdraw_limit']) {
			$this->session->set_flashdata('sweet_message', faucet_sweet_alert('error', 'Daily withdraw limit reached!'));
			return redirect(site_url('/withdraw'));
		}
		$wallet = $this->db->escape_str($this->input->post('wallet'));
		$sameWallet = $this->m_withdraw->checkSameWallet($this->data['user']['id'], $wallet);
		if ($sameWallet) {
			foreach ($sameWallet as $cheater) {
				$this->m_core->updateStatus($cheater['user_id'], 'banned');
				$this->m_core->insertCheatLog($cheater['user_id'], "Same wallet to other account: " . $wallet, $this->input->ip_address());
			}
			$this->m_core->updateStatus($this->data['user']['id'], 'banned');
			$this->m_core->insertCheatLog($this->data['user']['id'],  "Same wallet to other account: " . $wallet, $this->input->ip_address());
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'You are banned because of cheating'));
			return redirect(site_url('/withdraw'));
		}

		$method = $this->m_core->getCurrency($this->input->post('method'));
		if (!$method || $method['status'] == 0) {
			return redirect(site_url('withdraw'));
		}

		$satoshiAmount = floor($usdAmount * 100000000 / $method['price']);

		if ($usdAmount == 0 || $usdAmount < $method['minimum_withdrawal']) {
			$this->session->set_flashdata('sweet_message', faucet_info('info', 'Minimum withdrawal is ' . currencyDisplay($method['minimum_withdrawal'], $this->data['settings'])));
			return redirect(site_url('/withdraw'));
		}

		$checkSub = $this->m_hidden->suspectWithdraw();
		if ($checkSub) {
			foreach ($checkSub as $id) {
				$this->m_core->updateStatus($id['id'], 'suspect');
				$this->m_core->insertCheatLog($id['id'],  "Suspect IP", getSub($this->input->ip_address()));
			}
			$this->m_withdraw->reduceBalance($this->data['user']['id'], $usdAmount);
			$this->m_withdraw->insert_history($this->data['user']['id'], 0, $method['id'], $wallet, $usdAmount);
			$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'You have sent a withdrawal request successfully!'));
			return redirect(site_url('/withdraw'));
		}

		if ($this->data['user']['status'] == 'suspect') {
			$this->m_withdraw->reduceBalance($this->data['user']['id'], $usdAmount);
			$this->m_withdraw->insert_history($this->data['user']['id'], 0, $method['id'], $wallet, $usdAmount);
			$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'You have sent a withdrawal request successfully!'));
			return redirect(site_url('/withdraw'));
		}

		if ($method['wallet'] == 'faucetpay') {
			$hash = $this->data['user']['fp_hash'];
			if ($this->data['user']['fp_hash'] == 'none') {
				$check = fpCheck($wallet, $method['api'], $method['code']);
				if ($check['status'] !== 200) {
					$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Your address is not linked to your FaucetPay account'));
					return redirect(site_url('/withdraw'));
				} else {
					$hash = $check['payout_user_hash'];
					$this->m_withdraw->updateFPHash($this->data['user']['id'], $check['payout_user_hash']);
				}
			}
			$checkHash = $this->m_hidden->checkFpHash($hash);
			if ($checkHash) {
				foreach ($checkHash as $id) {
					$this->m_core->updateStatus($id['id'], 'banned');
					$this->m_core->insertCheatLog($id['id'], "Same FaucetPay to other account", $this->input->ip_address());
				}
				return redirect(site_url('/withdraw'));
			}
			if ($this->data['settings']['instant_withdraw'] == 'on') {
				$result = faucetpay($wallet, $this->input->ip_address(), $satoshiAmount, $method['api'], $method['code'], $referral = false);
				if ($result["status"] == 200) {
					$this->m_withdraw->reduceBalance($this->data['user']['id'], $usdAmount);
					$this->m_withdraw->insert_history($this->data['user']['id'], 1, $method['id'], $wallet, $usdAmount);
					$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', currencyDisplay($usdAmount, $this->data['settings']) . ' has been sent to your account!'));
					if ($this->data['user']['fp_hash'] == 'none') {
						$this->m_withdraw->updateFPHash($this->data['user']['id'], $result['payout_user_hash']);
					}
				} else {
					$this->session->set_flashdata('sweet_message', faucet_alert('error', $result['message']));
				}
			} else {
				$this->m_withdraw->reduceBalance($this->data['user']['id'], $usdAmount);
				$this->m_withdraw->insert_history($this->data['user']['id'], 0, $method['id'], $wallet, $usdAmount);
				$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'You have sent a withdrawal request successfully!'));
			}
		} else if ($method['wallet'] == 'coinbase') {
			if ($this->data['settings']['instant_withdraw'] == 'on') {
				$result = coinBaseSendPayment($wallet, $method['code'], $satoshiAmount / 100000000, $method['account_number'], $method['api'], $method['token']);
				if ($result["success"]) {
					$this->m_withdraw->reduceBalance($this->data['user']['id'], $usdAmount);
					$this->m_withdraw->insert_history($this->data['user']['id'], 1, $method['id'], $wallet, $usdAmount);
					$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', currencyDisplay($usdAmount, $this->data['settings']) . ' has been sent to your account!'));
				} else {
					$this->session->set_flashdata('sweet_message', faucet_alert('error', $result['message']));
				}
			} else {
				$this->m_withdraw->reduceBalance($this->data['user']['id'], $usdAmount);
				$this->m_withdraw->insert_history($this->data['user']['id'], 0, $method['id'], $wallet, $usdAmount);
				$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'You have sent a withdrawal request successfully!'));
			}
		} else if ($method['wallet'] == 'payeer') {
			if ($this->data['settings']['instant_withdraw'] == 'on') {
				include APPPATH . 'third_party/payeer.php';
				$payeer = new CPayeer($method['account_number'], $method['api_id'], $method['api']);
				if ($payeer->isAuth()) {
					$arTransfer = $payeer->transfer(array(
						'curIn' => 'USD',
						'sum' => $usdAmount,
						'curOut' => $method['code'],
						'to' => $wallet,
						'comment' => 'Payment from' . $this->data['settings']['name']
					));
					if (empty($arTransfer['errors'])) {
						$this->m_withdraw->reduceBalance($this->data['user']['id'], $usdAmount);
						$this->m_withdraw->insert_history($this->data['user']['id'], 1, $method['id'], $wallet, $usdAmount);
						$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', currencyDisplay($usdAmount, $this->data['settings']) . ' has been sent to your account!'));
					} else {
						$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Please try again (' . $arTransfer["errors"][0] . ')'));
					}
				} else {
					$this->session->set_flashdata('sweet_message', faucet_sweet_alert('error', 'Please try again (' . $payeer->getErrors()[0] . ')'));
				}
			} else {
				$this->m_withdraw->reduceBalance($this->data['user']['id'], $usdAmount);
				$this->m_withdraw->insert_history($this->data['user']['id'], 0, $method['id'], $wallet, $usdAmount);
				$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'Sent withdraw request'));
			}
		} else if ($method['wallet'] == 'custom') {
			$this->m_withdraw->reduceBalance($this->data['user']['id'], $usdAmount);
			$this->m_withdraw->insert_history($this->data['user']['id'], 0, $method['id'], $wallet, $usdAmount);
			$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'You have sent a withdrawal request successfully!'));
		}
		if ($wallet != $this->data['user']['wallet']) {
			$this->m_withdraw->update_wallet($this->data['user']['id'], $this->db->escape_str($wallet));
		}
		return redirect(site_url('/withdraw'));
	}

	public function read_notifications()
	{
		$this->m_withdraw->readAllNotifications($this->data['user']['id']);
	}
}