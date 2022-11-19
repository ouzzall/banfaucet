<div class="container-fluid py-4" style="padding-top: 0 !important;">
<div class="alert alert-warning alert-dismissible fade show text-center" role="alert"><i class="fa-solid fa-circle-exclamation fa-xl"></i> Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/new/offerwall/timewall" class="alert-link">Timewall</a>!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>
<!-- <div class="ads">
    <?= $settings['achievements_top_ad'] ?>
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
<center><span id="ct_cJd95UwrCma"></span></center><p>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title mb-4">Challenges</h4>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                ?>
                <div class="table-responsive">
                <table class="table table-flush" id="products-list">
                  <thead class="thead-light">
                    <tr>
                    <th>Challenges</th>
                                <th>Reward</th>
                                <th>Progress</th>
                                <th></th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($achievements as $achievement) { ?>
                                <tr>
                                    <td><?= $achievement['description'] ?></td>
                                    <td>
                                        <?= currencyDisplay($achievement['reward_usd'], $settings) ?></span>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 20px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $achievement['progress'] ?>%;" aria-valuenow="<?= $achievement['progress'] ?>" aria-valuemin="0" aria-valuemax="100"><?= $achievement['completed'] ?>/ <?= $achievement['condition'] ?></div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="<?= site_url('achievements/claim/' . $achievement['id']) ?>" method="POST">
                                            <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>">
                                            <?php if ($achievement['completed'] >= $achievement['condition']) { ?>
                                                <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button>
                                            <?php } else { ?>
                                                <button disabled type="submit" class="btn btn-outline-secondary"><i class="fa-solid fa-check"></i></button>
                                            <?php } ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php if (!todayOffwewallClaim($user)):?>
                        <tr>
                            <?php
                                $total = $offerwallEarning->total;
                            ?>
                            <td>Earn $1 USD in Offerwalls</td>
                            <td>50 tokens</td>
                            <td>
                                <div class="progress" style="height: 20px;">
                                    <div style="height: 20px;" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $total >= 1 ? 100:0 ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?= $total >= 1 ? 100 :0 ?></div>
                                </div>
                            </td>
                            <td>
                                <?php if ($total >= 1):?>
                                    <a  href="<?php echo site_url('achievements/claim_offerwall')?>" class="btn btn-outline-secondary"><i class="fa-solid fa-check"></i></a>
                                <?php else: ?>
                                    <button disabled  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-check"></i></button>
                                <?php endif;?>
                            </td>
                        </tr>
                        <?php endif;?>
                        </tbody>
                 
                </table>
              </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

<div class="ads">
    <?= $settings['achievements_footer_ad'] ?>
</div>
</div>
<style>
    .table td {
  vertical-align: middle;
}
</style>
<script>var _coinzilla_fp_id_ = "173623529710ebcf195",  _coinzilla_fp_interval_ = "5"; </script>
<script src="https://coinzillatag.com/lib/fp.js"></script>
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
</script></center><p>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>