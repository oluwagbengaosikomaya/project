<?php
session_start();
require_once "partials/header2.php";
?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar vh-100 p-3">
            <?php require_once "partials/admin_menu.php"; ?>
            <hr>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            <h1 class="mb-4">Profile</h1>
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
            <div class="card shadow p-4">
                <h4 class="mb-3">Create a New Post</h4>
                <form action="process/process_createpost.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Post Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control border-dark" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Post Author <span class="text-danger">*</span></label>
                        <input type="text" name="author" class="form-control border-dark" id="author">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Post Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control border-dark" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Post Image <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control border-dark" id="image">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="btncreate" class="btn btn-success">Create Post</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
<?php require_once "partials/footer.php"; ?>
</body>
</html>
