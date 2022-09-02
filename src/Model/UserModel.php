<?php
namespace twigasnt\asnt\Model;



class UserModel
{	private $_conn;
	public function __construct(object $conn)
	{
		$this->conn = $conn;	
	}
	public function loginModel($userEmail,$userPass)
	{
		$sql = "select * from `user` where user_email='$userEmail' and user_password='$userPass'";
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
	public function signupModel($userName,$userEmail,$userPass,$userPhoneNo,$userCompany)
	{
		$sql = 'INSERT INTO user (user_name,user_email,`user_password`,user_phone_no,`user_company`) values ("'.$userName.'", "'.$userEmail.'","'.$userPass.'","'.$userPhoneNo.'","'.$userCompany.'")';
        $res = mysqli_query($this->conn,$sql);
        if($res)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
	public function LoginValidModel($userEmail)
	{
		$sql = "select * from `user` where user_email='$userEmail'";
        $res = mysqli_query($this->conn,$sql);
        $count = mysqli_num_rows($res);
        if ($count > 0)
        {   
            return true;
        }
        else
        {
            return false;
        }
	}
	public function DeleteModel($userId)
	{
		$sql = "delete from `user` where user_id='$userId'";
        $res = mysqli_query($this->conn,$sql);
        if ($res)
        {   
            return true;
        }
        else
        {
            return false;
        }
	}
	public function UpdateModel($userId,$userName,$userEmail,$userCompany,$userPhone)
	{
		$sql = "UPDATE user SET user_name = '$userName', user_email = '$userEmail', user_company ='$userCompany', user_phone_no ='$userPhone'  WHERE user_id = '$userId'";
		$res = mysqli_query($this->conn,$sql);
        if ($res)
        {   
            return true;
        }
        else
        {
            return false;
        }
	}
	public function UploadDocumentModel($uploadFile)
	{
		$sql = 'INSERT INTO document (document_name) values ("'.$uploadFile.'")';
        $res = mysqli_query($this->conn,$sql);
        return true;
        
  
	}
}

?>