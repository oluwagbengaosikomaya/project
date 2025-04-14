<?php
session_start();
require_once "partials/header.php";
require_once "classes/Newsletter.php";
require_once "classes/Project.php";
$id = $_GET['id'];
$po = new Project;
$post = $po->get_projectbyId($id);
?>
<div class="container-fluid post_container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (!empty($post['ProjectCoverPicture'])) {
                echo "<img src='postuploads/{$post['ProjectCoverPicture']}' class='img-fluid responsive-image' alt='Project Image'>";
            }
            ?>
            <div class="blog-content">
                <h4><?php echo htmlspecialchars($post['ProjectName']); ?></h4>
                <h2 class="text-muted"> Amount:₦ <?php echo htmlspecialchars($post['ProjectAmount']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($post['ProjectDescription'])); ?></p>
                <p><?php echo nl2br(htmlspecialchars($post['ProjectLocation'])); ?></p>
            </div>
        </div>
    </div>
</div>
<div class="col-12 text-end">
    <a href="donate.php">
        <button class="btn btn-outline-primary" type="button">DONATE</button>
    </a>
</div>

<?php
require_once "partials/footer.php";
?>