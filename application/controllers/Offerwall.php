<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Offerwall extends Member_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_achievements');
        checkDailyBonus($this->data['user']);
		if ($this->data['settings']['offerwall_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}
		if ($this->data['user']['level'] < $this->data['settings']['offerwall_min_level']) {
			return redirect(site_url('dashboard'));
		}
	}
	public function index()
	{
		redirect(site_url('dashboard'));
	}
	public function cpx()
	{
		if ($this->data['settings']['cpx_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}

		$this->data['page'] = 'CPX Research';
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->data['iframe'] = '<div style="max-width: 950px; margin: auto" id="fullscreen"></div>
		<script>
const script1 = {
    div_id: "fullscreen",
    theme_style: 1,
    order_by: 2,
    limit_surveys: 12
};
const config = {
	general_config: {
		app_id: ' . $this->data['settings']['cpx_app_id'] . ',
		ext_user_id: "' . $this->data['user']['id'] . '", // string
		 email: "' . $this->data['user']['email'] . '", // string
		 username: "' . $this->data['user']['username'] . '", // string
	   secure_hash: "' . md5($this->data['user']['id'] . '-' . $this->data['settings']['cpx_hash']) . '",
	},
    style_config: {
        text_color: "#2b2b2b",
        survey_box: {
            topbar_background_color: "#ffaf20",
            box_background_color: "white",
            rounded_borders: true,
            stars_filled: "black",
        },
    },
    script_config: [script1],
    debug: false,
     useIFrame: true,
     iFramePosition: 1,
    functions: {
        no_surveys_available: () =>
        {
            console.log("no surveys available function here");
        },
        count_new_surveys: (countsurveys) =>
        {
            console.log("count surveys function here, count:", countsurveys);
        },
        get_all_surveys: (surveys) =>
        {
            console.log("get all surveys function here, surveys: ", surveys);
        },
        get_transaction: (transactions) =>
        {
            console.log("transaction function here, transaction: ", transactions);
        }
  }
  };
window.config = config;
</script>
		<script type="text/javascript" src="https://cdn.cpx-research.com/assets/js/script_tag_v2.0.js"></script>';
		$this->data['wait'] = $this->data['settings']['cpx_hold'];
		$this->render('offerwall', $this->data);
	}
	public function wannads()
	{
		if ($this->data['settings']['wannads_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}

		$this->data['page'] = 'Wannads Offerwall';
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->data['iframe'] = '<iframe style="width:100%; height:800px; border:0; padding:0; margin:0;" scrolling="yes" "frameborder="0" src="https://wall.wannads.com/wall?apiKey=' . $this->data['settings']['wannads_api_key'] . '&userId=' . $this->data['user']['id'] . '"></iframe>';
		$this->data['wait'] = $this->data['settings']['wannads_hold'];
		$this->render('offerwall', $this->data);
	}
	public function offertoro()
	{
		if ($this->data['settings']['offertoro_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}

		$this->data['page'] = 'OfferToro Offerwall';
		$this->data['iframe'] = '<iframe src="https://www.offertoro.com/ifr/show/' . $this->data['settings']['offertoro_pub_id'] . '/' . $this->data['user']['id'] . '/' . $this->data['settings']['offertoro_app_id'] . '" frameborder="0" width="860" height="2400" ></iframe> ';
		$this->data['wait'] = $this->data['settings']['offertoro_hold'];
		$this->render('offerwall', $this->data);
	}
	public function ayetstudios()
	{
		if ($this->data['settings']['ayetstudios_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}

		$this->data['page'] = 'AyetStudios Offerwall';
		$this->data['iframe'] = '<iframe src="https://www.ayetstudios.com/offers/web_offerwall/' . $this->data['settings']['ayetstudios_id'] . '?external_identifier=' . $this->data['user']['id'] . '" frameborder="0" width="860" height="2400" ></iframe> ';
		$this->data['wait'] = $this->data['settings']['ayetstudios_hold'];
		$this->render('offerwall', $this->data);
	}
	public function offerdaddy()
	{
		if ($this->data['settings']['offerdaddy_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}

		$this->data['page'] = 'OfferDaddy Offerwall';
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->data['iframe'] = '<iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://www.offerdaddy.com/wall/' . $this->data['settings']['offerdaddy_app_token'] . '/' . $this->data['user']['id'] . '" frameborder="0" width="860" height="2400" ></iframe> ';
		$this->data['wait'] = $this->data['settings']['offerdaddy_hold'];
		$this->render('offerwall', $this->data);
	}
	public function personaly()
	{
		if ($this->data['settings']['personaly_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}

		$this->data['page'] = 'Persona.ly Offerwall';
		$this->data['iframe'] = '<iframe src="https://persona.ly/widget/?appid=' . $this->data['settings']['personaly_id'] . '&userid=' . $this->data['user']['id'] . '" frameborder="0" width="860" height="2400" ></iframe> ';
		$this->data['wait'] = $this->data['settings']['personaly_hold'];
		$this->render('offerwall', $this->data);
	}
	public function pollfish()
	{
		$this->data['page'] = 'Pollfish Offerwall';
		$userId = $this->data['user']['id'];
		$this->data['iframe'] = '<script>
		var pollfishConfig = {
			api_key: "' . $this->data['settings']['pollfish_api'] . '",
			user_id: "' . $userId . '",
			indicator_position: "BOTTOM_RIGHT",
			debug: true,
			ready: pollfishReady,
		  };
		  function pollfishReady(){
			Pollfish.showFullSurvey();
		  }
		  </script><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		  <script src="https://storage.googleapis.com/pollfish_production/sdk/webplugin/pollfish.min.js"></script>';
		$this->data['wait'] = $this->data['settings']['pollfish_hold'];
		$this->render('offerwall', $this->data);
	}
	public function bitswall()
	{
		if ($this->data['settings']['bitswall_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}

		$this->data['page'] = 'Bitswall Offerwall';
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
		$this->data['iframe'] = '<iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://bitswall.net/offerwall/' . $this->data['settings']['bitswall_api'] . '/' . $this->data['user']['id'] . '"></iframe>';
		$this->data['wait'] = $this->data['settings']['bitswall_hold'];
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->render('offerwall', $this->data);
	}
	public function monlix()
	{
		if ($this->data['settings']['monlix_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}
		$this->data['page'] = 'Monlix Offerwall';
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
		$this->data['iframe'] = '<iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://offers.monlix.com/?appid=' . $this->data['settings']['monlix_api'] . '&userid=' . $this->data['user']['id'] . '"></iframe>';
		$this->data['wait'] = $this->data['settings']['monlix_hold'];
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		$this->render('offerwall', $this->data);
	}

            public function walloffer()
	  {
		 $api_key="5mbtl350czkt5tn8xdlki68e83xg72"; // UPDATE YOUR API KEY HERE
		 $this->data['page'] = 'WallOffer Offerwall';
    		 $this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		 $this->data['totalAchievements'] = count($this->data['achievements']);
		 $this->data['iframe'] = '<iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://walloffer.com/offerwall/' . $api_key . '/' . $this->data['user']['id'] . '"></iframe>';
		 $this->data['wait'] = 1; // UPDATE YOUR HOLD TIME
          $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
          if (!empty($dailyBonus)){
              $addBonus = dailyBonusSingle($dailyBonus->streak);
              $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
          }else{
              $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
          }
		 $this->render('offerwall', $this->data);
	 }

            public function offers4all()
	  {
		 $api_key="2993528b22e33a4f34b04988d2ca730d"; // UPDATE YOUR API KEY HERE
		 $this->data['page'] = 'Offers4all Offerwall';
    		 $this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		 $this->data['totalAchievements'] = count($this->data['achievements']);
		 $this->data['iframe'] = '<iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://offers4all.net/index.php?view=ads&api_key=' . $api_key . '&user_id=' . $this->data['user']['id'] . '"></iframe>';
		 $this->data['wait'] = 1; // UPDATE YOUR HOLD TIME
          $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
          if (!empty($dailyBonus)){
              $addBonus = dailyBonusSingle($dailyBonus->streak);
              $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
          }else{
              $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
          }
		 $this->render('offerwall', $this->data);
	 }

	public function adscendmedia() 
 	{ 
  		if ($this->data['settings']['adscend_status'] != 'on') { 
   			return redirect(site_url('dashboard')); 
  		} 
 		$this->data['page'] = 'Adscend Media Offerwall'; 
    	$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    	$this->data['totalAchievements'] = count($this->data['achievements']);
  		$this->data['iframe'] = '<iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://asmwall.com/adwall/publisher/' . $this->data['settings']['adscend_pubid'] . '/profile/' . $this->data['settings']['adscend_wallid'] . '?subid1=' . $this->data['user']['id'] . '" frameborder="0" allowfullscreen></iframe>'; 
   		$this->data['wait'] = $this->data['settings']['adscend_hold'];
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
  		$this->render('offerwall', $this->data); 
 }

	public function lootably() 
 	{ 
  		if ($this->data['settings']['adscend_status'] != 'on') { 
   			return redirect(site_url('dashboard')); 
  		} 
 		$this->data['page'] = 'Lootably Offerwall'; 
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
  		$this->data['iframe'] = '<iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://wall.lootably.com/?placementID=cl3suhdqb006e01vg98osd3m3&sid=' . $this->data['user']['id'] . '" frameborder="0" allowfullscreen></iframe>'; 
   		$this->data['wait'] = $this->data['settings']['adscend_hold'];
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
  		$this->render('offerwall', $this->data); 
 }

	public function timewall() 
 	{ 
  		if ($this->data['settings']['adscend_status'] != 'on') { 
   			return redirect(site_url('dashboard')); 
  		} 
 		$this->data['page'] = 'Timewall Offerwall'; 
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
  		$this->data['iframe'] = '<p><a href="https://timewall.io/users/login?oid=daf31da2e0ffd4ec&uid=' . $this->data['user']['id'] . '&tab=clicks" target="_blank">Open Timewall in a new page</a><p><iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://timewall.io/users/login?oid=daf31da2e0ffd4ec&uid=' . $this->data['user']['id'] . '&tab=clicks" frameborder="0" allowfullscreen></iframe>'; 
   		$this->data['wait'] = $this->data['settings']['adscend_hold'];
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
  		$this->render('offerwall', $this->data); 
 }

	public function bitlabs() 
 	{ 
  		if ($this->data['settings']['adscend_status'] != 'on') { 
   			return redirect(site_url('dashboard')); 
  		} 
		$api_key = "fc2ebd30-88c8-4dd9-8501-98079dfd61df";
 		$this->data['page'] = 'Bitlabs Offerwall'; 
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
  		$this->data['iframe'] = '<iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://web.bitlabs.ai/?uid=' . $this->data['user']['id'] . '&token=' . $api_key .'"  frameborder="0" allowfullscreen></iframe>'; 
   		$this->data['wait'] = $this->data['settings']['adscend_hold'];
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
  		$this->render('offerwall', $this->data); 
 }

	public function offeroc() 
 	{ 
  		if ($this->data['settings']['adscend_status'] != 'on') { 
   			return redirect(site_url('dashboard')); 
  		} 
		$api_key = "bkf94ubcrr12o0iy4noffl4swje27j";
 		$this->data['page'] = 'Offeroc Offerwall'; 
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
  		$this->data['iframe'] = '<iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://offeroc.com/offerwall/' . $api_key . '/' . $this->data['user']['id'] . '"  frameborder="0" allowfullscreen></iframe>'; 
   		$this->data['wait'] = $this->data['settings']['adscend_hold'];
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
  		$this->render('offerwall', $this->data); 
 }

	public function theoremreach() 
 	{ 
  		if ($this->data['settings']['adscend_status'] != 'on') { 
   			return redirect(site_url('dashboard')); 
  		} 
		$api_key = "e159d2510a09119f53820e7e99ea";
 		$this->data['page'] = 'TheoremReach Offerwall'; 
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
  		$this->data['iframe'] = '<iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://theoremreach.com/respondent_entry/direct?api_key=' . $api_key . '&user_id=' . $this->data['user']['id'] . '" frameborder="0" allowfullscreen></iframe>'; 
   		$this->data['wait'] = $this->data['settings']['adscend_hold'];
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
  		$this->render('offerwall', $this->data); 
   }
	public function bitcotasks()
	{
		if ($this->data['settings']['bitswall_status'] != 'on') {
			return redirect(site_url('dashboard'));
		}
		
		$api = "qs1qsnn74mmtmg3jg3j5hkjzkkgbt8";
		$this->data['page'] = 'BitcoTasks Offerwall';
    		$this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
    		$this->data['totalAchievements'] = count($this->data['achievements']);
		$this->data['iframe'] = '<iframe style="width:100%;height:800px;border:0;padding:0;margin:0;" scrolling="yes" frameborder="0" src="https://bitcotasks.com/offerwall/' . $api . '/' . $this->data['user']['id'] . '"></iframe>';
		$this->data['wait'] = $this->data['settings']['bitswall_hold'];
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
		
		$this->render('offerwall', $this->data);
	}
}
