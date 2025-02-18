
<?php
session_start();
    include_once "partials/header2.php"


?>

<div class="container px-4 py-5" id="featured-3">
        <div class="row g-4 py-5">
            <div class="col-md-10 mx-auto col-lg-8">
                <h2 class="pb-2 text-center mb-3">Register</h2>

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

                <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="process/process_register.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control"  placeholder="Enter  name" name="donorfname">
                        <label>First Name</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input type="text" class="form-control"  placeholder="Enter  name" name="donorlname">
                        <label>Last Name</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com"name="donoremail">
                        <label>Email</label>
                        <span id="mail" class="text-danger"><span>
                      </div>
                  
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="donorpassword">
                    <label >Password</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" placeholder="Confirm password" name="confirmpass">
                    <label >Confirm Password</label>

                    <div class="form-floating mb-3">
                    <input type="text" class="form-control"  placeholder="Confirm password" name="donorphone">
                    <label >Phone No</label>

                  </div>
                  <div class="checkbox mb-3">
                    
                  </div>
                  <button class="w-100 btn btn-lg btn-dark" name ="btnregister" type="submit">Register</button>
                  <hr class="my-4">
                  <small class="text-body-secondary">Already have an account?<a href="login.php"></a> Sign In</small>
                </form>
              </div>
        
        </div>
      </div>

     

<?php
include_once "partials/footer.php";

?>

<script src= "jquery.js">
$(document).ready(function () {
$('#email').change(function () {
           var email = $(this).val().trim();
           if (email == "") {
               $('#mail').html('Please enter an email address.');
               $('.btn-primary').prop("disabled", true);
               return;
           }
           $.ajax({
               type: "GET",
               url: "mailcheck.php",
               data: { email: email },
               dataType: "json",
               beforeSend: function () {
                   $('#mail').html('<span class="text-info">Checking...</span>');
               },
               success: function (response) {
                   if (response.status == "exists") {
                       $('#mail').html('<span class="text-danger">This email is already registered. Please use another email.</span>');
                       $('.btn-primary').prop("disabled", true);
                   } else if (response.status == "available") {
                       $('#mail').html('<span class="text-success">This email is available!</span>');
                       $('.btn-primary').prop("disabled", false);
                   } else {
                       $('#mail').html('<span class="text-warning">Unexpected response. Please try again later.</span>');
                       $('.btn-primary').prop("disabled", true);
                   }
               },
               error: function (xhr, status, error) {
                   $('#mail').html('<span class="text-danger">An error occurred while checking the email. Please try again later.</span>');
                   console.error("AJAX Error: ", error);
               }
           });
       });
});x





</script>
                  
    
