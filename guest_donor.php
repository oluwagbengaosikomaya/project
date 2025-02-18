<?php
require_once "classes/Payment1.php";
require_once "partials/admin_header.php";
$dor = new Payment1;
$getguest = $dor->fetch_guest();
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
    <h4 class="text-center"> Guest Donor
      <span><?php echo count($getguest); ?></span>
    </h4>
    <?php if (!empty($getguest)) { ?>
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th>S/N</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Phone</th>
            <th>E-mail</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sn = 1;
          foreach ($getguest as $dor) {
          ?>
            <tr>
              <td><?php echo $sn++; ?></td>
              <td><?php echo $dor["guest_fname"]; ?></td>
              <td><?php echo $dor["guest_lname"]; ?></td>
              <td><?php echo $dor["guest_phoneno"]; ?></td>
              <td><?php echo $dor["guest_email"]; ?></td>
              <td><?php echo $dor["guest_amount"]; ?></td>
              <td><?php echo date("F Y h:i:s", strtotime($dor['created']));?></td>
              <td><a class="btn btn-danger" href="guestdelete.php?guest_id=<?php echo $dor['guest_id'];?>">delete</a></td>             
            </tr>
          <?php 
        $sn ++;} ?>
        </tbody>
      </table>
    <?php } ?>
  </div>
  <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>