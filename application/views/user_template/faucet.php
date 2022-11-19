<!-- <div class="ads">
    <?= $settings['faucet_top_ad'] ?>
</div> -->
<div class="container-fluid py-4">
<div class="row">

  <div class="col-12">
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <i class="fa-solid fa-cloud-rain fa-xl"></i> <b>HOT!</b> Join our <a href="https://t.me/banfaucet" class="alert-link" target="_blank">Telegram Group</a> to be a part of a massive Rain, Airdrop crypto giveaway going on right now!
        <button type="button" class="btn-close" data-b  s-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
          <div class="alert alert-warning alert-dismissible fade show text-center role="alert">
            <span class="alert-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
            <span class="alert-text">Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/new/offerwall/timewall" style="color: #fff !important;font-weight:bold">Timewall!</a></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
  </div>
<center><!-- Coinzilla Banner 728x90 -->
<script async src="https://coinzillatag.com/lib/display.js"></script>
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

<div class="col-lg-3 col-sm-6">
              <div class="card  mb-4">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Claim Timer</p>
                        <h5 class="font-weight-bolder mb-0">
                          7:11
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="fa-solid fa-stopwatch text-lg opacity-10"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mt-3">
              <div class="card  mb-4">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Claim Timer</p>
                        <h5 class="font-weight-bolder mb-0">
                          7:11
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="fa-solid fa-stopwatch text-lg opacity-10"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-lg-3 col-sm-6 mt-3">
              <div class="card  mb-4">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Claim Timer</p>
                        <h5 class="font-weight-bolder mb-0">
                          7:11
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="fa-solid fa-stopwatch text-lg opacity-10"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-lg-3 col-sm-6 mt-3">
              <div class="card  mb-4">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Claim Timer</p>
                        <h5 class="font-weight-bolder mb-0">
                          7:11
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="fa-solid fa-stopwatch text-lg opacity-10"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>            
</div>
<div class="row">
    <div class="col-md-6 col-xl-3 mb-3 mb-xl-3">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
				<p class="text-muted font-weight-medium">Timer</p>
                        <?php
                        if ($wait) { ?>
                            <h4 class="mb-0"><b id="minute"><?= floor($wait / 60) ?></b>:<b id="second"><?= $wait % 60 ?></b></h4>
                        <?php } else { ?>
                            <h4 class="mb-0">READY</h4>
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
                        <p class="text-muted font-weight-medium">Collect Every</p>
                        <h4 class="mb-0"><?= floor($settings['timer'] / 60) ?> minutes</h4>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="far fa-clock text-white fa-2x"></i>
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
                        <p class="text-muted font-weight-medium">Reward</p>
                        <h4 class="mb-0"><?= currencyDisplay($settings['reward'], $settings) ?> <sup><span class="text-success me-2">+<?= $bonus ?>% bonus</span></sup></h4>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="fas fa-gifts text-success fa-2x"></i>
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
                        <p class="text-muted font-weight-medium">Claims</p>
                        <h4 class="mb-0"><?= $countHistory ?>/<?= $settings['daily_limit'] ?></h4>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="fas fa-fire text-warning fa-2x"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<center><span id="ct_c1c1RkyZBbe"></span></center>
<center><span id="ct_cJd95UwrCma"></span></center><p>
<div class="row">
    <div class="col-12 col-md-8 col-lg-6 order-md-2 mb-4 text-center">
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>
        <div class="ads">
            <?= $settings['faucet_header_ad'] ?>
        </div>
        <?php if ($limit) { ?>
            <div class="alert alert-warning text-center">Daily limit reached!</div>
            <div class="ads">
                <?= $settings['faucet_bottom_ad'] ?>
            </div>
        <?php } else if ($wait) { ?>
            <div class="ads">
                <?= $settings['faucet_bottom_ad'] ?>
            </div>
            <script type="text/javascript">
                var wait = <?= $wait ?> - 1;
            </script>
        <?php } ?>
        <?php if (!$limit && !$wait) { ?>
            <form action="<?= site_url('/faucet/verify') ?>" method="POST">
                <?php if ($settings['antibotlinks'] == 'on') {
                    echo $antibot_show_info;
                }
                ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-4">
                    <?php
                    if ($anti_pos[0] == 0) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[1] == 0) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[2] == 0) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    ?>
                </div>
                <div class="col">
                    <?php
                    if ($anti_pos[0] == 1) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[1] == 1) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[2] == 1) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    ?>
                </div>
                <div class="col">
                    <?php
                    if ($anti_pos[0] == 2) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[1] == 2) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[2] == 2) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    ?>
                </div>
                <div class="col">
                    <?php
                    if ($anti_pos[0] == 3) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[1] == 3) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[2] == 3) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    ?>
                </div>
                <div class="col">
                    <?php
                    if ($anti_pos[0] == 4) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[1] == 4) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[2] == 4) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    ?>
                </div>
                <div class="col">
                    <?php
                    if ($anti_pos[0] == 5) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[1] == 5) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[2] == 5) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    ?>
    </div>
  </div>
</div>
                <input type="hidden" name="<?= $csrf_name ?>" id="token" value="<?= $csrf_hash ?>">
                <input type="hidden" name="token" value="<?= $user['token'] ?>">
 <p>
<center>
<iframe data-aa='1960488' src='//ad.a-ads.com/1960488?size=300x250' style='width:300px; height:250px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>
</center><p>
                <center>
                    <?= $captcha_display ?>
                </center><p>
                <div class="ads">
                    <?= $settings['faucet_bottom_ad'] ?>
                </div>
                <div class="atb">
                    <?php
                    if ($anti_pos[0] == 4) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[1] == 4) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    if ($anti_pos[2] == 4) {
                        echo '<div class="antibotlinks"></div>';
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary btn-lg claim-button" disabled><i class="far fa-check-circle"></i> Collect <?= ($useEnergy) ? ' (-' . $settings['faucet_cost'] . 'energy)' : '' ?></button>
            </form>
        <?php } ?><p>
<center><!-- Coinzilla Banner 300x250 -->
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
    </div>
<script>var _coinzilla_fp_id_ = "173623529710ebcf195",  _coinzilla_fp_interval_ = "5"; </script>
<script src="https://coinzillatag.com/lib/fp.js"></script>
<script async src="https://appsha-pnd.ctengine.io/js/script.js?wkey=lgXFfbiPoT"></script>
<script async src="https://appsha-pnd.ctengine.io/js/script.js?wkey=ps4vT6tvE4"></script>
    <div class="col-6 col-md-2 col-lg-3 order-md-1 p-0 left-ads"><?= $settings['faucet_left_ad'] ?></div>
    <div class="col-6 col-md-2 col-lg-3 order-md-3 p-0 right-ads"><?= $settings['faucet_right_ad'] ?></div>
</div>
<div class="ads">
    <?= $settings['faucet_footer_ad'] ?>
</div>