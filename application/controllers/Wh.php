<?php
defined('BASEPATH') or exit('No direct script access allowed');
include APPPATH . 'third_party/coinbase/autoload.php';

use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Charge;
use CoinbaseCommerce\Webhook;

class Wh extends Guess_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['m_deposit', 'm_offerwall']);
		$this->data['settings'] = $this->m_core->getSettings();
		$this->data['whitelist_ips'] = [
			'coinbase' => [],
			'faucetpay' => [],
			'bitcotasks' => [
				'192.99.33.161'
			],
			'timewall' => [
				'173.44.49.203'
			],
			'lootably' => [
				'138.68.246.92',
				'138.68.251.146',
				'165.227.8.189',
				'45.55.107.76',
				'167.172.8.139',
				'161.35.240.12',
				'159.89.240.20',
				'159.203.52.153',
				'146.190.195.167',
				'138.197.59.120'
			],
			'adscendmedia' => [
				'54.204.57.82',
				'52.117.122.183',
				'52.117.127.192',
				'52.117.121.196'
			],
			'wannads' => [
				'34.250.159.173',
				'34.244.210.150',
				'52.212.236.135',
				'34.251.83.149'
			],
			'cpx' => [
				'188.40.3.73',
				'2a01:4f8:d0a:30ff::2',
				'157.90.97.92'
			],
			'offertoro' => [
				'54.175.173.245'
			],
			'ayetstudios' => [
				'35.165.166.40',
				'35.166.159.131',
				'52.40.3.140'
			],
			'personaly' => [
				'159.203.84.146',
				'52.200.142.249'
			],
			'bitswall' => [
				'188.165.198.204',
				'2001:41d0:2:8fcc::'
			],
			'payeer' => [
				'185.71.65.92',
				'185.71.65.189',
				'149.202.17.210'
			]
		];
	}

	public function coinbase()
	{
		if ($this->data['settings']['coinbase_deposit_status'] == 'off') {
			die();
		}
		$secret = $this->data['settings']['coinbase_secret'];
		$signraturHeader = isset($_SERVER['HTTP_X_CC_WEBHOOK_SIGNATURE']) ? $_SERVER['HTTP_X_CC_WEBHOOK_SIGNATURE'] : null;
		$payload = trim(file_get_contents('php://input'));

		try {
			$event = Webhook::buildEvent($payload, $signraturHeader, $secret);
			http_response_code(200);
			switch ($event->type) {
				case 'charge:created':
					$this->m_deposit->updateStatus($event->data->code, 'Created');
					break;
				case 'charge:confirmed':
					$this->m_deposit->updateStatus($event->data->code, 'Confirmed');
					$this->m_deposit->depositSuccess($event->data->code);
					break;
				case 'charge:failed':
					$this->m_deposit->updateStatus($event->data->code, 'Failed');
					break;
				case 'charge:delayed':
					$this->m_deposit->updateStatus($event->data->code, 'Delayed');
					break;
				case 'charge:pending':
					$this->m_deposit->updateStatus($event->data->code, 'Pending');
					break;
				case 'charge:resolved':
					$this->m_deposit->updateStatus($event->data->code, 'Confirmed');
					$this->m_deposit->updateStatus($event->data->code, 'Resolved');
					break;
			}
			echo sprintf('Successully verified event with id %s and type %s.', $event->id, $event->type);
		} catch (\Exception $exception) {
			http_response_code(400);
			echo 'Error occured. ' . $exception->getMessage();
		}
	}

	public function faucetpay()
	{
		if ($this->data['settings']['faucetpay_deposit_status'] == 'off') {
			die();
		}
		$token = $this->input->post('token');
		$validate = @json_decode(get_data('https://faucetpay.io/merchant/get-payment/' . $token), TRUE);
		if ($validate['valid'] && $validate['merchant_username'] == $this->data['settings']['faucetpay_username'] && $validate['currency1'] == 'USD' && $validate['amount1'] >= $this->data['settings']['faucetpay_min_deposit']) {
			if ($this->data['settings']['faucetpay_currency'] != "") {
				$faucetpayMethods = explode(',', $this->data['settings']['faucetpay_currency']);
				if (in_array($validate['currency2'], $faucetpayMethods)) {
					$this->m_deposit->addDeposit($validate['custom'], $validate['amount1'], $validate['transaction_id'], 1, 'Confirmed');
					$this->m_deposit->updateUser($validate['custom'], $validate['amount1']);
				}
			} else {
				$this->m_deposit->addDeposit($validate['custom'], $validate['amount1'], $validate['transaction_id'], 1, 'Confirmed');
				$this->m_deposit->updateUser($validate['custom'], $validate['amount1']);
			}
		}
	}

	public function payeer()
	{
		if (!in_array($this->input->ip_address(), $this->data['whitelist_ips']['payeer'])) {
			echo 'ok';
			die();
		}
		if (isset($_POST['m_operation_id']) && isset($_POST['m_sign'])) {
			$arHash = array(
				$_POST['m_operation_id'],
				$_POST['m_operation_ps'],
				$_POST['m_operation_date'],
				$_POST['m_operation_pay_date'],
				$_POST['m_shop'],
				$_POST['m_orderid'],
				$_POST['m_amount'],
				$_POST['m_curr'],
				$_POST['m_desc'],
				$_POST['m_status']
			);

			if (isset($_POST['m_params'])) {
				$arHash[] = $_POST['m_params'];
			}

			$arHash[] = $this->data['settings']['payeer_secret'];

			$sign_hash = strtoupper(hash('sha256', implode(':', $arHash)));

			if ($_POST['m_sign'] == $sign_hash && $_POST['m_status'] == 'success' && $_POST['m_amount'] >= $this->data['settings']['payeer_min_deposit']) {
				$orderId = $this->db->escape_str($_POST['m_orderid']);
				$this->m_deposit->updateStatus($orderId, 'Confirmed');
				$this->m_deposit->depositSuccess($orderId);
				die($_POST['m_orderid'] . '|success');
			}

			die($_POST['m_orderid'] . '|error');
		}
	}

	public function wannads()
	{
		if (!in_array($this->input->ip_address(), $this->data['whitelist_ips']['wannads'])) {
			die();
		}
		$userId = isset($_GET['subId']) ? $this->db->escape_str($_GET['subId']) : null;
		$transactionId = isset($_GET['transId']) ? $this->db->escape_str($_GET['transId']) : null;
		$reward = isset($_GET['reward']) ? $this->db->escape_str($_GET['reward']) : null;
		$signature = isset($_GET['signature']) ? $this->db->escape_str($_GET['signature']) : null;
		$action = isset($_GET['status']) ? $this->db->escape_str($_GET['status']) : null;
		$userIp = isset($_GET['userIp']) ? $this->db->escape_str($_GET['userIp']) : "0.0.0.0";

		if (md5($userId . $transactionId . $reward . $this->data['settings']['wannads_secret_key']) != $signature) {
			echo "ERROR: Signature doesn't match";
			return;
		}

		$trans = $this->m_offerwall->getTransaction($transactionId, 'wannads');
		if ($action == 2) {
			$this->m_offerwall->reduceUserBalance($userId, abs($reward));
			$this->m_offerwall->insertTransaction($userId, 'wannads', $userIp, $reward, $transactionId, 1, time());
			echo "OK";
		} else {
			if (!$trans) {
				$hold = 0;
				if ($reward > $this->data['settings']['offerwall_min_hold']) {
					$hold = $this->data['settings']['wannads_hold'];
				}
				if ($hold == 0) {
					$offerId = $this->m_offerwall->insertTransaction($userId, 'wannads', $userIp, $reward, $transactionId, 2, time());
					$this->m_offerwall->updateUserBalance($userId, $reward);
					$this->m_core->addNotification($userId, currencyDisplay($reward, $this->data['settings']) . " from Wannads Offer #" . $offerId . " was credited to your balance.", 1);

					$user = $this->m_core->getUserFromId($userId);
					$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
					if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
						$this->m_core->levelUp($user['id']);
					}
				} else {
					$availableAt = time() + $hold * 86400;
					$offerId = $this->m_offerwall->insertTransaction($userId, 'wannads', $userIp, $reward, $transactionId, 0, $availableAt);
					$this->m_core->addNotification($userId, "Your Wannads Offer #" . $offerId . " is pending approval.", 0);
				}
				echo "OK";
			} else {
				echo "DUP";
			}
		}
	}

	public function offertoro()
	{
		if (!in_array($this->input->ip_address(), $this->data['whitelist_ips']['offertoro'])) {
			echo 'ok';
			die();
		}
		$secret = $this->data['settings']['offertoro_app_secret'];

		$userId = isset($_GET['user_id']) ? $this->db->escape_str($_GET['user_id']) : 2;
		$transactionId = isset($_GET['oid']) ? $this->db->escape_str($_GET['oid']) : null;
		$offerId = isset($_GET['oid']) ? $this->db->escape_str($_GET['oid']) : null;
		$reward = isset($_GET['amount']) ? $this->db->escape_str($_GET['amount']) : null;
		$ipAddress = isset($_GET['ip_address']) ? $this->db->escape_str($_GET['ip_address']) : null;
		$signature = isset($_GET['sig']) ? $this->db->escape_str($_GET['sig']) : null;

		if (md5($offerId . '-' . $userId . '-' . $secret) != $signature) {
			echo 0;
			return;
		}

		if ($reward < 0) {
			$this->m_offerwall->reduceUserBalance($userId, abs($reward));
			$this->m_offerwall->insertTransaction($userId, 'Offertoro', $ipAddress, $reward, $transactionId, 1, time());
			echo 1;
		} else {
			$trans = $this->m_offerwall->getTransaction($transactionId, 'offertoro');
			if (!$trans) {
				$hold = 0;
				if ($reward > $this->data['settings']['offerwall_min_hold']) {
					$hold = $this->data['settings']['offertoro_hold'];
				}
				if ($hold == 0) {
					$offerId = $this->m_offerwall->insertTransaction($userId, 'offertoro', $ipAddress, $reward, $transactionId, 2, time());
					$this->m_offerwall->updateUserBalance($userId, $reward);
					$this->m_core->addNotification($userId, currencyDisplay($reward, $this->data['settings']) . " from Offertoro Offer #" . $offerId . " was credited to your balance.", 1);

					$user = $this->m_core->getUserFromId($userId);
					$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
					if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
						$this->m_core->levelUp($user['id']);
					}
				} else {
					$availableAt = time() + $hold * 86400;
					$offerId = $this->m_offerwall->insertTransaction($userId, 'offertoro', $ipAddress, $reward, $transactionId, 0, $availableAt);
					$this->m_core->addNotification($userId, "Your Offertoro Offer #" . $offerId . " is pending approval.", 0);
				}
				echo 1;
			} else {
				echo 1;
			}
		}
	}

	public function cpx()
	{
		if (!in_array($this->input->ip_address(), $this->data['whitelist_ips']['cpx'])) {
			echo 'ok';
			die();
		}
		$secret = $this->data['settings']['cpx_hash'];
		$userId = isset($_GET['user_id']) ? $this->db->escape_str($_GET['user_id']) : null;
		$action = isset($_GET['status']) ? $this->db->escape_str($_GET['status']) : null;
		$transactionId = isset($_GET['trans_id']) ? $this->db->escape_str($_GET['trans_id']) : null;
		$amountraw = isset($_GET['amount']) ? $this->db->escape_str($_GET['amount']) : null;
		$userIp = isset($_GET['ip_click']) ? $this->db->escape_str($_GET['ip_click']) : "0.0.0.0";
		$signature = isset($_GET['hash']) ? $this->db->escape_str($_GET['hash']) : null;

		if (md5($transactionId . '-' . $secret) != $signature) {
			echo "ERROR: Signature doesn't match";
			return;
		}

        $reward = $amountraw / 1000;
		$trans = $this->m_offerwall->getTransaction($transactionId, 'CPX Research');
		if ($action == 2) {
			$this->m_offerwall->reduceUserBalance($userId, abs($reward));
			$this->m_offerwall->insertTransaction($userId, 'CPX Research', $userIp, $reward, $transactionId, 1, time());
			echo "OK";
		} else {
			if (!$trans) {
				$hold = 0;
				if ($reward > $this->data['settings']['offerwall_min_hold']) {
					$hold = $this->data['settings']['cpx_hold'];
				}
				if ($hold == 0) {
					$offerId = $this->m_offerwall->insertTransaction($userId, 'CPX Research', $userIp, $reward, $transactionId, 2, time());
					$this->m_offerwall->updateUserBalance($userId, $reward);
					$this->m_core->addNotification($userId, currencyDisplay($reward, $this->data['settings']) . " from CPX Research Offer #" . $offerId . " was credited to your balance.", 1);

					$user = $this->m_core->getUserFromId($userId);
					$this->m_core->addEnergy($user['id'], $this->data['settings']['offerwall_energy']); 
					$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
					if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
						$this->m_core->levelUp($user['id']);
					}
				} else {
					$availableAt = time() + $hold * 86400;
					$offerId = $this->m_offerwall->insertTransaction($userId, 'CPX Research', $userIp, $reward, $transactionId, 0, $availableAt);
					$this->m_core->addNotification($userId, "Your CPX Research Offer #" . $offerId . " is pending approval.", 0);
				}
				echo "OK";
			} else {
				echo "DUP";
			}
		}
	}

	public function ayetstudios()
	{
		$userId = isset($_REQUEST['uid']) ? $this->db->escape_str($_REQUEST['uid']) : null;
		$transactionId = isset($_REQUEST['transaction_id']) ? $this->db->escape_str($_REQUEST['transaction_id']) : null;
		$action = isset($_REQUEST['is_chargeback']) ? $this->db->escape_str($_REQUEST['is_chargeback']) : null;
		$reward = isset($_REQUEST['currency_amount']) ? $this->db->escape_str($_REQUEST['currency_amount']) : null;
		$userIp = isset($_REQUEST['ip']) ? $this->db->escape_str($_REQUEST['ip']) : "not available";
		$signature = isset($_SERVER['HTTP_X_AYETSTUDIOS_SECURITY_HASH']) ? $this->db->escape_str($_SERVER['HTTP_X_AYETSTUDIOS_SECURITY_HASH']) : null;

		ksort($_REQUEST, SORT_STRING);
		$sortedQueryString = http_build_query($_REQUEST, '', '&');
		$securityHash = hash_hmac('sha256', $sortedQueryString, $this->data['settings']['ayetstudios_api']);
		error_log($_SERVER['HTTP_X_AYETSTUDIOS_SECURITY_HASH']);
		if ($securityHash != $signature) {
			echo "invalid signature";
			return;
		}

		$trans = $this->m_offerwall->getTransaction($transactionId, 'AyetStudios');
		if ($action == 1) {
			$this->m_offerwall->reduceUserBalance($userId, abs($reward));
			$this->m_offerwall->insertTransaction($userId, 'AyetStudios', $userIp, $reward, $transactionId, 1, time());
			echo "ok";
		} else {
			if (!$trans) {
				$hold = 0;
				if ($reward > $this->data['settings']['offerwall_min_hold']) {
					$hold = $this->data['settings']['ayetstudios_hold'];
				}
				if ($hold == 0) {
					$offerId = $this->m_offerwall->insertTransaction($userId, 'AyetStudios', $userIp, $reward, $transactionId, 2, time());
					$this->m_offerwall->updateUserBalance($userId, $reward);
					$this->m_core->addNotification($userId, currencyDisplay($reward, $this->data['settings']) . " from AyetStudios Offer #" . $offerId . " was credited to your balance.", 1);

					$user = $this->m_core->getUserFromId($userId);
					$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
					if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
						$this->m_core->levelUp($user['id']);
					}
				} else {
					$availableAt = time() + $hold * 86400;
					$offerId = $this->m_offerwall->insertTransaction($userId, 'AyetStudios', $userIp, $reward, $transactionId, 0, $availableAt);
					$this->m_core->addNotification($userId, "Your AyetStudios Offer #" . $offerId . " is pending approval.", 0);
				}
				echo "ok";
			} else {
				echo "ok";
			}
		}
	}
	public function offerdaddy()
	{
		$transactionId = $this->db->escape_str(urldecode($_GET["transaction_id"]));
		$offer_id = $this->db->escape_str(urldecode($_GET["offer_id"]));
		$amountraw = $this->db->escape_str(urldecode($_GET["amount"]));
		$userId = $this->db->escape_str(urldecode($_GET["userid"]));
		$signature = urldecode($_GET["signature"]);

		//Check the signature
		$validationSignature = md5($transactionId . "/" . $offer_id . "/" . $this->data['settings']['offerdaddy_app_key']);

		if ($validationSignature != trim($signature)) {
			echo "0";
			die();
		}

        $reward = $amountraw / 1000;
		$trans = $this->m_offerwall->getTransaction($transactionId, 'OfferDady');
		if ($reward < 0) {
			$this->m_offerwall->reduceUserBalance($userId, abs($reward));
			$this->m_offerwall->insertTransaction($userId, 'OfferDady', 'not available', $reward, $transactionId, 1, time());
			echo "1";
		} else {
			if (!$trans) {
				$hold = 0;
				if ($reward > $this->data['settings']['offerwall_min_hold']) {
					$hold = $this->data['settings']['offerdaddy_hold'];
				}
				if ($hold == 0) {
					$offerId = $this->m_offerwall->insertTransaction($userId, 'OfferDady', 'not available', $reward, $transactionId, 2, time());
					$this->m_offerwall->updateUserBalance($userId, $reward);
					$this->m_core->addNotification($userId, currencyDisplay($reward, $this->data['settings']) . " from OfferDady Offer #" . $offerId . " was credited to your balance.", 1);

					$user = $this->m_core->getUserFromId($userId);
					$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
					if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
						$this->m_core->levelUp($user['id']);
					}
				} else {
					$availableAt = time() + $hold * 86400;
					$offerId = $this->m_offerwall->insertTransaction($userId, 'OfferDady', 'not available', $reward, $transactionId, 0, $availableAt);
					$this->m_core->addNotification($userId, "Your OfferDady Offer #" . $offerId . " is pending approval.", 0);
				}
				echo "1";
			} else {
				echo "1";
			}
		}
	}
	public function personaly()
	{
		if (!in_array($this->input->ip_address(), $this->data['whitelist_ips']['personaly'])) {
			echo 'ok';
			die();
		}
		$transactionId = isset($_GET['offer_id']) ? $this->db->escape_str($_GET['offer_id']) : null;
		$reward = isset($_GET['amount']) ? $this->db->escape_str($_GET['amount']) : null;
		$userId = isset($_GET['user_id']) ? $this->db->escape_str($_GET['user_id']) : null;
		$userIp = isset($_GET['user_ip']) ? $this->db->escape_str($_GET['user_ip']) : "not available";
		$signature = isset($_GET['signature']) ? $this->db->escape_str($_GET['signature']) : "null";

		//Check the signature
		$validationSignature = md5($userId . ':' . $this->data['settings']['personaly_hash'] . ':' . $this->data['settings']['personaly_secret_key']);

		if ($validationSignature != trim($signature)) {
			echo "0";
			die();
		}

		if ($reward < 0) {
			$this->m_offerwall->reduceUserBalance($userId, abs($reward));
			$this->m_offerwall->insertTransaction($userId, 'Persona.ly', $userIp, $reward, $transactionId, 1, time());
			echo "1";
		} else {
			$hold = 0;
			if ($reward > $this->data['settings']['offerwall_min_hold']) {
				$hold = $this->data['settings']['personaly_hold'];
			}
			if ($hold == 0) {
				$offerId = $this->m_offerwall->insertTransaction($userId, 'Persona.ly', $userIp, $reward, $transactionId, 2, time());
				$this->m_offerwall->updateUserBalance($userId, $reward);
				$this->m_core->addNotification($userId, currencyDisplay($reward, $this->data['settings']) . " from Persona.ly Offer #" . $offerId . " was credited to your balance.", 1);

				$user = $this->m_core->getUserFromId($userId);
				$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
				if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
					$this->m_core->levelUp($user['id']);
				}
			} else {
				$availableAt = time() + $hold * 86400;
				$offerId = $this->m_offerwall->insertTransaction($userId, 'Persona.ly', $userIp, $reward, $transactionId, 0, $availableAt);
				$this->m_core->addNotification($userId, "Your Persona.ly Offer #" . $offerId . " is pending approval.", 0);
			}
			echo "1";
		}
	}

	public function pollfish()
	{
		$transactionId = isset($_GET['tx_id']) ? $this->db->escape_str($_GET['tx_id']) : null;
		$reward = isset($_GET['reward_value']) ? $this->db->escape_str($_GET['reward_value']) : null;
		$status = isset($_GET['status']) ? $this->db->escape_str($_GET['status']) : null;
		$userId = isset($_GET['request_uuid']) ? $this->db->escape_str($_GET['request_uuid']) : null;
		$userIp = isset($_GET['user_ip']) ? $this->db->escape_str($_GET['user_ip']) : "not available";
		$signature = isset($_GET['signature']) ? $this->db->escape_str($_GET['signature']) : "null";

		$cpa = rawurldecode($_GET["cpa"]);
		$device_id = rawurldecode($_GET["device_id"]);
		$reward_name = rawurldecode($_GET["reward_name"]);
		$timestamp = rawurldecode($_GET["timestamp"]);

		$data = $cpa . ":" . $device_id;
		if (!empty($userId)) {
			$data = $data . ":" . $userId;
		}
		$data = $data . ":" . $reward_name . ":" . $reward . ":" . $status . ":" . $timestamp . ":" . $transactionId;

		$computedSignature = base64_encode(hash_hmac("sha1", $data, $this->data['settings']['pollfish_secret'], true));
		if ($signature == $computedSignature) {
			if ($status == 'eligible') {
				if ($this->data['settings']['pollfish_hold'] == 0) {
					$offerId = $this->m_offerwall->insertTransaction($userId, 'Pollfish', $userIp, $reward, $transactionId, 2, time());
					$this->m_offerwall->updateUserBalance($userId, $reward);
					$this->m_core->addNotification($userId, currencyDisplay($reward, $this->data['settings']) . " from Pollfish Offer #" . $offerId . " was credited to your balance.", 1);

					$user = $this->m_core->getUserFromId($userId);
					$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
					if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
						$this->m_core->levelUp($user['id']);
					}
				} else {
					$availableAt = time() + $this->data['settings']['pollfish_hold'] * 86400;
					$offerId = $this->m_offerwall->insertTransaction($userId, 'Pollfish', $userIp, $reward, $transactionId, 0, $availableAt);
					$this->m_core->addNotification($userId, "Your Pollfish Offer #" . $offerId . " is pending approval.", 0);
				}
				echo "1";
			} else {
				$this->m_offerwall->insertTransaction($userId, 'Pollfish', $userIp, $reward, $transactionId, 1, time());
			}
		}
	}

	public function bitswall()
	{
		// if (!in_array($this->input->ip_address(), $this->data['whitelist_ips']['bitswall'])) {
		// 	echo 'ok';
		// 	die();
		// }
		$userId = isset($_REQUEST['subId']) ? $this->db->escape_str($_REQUEST['subId']) : null;
		$transactionId = isset($_REQUEST['transId']) ? $this->db->escape_str($_REQUEST['transId']) : null;
		$reward = isset($_REQUEST['reward']) ? $this->db->escape_str($_REQUEST['reward']) : null;
		$userIp = isset($_REQUEST['userIp']) ? $this->db->escape_str($_REQUEST['userIp']) : "0.0.0.0";
		$signature = isset($_REQUEST['signature']) ? $this->db->escape_str($_REQUEST['signature']) : null;
		if (md5($userId . $transactionId . $reward . $this->data['settings']['bitswall_secret']) != $signature) {
			echo "ERROR: Signature doesn't match";
			return;
		}

		$amountraw = $reward / 1000;
		$trans = $this->m_offerwall->getTransaction($transactionId, 'Bitswall');
		if (!$trans) {
			$hold = 0;
			if ($amountraw > $this->data['settings']['offerwall_min_hold']) {
				$hold = $this->data['settings']['offerwall_min_hold'];
			}
			if ($hold == 0) {
				$offerId = $this->m_offerwall->insertTransaction($userId, 'Bitswall', $userIp, $amountraw, $transactionId, 2, time());
				$this->m_offerwall->updateUserBalance($userId, $amountraw);
				$this->m_core->addNotification($userId, currencyDisplay($amountraw, $this->data['settings']) . " from Bitswall Offer #" . $offerId . " was credited to your balance.", 1);

				$user = $this->m_core->getUserFromId($userId);
				$this->m_core->addEnergy($user['id'], $this->data['settings']['offerwall_energy']); 
				$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
				if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
					$this->m_core->levelUp($user['id']);
				}
			} else {
				$availableAt = time() + $hold * 86400;
				$offerId = $this->m_offerwall->insertTransaction($userId, 'Bitswall', $userIp, $amountraw, $transactionId, 0, $availableAt);
				$this->m_core->addNotification($userId, "Your Bitswall Offer #" . $offerId . " is pending approval.", 0);
			}
			echo "ok";
		} else {
			echo "DUP";
		}
	}

	public function bitcotasks()
	{
		// if (!in_array($this->input->ip_address(), $this->data['whitelist_ips']['bitcotasks'])) {
		// 	echo 'ok';
		// 	die();
		// }
		$secret = "c795091016c7723c3ed9d2e9023c3c93";
		$userId = isset($_REQUEST['subId']) ? $this->db->escape_str($_REQUEST['subId']) : null;
		$transactionId = isset($_REQUEST['transId']) ? $this->db->escape_str($_REQUEST['transId']) : null;
		$reward = isset($_REQUEST['reward']) ? $this->db->escape_str($_REQUEST['reward']) : null;
		$userIp = isset($_REQUEST['userIp']) ? $this->db->escape_str($_REQUEST['userIp']) : "0.0.0.0";
		$signature = isset($_REQUEST['signature']) ? $this->db->escape_str($_REQUEST['signature']) : null;
		if (md5($userId . $transactionId . $reward . $secret) != $signature) {
			echo "ERROR: Signature doesn't match";
			return;
		}

		$amountraw = $reward / 1000;
		$trans = $this->m_offerwall->getTransaction($transactionId, 'BitcoTasks');
		if (!$trans) {
			$hold = 0;
			if ($amountraw > $this->data['settings']['offerwall_min_hold']) {
				$hold = $this->data['settings']['offerwall_min_hold'];
			}
			if ($hold == 0) {
				$offerId = $this->m_offerwall->insertTransaction($userId, 'BitcoTasks', $userIp, $amountraw, $transactionId, 2, time());
				$this->m_offerwall->updateUserBalance($userId, $amountraw);
				$this->m_core->addNotification($userId, currencyDisplay($amountraw, $this->data['settings']) . " from BitcoTasks Offer #" . $offerId . " was credited to your balance.", 1);

				$user = $this->m_core->getUserFromId($userId);
				$this->m_core->addEnergy($user['id'], $this->data['settings']['offerwall_energy']); 
				$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
				if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
					$this->m_core->levelUp($user['id']);
				}
			} else {
				$availableAt = time() + $hold * 86400;
				$offerId = $this->m_offerwall->insertTransaction($userId, 'BitcoTasks', $userIp, $amountraw, $transactionId, 0, $availableAt);
				$this->m_core->addNotification($userId, "Your BitcoTasks Offer #" . $offerId . " is pending approval.", 0);
			}
			echo "ok";
		} else {
			echo "DUP";
		}
	}

	public function monlix()
	{
		// UPDATE YOUR SECRET KEY
		$secretKey = $this->data['settings']['monlix_secret'];
		$hold = $this->data['settings']['monlix_hold'];
		$userId = isset($_GET['userId']) ? $this->db->escape_str($_GET['userId']) : null;
		$userIp = isset($_GET['userIp']) ? $this->db->escape_str($_GET['userIp']) : "0.0.0.0";
		$transactionId = isset($_GET['transactionId']) ? $this->db->escape_str($_GET['transactionId']) : null;
		$amountraw = isset($_GET['rewardValue']) ? $this->db->escape_str($_GET['rewardValue']) : null;
		$action = isset($_GET['status']) ? $this->db->escape_str($_GET['status']) : null;
		$signature = isset($_GET['secretKey']) ? $this->db->escape_str($_GET['secretKey']) : null;
		if ($secretKey != $signature) {
			echo "ERROR: Signature doesn't match";
			return;
		}
		$reward = $amountraw / 1000;
		$trans = $this->m_offerwall->getTransaction($transactionId, 'Monlix');
		if ($action == 2) {
			$this->m_offerwall->reduceUserBalance($userId, abs($reward));
			$this->m_offerwall->insertTransaction($userId, 'Monlix', $userIp, $reward, $transactionId, 1, time());
			echo "OK";
		} else {
			if (!$trans) {
				$hold = 0;
				if ($reward > $this->data['settings']['offerwall_min_hold']) {
					$hold = $this->data['settings']['offerwall_min_hold'];
				}
				if ($hold == 0) {
					$offerId = $this->m_offerwall->insertTransaction($userId, 'Monlix', $userIp, $reward, $transactionId, 2, time());
					$this->m_offerwall->updateUserBalance($userId, $reward);
					$this->m_core->addNotification($userId, currencyDisplay($reward, $this->data['settings']) . " from Monlix Offer #" . $offerId . " was credited to your balance.", 1);
					$user = $this->m_core->getUserFromId($userId);
					$this->m_core->addEnergy($user['id'], $this->data['settings']['offerwall_energy']); 
					$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
					if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
						$this->m_core->levelUp($user['id']);
					}
				} else {
					$availableAt = time() + $hold * 86400;
					$offerId = $this->m_offerwall->insertTransaction($userId, 'Monlix', $userIp, $reward, $transactionId, 0, $availableAt);
					$this->m_core->addNotification($userId, "Your Monlix Offer #" . $offerId . " is pending approval.", 0);
				}
				echo "OK";
			} else {
				echo "DUP";
			}
		}
	}
	public function offeroc() 
   { 
             $secret ="dfbf405e724138865f9e0648fd95499f"; // UPDATE YOUR SECRET KEY 
             $minHold= $this->data['settings']['offerwall_min_hold']; // Reward Lower than this amount will not be hold 
             
             $userId = isset($_REQUEST['subId']) ? $this->db->escape_str($_REQUEST['subId']) : null; 
             $transactionId = isset($_REQUEST['transId']) ? $this->db->escape_str($_REQUEST['transId']) : null; 
             $reward = isset($_REQUEST['reward']) ? $this->db->escape_str($_REQUEST['reward']) : null; 
             $userIp = isset($_REQUEST['userIp']) ? $this->db->escape_str($_REQUEST['userIp']) : "0.0.0.0"; 
             $signature = isset($_REQUEST['signature']) ? $this->db->escape_str($_REQUEST['signature']) : null; 
             if (md5($userId . $transactionId . $reward . $secret) != $signature) { 
             echo "ERROR: Signature doesn't match"; 
             return; 
             } 
             
		 $amountraw = $reward / 1000;
		 if ($amountraw < 0) {
             $this->m_offerwall->reduceUserBalance($userId, abs($amountraw)); 
             $this->m_offerwall->insertTransaction($userId, 'Offeroc', $userIp, $amountraw, $transactionId, 1, time()); 
             echo "ok"; 
		} else {
			$trans = $this->m_offerwall->getTransaction($transactionId, 'Offeroc');
			if (!$trans) {
				$hold = 0;
				if ($amountraw > $this->data['settings']['offerwall_min_hold']) {
					$hold = $this->data['settings']['offerwall_min_hold'];
				}
				if ($hold == 0) {
					$offerId = $this->m_offerwall->insertTransaction($userId, 'Offeroc', $userIp, $amountraw, $transactionId, 2, time());
					$this->m_offerwall->updateUserBalance($userId, $amountraw);
					$this->m_core->addNotification($userId, currencyDisplay($amountraw, $this->data['settings']) . " from Offeroc #" . $offerId . " was credited to your balance.", 1);

					$user = $this->m_core->getUserFromId($userId);
					$this->m_core->addEnergy($user['id'], $this->data['settings']['offerwall_energy']); 
					$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
					if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
						$this->m_core->levelUp($user['id']);
					}
				} else {
					$availableAt = time() + $hold * 86400;
					$offerId = $this->m_offerwall->insertTransaction($userId, 'Offeroc', $userIp, $amountraw, $transactionId, 0, $availableAt);
					$this->m_core->addNotification($userId, "Your Offeroc #" . $offerId . " is pending approval.", 0);
				}
				echo "OK";
			} else {
				echo "DUP";
			}
		}
	}
	public function walloffer() 
   { 
             $secret ="a5c7a717a06438b6dab7d618f36f0e22"; // UPDATE YOUR SECRET KEY 
             $minHold= $this->data['settings']['offerwall_min_hold']; // Reward Lower than this amount will not be hold 
             
             $userId = isset($_REQUEST['subId']) ? $this->db->escape_str($_REQUEST['subId']) : null; 
             $transactionId = isset($_REQUEST['transId']) ? $this->db->escape_str($_REQUEST['transId']) : null; 
             $reward = isset($_REQUEST['reward']) ? $this->db->escape_str($_REQUEST['reward']) : null; 
             $action = isset($_REQUEST['status']) ? $this->db->escape_str($_REQUEST['status']) : null; 
             $userIp = isset($_REQUEST['userIp']) ? $this->db->escape_str($_REQUEST['userIp']) : "0.0.0.0"; 
             $signature = isset($_REQUEST['signature']) ? $this->db->escape_str($_REQUEST['signature']) : null; 
             if (md5($userId . $transactionId . $reward . $secret) != $signature) { 
             echo "ERROR: Signature doesn't match"; 
             return; 
             } 
             
		 $amountraw = $reward / 1000;
             $trans = $this->m_offerwall->getTransaction($transactionId, 'Walloffer'); 
             if ($action == 2) { 
             $this->m_offerwall->reduceUserBalance($userId, abs($amountraw)); 
             $this->m_offerwall->insertTransaction($userId, 'Walloffer', $userIp, $amountraw, $transactionId, 1, time()); 
             echo "ok"; 
             } 
             if($action == 1) { 
       if (!$trans) { 
       if ($amountraw >= $minHold) { 
           $hold = 0; // UPDATE HOLD DAYS Which you Use for hold 
        } 
        else{ 
            $hold = 0; 
        } 
       
       if ($hold == 0) { 
       $offerId = $this->m_offerwall->insertTransaction($userId, 'Walloffer', $userIp, $amountraw, $transactionId, 2, time()); 
       $this->m_offerwall->updateUserBalance($userId, $amountraw); 
       $this->m_core->addNotification($userId, currencyDisplay($amountraw, $this->data['settings']) . " from Walloffer #" . $offerId . " was credited to your balance.", 1); 
             
       $user = $this->m_core->getUserFromId($userId); 
       $this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']); 
       if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) { 
       $this->m_core->levelUp($user['id']); 
       } 
       } else { 
       $availableAt = time() + $hold * 86400; 
       $offerId = $this->m_offerwall->insertTransaction($userId, 'Walloffer', $userIp, $amountraw, $transactionId, 0, $availableAt); 
       $this->m_core->addNotification($userId, "Your Walloffer #" . $offerId . " is pending approval.", 0); 
       } 
       echo "ok"; 
       } else { 
       echo "DUP"; 
       } 
     } 
   }
	public function timewall() 
   { 
             $secret ="5ff92c48b77d915969d44a17a89b0eb0"; // UPDATE YOUR SECRET KEY 
             $minHold= $this->data['settings']['offerwall_min_hold']; // Reward Lower than this amount will not be hold 
             
             $userId = isset($_GET['userID']) ? $this->db->escape_str($_GET['userID']) : null; 
             $transactionId = isset($_GET['transactionID']) ? $this->db->escape_str($_GET['transactionID']) : null; 
             $reward = isset($_GET['currencyAmount']) ? $this->db->escape_str($_GET['currencyAmount']) : null; 
		 $revenue = isset($_GET['revenue']) ? $this->db->escape_str($_GET['revenue']) : null;
             $signature = isset($_GET['hash']) ? $this->db->escape_str($_GET['hash']) : null; 
             if (hash("sha256", $userId . $revenue . $secret) != $signature) { 
             echo "ERROR: Signature doesn't match"; 
             die(); 
             } 
             
		$amountraw = $reward / 1000;
		if ($amountraw < 0) {
			$this->m_offerwall->reduceUserBalance($userId, abs($amountraw));
			$this->m_offerwall->insertTransaction($userId, 'Timewall', 'not available', $amountraw, $transactionId, 1, time());
			echo "OK";
		} else {
			$trans = $this->m_offerwall->getTransaction($transactionId, 'Timewall');
			if (!$trans) {
				$hold = 0;
				if ($amountraw > $this->data['settings']['offerwall_min_hold']) {
					$hold = $this->data['settings']['offerwall_min_hold'];
				}
				if ($hold == 0) {
					$offerId = $this->m_offerwall->insertTransaction($userId, 'Timewall', 'not available', $amountraw, $transactionId, 2, time());
					$this->m_offerwall->updateUserBalance($userId, $amountraw);
					$this->m_core->addNotification($userId, currencyDisplay($amountraw, $this->data['settings']) . " from Timewall Offer #" . $offerId . " was credited to your balance.", 1);

					$user = $this->m_core->getUserFromId($userId);
					$this->m_core->addEnergy($user['id'], $this->data['settings']['offerwall_energy']); 
					$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']);
					if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) {
						$this->m_core->levelUp($user['id']);
					}
				} else {
					$availableAt = time() + $hold * 86400;
					$offerId = $this->m_offerwall->insertTransaction($userId, 'Timewall', 'not available', $amountraw, $transactionId, 0, $availableAt);
					$this->m_core->addNotification($userId, "Your Timewall Offer #" . $offerId . " is pending approval.", 0);
				}
				echo "OK";
			} else {
				echo "DUP";
			}
		}
	}

