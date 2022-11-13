<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?= $page ?> | <?= $settings['name'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="origin">
    <meta content="<?= $settings['description'] ?>" name="description" />
    <meta content="Vie Faucet Script" name="author" />
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">
    <script src="<?= base_url() ?>assets/libs/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap Css -->
    <!-- <?php if ($settings['theme'] == 'light') {
        echo '<link href="' . base_url() . 'assets/css/bootstrap.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
        echo '<link href="' . base_url() . 'assets/css/app.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
    } else {
        echo '<link href="' . base_url() . 'assets/css/bootstrap-dark.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
        echo '<link href="' . base_url() . 'assets/css/app-dark.min.css?v=' . VIE_VERSION . '" id="bootstrap-style" rel="stylesheet" type="text/css" />';
        echo '<style>.antibotlinks {background-color: #ffffff}</style>';
    }
    ?> -->
    <!-- Icons Css -->
    <!-- <link href="<?= base_url() ?>assets/css/icons.min.css?v=<?= VIE_VERSION ?>" rel="stylesheet" type="text/css" /> -->
    <!-- App Css-->
    <!-- <link href="<?= base_url() ?>assets/css/styles.css?v=<?= VIE_VERSION ?>" rel="stylesheet" type="text/css" /> -->
    <!-- new code start -->
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/regular.min.css" integrity="sha512-aNH2ILn88yXgp/1dcFPt2/EkSNc03f9HBFX0rqX3Kw37+vjipi1pK3L9W08TZLhMg4Slk810sPLdJlNIjwygFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css" integrity="sha512-uj2QCZdpo8PSbRGL/g5mXek6HM/APd7k/B5Hx/rkVFPNOxAQMXD+t+bG4Zv8OAdUpydZTU3UHmyjjiHv2Ww0PA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- new code end -->
</head>
<style>
  img.cruncyIcon {
    width: 30px;
}
.sidenav-footer {
    position: inherit;
    padding: 10px 10px;
    left: 0;
    bottom: 0;
    width: 250px;
}
.fixed-plugin .card {
    position: fixed!important;
    right: -360px;
    bottom: 0 !important;
    top: unset !important;
    height: 200px !important;
    left: auto!important;
    transform: unset!important;
    width: 360px;
    border-radius: 22px !important;
    
}
</style>
<body class="g-sidenav-show  bg-gray-100">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <!-- <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                    <div class="navbar-brand-box">
                        <a href="<?= site_url() ?>" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url() ?>assets/images/logo-min.png" alt="" style="height: 35px">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url() ?>assets/images/logo.png" alt="" style="height: 65px">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>
			<div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span style="font-size:14px ; color:#A6B0CF" class="badge badge-light"><i class="fa-solid fa-wallet">&nbsp&nbsp</i><?= currencyDisplay($user['balance'], $settings) ?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
					<center><i class="fa-solid fa-bolt"></i>&nbsp&nbsp<?= $user['energy'] ?> energy<hr>
					<i class="fa-solid fa-rectangle-ad"></i>&nbsp&nbsp<?= currencyDisplay($user['dep_balance'], $settings) ?></center>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block" id="notifications">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if ($countUnreadNotification > 0) { ?>
                                <i class="bx bx-bell bx-tada"></i>
                                <span class="badge badge-danger badge-pill"><?= $countUnreadNotification ?></span>
                            <?php } else { ?>
                                <i class="bx bx-bell"></i>
                            <?php } ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0" key="t-notifications"> Notifications
						    <a href="" class="float-right text-reset notification-item">Mark as read</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar="init" style="max-height: 230px;">
                                <div class="simplebar-wrapper" style="margin: 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 0px;">
                                                    <?php
                                                    foreach ($notifications as $notification) {
                                                        $icon = [];
                                                        switch ($notification['type']) {
                                                            case 0:
                                                                $icon['content'] = '<i class="fas fa-bullhorn"></i>';
                                                                $icon['color'] = 'bg-primary';
                                                                break;
                                                            case 1:
                                                                $icon['content'] = '<i class="far fa-money-bill-alt"></i>';
                                                                $icon['color'] = 'bg-success';
                                                                break;
                                                            case 2:
                                                                $icon['content'] = '<i class="fas fa-exclamation-triangle"></i>';
                                                                $icon['color'] = 'bg-danger';
                                                                break;
                                                            default:
                                                                $icon['content'] = '<i class="far fa-comment-dots"></i>';
                                                                $icon['color'] = 'bg-info';
                                                                break;
                                                        }
                                                    ?>
                                                        <a href="" class="text-reset notification-item">
                                                            <div class="media">
                                                                <div class="avatar-xs mr-3">
                                                                    <span class="avatar-title <?= $icon['color'] ?> rounded-circle font-size-16">
                                                                        <?= $icon['content'] ?>
                                                                    </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="font-size-12 text-muted">
                                                                        <p class="mb-1" key="t-grammer" style="word-break: keep-all;"><?= $notification['content'] ?></p>
                                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago"><?= timespan($notification["create_time"], time(), 2) ?> ago</span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                </div>
                            </div>
						<button type="button" class="btn btn-light btn-block">
						<a href="https://banfaucet.com/new/history" class="text-dark">View All</a>
						</button>
                      </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/images/users/user.png" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ml-1" key="t-henry"><?= $user['username'] ?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            
                            <a class="dropdown-item" href="<?= site_url('profile') ?>"><i class="far fa-user-circle"></i> <span key="t-profile">Profile</span></a>
                            <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="<?= site_url('history') ?>"><i class="fas fa-history"></i> <span key="t-history">History</span></a>
                            <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="<?= site_url('withdraw') ?>"><i class="fa-solid fa-wallet"></i> <span key="t-withdraw">Withdraw</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?= site_url('auth/logout') ?>"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                        </div>
                    </div>

                </div>
            </div>
        </header> -->

        <!-- ========== Left Sidebar Start ========== -->
        <!-- <div class="vertical-menu"> -->

            <!-- <div data-simplebar class="h-100"> -->

                <!--- Sidemenu -->
                <!-- <div id="sidebar-menu"> -->
                    <!-- Left Menu Start -->
                    <!-- <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <a href="<?= site_url('dashboard') ?>" class="waves-effect">
                                <i class="fa-solid fa-house"></i>
                                <span key="t-dashboard">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('withdraw') ?>" class="waves-effect">
                                <i class="fa-solid fa-wallet"></i>
                                <span key="t-dashboard">Withdraw</span>
                            </a>
                        </li>

				<li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa-solid fa-square-share-nodes"></i>
                                <span key="t-social">Social</span>
                            </a>
                                    <ul class="sub-menu" aria-expanded="false">
					<li><a href="https://discord.gg/EcUfn9MtV3" target="_blank"><i class="fa-brands fa-discord"></i> Discord</a></li>
					<li><a href="https://reddit.com/r/banfaucet/" target="_blank"><i class="fa-brands fa-reddit"></i> Reddit</a></li>
					<li><a href="https://t.me/banfaucet" target="_blank"><i class="fa-brands fa-telegram"></i> Telegram Group</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?= site_url('referrals') ?>" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span key="t-dashboard">Referrals &nbsp;&nbsp;<span class="badge badge-dark">20%</span></span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('leaderboard') ?>" class="waves-effect">
                                <i class="fa-solid fa-trophy"></i>
                                <span key="t-dashboard">Weekly Contest</span>
                            </a>
                        </li>

                        <li class="menu-title" key="t-earning">Earn</li>

				    <li>
					  <a href="<?= site_url('daily-bonus') ?>" class="waves-effect">
						<i class="fa-solid fa-fire"></i>
                                    <span key="t-achievements">Daily Bonus</span>
                                </a>
                            </li>
                        <?php if ($settings['achievement_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('achievements') ?>" class="waves-effect">
                                    <i class="fa-solid fa-bullseye"></i>
                                    <span key="t-achievements">Challenges &nbsp<span class="badge badge-dark"><?= $totalAchievements ?></span></span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($settings['dice_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('dice') ?>" class="waves-effect">
                                    <i class="fas fa-dice"></i>
                                    <span key="t-dice">Dice</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($settings['coinflip_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('coinflip') ?>" class="waves-effect">
                                    <i class="fas fa-coins"></i>
                                    <span key="t-dice">Coin Flip</span>
                                </a>
                            </li>
                        <?php } ?>



                        <?php if ($settings['offerwall_status'] == 'on') { ?>
                            <?php if ($user['level'] < $settings['offerwall_min_level']) { ?>
                                <li>
                                    <a href="#" class="waves-effect">
                                        <i class="far fa-newspaper"></i>
                                        <span class="badge badge-pill badge-info float-right" key="t-offerwall-message">Unlock at Level <?= $settings['offerwall_min_level'] ?></span>
                                        <span key="t-lottery">Offerwall</span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="https://banfaucet.com/new/offerwalls" class="waves-effect">
                                        <i class="fa-solid fa-pencil"></i>
                                        <span key="t-offerwall">Offerwalls &nbsp<span class="badge badge-dark">8</span></span>
                                    </a>
                                </li>
                        <?php }
                        } ?>

                        <?php if ($settings['faucet_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('faucet') ?>" class="waves-effect">
                                    <i class="fas fa-stopwatch"></i>
                                    <span key="t-faucet">Claim <span>&nbsp
                                            <?= $faucetWait > 0 ?
                                                '<span class="badge bg-primary counter" wait="' . ($faucetWait - 1) . '"></span>'
                                                :
                                                "<i class='fa fa-check'></i>" ?>
                                        </span></span>
					</a>
                            </li>
                        <?php } ?>

                        <?php if ($settings['autofaucet_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('auto') ?>" class="waves-effect">
                                    <i class="fa-solid fa-truck-fast"></i>
                                    <span key="t-auto">Fast Faucet <span class="badge badge-pill badge-warning"> <?= $user['energy'] / 10 ?></span></span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($settings['wheel_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('wheel') ?>" class="waves-effect">
                                    <i class="fas fa-dharmachakra"></i>
                                    <span key="t-faucet">Wheel Of Fortune</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($settings['mining_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('mining') ?>" class="waves-effect">
                                    <i class="fa-solid fa-helmet-safety"></i>
                                    <span key="t-faucet">Mining <span class="badge badge-pill badge-success"> NEW</span></span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($settings['shortlink_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('links') ?>" class="waves-effect">
                                    <i class="fas fa-link"></i>
                                    <span key="t-links">Shortlinks <span class="badge badge-success"><?= $countAvailableLinks ?></span></span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($settings['ptc_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('ptc') ?>" class="waves-effect">
                                    <i class="fa-solid fa-eye"></i>
                                    <span key="t-ptc">PTC &nbsp<span class="badge badge-info"><?= $countAvailableAds ?></span></span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($settings['lottery_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('lottery') ?>" class="waves-effect">
                                    <i class="fas fa-ticket"></i>
                                    <span key="t-lottery">Lottery</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($settings['coupon_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('coupon') ?>" class="waves-effect">
                                    <i class="fa-solid fa-gift"></i>
                                    <span key="t-dice">Redeem Code</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($settings['tasks_status'] == 'on') { ?>
                            <li>
                                <a href="<?= site_url('tasks') ?>" class="waves-effect">
                                    <i class="fas fa-tasks"></i>
                                    <span key="t-tasks">Tasks &nbsp<span class="badge badge-warning"><?= $countAvailableTasks ?></span></span>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="menu-title" key="t-advertise">Advertise</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-user-tie"></i>
                                <span key="t-advertiser">Advertiser</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?= site_url('advertise') ?>" key="t-advertise-create">Create campaign</a></li>
                                <li><a href="<?= site_url('advertise/manage') ?>" key="t-advertise-manage">Manage campaigns</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?= site_url('deposit') ?>" class="waves-effect">
                                <i class="fas fa-donate"></i>
                                <span key="t-deposit">Deposit</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('transfer') ?>" class="waves-effect">
                                <i class="fas fa-exchange-alt"></i>
                                <span key="t-deposit">Exchange</span>
                            </a>
                        </li>

                        <?php if (count($pages) > 0) { ?>
                            <li class="menu-title" key="t-pages">Pages</li>
                        <?php } ?>
                        <?php foreach ($pages as $p) { ?>
                            <li>
                                <a href="<?= site_url('page/' . $p['slug']) ?>" class="waves-effect">
                                    <span><?= $p['title'] ?></span>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="menu-title" key="t-account">Account</li>

                        <li>
                            <a href="<?= site_url('profile') ?>" class="waves-effect">
                                <i class="far fa-user-circle"></i>
                                <span key="t-profile">Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('history') ?>" class="waves-effect">
                                <i class="fas fa-history"></i>
                                <span key="t-history">History</span>
                            </a>
                        </li>

                    </ul> -->
                <!-- </div>
		</div>
			<div class="sidebar-footer">
			<div class="row">
			    <div class="col-auto mr-auto font-weight-bold">Level <?= $user['level'] ?> / <span class="text-success"> <?= $bonus ?>%</span> Bonus</div>
			    <div class="col-auto font-weight-bold"><?= ($user['exp'] % 100) ?>%</div>
			</div>
            <p>
                <div class="progress" style="height: 5px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: <?= ($user['exp'] % 100) ?>%;" aria-valuenow="<?= ($user['exp'] % 100) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div><hr>
<span class="text-success"> <?= ($user['level'] + 1) * 100 - $user['exp'] ?></span> exp needed for Level <?= $user['level'] + 1 ?>
</div>
<style>
.sidebar-footer {
  position: inherit;
  padding: 10px 10px;
  left: 0;
  bottom: 0;
  width: 250px;
  background-color: #222736;
  color: white;
}

</style> -->
                <!-- Sidebar -->
            <!-- </div> -->
        <!-- </div> -->
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <!-- <div class="main-content">

            <div class="page-content">

                <?php if (!empty($settings['global_notification'])) { ?>
                    <div class="alert-warning align-middle text-center noty pt-1 pb-1">
                        <strong><i class="fas fa-bullhorn"></i>: <?= $settings['global_notification'] ?></strong>
                    </div>
                <?php } ?>
                <div class="container-fluid"> -->
                    <!-- start page title -->
                    <!-- <div class="row">
                        <div class="col-12">



                            </div>
                        </div>
                    </div> -->
                    <!-- end page title -->

                    <!-- end row -->
                <!-- </div> -->
                <!-- container-fluid -->
            <!-- </div> -->
            <!-- End Page-content -->

            <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="mb-2">&copy <?= date('Y') ?> <a href="<?= base_url() ?>"><?= $settings['name'] ?></a> | <a href="https://banfaucet.com/new/page/terms-of-service">Terms of Service</a> | <i class="fas fa-clock"></i> Server Time: <?= date('H:i') ?>.</p>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Powered by <a href="https://faucetscript.net/faucet/vie-faucet-script" target="_blank">Vie Faucet Script</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div> -->
        <!-- end main content-->

    <!-- </div> -->
    <!-- END layout-wrapper -->
    <!-- Right bar overlay-->
    <!-- <div class="rightbar-overlay">
        <div>
            <a></a>
        </div>
    </div> -->
    <!-- <?= $settings['footer_code'] ?> -->
<!-- new code start -->
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="https://banfaucet.com/assets/images/logo-min.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">BANFAUCET</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="<?= site_url('dashboard') ?>" target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" opacity="0.598981585"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('withdraw') ?>" >
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-wallet text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Withdraw</span>
          </a>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#socialsLinks" class="nav-link " aria-controls="socialsLinks" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <i class="fa-solid fa-share-nodes text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Social</span>
          </a>
          <div class="collapse " id="socialsLinks">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item ">
                <a class="nav-link " href="https://discord.gg/EcUfn9MtV3">
                  <span class="sidenav-mini-icon"><i class="fa-brands fa-discord"></i></span>
                  <span class="sidenav-normal">Discord</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://reddit.com/r/banfaucet/">
                  <span class="sidenav-mini-icon"><i class="fa-brands fa-reddit-alien"></i></span>
                  <span class="sidenav-normal">Reddit</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://t.me/banfaucet">
                  <span class="sidenav-mini-icon"><i class="fa-brands fa-telegram"></i></span>
                  <span class="sidenav-normal">Telegram Group</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('referrals') ?>" >
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-users text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Referrals <span class="badge badge-primary">20%</span>
          </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('referrals') ?>" >
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-trophy text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Weekly Contest</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">EARN</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('daily-bonus') ?>" >
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-fire text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Daily Bonus</span>
          </a>
        </li>
        <?php if ($settings['achievement_status'] == 'on') { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('achievements') ?>" >
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-fire text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Challenges <span class="badge badge-primary"><?= $totalAchievements ?></span></span>
          </a>
        </li>
        <?php } ?>
        <?php if ($settings['dice_status'] == 'on') { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('dice') ?>" >
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-dice-three text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Dice</span>
          </a>
        </li><?php } ?>
        <?php if ($settings['coinflip_status'] == 'on') { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('coinflip') ?>" >
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-coin text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Coin Flip</span>
          </a>
        </li><?php } ?>
        <?php if ($settings['offerwall_status'] == 'on') { ?>
          <?php if ($user['level'] < $settings['offerwall_min_level']) { ?>
          <li class="nav-item">
            <a class="nav-link" href="#" >
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-coin text-dark"></i>
              </div>
              <span class="nav-link-text ms-1">Offerwall Unlock at Level <?= $settings['offerwall_min_level'] ?></span>
            </a>
          </li><?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="https://banfaucet.com/new/offerwalls" >
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-pencil text-dark"></i>
                </div>
                <span class="nav-link-text ms-1">Offerwalls<span class="badge badge-primary">8</span></span>
              </a>
            </li>
            <?php }
          } ?>
          <?php if ($settings['faucet_status'] == 'on') { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('faucet') ?>" >
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-stopwatch text-dark"></i>
                </div>
                <span class="nav-link-text ms-1">Claim  <span>&nbsp
                  <?= $faucetWait > 0 ?
                      '<span class="badge bg-primary counter" wait="' . ($faucetWait - 1) . '"></span>'
                      :
                      "<i class='fa fa-check'></i>" ?>
              </span></span>
              </a>
            </li><?php } ?>
            <?php if ($settings['autofaucet_status'] == 'on') { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('auto') ?>" >
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-truck-fast text-dark"></i>
                  </div>
                  <span class="nav-link-text ms-1">Fast Faucet <span class="badge bg-gradient-warning"><?= $user['energy'] / 10 ?></span></span>
                </a>
              </li><?php } ?>
              <?php if ($settings['wheel_status'] == 'on') { ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('wheel') ?>" >
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-dharmachakra text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Wheel Of Fortune</span>
                  </a>
                </li><?php } ?>
                <?php if ($settings['mining_status'] == 'on') { ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('mining') ?>" >
                      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-helmet-safety text-dark"></i>
                      </div>
                      <span class="nav-link-text ms-1">Mining<span class="badge bg-gradient-success">New</span></span>
                    </a>
                  </li><?php } ?>
                  <?php if ($settings['shortlink_status'] == 'on') { ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= site_url('links') ?>" >
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                          <i class="fa-solid fa-link text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Shortlinks<span class="badge bg-gradient-success"><?= $countAvailableLinks ?></span></span>
                      </a>
                    </li><?php } ?>
                    <?php if ($settings['ptc_status'] == 'on') { ?>
                      <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('ptc') ?>" >
                          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-eye text-dark"></i>
                          </div>
                          <span class="nav-link-text ms-1">PTC<span class="badge bg-gradient-info"><?= $countAvailableAds ?></span></span>
                        </a>
                      </li><?php } ?>
                      <?php if ($settings['lottery_status'] == 'on') { ?>
                        <li class="nav-item">
                          <a class="nav-link" href="<?= site_url('lottery') ?>" >
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                              <i class="fa-solid fa-ticket text-dark"></i>
                            </div>
                            <span class="nav-link-text ms-1">Lottery</span>
                          </a>
                        </li><?php } ?>
                        <?php if ($settings['coupon_status'] == 'on') { ?>
                          <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('coupon') ?>" >
                              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-gift text-dark"></i>
                              </div>
                              <span class="nav-link-text ms-1">Redeem Code</span>
                            </a>
                          </li><?php } ?>
                          <?php if ($settings['tasks_status'] == 'on') { ?>
                            <li class="nav-item">
                              <a class="nav-link" href="<?= site_url('tasks') ?>" >
                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                                  <i class="fa-solid fa-tasks text-dark"></i>
                                </div>
                                <span class="nav-link-text ms-1">Tasks<span class="badge bg-gradient-warning"><?= $countAvailableTasks ?></span></span>
                              </a>
                            </li><?php } ?>
                            <li class="nav-item mt-3">
                              <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">ADVERTISE</h6>
                            </li>
                            <li class="nav-item">
                              <a data-bs-toggle="collapse" href="#vrExamples" class="nav-link " aria-controls="#vrExamples" role="button" aria-expanded="false">
                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                                  <i class="fa-solid fa-user-tie text-dark"></i>
                                </div>
                                <span class="nav-link-text ms-1">Advertiser</span>
                              </a>
                              <div class="collapse " id="vrExamples">
                                <ul class="nav ms-4 ps-3">
                                  <li class="nav-item ">
                                    <a class="nav-link " href="<?= site_url('advertise') ?>">
                                      
                                      <span class="sidenav-normal">Create campaign</span>
                                    </a>
                                  </li>
                                  <li class="nav-item ">
                                    <a class="nav-link " href="<?= site_url('advertise/manage') ?>">
                                      
                                      <span class="sidenav-normal">Manage campaigns</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                              <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('deposit') ?>" >
                                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-donate text-dark"></i>
                                  </div>
                                  <span class="nav-link-text ms-1">Deposit</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('transfer') ?>" >
                                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-exchange-alt text-dark"></i>
                                  </div>
                                  <span class="nav-link-text ms-1">Exchange</span>
                                </a>
                              </li>
                              <?php if (count($pages) > 0) { ?>
                              <li class="nav-item mt-3">
                                <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">ADVERTISE</h6>
                              </li>
                              <?php } ?>
                              <?php foreach ($pages as $p) { ?>
                                <li class="nav-item">
                                  <a class="nav-link" href="<?= site_url('page/' . $p['slug']) ?>" >
                                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                                      
                                    </div>
                                    <span class="nav-link-text ms-1"><?= $p['title'] ?></span>
                                  </a>
                                </li>
                              <?php } ?>
                            <li class="nav-item mt-3">
                              <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">ACCOUNT</h6>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="<?= site_url('profile') ?>" >
                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                                  <i class="fa-solid fa-user-circle text-dark"></i>
                                </div>
                                <span class="nav-link-text ms-1">Profile</span>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="<?= site_url('history') ?>" >
                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                                  <i class="fa-solid fa-history text-dark"></i>
                                </div>
                                <span class="nav-link-text ms-1">History</span>
                              </a>
                            </li>     
      </ul>
    </div>
    <div class="sidenav-footer mx-3 mt-3 pt-3">
     <div class="card p-3">                           
          <div class="docs-info">
          <div class="row">
	  <div class="col-auto mr-auto font-weight-bold">Level <?= $user['level'] ?> / <span class="text-success"> <?= $bonus ?>% </span> Bonus </div>
	  <div class="col-auto font-weight-bold"> <?= ($user['exp'] % 100) ?>% </div>
	</div>
	<p>
	<div class="progress" style="height: 5px;">
	  <div class="progress-bar bg-info" role="progressbar" style="width: 
			<?= ($user['exp'] % 100) ?>%;" aria-valuenow="
			<?= ($user['exp'] % 100) ?>" aria-valuemin="0" aria-valuemax="100">
	  </div>
	</div>
	<hr>
	<span class="text-success"> <?= ($user['level'] + 1) * 100 - $user['exp'] ?> </span> exp needed for Level <?= $user['level'] + 1 ?>                      

          </div>
        
      
    </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?= $contents ?>
    <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                <a href="https://banfaucet.com/">Banano Faucet</a> | <a href="https://banfaucet.com/page/terms-of-service">Terms of Service</a> | <i class="fa-solid fa-clock " style="margin-right: 5px;"></i>Server Time: 10:49
              </div>
            </div>
            <div class="col-lg-6">
              <div class="copyright text-center text-sm text-muted text-lg-start">
              Powered by <a href="https://faucetscript.net/faucet/vie-faucet-script">Vie Faucet Script</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg blur">
      <div class="card-header pb-0 pt-3  bg-transparent ">
        <div class="float-start">
            <a class="navbar-brand m-0" href="#" target="_blank">
                <img src="https://banfaucet.com/assets/images/logo-min.png " height="50px" class="navbar-brand-img " alt="main_logo">
                <span class="ms-1 font-weight-bold">BANFAUCET</span>
            </a>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-0 mt-4">
      <div class="d-xl-block">
        <h6 class="mb-0">Light/Dark</h6>
      </div>
      <div class="form-check form-switch ps-0 d-xl-block">
        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
      </div>
        <!-- Sidebar Backgrounds -->
        <!-- <hr class="horizontal dark mb-1 d-xl-block d-none">
        <div class="mt-2 d-xl-block d-none">
          <h6 class="mb-0">Sidenav Mini</h6>
        </div>
        <div class="form-check form-switch ps-0 d-xl-block d-none">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarMinimize" onclick="navbarMinimize(this)">
        </div> -->
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="newAssets/js/core/popper.min.js"></script>
  <script src="newAssets/js/core/bootstrap.min.js"></script>
  <script src="newAssets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="newAssets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="newAssets/js/plugins/choices.min.js"></script>
  <!-- Kanban scripts -->
  <script src="newAssets/js/plugins/dragula/dragula.min.js"></script>
  <script src="newAssets/js/plugins/jkanban/jkanban.js"></script>
  <script src="newAssets/js/plugins/countup.min.js"></script>
  <script src="newAssets/js/plugins/chartjs.min.js"></script>
  <script src="newAssets/js/plugins/round-slider.min.js"></script>
  <script>
    // Rounded slider
    const setValue = function(value, active) {
      document.querySelectorAll("round-slider").forEach(function(el) {
        if (el.value === undefined) return;
        el.value = value;
      });
      const span = document.querySelector("#value");
      span.innerHTML = value;
      if (active)
        span.style.color = 'red';
      else
        span.style.color = 'black';
    }

    document.querySelectorAll("round-slider").forEach(function(el) {
      el.addEventListener('value-changed', function(ev) {
        if (ev.detail.value !== undefined)
          setValue(ev.detail.value, false);
        else if (ev.detail.low !== undefined)
          setLow(ev.detail.low, false);
        else if (ev.detail.high !== undefined)
          setHigh(ev.detail.high, false);
      });

      el.addEventListener('value-changing', function(ev) {
        if (ev.detail.value !== undefined)
          setValue(ev.detail.value, true);
        else if (ev.detail.low !== undefined)
          setLow(ev.detail.low, true);
        else if (ev.detail.high !== undefined)
          setHigh(ev.detail.high, true);
      });
    });

    

  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="newAssets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
  <!-- new code End -->
<!-- new code end -->


    <!-- JAVASCRIPT -->

    <!-- <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vie/faucet.js?v=<?= VIE_VERSION ?>"></script> -->

<!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.m/in.css">-->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script> -->



    <?php if ($page == 'Dashboard') { ?>
        <script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>
	  <script src="<?= base_url() ?>assets/js/vie/bclaim.js"></script>

        <script>
            var options = {
                chart: {
                    height: 180,
                    type: 'radialBar',
                    offsetY: -10
                },
                plotOptions: {
                    radialBar: {
                        startAngle: -135,
                        endAngle: 135,
                        dataLabels: {
                            name: {
                                fontSize: '13px',
                                color: undefined,
                                offsetY: 60
                            },
                            value: {
                                offsetY: 22,
                                fontSize: '16px',
                                color: undefined,
                                formatter: function(val) {
                                    return val + "%";
                                }
                            }
                        }
                    }
                },
                colors: ['#556ee6'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        shadeIntensity: 0.15,
                        inverseColors: false,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 50, 65, 91]
                    },
                },
                stroke: {
                    dashArray: 4,
                },
                series: [<?= ($user['exp'] % 100) ?>],
                labels: ['Level <?= $user['level'] + 1 ?>'],

            }

            var chart = new ApexCharts(
                document.querySelector("#radialBar-chart"),
                options
            );

            chart.render();
        </script>
    <?php } ?>
    <script type="text/javascript">
        var site_url = "<?= base_url() ?>";
    </script>
    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.js?v=<?= VIE_VERSION ?>"></script>
    <script src="<?= base_url() ?>assets/js/vie/captcha.js?v=<?= VIE_VERSION ?>"></script>
    <?php if ($page == 'Advertise') { ?>
        <script src="<?= base_url() ?>assets/js/vie/advertise.js?v=<?= VIE_VERSION ?>"></script>
    <?php } ?>
    <?php if ($page == 'Deposit') { ?>
        <script src="<?= base_url() ?>assets/js/vie/deposit.js?v=<?= VIE_VERSION ?>"></script>
    <?php } ?>
    <?php if ($page == 'Dice') { ?>
        <script src="<?= base_url() ?>assets/js/vie/dice.js?v=<?= VIE_VERSION ?>"></script>
    <?php } ?>
    <?php if ($page == 'Coin Flip') { ?>
        <script src="<?= site_url('assets/js/vie/coinflip.js?v=' . VIE_VERSION) ?>"></script>
    <?php } ?>
    <script type="text/javascript">
        $("a[href='<?= current_url() ?>']").attr('data-active', 'true');
    </script>
    <?php if (isset($antibot_js)) { ?>
        <?= $antibot_js ?>
        <script src="<?= base_url() ?>assets/js/vie/antibotlinks.js?v=<?= VIE_VERSION ?>"></script>
    <?php } ?>
    <?php if ($page == 'Faucet') { ?>
        <script src="<?= base_url() ?>assets/js/vie/faucet.js?v=<?= VIE_VERSION ?>"></script>
    <?php } ?>
    <?php if ($page == 'Wheel of fortunes') { ?>
        <script src="<?= base_url() ?>assets/js/wheel/Winwheel.min.js"></script>
        <script src="<?= base_url() ?>assets/js/wheel/TweenMax.min.js"></script>
        <script src="<?= base_url() ?>assets/js/wheel/wheel.js"></script>
    <?php } ?>
    <?php if (isset($_COOKIE['captcha'])) { ?>
        <script>
            $('option[value=<?= $_COOKIE['captcha'] ?>]').attr('selected', 'selected');
        </script>
    <?php } ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (isset($_SESSION['sweet_message'])) {
        echo $_SESSION['sweet_message'];
    }
    ?>
    <?php include 'adblock.php'; ?>
<style>.sticky-ads{ 
position: fixed; 
bottom: 0; left: 0; 
width: 98%; min-height: 70px; max-height: 200px; 
padding: 5px 0; 
box-shadow: 0 -6px 18px 0 rgba(9,32,76,.1); 
-webkit-transition: all .1s ease-in; transition: all .1s ease-in; 
display: flex; 
align-items: center; 
justify-content: right; 
z-index: 10; } 
</style>

<div class='sticky-ads' id='sticky-ads'>
<div class='sticky-ads-content'>

<div style="color:#2a3042cf;" data-toggle="tooltip" data-bs-postition="top" title="Join our Telegram Group">
<a href="https://t.me/banfaucet" target="_blank"><img src="https://banfaucet.com/new/assets/images/telegram.png" style="width:50px;height:50px;"></a>
</div>
</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function(){
    // Placement of tooltip on top
    var tipTop = document.getElementById("tipTop");
    var tooltipTop = new bootstrap.Tooltip(tipTop, { 
        placement : "top" 
    });

    // Placement of tooltip on right
    var tipRight = document.getElementById("tipRight");
    var tooltipRight = new bootstrap.Tooltip(tipRight, { 
        placement : "right" 
    });
    
    // Placement of tooltip on bottom
    var tipBottom = document.getElementById("tipBottom");
    var tooltipBottom = new bootstrap.Tooltip(tipBottom, { 
        placement : "bottom" 
    });

    // Placement of tooltip on left
    var tipLeft = document.getElementById("tipLeft");
    var tooltipLeft = new bootstrap.Tooltip(tipLeft, { 
        placement : "left" 
    });
});

document.addEventListener("DOMContentLoaded", function(){
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(element){
        return new bootstrap.Tooltip(element);
    });
});
</script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/affd6d170a.js" crossorigin="anonymous"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-40X8JY6KVR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-40X8JY6KVR');
</script>

</body>

</html>