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
    <?php if ($settings['theme'] == 'light') {
        echo '<link href="' . base_url() . 'assets/css/bootstrap.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
        echo '<link href="' . base_url() . 'assets/css/app.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
    } else {
        echo '<link href="' . base_url() . 'assets/css/bootstrap-dark.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
        echo '<link href="' . base_url() . 'assets/css/app-dark.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
    }
    ?>
    <!-- Icons Css -->
    <link href="<?= base_url() ?>assets/css/icons.min.css?v=<?= VIE_VERSION ?>" rel="stylesheet" type="text/css" />
    <link href="stylelr.css" rel="stylesheet">
</head>

<body>
	<div class="ebook-header absolute-header fixed-head design-color1 design-color2"> <!-- Start Header -->
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12">
					<div class="logo"> <!-- Logo -->
						<a href="https://banfaucet.com"><h1 class="gradient-custom">Banano Faucet</h1><!-- <img src="assets/img/black-wite-logo.png" alt="" /> --></a>
					</div>
				</div>
				<div class="col-md-8 col-xs-12">
					<div class="mainmenu"></div> <!-- Start Menu -->
					<div class="header-menu text-right">
						<ul id="menu">
							<!-- <li><a class="tp-btn" style="color:#45545E" href="https://banfaucet.com/register">Register</a></li>
							<li><a class="tp-btn" href="https://banfaucet.com/login">Login</a></li> -->
						</ul>
					</div> <!-- End Header -->
				</div>
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
                    </div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="author-links margin-top">
							<ul>
								<li><a href="https://t.me/banfaucet" target="_blank" class="gradient-custom"><i class="fa-brands fa-telegram"></i></a></li>
								<li><a class="gradient-custom" href="https://discord.gg/EcUfn9MtV3" target="_blank"><i class="fa-brands fa-discord"></i></a></li>
								<li><a class="gradient-custom" href="https://reddit.com/r/banfaucet/" target="_blank"><i class="fa-brands fa-reddit"></i></a></li>
							</ul>
						</div>
					<div class="footer-copyrite">
						<p>&copy; 2022 Banano Faucet. | <i class="fas fa-clock"></i> Server Time: <?= date('H:i') ?></p>
					</div>
				</div>
			</div>
		</div>
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