<?php
session_start();
require_once "user_guard.php";
require_once "partials/header5.php";
require_once "classes/payment.php";
$p = new Payment;
$paypay = $p->get_donor_amount();
$id = $_SESSION['DonorID'];
$payid =  $p->get_donor_bypaymentId($id);
?>
<div class="container-fluid ms-0 ps-0 mt-5">
  <div class="row">
    <div class="col-md-3">
      <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;height: 100vh;">
        <?php require_once "partials/menu.php"; ?>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-9 p-4">
      <h1>Make Donation</h1>
      <?php
      if (isset($_SESSION['errormsg'])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['errormsg'] . "</div>";
        unset($_SESSION['errormsg']);
      }
      if (isset($_SESSION['feedback'])) {
        echo "<div class='alert alert-success'>" . $_SESSION['feedback'] . "</div>";
        unset($_SESSION['feedback']);
      }
      ?>
      <form action="process/process_donor_pay.php" method="post">
        <div class="mb-3">
          <label for="">Amount</label>
          <p><?php echo number_format($paypay['donor_amt_amount'], 2); ?></p>
        </div>
        <div class="mb-3">
          <button class="btn btn-dark noround" type="button" onclick="document.location.href='dashboard.php'">Cancel</button>
          <button class="btn btn-danger noround" type="submit" name="btnpay">Continue</button>
        </div>
      </form>
      <div class="purchase-history-section bg-light p-4 rounded shadow-sm mt-4">
        <h4 class="text-primary mb-3">Donations History</h4>
        <table class="table table-bordered table-striped" id="purchaseHistoryTable">
          <thead>
            <tr class="table-dark">
              <th>Sn</th>
              <th>Date & Time</th>
              <th>Payment Method</th>
              <th>Amount Paid</th>
              <th>Payment Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sn = 1;
            foreach ($payid as $pa) { ?>
              <tr>
                <td class="text-center"><?php echo $sn++; ?></td>
                <td><?php echo $pa['payment_recordaddedOn']; ?></td>
                <td><?php echo $pa['payment_method']; ?></td>
                <td><?php echo number_format($pa['payment_amount_paid'], 2); ?></td>
                <td class="<?php echo ($pa['payment_status'] == 'completed') ? 'text-success' : ($pa['payment_status'] == 'pending' ? 'text-muted' : 'text-danger'); ?>">
                  <?php echo ucfirst($pa['payment_status']); ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php require_once "partials/footer.php"; ?>
</body>
</html>
