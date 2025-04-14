
<?php
session_start();
require_once "partials/header3.php";
require_once "classes/Project.php";
$po = new Project;
$pro = $po->fetch_project();
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$posts = $po->getPaginatedProject($page);
$paginationLinks = $po->getPaginationLinks($page);


?>
<head>
    <style>
       h1 {
            color: #333;
            border-bottom: 1px solid #eee;
            padding-top: 30px;
            text-align: center;  
              }
    </style>
</head>

<!-- User  Section -->
<div class="container">
                    <h1>Make a Donation to A Project.</h1>
        
        <div class="donation-form">
            <form id="donationForm">
                <div class="form-group">              
<select class="form-select" name="project" id="project" required>
    <option value=""> -- Select a project -- </option>
    <?php
        foreach ($pro as $po) { 
    ?>                     
        <option value="<?php echo htmlspecialchars($po['ProjectID']); ?>"><?php echo htmlspecialchars($po['ProjectName']); ?></option>
    <?php } ?>
</select>
 
</div>
                

<br>

<br>

<br>

<br>

<br>



<div class="row g-4">
<?php if (!empty($posts)) { ?>
    <?php foreach ($posts as $po) { ?>
        <div class="col-md-4">
            <div class="p-3 d-flex flex-column justify-content-between" style="font-size:18px; box-shadow:5px 4px 7px black; height:600px;">
                <?php
                if (!empty($po['ProjectCoverPicture'])) {
                    echo "<img src='postuploads/{$po['ProjectCoverPicture']}' class='img-fluid post_image' alt='Post Image' style='max-height:300px; width: 100%; object-fit: cover;'>";
                }
                ?>
                <div class="flex-grow-1">
                    <h3 style="padding-top:10px; color: red;"><?php echo $po["ProjectName"]; ?></h3>
                    <p class="text-muted"><?php echo $po["ProjectName"]; ?></p>
                    <p style="overflow: hidden; max-height: 90px;"><?php echo substr($po['ProjectDescription'], 0, 100) . "..." ?></p>
                </div>
                <a href="postproject.php?id=<?php echo $po['ProjectID']; ?>" class="btn btn-outline-danger">Read More</a>
            </div>
        </div>
    <?php } ?>
    <?php
                } else { ?>
                    <div class="alert alert-info text-center adjust">
                        We are yet to publish a Project, please check back later.
                    </div>
                <?php  }
                ?>
</div>
<?php echo $paginationLinks; ?>






    
    

