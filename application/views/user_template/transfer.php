<div class="container-fluid py-4">
<div class="ads">
    <?= $settings['dashboard_top_ad'] ?>
</div>
<div class="row mb-4">
    <div class="col-lg-8 mx-auto">
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">Transfer</h4>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                } ?>
                <div class="alert alert-warning text-center">You can only transfer from Main Balance to Advertising Balance. <b>This process cannot be reversed!</b></div>
                <form action="<?= site_url('/account/transfer_balance') ?>" method="POST">
                    <label>Amount</label>
                    <!-- <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="number" class="form-control form-control-icon-img" name="amount" autocomplete="off" min="0.000001" max="<?= $user['balance'] / $settings['currency_rate'] ?>" step="0.000001" required>
                    </div> -->
                    <div class="form-group">
                        <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        <input type="number" class="form-control form-control-icon-img" name="amount" autocomplete="off" min="0.000001" max="<?= $user['balance'] / $settings['currency_rate'] ?>" step="0.000001" required>
                        </div>
                    </div>
                    <input type="hidden" name="<?= $csrf_name ?>" id="token" value="<?= $csrf_hash ?>">
                    <button type="submit" style="display: block;margin: auto;" class="btn btn-success btn-block">Transfer</button>
                </form>
            </div>
        </div>
    </div>
</div>
            </div>