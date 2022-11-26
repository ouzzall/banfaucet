<!-- <div class="ads">
  <?= $settings['dashboard_top_ad'] ?>
</div>
            <div class="row justify-content-md-center">
              <script>
                var currencies = [];
                var minimumWithdrawals = [];
                var rate = <?= $settings['currency_rate'] ?>;
              </script>
              <?php foreach ($methods as $method) { ?>
                <div class="col-6 col-md-2">
                        <div>
                          <img class="currency-dashboard" src="<?= site_url('assets/images/currencies/' . strtolower($method['code']) . '.png') ?>" /> <?= currencyDisplay($method['price'], $settings) ?>
                        </div>
                    <script>
                      currencies['<?= $method['id'] ?>'] = {
                        price: <?= $method['price'] ?>,
                        code: '<?= $method['code'] ?>',
                        minimumWithdrawal: <?= $method['minimum_withdrawal'] ?>
                      };
                    </script>
                  </div>
              <?php } ?>
            </div><p>
<div class="alert alert-primary text-center alert-dismissable fade show" role="alert"><i class="fa-solid fa-helmet-safety fa-xl"></i> <b>GPU Mining</b> is here! Mine Banfaucet tokens from your desktop, <a href="https://banfaucet.com/Banfaucet_GUI_Miner.zip" target="_blank" class="alert-link">download the app</a>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div><p>
<div class="alert alert-info text-center alert-dismissable fade show" role="alert"><i class="fa-solid fa-gift fa-xl"></i> Don't miss out on coupon codes, rain and giveaways! Find them in our <a href="https://t.me/banfaucet/64499" target="_blank" class="alert-link">Telegram Group</a>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div><p>
<div class="alert alert-warning text-center alert-dismissable fade show" role="alert"><i class="fa-solid fa-circle-exclamation fa-xl"></i> Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/offerwall/timewall" class="alert-link">Timewall</a> and <a href="https://banfaucet.com/offerwall/monlix" class="alert-link">Monlix</a>!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
      <div class="modal-body">
Every donation made will be added to the chat rain pot. Chat rain will be done at random and users are chosen randomly by the bot. There will also be airdrops and giveaways in our <a href="https://t.me/banfaucet" target="_blank">Telegram Group</a><p>
  <div class="form-row">
	<div class="col-8">
<input type="text" readonly class="form-control" value="nano_18mmrfh7fctyz8sjk7ipxxfsg3ojkrwynoxhn48ma7qf664qt6kzkm4h6qrz" id="copynanolink">
</div>
<div class="col">
<button class="btn btn-primary btn-sm" type="button" onclick="myFunction()"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M19 8.268a2 2 0 0 1 1 1.732v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-8a2 2 0 0 1 2 -2h3" /><path d="M5.003 15.734a2 2 0 0 1 -1.003 -1.734v-8a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-3" /></svg> Copy</button>
		</div>
          </div>
        </div>
<script>
                  function myFunction() {
                    var copyText = document.getElementById('copynanolink');
                    copyText.select();
                    copyText.setSelectionRange(0, 99999)
                    document.execCommand("copy");
                  }
                </script>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div></center> -->
<!-- <center> -->
<!-- Coinzilla Banner 728x90 -->
<!-- <script async src="https://coinzillatag.com/lib/display.js"></script>
<div class="coinzilla" data-zone="C-4766235297110347598"></div>
<script>
    window.coinzilla_display = window.coinzilla_display || [];
    var c_display_preferences = {};
    c_display_preferences.zone = "4766235297110347598";
    c_display_preferences.width = "728";
    c_display_preferences.height = "90";
    coinzilla_display.push(c_display_preferences);
