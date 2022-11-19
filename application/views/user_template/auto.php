<div class="container-fluid py-4">
<center><script async src="https://coinzillatag.com/lib/display.js"></script>
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title mb-4">Fast Faucet</h4>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
<center><span id="ct_cJd95UwrCma"></span></center><p>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                if (!isset($error)) { ?>
				<center><b>10 energy per claim</b></center>
                    <div class="text-center">
                        <div class="alert alert-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift">
                                <polyline points="20 12 20 22 4 22 4 12"></polyline>
                                <rect x="2" y="7" width="20" height="5"></rect>
                                <line x1="12" y1="22" x2="12" y2="7"></line>
                                <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                                <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                            </svg>
                            Please wait <b id="minute"><?= floor($settings['autofaucet_timer'] / 60) ?></b>:<b id="second"><?= $settings['autofaucet_timer'] % 60 ?></b> to get <?= currencyDisplay($settings['autofaucet_reward'], $settings) ?>
                        </div>
                        <div class="progress br-30" style="height:20px;">
                            <div class="progress-bar-striped progress-bar-animated bg-success" id="progress" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="60"></div>
                        </div>
                        <form action="<?= site_url('auto/verify') ?>" method="POST" id="verify">
                            <input type="hidden" name="token" value="<?= $_SESSION['autoFaucetToken'] ?>">
                        </form>
                        <script>
                            let timer = <?= $settings['autofaucet_timer'] ?>,
                                current = 0;
                            const autoFaucet = setInterval(function() {
                                current += 1;
                                let percent = current * 100 / timer;
                                $('#progress').attr('style', 'width: ' + percent + '%;');
                                $('#progress').attr('aria-valuenow', percent);
                                if (current >= timer) {
                                    clearInterval(autoFaucet);
                                    $('#verify').submit();
                                } else {
                                    let wait = Math.floor(timer - current);
                                    let minutes = Math.floor(wait / 60);
                                    let seconds = wait % 60;
                                    $('#minute').text(minutes);
                                    $('#second').text(seconds);
                                    wait -= 1;
                                }
                            }, 1000);
                        </script>
                    </div>
                <?php } else {
                    echo '<div class="alert alert-danger" role="alert">
  To continue using the Fast Faucet you have to earn more energy by completing offers in the <a href="https://banfaucet.com/new/offerwalls" class="alert-link">Offerwall</a> section.
</div>';
                } ?>
                <!-- end table-responsive -->
            </div>
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
    </div>
</div>
<center><ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script>
<iframe data-aa='1960488' src='//ad.a-ads.com/1960488?size=300x250' style='width:300px; height:250px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe></center><p>
  </div>
</div>
</div>
            </div>
<script>var _coinzilla_fp_id_ = "173623529710ebcf195",  _coinzilla_fp_interval_ = "5"; </script>
<script src="https://coinzillatag.com/lib/fp.js"></script>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>