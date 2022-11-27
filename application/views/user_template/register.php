<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page ?> | <?= $settings['name'] ?></title>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://banfaucet.com/newAssets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://banfaucet.com/newAssets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://banfaucet.com/newAssets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="https://banfaucet.com/newAssets/css/soft-ui-dashboard.css?v=2" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/regular.min.css" integrity="sha512-aNH2ILn88yXgp/1dcFPt2/EkSNc03f9HBFX0rqX3Kw37+vjipi1pK3L9W08TZLhMg4Slk810sPLdJlNIjwygFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css" integrity="sha512-uj2QCZdpo8PSbRGL/g5mXek6HM/APd7k/B5Hx/rkVFPNOxAQMXD+t+bG4Zv8OAdUpydZTU3UHmyjjiHv2Ww0PA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
  .dark-version .sidenav.bg-white {
  background: #141728 !important;
}
    #sticky-ads {
  display: none;
}
    img.cruncyIcon {
      width: 30px;
    }

    /* .sidenav-footer {
      position: inherit;
      padding: 10px 10px;
      left: 0;
      bottom: 0;
      width: 250px;
    } */

    .fixed-plugin .card {
      position: fixed !important;
      right: -360px;
      bottom: 0 !important;
      top: unset !important;
      height: 200px !important;
      left: auto !important;
      transform: unset !important;
      width: 360px;
      border-radius: 22px !important;

    }

    #sidenav-main {
  display: none;
}
.sidenav.fixed-start ~ .main-content {
  margin-left: 0 !important;
}
    .header-profile-user {
      height: 36px;
      width: 36px;
      padding: 3px;
    }
  </style>

</head>