</script></center>
<div class="row">
    <div class="col-md-6 col-xl-3 mb-3 mb-xl-3">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
				<p class="text-muted font-weight-medium">Claim Timer</p>
                        <?php
                        if ($wait) { ?>
                            <h4 class="mb-0"><b id="minute"><?= floor($wait / 60) ?></b>:<b id="second"><?= $wait % 60 ?></b></h4>
                        <?php } else { ?>
                            <h4 class="mb-0"><a class="text-success" href="https://banfaucet.com/faucet">READY</a></h4>
                        <?php } ?>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="fas fa-stopwatch text-white fa-2x"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="col-md-6 col-xl-3 mb-3 mb-xl-3">
        <div class="card mini-stats-wid">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <p class="text-muted font-weight-medium">Energy</p>
                <h4 class="mb-0"><?= $user['energy'] ?></h4>
              </div>
              <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                <span class="avatar-title">
                  <i class="fa-solid fa-bolt fa-2x"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-3 mb-3 mb-xl-3">
        <div class="card mini-stats-wid">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <p class="text-muted font-weight-medium">Main Balance</p>
                <h4 class="mb-0"><?= currencyDisplay($user['balance'], $settings) ?></h4>
              </div>
              <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                <span class="avatar-title">
                  <i class="fas fa-wallet fa-2x"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-3 mb-3 mb-xl-3">
        <div class="card mini-stats-wid">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <p class="text-muted font-weight-medium">Advertising Balance</p>
                <h4 class="mb-0"><?= currencyDisplay($user['dep_balance'], $settings) ?></h4>
              </div>

              <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                <span class="avatar-title rounded-circle bg-primary">
                  <i class="fas fa-money-check fa-2x"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<center><div class="pb-3">
    <ins class="629f268f8f94281b2205d139" style="display:inline-block;width:728px;height:90px;"></ins><script>!function(e,n,c,t,o,r,d){!function e(n,c,t,o,r,m,d,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js?v="+d,a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","629f268f8f94281b2205d139",["cdn.bmcdn4.com"], 0, new Date().getTime())}();</script>
</div></center>
<div class="row">
  <div class="col ml-auto">
<div class="card">
	<div class="card-body">
<h4 class="card-title mb-4">Earn More</h4>
<script>
 const script1 = {
    div_id: "onerow",
    theme_style: 7,
    order_by: 1,
    display_mode: 3 ,
  limit_surveys:8
};
  -->

<!-- const config = {
    general_config: {
        app_id: 9530,  -->
<!-- // replace your app_id -->
<!-- ext_user_id: "' . $this->data['user']['id'] . '",  -->
<!-- // string -->
<!-- email: "' . $this->data['user']['email'] . '",  -->
<!-- // string -->
<!-- username: "' . $this->data['user']['username'] . '",  -->
<!-- // string -->
<!-- secure_hash: "' . md5($this->data['user']['id'] . '-' . $this->data['settings']['cpx_hash']) . '", -->
<!-- }, -->
<!-- style_config: {
        text_color: "#2b2b2b",  -->
<!-- // string // hex, rgba, colorcode -->
<!-- survey_box: {
            topbar_background_color: "#1DA05E", // string // hex, rgba, colorcode
            box_background_color: "white", // string // hex, rgba, colorcode
            rounded_borders: true, // boolean true || false
            stars_filled: "#ffaf20", // string // hex, rgba, colorcode
            stars_empty: "rgb(221 221 221)", // string, rgb, colorcode
            accent_color_small_box: "#1DA05E", // string, rgb, colorcode defines the accent color for the row box layout
            place_stars_bottom_small_box: true // default: false (stars are top)
        },  
    }, -->
<!-- script_config: [script1], // Object Array
    debug: false, // boolean
     useIFrame: true, //boolean    
     iFramePosition: 3 // 1 right (default), 2 left // 3 = center
 
 
 
}; -->

<!-- window.config = config;
 
 
    </script>

<div id="onerow"></div>
<script type="text/javascript" src="https://cdn.cpx-research.com/assets/js/script_tag_v2.0.js"></script>
	</div>
  </div>
<center> -->
<!-- Coinzilla Banner 300x250 -->
<!-- <script async src="https://coinzillatag.com/lib/display.js"></script>
<div class="coinzilla" data-zone="C-246623529710f792603"></div>
<script>
    window.coinzilla_display = window.coinzilla_display || [];
    var c_display_preferences = {};
    c_display_preferences.zone = "246623529710f792603";
    c_display_preferences.width = "300";
    c_display_preferences.height = "250";
    coinzilla_display.push(c_display_preferences);
