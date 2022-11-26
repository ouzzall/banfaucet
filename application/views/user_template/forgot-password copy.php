<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Reset Password | <?= $settings['name'] ?> - <?= $settings['description'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?= $settings['description'] ?>" name="description" />
    <meta content="Vie Faucet Script" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <!-- <?php if ($settings['theme'] == 'light') {
        echo '<link href="' . base_url() . 'assets/css/bootstrap.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
        echo '<link href="' . base_url() . 'assets/css/app.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
    } else {
        echo '<link href="' . base_url() . 'assets/css/bootstrap-dark.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
        echo '<link href="' . base_url() . 'assets/css/app-dark.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
    }
    ?> -->
    <!-- Icons Css -->
    <!-- <link href="<?= base_url() ?>assets/css/icons.min.css?v=<?= VIE_VERSION ?>" rel="stylesheet" type="text/css" />
    <link href="stylelr.css" rel="stylesheet"> -->
      <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="newAssets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="newAssets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="newAssets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="newAssets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="bg-gray-100">
	<!-- <div class="ebook-header absolute-header fixed-head design-color1 design-color2">  -->
        <!-- Start Header -->
		<!-- <div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12">
					<div class="logo"> -->
                        <!-- Logo -->
						<!-- <a href="https://banfaucet.com"><h1 class="gradient-custom">Banano Faucet</h1> -->
                        <!-- <img src="assets/img/black-wite-logo.png" alt="" /> -->
                    <!-- </a>
					</div>
				</div>
				<div class="col-md-8 col-xs-12">
					<div class="mainmenu"></div> 
                     Start Menu -->
					<!-- <div class="header-menu text-right">
						<ul id="menu"> -->
							<!-- <li><a class="tp-btn" style="color:#45545E" href="https://banfaucet.com/register">Register</a></li>
							<li><a class="tp-btn" href="https://banfaucet.com/login">Login</a></li> -->
						<!-- </ul>
					</div>  -->
                    <!-- End Header -->
				<!-- </div>
			</div>
		</div>
	</div>
<div class="ebook-slider-1 ebook-slider-bg-1 padding-section design-color1 design-color2" id="home">
<h2 class="text-center text-3xl font-extrabold">Reset your password</h2>
<p class="text-center text-sm">Or <a href="https://banfaucet.com/login">login to your account</a></p>
        <div class="container">
<div class="row justify-content-center">
<div class="col-md-6 col-md-offset-3">
<div class="card overflow-hidden">
                            <div class="p-2">
						<p class="mb-6" style="color:#bfc8e2!important;font-weight:400;margin-left:10px">Enter your email address and we will send you instructions on how to reset your password.</p>
                                <form class="form-horizontal" action="<?= site_url('auth/forgot_password') ?>" method="POST">

                                    <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>">

                                    <div class="form-group">
                                        <label style="color:#bfc8e2!important;font-weight:500;" for="email">Email</label>
					      <div class="input-group">
        					<div class="input-group-prepend">
        				      <div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
        					</div>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                                    </div>
						</div>

                                    <center>
                                        <?= $captcha_display ?>
                                    </center>
						<center>
						    <ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script>
						</center><p>

                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset your password</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div> -->
                    <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('newAssets/img/curved-images/curved9.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome</h1>
            <p class="text-lead text-white">Using a VPN or Proxy is against the rules Creating multiple accounts will result in being banned Using a temp e-mail address is not allowed</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Reset your password</h5>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="<?= site_url('auth/forgot_password') ?>" method="POST">
                <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>">
                <div class="mb-3">
                  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" aria-label="Email" required>
                  
                </div>
                <div>
                                

                                    <center>
                                        <?= $captcha_display ?>
                                    </center>
                        <center>
						    <ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script>
						</center>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Reset Your Password</button>
                </div>
                <div class="mb-2 position-relative text-center">
                  <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                    or
                  </p>
                </div>
                <div class="text-center">
                    <a href="<?= site_url('login') ?>">
                        <button type="button" class="btn bg-gradient-dark w-100 mt-2 mb-4">Sign in</button>
                    </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
                    <footer class="footer py-5">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="https://t.me/banfaucet" target="_blank" class="text-secondary me-xl-4 me-4">
            <i class="fa-brands fa-telegram"></i>
          </a>
          <a href="https://discord.gg/EcUfn9MtV3" target="_blank" class="text-secondary me-xl-4 me-4">
            <i class="fa-brands fa-discord"></i>
          </a>
          <a href="https://reddit.com/r/banfaucet/" target="_blank" class="text-secondary me-xl-4 me-4">
            <i class="fa-brands fa-reddit"></i>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            &copy; 2022 Banano Faucet. | <i class="fas fa-clock"></i> Server Time: <?= date('H:i') ?>
          </p>
        </div>
      </div>
    </div>
  </footer>
    <?= $settings['footer_code'] ?>
    <!-- JAVASCRIPT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url() ?>assets/js/app.js?v=<?= VIE_VERSION ?>"></script>
    <script src="<?= base_url() ?>assets/js/vie/captcha.js"></script>
<!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <?php include 'adblock.php'; ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (isset($_SESSION['sweet_message'])) {
        echo $_SESSION['sweet_message'];
    }
    ?>
    <script src="https://kit.fontawesome.com/affd6d170a.js" crossorigin="anonymous"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-40X8JY6KVR"></script>
<script src="https://kit.fontawesome.com/affd6d170a.js" crossorigin="anonymous"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-40X8JY6KVR');
</script>
</body>

</html>