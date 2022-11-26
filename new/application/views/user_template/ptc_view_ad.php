<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?= $ads['name'] ?> | <?= $settings['name'] ?></title>
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
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet" type="text/css" />

</head>


<body data-sidebar="dark" style="overflow: hidden">

        <div class="d-flex">
            <div class="mr-auto p-2">
                <a class="btn btn-success" href="<?= base_url() ?>">Banano Faucet</a>
            </div>
            <div class="p-2">
                <h2><span class="badge badge-primary" id="ptcCountdown">Loading...</span></h2>
            </div>
        </div>

    <iframe id="ads" src="<?= $ads['url'] ?>" frameborder="0" style="width: 100%; height: calc(100vh - 75px);" sandbox="allow-same-origin allow-scripts allow-forms"></iframe>
    <div class="modal fade" id="ptcCaptcha" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Complete the Captcha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('/ptc/verify/' . $ads['id']) ?>" method="POST">
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
                        <center>
                            <?= $captcha_display ?>
                        </center><p>
<center><ins class="6295f53eb2e2b443b6100720" style="display:inline-block;width:300px;height:250px;"></ins><script>!function(e,n,c,t,o,r){!function e(n,c,t,o,r,m,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js",a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","6295f53eb2e2b443b6100720",["cdn.bmcdn3.com"],0)}();</script></center><p>
                        <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>">
                        <input type="hidden" name="token" value="<?= $user['token'] ?>">
                        <button id="verify" class="btn btn-success btn-block" type="submit">Verify</button><p>
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
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var timer = <?= $ads['timer'] ?>;
        var url = '<?= $ads['url'] ?>';
    </script>
    <script src="<?= base_url() ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.js"></script>
    <script src="<?= base_url() ?>assets/js/vie/captcha.js"></script>
    <script src="<?= base_url() ?>assets/js/vie/ptc.js"></script>
    <?php if (isset($_COOKIE['captcha'])) { ?>
        <script>
            $('option[value=<?= $_COOKIE['captcha'] ?>]').attr('selected', 'selected');
        </script>
    <?php } ?>
    <?php
    if (isset($_SESSION['sweet_message'])) {
        echo $_SESSION['sweet_message'];
    }
    ?>
    <?= $settings['footer_code'] ?>
    <?php include 'adblock.php'; ?>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>
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