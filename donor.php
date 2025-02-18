<?php
session_start();
require_once "classes/Donation.php";
require_once "partials/admin_header.php";
$dor = new Donation;
$getdonor = $dor->fetch_donor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donor</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div id="main-content">
    <h4 class="text-center"> registered Donor
      <span><?php echo count($getdonor); ?></span>
    </h4>
    <?php if (!empty($getdonor)) { ?>
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th>S/N</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Address</th>
            <th>Phone</th>
            <th>E-mail</th>
            <th>Date</th>
            <th>Status</th>
            <!-- <th colspan="2" class="text-center">Status</th>
            <th class="text-center">Action</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
          $sn = 1;
          foreach ($getdonor as $dor) {
          ?>
            <tr>
              <td><?php echo $sn++; ?></td>
              <td><?php echo $dor["donor_fname"]; ?></td>
              <td><?php echo $dor["donor_lname"]; ?></td>
              <td><?php echo $dor["donor_address"]; ?></td>
              <td><?php echo $dor["donor_phoneno"]; ?></td>
              <td><?php echo $dor["donor_email"]; ?></td>
              <td><?php echo date("F Y h:i:s", strtotime($dor['Date Registered']));?></td>
              <td>
                    <form action="process/process_status.php" method="post" class="d-flex align-items-center">
                      <select name="status" id="status" class="form-select me-2">
                        <option value="">Donor's Status</option>
                        <option value="Active" <?php echo $dor["donor_status"] == 'Active' ? 'selected' : ''; ?>>Active</option>
                        <option value="Inactive" <?php echo $dor["donor_status"] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                      </select>
                      <input type="hidden" name="stat" value="<?php echo $dor['DonorID']; ?>">
                      <button class="btn btn-primary btn-sm" name="update">Confirm</button>
                      <input type="hidden" name="del" value="<?php echo $dor['DonorID']; ?>">
                      <button class="btn btn-danger btn-sm" name="updel">Delete</button>
                    </form>
                  </td>
            </tr>
          <?php 
        $sn ++;} 
        ?>
        </tbody>
      </table>
    <?php
    }
  ?>
  </div>
  <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>