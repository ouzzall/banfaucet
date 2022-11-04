			<div class="stat">
				<div class="row text-center">
					<div class="col-md-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
							<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
							<circle cx="9" cy="7" r="4"></circle>
							<path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
							<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
						</svg>
						<h3 class="mt-3"><?= number_format($stat['total_user']) ?> <span style="font-size: 18px;">Users</span></h3>
					</div>
					<div class="col-md-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award">
							<circle cx="12" cy="8" r="7"></circle>
							<polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
						</svg>
						<h3 class="mt-3"><?= number_format($stat['earning']) ?> <span style="font-size: 18px;"> USD earned</span></h3>
					</div>
					<div class="col-md-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
							<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
							<polyline points="7 10 12 15 17 10"></polyline>
							<line x1="12" y1="15" x2="12" y2="3"></line>
						</svg>
						<h3 class="mt-3"><?= number_format($stat['withdrawals']) ?> <span style="font-size: 18px;">Withdrawals</span></h3>
					</div>
					<div class="col-md-3">
<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 448 512" fill="#A6B0CF" stroke="currentColor"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32zM0 192H448V464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192zM64 304C64 312.8 71.16 320 80 320H112C120.8 320 128 312.8 128 304V272C128 263.2 120.8 256 112 256H80C71.16 256 64 263.2 64 272V304zM192 304C192 312.8 199.2 320 208 320H240C248.8 320 256 312.8 256 304V272C256 263.2 248.8 256 240 256H208C199.2 256 192 263.2 192 272V304zM336 256C327.2 256 320 263.2 320 272V304C320 312.8 327.2 320 336 320H368C376.8 320 384 312.8 384 304V272C384 263.2 376.8 256 368 256H336zM64 432C64 440.8 71.16 448 80 448H112C120.8 448 128 440.8 128 432V400C128 391.2 120.8 384 112 384H80C71.16 384 64 391.2 64 400V432zM208 384C199.2 384 192 391.2 192 400V432C192 440.8 199.2 448 208 448H240C248.8 448 256 440.8 256 432V400C256 391.2 248.8 384 240 384H208zM320 432C320 440.8 327.2 448 336 448H368C376.8 448 384 440.8 384 432V400C384 391.2 376.8 384 368 384H336C327.2 384 320 391.2 320 400V432z"/></svg>
						<h3 class="mt-3"><?= !$stat['dayOnline'] ? '0' : $stat['dayOnline'] ?> <span style="font-size: 18px;">Days Online</span></h3>
					</div>
				</div>
			</div>
		</div>
		<p>
<div class="alert alert-success text-center" role="alert"><i class="fa-solid fa-gift fa-xl"></i> Happy hour starts in: <b><span style="color:black" id="demo"></span></b>
<script>
// Set the date we're counting down to
var countDownDate = new Date("May 14, 2022 19:00:00 EST").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Ended";
  }
}, 1000);
</script></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="text-center mb-5">
						<h4>Last 10 Payments</h4>
					</div>
				</div>
			</div>

			<div class="table-responsive">
				<table class="table table-striped text-center">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Username</th>
							<th scope="col">Method</th>
							<th scope="col">Amount</th>
						</tr>
					</thead>
					<tbody>
                                <?php
                                foreach ($withdrawHistory as $wd) {
                                    $img = site_url('assets/images/currencies/' . strtolower($wd["code"]) . '.png');
                                    echo '<tr>
                                    <th scope="row">' . $wd["id"] . '</th>
                                    <td>' . $wd["username"] . '</td>
                                    <td><img src="' . $img . '" width="30px" /></td>
                                    <td>' . format_money($wd["amount"]) . ' USD</td>
                                    </tr>';
                                }
                                ?>
					</tbody>
				</table>
			</div>
		</div><p>
<center><span id="ct_cJd95UwrCma"></span></center>
<center><span id="ct_c1c1RkyZBbe"></span></center><p>

                    <script>
                      currencies['<?= $wd['id'] ?>'] = {
                        price: <?= $wd['price'] ?>,
                        code: '<?= $wd['method'] ?>',
                        minimumWithdrawal: <?= $wd['minimum_withdrawal'] ?>
                      };
                    </script>


<script async src="https://appsha-lon2.cointraffic.io/js/?wkey=lgXFfbiPoT"></script>
<script src="https://kit.fontawesome.com/affd6d170a.js" crossorigin="anonymous"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-40X8JY6KVR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-40X8JY6KVR');
</script>