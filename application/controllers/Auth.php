<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(['string', 'tungaqhd_helper']);
		$this->load->model(['m_auth', 'm_hidden', 'm_active', 'm_suspect']);
		$this->data = $this->m_core->getSettings();
	}
	public function register()
	{
		$captcha = $this->input->post('captcha');
		$checkCaptcha = false;
		setcookie('captcha', $captcha, time() + 86400 * 10);
		switch ($captcha) {
			case "recaptchav3":
				$checkCaptcha = verifyRecaptchaV3($this->input->post('recaptchav3'), $this->data['recaptcha_v3_secret_key']);
				break;
			case "recaptchav2":
				$checkCaptcha = verifyRecaptchaV2($this->input->post('g-recaptcha-response'), $this->data['recaptcha_v2_secret_key']);
				break;
			case "solvemedia":
				$checkCaptcha = verifySolvemedia($this->data['v_key'], $this->data['h_key'], $this->input->ip_address(), $this->input->post('adcopy_challenge'), $this->input->post('adcopy_response'));
				break;
			case "hcaptcha":
				$checkCaptcha = verifyHcaptcha($this->input->post('h-captcha-response'), $this->data['hcaptcha_secret_key'], $this->input->ip_address());
				break;
		}
		if (!$checkCaptcha) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Failed Captcha'));
			return redirect(site_url('register'));
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[75]|is_unique[users.email]', array('is_unique' => 'This email is registered with another account'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]|is_unique[users.username]', array('is_unique' => 'This username already exists'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|md5');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]|md5');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', validation_errors()));
			return redirect(site_url('register'));
		}
		if (!preg_match("/^[a-zA-Z]{1,1}[a-zA-Z0-9_]{2,13}[a-zA-Z0-9]{1,1}+$/", $this->input->post('username')) || strpos(strtolower($this->input->post('username')), 'admin')) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Invalid username'));
			return redirect(site_url('register'));
		}

		$isocode = 'N/A';
		$country = 'N/A';
		if (!empty($this->data['proxycheck'])) {
			$check = proxycheck($this->data, $this->input->ip_address());
			if ($check['status'] == 1) {
				$this->session->set_flashdata('sweet_message', faucet_alert('error', 'VPN or Proxy is not allowed'));
				return redirect(site_url('register'));
			}
			$isocode = isset($check['isocode']) ? $check['isocode'] : 'N/A';
			$country = isset($check['country']) ? $check['country'] : 'N/A';
		} else if (!empty($this->data['iphub'])) {
			$check = iphub($this->data, $this->input->ip_address());
			if ($check['status'] == 1) {
				$this->session->set_flashdata('sweet_message', faucet_alert('error', 'VPN or Proxy is not allowed'));
				return redirect(site_url('register'));
			}
			$isocode = isset($check['isocode']) ? $check['isocode'] : 'N/A';
			$country = isset($check['country']) ? $check['country'] : 'N/A';
		}
		$email = $this->db->escape_str($this->input->post('email'));
		$username = $this->db->escape_str($this->input->post('username'));
		$password = $this->db->escape_str($this->input->post('password'));
		$active_keys = random_string('alnum', 30);

		$userMailDomainSplitted = explode('@', $email);

		$userMailDomain = end($userMailDomainSplitted);
		$blackListEmails = explode(',', $this->data['banned_mails']);
		$trustedListEmails = explode(',', $this->data['trusted_mails']);
		if (in_array($userMailDomain, $blackListEmails)) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'This email is not allowed'));
			return redirect(site_url('register'));
		}
		$status = 'active';
		$notAllowedMail = false;
		if (count($trustedListEmails) && !in_array($userMailDomain, $trustedListEmails)) {
			$notAllowedMail = true;
			$status = 'suspect';
		}

		// referral
		if (!empty($_SESSION['referral'])) {
			$referral = $_SESSION['referral'];
			if (!is_numeric($referral)) {
				$referral = 0;
			} else {
				$referral = $this->db->escape_str($referral);
				if (!$this->m_auth->valid_referral($referral)) {
					$referral = 0;
				}
				unset($_SESSION['referral']);
			}
		} else {
			$referral = 0;
		}

		$referralSource = 'direct';
		if (isset($_COOKIE['Referral_Source']) && filter_var($_COOKIE['Referral_Source'], FILTER_VALIDATE_URL)) {
			$referralSource = $this->db->escape_str($_COOKIE['Referral_Source']);
		}

		$siteName = $this->data['name'];
		$activeUrl = site_url('/active/' . $active_keys);
		$message = <<<EOT
			<table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
			<tbody><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
			<td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
			<td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
				<div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
					<table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope="" itemtype="http://schema.org/ConfirmAction" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
						<tbody><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
							<td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0;padding: 30px; box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.03); ;border-radius: 7px; background-color: #fff;" valign="top">
								<meta itemprop="name" content="Confirm Email" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
								<table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
									<tbody><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
											Welcome to $siteName. Please confirm your email address by clicking the link below.
										</td>
									</tr>
									<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
											You won't be able to withdraw until you have verified your account.
										</td>
									</tr>
									<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" itemprop="handler" itemscope="" itemtype="http://schema.org/HttpActionHandler" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
											<a href="$activeUrl" itemprop="url" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #34c38f; margin: 0; border-color: #34c38f; border-style: solid; border-width: 8px 16px;">Confirm email address</a>
										</td>
									</tr>
									<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" itemprop="handler" itemscope="" itemtype="http://schema.org/HttpActionHandler" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										<p>If the link doesn't work, please copy this link and open it in your browser</p>
											<b style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;">$activeUrl</b>
										</td>
									</tr>
									<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
											<b>$siteName</b>
											<p>Support Team</p>
										</td>
									</tr>
								</tbody>
								</table>
							</td>
						</tr>
					</tbody></table>
				</div>
			</td>
		</tr>
	</tbody></table>
