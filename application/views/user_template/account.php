<!-- <div class="alert alert-warning text-center alert-dismissable fade show" role="alert"><i class="fa-solid fa-circle-exclamation fa-xl"></i> Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/new/offerwall/timewall" class="alert-link">Timewall</a>!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div> -->
  <div class="container-fluid py-4">
  <div class="row">
  <div class="col-12">
          <div class="alert alert-warning alert-dismissible fade show text-center role="alert">
            <span class="alert-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
            <span class="alert-text">Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/new/offerwall/timewall" style="color: #fff !important;font-weight:bold">Timewall!</a></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
  </div> 
  </div>  
  <p>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
<center><span id="ct_cJd95UwrCma"></span></center><p>
<!-- <div class="row">
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
</div> -->
<div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('newAssets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="<?= base_url() ?>assets/images/users/user.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              <?= $user['username'] ?>
              </h5>
              <!-- <p class="mb-0 font-weight-bold text-sm">
                CEO / Co-Founder
              </p> -->
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0" style="text-align: end;">
              <!-- <button type="button" style="margin-bottom: 0;" class="btn bg-gradient-primary">Edit Profile</button> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row mt-3">
        <div class="col-12 col-md-6 col-xl-3 mt-md-0 mt-4">
          <div class="card  mb-4">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Earning</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $user['total_earned'] ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fa-solid fa-money-bill-1-wave"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-6 mt-md-0 mt-4">
          <div class="card h-100">
            
            <div class="card-body p-3">
              
              <h5 class="mb-3">Profile Information</h5>
              <ul class="list-group">
                
                
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?= $user['email'] ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Country:</strong> &nbsp; <?= ($user['isocode'] != 'N/A') ? '<img src="' . base_url() . 'assets/images/flags/' . $user['isocode'] . '.png" title="' . $user['country'] . '">' : 'N/A' ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Verified:</strong> &nbsp; <?= ($user['verified'] == '1') ? '<span style="color:green"><i class="fa-solid fa-check"></i></span>' : '<span style="color:red"><i class="fa-solid fa-xmark"></i></span>' ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Wallet Address:</strong> &nbsp; <input class="form-control form-control-sm" type="text" name="wallet" value="<?= $user['wallet'] ?>" readonly></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Faucet Claims</strong> &nbsp; <?= $user['faucet_count'] ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Offerwall Claims</strong> &nbsp; <?= $user['offerwall_count'] ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Joined</strong> &nbsp; <?= timespan($user['joined'], time(), 2) ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Last Active</strong> &nbsp; <?= timespan($user['last_active'], time(), 2) ?> ago</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3 mt-md-0 mt-4">
          <div class="card  mb-4">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Referrals</p>
                    <h5 class="font-weight-bolder mb-0">
                    <?= $referralCount ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fa-solid fa-user-plus"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
<center><div class="d2ZaZGtjS2tRd289" style="display:inline-block;width:300px;height:250px;"></div><script>!function(l,i,j,e,k,c){!function l(f,h,d,n,a,b,g){b=h.getElementsByTagName(d)[0],(g=h.createElement(d)).async=!0,g.src="https://"+a+"/js/"+n+".js",b.parentNode.insertBefore(g,b)}(window,document,"script","d2ZaZGtjS2tRd289","cdn.adsfcdn.com")}();</script>
<iframe data-aa='1960488' src='//ad.a-ads.com/1960488?size=300x250' style='width:300px; height:250px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe></center><p>
<div class="row gx-4 mb-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header p-3 pb-0">
              <h6 class="mb-1">Change password</h6>
              
            </div>
            <div class="card-body p-3">
            <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                ?>
                <form action="<?= site_url('account/update_password') ?>" method="POST">
              <label class="form-label">Current password</label>
              <div class="form-group">
                <input class="form-control" type="password" placeholder="Current password">
              </div>
              <label class="form-label">New password</label>
              <div class="form-group">
                <input class="form-control" type="password" placeholder="New password">
              </div>
              <label class="form-label">Confirm new password</label>
              <div class="form-group">
                <input class="form-control" type="password" placeholder="Confirm password">
              </div>
              <button type="submit" class="btn bg-gradient-dark w-100 mb-0">Update password</button>
            </div>
            </form>
          </div>
        </div>
        <div class="col-md-6 mt-md-0 mt-4">
          <div class="card">
            <div class="card-header p-3 pb-0">
              <h6 class="mb-1">
                Password requirements
              </h6>
              <p class="text-sm mb-0">
                Please follow this guide for a strong password:
              </p>
            </div>
            <div class="card-body p-3">
              <ul class="text-muted ps-4 mb-0">
                <li>
                  <span class="text-sm">One special characters</span>
                </li>
                <li>
                  <span class="text-sm">Min 6 characters</span>
                </li>
                <li>
                  <span class="text-sm">One number (2 are recommended)</span>
                </li>
                <li>
                  <span class="text-sm">Change it often</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<!-- <div class="row">
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
</div> -->
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=ps4vT6tvE4"></script>