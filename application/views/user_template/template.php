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
				</div><p>
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
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard-pro/pages/dashboards/default.html " target="_blank">
        <img src="newAssets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Soft UI Dashboard PRO</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link active" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
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
            <span class="nav-link-text ms-1">Dashboards</span>
          </a>
          <div class="collapse  show " id="dashboardsExamples">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item active">
                <a class="nav-link active" href="../../pages/dashboards/default.html">
                  <span class="sidenav-mini-icon"> D </span>
                  <span class="sidenav-normal"> Default </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/dashboards/automotive.html">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal"> Automotive </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/dashboards/smart-home.html">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal"> Smart Home </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#vrExamples">
                  <span class="sidenav-mini-icon"> V </span>
                  <span class="sidenav-normal"> Virtual Reality <b class="caret"></b></span>
                </a>
                <div class="collapse " id="vrExamples">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/dashboards/vr/vr-default.html">
                        <span class="sidenav-mini-icon text-xs"> V </span>
                        <span class="sidenav-normal"> VR Default </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/dashboards/vr/vr-info.html">
                        <span class="sidenav-mini-icon text-xs"> V </span>
                        <span class="sidenav-normal"> VR Info </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/dashboards/crm.html">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal"> CRM </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">PAGES</h6>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link " aria-controls="pagesExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>office</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" opacity="0.6"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Pages</span>
          </a>
          <div class="collapse " id="pagesExamples">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#profileExample">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal"> Profile <b class="caret"></b></span>
                </a>
                <div class="collapse " id="profileExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/profile/overview.html">
                        <span class="sidenav-mini-icon text-xs"> P </span>
                        <span class="sidenav-normal"> Profile Overview </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/profile/teams.html">
                        <span class="sidenav-mini-icon text-xs"> T </span>
                        <span class="sidenav-normal"> Teams </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/profile/projects.html">
                        <span class="sidenav-mini-icon text-xs"> A </span>
                        <span class="sidenav-normal"> All Projects </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#usersExample">
                  <span class="sidenav-mini-icon"> U </span>
                  <span class="sidenav-normal"> Users <b class="caret"></b></span>
                </a>
                <div class="collapse " id="usersExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/users/reports.html">
                        <span class="sidenav-mini-icon text-xs"> R </span>
                        <span class="sidenav-normal"> Reports </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/users/new-user.html">
                        <span class="sidenav-mini-icon text-xs"> N </span>
                        <span class="sidenav-normal"> New User </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#accountExample">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal"> Account <b class="caret"></b></span>
                </a>
                <div class="collapse " id="accountExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/account/settings.html">
                        <span class="sidenav-mini-icon text-xs"> S </span>
                        <span class="sidenav-normal"> Settings </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/account/billing.html">
                        <span class="sidenav-mini-icon text-xs"> B </span>
                        <span class="sidenav-normal"> Billing </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/account/invoice.html">
                        <span class="sidenav-mini-icon text-xs"> I </span>
                        <span class="sidenav-normal"> Invoice </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/account/security.html">
                        <span class="sidenav-mini-icon text-xs"> S </span>
                        <span class="sidenav-normal"> Security </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#projectsExample">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal"> Projects <b class="caret"></b></span>
                </a>
                <div class="collapse " id="projectsExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/projects/general.html">
                        <span class="sidenav-mini-icon text-xs"> G </span>
                        <span class="sidenav-normal"> General </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/projects/timeline.html">
                        <span class="sidenav-mini-icon text-xs"> T </span>
                        <span class="sidenav-normal"> Timeline </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/pages/projects/new-project.html">
                        <span class="sidenav-mini-icon text-xs"> N </span>
                        <span class="sidenav-normal"> New Project </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/pages/pricing-page.html">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal"> Pricing Page </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/pages/messages.html">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal"> Messages </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/pages/rtl-page.html">
                  <span class="sidenav-mini-icon"> R </span>
                  <span class="sidenav-normal"> RTL </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/pages/widgets.html">
                  <span class="sidenav-mini-icon"> W </span>
                  <span class="sidenav-normal"> Widgets </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/pages/charts.html">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal"> Charts </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/pages/sweet-alerts.html">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal"> Sweet Alerts </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/pages/notifications.html">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal"> Notifications </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#applicationsExamples" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>settings</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(304.000000, 151.000000)">
                        <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                        <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                        <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Applications</span>
          </a>
          <div class="collapse " id="applicationsExamples">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/applications/kanban.html">
                  <span class="sidenav-mini-icon"> K </span>
                  <span class="sidenav-normal"> Kanban </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/applications/wizard.html">
                  <span class="sidenav-mini-icon"> W </span>
                  <span class="sidenav-normal"> Wizard </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/applications/datatables.html">
                  <span class="sidenav-mini-icon"> D </span>
                  <span class="sidenav-normal"> DataTables </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/applications/calendar.html">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal"> Calendar </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/applications/analytics.html">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal"> Analytics </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <svg class="text-dark" width="12px" height="12px" viewBox="0 0 42 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>basket</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -741.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="basket" transform="translate(153.000000, 450.000000)">
                        <path class="color-background" d="M34.080375,13.125 L27.3748125,1.9490625 C27.1377583,1.53795093 26.6972449,1.28682264 26.222716,1.29218729 C25.748187,1.29772591 25.3135593,1.55890827 25.0860125,1.97535742 C24.8584658,2.39180657 24.8734447,2.89865282 25.1251875,3.3009375 L31.019625,13.125 L10.980375,13.125 L16.8748125,3.3009375 C17.1265553,2.89865282 17.1415342,2.39180657 16.9139875,1.97535742 C16.6864407,1.55890827 16.251813,1.29772591 15.777284,1.29218729 C15.3027551,1.28682264 14.8622417,1.53795093 14.6251875,1.9490625 L7.919625,13.125 L0,13.125 L0,18.375 L42,18.375 L42,13.125 L34.080375,13.125 Z" opacity="0.595377604"></path>
                        <path class="color-background" d="M3.9375,21 L3.9375,38.0625 C3.9375,40.9619949 6.28800506,43.3125 9.1875,43.3125 L32.8125,43.3125 C35.7119949,43.3125 38.0625,40.9619949 38.0625,38.0625 L38.0625,21 L3.9375,21 Z M14.4375,36.75 L11.8125,36.75 L11.8125,26.25 L14.4375,26.25 L14.4375,36.75 Z M22.3125,36.75 L19.6875,36.75 L19.6875,26.25 L22.3125,26.25 L22.3125,36.75 Z M30.1875,36.75 L27.5625,36.75 L27.5625,26.25 L30.1875,26.25 L30.1875,36.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Ecommerce</span>
          </a>
          <div class="collapse " id="ecommerceExamples">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/ecommerce/overview.html">
                  <span class="sidenav-mini-icon"> O </span>
                  <span class="sidenav-normal"> Overview </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#productsExample">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal"> Products <b class="caret"></b></span>
                </a>
                <div class="collapse " id="productsExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/ecommerce/products/new-product.html">
                        <span class="sidenav-mini-icon text-xs"> N </span>
                        <span class="sidenav-normal"> New Product </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/ecommerce/products/edit-product.html">
                        <span class="sidenav-mini-icon text-xs"> E </span>
                        <span class="sidenav-normal"> Edit Product </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/ecommerce/products/product-page.html">
                        <span class="sidenav-mini-icon text-xs"> P </span>
                        <span class="sidenav-normal"> Product Page </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/ecommerce/products/products-list.html">
                        <span class="sidenav-mini-icon text-xs"> P </span>
                        <span class="sidenav-normal"> Products List </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#ordersExample">
                  <span class="sidenav-mini-icon"> O </span>
                  <span class="sidenav-normal"> Orders <b class="caret"></b></span>
                </a>
                <div class="collapse " id="ordersExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/ecommerce/orders/list.html">
                        <span class="sidenav-mini-icon text-xs"> O </span>
                        <span class="sidenav-normal"> Order List </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/ecommerce/orders/details.html">
                        <span class="sidenav-mini-icon text-xs"> O </span>
                        <span class="sidenav-normal"> Order Details </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/ecommerce/referral.html">
                  <span class="sidenav-mini-icon"> R </span>
                  <span class="sidenav-normal"> Referral </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#authExamples" class="nav-link " aria-controls="authExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>document</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(154.000000, 300.000000)">
                        <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Authentication</span>
          </a>
          <div class="collapse " id="authExamples">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#signinExample">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal"> Sign In <b class="caret"></b></span>
                </a>
                <div class="collapse " id="signinExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/signin/basic.html">
                        <span class="sidenav-mini-icon text-xs"> B </span>
                        <span class="sidenav-normal"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/signin/cover.html">
                        <span class="sidenav-mini-icon text-xs"> C </span>
                        <span class="sidenav-normal"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/signin/illustration.html">
                        <span class="sidenav-mini-icon text-xs"> I </span>
                        <span class="sidenav-normal"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#signupExample">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal"> Sign Up <b class="caret"></b></span>
                </a>
                <div class="collapse " id="signupExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/signup/basic.html">
                        <span class="sidenav-mini-icon text-xs"> B </span>
                        <span class="sidenav-normal"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/signup/cover.html">
                        <span class="sidenav-mini-icon text-xs"> C </span>
                        <span class="sidenav-normal"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/signup/illustration.html">
                        <span class="sidenav-mini-icon text-xs"> I </span>
                        <span class="sidenav-normal"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#resetExample">
                  <span class="sidenav-mini-icon"> R </span>
                  <span class="sidenav-normal"> Reset Password <b class="caret"></b></span>
                </a>
                <div class="collapse " id="resetExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/reset/basic.html">
                        <span class="sidenav-mini-icon text-xs"> B </span>
                        <span class="sidenav-normal"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/reset/cover.html">
                        <span class="sidenav-mini-icon text-xs"> C </span>
                        <span class="sidenav-normal"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/reset/illustration.html">
                        <span class="sidenav-mini-icon text-xs"> I </span>
                        <span class="sidenav-normal"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#lockExample">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal"> Lock <b class="caret"></b></span>
                </a>
                <div class="collapse " id="lockExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/lock/basic.html">
                        <span class="sidenav-mini-icon text-xs"> B </span>
                        <span class="sidenav-normal"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/lock/cover.html">
                        <span class="sidenav-mini-icon text-xs"> C </span>
                        <span class="sidenav-normal"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/lock/illustration.html">
                        <span class="sidenav-mini-icon text-xs"> I </span>
                        <span class="sidenav-normal"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#StepExample">
                  <span class="sidenav-mini-icon"> 2 </span>
                  <span class="sidenav-normal"> 2-Step Verification <b class="caret"></b></span>
                </a>
                <div class="collapse " id="StepExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/verification/basic.html">
                        <span class="sidenav-mini-icon text-xs"> B </span>
                        <span class="sidenav-normal"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/verification/cover.html">
                        <span class="sidenav-mini-icon text-xs"> C </span>
                        <span class="sidenav-normal"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/verification/illustration.html">
                        <span class="sidenav-mini-icon text-xs"> I </span>
                        <span class="sidenav-normal"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#errorExample">
                  <span class="sidenav-mini-icon"> E </span>
                  <span class="sidenav-normal"> Error <b class="caret"></b></span>
                </a>
                <div class="collapse " id="errorExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/error/404.html">
                        <span class="sidenav-mini-icon text-xs"> E </span>
                        <span class="sidenav-normal"> Error 404 </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../../pages/authentication/error/500.html">
                        <span class="sidenav-mini-icon text-xs"> E </span>
                        <span class="sidenav-normal"> Error 500 </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <hr class="horizontal dark" />
          <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">DOCS</h6>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#basicExamples" class="nav-link " aria-controls="basicExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <svg width="12px" height="20px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>spaceship</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(4.000000, 301.000000)">
                        <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                        <path class="color-background" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                        <path class="color-background" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z" opacity="0.598539807"></path>
                        <path class="color-background" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z" opacity="0.598539807"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Basic</span>
          </a>
          <div class="collapse " id="basicExamples">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#gettingStartedExample">
                  <span class="sidenav-mini-icon"> G </span>
                  <span class="sidenav-normal"> Getting Started <b class="caret"></b></span>
                </a>
                <div class="collapse " id="gettingStartedExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/quick-start/soft-ui-dashboard" target="_blank">
                        <span class="sidenav-mini-icon text-xs"> Q </span>
                        <span class="sidenav-normal"> Quick Start </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard" target="_blank">
                        <span class="sidenav-mini-icon text-xs"> L </span>
                        <span class="sidenav-normal"> License </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/overview/soft-ui-dashboard" target="_blank">
                        <span class="sidenav-mini-icon text-xs"> C </span>
                        <span class="sidenav-normal"> Contents </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/build-tools/soft-ui-dashboard" target="_blank">
                        <span class="sidenav-mini-icon text-xs"> B </span>
                        <span class="sidenav-normal"> Build Tools </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#foundationExample">
                  <span class="sidenav-mini-icon"> F </span>
                  <span class="sidenav-normal"> Foundation <b class="caret"></b></span>
                </a>
                <div class="collapse " id="foundationExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/colors/soft-ui-dashboard" target="_blank">
                        <span class="sidenav-mini-icon text-xs"> C </span>
                        <span class="sidenav-normal"> Colors </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/grid/soft-ui-dashboard" target="_blank">
                        <span class="sidenav-mini-icon text-xs"> G </span>
                        <span class="sidenav-normal"> Grid </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/typography/soft-ui-dashboard" target="_blank">
                        <span class="sidenav-mini-icon text-xs"> T </span>
                        <span class="sidenav-normal"> Typography </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/icons/soft-ui-dashboard" target="_blank">
                        <span class="sidenav-mini-icon text-xs"> I </span>
                        <span class="sidenav-normal"> Icons </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#componentsExamples" class="nav-link " aria-controls="componentsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>customer-support</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(1.000000, 0.000000)">
                        <path class="color-background" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z" opacity="0.59858631"></path>
                        <path class="color-foreground" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                        <path class="color-foreground" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Components</span>
          </a>
          <div class="collapse " id="componentsExamples">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/alerts/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal"> Alerts </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/badge/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> B </span>
                  <span class="sidenav-normal"> Badge </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/buttons/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> B </span>
                  <span class="sidenav-normal"> Buttons </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/cards/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal"> Card </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/carousel/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal"> Carousel </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/collapse/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal"> Collapse </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/dropdowns/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> D </span>
                  <span class="sidenav-normal"> Dropdowns </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/forms/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> F </span>
                  <span class="sidenav-normal"> Forms </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/modal/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal"> Modal </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/navs/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal"> Navs </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/navbar/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal"> Navbar </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/pagination/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal"> Pagination </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/popovers/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal"> Popovers </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/progress/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal"> Progress </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/spinners/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal"> Spinners </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/tables/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> T </span>
                  <span class="sidenav-normal"> Tables </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="https://www.creative-tim.com/learning-lab/bootstrap/tooltips/soft-ui-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> T </span>
                  <span class="sidenav-normal"> Tooltips </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://github.com/creativetimofficial/ct-soft-ui-dashboard-pro/blob/main/CHANGELOG.md" target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Changelog</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 mt-3 pt-3">
      <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
        <div class="full-background" style="background-image: url('newAssets/img/curved-images/white-curved.jpg')"></div>
        <div class="card-body text-start p-3 w-100">
          <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
            <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
          </div>
          <div class="docs-info">
            <h6 class="text-white up mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold">Please check our docs</p>
            <a href="https://www.creative-tim.com/learning-lab/bootstrap/overview/soft-ui-dashboard" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
          </div>
        </div>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?= $contents ?>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg blur">
      <div class="card-header pb-0 pt-3  bg-transparent ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-0">
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