<?php
session_start();
require_once "partials/header.php";
require_once "classes/Newsletter.php";
require_once "classes/Post.php";
$po = new Post;
$posts = $po->fetch_post();
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$posts = $po->getPaginatedPosts($page);
$paginationLinks = $po->getPaginationLinks($page);

//   echo "<pre>";
//   print_r($posts);
//   echo "</pre>";die();
?>
<div class="container">
    <div class="row">
        <div class="col-md">
            <video src="videos/people.mp4" ; width="100%" ; height="me-auto" ; type="video/mp4" ; autoplay muted></video>
        </div>
    </div>
</div>
<div class="">
    <div class="row">
        <div class="col-md mt-5 pb-4">
            <h1 style="text-align: center; padding:40px;">Christian Aid exists to create a world where everyone can live a full life, free from poverty.</h1>
        </div>
    </div>
</div>
<div class="row g-4">
<?php if (!empty($posts)) { ?>
    <?php foreach ($posts as $po) { ?>
        <div class="col-md-4">
            <div class="p-3 d-flex flex-column justify-content-between" style="font-size:18px; box-shadow:5px 4px 7px black; height:600px;">
                <?php
                if (!empty($po['post_image'])) {
                    echo "<img src='postuploads/{$po['post_image']}' class='img-fluid post_image' alt='Post Image' style='max-height:300px; width: 100%; object-fit: cover;'>";
                }
                ?>
                <div class="flex-grow-1">
                    <h3 style="padding-top:10px; color: red;"><?php echo $po["post_title"]; ?></h3>
                    <p class="text-muted"><?php echo $po["post_author"]; ?></p>
                    <p style="overflow: hidden; max-height: 90px;"><?php echo substr($po['post_description'], 0, 100) . "..." ?></p>
                </div>
                <a href="onepost.php?id=<?php echo $po['post_id']; ?>" class="btn btn-outline-danger">Read More</a>
            </div>
        </div>
    <?php } ?>
    <?php
                } else { ?>
                    <div class="alert alert-info text-center adjust">
                        We are yet to publish any post, please check back later.
                    </div>
                <?php  }
                ?>
</div>
<?php echo $paginationLinks; ?>

<div class="" id="pad">
    <div class="row">
        <div class="col-md-6 padding-top:30px;">
            <h2>Secretary, Boluwatife Korede.</h2>
            <br>
            <br>
            <p style="font-size: 20px;">The Labour party made a promise during the recent Nigerian general election that it would 'create a world free from poverty on a liveable planet'.
                Climate activist Vanessa Nakate has written an open letter to the Nigerian Foreign Secretary, Beatrice Dammy, reminding her of Labour's promise and imploring that they keep it.
                Add your name to Vanessa's message, now. Ask the new Nigerian government to 'keep their promise to the global world'.</p>
            <br>
            <br>
            <div class="row">
                <div class="d-grid gap-2 col-md-6 mx-auto">
                    <a href="register.php"><button class="btn btn-dark" type="button">Sign Up Now</button></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="images/girl.png" alt="num" width="">
        </div>
    </div>
</div>
<div id="con">
    <div class="row">
        <div class="col">
            <h2 style="color: white;">Donate to Christian Aid</h2>
            <p style="color: white;">We'll use your donations to help families around the world to overcome poverty and injustice, wherever the need is greatest.</p>
        </div>
        <div class="col-md-4">
            <a href="donate.php"><button class="btn btn-light" type="button">DONATE</button>
            </a>
        </div>
    </div>
</div>
<?php
require_once "partials/footer.php";
?>