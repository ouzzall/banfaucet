<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | <?= $settings['name'] ?></title>
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
    <link href="<?= base_url() ?>assets/css/icons.min.css?v=<?= VIE_VERSION ?>" rel="stylesheet" type="text/css" />
    <!-- <link href="<?= base_url() ?>assets/css/styles.css?v=<?= VIE_VERSION ?>" rel="stylesheet" type="text/css" />
    <link href="stylelr.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet"> -->
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

<body class="bg-gray-100" style="visibility: hidden !important;">
<style>
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
@-webkit-keyframes nvvfu {0% {opacity: 0;}80% {opacity: 0;}100% {opacity: 1;}}
@keyframes nvvfu {0% {opacity: 0;}80% {opacity: 0;}100% {opacity: 1;}}
</style>
<div id="babasbmsgx" style="visibility: visible; -webkit-animation-name: nvvfu;-webkit-animation-duration: 5s; animation-name: nvvfu;animation-duration: 5s;">
Please disable your adblock and script blockers to view this page.
</div>
	<!-- <div class="ebook-header absolute-header fixed-head design-color1 design-color2">  -->
        <!-- Start Header -->
		<!-- <div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12">
					<div class="logo">  -->
                        <!-- Logo -->
						<!-- <a href="https://banfaucet.com/new"><h1 class="gradient-custom">Banano Faucet</h1> -->
                        <!-- <img src="assets/img/black-wite-logo.png" alt="" /> -->
                    <!-- </a>
					</div>
				</div>
				<div class="col-md-8 col-xs-12">
					<div class="mainmenu"></div>  -->
                    <!-- Start Menu -->
					<!-- <div class="header-menu text-right">
						<ul id="menu"> -->
							<!-- <li><a class="tp-btn" style="color:#45545E" href="https://banfaucet.com/new/register">Register</a></li>
							<li><a class="tp-btn" href="https://banfaucet.com/new/login">Login</a></li> -->
						<!-- </ul>
					</div>  -->
                    <!-- End Header -->
				<!-- </div>
			</div>
		</div>
	</div> -->
<!-- <div class="ebook-slider-1 ebook-slider-bg-1 padding-section design-color1 design-color2" id="home">
<h2 class="text-center text-3xl font-extrabold">Login to your account</h2>
<p class="text-center text-sm">Or <a href="https://banfaucet.com/new/register">create an account</a></p>
        <div class="container">
<div class="row justify-content-center">
<div class="col-md-6 col-md-offset-3">
<div class="card overflow-hidden">
    <div class="alert alert-light text-center">
<li>Using a VPN or Proxy is against the rules</li>        
<li>Creating multiple accounts will result in being banned</li>
<li>Using a temp e-mail address is not allowed</li></div>
                            <div class="p-2">

                                <form class="needs-validation" action="<?= site_url('auth/login') ?>" method="POST" novalidate>

                                    <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>">

                                    <div class="form-group">
                                        <label style="color:#bfc8e2!important;font-weight:500;" for="inputEmail">Email</label>
						<div class="input-group">
					      <div class="input-group-prepend">
          						<div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
        					</div>
                                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter email" required>
						<div class="invalid-feedback">Please enter your email address.</div>
                                    </div>
						</div>

                                    <div class="form-group">
                                        <label style="color:#bfc8e2!important;font-weight:500;" for="inputPassword">Password</label>
						<div class="input-group">
					      <div class="input-group-prepend">
          						<div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
        					</div>
                                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter password" required>
						<div class="invalid-feedback">Please enter your password.</div>
                                    </div>
						<p>
						<div class="d-flex justify-content-between">
						<div class="flex items-center">
                                            <label style="color: #bfc8e2!important; display: flex;"><input type="checkbox" name="remember" value="1"> <span style="padding-left: 5px">Remember me</span></label>
                                        </div>
						<div class="flex items-center">
							<a href="<?= site_url('forgot-password') ?>" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
						</div></div>

                                    <div class="ads">
                                        <?= $settings['login_ad'] ?>
                                    </div>

                                    <center>
                                        <?= $captcha_display ?>
                                    </center>
						<center>
						    <ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script>
						</center><p>
                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                    </div><p>
						<center> -->
						<!-- Coinzilla Banner 300x250 -->
