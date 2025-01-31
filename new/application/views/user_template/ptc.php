<div class="ads">
    <?= $settings['ptc_top_ad'] ?>
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
    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted font-weight-medium">Ads Available</p>
                        <h4 class="mb-0"><?= $totalAds ?></h4>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="fas fa-mouse text-white fa-2x"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted font-weight-medium">Reward</p>
                        <h4 class="mb-0"><?= currencyDisplay($totalReward, $settings) ?></h4>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="fas fa-gifts text-white fa-2x"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted font-weight-medium">Total Time</p>
                        <h4 class="mb-0"><?= $totalTime ?> seconds</h4>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="fa-solid fa-clock fa-2x"></i></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<center><span id="ct_cJd95UwrCma"></span></center><p>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
<div class="layout-px-spacing">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
    }
    ?>
    <div class="row">
        <?php
        foreach ($ptcAds as $ads) { ?>
            <div class="col-sm-4" style="margin-bottom: 5px;">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center"><?= $ads['name'] ?></h3>
                        <p class="card-text text-center"><?= $ads['description'] ?></p>
                        <div class="row text-center">
                            <div class="col">
                                <h5><span class="badge badge-warning"><i class="fas fa-gift fa-xl"></i> <?= currencyDisplay($ads['reward'], $settings) ?></span></h5>
                            </div>
                            <div class="col">
                                <h5 style="color:grey"><span class="badge badge-success"><i class="fas fa-stopwatch fa-xl"></i> <?= $ads['timer'] ?> seconds</span></h5>
                            </div>
                        </div>
				<hr>
                        <button onclick="window.location = '<?= site_url('ptc/view/' . $ads['id']) ?>'" class="btn btn-primary btn-block">View</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php if (!count($ptcAds)) {
        echo '<div class="alert alert-warning text-center">No ads currently available</div>';
    }
    ?>
</div>
<div class="ads">
    <?= $settings['ptc_footer_ad'] ?>
</div>
<script>var _coinzilla_fp_id_ = "173623529710ebcf195",  _coinzilla_fp_interval_ = "5"; </script>
<script src="https://coinzillatag.com/lib/fp.js"></script>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>