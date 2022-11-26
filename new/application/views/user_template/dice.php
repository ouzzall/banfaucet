<center><span id="ct_cJd95UwrCma"></span></center><p>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">Dice</h4>
                <div class="alert alert-success text-center">Your balance: <span id="balance"><?= currencyDisplay($user['balance'], $settings) ?></span> </div>
                <form id="diceForm">
                    <div class="dice-row">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="multiplier">Win Chance</label>
                                <div class="input-group mb-2 mr-sm-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-percent"></i></div>
                                    </div>
                                    <input type="number" id="multiplier" class="form-control" value="49.5" min="2" max="97" step="0.1" placeholder="Win Chance">
                                </div>

                                <label for="profit">Profit</label>
                                <div class="input-group mb-2 mr-sm-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-trophy"></i></div>
                                    </div>
                                    <input type="text" id="profit" class="form-control" readonly>
                                </div>

                                <label for="betAmount">Bet Amount</label>
                                <div class="input-group mb-2 mr-sm-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-money-bill-alt"></i></div>
                                    </div>
                                    <input type="number" class="form-control" id="betAmount" value="<?= $settings['min_bet'] / $settings['currency_rate'] ?>" min="<?= $settings['min_bet'] / $settings['currency_rate'] ?>" max="<?= $settings['max_bet'] / $settings['currency_rate'] ?>" step="<?= $settings['currency_rate'] ?>" placeholder="Bet Amount">
                                    <div class="input-group-append">
                                        <button type="button" id="half" class="btn btn-warning btn-sm">/2</button>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="button" id="double" class="btn btn-success btn-sm">x2</button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 mb-2 mt-2">
                                        <label></label>
                                        <div id="result">
                                            <div class="alert alert-success text-center">You are ready to roll!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <div id="rollNumber">0000</div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" id="rollLo" class="btn btn-primary btn-outline bet-btn btn-block mt-1">Roll Lo</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" id="rollHi" class="btn btn-secondary btn-outline bet-btn btn-block mt-1">Roll Hi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-center mt-3">Hash of Next Roll - <span class="font-weight-bold" id="hashRoll"><?= $proof ?></span></p>
                </form>
            </div>
        </div>
<center><div class="d2ZaZGtjS2tRd289" style="display:inline-block;width:300px;height:250px;"></div><script>!function(l,i,j,e,k,c){!function l(f,h,d,n,a,b,g){b=h.getElementsByTagName(d)[0],(g=h.createElement(d)).async=!0,g.src="https://"+a+"/js/"+n+".js",b.parentNode.insertBefore(g,b)}(window,document,"script","d2ZaZGtjS2tRd289","cdn.adsfcdn.com")}();</script>&nbsp&nbsp
<iframe data-aa='1960488' src='//ad.a-ads.com/1960488?size=300x250' style='width:300px; height:250px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe></center><p>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">Previous Games</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <td scope="col">Game ID</td>
                                <td scope="col">Secret</td>
                                <td scope="col">Target</td>
                                <td scope="col">Bet</td>
                                <td scope="col">Roll</td>
                                <td scope="col">Profit</td>
                            </tr>
                        </thead>
                        <tbody id="diceHistory">
                            <?php
                            foreach ($history as $dice) {
                                $target = ($dice['type'] == 1 ? '&lt;' : '&gt;') . $dice['target'];
                                echo '<tr><th scope="row">' . $dice["id"] . '</th><td>' . $dice["salt"] . '</td><td>' . $target . '</td><td>' . currencyDisplay($dice['bet'], $settings) . '</td><td>' . $dice['roll'] . '</td><td>' . currencyDisplay($dice['profit'], $settings) . '</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<center><div class="d080eHRBNjc5OEE9" style="display:inline-block;width:728px;height:90px;"></div><script>!function(l,i,j,e,k,c){!function l(f,h,d,n,a,b,g){b=h.getElementsByTagName(d)[0],(g=h.createElement(d)).async=!0,g.src="https://"+a+"/js/"+n+".js",b.parentNode.insertBefore(g,b)}(window,document,"script","d080eHRBNjc5OEE9","cdn.adsfcdn.com")}();</script></center><p>
    </div>

    <div class="col-lg-12">
        <section id="verify">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 text-center">Verify Dice Rolls</h4>
                    <div class="p-5">
                        <?php
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                        }
                        ?>
                        <form action="<?= site_url('dice/verify') ?>" method="POST" autocomplete="off">
                            <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>">
                            <div class="form-group row mb-4">
                                <label for="secret" class="col-sm-3 col-form-label">Secret</label>
                                <div class="col-sm-9">
                                    <input type="text" name="secret" class="form-control" id="secret">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="roll" class="col-sm-3 col-form-label">Roll</label>
                                <div class="col-sm-9">
                                    <input type="text" name="roll" class="form-control" id="roll">
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Verify</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p>This tool will help you easily verify a roll. Simply paste in the secret and the roll and press verify. This will output the same SHA1 hash that was displayed before you pressed the Roll Lo or Roll Hi button.</p>

                        <p>The outcome of the next roll is displayed as a hash before you place your wager. This means the server decides it will roll a 20 before it knows how much you are betting or what your target is. You can verify a roll wasn't changed by copying the "Hash of next roll", then after playing that roll combine the "secret" and plus sign "+" and the roll "20" and perform a SHA1 hash. The resulting hash will be the same as the "Hash of next roll" that was displayed before you played that game.</p>

                        <p>[secret]+[roll]=HASH</p>
                        <p>Example: 9d45f162f6e735a1ee946ac1c4460526e3e7f2c2+43.47=61529ce3ee447392520fb6e4c59ba3ba3b4cb122</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="<?= base_url() ?>assets/js/vie/odometer.js"></script>
<center><script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="334104"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script></center><p>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>
<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=ps4vT6tvE4"></script>