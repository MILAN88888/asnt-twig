<?php
namespace twigasnt\asnt\Model;

class DashboardModel
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;    
    }

    public function numseeUserModel(): int
    {
        $sql = "select * from `user` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->get_result();
        $count = $result->num_rows;
        return $count;   
    }

    public function seeUserModel(int $start, int $per_page): array
    {
        $sql = "select * from `user` limit ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $start, $per_page);
        $stmt->execute();
        $res = $stmt->get_result();
        $count = $res->num_rows;
        if ($count > 0) {
            $result = array();
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($result, $row);
            }
            return $result;
        }
        
    }
    public function numseeDocumentModel(): int
    {
        $sql = "select * from `document`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->get_result();
        $count = $result->num_rows;
        return $count; 
    }
    public function seeDocumentModel(int $docstart, int $docper_page): array
    {
        $sql = "select * from `document` limit ?,?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $docstart, $docper_page);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res->num_rows > 0) {
            $result = array();
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($result, $row);
            }
            return $result;
        }
    }
    
}

?>
