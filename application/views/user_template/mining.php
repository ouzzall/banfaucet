<div class="container-fluid py-4">
<div class="row">
<div class="col-12">
          <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <span class="alert-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
            <span class="alert-text">Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/offerwall/timewall" style="color: #fff !important;font-weight:bold">Timewall!</a></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <center><div class="alert alert-info text-center" role="alert">
• Mining uses your CPU on your PC or Mobile device<br>
• Hashrate depends on your CPU power<br>
• Once you have reached 10 tokens you can withdraw them to your main balance<br>
• Approximate rate: 2 million hashes equal 1 token</div>
			<h3>Balance: <?= currencyDisplay($balance, $settings) ?></h3>
                <form action="<?= site_url('mining/withdraw') ?>" method="post">
                    <input type="hidden" name="<?= $csrf_name ?>" id="token" value="<?= $csrf_hash ?>">
                    <?php if ($balance < $min_withdrawal) { ?>
                        <button type="button" disabled class="btn btn-primary">Minimum withdraw is <?= currencyDisplay($min_withdrawal, $settings) ?></button>
                    <?php } else { ?>
                        <button type="submit" class="btn btn-primary">Withdraw to your account</button>
                    <?php } ?>
                </form>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                ?></center><p>
                <script src="https://webminepool.com/lib/simple-ui.js"></script>
                <center><div style="background:#2a3042" id="wmp-container" wmp-site-key="<?= $settings['webminepool_site_key'] ?>" wmp-username="<?= $user['username'] ?>" wmp-threads="2" wmp-throttle="0.1" wmp-autostart="true" style="margin: 0 auto;">
                </div></center>
            </div>
        </div>
    </div>
</div>
</div>