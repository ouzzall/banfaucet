<div class="alert alert-warning text-center alert-dismissable fade show" role="alert"><i class="fa-solid fa-circle-exclamation fa-xl"></i> Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/offerwall/timewall" class="alert-link">Timewall</a>!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div><p><div class="ads">
    <?= $settings['dashboard_top_ad'] ?>
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
    <div class="col-md-6 col-xl-6 mb-1 mb-xl-6">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted font-weight-medium">Contest Ends</p>
                        <h4 class="mb-0"><?= timespan(time(), $leaderboardSettings["leaderboard_date"], 2) ?></h4>
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
    <div class="col-md-6 col-xl-6 mb-2 mb-xl-6">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted font-weight-medium">Rankings Updated</p>
                        <h4 class="mb-0">10 minutes</h4>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="fa-solid fa-arrow-rotate-right fa-2x"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<center><span id="ct_cJd95UwrCma"></span></center><p>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
    <?php if ($settings['referral_contest_reward'] != "") {
        $rewards = explode('|', $settings['referral_contest_reward'])
    ?>
<div class="row">
        <div class="col-12 col-md-6 col-lg-6 order-md-1 mb-4 text-center">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title mb-4">Referral Contest</h4>
                    <div class="alert alert-info" role="alert">Your referrals this week: <?= $user['ref_count'] ?></div>
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
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Referral</th>
                                    <th scope="col">Reward</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rank = 0;
                                foreach ($topReferral as $u) {
                                    $reward = $rank < count($rewards) ? $rewards[$rank] : 0;
                                    echo '<tr><th scope="row">' . ++$rank . '</th><td class="username-rank">' . $u["username"] . '</td><td>' . $u["level"] . '</td><td>' . $u["ref_count"] . '</td><td>' . currencyDisplay($reward, $settings) . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($settings['offerwall_contest_reward'] != "") {
        $rewards = explode('|', $settings['offerwall_contest_reward'])
    ?>
        <div class="col-12 col-md-6 col-lg-6 order-md-1 mb-4 text-center">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title mb-4">Offerwall Contest</h4>
                    <div class="alert alert-info" role="alert">Your offerwall claims this week: <?= $user['offerwall_count_tmp'] ?></div>
				<center><ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script></center>
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Claims</th>
                                    <th scope="col">Reward</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rank = 0;
                                foreach ($topOfferwall as $u) {
                                    $reward = $rank < count($rewards) ? $rewards[$rank] : 0;
                                    echo '<tr><th scope="row">' . ++$rank . '</th><td class="username-rank">' . $u["username"] . '</td><td>' . $u["level"] . '</td><td>' . $u["offerwall_count_tmp"] . '</td><td>' . currencyDisplay($reward, $settings) . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="col-12 col-md-6 col-lg-6 order-md-1 mb-4 text-center">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title mb-4">Level Leaderboard</h4>
                <p>Top 15</p>
			<center><iframe data-aa='1960488' src='//ad.a-ads.com/1960488?size=300x250' style='width:300px; height:250px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe></center>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rank = 1;
                            foreach ($topLevel as $u) {
                                echo '<tr><th scope="row">' . $rank++ . '</th><td class="username-rank">' . $u["username"] . '</td><td>' . $u["level"] . '</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php if ($settings['activity_contest_reward'] != "") {
        $rewards = explode('|', $settings['activity_contest_reward'])
    ?>
        <div class="col-12 col-md-6 col-lg-6 order-md-1 mb-4 text-center">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title mb-4">Activity contest leaderboard</h4>
                    <p>Top 20 claimers of this week! Your exp earned this week: <?= $user['claims'] ?></p>
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Exp</th>
                                    <th scope="col">Reward</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rank = 0;
                                foreach ($topClaimer as $u) {
                                    $reward = $rank < count($rewards) ? $rewards[$rank] : 0;
                                    echo '<tr><th scope="row">' . ++$rank . '</th><td class="username-rank">' . $u["username"] . '</td><td>' . $u["level"] . '</td><td>' . $u["claims"] . '</td><td>' . currency($reward, $settings['currency_rate']) . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($settings['faucet_contest_reward'] != "") {
        $rewards = explode('|', $settings['faucet_contest_reward'])
    ?>
        <div class="col-12 col-md-6 col-lg-6 order-md-1 mb-4 text-center">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title mb-4">Faucet contest leaderboard</h4>
                    <p>Top 20 users of faucet contest! Your faucet claim this week: <?= $user['faucet_count_tmp'] ?></p>
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Claims</th>
                                    <th scope="col">Reward</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rank = 0;
                                foreach ($topFaucet as $u) {
                                    $reward = $rank < count($rewards) ? $rewards[$rank] : 0;
                                    echo '<tr><th scope="row">' . ++$rank . '</th><td class="username-rank">' . $u["username"] . '</td><td>' . $u["level"] . '</td><td>' . $u["faucet_count_tmp"] . '</td><td>' . currency($reward, $settings['currency_rate']) . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($settings['shortlink_contest_reward'] != "") {
        $rewards = explode('|', $settings['shortlink_contest_reward'])
    ?>
        <div class="col-12 col-md-6 col-lg-6 order-md-1 mb-4 text-center">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title mb-4">Shortlink contest leaderboard</h4>
                    <p>Top 20 users of shortlink contest! Your shortlink claim this week: <?= $user['shortlink_count_tmp'] ?></p>
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Claims</th>
                                    <th scope="col">Reward</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rank = 0;
                                foreach ($topShortlink as $u) {
                                    $reward = $rank < count($rewards) ? $rewards[$rank] : 0;
                                    echo '<tr><th scope="row">' . ++$rank . '</th><td class="username-rank">' . $u["username"] . '</td><td>' . $u["level"] . '</td><td>' . $u["shortlink_count_tmp"] . '</td><td>' . currencyDisplay($reward, $settings) . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script>var _coinzilla_fp_id_ = "173623529710ebcf195",  _coinzilla_fp_interval_ = "5"; </script>
<script src="https://coinzillatag.com/lib/fp.js"></script>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>