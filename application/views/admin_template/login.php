<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | <?= $settings['name'] ?> - <?= $settings['description'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?= $settings['description'] ?>" name="description" />
    <meta content="Vie Faucet Script" name="author" />
    <meta name=”robots” content=”noindex,nofollow”>
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
    <link href="<?= base_url() ?>assets/css/styles.css?v=<?= VIE_VERSION ?>" rel="stylesheet" type="text/css" />
    <link href="stylelr.css" rel="stylesheet">

</head>

<body>
	<div class="ebook-header absolute-header fixed-head design-color1 design-color2"> <!-- Start Header -->
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12">
					<div class="logo"> <!-- Logo -->
						<a href="https://banfaucet.com/new"><h1 class="gradient-custom">Banano Faucet</h1><!-- <img src="assets/img/black-wite-logo.png" alt="" /> --></a>
					</div>
				</div>
				<div class="col-md-8 col-xs-12">
					<div class="mainmenu"></div> <!-- Start Menu -->
					<div class="header-menu text-right">
						<ul id="menu">
							<!-- <li><a class="tp-btn" style="color:#45545E" href="https://banfaucet.com/new/register">Register</a></li>
							<li><a class="tp-btn" href="https://banfaucet.com/new/login">Login</a></li> -->
						</ul>
					</div> <!-- End Header -->
				</div>
			</div>
		</div>
	</div>
<div class="ebook-slider-1 ebook-slider-bg-1 padding-section design-color1 design-color2" id="home">
        <div class="container">
<div class="row justify-content-center">
<div class="col-md-6 col-md-offset-3">
<div class="card overflow-hidden">
                            <div class="p-2">

                                <?php
                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                }
                                ?>

                                <form class="form-horizontal" action="<?= site_url('admin/auth/login') ?>" method="POST">

                                    <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>">

                                    <div class="form-group">
                                        <label style="color:#bfc8e2!important;font-weight:500;" for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                                    </div>

                                    <div class="form-group">
                                        <label style="color:#bfc8e2!important;font-weight:500;" for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                    </div>
                                    <?php if (!empty($settings['authenticator_code'])) { ?>
                                        <div class="form-group">
                                            <label style="color:#bfc8e2!important;font-weight:500;" for="auth_code">Authenticator Code</label>
                                            <input type="text" name="auth_code" class="form-control" id="auth_code" required>
                                        </div>
                                    <?php } ?>

                                    <center>
                                        <?= $captcha_display ?>
                                    </center>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="footer-copyrite">
						<p>&copy; 2022 Banano Faucet. | <i class="fas fa-clock"></i> Server Time: <?= date('H:i') ?></p>
					</div>
				</div>
			</div>
		</div>
        <?= $settings['footer_code'] ?>
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vie/captcha.js?v=<?= VIE_VERSION ?>"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.js?v=<?= VIE_VERSION ?>"></script>
</body>

</html>