EOT;

		$this->m_auth->register($email, $username, $password, $active_keys, $isocode, $country, $referral, $referralSource, $status);
		$user = $this->m_core->get_user_from_email($email);
		$this->session->set_userdata('VUID', $user['id']);
		$this->m_active->insertActive($user['id'], $active_keys);
		if ($notAllowedMail) {
			$this->m_suspect->insertSuspectEmail($user['id']);
		}

		if ($this->m_core->newIpUser($user['id'])) {
			$this->m_core->insertNewIp($user['id']);
		} else {
			$this->m_core->updateIpLastUse($user['id']);
		}
		if (sendMail($email, 'Activate your account', $message, $this->data)) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Failed to send email'));
		}

		$suspectIds = $this->m_hidden->suspectAuth($referral, $password);
		if ($suspectIds) {
			try {
				$allIds = [];
				$idsEx = [];

				foreach ($suspectIds as $suspectId) {
					array_push($allIds, $suspectId['id']);
					if ($suspectId['id'] != $user['id']) {
						array_push($idsEx, $suspectId['id']);
					}
				}

				$sub = getSub($this->input->ip_address());

				$allJoin = implode(",", $allIds);
				$exJoin = implode(",", $idsEx);
				$suspects = $this->m_suspect->getSuspectByIds($allJoin);
				$founded = -1;
				$checked = false;
				foreach ($suspects as $suspect) {
					if ($suspect['cnt'] == count($allIds)) {
						$checked = true;
					}
				}
				if (!$checked) {
					$suspects = $this->m_suspect->getSuspectByIds($exJoin);
					$founded = -1;
					foreach ($suspects as $suspect) {
						if ($suspect['cnt'] == count($idsEx)) {
							$founded = $suspect['suspect_id'];
						}
					}
				}

				if (!$checked) {
					if ($founded == -1) {
						$this->m_hidden->addSuspect($suspectIds, "Suspect ip: " . $sub, $sub);
					} else {
						$insert = array(
							'user_id' => $user['id'],
							'suspect_id' => $founded
						);
						$this->db->insert('suspects_users', $insert);
					}
				}
			} catch (\Throwable $th) {
			}
		}
		return redirect(site_url('/dashboard'));
	}
	public function login()
	{

		// #Check captcha
		// $captcha = $this->input->post('captcha');
		// $remember = $this->input->post('remember');
		// $checkCaptcha = false;

		// setcookie('captcha', $captcha, time() + 86400 * 10);
		// switch ($captcha) {
		// 	case "recaptchav3":
		// 		$checkCaptcha = verifyRecaptchaV3($this->input->post('recaptchav3'), $this->data['recaptcha_v3_secret_key']);
		// 		break;
		// 	case "recaptchav2":
		// 		$checkCaptcha = verifyRecaptchaV2($this->input->post('g-recaptcha-response'), $this->data['recaptcha_v2_secret_key']);
		// 		break;
		// 	case "solvemedia":
		// 		$checkCaptcha = verifySolvemedia($this->data['v_key'], $this->data['h_key'], $this->input->ip_address(), $this->input->post('adcopy_challenge'), $this->input->post('adcopy_response'));
		// 		break;
		// 	case "hcaptcha":
		// 		$checkCaptcha = verifyHcaptcha($this->input->post('h-captcha-response'), $this->data['hcaptcha_secret_key'], $this->input->ip_address());
		// 		break;
		// }
        // //pp($checkCaptcha);
		// if (!$checkCaptcha) {
		// 	$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Failed Captcha'));
		// 	return redirect(site_url('/login'));
		// }

		// $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[30]');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|md5');

		// if ($this->form_validation->run() == FALSE) {
		// 	$this->session->set_flashdata('sweet_message', faucet_alert('error', validation_errors()));
		// 	return redirect(site_url('login'));
		// }
		$email = $this->db->escape_str($this->input->post('email'));
		$password = $this->db->escape_str($this->input->post('password'));

		$user = $this->m_auth->login($email, $password);
		if (!$user) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Incorrect Email or Password'));
			return redirect(site_url('login'));
		}

        checkDailyBonus($user);
		$isocode = 'N/A';
		$check = false;
		if ($this->m_core->newIp()) {
			if (!empty($this->data['proxycheck'])) {
				$check = proxycheck($this->data, $this->input->ip_address());
				$isocode = $check['isocode'];
			} else if (!empty($this->data['iphub'])) {
				$check = iphub($this->data, $this->input->ip_address());
				$isocode = $check['isocode'];
			}
		}
		if ($check) {
			if ($isocode != 'N/A') {
				if ($user['isocode'] == 'N/A') {
					$this->m_core->updateIsocode($user['id'], $isocode, $check['country']);
				} else if ($isocode != $user['isocode']) {
					$this->session->set_flashdata('sweet_message', faucet_alert('error', 'VPN or Proxy is not allowed'));
					return redirect(site_url('login'));
				}
			}
			if ($check['status'] == 1) {
				$this->session->set_flashdata('sweet_message', faucet_alert('error', 'VPN or Proxy is not allowed'));
				return redirect(site_url('login'));
			}
		}

		// Find this remember me code in the config.php

		$this->session->set_userdata('VUID', $user['id']);




		if ($this->m_core->newIpUser($user['id'])) {
			$this->m_core->insertNewIp($user['id']);
		} else {
			$this->m_core->updateIpLastUse($user['id']);
		}

		$suspectIds = $this->m_hidden->suspectAuth($user['referred_by'], $password);

		if ($suspectIds) {
			try {
				$allIds = [];
				$idsEx = [];
				foreach ($suspectIds as $suspectId) {
					array_push($allIds, $suspectId['id']);
					if ($suspectId['id'] != $user['id']) {
						array_push($idsEx, $suspectId['id']);
					}
				}
				$sub = getSub($this->input->ip_address());
				$allJoin = implode(",", $allIds);
				$exJoin = implode(",", $idsEx);
				$suspects = $this->m_suspect->getSuspectByIds($allJoin);
				$founded = -1;
				$checked = false;

				foreach ($suspects as $suspect) {
					if ($suspect['cnt'] == count($allIds)) {
						$checked = true;
					}
				}
				if (!$checked) {
					$suspects = $this->m_suspect->getSuspectByIds($exJoin);
					$founded = -1;
					foreach ($suspects as $suspect) {
						if ($suspect['cnt'] == count($idsEx)) {
							$founded = $suspect['suspect_id'];
						}
					}
				}

				if (!$checked) {
					if ($founded == -1) {
						$this->m_hidden->addSuspect($suspectIds, "Suspect ip: " . $sub, $sub);
					} else {
						$insert = array(
							'user_id' => $user['id'],
							'suspect_id' => $founded
						);
						$this->db->insert('suspects_users', $insert);
					}
				}
			} catch (\Throwable $th) {
			}
		}

		$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'Login successful'));
		return redirect(site_url('/dashboard'));
	}

	public function forgot_password()
	{
		#Check captcha
		$captcha = $this->input->post('captcha');
		$checkCaptcha = false;
		setcookie('captcha', $captcha, time() + 86400 * 10);
		switch ($captcha) {
			case "recaptchav3":
				$checkCaptcha = verifyRecaptchaV3($this->input->post('recaptchav3'), $this->data['recaptcha_v3_secret_key']);
				break;
			case "recaptchav2":
				$checkCaptcha = verifyRecaptchaV2($this->input->post('g-recaptcha-response'), $this->data['recaptcha_v2_secret_key']);
				break;
			case "solvemedia":
				$checkCaptcha = verifySolvemedia($this->data['v_key'], $this->data['h_key'], $this->input->ip_address(), $this->input->post('adcopy_challenge'), $this->input->post('adcopy_response'));
				break;
			case "hcaptcha":
				$checkCaptcha = verifyHcaptcha($this->input->post('h-captcha-response'), $this->data['hcaptcha_secret_key'], $this->input->ip_address());
				break;
		}
		if (!$checkCaptcha) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Invalid Captcha'));
			return redirect(site_url('forgot-password'));
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[30]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', validation_errors()));
			return redirect(site_url('forgot-password'));
		}
		$email = $this->db->escape_str($this->input->post('email'));

		$user = $this->m_core->get_user_from_email($email);
		if (!$user) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Invalid Email'));
			return redirect(site_url('forgot-password'));
		}
		$oldRequest = $this->m_auth->getForgotPasswordByUserId($user['id']);
		if ($oldRequest && time() - $oldRequest['create_time'] < 300) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'You can only request one password reset every 5 minutes'));
			return redirect(site_url('forgot-password'));
		}
		$token = random_string('alnum', 30);
		$siteName = $this->data['name'];
		$activeUrl = site_url('/reset-password/' . $token);
		$message = <<<EOT
			<table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
			<tbody><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
			<td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
			<td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
				<div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
					<table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope="" itemtype="http://schema.org/ConfirmAction" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
						<tbody><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
							<td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0;padding: 30px; box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.03); ;border-radius: 7px; background-color: #fff;" valign="top">
								<meta itemprop="name" content="Confirm Email" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
								<table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
									<tbody><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										You requested to reset your password at $siteName. Please confirm your email address by clicking the link below.
										</td>
									</tr>
									<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										To reset your password, please click this link (or you can copy and paste it in your browser)
										</td>
									</tr>
									<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" itemprop="handler" itemscope="" itemtype="http://schema.org/HttpActionHandler" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
											<a href="$activeUrl" itemprop="url" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #34c38f; margin: 0; border-color: #34c38f; border-style: solid; border-width: 8px 16px;">Reset password</a>
										</td>
									</tr>
									<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
											<b>$siteName</b>
											<p>Support Team</p>
										</td>
									</tr>
								</tbody>
								</table>
							</td>
						</tr>
					</tbody></table>
				</div>
			</td>
		</tr>
	</tbody></table>
