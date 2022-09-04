<?php
/**
 * DashboardModel that controls  database related function.
 *
 * PHP version 8.1.3
 *
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
namespace twigasnt\asnt\Model;

/**
 * DashboardModel class handle Dashboard method
 * 
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class DashboardModel
{
    public $conn;

     /**
      * Constructor for the Dashboard Model.
      * 
      * @param $conn is the object for database connection.
      */
    public function __construct($conn)
    {
        $this->conn = $conn;    
    }

    /**
     * Function to get number of all users.
     * 
     * @return return $count number of user.
     */
    public function numseeUserModel(): int
    {
        $sql = "select * from `user` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->get_result();
        $count = $result->num_rows;
        return $count;   
    }

     /**
      * SeeUserModel function that give  user list.
      * 
      * @param $start    start point for pagination.
      * @param $per_page per page user count.
      * 
      * @return return $result array of users.
      */
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

    /**
     * Function to get number of all documents.
     * 
     * @return return $count number of document.
     */
    public function numseeDocumentModel(): int
    {
        $sql = "select * from `document`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->get_result();
        $count = $result->num_rows;
        return $count; 
    }

    /**
     * SeeDocumentController function that displays the documents.
     * 
     * @param $docstart    start point for pagination.
     * @param $docper_page per page document count.
     * 
     * @return return $result array of document.
     */
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
