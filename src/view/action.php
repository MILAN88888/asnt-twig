<?php
require '../../vendor/autoload.php';

$db = new twigasnt\asnt\Config\db();
$conn = $db->getConnection();

$dashboardModel = new \twigasnt\asnt\Model\DashboardModel($conn);
$userModel = new \twigasnt\asnt\Model\UserModel($conn);

$userController = new \twigasnt\asnt\Controller\UserController($userModel);
$dashboardController = new \twigasnt\asnt\Controller\DashboardController($dashboardModel);

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
    if(isset($_POST['addnewuser'])){
        $newName = $_POST['newname'];
        $newEmail = $_POST['newemail'];
        $newPassword = $_POST['newpassword'];
        $newCompany = $_POST['newcompany'];
        $newPhone = $_POST['newphone'];
        $userController->addNewUserControler($newName,$newEmail,$newPassword,$newCompany,$newPhone);
    }
  
}
if (isset($_GET['type']) && $_GET['type'] == 'Update') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST)) {
            $userId = $_POST['id'];
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $userCompany = $_POST['company'];
            $userPhone = $_POST['phone'];
            $userController->updateController($userId, $userName, $userEmail, $userCompany, $userPhone);
        }
    }
}
if(isset($_GET['type']) && $_GET['type'] == 'Delete') {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST)) {
        $userId = $_POST['id'];
        $userController->deleteController($userId);    
    }
}
    
}
if(isset($_GET['type']) && $_GET['type'] == 'LoginValid') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST)) {
            $userEmail = $_POST['email'];
            $userController->loginValidController($userEmail);    
        }
    }
        
    }

?>