public function bitlabs() 
    { 
        
		
		
	  $secret = "aI84B7pcVPRwVMtbgij051KQ77qU9Xfz";
        $userId = isset($_GET['uid']) ? $this->db->escape_str($_GET['uid']) : null; 
        $transactionId = isset($_GET['tx']) ? $this->db->escape_str($_GET['tx']) : null; 
        $amountraw = isset($_GET['val']) ? $this->db->escape_str($_GET['val']) : null; 
        $action = isset($_GET['type']) ? $this->db->escape_str($_GET['type']) : null; 
        $params = isset($_GET['hash']) ? $this->db->escape_str($_GET['hash']) : null; 

	  $protocol = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http";
	  $url = "$protocol://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	  $url_components = parse_url($url);
	  parse_str($url_components["query"], $params);
	  $url_val = substr($url, 0, -strlen("&hash=$params[hash]"));

		$hash = hash_hmac("sha1", $url_val, $secret);
        if($params["hash"] === $hash){ 
  		echo "valid";
	} else {
  		echo "invalid";
	}

  $reward = $amountraw / 1000;
  $trans = $this->m_offerwall->getTransaction($transactionId, 'Bitlabs'); 
  if ($action == RECONCILIATION) { 
   $this->m_offerwall->reduceUserBalance($userId, abs($reward)); 
   $this->m_offerwall->insertTransaction($userId, 'Bitlabs', 'not available', $reward, $transactionId, 1, time()); 
   echo "valid"; 
  } else { 
   if (!$trans) { 
    $hold = 0; 
    if ($reward > $this->data['settings']['offerwall_min_hold']) { 
     $hold = $this->data['settings']['offerwall_min_hold']; 
    } 
    if ($hold == 0) { 
     $offerId = $this->m_offerwall->insertTransaction($userId, 'Bitlabs', 'not available', $reward, $transactionId, 2, time()); 
     $this->m_offerwall->updateUserBalance($userId, $reward); 
     $this->m_core->addNotification($userId, currencyDisplay($reward, $this->data['settings']) . " from Bitlabs Offer #" . $offerId . " was credited to your balance.", 1); 
     $user = $this->m_core->getUserFromId($userId); 
     $this->m_core->addEnergy($user['id'], $this->data['settings']['offerwall_energy']); 
     $this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']); 
     if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) { 
      $this->m_core->levelUp($user['id']); 
     } 
    } else { 
     $availableAt = time() + $hold * 86400; 
     $offerId = $this->m_offerwall->insertTransaction($userId, 'Bitlabs', 'not available', $reward, $transactionId, 0, $availableAt); 
     $this->m_core->addNotification($userId, "Your Bitlabs Offer #" . $offerId . " is pending approval.", 0); 
    } 
    echo "valid"; 
   } else { 
    echo "DUP"; 
   } 
  } 
 }

