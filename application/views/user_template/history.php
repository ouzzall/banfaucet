<div class="container-fluid py-4">
<!-- <div class="alert alert-warning text-center alert-dismissable fade show" role="alert"><i class="fa-solid fa-circle-exclamation fa-xl"></i> Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/new/offerwall/timewall" class="alert-link">Timewall</a>!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div> -->
  <div class="row">
    <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <span class="alert-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                <span class="alert-text">Earn a 15% bonus for every offer you complete from <a href="https://banfaucet.com/new/offerwall/timewall" style="color: #fff !important;font-weight:bold">Timewall!</a></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
  </div>    
  <p><div class="row">
    <div class="col-md-8 mx-auto">
    <div class="card">
            <div class="card-header d-flex pb-0 p-3">
              <h6 class="my-auto">History</h6>
              <div class="nav-wrapper position-relative ms-auto w-50">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="true">
                      Tasks
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#lottery" role="tab" aria-controls="lottery" aria-selected="false">
                      Lottery
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#offerwalls" role="tab" aria-controls="offerwalls" aria-selected="false">
                      Offerwalls
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#withdrawls" role="tab" aria-controls="withdrawls" aria-selected="false">
                      Withdrawals
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body p-3 mt-2">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show position-relative active height-400 border-radius-lg" id="tasks" role="tabpanel" aria-labelledby="tasks" style="background-image: url('newAssets/img/bg-smart-home-1.jpg'); background-size:cover;">
                  <div class="position-absolute d-flex top-0 w-100">
                    <p class="text-white p-3 mb-0">17.05.2021 4:34PM</p>
                    <div class="ms-auto p-3">
                      <span class="badge badge-secondary">
                        <i class="fas fa-dot-circle text-danger"></i>
                        Recording</span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade position-relative height-400 border-radius-lg" id="lottery" role="tabpanel" aria-labelledby="lottery" style="background-image: url('newAssets/img/bg-smart-home-2.jpg'); background-size:cover;">
                  <div class="position-absolute d-flex top-0 w-100">
                    <p class="text-white p-3 mb-0">17.05.2021 4:35PM</p>
                    <div class="ms-auto p-3">
                      <span class="badge badge-secondary">
                        <i class="fas fa-dot-circle text-danger"></i>
                        Recording</span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade position-relative height-400 border-radius-lg" id="offerwalls" role="tabpanel" aria-labelledby="offerwalls" style="background-image: url('newAssets/img/home-decor-3.jpg'); background-size:cover;">
                  <div class="position-absolute d-flex top-0 w-100">
                    <p class="text-white p-3 mb-0">17.05.2021 4:57PM</p>
                    <div class="ms-auto p-3">
                      <span class="badge badge-secondary">
                        <i class="fas fa-dot-circle text-danger"></i>
                        Recording</span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade position-relative height-400 border-radius-lg" id="withdrawls" role="tabpanel" aria-labelledby="withdrawls" style="background-image: url('newAssets/img/home-decor-3.jpg'); background-size:cover;">
                  <div class="position-absolute d-flex top-0 w-100">
                    <p class="text-white p-3 mb-0">17.05.2021 4:57PM</p>
                    <div class="ms-auto p-3">
                      <span class="badge badge-secondary">
                        <i class="fas fa-dot-circle text-danger"></i>
                        Recording</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>           
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title mb-4">History</h4>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                } ?>

                <ul class="nav nav-tabs mb-3 mt-3 justify-content-center" id="iconTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tasks-tab" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="true">
                            <i class="fas fa-tasks"></i>
                            Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="lottery-tab" data-toggle="tab" href="#lottery" role="tab" aria-controls="lottery" aria-selected="false">
                            <i class="fas fa-ticket-alt"></i>
                            Lottery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="offerwall-tab" data-toggle="tab" href="#offerwall" role="tab" aria-controls="offerwall" aria-selected="false">
                            <i class="far fa-newspaper"></i>
                            Offerwalls</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="withdrawals-tab" data-toggle="tab" href="#withdrawals" role="tab" aria-controls="withdrawals" aria-selected="false">
                            <i class="fas fa-download"></i>
                            Withdrawals</a>
                    </li>
                </ul>
                <div class="tab-content" id="iconTabContent-1">
                    <div class="tab-pane fade active show" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Task</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($task_history as $value) {
                                        echo '<tr><th scope="row">' . $value["id"] . '</th><td>' . $value['name'] . '</td><td>' . currencyDisplay($value["usd_reward"], $settings) . '</td><td>' . timespan($value["claim_time"], time(), 2) . ' ago</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lottery" role="tabpanel" aria-labelledby="lottery-tab">
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($lottery_history as $value) {
                                        echo '<tr><th scope="row">' . $value["id"] . '</th><td>' . format_money($value["amount"]) . '</td><td>' . timespan($value["create_time"], time(), 2) . ' ago</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="offerwall" role="tabpanel" aria-labelledby="offerwall-tab">
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Offerwall</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Complete on</th>
                                        <th scope="col">Release in</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                    </tr>
                                    <?php
                                    foreach ($offerwall_history as $value) {
                                        $release =  timespan(time(), $value["available_at"], 2);
                                        if ($release == '1 Second') {
                                            $release = '<span class="badge badge-success">Released</span>';
                                        }
                                        switch ($value['status']) {
                                            case 0:
                                                $value['status'] = '<span class="badge badge-pill badge-info">Pending</span>';
                                                break;
                                            case 1:
                                                $value['status'] = '<span class="badge badge-pill badge-danger">Cancelled</span>';
                                                break;
                                            case 2:
                                                $value['status'] = '<span class="badge badge-pill badge-success">Approved</span>';
                                                break;
                                        }
                                        echo '<tr><th scope="row">' . $value["id"] . '</th><td>' . ucfirst($value["offerwall"]) . '</td><td>' . format_money($value["amount"]) . '</td><td>' . $value["status"] . '</td><td>' . timespan($value["claim_time"], time(), 2) . ' ago</td><td>' . $release . '</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="withdrawals" role="tabpanel" aria-labelledby="withdrawals-tab">
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($withdrawals_history as $value) {
                                        switch ($value['type']) {
                                            case 0:
                                                $value['type'] = '<span class="badge badge-pill badge-info">Pending</span>';
                                                break;
                                            case 1:
                                                $value['type'] = '<span class="badge badge-pill badge-success">Approved</span>';
                                                break;
                                            case 2:
                                                $value['type'] = '<span class="badge badge-pill badge-danger">Denied</span>';
                                                break;
                                        }
                                        echo '<tr><th scope="row">' . $value["id"] . '</th><td>' . $value["type"] . '</td><td>' . format_money($value["amount"]) . '</td><td>' . timespan($value["claim_time"], time(), 2) . ' ago</td></tr>';
                                   
}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>