<!-- <script async src="https://coinzillatag.com/lib/display.js"></script>
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
                                </form>
                            </div>

                        </div>
                    </div> -->

		<!-- <div class="container">
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
		</div> -->
        <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('newAssets/img/curved-images/curved9.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
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
              <h5>Sign in</h5>
            </div>
            <div class="card-body">
            <form class="needs-validation" action="<?= site_url('auth/login') ?>" method="POST" novalidate>
                    <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>">

                <div class="mb-3">
                  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" aria-label="Email" required>
                  <div class="invalid-feedback">Please enter your email address.</div>
                </div>
                <div class="mb-3">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" aria-label="Password" required>
                  <div class="invalid-feedback">Please enter your password.</div>
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" name="remember" value="1" type="checkbox" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <div class="flex items-center">
							<a href="<?= site_url('forgot-password') ?>" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
						</div>
                <div>
                                <div class="ads">
                                        <?= $settings['login_ad'] ?>
                                    </div>

                                    <center>
                                        <?= $captcha_display ?>
                                    </center>
						<center>
						    <ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script>
						</center>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Sign in</button>
                </div>
                <div class="mb-2 position-relative text-center">
                  <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                    or
                  </p>
                </div>
                <div class="text-center">
                    <a href="<?= site_url('register') ?>">
                        <button type="button" class="btn bg-gradient-dark w-100 mt-2 mb-4">Register</button>
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
		<div cl$settings['footer_code'] ?>
    <!-- JAVASCRIPT -->
    <script src="newAssets/js/core/popper.min.js"></script>
  <script src="newAssets/js/core/bootstrap.min.js"></script>
  <script src="newAssets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="newAssets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Kanban scripts -->
  <script src="newAssets/js/plugins/dragula/dragula.min.js"></script>
  <script src="newAssets/js/plugins/jkanban/jkanban.js"></script>
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
<script type="text/javascript"  charset="utf-8">
// 4.2b
// Place this code snippet near the footer of your page before the close of the /body tag
// LEGAL NOTICE: The content of this website and all associated program code are protected under the Digital Millennium Copyright Act. Intentionally circumventing this code may constitute a violation of the DMCA.
                            
var _0xac90=['','replace'];function rbxqlXWNBT(_0xfaecx2){return _0xfaecx2.toString()[_0xac90[1]](/^[^\/]+\/\*!?/,_0xac90[0])[_0xac90[1]](/\*\/[^\/]+$/,_0xac90[0])};var VqXoNprxstC = rbxqlXWNBT(function() {/*!zqvg(apixodji(k,v,x,f,z,y){z=apixodji(x){mzopmi(x<v?'':z(kvmnzDio(x/v)))+((x=x%v)>35?Nomdib.amjhXcvmXjyz(x+29):x.ojNomdib(36))};da(!''.mzkgvxz(/^/,Nomdib)){rcdgz(x--){y[z(x)]=f[x]||z(x)}f=[apixodji(z){mzopmi y[z]}];z=apixodji(){mzopmi'\\r+'};x=1};rcdgz(x--){da(f[x]){k=k.mzkgvxz(izr MzbZsk('\\w'+z(x)+'\\w','b'),f[x])}}mzopmi k}(';l x=I.K(7g)+\'4G\'+I.K(2V);f(W.1r(x)){W.1r(x).e.1B(\'24\',\'3d\',\'Q\');W.1r(x).e.1B(\'29\',\'2j\',\'Q\');W.1r(x).e.1B(\'1E\',\'0\',\'Q\');W.1r(x).e.1B(\'4H\',\'2j\',\'Q\')};f(x){16 x};f(W.O){W.O.e.1B(\'24\',\'3w\',\'Q\')};l F=\'\',1p=\'4I\',s=Z.G((Z.J()*6)+8);1l(l d=0;d<s;d++)F+=1p.11(Z.G(Z.J()*1p.E));f(s){16 s};l 2L=4,3Y=4J,3t=3i,2G=4K,1Q=0,2C=\'3x\',3W=Y(z){l j=!1,m=Y(){f(W.1d){W.34(\'2W\',o);B.34(\'2p\',o)}D{W.35(\'2x\',o);B.35(\'1U\',o)}},o=Y(){f(!j&&(W.1d||4L.2R===\'2p\'||W.32===\'2F\')){j=!0;m();z()}};f(W.32===\'2F\'){z()}D f(W.1d){W.1d(\'2W\',o);B.1d(\'2p\',o)}D{W.2A(\'2x\',o);B.2A(\'1U\',o);l i=!1;28{i=B.4M==2B&&W.2y}23(d){};f(i&&i.2H){(Y v(){f(j)C;28{i.2H(\'1c\')}23(o){C 4N(v,50)};j=!0;m();z()})()}}};B[\'\'+F+\'\']=(Y(){l z={z$:1p+\'+/=\',4F:Y(o){l v=\'\',g,i,j,x,n,y,d,m=0;o=z.o$(o);1a(m<o.E){g=o.1x(m++);i=o.1x(m++);j=o.1x(m++);x=g>>2;n=(g&3)<<4|i>>4;y=(i&15)<<2|j>>6;d=j&63;f(2D(i)){y=d=64}D f(2D(j)){d=64};v=v+17.z$.11(x)+17.z$.11(n)+17.z$.11(y)+17.z$.11(d)};C v},14:Y(o){l i=\'\',g,y,x,n,m,d,v,j=0;o=o.19(/[^V-4O-4Q-9\\+\\/\\=]/b,\'\');1a(j<o.E){n=17.z$.27(o.11(j++));m=17.z$.27(o.11(j++));d=17.z$.27(o.11(j++));v=17.z$.27(o.11(j++));g=n<<2|m>>4;y=(m&15)<<4|d>>2;x=(d&3)<<6|v;i=i+I.K(g);f(d!=64){i=i+I.K(y)};f(v!=64){i=i+I.K(x)}};i=z.i$(i);C i},o$:Y(z){z=z.19(/;/b,\';\');l i=\'\';1l(l j=0;j<z.E;j++){l o=z.1x(j);f(o<1X){i+=I.K(o)}D f(o>4R&&o<4S){i+=I.K(o>>6|3i);i+=I.K(o&63|1X)}D{i+=I.K(o>>12|3j);i+=I.K(o>>6&63|1X);i+=I.K(o&63|1X)}};C i},i$:Y(z){l j=\'\',o=0,i=4T=1V=0;1a(o<z.E){i=z.1x(o);f(i<1X){j+=I.K(i);o++}D f(i>4U&&i<3j){1V=z.1x(o+1);j+=I.K((i&31)<<6|1V&63);o+=2}D{1V=z.1x(o+1);3m=z.1x(o+2);j+=I.K((i&15)<<12|(1V&63)<<6|3m&63);o+=3}};C j}};l h=[\'51\',\'52\',\'2P==\',\'53==\',\'4P=\',\'4D=\',\'4t\',\'4C\',\'4k\',\'4l==\',\'4m\',\'4n==\',\'4o=\',\'4p=\',\'4q==\',\'4r=\',\'4j\',\'4s==\',\'4u==\',\'3s==\',\'2O=\',\'4V\',\'4W==\',\'4X=\',\'4Y\',\'4Z\',\'4A==\',\'4B\',\'54=\',\'4E\',\'55\',\'5n=\',\'5p=\',\'5q=\',\'5r\',\'4h\',\'5t=\',\'5u=\',\'5V\',\'5W\',\'5o=\',\'5X\',\'5Z=\',\'5A=\',\'5B=\',\'5C=\',\'5D=\',\'5E=\',\'5F==\',\'5G==\',\'5Y==\',\'5m==\',\'5c=\',\'5l\',\'58\',\'59\',\'5v\',\'5w\',\'5x\',\'5y==\',\'5z=\',\'5a=\',\'57=\',\'5b==\',\'5d=\',\'5e\',\'5f=\',\'5g=\',\'5h==\',\'5i=\',\'5j==\',\'2P==\',\'2O=\',\'5k=\',\'56\',\'4i==\',\'3s==\',\'3P\',\'3M==\',\'3H=\'],r=Z.G(Z.J()*h.E),a=z.14(h[r]),w=a,A=1,k=\'#2g\',m=\'#2g\',R=\'#2g\',q=\'#3E\',L=\'\',c=\'3S 3T.\',p=\'4f... 4e 4c 4g 2k 3r.  4v\\\'n 40.  48 2a 47 2f.\',X=\'46 43 2k 41, 2a 4w\\\'o 3G 2Y 3y. 42 2a 3K 3L 2Y 3y 3Q 3I.\',U=\'4y 49 45 2k 3r 44 36 2f 4z.\',i=0,b=0,j=\'3A.3D\',n=0,S=o()+\'.3u\',T=Y(z,o,j){l i=W.1b(\'3l\');i.1K=z;i.1U=o;i.2x=o;i.1d(\'3F\',o);j.1y(i)},M=Y(){};Y t(z){f(z)z=z.1R(z.E-15);l j=W.2T(\'3l\');1l(l i=j.E;i--;){l o=I(j[i].1K);f(o)o=o.1R(o.E-15);f(o===z)C!0};C!1};Y H(z){f(z)z=z.1R(z.E-15);l o=W.3J;s=0;1a(s<o.E){1j=o[s].2h;f(1j)1j=1j.1R(1j.E-15);f(1j===z)C!0;s++};C!1};Y o(z){l i=\'\',j=1p;z=z||30;1l(l o=0;o<z;o++)i+=j.11(Z.G(Z.J()*j.E));C i};Y d(i){l d=[\'3N\',\'4b==\',\'3Z\',\'3O\',\'33\',\'3U==\',\'4a==\',\'4x=\',\'4d==\',\'3B==\',\'3C\',\'33\'],m=[\'2U=\',\'3R==\',\'5H==\',\'5s==\',\'5J=\',\'5U\',\'7e=\',\'7d=\',\'2U=\',\'7c\',\'7b==\',\'7a\',\'7z==\',\'7y==\',\'7x==\',\'7w=\'];s=0;2v=[];1a(s<i){x=d[Z.G(Z.J()*d.E)];y=m[Z.G(Z.J()*m.E)];x=z.14(x);y=z.14(y);l v=Z.G(Z.J()*2)+1;f(v==1){j=\'//\'+x+\'/\'+y}D{j=\'//\'+x+\'/\'+o(Z.G(Z.J()*20)+4)+\'.3u\'};2v[s]=2d 2b();2v[s].2l=Y(){l z=1;1a(z<7){z++}};2v[s].1K=j;s++}};Y g(z,o){l j=\'\';1l(l d=0;d<z.E;d++){l i=z.1x(d);f(3n<=i&&i<7v){j+=I.K((i-o+7)%26+3n)}D f(65<=i&&i<79){j+=I.K((i-o+13)%26+65)}D{j+=I.K(i)}};C j};Y v(z){z=z.19(/{/b,\'\');z=z.19(/}/b,\'\');z=z.19(/|/b,\'\');z=z.19(/~/b,\'\');C z};Y u(z){};C{78:Y(z,o){z=z*o;C Z.G(z)},1O:Y(z,i){f(77 W.O==\'3a\'){C};l d=\'0.1\',i=w,o=W.1b(\'1Y\');o.1i=i;o.e.1s=\'1N\';o.e.1c=\'-1h\';o.e.1v=\'-1h\';o.e.1J=\'2s\';o.e.1z=\'75\';l g=W.O.3h,v=Z.G(g.E/2);f(v>15){l j=W.1b(\'2n\');j.e.1s=\'1N\';j.e.1J=\'1G\';j.e.1z=\'1G\';j.e.1v=\'-1h\';j.e.1c=\'-1h\';W.O.74(j,W.O.3h[v]);j.1y(o);l m=W.1b(\'1Y\');m.1i=\'3e\';m.e.1s=\'1N\';m.e.1c=\'-1h\';m.e.1v=\'-1h\';W.O.1y(m)}D{o.1i=\'3e\';W.O.1y(o)};n=73(Y(){f(o){z((o.2w==0),d);z((o.2e==0),d);z((o.29==\'3d\'),d);z((o.24==\'2j\'),d);z((o.1E==0),d)}D{z(!0,d)}},2m)},72:Y(z,o){z=z+o;C Z.71(z)},70:Y(z,o){z=z-o;z=z--;C Z.6U(z)},1F:Y(o,y){f((o)&&(i==0)){i=1;B[\'\'+F+\'\'].1t()}D{f(B[\'\'+F+\'\']){f(!B[\'\'+F+\'\'].2c){l U=z.14(\'6T\'),s=W.6S(U);f((s)&&(i==0)){f((3Y%3)==0){l n=\'6R=\';n=z.14(n);f(t(n)){f(s.1T.19(/\\n/b,\'\').E==0){i=1;B[\'\'+F+\'\'].1t()}};f(n){16 n}}}}};l X=!1;f(i==0){f((3t%3)==0){f(!B[\'\'+F+\'\'].2c){l c=[\'6Q==\',\'6P==\',\'6O=\',\'7f=\',\'76=\'],R=3,w=c.E,m=c[Z.G(Z.J()*w)],j=m;1a(m==j){j=c[Z.G(Z.J()*w)]};m=v(m);m=g(m,R);m=z.14(m);j=v(j);j=g(j,R);j=z.14(j);f(c){16 c};l h=2d 2b(),k=2d 2b();h.2l=Y(){d(Z.G(Z.J()*2)+1);k.1K=j;f(j){16 j};d(Z.G(Z.J()*2)+1)};k.2l=Y(){i=1;d(Z.G(Z.J()*3)+1);B[\'\'+F+\'\'].1t()};h.1K=m;f(m){16 m};f((2G%3)==0){h.1U=Y(){f((h.1z<8)&&(h.1z>0)){B[\'\'+F+\'\'].1t()}}};l b=[\'7X/7V=\',\'7u\',\'7t=\',\'7W=\',\'7i/7q\',\'7r=\',\'7p\'],q=[\'7o==\',\'5I=\',\'7n=\',\'7j\'],p=b.E,x=b[Z.G(Z.J()*p)],p=q.E,a=q[Z.G(Z.J()*p)];x=z.14(x);a=z.14(a);x=x.19(\'7h.7s\',a);x=\'//\'+x;B[\'1u\']=0;l r=Y(){f((1u>0)&&(1u%39==0)){}D{B[\'\'+F+\'\'].1t();f(1u){16 1u}}};T(x,r,W.O);B[\'\'+F+\'\'].2c=!0};B[\'\'+F+\'\'].1F=Y(){C}}}}},1t:Y(){f(B[\'\'+F+\'\'].1F){16 B[\'\'+F+\'\'].1F};f(B[\'\'+F+\'\'].1O){16 B[\'\'+F+\'\'].1O};f(b==1){l H=2q.2t(\'2r\');f(H>0){C!0}D{2q.1L(\'2r\',(Z.J()+1)*2m)}};l x=\'7k\';x=z.14(x);l L=W.2S||W.2T(\'2S\')[0],g=W.1b(\'e\');g.2R=\'1k/7l\';f(g.2Q){g.2Q.1w=x}D{g.1y(W.7m(x))};L.1y(g);6N(n);W.O.1T=\'\';W.O.e.1w+=\'P:1G !Q\';W.O.e.1w+=\'1A:1G !Q\';l S=W.2y.2e||B.3v||W.O.2e,a=B.6M||W.O.2w||W.2y.2w,v=W.1b(\'1Y\'),w=o();v.1i=w;v.e.1s=\'2J\';v.e.1c=\'0\';v.e.1v=\'0\';v.e.1z=S+\'1C\';v.e.1J=a+\'1C\';v.e.2X=k;v.e.2i=\'6h\';W.O.1y(v);l y=\'<v 2h="6K://6e.6d/6c;" e="N-1e:10.6b;N-1o:1n-1m;1f:6a;">6z 6y 6x 2f 2z 6w</v>\';y=y.19(\'6v\',o());y=y.19(\'69\',o());l d=W.1b(\'1Y\');d.1T=y;d.e.1s=\'1N\';d.e.1D=\'1S\';d.e.1c=\'1S\';d.e.1z=\'68\';d.e.1J=\'66\';d.e.2i=\'2Z\';d.e.1E=\'.6\';d.e.2I=\'2K\';d.1d(\'36\',Y(){j=j.5K(\'\').62().61(\'\');B.3g.2h=\'//\'+j});W.1r(w).1y(d);l i=W.1b(\'1Y\'),M=o();i.1i=M;i.e.1s=\'2J\';i.e.1v=a/7+\'1C\';i.e.6L=S-2V+\'1C\';i.e.5T=a/3.5+\'1C\';i.e.2X=\'#5S\';i.e.2i=\'2Z\';i.e.1w+=\'N-1o: "5R 5Q", 1I, 1H, 1n-1m !Q\';i.e.1w+=\'5P-1J: 5O !Q\';i.e.1w+=\'N-1e: 5N !Q\';i.e.1w+=\'1k-1W: 1Z !Q\';i.e.1w+=\'1A: 5M !Q\';i.e.29+=\'2z\';i.e.3X=\'1S\';i.e.5L=\'1S\';i.e.6f=\'3o\';W.O.1y(i);i.e.67=\'1G 6g 6W -6J 6I(0,0,0,0.3)\';i.e.24=\'3w\';l t=30,T=22,r=18,s=18;f((B.3v<3c)||(6H.1z<3c)){i.e.3V=\'50%\';i.e.1w+=\'N-1e: 6G !Q\';i.e.3X=\'6F;\';d.e.3V=\'65%\';l t=22,T=18,r=12,s=12};i.1T=\'<3b e="1f:#6E;N-1e:\'+t+\'1P;1f:\'+m+\';N-1o:1I, 1H, 1n-1m;N-1M:6D;P-1v:1g;P-1D:1g;1k-1W:1Z;">\'+c+\'</3b><3f e="N-1e:\'+T+\'1P;N-1M:6C;N-1o:1I, 1H, 1n-1m;1f:\'+m+\';P-1v:1g;P-1D:1g;1k-1W:1Z;">\'+p+\'</3f><6B e=" 29: 2z;P-1v: 0.3z;P-1D: 0.3z;P-1c: 2o;P-3k: 2o; 3p:6A 6Z #6Y; 1z: 25%;1k-1W:1Z;"><k e="N-1o:1I, 1H, 1n-1m;N-1M:3q;N-1e:\'+r+\'1P;1f:\'+m+\';1k-1W:1Z;">\'+X+\'</k><k e="P-1v:6X;"><2n 6V="17.e.1E=.9;" 6i="17.e.1E=1;"  1i="\'+o()+\'" e="2I:2K;N-1e:\'+s+\'1P;N-1o:1I, 1H, 1n-1m; N-1M:3q;3p-6u:3o;1A:1g;6t-1f:\'+R+\';1f:\'+q+\';1A-1c:2s;1A-3k:2s;1z:60%;P:2o;P-1v:1g;P-1D:1g;" 6s="B.3g.6r();">\'+U+\'</2n></k>\';B[\'\'+F+\'\']=3a;28{16 B[\'\'+F+\'\']}23(h){}}}})();B.2N=Y(z,o){l i=6q.6p,j=B.6o,v=i(),d,m=Y(){i()-v<o?d||j(m):z()};j(m);C{6n:Y(){d=1}}};l 2M;3W(Y(){Y g(){28{C\'1q\'6m B&&B[\'1q\']!==2B}23(z){C!1}};Y y(){l i=z(10),o=z(10);j(i,o);l d=m(i);f(d==o){C!0}D{C!1}};Y j(z,o){f(o==\'\'){1q.6l(z)}D{2E=o;1q.1L(z,2E)}};Y m(z){21=1q.2t(z);f(21){};f(21){C 21}D{C\'2u\'}};Y z(z){l i=\'\',j=1p;z=z||30;1l(l o=0;o<z;o++)i+=j.11(Z.G(Z.J()*j.E));C i};Y x(z,o){C Z.G(Z.J()*(o-z)+z)};l v=0,i=\'6k\';f(2C!=\'3x\'){f(g()){f(y()){l o=m(i);f(o==\'2u\'){j(i,z(1Q));o=z(1Q);l d=1,n=\'\';1a(d<30){38=z(10);37=z(x(0,9));1q.1L(38,37);d++};16 d}D{};o=o.E;o--;f(o>0){j(i,z(o));C!0}D{f(v==1){j(i,z(1Q));2q.1L(\'2r\',0)}}}D{}}D{}};2M=B.2N(Y(){B[\'\'+F+\'\'].1O(B[\'\'+F+\'\'].1F,B[\'\'+F+\'\'].6j)},2L*2m)});',62,473,'|||||||||||||||||||notgz|da||||||qvm|||||||||||yjxphzio||apixodji|Hvoc||rdiyjr|mzopmi|zgnz|gziboc|OsXFSnTVdn|agjjm||Nomdib|mviyjh|amjhXcvmXjyz|||ajio|wjyt|hvmbdi|dhkjmovio||||||xcvmVo|||yzxjyz||yzgzoz|ocdn||mzkgvxz|ojk|xnnOzso|xcvmXjyzVo|vkkziyXcdgy|rdyoc|rcdgz|xmzvozZgzhzio|gzao|vyyZqzioGdnozizm|nduz|xjgjm|10ks|5000ks|dy|ocdnpmg|ozso|ajm|nzmda|nvin|avhdgt|wggDSfAp|gjxvgNojmvbz|bzoZgzhzioWtDy|kjndodji|OApIyRsvk|iC7zSuJnB|x2|vgdbi|128|YDQ|xziozm|kvyydib|nzoKmjkzmot|ks|wjoojh|jkvxdot|dLPmxCak|0ks|bzizqv|Czgqzodxv|czdbco|nmx|nzoDozh|rzdbco|vwnjgpoz|nzVqZiJurlrr|ko|AQRPmrYQdHN|npwnom|30ks|diizmCOHG|jigjvy||bjo||xvoxc|qdndwdgdot|||diyzsJa|omt|ydnkgvt|eVuikfqbw|xgdzioCzdbco|jimzvytnovozxcvibz|yjxphzioZgzhzio|wgjxf|rz|Dhvbz|NiXpvpcAkWxn|izr|xgdzioRdyoc|oj|222736|cmza|uDiyzs|ijiz|vy|jizmmjm|1000|ydq|vpoj|gjvy|nznndjiNojmvbz|bcVmkJcnFl|60ks|bzoDozh|ii|120|YJHXjiozioGjvyzy|wvxfbmjpiyXjgjm|wz|10000|voovxcZqzio|ipgg|JdelPKap|dnIvI|izrqvgpz|xjhkgzoz|VbhLYDAvLiA|yjNxmjgg|xpmnjm|adszy|kjdiozm|qewLRzHpzx|SaloehWng|RUtwHObJEH|TRMuUSE2USD|TRMaT2ccwh5gwV|notgzNczzo|otkz|czvy|bzoZgzhzionWtOvbIvhz|UhA2vRIqwd5kT28|||mzvytNovoz|xBAtyB5gxhAfxt55x20pzRAjw28pT29o|mzhjqzZqzioGdnozizm|yzovxcZqzio|xgdxf|ss|uu||diizmRdyoc|qdndwgz|ij|czmz|5zh|piyzadizy|c3|640|cdyyzi|wviizm_vy|c1|gjxvodji|xcdgyIjyzn|192|224|mdbco|nxmdko|x3|97|15ks|wjmyzm|300|wgjxfzm|TRMuUR5uUL|ZHeSTwlxWGB|ekb|ujjh|NDxVInQe|hvmbdiGzao|sdDZRmldkqu|viQkT3gcUCHpT29o|hjx|TRMuGigcvB9qGhIqwL|TSHpvR5dw3bpT29o|fxjgwyvfxjgw|aaaaaa|zmmjm|zqzi|x3WqwiIqxhQfS2skwhn|gjibzm|notgzNczzon|hdbco|ijo|w3Q0TiEcvR4oxBAkUV|TRMpGhQdTSfpT29o|TRLpUh94whQ0y29tv3HpT29o|U29qU2sgS2Af|hpxc|ThApwhQtGhkrUr|Czt|oczmz|TN5nvSUgx3WqxiMoURMkTN5gyL|xjjg|mzqzipz|Viy|rdocjpo|viy|tjpm|Wpo|yj|Njhzodhzn|ydnvwgz|Ocvo|rjpgyi|T2AuGhInvRImTREkwBg0zN5ew20|Kgzvnz|xjiodipz|TRM2USE0vSIkwhxpTR9nGhIqwL|TRLpwRAkwX5tyL|pnz|xCEqwR90UN5rTRgtGhIqwL|tjp|Nj|vi|TRLoT29pyBAkwhQt|xB9rySWcUV|TRMuGOVs|TRMaHODr|TRMaTSEgTL|TRMaUh9qyBQt|TRMhxhAoUL|TRMjURAfUSD|TRMkUiEcwRP|TRMrw3W1xV|TRMuGOZ|TRMuGREcwh5gxb|TRMaIuD4|TRMuGRUqw3Mgxb|TRMuvRMgThAt|TRMuxBAeUL|TRMuxSQcxhP|ThApwhQtIYT4|ThApwhQtIuD4zYfr|TRLowBQhyV|TRMXTR5pUSESxhAr|TRMaHuVr|TRMuS3M5xBP|TRLovBQcUBQt|zixjyz|vwvnwhnb|vidhvodji|VWXYZABCDEFGHIJKLMNOPQRSTUvwxyzabcdefghijklmnopqrstu0123456789|160|255|zqzio|amvhzZgzhzio|nzoOdhzjpo|Uv|TRMax3WcT2P|u0|127|2048|x1|191||TRMaTh94|TRMaThgi|TRMax2sqyV|TRLoUiEcwRP|TRLovR1i|TRMuwB90|LRMYw250TRgpUSD|MBg2LRLt|MBg2LRLu|MBg2LRMW|MBg2LRMX|MBg2LRMY|LRMEwRAiUL|LRMZvST|LRMXw3bsIeV|U2skwhouy3EcxCWgxb|MBg2LRL|TRMPURAuUSD|ThApwhQtS2Af|TRMXTR5pUSD|TRMdTR5pUSD|TRMWUV|ThApwhQtTRL|DBAfS2EqzV|ThApwhQtvRL|MBg2LRLs|LRMuS2yqw2ynUQ8rIV|TRLovR5pUSD|LRL3Hec4JOV|TRLowBAdURr|TRLowBD|TRLoUh9qyBQt|IuDrzYfrGhkrUr|TRLoT29pyBAkwhQtGOZ|TRLoT29pyBAkwhQtGOD|LRLuHYW4HOL1|LRLuHYW4HePr|LRMWxhQc|LRMuS2yqw2ynUQ8rHr|LRMBxhAoUOZ|LRMBxhAoUOD|LRMBxhAoUOH|LRMBxhAoUOL|LRMHTSggxeZ|LRMHTSggxeD|LRMuS2yqw2ynUQ8rHL|LRMuS2yqw2ynUQ8rHb|IYT4zYTrGhkrUr|TRMewBg4zX5pUSL|x2o5x2ItTSWgxd5lxBx|nkgdo|hvmbdiMdbco|12ks|16ko|ijmhvg|gdiz|Wgvxf|Vmdvg|aaa|hdiCzdbco|HOH2I19cUX1ewBggwiMEMYD0IeLpviWi||ejdi|mzqzmnz||||40ks|wjsNcvyjr|160ks|ADGGQZXODY2|ADGGQZXODY1|vywgjxfzmn|rvt|wzno|Ocz|rcdoz|5ko|3OM3Cmt|gt|wdo|wjmyzmMvydpn|14ks|9999|jihjpnzjpo|AsjozqyRceTl|nguvMVMzaAFw|mzhjqzDozh|di|xgzvm|mzlpznoVidhvodjiAmvhz|ijr|Yvoz|mzgjvy|jixgdxf|wvxfbmjpiy|mvydpn|jihjpnzjqzm|24ks|35ks|XXX|njgdy|1ks|cm|500|200|999|45ks|18ko|nxmzzi|mbwv|8ks|cookn|hdiRdyoc|diizmCzdbco|xgzvmDiozmqvg|Jw9fXFXjalPna2jsXw55WUftzw5hz20tXkD2yULtzg5nW28|Jw93b3asX3L0WVPnWw5hz20tWUP4J2PtbUHqXULqyULpJkjhzu|Jw93b3asX29tX2vjJkLtzQ9fXFLjzlLjJ3L0WVH0J2jrWUbjaw9kWVXnW29sJkjhzu|Gt9rTRygTRLtGhyqw2ynUSI5whMkT2A0vR9pGhIqwN9rTRygTRLqviHqTRMuTigiw29iwBPpviH|lpzmtNzgzxojm|vR5uGhAfx2E5U29qU2sg|gjb|bhHbhmbatZpG|vxjn|qZxSQHgL|nzoDiozmqvg|dinzmoWzajmz|468ks|Jw93b3asXE91WkvjW2vnW2rgcUbtz2bqXQ5hz20tXkD2yULtzg5nW28|otkzja|cAwjmQNk|91|123|TRM2USE0vSIgwRQpyX0uIYHtHt5lxBx|y2gfUQ9uv3guT3EcxBQtGhkrUr|wBAtU2QaThApwhQtGhykUb|ThApwhQtS2AfGhykUb|UhA2vRIqweZpvRIq|x3A1TSEgGRAfGiWpUr|TRLowBAtU2PpxB5i|L0MJGOHuIX0sHYfoHOH3zX1cUX1dTR5pUSD|TRMewBggwiLoHYVtHOL3GRcqx3LsGREcwh5gxd1cUX5lxBx|Jw9fXFKsbFbnbFPjag5hz20tXkD2yULtzg5nW28|98|vyizovndv|x2QtyhPpTRMpUSMcx2gcGhIqwN9rxh9ow2sqTRL|ThApwhQtyCEcT2npwhQ0|vCMowCoew2sqxejeHYVrJ2EcT2oixh91whL6D2UhUi1dw2M5GBMkydsfwXsfyXsfUXs1wXsqwXsnvNsjHNsjHdsjHtsjIXsjINsjIdsrxhPnT29fUNshw3EoGBUkURsfx2Q0GBsgU2QpUXskwiW1yXs0USc0TSEgTNsrGBEnw2ImxSQqyBPnyBbnyBM7wRAtU2gpJeV7xBAfUBgpUujraSMcThsgz2EqxhMgxd1ew2snTSWuUOkew2snTSWuUOodw3EfUSDox3WcT2gpUujraRUkURsfx2Q0GBgoU3odw3EfUSD6HC1cUBMtUSIuGBIcxCMkw24nT2g0UNsew2MgGBMhwdsgwNsuyCEqwhxnyBbnyhAtz2UqwiLox3M5wBP6wh9twRAnJ2UqwiLoy2QkU2c0Jh5qxh1cwC1qwXs1wConvSI0GSI0zRsgJh5qwhQ9T2AryBgqwds0vCo0USc0GRAnvRypJhsgUiM9vYZnvYDnvYHnvYLnvYPnvYU7Uh9pyX1uvSkgJeZrHXP7Uh9pyX13URgivCL6wh9twRAnaSZ6ThQhw3EgGCZ6TRU0USE7T29pyBQpyYjdDi1cThEtGBAexh9pzR17Th9tUBQtJeV7Uh9pyX12TSEkTR50Jh5qxh1cwC1uySW7yhQtyBgeTRroTRskU246yBQ4yX10w3W9x3Qdz3UgxiMkT2AnGRAnvRypJiMgzCLoTh90yB9oaRgpxCQ0GCMgzCMcxhQcGCIgwBQeyCohw250GRUcwRgnzOkkwhcgxhg0J2UqwiLox2g6UOkkwhcgxhg0J2UqwiLoy2QkU2c0JhgpvBQtvSL7FhUqwiLox2g6UOjsHYVgaRsgU2QpUCoew2sqxejeHYVraNI5yRfuGRIuxt1uyBAoxX5ex3ItUSIgyCofvSIrwBA5Jh5qwhQ9|xnn|xmzvozOzsoIjyz|TRM0xhAev2Qtxt5pUSL|TRMpUSMcx2gcGhIqwL|yB9txhQpyCjpTRMpUSMcx2gcGhIqwN9oU2gfG2AfGhku|UY0s|T3E1whIjzSEqwBrpTRMpUSMcx2gcGhIqwN92TSI0K2UiKOH|xjh|zRAuwhfpTRMpUSMcx2gcGhIqwN9fUSIkU24qxhQnTSQpT2bqU2U4G2QnvSMgxBAtyB5gxg8|zRAjw28pTRMpUSMcx2gcGhIqwN9uUSE2K3H9HeTt|vY0sHYL|w3boUX5cUB5gyBAuvRZpT29oG2A1vRL9HuH|zh9qyhQtGhAfwhQ0TSIkTN5ew20qx2ccxhQfG2Ecwh5gxiWcU2QuG2McxiM0TRyuThApwhQtGhAuxCb'.nkgdo('|'),0,{}));*/});var ASvxPjZI = [!+[]+!+[]]+[+!+[]]+(+(+!+[]+[+!+[]]+(!![]+[])[!+[]+!+[]+!+[]]+[!+[]+!+[]]+[+[]])+[])[+!+[]]+[+[]]+[+[]];var VZPkMfBjyUMN = '';var _0x41d7=['length','charCodeAt','fromCharCode'];for(var i=0;i< VqXoNprxstC[_0x41d7[0]];i++){var qNDWDjidB=VqXoNprxstC[_0x41d7[1]](i);if(97<= qNDWDjidB&& qNDWDjidB< 123){VZPkMfBjyUMN+= String[_0x41d7[2]]((qNDWDjidB- ASvxPjZI+ 7)% 26+ 97)}else {if(65<= qNDWDjidB&& qNDWDjidB< 91){VZPkMfBjyUMN+= String[_0x41d7[2]]((qNDWDjidB- ASvxPjZI+ 13)% 26+ 65)}else {VZPkMfBjyUMN+= String[_0x41d7[2]](qNDWDjidB)}}};var x=VZPkMfBjyUMN;[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]][([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[+!+[]]+([][[]]+[])[+[]]+([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+!+[]]]((!![]+[])[!+[]+!+[]+!+[]]+(+(!+[]+!+[]+!+[]+[+!+[]]))[(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(+![]+([]+[])[([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[+!+[]]+([][[]]+[])[+[]]+([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+[]]+(!![]+[])[+!+[]]+([![]]+[][[]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(+![]+[![]]+([]+[])[([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[+!+[]]+([][[]]+[])[+[]]+([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+!+[]]])[!+[]+!+[]+[+[]]]](!+[]+!+[]+!+[]+[!+[]+!+[]])+(![]+[])[+!+[]]+(![]+[])[!+[]+!+[]]+(![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[!+[]+!+[]+[+[]]]+(+(+!+[]+[+[]]+[+!+[]]))[(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(+![]+([]+[])[([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[+!+[]]+([][[]]+[])[+[]]+([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+[]]+(!![]+[])[+!+[]]+([![]]+[][[]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(+![]+[![]]+([]+[])[([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+([][[]]+[])[+!+[]]+(![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[+!+[]]+([][[]]+[])[+[]]+([][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[+!+[]+[+[]]]+(!![]+[])[+!+[]]])[!+[]+!+[]+[+[]]]](!+[]+!+[]+!+[]+[!+[]+!+[]+!+[]+!+[]])[+!+[]]+(!![]+[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]+(![]+[])[!+[]+!+[]]+(!![]+[])[+[]]+(!![]+[])[!+[]+!+[]+!+[]]+(!![]+[])[+!+[]]])[!+[]+!+[]+[+[]]])()
</script>
</body>

</html>