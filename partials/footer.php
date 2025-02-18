<?php
// session_start();
// require_once "../classes/Newsletter.php";
require_once "classes/Newsletter.php";
?>
<div class="mt-3 pt-4">
  <div class="row">
    <div class="col">
      <div class="row footer" id="footer"> 
          <div class="col-md-4">
            <h5 class="section-title ps-3">About us</h5>
            <ul style="list-style-type: none;">
            <li><a href=""><i class="fa fa-arrow-right"></i>career</a></li>
            <li><a href=""><i class="fa fa-arrow-right"></i> Christian Aid in your nation
            </a></li>
            <li><a href="contact.php"><i class="fa fa-arrow-right"></i> Contact us</a></li>
            <hr>
            <li><a href=""><i class="fa fa-arrow-right"></i> Press & Media</a></li>
            </ul>
          </div> 
          <div class="col-md-2">
          </div> 
          <div class="col-md-6">
            <h5 class="section-title">Receive Updates about our work</h5>
            <?php
                if(isset($_SESSION['errormsg'])){
                  echo "<div class='alert alert-danger'>". $_SESSION['errormsg']."</div>";
                  unset($_SESSION['errormsg']);
                }
                if(isset($_SESSION['feedback'])){
                  echo "<div class='alert alert-success'>". $_SESSION['feedback']."</div>";
                  unset($_SESSION['feedback']);
                }
                ?>
            <form class="row g-3 needs-validation" action="process/process_newsletter.php" method="post">
              <div class="col-md-4 position-relative">
                <label for="validationTooltip01" class="form-label">First name</label>
                <input type="text" class="form-control"  placeholder="First name" name="news_fname">
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4 position-relative">
                <label for="validationTooltip02" class="form-label">Last name</label>
                <input type="text" class="form-control"  placeholder="Last name" name="news_lname">
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4 position-relative">
                  <label for="validationTooltip02" class="form-label">Email Address</label>
                  <input type="text" class="form-control"  placeholder="Email" name="news_email">
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                  <div class="">
                      <button class="btn btn-dark mt-5" name ="btnregister" type="submit">Subscribe</button>
                    </div>
                </div>
                                      </form>
                                    </div> 
                                </div>
                             </div>
                             <div class="col-md-12"style="background-color: black; font-size:25px; color: white;">
                              <p class="text-center">&copy; 2024 Christian Aid organisation. All rights reserved.</p> 
                             </div>
                            </div>
                            </div>
</div>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#purchaseHistoryTable').DataTable({
      "paging": true,  
      "lengthMenu": [5, 10, 25, 50], 
      "ordering": true,
      "searching": true, 
      "info": true 
    });
  });
</script>
</body>
</html>