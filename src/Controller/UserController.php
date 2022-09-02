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
			// session_start();
			// $arr = $this->result;
			// $_SESSION['user_email'] = $arr[0]['user_email'];
			// $_SESSION['user_id'] =  $arr[0]['user_id'];
			// $_SESSION['user_name'] = $arr[0]['user_name'];
			// $_SESSION['user_email'] = $arr[0]['user_email'];
			header('location:dashboard.php');
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
	
	public function LoginValidController()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST)) {	
				$userEmail = $_POST['email'];
				$result = $this->userModel->LoginValidModel($userEmail);
				echo $result;
			}
			
		}
	}
	public function DeleteController()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST)) {	
				$userId = $_POST['id'];
				$result = $this->userModel->DeleteModel($userId);
				echo $result;
			}
			
		}
	}
	public function UpdateController()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST)) {	
				$userId = $_POST['id'];
				$userName = $_POST['name'];
				$userEmail = $_POST['email'];
				$userCompany = $_POST['company'];
				$userPhone = $_POST['phone'];
				$result = $this->userModel->UpdateModel($userId, $userName, $userEmail, $userCompany, $userPhone);
				echo $result;
			}
			
		}
	}
	public function UploadDocumentController()
	{
		if (isset($_POST)) {	
			$filename = isset($_FILES['document']['name']) ? $_FILES['document']['name'] : null;
			$filetmp =isset($_FILES['document']['tmp_name']) ? $_FILES['document']['tmp_name'] : null;
			$destination='../upload/'.$filename;
			move_uploaded_file($filetmp, $destination);
			$result = $this->userModel->UploadDocumentModel($filename);
			if ($result == true) {	
				header('location:dashboard.php?type=success');
			}
		}
	}
}
// if (isset($_GET['type']) && $_GET['type'] != '')
// {	$obj1 = new UserController();
// 	$val = $_GET['type'];
// 	$method= $val.'Controller';
// 	$obj1->$method();
// }
?>