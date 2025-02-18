<?php
session_start();
require_once "classes/Post.php";
$po = new Post;
$posts = $po->fetch_post();
require_once "partials/header2.php";
?>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar vh-100 p-3">
            <?php require_once "partials/admin_menu.php"; ?>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            <?php
            if (isset($_SESSION['errormsg'])) {
                echo "<div class='alert alert-danger'>{$_SESSION['errormsg']}</div>";
                unset($_SESSION['errormsg']);
            }
            if (isset($_SESSION['feedback'])) {
                echo "<div class='alert alert-success'>{$_SESSION['feedback']}</div>";
                unset($_SESSION['feedback']);
            }
            ?>
            <h3 class="text-center mb-4"> Posts <span class="badge bg-primary"><?php echo count($posts); ?></span></h3>

            <?php if (!empty($posts)) { ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark text-white">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sn = 1;
                            foreach ($posts as $po) { ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo htmlspecialchars($po['post_title']); ?></td>
                                    <td><?php echo htmlspecialchars($po['post_author']); ?></td>
                                    <td>
                                        <a href="deletepost.php?id=<?php echo $po['post_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="alert alert-info text-center">No Posts yet.</div>
            <?php } ?>
        </main>
    </div>
</div>

<?php require_once "partials/footer.php"; ?>
</body>
</html>
