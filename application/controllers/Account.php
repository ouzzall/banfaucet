<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends Member_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['m_account', 'm_active', 'm_achievements']);
		$this->load->library('form_validation');
        checkDailyBonus($this->data['user']);
	}
	public function index()
	{
		$this->data['page'] = 'Profile';

		$this->data['referral_count'] = $this->m_account->get_ref($this->data['user']['id']);
    	$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    	$this->data['totalAchievements'] = count($this->data['achievements']);
		$this->data['countLotteries'] = $this->m_account->countLotteries($this->data['user']['id']);
		$this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }

		$this->render('account', $this->data);
	}
	public function history()
	{
		$this->data['page'] = 'Account History';

    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
		$this->data['task_history'] = $this->m_account->get_task_history($this->data['user']['id']);
		$this->data['lottery_history'] = $this->m_account->get_lottery_history($this->data['user']['id']);
		$this->data['offerwall_history'] = $this->m_account->get_offerwall_history($this->data['user']['id']);
		$this->data['withdrawals_history'] = $this->m_account->get_withdrawals_history($this->data['user']['id']);
		$this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->render('history', $this->data);
	}
	public function referrals()
	{
		$this->data['page'] = 'Referrals';
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
		$this->data['referrals'] = $this->m_account->getReferrals($this->data['user']['id']);
		$this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
        
		$this->render('referrals', $this->data);
	}

	public function update_password()
	{
		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|min_length[3]|md5');
		$this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[3]|md5');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]|md5');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', validation_errors()));
			return redirect(site_url('account'));
		}
		if ($this->input->post('old_password') != $this->data['user']['password']) {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Your current password is incorrect'));
			redirect(site_url('account'));
		}
		$password = $this->db->escape_str($this->input->post('password'));
		$this->m_account->update_password($this->data['user']['id'], $password);
		$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'Your password has been updated'));
		redirect(site_url('account'));
	}

	public function resend()
	{
		if ($this->data['user']['verified'] == 1) {
			return redirect(site_url('account'));
		}
		$oldActive = $this->m_active->getActiveByUserId($this->data['user']['id']);
		if ($oldActive && time() - $oldActive['create_time'] < 300) {
			$this->session->set_flashdata('sweet_message', faucet_info('info', 'You can only request once every 5 minutes'));
			return redirect(site_url('account'));
		}
		$siteName = $this->data['name'];
		$secret = random_string('alnum', 30);
		$activeUrl = site_url('/active/' . $secret);
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

		if (sendMail($this->data['user']['email'], 'Activate your account', $message, $this->data['settings'])) {
			$this->m_active->insertActive($this->data['user']['id'], $secret);
			$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'Email sent'));
		} else {
			$this->session->set_flashdata('sweet_message', faucet_alert('error', 'Failed to send email'));
		}
		return redirect(site_url('account'));
	}

	public function transfer()
	{
		$this->data['page'] = 'Transfer';
 	   	$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
 	   	$this->data['totalAchievements'] = count($this->data['achievements']);
		$this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->render('transfer', $this->data);
	}

	public function transfer_balance()
	{
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|is_numeric|greater_than[0]');

		if ($this->form_validation->run() == FALSE) {
			return redirect(site_url('/transfer'));
		}

		$amount = $this->input->post('amount') * $this->data['settings']['currency_rate'];
		if ($amount > $this->data['user']['balance']) {
			return redirect(site_url('/transfer'));
		}

		$this->m_account->reduceBalance($this->data['user']['id'], $amount);
		$this->m_account->transferBalance($this->data['user']['id'], $amount);
		$this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', $this->input->post('amount') . ' tokens have been added to your Deposit Balance'));
		return redirect(site_url('/transfer'));
	}
}
