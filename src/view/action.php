<?php
require '../../vendor/autoload.php';

$db = new twigasnt\asnt\Config\db();
$conn = $db->getConnection();

$dashboardModel = new \twigasnt\asnt\Model\DashboardModel($conn);
$userModel = new \twigasnt\asnt\Model\UserModel($conn);

$userController = new \twigasnt\asnt\Controller\UserController($userModel);
$dashboardController = new \twigasnt\asnt\Controller\DashboardController($dashboardModel);

// if (isset($_GET['type']) && $_GET['type'] != '')
// {	
// 	$val = $_GET['type'];
// 	$method= $val.'Controller';
// 	$userController->$method();
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $userEmail = $_POST['email'];
        $userPass = $_POST['pass'];
        $userController->loginController($userEmail, $userPass);
    }
    if (isset($_POST['signup'])) {
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $userPass = $_POST['pass'];
        $userPhoneNo = $_POST['phone_no'];
        $userCompany = $_POST['company'];
        $userController->signupController($userName, $userEmail, $userPass, $userPhoneNo, $userCompany);
    }
}

?>