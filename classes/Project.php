<?php
require_once "Db.php";
class Project extends Db
{
    private $dbcon;
    private $limit = 10;
    public function __construct()
    {
        $this->dbcon = $this->connect();
    }
    public function insert_project($name,$description,$amount,$location,$manager,$image)
    { 
        $filename = $image['name'];
        if ($filename != '') {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $newproject = uniqid() . "." . $ext;
            $temp = $image['tmp_name'];
            move_uploaded_file($temp, "../postuploads/$newproject");
            $sql = "INSERT INTO project (ProjectName,ProjectDescription,ProjectAmount,ProjectLocation,ProjectManager,ProjectCoverPicture) VALUES (?, ?, ?, ?,?,?)";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute([$name,$description,$amount,$location,$manager, $newproject]);
        } else {
            $sql = "INSERT INTO project (ProjectName,ProjectDescription,ProjectAmount,ProjectLocation,ProjectManager,ProjectCoverPicture,) VALUES (?, ?, ?, ?,?,?)";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute([$name,$description,$amount,$location,$manager,$image]);
        }
    }
    public function get_projectbyId($id)
    {
        $sql = "SELECT * FROM project WHERE ProjectID = ?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function fetch_project()
    {
        $sql = "SELECT * FROM project";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete_project($id)
    {
        $sql = "DELETE FROM project WHERE ProjectID = ?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$id]);
    }
    // Get total post count
    public function getTotalProject()
    {
        $sql = "SELECT COUNT(*) AS total FROM project";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
    public function getPaginatedProject($page, $limit = 6)
    {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM project LIMIT $limit OFFSET $offset";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPaginationLinks($currentPage, $limit = 6)
    {
        $sql = "SELECT COUNT(*) as total FROM project";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalPosts = $result['total'];
        $totalPages = ceil($totalPosts / $limit);
        if ($totalPages <= 1) {
            return ''; 
        }
        $links = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center mt-4">';
        if ($currentPage > 1) {
            $prevPage = $currentPage - 1;
            $links .= "<li class='page-item'><a class='page-link' href='?page=$prevPage'>&laquo; Prev</a></li>";
        } else {
            $links .= "<li class='page-item disabled'><span class='page-link'>&laquo; Prev</span></li>";
        }
        for ($i = 1; $i <= $totalPages; $i++) {
            $active = ($i == $currentPage) ? 'active' : '';
            $links .= "<li class='page-item $active'><a class='page-link' href='?page=$i'>$i</a></li>";
        }
        if ($currentPage < $totalPages) {
            $nextPage = $currentPage + 1;
            $links .= "<li class='page-item'><a class='page-link' href='?page=$nextPage'>Next &raquo;</a></li>";
        } else {
            $links .= "<li class='page-item disabled'><span class='page-link'>Next &raquo;</span></li>";
        }
        $links .= '</ul></nav>';
        return $links;
    }
}
?>
