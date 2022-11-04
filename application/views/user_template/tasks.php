<div class="ads">
    <?= $settings['tasks_top_ad'] ?>
</div>
<?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
}
?>
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
    <?php foreach ($availableTasks as $task) { ?>
        <div class="col-md-6" style="margin-bottom: 5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $task['name'] ?></h5>
                    <p class="card-text"><?= $task['description'] ?></p>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <span><i class="fas fa-gift"></i>: <?= currencyDisplay($task['usd_reward'], $settings) ?></span>
                        </div>
                        <div class="col-md-4">
                            <span><i class="fas fa-level-up-alt"></i>: <?= $task['exp_reward'] ?> exp</span>
                        </div>
                    </div>

                    <form action="<?= site_url('tasks/complete/' . $task['id']) ?>" method="post" autocomplete="off">
                        <div class="form-group">
                            <label>Proof</label>
                            <input type="text" name="proof" class="form-control" placeholder="<?= $task['requirement'] ?>" minlength="1" maxlength="100" required>
                        </div>
                        <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>" />
                        <button type="submit" class="btn btn-primary btn-block">Submit your proof</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php foreach ($pendingTasks as $task) { ?>
        <div class="col-md-6" style="margin-bottom: 5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $task['name'] ?></h5>
                    <p class="card-text"><?= $task['description'] ?></p>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <span><i class="fas fa-gift"></i>: <?= currencyDisplay($task['usd_reward'], $settings) ?></span>
                        </div>
                        <div class="col-md-4">
                            <span><i class="fas fa-level-up-alt"></i>: <?= $task['exp_reward'] ?> exp</span>
                        </div>
                    </div>

                    <form action="<?= site_url('tasks/complete/' . $task['id']) ?>" method="post" autocomplete="off">
                        <div class="form-group">
                            <label>Proof</label>
                            <input type="text" name="proof" class="form-control" value="<?= $task['proof'] ?>" disabled>
                        </div>
                        <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>" />
                        <button type="submit" class="btn btn-primary btn-block" disabled>Submitted</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="ads">
    <?= $settings['tasks_footer_ad'] ?>
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
</script></center><p>
<script>var _coinzilla_fp_id_ = "173623529710ebcf195",  _coinzilla_fp_interval_ = "5"; </script>
<script src="https://coinzillatag.com/lib/fp.js"></script>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>