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
    <title>CHRISTIAN AID ORGANISATION</title>

 <style>
    #head{

height:0px;
border:0px solid black;
width: 100%;

}

#donate{

    position: relative;
    left: 50px;
}

.nav-item{

display: inline-block;
padding: 15px;

}
#pad{

    padding-top: 100px;
    margin-right: 50px;
    margin-bottom: 80px;
}

#con{
/* width: 100%; */
min-height: auto;
background-color: rgb(253, 45, 45);
padding-top: 60px;
padding-bottom: 60px;
/* margin-left: 20px;
margin-left: 10px; */

}
.post_image {
            max-width: 100%;
            height: auto;
            object-fit: contain;
            display: block;
            margin: auto;
        }
        .post_container {
            margin-top: 50px;
            max-width: 1200px;
        }
 </style>
</head>


<body>

<div class="container-fluid" id="head" >

    
      
      <nav class="navbar col-md" style="background-color: black;">

        <nav class="navbar navbar-light-md  justify-content-between">
          <img src="images/download.jpeg" alt="download" width="150px" srcset="">
            <a class="navbar-brand" style="color:#3cff00; font-size: 25px;padding: 20px;">CHRISTIAN AID ORGANISATION</a>
            
            <ul class="navbar-nav  me-auto my-2 my-lg-0" style="--bs-scroll-height: 50px; display :block;">
                

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href='index.php'>Home</a>
                </li>
                
               

                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href='getinvolve.php'>Get-Involved</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href='userproject.php'>Projects</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href='contact.php'>Contact Us</a>
                  </li>      

              </ul>

              <button class="btn btn-outline-success" type="button" id="admin"><a class="nav-link" href="adminlogin.php">ADMIN</a></button>

          
              &nbsp  &nbsp  &nbsp
              <div class="d-flex" role="search">

              <?php
              if(isset($_SESSION['admin_id'])){
                ?>
              
              <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>


                <?php
              }else{
                ?>

                <!-- <a href="login.php" class="btn btn-primary btn-sm" type="submit">Login</a> -->


                <?php
              }
              ?>
              </div>
          </nav>

      </nav>
   
		
       