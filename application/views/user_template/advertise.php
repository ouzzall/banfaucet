<div class="container-fluid py-4">
<!-- <div class="ads">
    <?= $settings['ptc_top_ad'] ?>
</div> -->
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
    <div class="col-12">
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <i class="fa-solid fa-gift fa-xl"></i> Redeem coupon code <b>25OFF</b> to get 25% advertising discount!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">Create a campaign</h4>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                } ?>

                <h5 style="color:#1B654A" class="text-center"><?= currencyDisplay($user['dep_balance'], $settings) ?> in your Advertising Balance</h5><p>
                <form action="<?= site_url('/advertise/add') ?>" method="POST">

                    <label>Name</label>
                    <!-- <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-icon-img" name="name" minlength="1" maxlength="75" autocomplete="off" required>
                    </div> -->
                    <div class="form-group">
                        <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fas fa-globe"></i></span>
                        <input type="text" style="padding-left: 10px;" class="form-control form-control-icon-img" name="name" minlength="1" maxlength="75" autocomplete="off" required>
                        </div>
                    </div>
                    <label>Description</label>
                    <!-- <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-comment-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control form-control-icon-img" name="description" minlength="1" maxlength="200" autocomplete="off" required>
                    </div> -->
                    <div class="form-group">
                        <div class="input-group mb-4">
                            <span class="input-group-text"><i class="far fa-comment-alt"></i></span>
                            <input type="text" style="padding-left: 10px;" class="form-control form-control-icon-img" name="description" minlength="1" maxlength="200" autocomplete="off" required>
                        </div>
                    </div>

                    <label>Url</label>
                    <!-- <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-link"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control form-control-icon-img" name="url" autocomplete="off" required>
                    </div> -->
                    <div class="form-group">
                        <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                        <input type="text" style="padding-left: 10px;" class="form-control form-control-icon-img" name="url" autocomplete="off" required>
                        </div>
                    </div>

                    <label>View</label>
                    <!-- <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <input type="number" class="form-control form-control-icon-img" name="view" min="1" autocomplete="off" required>
                    </div> -->
                    <div class="form-group">
                        <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fas fa-eye"></i></span>
                        <input type="number"style="padding-left: 10px;" class="form-control form-control-icon-img" name="view" min="1" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="option">Duration</label>
                        <select class="form-control" id="option" name="option">
                            <?php foreach ($options as $option) { ?>
                                <option value="<?= $option['id'] ?>"><?= $option['timer'] ?> seconds (<?= currencyDisplay($option['price'], $settings) ?>/view, minimum <?= $option['min_view'] ?> views)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php
                    if ($settings['coupon_status'] == 'on') { ?>
                        <label>Coupon Code</label>
                        <!-- <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-file"></i>
                                </span>
                            </div>
                            <input type="text" id="coupon-code" class="form-control" name="code" placeholder="Enter your coupon code" aria-label="Coupon code" aria-describedby="coupon-icon" autocomplete="off">
                            <button class="btn btn-outline-primary waves-effect" id="coupon-check" type="button">Check</button>
                        </div> -->
                        <div class="form-group">
                            <div class="input-group mb-4" style="height: 43px;">
                            <span style="height: 43px;" class="input-group-text"><i class="fas fa-file"></i></span>
                            <input style="height: 43px;padding-left: 10px;border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;" type="text" id="coupon-code" class="form-control" name="code" placeholder="Enter your coupon code" aria-label="Coupon code" aria-describedby="coupon-icon" autocomplete="off">
                            <button class="btn btn-outline-primary waves-effect" id="coupon-check" type="button">Check</button>
                            </div>
                        </div>
                        <div id="coupon-result"></div>
                    <?php } ?>
                    <input type="hidden" name="<?= $csrf_name ?>" id="token" value="<?= $csrf_hash ?>">
                    <button type="submit" class="btn btn-success btn-block" style="width: 100%;">Create Campaign</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>