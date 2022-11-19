<div class="container-fluid py-4" style="padding-top: 0 !important;">
<!-- <div class="alert alert-warning text-center alert-dismissable fade show" role="alert"><i class="fa-solid fa-circle-exclamation fa-xl"></i> Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/new/offerwall/timewall" class="alert-link">Timewall</a>!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div> -->
  <div class="alert alert-warning alert-dismissible fade show text-center role="alert">
            <span class="alert-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
            <span class="alert-text">Earn a 15% bonus for every offer you complete from <a href="#" style="color: #fff !important;font-weight:bold">Timewall!</a></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
  <p><center><!-- Coinzilla Banner 728x90 -->
<script async src="https://coinzillatag.com/lib/display.js"></script>
<div class="coinzilla" data-zone="C-4766235297110347598"></div>
<script>
    window.coinzilla_display = window.coinzilla_display || [];
    var c_display_preferences = {};
    c_display_preferences.zone = "4766235297110347598";
    c_display_preferences.width = "728";
    c_display_preferences.height = "90";
    coinzilla_display.push(c_display_preferences);
</script></center><p>
<div class="row">
    <div class="col-lg-12">
	  <div class="card">
		<div class="card-body">
                <h4 class="card-title mb-4 text-center">Your Referral Link</h4>
                <div class="alert alert-success text-center">You get <?= $settings['referral'] ?>% of your referrals earnings.</div>
  <div class="form-row">
	<div class="col-8">
<input type="text" readonly class="form-control" value="<?= site_url('/?r=' . $user['id']) ?>" id="copyreflink">
</div>
<div class="col">
<button class="btn btn-primary btn-sm" type="button" onclick="myFunction()"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M19 8.268a2 2 0 0 1 1 1.732v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-8a2 2 0 0 1 2 -2h3" /><path d="M5.003 15.734a2 2 0 0 1 -1.003 -1.734v-8a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-3" /></svg> Copy</button>
</div>
<script>
                  function myFunction() {
                    var copyText = document.getElementById('copyreflink');
                    copyText.select();
                    copyText.setSelectionRange(0, 99999)
                    document.execCommand("copy");
                  }
                </script>
            </div>
        </div>
    </div>
</div>
</div>
<center><span id="ct_cJd95UwrCma"></span></center><p>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">Your Referrals</h4>
                <div class="table-hover table-responsive">
                    <table class="table  text-center" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Last Active</th>
                                <th scope="col">Total Earned</th>
                                <th scope="col">Joined</th>
                                <th scope="col">Faucet Claims</th>
                                <th scope="col">Offerwall Claims</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($referrals as $referral) {
                                echo '<tr><th scope="row">' . $referral["username"] . '</th><td>' . timespan($referral["last_active"], time(), 2) . ' ago</td><td>' . format_money($referral["total_earned"]) . '</td><td>' . timespan($referral["joined"], time(), 2) . ' ago</td><td>' . $referral["faucet_count"] . '</td><td>' . $referral["offerwall_count"] . '</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
                        </div>
<center><ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script>
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
</script></center>
<script>var _coinzilla_fp_id_ = "173623529710ebcf195",  _coinzilla_fp_interval_ = "5"; </script>
<script src="https://coinzillatag.com/lib/fp.js"></script>
<script src="https://banfaucet.com/new/assets/js/clipboard.min.js"></script>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>
<!-- <style>
  #myTable_wrapper label{
      color: #fff!important;
  }
  #myTable_wrapper select{
      color: #fff!important;
  }
  #myTable_info{
      color: #fff!important;
  }
  #myTable_filter label input{
      color: #fff!important;
  }
  #myTable_paginate span{
      color: #fff!important;
  }
  #myTable_paginate a{
      color: #fff!important;
  }
  #myTable tr th{
      color: #fff!important;
  } -->
  /*#myTable_wrapper select option{*/
  /*    color: #000!important;*/
  /*}*/

<!-- </style> -->