<body class="g-sidenav-show  bg-gray-100">

  <!-- new code start -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" ">
        <img src=" https://banfaucet.com/assets/images/logo-min.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">BANFAUCET</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('dashboard') ?>">
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
        
        
       
        
      </ul>
    </div>
    <div class="sidenav-footer mx-3 mt-3 pt-3">
      <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
        <div class="full-background" style="background-image: url('../../assets/img/curved-images/white-curved.jpg')"></div>
        <div class="card-body text-start p-3 w-100">
          <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
            <i class="fa-solid fa-user-circle text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
          </div>
          <div class="docs-info" style="font-size: 14px;">
          <div class="row">
            <div class="col-auto mr-auto font-weight-bold" style="font-size: 12px;">Level <?= $user['level'] ?> / <span class="text-success"> <?= $bonus ?>% </span> Bonus </div>
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
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
    <!-- End Navbar -->

    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('newAssets/img/curved-images/curved9.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
          <h2 class="text-white mb-2 mt-5">Register an account</h2>
            <div class="alert alert-primary text-white text-center" role="alert">• Using a VPN or Proxy is against the rules<br>• Creating multiple accounts will result in being banned<br>• Using a temp e-mail address is not allowed
  </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Sign in</h5>
            </div>
            <div class="card-body">
            <form class="needs-validation" action="<?= site_url('auth/register') ?>" method="POST" novalidate>
                <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>">

                <div class="mb-3">
                  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" aria-label="Email" required>
                  <div class="invalid-feedback">Please enter your email address.</div>
                </div>
                <div class="mb-3">
                <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Enter username" pattern="^[a-zA-Z]{1,1}[a-zA-Z0-9_]{2,13}[a-zA-Z0-9]{1,1}$" title="Username should only contain lowercase letters, numbers and _. e.g. tungaqhd_1234" required>
						<div class="invalid-feedback">Please enter a valid username.</div>
                </div>
                <div class="mb-3">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" aria-label="Password" required>
                  <div class="invalid-feedback">Please enter your password.</div>
                </div>
                <div class="mb-3">
                    <input type="password" name="confirm_password" class="form-control" id="inputConfirm_password" placeholder="Confirm password" required>
					<div class="invalid-feedback">Password doesn't match</div>
                </div>
                
                
                <div>
                        <div class="ads">
                                        <?= $settings['register_ad'] ?>
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
</script>
  </center>
                                    <center>
                                        <?= $captcha_display ?>
                                    </center>
						<center>
						    <ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script>
						</center>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Register</button>
                </div>
                <p style="text-align: center;margin-bottom: 0;">or</p>
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

    <footer class="footer py-5">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="https://t.me/banfaucet" target="_blank" class="text-secondary me-xl-4 me-4">
            <i class="fa-brands fa-telegram fa-xl"></i>
          </a>
          <a href="https://discord.gg/EcUfn9MtV3" target="_blank" class="text-secondary me-xl-4 me-4">
            <i class="fa-brands fa-discord fa-xl"></i>
          </a>
          <a href="https://reddit.com/r/banfaucet/" target="_blank" class="text-secondary me-xl-4 me-4">
            <i class="fa-brands fa-reddit fa-xl"></i>
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
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg blur">
      <div class="card-header pb-0 pt-3  bg-transparent ">
        <div class="float-start">
          <a class="navbar-brand m-0" href="#">
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

  <!-- // -->

  <script src="https://banfaucet.com/newAssets/js/core/popper.min.js"></script>
  <script src="https://banfaucet.com/newAssets/js/core/bootstrap.min.js"></script>
  <script src="https://banfaucet.com/newAssets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="https://banfaucet.com/newAssets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="https://banfaucet.com/newAssets/js/plugins/choices.min.js"></script>
  <script src="https://banfaucet.com/newAssets/js/plugins/dragula/dragula.min.js"></script>
  <script src="https://banfaucet.com/newAssets/js/plugins/jkanban/jkanban.js"></script>
  <script src="https://banfaucet.com/newAssets/js/plugins/countup.min.js"></script>
  <script src="https://banfaucet.com/newAssets/js/plugins/chartjs.min.js"></script>
  <!-- <script src="https://banfaucet.com/newAssets/js/plugins/datatables.js"></script> -->


  <?php if ($page == 'Withdraw') { ?>
    <script src="https://banfaucet.com/newAssets/js/plugins/multistep-form.js"></script>
  <?php } ?>

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
  <script src="https://banfaucet.com/newAssets/js/soft-ui-dashboard.min.js?v=5"></script>

  <script>
    console.log("SCRIPT WORKING");
  </script>

  <script>
    $(document).ready(function() {
      console.log("ready!");
    });
  </script>
  <script>
var TestAd="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js";function init(){adsBlocked((function(e){e&&(Swal.fire("Ad Blocker Detected","Please uninstall it or whitelist Banano Faucet.","error"),setTimeout((function(){window.location.href="https://banfaucet.com/register"}),5e3))}))}function adsBlocked(e){var o=new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js",{method:"HEAD",mode:"no-cors"});fetch(o).then((function(e){return e})).then((function(o){console.log(o),e(!1)})).catch((function(o){console.log(o),e(!0)}))}!function(){var e=performance.now(),o=document.createElement("script");o.onload=function(){(performance.now()-e).toFixed(2);o.parentNode.removeChild(o)},o.onerror=function(){var o=(performance.now()-e).toFixed(2)+"ms";Swal.fire("Ad Blocker Detected","Please uninstall it or whitelist Banano Faucet.","error"),setTimeout((function(){window.location.href="https://banfaucet.com/register"}),5e3)},o.src=TestAd,document.body.appendChild(o)}(),document.addEventListener("DOMContentLoaded",init,!1);</script>
<script>

  <!-- PREVIOUS CODES ######################################################################################################## -->
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
<script>
    // Self-executing function
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
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
  
  <script>
    //////
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-40X8JY6KVR');
  </script>

  <script>

    console.log("DARK/LIGHT SETTINGS");

    if(localStorage.getItem("my_theme") == null)
    {
      localStorage.setItem("my_theme", "light");
    }
    else if(localStorage.getItem("my_theme") == "light")
    {
      console.log("LIGHT");
    }
    else if(localStorage.getItem("my_theme") == "dark")
    {
      console.log("DARK");
      document.getElementById('dark-version').click();
    }

  </script>

</body>

</html>