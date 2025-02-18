<?php

require_once "partials/header4.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="ico/icofont.css">
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" href="animate.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">

    <title>Contact Us.</title>

    <style>
        .contact{
            border: px solid gray;
            width:100%;
            min-height: 50%;
            background-color: solid gray;
            box-sizing: 3px;
            font-size: 30px;
        }
    </style>
</head>
<body>

<div class="div">
    <div class="row">
        <div class="col-md-6">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.193004658477!2d3.3367331737072172!3d6.497232393494916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8c1de1d7f21b%3A0x7863ad31d375cd29!2s61%20Shaki%20Crescent%2C%20Animashaun%2C%20Lagos%20101241%2C%20Lagos!5e0!3m2!1sen!2sng!4v1736385106746!5m2!1sen!2sng" width="600" height="450" style="border:0;margin-top:30px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-md-6 shadow p-3 mb-5 bg-body rounded">

        <h4 style= "color: red;padding:30px;">CONTACT US.</h4>

            <h2 style="font-size:50px;padding:10px;">Get In Touch</h2>
            <p style="font-size:20px;margin:20px;">The Network is charged with the objective of identifying, registering, coordinating, building capacity and mobilizing civil society organizations to promote interconnectivity and bring equity, justice, peace and development to grassroots communities throughout Nigeria, including the implementation of the SDGs.</p>
            <br>
            <br>

            <div class="row">
                <div class="col">
                    <h4 style="color: green;">Visit Us: 15 Ramat Crescent, Ogudu GRA, Lagos, Nlgeria. Plot 3 Sobanjo avenue, Idi-ishin Jericho Lagos,Nigeria</h4>
                <br>
               <h4 style="color: green;">Mail us: moat@moat.org</h4>
               <br>
               <h4 style="color: green;"> Call us : +2349069460000, +2348065211111 </h4>
        </div>
            </div>

            

            
           
                    
        </div>
    </div>
</div>
    
<div class="contact">
    <div class="row">
        <div class="col pt-5 mt-3 shadow-sm p-3 mb-5 bg-body rounded" >
            <h3 style="font-size:40px;">Contact Us Today</h3>
            <span style="color: red;">Your email address will not be published. Required fields are marked *</span>
        </div>
    </div>
</div>

<form action="process/process_contact.php" method="post" style="border: 0px solid red; font-size:larger" class="shadow p-3 mb-5 bg-body rounded">

<div class="mb-3 col-4 pt-5 mt-5 ">
  <label for="" class="form-label">Name</label>
  <input type="Text" class="form-control" id="exampleFormControlInput1" name="fullname" placeholder="Your Name*">
</div>


<div class="mb-3 col-4">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name="email"placeholder="Yourid@gmail.com*">
</div>

<div class="mb-3 col-4">
  <label for="" class="form-label">Subject</label>
  <input type="Text" class="form-control" id="exampleFormControlInput1" name="subject" placeholder="The title of your message*">
</div>

<div class="mb-3 col-4">
  <label for="exampleFormControlTextarea1" class="form-label">Message</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="message"rows="3">Type Your message here*</textarea>
</div>
<button class="btn btn-primary"  name="sub" type="submit">Send message</button>
</form>




<?php

require_once "partials/footer.php";
?>
</body>
</html>