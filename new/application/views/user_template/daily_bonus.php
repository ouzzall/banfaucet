<div class="alert alert-warning text-center alert-dismissable fade show" role="alert"><i class="fa-solid fa-circle-exclamation fa-xl"></i> Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/new/offerwall/timewall" class="alert-link">Timewall</a>!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
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
    </script></center><p>

<center><span id="ct_cJd95UwrCma"></span></center><p>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
<?php
$str = $user['streak'];
$dailyStatus = checkTodayBonusStatus($user['id']);
$collectStreak = $user['streak'];
$btn = '';
if ($dailyStatus){
    $now = new DateTime();
    $dateTimeString = date('Y-m-d').' 24:00:00';
    $future_date = new DateTime($dateTimeString);
    $interval = $future_date->diff($now);
    $leftTime = $interval->format("%H").':'.$interval->format("%I").':'.$interval->format("%S");
    $collectStreak = $collectStreak + 1;
    $btn .='<button type="button"  class="btn btn-success btn-sm" style="font-size: 14px;" disabled>'.$leftTime.'</button>';
}else{
    $btn .='<button type="button" style="background: #7D5B28;border-color: #7D5B28;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                    Claim
                                                </button>';
}

?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">Daily Bonus</h4>
                <div class="table-responsive">
                    <table class="table table-hover  text-center" >
                        <thead>
                        <tr>
                            <th scope="col">Streak</th>
                            <th scope="col">Token Reward</th>
                            <th scope="col">Exp Reward</th>
                            <th scope="col">Earning Bonus</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($offers as $offer): ?>
                            <tr>
                                <td><div class="streak"><?= $offer['streak']?></div></td>
                                <td><?= $offer['token'] ?> tokens</td>
                                <td><?= $offer['exp']?> exp</td>
                                <td>+<?= $offer['earning']?>%</td>
                                <td>
                                    <?php if ($offer['streak'] == $collectStreak):?>
                                        <?php echo $btn;?>
                                    <?php endif;?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Complete The Captcha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('/daily-bonus-add')?>" method="GET">
                    <input type="hidden" value="hcaptcha" name="captcha">
                    <input type="hidden" value="<?php echo $str;?>" name="item">
                    <div>
                        <center>
                            <?= $captcha_display ?>
                        </center>
                        <center>
                            <ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script>
                        </center><p>
                        <div style="text-align: center;margin-bottom: 30px;margin-top: 20px;">
                            <button type="submit" class="btn btn-success" style="background: #7D5B28;border-color: #7D5B28;text-align: center">Claim</button>
                        </div>
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
</script></center>
                    </div>
                </form>
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
<script src="<?= base_url() ?>assets/js/vie/captcha.js"></script>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>
<style>
    table td,th{
        color: #fff;
        text-align: center;
        font-size: 14px;

    }
    table td{
        vertical-align: middle;
    }
    td .streak{
        padding: 5px 10px;
        border: 1px solid #2F6AA7;
        border-radius: 4px;
        display: inline-block;
        color: #3366ff;
        background: #18222C;
    }


</style>
<script>
    $(document).ready(function() {

        /* Centering the modal vertically */
        function alignModal() {
            var modalDialog = $(this).find(".modal-dialog");
            modalDialog.css("margin-top", Math.max(0,
                ($(window).height() - modalDialog.height()) / 2));
        }
        $(".modal").on("shown.bs.modal", alignModal);

        /* Resizing the modal according the screen size */
        $(window).on("resize", function() {
            $(".modal:visible").each(alignModal);
        });
    });
</script>