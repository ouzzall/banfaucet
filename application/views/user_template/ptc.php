<div class="container-fluid py-4">
<!-- <div class="ads">
    <?= $settings['ptc_top_ad'] ?>
</div> -->
<div class="row">
<div class="col-12">
          <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <span class="alert-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
            <span class="alert-text">Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/new/offerwall/timewall" style="color: #fff !important;font-weight:bold">Timewall!</a></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div class="col-12">
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <i class="fa-solid fa-gift fa-xl"></i> Redeem coupon code <b>25OFF</b> to get 25% advertising discount!
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
<div class="col-lg-4 col-sm-6 mt-3">
		<div class="card  mb-4">
			<div class="card-body p-3">
				<div class="row">
					<div class="col-8">
						<div class="numbers">
							<p class="text-sm mb-0 text-capitalize font-weight-bold">Ads Available</p>
							<h5 class="font-weight-bolder mb-0">
                            <?= $totalAds ?>
                        </h5> </div>
					</div>
					<div class="col-4 text-end">
						<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"> <i class="fa-solid fa-film text-lg opacity-10"></i> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="col-lg-4 col-sm-6 mt-3">
		<div class="card  mb-4">
			<div class="card-body p-3">
				<div class="row">
					<div class="col-8">
						<div class="numbers">
							<p class="text-sm mb-0 text-capitalize font-weight-bold">Reward</p>
							<h5 class="font-weight-bolder mb-0">
                            <?= currencyDisplay($totalReward, $settings) ?>
                        </h5> </div>
					</div>
					<div class="col-4 text-end">
						<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"> <i class="fa-solid fa-ticket text-lg opacity-10"></i> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="col-lg-4 col-sm-6 mt-3">
		<div class="card  mb-4">
			<div class="card-body p-3">
				<div class="row">
					<div class="col-8">
						<div class="numbers">
							<p class="text-sm mb-0 text-capitalize font-weight-bold">Total Time</p>
							<h5 class="font-weight-bolder mb-0">
                            <?= $totalTime ?>
                        </h5> </div>
					</div>
					<div class="col-4 text-end">
						<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"> <i class="fa-solid fa-clock text-lg opacity-10"></i> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
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
    </div> -->
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
            <div class="col-sm-4 mt-3 mx-auto" style="margin-bottom: 5px;">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center"><?= $ads['name'] ?></h3>
                            <div class="desc" style="min-height: 126px;">
                                <p class="card-text text-center"><?= $ads['description'] ?></p>
                            </div>    
                        <div class="row text-center">
                            <div class="col-6">
                                <h5><span class="badge badge-warning"><i class="fas fa-gift fa-xl"></i> <?= currencyDisplay($ads['reward'], $settings) ?></span></h5>
                            </div>
                            <div class="col-6">
                                <h5 style="color:grey"><span class="badge badge-success"><i class="fas fa-stopwatch fa-xl"></i> <?= $ads['timer'] ?> seconds</span></h5>
                            </div>
                        </div>
				<hr>
                        <button style="display: block;" onclick="window.location = '<?= site_url('ptc/view/' . $ads['id']) ?>'" class="btn btn-primary btn-block mx-auto">View</button>
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
</div>
<script>var _coinzilla_fp_id_ = "173623529710ebcf195",  _coinzilla_fp_interval_ = "5"; </script>
<script src="https://coinzillatag.com/lib/fp.js"></script>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>