<?php
session_start();
require_once "classes/Project.php";
$pro = new Project;
$project = $pro->fetch_project();
require_once "partials/headeradmin.php";
require_once "admin_guard.php";
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
            <h3 class="text-center mb-4"> Project <span class="badge bg-primary"><?php echo count($project); ?></span></h3>

            <?php if (!empty($project)) { ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="projectsTable">
                        <thead class="table-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Project Name</th>
                             <th>ProjectCoverPicture</th>
                         <th>ProjectDescription</th>
                         <th>ProjectAmount</th>
                         <th>ProjectLocation</th>
                         <th>ProjectManager</th>
                         <th>ProjectDateAdded</th>
                         <th>Action</th>
 
                </tr>
                        </thead>
                        <tbody>
                            <?php $sn = 1;
                            foreach ($project as $po) { ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo htmlspecialchars($po['ProjectName']); ?></td>
                                    <td><?php echo htmlspecialchars($po['ProjectCoverPicture']); ?></td>
                                    <td><?php echo htmlspecialchars($po['ProjectDescription']); ?></td>
                                    <td><?php echo htmlspecialchars($po['ProjectAmount']); ?></td>
                                    <td><?php echo htmlspecialchars($po['ProjectLocation']); ?></td>
                                    <td><?php echo htmlspecialchars($po['ProjectManager']); ?></td>
                                    <td><?php echo htmlspecialchars($po['ProjectDateAdded']); ?></td>
                                    <!-- <td><a class="btn btn-danger" href="deleteproject.php?ProjectID=<?php echo $po['ProjectID'];?>">delete</a></td>  -->

                        
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