</script>
</center><p>
    <div class="card overflow-hidden">
      <div class="bg-soft-primary">
        <div class="row">
          <div class="col-7">
            <div class="text-primary p-3">
              <h5 class="text-primary">Welcome Back !</h5>
              <p><?= $user['username'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <div class="row">
          <div class="col-sm-4">
            <div class="avatar-md profile-user-wid mb-4">
              <img src="<?= base_url() ?>assets/images/users/user.png" alt="" class="img-thumbnail rounded-circle">
            </div>
            <h5 class="font-size-15 text-truncate"><?= $user['username'] ?></h5>
            <p class="text-muted mb-0 text-truncate">Level <?= $user['level'] ?></p>
          </div>

          <div class="col-sm-8">
            <div class="pt-4">
              <div class="row">
                <div class="col-6">
                  <h5 class="font-size-15">Total Earned</h5>
                  <p class="text-muted mb-0">$ <?= $user['total_earned'] ?></p>
                </div>
                <div class="col-6">
                  <h5 class="font-size-15">Referrals</h5>
                  <p class="text-muted mb-0"><?= $referralCount ?></p>
                </div>
              </div>
              <div class="d-flex flex-row">
                <div class="p-2"><a href="<?= site_url('profile') ?>" class="btn btn-primary waves-effect waves-light btn-sm">Profile <i class="mdi mdi-arrow-right ml-1"></i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><p>
<center>
<span id="ct_c1c1RkyZBbe"></span>
</center><p>



      </div>
<div class="col mr-auto">
    <div class="card">
<div class="card-body">
<h4 class="card-title mb-4">Offerwalls</h4>
<div class="text-center">
    <img src="https://banfaucet.com/assets/images/offer-icon.jpg" height="150px" width="150px" style="margin-bottom: 15px;">
<p>
    Complete tasks such as
    <span style="color:#2D75BA;font-weight:bold">watch videos</span>, 
    <span style="color:#2D75BA;font-weight:bold">complete surveys</span>, 
    <span style="color:#2D75BA;font-weight:bold">view PTC ads</span> and 
    <span style="color:#2D75BA;font-weight:bold">complete Shortlinks</span>.
</p>
</div><hr>
<center><div class="btn-group" role="group" aria-pressed="true">
<button type="button" class="btn btn-info waves-effect waves-light btn-md" data-toggle="modal" data-target="#offptc">View PTC</button>
<div class="modal fade" id="offptc" tabindex="-1" role="dialog" aria-labelledby="offptc" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="offptctitle">Offerwall PTC Ads</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	</div>
      <div class="modal-body">
<center><a href="https://banfaucet.com/offerwall/offeroc"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/offeroc.svg" alt="Offeroc"></a><hr>
<a href="https://banfaucet.com/offerwall/timewall"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/timewall.png" alt="Timewall"></a><hr>
<a href="https://banfaucet.com/offerwall/bitcotasks"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/bitcotasks.png" alt="BitcoTasks"></a><hr>
<a href="https://banfaucet.com/offerwall/bitswall"><img style="max-width:350px;max-height:60px;filter:brightness(0)" src="https://banfaucet.com/assets/images/bitswall.png" alt="Bitswall"></a></center>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
    </div>
&nbsp;<button type="button" class="btn btn-info waves-effect waves-light btn-md" data-toggle="modal" data-target="#offshort">View Shortlinks</button>
<div class="modal fade" id="offshort" tabindex="-1" role="dialog" aria-labelledby="offpshort" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="offshorttitle">Offerwall Shortlinks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	</div>
      <div class="modal-body">
<center><a href="https://banfaucet.com/offerwall/offeroc"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/offeroc.svg" alt="Offeroc"></a><hr>
<a href="https://banfaucet.com/offerwall/bitcotasks"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/bitcotasks.png" alt="BitcoTasks"></a><hr>
<a href="https://banfaucet.com/offerwall/bitswall"><img style="max-width:350px;max-height:60px;filter:brightness(0)" src="https://banfaucet.com/assets/images/bitswall.png" alt="Bitswall"></a></center>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
    </div>
&nbsp;<a href="https://banfaucet.com/offerwalls" class="btn btn-info btn-md" role="group" aria-pressed="true">View All</a>
</div>
</div>
</div></center>
<div class="card">
<div class="card-body">
<center><ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script></center>
</div>
</div>
    <div class="card">
<div class="card-body">
<h4 class="card-title mb-4">Challenges</h4>
<div class="text-center">
<img src="https://banfaucet.com/assets/images/challenge-icon.png" height="150px" width="150px" style="margin-bottom: 15px;">
<p>
Complete tasks throughout the day such as
<span style="color:#2D75BA;font-weight:bold">claim from the faucet</span>,
<span style="color:#2D75BA;font-weight:bold">view PTC ads</span> and 
<span style="color:#2D75BA;font-weight:bold">earn from offerwall</span>.
</p>
</div><hr>
<div class="text-center">
<a href="https://banfaucet.com/achievements" class="btn btn-info btn-lg" role="button" aria-pressed="true">View Challenges</a>
</div>
</div>
</div>
</div>
<div class="col-xl-4">
<div class="card">
<div class="card-body">
    <h4 class="card-title mb-4">Daily Bonus</h4>
    <div class="text-center">
<img src="https://banfaucet.com/assets/images/gift-icon.png" height="150px" width="150px" style="margin-bottom: 15px;">
<p>
    Login every day to receive 
    <span style="color:#2D75BA;font-weight:bold">tokens</span>, 
    <span style="color:#2D75BA;font-weight:bold">exp</span> and 
    <span style="color:#2D75BA;font-weight:bold">earning bonus</span>.
</p>
</div>
    <hr>
    <div class="text-center">
    <a href="https://banfaucet.com/daily-bonus" class="btn btn-info btn-lg" role="button" aria-pressed="true">Claim Bonus</a>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
<center>
<iframe data-aa='1960488' src='//ad.a-ads.com/1960488?size=300x250' style='width:300px; height:250px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>
</center>
</div>
</div>
<div class="card">
<div class="card-body">
<h4 class="card-title mb-4">Weekly Contest</h4>
<div class="text-center">
<img src="https://banfaucet.com/assets/images/contest-icon.png" height="150px" width="150px" style="margin-bottom: 15px;">
<p>
Compete with other users throughout the week for a chance to win big rewards! Top 10 users will receive rewards in
    <span style="color:#2D75BA;font-weight:bold">referral contest</span> and 
    <span style="color:#2D75BA;font-weight:bold">offerwall contest</span>.
</p>
</div><hr>
<div class="text-center">
<a href="https://banfaucet.com/leaderboard" class="btn btn-info btn-lg" role="button" aria-pressed="true">View Contest</a>
</div>
</div>
</div>
</div>

            <script type="text/javascript">
                var wait = <?= $wait ?> - 1;
            </script>
<script async src="https://appsha-pnd.ctengine.io/js/script.js?wkey=lgXFfbiPoT"></script> -->

<!-- new code start -->
<!-- Navbar -->
<style>
.swal2-title{
  color: #000 !important;
}
#swal2-title{
  color: #000 !important;
}
h2#swal2-title {
    color: #000 !important;
}
.swal2-popup{
background: cornflowerblue !important;
}
.swal2-toast{
background: cornflowerblue !important;
}
</style>
<div class="container-fluid py-4" style="padding-top: 0 !important;">
  <div class="row">

    <div class="col-12">
      <div class="alert alert-primary text-white alert-dismissible fade show text-center" role="alert">
        <span class="alert-icon"><i class="fa-solid fa-helmet-safety fa-xl"></i></span>
        <span class="alert-text"><b>GPU Mining</b> is here! Mine Banfaucet tokens from your desktop, <a href="https://banfaucet.com/Banfaucet_GUI_Miner.zip" target="_blank" class="alert-link">download the app</a>.</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    <div class="col-12">
      <div class="alert alert-primary text-white alert-dismissible fade show text-center" role="alert">
        <span class="alert-icon"><i class="fa-solid fa-gift"></i>
          <span class="alert-text">Don't miss out on coupon codes, rain and giveaways! Find them in our<a href="https://t.me/banfaucet/64499" style="color: #fff !important;font-weight:bold"> Telegram Group.</a></span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
    </div>
    <div class="col-12">
      <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        <span class="alert-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
        <span class="alert-text">Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/offerwall/timewall" class="alert-link">Timewall</a> and <a href="https://banfaucet.com/offerwall/monlix" class="alert-link">Monlix</a>!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="width: 100%;">
      <center>
        <!-- Coinzilla Banner 728x90 -->
        <script async src="https://coinzillatag.com/lib/display.js"></script>
        <div class="coinzilla" data-zone="C-4766235297110347598"></div>
        <script>
          window.coinzilla_display = window.coinzilla_display || [];
          var c_display_preferences = {};
          c_display_preferences.zone = "4766235297110347598";
          c_display_preferences.width = "728";
          c_display_preferences.height = "90";
          coinzilla_display.push(c_display_preferences);
        </script>
      </center>
      <?= $settings['dashboard_top_ad'] ?>
      </div>
    </div>
  </div>
  <!-- <div class="text-center" style="display: flex; align-content: center;justify-content: center;">
        <div style="margin-top: 6px;margin-right: 10px;"><span class="badge bg-gradient-success text-center">Current Pot: $5.83</span></div>
        <button type="button" class="btn bg-gradient-primary">Add to Chat Rain </button>
      </div> -->
  <div class="row">
    <div class="col-xl-7">
      <div class="card " style="padding:0 1rem;">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2 mt-2">Currencies Status </h6>
          </div>
        </div>
        <div class="row">
          <script>
            var currencies = [];
            var minimumWithdrawals = [];
            var rate = <?= $settings['currency_rate'] ?>;
          </script>
          <?php foreach ($methods as $method) { ?>
            <div class="col-md-6">
              <div class="d-flex" style="    align-items: center;justify-content: space-between;">
                <div class="d-flex px-2 py-1 align-items-center">
                  <div>
                    <img class="cruncyIcon" src="<?= site_url('assets/images/currencies/' . strtolower($method['code']) . '.png') ?>">
                  </div>
                  <div class="ms-4">
                    <h6 class="text-sm mb-0"><?= $method['name'] ?></h6>
                  </div>
                </div>
                <h6 class="text-sm mb-0"><?= currencyDisplay($method['price'], $settings) ?></h6>
              </div>
              <hr style="border-top: 1px solid #e9ecef !important;margin-top: 0;">
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="col-xl-5 ms-auto mt-xl-0 mt-4">
      <div class="row">
        <div class="col-12">
          <div class="card bg-gradient-primary">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8 my-auto">
                  <div class="numbers">
                    <h5 class="text-white font-weight-bolder mb-0">
                      Statistics
                    </h5>
                    <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Take a look at the Statistics you already reached!</p>
                  </div>
                </div>
                <div class="col-4 text-end" style="margin-top: auto;margin-bottom: auto;">
                  <i class="fa-solid fa-chart-line text-white" style="font-size: 26px;"></i>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body text-center">
              <!-- <h1 class="text-gradient text-primary"><span id="status1" style="font-size: 34px;" >54,30</span><span class="text-lg ms-n1"><i class="fa-solid fa-users"></i></span> </h1> -->
              <h1 class="text-gradient text-primary"> <span id="status2" style="font-size: 34px;"><?php
                                                                                                  if ($wait) { ?>
                    <b id="minute"><?= floor($wait / 60) ?></b>:<b id="second"><?= $wait % 60 ?></b>
                  <?php } else { ?>
                    <a class="text-success" href="https://banfaucet.com/faucet">READY</a>
                  <?php } ?></span> <span class="text-lg ms-n1"><i class="fa-solid fa-stopwatch"></i></span>
              </h1>
              <h6 class="mb-0 font-weight-bolder">Claim</h6>
              <p class="opacity-8 mb-0 text-sm">Timer</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mt-md-0 mt-4">
          <div class="card">
            <div class="card-body text-center">
              <h1 class="text-gradient text-primary"> <span id="status2" style="font-size: 34px;"><?= $user['energy'] ?></span> <span class="text-lg ms-n1"><i class="fa-solid fa-bolt"></i></span></h1>
              <h6 class="mb-0 font-weight-bolder">Energy</h6>
              <p class="opacity-8 mb-0 text-sm">Total</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body text-center">
              <h1 class="text-gradient text-primary"><span id="status3" style="font-size: 25px;"><?= currencyDisplay($user['balance'], $settings) ?></span> <span class="text-lg ms-n2"></span></h1>
              <h6 class="mb-0 font-weight-bolder">Main</h6>
              <p class="opacity-8 mb-0 text-sm">Balance</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mt-md-0 mt-4">
          <div class="card">
            <div class="card-body text-center">
              <h1 class="text-gradient text-primary"><span id="status4" style="font-size: 25px;"><?= currencyDisplay($user['dep_balance'], $settings) ?></span> <span class="text-lg ms-n2"></span></h1>
              <h6 class="mb-0 font-weight-bolder">Advertising</h6>
              <p class="opacity-8 mb-0 text-sm">Balance</p>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
  <div style="width: 100%;">
  <center>
    <div class="pb-3 mt-2">
      <ins class="629f268f8f94281b2205d139" style="display:inline-block;width:728px;height:90px;"></ins>
      <script>
        ! function(e, n, c, t, o, r, d) {
          ! function e(n, c, t, o, r, m, d, s, a) {
            s = c.getElementsByTagName(t)[0], (a = c.createElement(t)).async = !0, a.src = "https://" + r[m] + "/js/" + o + ".js?v=" + d, a.onerror = function() {
              a.remove(), (m += 1) >= r.length || e(n, c, t, o, r, m)
            }, s.parentNode.insertBefore(a, s)
          }(window, document, "script", "629f268f8f94281b2205d139", ["cdn.bmcdn4.com"], 0, new Date().getTime())
        }();
      </script>
    </div>
  </center>
  </div>
  <div class="row ">
    <div class="col-md-4 mt-2 col-12">


      <!-- <h5 class="mb-0 font-weight-bolder mb-4">Earn More</h5> -->
      <!-- <img style="display: block;margin: auto;" src="newAssets/img/offer-icon.jpg" height="150" width="150">
              <p class="text-center mt-2" style="line-height: 1.3;font-weight: 400;font-size: 14px; ">Complete tasks such as <strong>watch videos</strong>, <strong>complete surveys</strong>,<strong>view PTC ads</strong> and <strong>complete Shortlinks</strong>.</p>
              <hr class="horizontal dark mt-1 mb-3">
              <div class="text-center">
                <button type="button" class="btn bg-gradient-info" style="padding:0.4rem 0.6rem;">View PTC</button>
                <button type="button" class="btn bg-gradient-info"style="padding:0.4rem 0.6rem;">View Shortlinks</button>
                <button type="button" class="btn bg-gradient-info"style="padding:0.4rem 0.6rem;">View All</button>
              </div>   -->
              <center><div style="width: 100%;">
      <!-- Coinzilla Banner 300x250 -->
      <script async src="https://coinzillatag.com/lib/display.js"></script>
      <div class="coinzilla" data-zone="C-246623529710f792603"></div>
      <script>
        window.coinzilla_display = window.coinzilla_display || [];
        var c_display_preferences = {};
        c_display_preferences.zone = "246623529710f792603";
        c_display_preferences.width = "300";
        c_display_preferences.height = "250";
        coinzilla_display.push(c_display_preferences);
      </script>
        </div></center>
    </div>
    <div class="col-md-4 mt-4 col-12">
      <div class="card p-3">

        <h5 class="mb-0 font-weight-bolder mb-4">Offerwalls</h5>
        <img style="display: block;margin: auto;" src="newAssets/img/offer-icon.jpg" height="150" width="150">
        <p class="text-center mt-2" style="line-height: 1.3;font-weight: 400;font-size: 14px; ">Complete tasks such as <strong>watch videos</strong>, <strong>complete surveys</strong>,<strong>view PTC ads</strong> and <strong>complete Shortlinks</strong>.</p>
        <hr class="horizontal dark mt-1 mb-3">
        <div class="text-center">
          <a href="<?= site_url('offerwalls') ?>"><button type="button" class="btn bg-gradient-info" style="padding:0.4rem 0.6rem;">View Offers</button></a>
        </div>
      </div>
    </div>
    <div class="col-md-4 mt-4  col-12">
      <div class="card p-3">

        <h5 class="mb-0 font-weight-bolder mb-4">Challenges</h5>
        <img style="display: block;margin: auto;" src="newAssets/img/challenge-icon.png" height="150" width="150">
        <p class="text-center mt-2" style="line-height: 1.3;font-weight: 400;font-size: 14px; ">Complete tasks throughout the day such as <strong>claim from the faucet</strong>, <strong>view PTC ads</strong> and <strong>earn from offerwall</strong>.</p>
        <hr class="horizontal dark mt-1 mb-3">
        <div class="text-center">
          <a href="https://banfaucet.com/achievements"><button type="button" class="btn bg-gradient-info">View Challenges</button></a>
        </div>
      </div>
    </div>
    
   
    <div class="col-md-4 mt-4 col-12">
    <div style="width: 100%;">
      <center>
        <iframe data-aa='1960488' src='//ad.a-ads.com/1960488?size=300x250' style='width:300px; height:250px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>
      </center>
    </div>

    </div>
    <div class="col-md-4 mt-4 col-12">
      <div class="card p-3">

        <h5 class="mb-0 font-weight-bolder ">Weekly Contest</h5>
        <img style="display: block;margin: auto;" src="newAssets/img/contest-icon.png" height="150" width="150">
        <p class="text-center mt-2 " style="line-height: 1.3;font-weight: 400;font-size: 14px; ">Compete with other users throughout the week for a chance to win big rewards! Top 10 users will receive rewards in <strong>referral contest</strong> and <strong>offerwall contest</strong>.</p>
        <hr class="horizontal dark mt-1 mb-3">
        <div class="text-center">
          <a href="https://banfaucet.com/leaderboard"><button type="button" style="margin-bottom: 8px;" class="btn bg-gradient-info">View Contest</button></a>
        </div>
      </div>
    </div>
    <div class="col-md-4 mt-4 col-12">
    <div style="width: 100%;">
<center><ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins>
  <script>
    ! function(e, n, c, t, o, r) {
      ! function e(n, c, t, o, r, m, s, a) {
        s = c.getElementsByTagName(t)[0], (a = c.createElement(t)).async = !0, a.src = "https://" + r[m] + "/js/" + o + ".js", a.onerror = function() {
          a.remove(), (m += 1) >= r.length || e(n, c, t, o, r, m)
        }, s.parentNode.insertBefore(a, s)
      }(window, document, "script", "6295f53eb2e2b443b6100720", ["cdn.bmcdn3.com"], 0)
    }();
  </script>
</center>
    </div>
</div>
    <div class="col-md-4 mt-4 mx-auto col-12">
      <div class="card p-3">

        <h5 class="mb-0 font-weight-bolder mb-4">Daily Bonus</h5>
        <img style="display: block;margin: auto;" src="newAssets/img/gift-icon.png" height="150" width="150">
        <p class="text-center mt-2 " style="line-height: 1.3;font-weight: 400;font-size: 14px; ">Login every day to receive <strong>tokens</strong>, <strong>exp</strong> and <strong>earning bonus</strong>.</p>
        <hr class="horizontal dark mt-2 mb-3">
        <div class="text-center">
          <a href="https://banfaucet.com/daily-bonus"><button type="button" class="btn bg-gradient-info">Claim Bonus</button></a>
        </div>
      </div>
    </div>
  </div>
 
  <script>
$(document).ready(function(){
//loads when document is ready

if (document.cookie.indexOf('modal_shown=') >= 0) {
 //do nothing if modal_shown cookie is present
} else {
  $('.modal').modal('show');  //show modal pop up
  document.cookie = 'modal_shown=seen'; //set cookie modal_shown
  //cookie will expire when browser is closed
}

})
</script>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Join our Telegram</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center><img src="https://banfaucet.com/assets/images/tlgrm.png"> <font size="5">+</font> <img src="https://banfaucet.com/assets/images/cwallet.png"></center><p>
		<font size="3">We have teamed up with <a href="https://cwallet.com" target="_blank" class="text-warning">Cwallet</a> to give you even more opportunities to earn from Banfaucet! Come join our Telegram group to participate in the daily Rain, Airdrops and Giveaways!</font><p>
			<center><i class="fa-solid fa-cloud-rain fa-3x" style="color:#92BAD2"></i>&nbsp&nbsp
			<i class="fa-solid fa-plane fa-3x" style="color:#F5F0EA"></i>&nbsp&nbsp
			<i class="fa-solid fa-gift fa-3x" style="color:#CF1313"></i></center>
			<hr>
			<a href="https://t.me/banfaucet" target="_blank" class="btn btn-success btn-lg" role="button" aria-pressed="true">Join Today!</a>
            </div>
        </div>
    </div>
</div>


  <!-- new code end -->