EOT;
		sendMail($email, 'Reset password', $message, $this->data);
		$this->m_auth->deleteForgotPassword($user['id']);
		$this->m_auth->insertForgotPassword($user['id'], $token);
		$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'Please check your email for confirmation link'));
		return redirect(site_url('login'));
	}

	public function reset_password($token = '')
	{
		if (strlen($token) != 30 || !preg_match("/^[a-zA-Z0-9]+$/", $token)) {
			$this->session->set_flashdata('message', faucet_alert('danger', 'Failed'));
			return redirect(site_url('forgot-password'));
		}
		$token = trim($this->db->escape_str($token));
		$forgotPassword = $this->m_auth->checkForgotPassword($token);
		if (!$forgotPassword) {
			$this->session->set_flashdata('message', faucet_alert('danger', 'Failed'));
			return redirect(site_url('forgot-password'));
		}
		$user = $this->m_core->getUserFromId($forgotPassword['user_id']);
		if (!$user) {
			$this->session->set_flashdata('message', faucet_alert('danger', 'Failed'));
			return redirect(site_url('forgot-password'));
		}

		$newPassword = random_string('alnum', 15);
		$this->m_auth->update_password($user['id'], md5($newPassword));
		$siteName = $this->data['name'];
		$message = <<<EOT
			<table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
			<tbody><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
			<td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
			<td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
				<div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
					<table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope="" itemtype="http://schema.org/ConfirmAction" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
						<tbody><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
							<td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0;padding: 30px; box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.03); ;border-radius: 7px; background-color: #fff;" valign="top">
								<meta itemprop="name" content="Confirm Email" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
								<table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
									<tbody><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										You requested to reset your password at $siteName. Please confirm your email address by clicking the link below.
										</td>
									</tr>
									<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										Your temporary password is: <b>$newPassword</b>
										</td>
									</tr>
									<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
											<b>$siteName</b>
											<p>Support Team</p>
										</td>
									</tr>
								</tbody>
								</table>
							</td>
						</tr>
					</tbody></table>
				</div>
			</td>
		</tr>
	</tbody></table>
EOT;
		$this->db->delete('forgot_password', array('code' => $token));
		sendMail($user['email'], 'Your new password', $message, $this->data);
		$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'Please check your email for new password'));
		return redirect(site_url('forgot-password'));
	}

	public function logout()
	{
		session_destroy();
		return redirect(site_url('/'));
	}
}
