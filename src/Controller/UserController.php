<?php
namespace twigasnt\asnt\Controller;

class UserController
{
	private $_obj;
	public function __construct($userModel)
	{
		$this->userModel = $userModel;	
	}
	public function loginController($userEmail, $userPass)
	{
		$this->result = $this->userModel->loginModel($userEmail, $userPass);
		if ($this->result != false)
		{  
			session_start();
			$arr = $this->result;
			$_SESSION['user_email'] = $arr[0]['user_email'];
			$_SESSION['user_id'] =  $arr[0]['user_id'];
			$_SESSION['user_name'] = $arr[0]['user_name'];
			$_SESSION['user_email'] = $arr[0]['user_email'];
			header('location:dashboard.php?type=dashboard');
		}
		else
		{	
			header('location:../../index.php?msg=fail');
		}	
				
	}
				
	public function signupController($userName, $userEmail, $userPass, $userPhoneNo, $userCompany)
	{
		$res = $this->userModel->signupModel($userName, $userEmail, $userPass, $userPhoneNo, $userCompany);
		if ( $res == true) {   
			header('location:../../index.php?msgs=success');
		} else {
			header('location:../../index.php?msgs=fail');
		}	
	}
	
	public function LoginValidController($userEmail)
	{
		
		$result = $this->userModel->LoginValidModel($userEmail);
		echo $result;	
	}
	public function DeleteController($userId)
	{	
		$result = $this->userModel->DeleteModel($userId);
		echo $result;		
		
	}
	public function UpdateController($userId, $userName, $userEmail, $userCompany, $userPhone)
	{
		$result = $this->userModel->UpdateModel($userId, $userName, $userEmail, $userCompany, $userPhone);
		echo $result;
	}
	public function UploadDocumentController($filename, $filetmp)
	{
		$destination='../upload/'.$filename;
		move_uploaded_file($filetmp, $destination);
		$result = $this->userModel->UploadDocumentModel($filename);
		return $result;
	}
	public function addNewUserControler($newName,$newEmail,$newPassword,$newCompany,$newPhone)
	{
		$res = $this->userModel->addNewUserModel($newName,$newEmail,$newPassword,$newCompany,$newPhone);
		if($res == true) {
			header('location:dashboard.php?user=user&newadd=ok');
		}
	}
}

?>