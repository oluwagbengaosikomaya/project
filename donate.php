<?php
session_start();

  require_once "partials/header2.php";
  require_once "classes/Payment1.php";

//   echo"<pre>";
// print_r($amt);
// echo"</pre>";



?>
    

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="animate.min.css"/>
    <link rel="icon" type="image/png" sizes="32x32" href="images/recipe/favicon.png">
    <title>Donate</title>
</head>
<body>

    
                    <div class="row">
                        <div class="col-md">
                        <h1 style="font-size: 40px; text-align: center; padding-top: 20px; margin-top: 30px;">DONATE NOW</h1>
                        <br>

                        <h5>There are many ways to support the work of Christian Aid with a donation:</h5>
                        <ol type="1">
                            <li>
                              Scholarship Fund: This fund is to help small NGOs from the least developed countries to attend Christian Aid conferences.
                            </li>
                        <li>
                            Awards Fund: This fund is used to support the Christian Aid Awards Program, which annually honors excellence and innovation among NGOs in several categories.
                        </li>
                            

                        <li>
                        Code of Ethics Initiative: Support the ongoing development of the Code of Ethics Initiative, including the creation of an online self-certification course, to promote integrity and ethical behavior in the charitable, nonprofit realm.
                        </li>
                            

                        <li>
                        Founders International Fund: This endowment is used to provide grants in support of activities of small but effective NGOs internationally.
                        </li>
                            

                        <li>
                        Capacity Building Program: Support the development of capacity building trainings and new resources and tools for NGOs to strengthen their capacity to deliver on their mission and sustainably serve their communities.
                        </li>

                        <li>
                        Support Christian Aid: Christian Aid uses this fund to expand its programs, continuously improve its online platform, and build its worldwide membership.
                        </li>
               
                        </ol>


                        <p>The Christian organization is a duly registered 501 (c)(3) tax-exempt organization and all donations are tax-deductible.</p>

                        <p>

                            To donate online, simply follow the directions on this page.

                        </p>
                        <hr>
                        </div>
                    </div>


    <div class="donate">
        <div class="row">
            <div class="col-md">



            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="process/process_donate.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control"  placeholder="Enter  name" name="guest_fname">
                   
                        <label>First Name</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input type="text" class="form-control"  placeholder="Enter  name" name="guest_lname">
                       
                        <label>Last Name</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com"name="guest_email">
                      
                        <label>Email</label>
                      </div>
                  
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control"  placeholder="Phone No" name="guest_phoneno">
                  
                    <label >Phone No</label>

                  </div>

                  <div class="form-floating mb-3">
                    <input type="number" class="form-control"  placeholder="amount" name="guest_amount">
                  
                    <label >Amount</label>

                  </div>
                 
                  <button class="w-50 btn btn-lg btn-danger" name ="btnsub" type="submit">DONATE</button>
            
                </form>


            </div>
        </div>
    </div>



</body>
</html>