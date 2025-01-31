<div class="alert alert-warning text-center alert-dismissable fade show" role="alert"><i class="fa-solid fa-circle-exclamation fa-xl"></i> Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/new/offerwall/timewall" class="alert-link">Timewall</a>!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div><p>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
<center><span id="ct_cJd95UwrCma"></span></center><p>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
		    <h4 class="card-title mb-4">Account Information</h4>
			<table class="table table-striped table-dark">
  <tbody>
    <tr>
      <th scope="row">Username</th>
      <td><?= $user['username'] ?></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><?= $user['email'] ?></td>
    </tr>
    <tr>
	<th scope="row">Country</th>
	<td><?= ($user['isocode'] != 'N/A') ? '<img src="' . base_url() . 'assets/images/flags/' . $user['isocode'] . '.png" title="' . $user['country'] . '">' : 'N/A' ?></td>
    </tr>
    <tr>
      <th scope="row">Verified</th>
      <td><?= ($user['verified'] == '1') ? '<span style="color:green"><i class="fa-solid fa-check"></i></span>' : '<span style="color:red"><i class="fa-solid fa-xmark"></i></span>' ?></td>
    </tr>
    <tr>
      <th scope="row">Wallet Address</th>
      <td><input class="form-control form-control-sm" type="text" name="wallet" value="<?= $user['wallet'] ?>" readonly></td>
    </tr>
    <tr>
      <th scope="row">Faucet Claims</th>
      <td><?= $user['faucet_count'] ?></td>
    </tr>
    <tr>
      <th scope="row">Offerwall Claims</th>
      <td><?= $user['offerwall_count'] ?></td>
    </tr>
    <tr>
      <th scope="row">Joined</th>
      <td colspan="2"><?= timespan($user['joined'], time(), 2) ?> ago</td>
    </tr>
    <tr>
      <th scope="row">Last Active</th>
      <td colspan="2"><?= timespan($user['last_active'], time(), 2) ?> ago</td>
    </tr>
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>
<center><div class="d2ZaZGtjS2tRd289" style="display:inline-block;width:300px;height:250px;"></div><script>!function(l,i,j,e,k,c){!function l(f,h,d,n,a,b,g){b=h.getElementsByTagName(d)[0],(g=h.createElement(d)).async=!0,g.src="https://"+a+"/js/"+n+".js",b.parentNode.insertBefore(g,b)}(window,document,"script","d2ZaZGtjS2tRd289","cdn.adsfcdn.com")}();</script>
<iframe data-aa='1960488' src='//ad.a-ads.com/1960488?size=300x250' style='width:300px; height:250px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe></center><p>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Change password</h4>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                ?>
                <form action="<?= site_url('account/update_password') ?>" method="POST">
                    <div class="form-group row mb-4">
                        <input type="hidden" name="<?= $csrf_name ?>" id="token" value="<?= $csrf_hash ?>">
                        <label class="col-sm-3 col-form-label">Current password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control mb-4" id="old-password" name="old_password" required="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">New password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control mb-4" id="new-password" name="password" required="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Confirm new password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control mb-4" id="confirm-new-password" name="confirm_password" required="">
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Change</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=ps4vT6tvE4"></script>