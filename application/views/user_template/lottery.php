<div class="container-fluid py-4">
<div class="row">
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
<!-- <div class="ads">
    <?= $settings['lottery_top_ad'] ?>
</div> -->
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
							<p class="text-sm mb-0 text-capitalize font-weight-bold">Drawing In</p>
							<h5 class="font-weight-bolder mb-0">
                            <?= timespan(time(), $settings['lottery_date'], 2) ?>
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
							<p class="text-sm mb-0 text-capitalize font-weight-bold">You Have</p>
							<h5 class="font-weight-bolder mb-0">
                            <?= $countLotteries ?> <?= $countLotteries > 0 ? 'tickets' : 'ticket' ?>
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
							<p class="text-sm mb-0 text-capitalize font-weight-bold">Current Jackpot</p>
							<h5 class="font-weight-bolder mb-0">
                            <?= currencyDisplay($current_reward, $settings) ?>
                        </h5> </div>
					</div>
					<div class="col-4 text-end">
						<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"> <i class="fa-solid fa-clock text-lg opacity-10"></i> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- <div class="col-md-6 col-xl-4 mb-2 mb-xl-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted font-weight-medium">Drawing In</p>
                        <h4 class="mb-0"><?= timespan(time(), $settings['lottery_date'], 2) ?></h4>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="fas fa-stopwatch text-white fa-2x"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="col-md-6 col-xl-4 mb-2 mb-xl-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted font-weight-medium">You Have</p>
                        <h4 class="mb-0"><?= $countLotteries ?> <?= $countLotteries > 0 ? 'tickets' : 'ticket' ?></h4>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="fa-solid fa-ticket fa-2x"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="col-md-6 col-xl-4 mb-2 mb-xl-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted font-weight-medium">Current Jackpot</p>
                        <h4 class="mb-0"><?= currencyDisplay($current_reward, $settings) ?></h4>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="fas fa-star text-white fa-2x"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<center><span id="ct_cJd95UwrCma"></span></center><p>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
<div class="row">
    <div class="col-12 col-md-8 col-lg-6 order-md-2 mx-auto mb-4">

        <?php if (time() >= $settings['lottery_date']) { ?>
            <div class="alert alert-info text-center">This round has ended</div>
        <?php } else { ?>
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title mb-4">Buy tickets</h4>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                    }
                    ?>
                    <form action="<?= site_url('/lottery/buy') ?>" method="POST" autocomplete="off">
                        <input type="hidden" name="<?= $csrf_name ?>" id="token" value="<?= $csrf_hash ?>">
                        <input type="number" class="form-control lottery-amount" id="lotteryAmount" name="amount" type="text" placeholder="Amount of tickets" min="1" value="1" required />
<center>
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
</center>
                        <button class="btn btn-success" id="buyButton">Buy 1 ticket with <?= currencyDisplay($settings['lottery_price'], $settings) ?></button>
                    </form>
                    <script>
                        var lotteryPrice = <?= $settings['lottery_price'] / $settings['currency_rate'] ?>;
                    </script>
                </div>
            </div>
        <?php } ?><p>

<center><ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script></center><p>

        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title mb-4">Last 10 Tickets</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Number</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($lotteries as $value) {
                                echo '<tr><th scope="row">' . $value["id"] . '</th><td><span class="badge badge-success">' . $value["number"] . '</span></td><td>' . timespan($value["create_time"], time(), 2) . ' ago</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><p>

<center><iframe data-aa='1960488' src='//ad.a-ads.com/1960488?size=300x250' style='width:300px; height:250px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe></center><p>

        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title mb-4">Last 10 Winners</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Number</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($winners as $value) {
                                echo '<tr><th scope="row">' . $value["username"] . '</th><td><span class="badge badge-success">' . $value["number"] . '</span></td><td>' . currencyDisplay($value["amount"], $settings) . '</td><td>' . timespan($value["create_time"], time(), 2) . ' ago</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-2 col-lg-3 order-md-1 p-0 left-ads"><?= $settings['lottery_left_ad'] ?></div>
    <div class="col-6 col-md-2 col-lg-3 order-md-3 p-0 right-ads"><?= $settings['lottery_right_ad'] ?></div>
</div>
                        </div>
<script>var _coinzilla_fp_id_ = "173623529710ebcf195",  _coinzilla_fp_interval_ = "5"; </script>
<script src="https://coinzillatag.com/lib/fp.js"></script>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>