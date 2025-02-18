<?php
session_start();
  require_once "partials/header.php";
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
  <title>GetInvolve</title>
</head>
<body>

<div class="container">
        <div class="row">
         <div class="col-md">
                <img src="images/christ.jpg" alt="christ" sizes="" srcset="">   
         </div>
        </div>
        </div>

     


<div class="row justify-content-center px-3 py-5">
            <div class="col-12 text-center mb-4">
                <h3 class="head_two">PROGRAMMES</h3>
                <p class="text-muted col-lg-6 mx-auto">
                In order to fulfill its vision, mission and objectives, MOAT works through 4 core departments, with each coordinating MOAT programmes and activities under the supervision of a Programmes Coordinator.
                </p>
            </div>
            <div class="col-lg-5 mb-4">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa-solid fa-question-circle me-2 blue"></i> Finance and Administrative Department
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            The Finance and Administrative Department takes care of the administrative and financial processes of the network.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fa-solid fa-question-circle me-2 blue"></i> Communication, Advocacy and Campaigns Department
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            Our communication, advocacy and campaigns department takes care of MOAT communications with its members and the civil society family through the media e.g. website, blog, listserves, print and electronic media. Various campaigns and advocacy work that the network is involved in such as the MDGs, Freedom of Information, Global Call to Action against Poverty, Coalition for Issue Based Politics and Good Governance and the Reform of International Institutions are also managed by this department.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="fa-solid fa-question-circle me-2 blue"></i> Membership Department
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            The membership department of the network is responsible for managing enquiries on membership, recruiting, maintaining and retaining individual and organizational membership of the network, the department also coordinates MOAT network dialogues, training and membership of international organizations such as Civicus, Affinity Group of National Associations and the International Council on Social Welfare(ICSW). This department also manages MOAT partnerships such as that with the Axum Institute, Wales Council for Voluntary Action (WCVA) and National Council for Voluntary Organizations in the UK.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <i class="fa-solid fa-question-circle me-2 blue"></i> Policy and Research 
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            MOAT Policy and Research department works to influence policy in a wide range of subject areas by identifying and representing the views of the civil society sector in Nigeria providing up to date and useful information for the third sector in Nigeria, enabling organizations to put the case for development issues effectively.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
  
<?php

  require_once "partials/footer.php";
?>
<script src="jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>

</body>
</html>