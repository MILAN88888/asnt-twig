<?php
namespace twigasnt\asnt\Model;

class DashboardModel
{	
    private $_conn;

	public function __construct($conn)
	{
		$this->conn = $conn;	
	}

	public function numseeUserModel()
	{
		$sql = "select * from `user` ";
        $res = mysqli_query($this->conn,$sql);
        $count = mysqli_num_rows($res);
        return $count;   
	}
	public function seeUserModel($start,$per_page)
	{
		$sql = "select * from `user` limit $start,$per_page";
        $res = mysqli_query($this->conn,$sql);
        $count = mysqli_num_rows($res);
        if ($count > 0)
        {   $result = array();
            while ($row = mysqli_fetch_assoc($res))
            {
                array_push($result,$row);
            }
            return $result;
        }
        else
        {
            return false;
        }
	}
	public function numseeDocumentModel()
	{
		$sql = "select * from `document`";
        $res = mysqli_query($this->conn,$sql);
        $count = mysqli_num_rows($res);
        return $count;
	}
	public function seeDocumentModel($docstart,$docper_page)
	{
		$sql = "select * from `document` limit $docstart,$docper_page";
        $res = mysqli_query($this->conn,$sql);
        $count = mysqli_num_rows($res);
        if ($count > 0)
        {   $result = array();
            while ($row = mysqli_fetch_assoc($res))
            {
                array_push($result,$row);
            }
            return $result;
        }
        else
        {
            return false;
        }
	}
	
}

?>