public function adscendmedia() 
    { 
        
		
		
	  	$secret = $this->data['settings']['adscend_secret'];
        $userId = isset($_GET['sub1']) ? $this->db->escape_str($_GET['sub1']) : null; 
        $userIp = isset($_GET['ip']) ? $this->db->escape_str($_GET['ip']) : "0.0.0.0"; 
        $transactionId = isset($_GET['transaction_id']) ? $this->db->escape_str($_GET['transaction_id']) : null; 
        $amountraw = isset($_GET['rate']) ? $this->db->escape_str($_GET['rate']) : null; 
        $action = isset($_GET['status']) ? $this->db->escape_str($_GET['status']) : null; 
        $signature = isset($_GET['hash']) ? $this->db->escape_str($_GET['hash']) : null; 

		$hash = hash_hmac('md5', "rate=".$amountraw."&sub1=".$userId."&transaction_id=".$transactionId."&status=".$action."&ip=".$userIp."", $this->data['settings']['adscend_secret']);
		 
        if($hash != $signature){ 
            echo "Signature doesn't match"; 
            die(); 
        } 

  $reward = $amountraw / 1000;
  $trans = $this->m_offerwall->getTransaction($transactionId, 'AdscendMedia'); 
  if ($action == 2) { 
   $this->m_offerwall->reduceUserBalance($userId, abs($reward)); 
   $this->m_offerwall->insertTransaction($userId, 'AdscendMedia', $userIp, $reward, $transactionId, 1, time()); 
   echo "OK"; 
  } else { 
   if (!$trans) { 
    $hold = 0; 
    if ($reward > $this->data['settings']['offerwall_min_hold']) { 
     $hold = $this->data['settings']['offerwall_min_hold']; 
    } 
    if ($hold == 0) { 
     $offerId = $this->m_offerwall->insertTransaction($userId, 'AdscendMedia', $userIp, $reward, $transactionId, 2, time()); 
     $this->m_offerwall->updateUserBalance($userId, $reward); 
     $this->m_core->addNotification($userId, currencyDisplay($reward, $this->data['settings']) . " from AdscendMedia Offer #" . $offerId . " was credited to your balance.", 1); 
     $user = $this->m_core->getUserFromId($userId); 
     $this->m_core->addEnergy($user['id'], $this->data['settings']['offerwall_energy']); 
     $this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']); 
     if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) { 
      $this->m_core->levelUp($user['id']); 
     } 
    } else { 
     $availableAt = time() + $hold * 86400; 
     $offerId = $this->m_offerwall->insertTransaction($userId, 'AdscendMedia', $userIp, $reward, $transactionId, 0, $availableAt); 
     $this->m_core->addNotification($userId, "Your AdscendMedia Offer #" . $offerId . " is pending approval.", 0); 
    } 
    echo "OK"; 
   } else { 
    echo "DUP"; 
   } 
  } 
 }
	public function lootably()
	{ 


		// $_GET=json_decode('{"userID":"1","ip":"0.0.0.0","status":"1","siterevenue":"100","userCut":"100","transactionID":"cl4iwy90h001x01zwfpep2pbq","hash":"6aca8d84613cebe27dd81a67619debc91dc498d537a50767c16fa13c57e24e89"}',true);
		// $this->db->insert('test',array('type'=>'get','data'=>json_encode($_GET)));

		$minHold= $this->data['settings']['offerwall_min_hold'];
		$userId = isset($_GET['userID']) ? $this->db->escape_str($_GET['userID']) : null; 
		$transactionId = isset($_GET['transactionID']) ? $this->db->escape_str($_GET['transactionID']) : null; 
		$reward = isset($_GET['userCut']) ? $this->db->escape_str($_GET['userCut']) : null;
		$revenue = isset($_GET['siterevenue']) ? $this->db->escape_str($_GET['siterevenue']) : null;  
		$action = isset($_GET['status']) ? $this->db->escape_str($_GET['status']) : null; 
		$userIp = isset($_GET['ip']) ? $this->db->escape_str($_GET['ip']) : "0.0.0.0"; 
		$signature = isset($_GET['hash']) ? $this->db->escape_str($_GET['hash']) : null;


            if (hash("sha256", $userId.$userIp.$revenue.$reward."GAwL13QPJonjv8KD1aqPTVRC5yTBCpMqHJv8WZuqTgjj2qoDOwrjoqEGkuJccfxM7ph4gBImVGTLuLXskOdw") != $signature) { 
				echo "Signature doesn't match"; 
             	return; 
            } 

		

			// die();
			

             
		 	$amountraw = $reward / 1000;
            $trans = $this->m_offerwall->getTransaction($transactionId, 'Lootably'); 



            if ($action == 0) { 
				$this->m_offerwall->reduceUserBalance($userId, abs($amountraw)); 
				$this->m_offerwall->insertTransaction($userId, 'Lootably', $userIp, $amountraw, $transactionId, 1, time()); 
				echo "1"; 
				
            } else {
				if (!$trans) { 
					$hold = 0;
					if ($amountraw > $this->data['settings']['offerwall_min_hold']) {
						$hold = $this->data['settings']['offerwall_min_hold'];
					}
		
						if ($hold == 0) { 
							$offerId = $this->m_offerwall->insertTransaction($userId, 'Lootably', $userIp, $amountraw, $transactionId, 2, time()); 
							$this->m_offerwall->updateUserBalance($userId, $amountraw); 
							$this->m_core->addNotification($userId, currencyDisplay($amountraw, $this->data['settings']) . " from Lootably Offer #" . $offerId . " was credited to your balance.", 1); 
									
							$user = $this->m_core->getUserFromId($userId);
							$this->m_core->addEnergy($user['id'], $this->data['settings']['offerwall_energy']);  
							$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']); 
							if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) { 
								$this->m_core->levelUp($user['id']); 
							} 
						} else { 
							$availableAt = time() + $hold * 86400; 
							$offerId = $this->m_offerwall->insertTransaction($userId, 'Lootably', $userIp, $amountraw, $transactionId, 0, $availableAt); 
							$this->m_core->addNotification($userId, "Your Lootably Offer #" . $offerId . " is pending approval.", 0); 
						} 
					 echo "1"; 
				} else { 
					echo "0"; 
				} 
     		} 
			 die();
   	}
	public function theoremreach()
	{ 
		// $_GET=json_decode('{"user_id":"12345","app_id":"20666","reward":"25","status":"1","currency":"0.31","screenout":"2","profiler":"2","tx_id":"5970413d19d6eaf18b86e912da0d","debug":"true","hash":"A-zbotduc015RDXIfUQOovTTpk0"}',true);
		
		// $this->db->insert('test',array('type'=>'get','data'=>$actual_link));

		// die();

		$minHold= $this->data['settings']['offerwall_min_hold'];
		$userId = isset($_GET['user_id']) ? $this->db->escape_str($_GET['user_id']) : null; 
		$transactionId = isset($_GET['tx_id']) ? $this->db->escape_str($_GET['tx_id']) : null; 
		$amountraw = isset($_GET['reward']) ? $this->db->escape_str($_GET['reward']) : null;
		$revenue = isset($_GET['currency']) ? $this->db->escape_str($_GET['currency']) : null;  
		$action = isset($_GET['status']) ? $this->db->escape_str($_GET['status']) : null; 
		$signature = isset($_GET['hash']) ? $this->db->escape_str($_GET['hash']) : null;
		$userIp = isset($_GET['ip']) ? $this->db->escape_str($_GET['ip']) : "0.0.0.0"; 
		$URL = array(
			'user_id' => $_GET['user_id'],
			'app_id' => $_GET['app_id'],
			'reward' => $_GET['reward'],
			'status' => $_GET['status'],
			'currency' => $_GET['currency'],
			'screenout' => $_GET['screenout'],
			'profiler' => $_GET['profiler'],
			'tx_id' => $_GET['tx_id'],
			'debug' => $_GET['debug']
		);
		$encoded_key = utf8_encode('a5d64312ac7a2c42743a5028fe26f5dd2b1cce4e');
		$encoded_URL = utf8_encode('https://banfaucet.com/new/wh/theoremreach?'.http_build_query($URL));
		$hashed = hash_hmac('sha1', $encoded_URL, $encoded_key);
		$digested_hash = pack('H*',$hashed);
		$base64_encoded_result = base64_encode($digested_hash);
		$hash_genrated = str_replace(["+","/","="],["-","_",""],utf8_decode($base64_encoded_result));
        
		if ($hash_genrated != $signature) { 
			echo "Signature doesn't match"; 
			 return; 
		} 


		$reward = $amountraw / 1000;
        $trans = $this->m_offerwall->getTransaction($transactionId, 'TheoremReach'); 


		if ($action == 2) { 
			$this->m_offerwall->reduceUserBalance($userId, abs($reward)); 
			$this->m_offerwall->insertTransaction($userId, 'TheoremReach', $userIp, $reward, $transactionId, 1, time()); 
			echo "OK"; 
		} else { 
			if (!$trans) { 
				$hold = 0; 
				if ($reward > $this->data['settings']['offerwall_min_hold']) { 
					$hold = $this->data['settings']['offerwall_min_hold']; 
				} 
				if ($hold == 0) { 
					$offerId = $this->m_offerwall->insertTransaction($userId, 'TheoremReach', $userIp, $reward, $transactionId, 2, time()); 
					$this->m_offerwall->updateUserBalance($userId, $reward); 
					$this->m_core->addNotification($userId, currencyDisplay($reward, $this->data['settings']) . " from TheoremReach Offer #" . $offerId . " was credited to your balance.", 1); 
					$user = $this->m_core->getUserFromId($userId); 
					$this->m_core->addExp($user['id'], $this->data['settings']['offerwall_exp_reward']); 
					
					if (($user['exp'] + $this->data['settings']['offerwall_exp_reward']) >= ($user['level'] + 1) * 100) { 
						$this->m_core->levelUp($user['id']); 
					} 
				} else { 
					$availableAt = time() + $hold * 86400; 
					$offerId = $this->m_offerwall->insertTransaction($userId, 'TheoremReach', $userIp, $reward, $transactionId, 0, $availableAt); 
					$this->m_core->addNotification($userId, "Your TheoremReach Offer #" . $offerId . " is pending approval.", 0); 
				} 
				
				echo "OK"; 
				
			} else { 
			 	echo "DUP"; 
			} 
		} 

		
		
   	}
}