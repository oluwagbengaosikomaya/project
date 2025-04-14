<?php
session_start();
require_once "partials/headeradmin.php";
require_once "admin_guard.php";
?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar vh-100 p-3">
            <?php require_once "partials/admin_menu.php"; ?>
            <hr>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            <h1 class="mb-4">Admin Project Management</h1>
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
                <h4 class="mb-3">Add New Project</h4>
                <form action="process/process_createproject.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Project Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control border-dark" id="name">
                    </div>
                  
                    <div class="mb-3">
                        <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control border-dark" rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label">Target Amount <span class="text-danger">*</span></label>
                        <input type="text" name="amount" class="form-control border-dark" id="amount">
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                        <input type="text" name="location" class="form-control border-dark" id="location">
                    </div>

                    <div class="mb-3">  
                        <label for="Manager" class="form-label">Project Manager <span class="text-danger">*</span></label>
                        <input type="text" name="manager" id="Manager" class="form-control border-dark" min="1" required>
                    </div>


                <div class="mb-3">
                    <label for="startDate" class="form-label">Start Date<span class="text-danger"></span></label>
                    <input type="date" id="startDate"class="form-control border-dark">
                </div>
                
                <div class="mb-3">
                    <label for="EndDate" class="form-label">End Date<span class="text-danger"></span></label>
                    <input type="date" id="endDate"class="form-control border-dark">
                </div>


                    <div class="mb-3">
                        <label for="image" class="form-label">Project Image <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control border-dark" id="image">
                    </div>

                    <!-- <div class="mb-3">
                    <label for="projectStatus">Status<span class="text-danger">*</span></label>
                    <select id="projectStatus" required>
                        <option value="active">Active</option>
                        <option value="planning">Planning</option>
                        <option value="completed">Completed</option>
                        <option value="on-hold">On Hold</option>
                    </select>
                </div> -->
                    <div class="mb-3">
                        <button type="submit" name="btnproject" class="btn btn-success">Add Project</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
       

<?php require_once "partials/footer.php"; ?>
</body>
</html>
