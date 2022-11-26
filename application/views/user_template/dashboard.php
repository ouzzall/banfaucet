

<style>

</style>
<div class="container-fluid py-4" style="padding-top: 0 !important;">
  <div class="row">

    <div class="col-12">
      <div class="alert alert-primary text-white alert-dismissible fade show text-center" role="alert">
        <span class="alert-icon"><i class="fa-solid fa-truck-fast"></i></span>
        <span class="alert-text"><strong> NEW! </strong>Fast Faucet is here, earn 1 energy for every offer you complete from offerwalls (includes PTC, Shortlinks, etc.)!.</span>
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
        <span class="alert-text">Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/offerwall/timewall" style="color: #fff !important;font-weight:bold">Timewall!</a></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
                    <a class="text-success" href="https://banfaucet.com/new/faucet">READY</a>
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
     
    </div>
    <div class="col-md-4 mt-4 col-12">
      <div class="card p-3">

        <h5 class="mb-0 font-weight-bolder mb-4">Offerwalls</h5>
        <img style="display: block;margin: auto;" src="newAssets/img/offer-icon.jpg" height="150" width="150">
        <p class="text-center mt-2" style="line-height: 1.3;font-weight: 400;font-size: 14px; ">Complete tasks such as <strong>watch videos</strong>, <strong>complete surveys</strong>,<strong>view PTC ads</strong> and <strong>complete Shortlinks</strong>.</p>
        <hr class="horizontal dark mt-1 mb-3">
        <div class="text-center">
          <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"  class="btn bg-gradient-info" style="padding:0.4rem 0.6rem;">View PTC</button>
          <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropshortlink" class="btn bg-gradient-info" style="padding:0.4rem 0.6rem;">View Shortlinks</button>
          <a href="<?= site_url('offerwalls') ?>"><button type="button" class="btn bg-gradient-info" style="padding:0.4rem 0.6rem;">View All</button></a>
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
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background: #32394e; ">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: #fff;">Offerwall PTC Ads</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <center><a href="https://banfaucet.com/offerwall/offeroc"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/offeroc.svg" alt="Offeroc"></a>
            <hr>
            <a href="https://banfaucet.com/offerwall/timewall"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/timewall.png" alt="Timewall"></a>
            <hr>
            <a href="https://banfaucet.com/offerwall/bitcotasks"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/bitcotasks.png" alt="BitcoTasks"></a>
            <hr>
            <a href="https://banfaucet.com/offerwall/bitswall"><img style="max-width:350px;max-height:60px;filter:brightness(0)" src="https://banfaucet.com/assets/images/bitswall.png" alt="Bitswall"></a>
          </center>
        </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
<div class="modal fade" id="staticBackdropshortlink" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropshortlink" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content " style="background: #32394e; ">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: #fff;">Offerwall Shortlinks</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <center><a href="https://banfaucet.com/offerwall/offeroc"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/offeroc.svg" alt="Offeroc"></a>
            <hr>
            <a href="https://banfaucet.com/offerwall/bitcotasks"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/bitcotasks.png" alt="BitcoTasks"></a>
            <hr>
            <a href="https://banfaucet.com/offerwall/bitswall"><img style="max-width:350px;max-height:60px;filter:brightness(0)" src="https://banfaucet.com/assets/images/bitswall.png" alt="Bitswall"></a>
          </center>
        </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
  <!-- <div class="modal fade" id="offptc" tabindex="-1" aria-labelledby="offptc" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="offptctitle">Offerwall PTC Ads</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <center><a href="https://banfaucet.com/offerwall/offeroc"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/offeroc.svg" alt="Offeroc"></a>
            <hr>
            <a href="https://banfaucet.com/offerwall/timewall"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/timewall.png" alt="Timewall"></a>
            <hr>
            <a href="https://banfaucet.com/offerwall/bitcotasks"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/bitcotasks.png" alt="BitcoTasks"></a>
            <hr>
            <a href="https://banfaucet.com/offerwall/bitswall"><img style="max-width:350px;max-height:60px;filter:brightness(0)" src="https://banfaucet.com/assets/images/bitswall.png" alt="Bitswall"></a>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade " id="offshort" tabindex="-1" role="dialog" aria-labelledby="offpshort" style="padding-right: 17px; display: block;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="offshorttitle">Offerwall Shortlinks</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <center><a href="https://banfaucet.com/offerwall/offeroc"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/offeroc.svg" alt="Offeroc"></a>
            <hr>
            <a href="https://banfaucet.com/offerwall/bitcotasks"><img style="max-width:350px;max-height:60px;" src="https://banfaucet.com/assets/images/bitcotasks.png" alt="BitcoTasks"></a>
            <hr>
            <a href="https://banfaucet.com/offerwall/bitswall"><img style="max-width:350px;max-height:60px;filter:brightness(0)" src="https://banfaucet.com/assets/images/bitswall.png" alt="Bitswall"></a>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> -->


  <!-- new code end -->