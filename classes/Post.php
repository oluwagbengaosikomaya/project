<?php
require_once "Db.php";
class Post extends Db
{
    private $dbcon;
    private $limit = 6; // Number of posts per page
    public function __construct()
    {
        $this->dbcon = $this->connect();
    }
    public function insert_post($title, $author, $description, $image)
    { 
        $filename = $image['name'];
        if ($filename != '') {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $newname = uniqid() . "." . $ext;
            $temp = $image['tmp_name'];
            move_uploaded_file($temp, "../postuploads/$newname");
            $sql = "INSERT INTO post (post_title, post_author, post_description, post_image) VALUES (?, ?, ?, ?)";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute([$title, $author, $description, $newname]);
        } else {
            $sql = "INSERT INTO post (post_title, post_author, post_description) VALUES (?, ?, ?)";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute([$title, $author, $description]);
        }
    }
    public function get_postbyId($id)
    {
        $sql = "SELECT * FROM post WHERE post_id = ?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function fetch_post()
    {
        $sql = "SELECT * FROM post";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete_post($id)
    {
        $sql = "DELETE FROM post WHERE post_id = ?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$id]);
    }
    // Get total post count
    public function getTotalPosts()
    {
        $sql = "SELECT COUNT(*) AS total FROM post";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
    public function getPaginatedPosts($page, $limit = 6)
    {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM post LIMIT $limit OFFSET $offset";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPaginationLinks($currentPage, $limit = 6)
    {
        $sql = "SELECT COUNT(*) as total FROM post";
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
