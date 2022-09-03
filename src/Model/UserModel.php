<?php
namespace twigasnt\asnt\Model;



class UserModel
{	
    private $_conn;
	public function __construct(object $conn)
	{
		$this->_conn = $conn;	
	}
	public function loginModel(string $userEmail, string $userPass)
	{
		$sql = "select * from `user` where user_email = ? and user_password = ?";
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("ss", $userEmail, $userPass);
        $stmt->execute();
        $res= $stmt->get_result();
        if ($res->num_rows > 0) {
            $result = array();
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($result,$row);
            }
            return $result;
        } else {
            return false;
        }
	}
	public function signupModel(string $userName, string $userEmail, string $userPass, string $userPhoneNo, string $userCompany):bool
	{
		$sql = 'INSERT INTO user (`user_name`,user_email,`user_password`,user_phone_no,`user_company`) values (?, ?, ?, ?, ?)';
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("sssss", $userName, $userEmail, $userPass, $userPhoneNo, $userCompany);
        $res = $stmt->execute();
        if($res) {
            return true;
        } else {
            return false;
        }
	}

	public function loginValidModel(string $userEmail): bool
	{
		$sql = "select * from `user` where user_email = ?";
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("s",$userEmail);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res->num_rows > 0) {   
            return true;
        } else {
            return false;
        }
	}

	public function deleteModel(int $userId): bool
	{
		$sql = "delete from `user` where user_id= ?";
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("i",$userId);
        $res = $stmt->execute();
        if ($res) {   
            return true;
        } else {
            return false;
        }
	}

	public function updateModel(int $userId, string $userName, string $userEmail, string $userCompany,string $userPhone): bool
	{
		$sql = "UPDATE user SET `user_name` = ?, user_email = ?, user_company = ?, user_phone_no = ?  WHERE user_id = ?";
		$stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("ssssi",$userName, $userEmail, $userCompany, $userPhone,$userId);
        $res = $stmt->execute();
        if ($res) {   
            return true;
        } else {
            return false;
        }
	}

	public function uploadDocumentModel(string $uploadFile): bool
	{
		$sql = 'INSERT INTO document (document_name) values (?)';
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("s",$uploadFile);
        $stmt->execute();
        return true;
	}

    public function addNewUserModel(string $newName, string $newEmail, string $newPassword, string $newCompany, string $newPhone)
    {
        $sql = 'INSERT INTO user (`user_name`,user_email,`user_password`,user_phone_no,`user_company`) values (?, ?, ?, ?, ?)';
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("sssss", $newName, $newEmail, $newPassword, $newPhone, $newCompany);
        $res = $stmt->execute();
        if($res) {
            return true;
        } else {
            return false;
        }
    }
}

?>