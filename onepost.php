<?php
session_start();
require_once "partials/header.php";
require_once "classes/Newsletter.php";
require_once "classes/Post.php";
$id = $_GET['id'];
$po = new Post;
$post = $po->get_postbyId($id);
?>
<div class="container-fluid post_container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (!empty($post['post_image'])) {
                echo "<img src='postuploads/{$post['post_image']}' class='img-fluid responsive-image' alt='Post Image'>";
            }
            ?>
            <div class="blog-content">
                <h4><?php echo htmlspecialchars($post['post_title']); ?></h4>
                <small class="text-muted"> Author: <?php echo htmlspecialchars($post['post_author']); ?></small>
                <p><?php echo nl2br(htmlspecialchars($post['post_description'])); ?></p>
            </div>
        </div>
    </div>
</div>
<div class="col-12 text-end">
    <a href="donate.php">
        <button class="btn btn-outline-danger" type="button">DONATE</button>
    </a>
</div>

<?php
require_once "partials/footer.php";
?>