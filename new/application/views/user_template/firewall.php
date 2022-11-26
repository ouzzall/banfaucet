<center><span id="ct_cJd95UwrCma"></span></center><p>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Firewall</h4>
                <div class="alert alert-warning text-center">Please solve the captcha to continue!</div>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                ?>
                <form action="<?= site_url('firewall/verify') ?>" method="POST">
                    <center>
                        <?= $captcha['code'] ?>
                    </center><p>
                    <input type="hidden" name="captchaType" value="<?= $captcha['name'] ?>">
                    <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>">
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary w-md">Unlock</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>var _coinzilla_fp_id_ = "173623529710ebcf195",  _coinzilla_fp_interval_ = "5"; </script>
<script src="https://coinzillatag.com/lib/fp.js"></script>
<center><ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script></center>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>