<?php 
/**
 * Header that controls all the header related functionality
 *
 * PHP version 8.1.3
 *
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
session_start();
$baseurl = 'http://localhost/asnt-twig/src/';


$db = new twigasnt\asnt\Config\db();
$conn = $db->getConnection();


$dashboardModel = new \twigasnt\asnt\Model\DashboardModel($conn);
$userModel = new 
\twigasnt\asnt\Model\UserModel($conn);

$userController = new \twigasnt\asnt\Controller\UserController($userModel);
$dashboardController = new 
\twigasnt\asnt\Controller\DashboardController($dashboardModel);

?>
<html>
<head>
<title>anst-twig</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
     href="<?php echo $baseurl?>view/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $baseurl?>view/css/header.css">
    <link rel="stylesheet" href="<?php echo $baseurl?>view/css/signin.css">
    <link rel="stylesheet" 
    href="<?php echo $baseurl?>view/css/signup.css">
    <link rel="stylesheet" href="<?php echo $baseurl?>view/css/footer.css">
    <link rel="stylesheet" href="<?php echo $baseurl?>view/css/index.css">
    <link rel="stylesheet" href="<?php echo $baseurl?>view/css/dashboard.css">
    <script src="<?php echo $baseurl?>
    view/bootstrap/bootstrap.bundle.min.js"></script>
    <script src=
    "<?php echo $baseurl?>view/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $baseurl?>view/js/jquery.validate.min.js"></script>

<head>
<body style="background-color:lightgray">
<nav class="navbar navbar-expand-lg navbar-light bg-primary ">
    <a class="navbar-brand" href="#">
    <img src="<?php echo $baseurl?>view/img/kiwi.svg" width="80" height="30" alt="">
    </a>
    <a class="navbar-brand text-white" href="#">ASNT</a>&nbsp;&nbsp;&nbsp;
    <button class="navbar-toggler"
     type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-white"
                 href="<?php !isset($_SESSION['user_id']) ?
                    print_r("index.php") :
                    print_r("dashboard.php?type=rdashboard") ?>">Home </a>
            </li>
            <?php 
            if (!isset($_SESSION['user_id'])) { ?>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="#" id="signin">Login</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="#"id="signup" >Register</a>
                </li>
                <?php 
            }
            if (isset($_SESSION['user_id']) 
                && $_SESSION['user_email'] == 'admin@gmail.com'
            ) { ?>
            <li><a href="dashboard.php?user=user" >
                <button id="user">User</button></a></li>
                <?php
            }
            if (isset($_SESSION['user_id'])) {
                ?>
            <li><a href="dashboard.php?document=document">
                <button id="document" >Document</button></a></li>
            <?php } ?>
        </ul>
        
        </div>
        <?php if (isset($_SESSION['user_id'])) { ?>
            <a href="<?php echo $baseurl; ?>view/logout.php">
            <button class="text-white"   id= "logout">Logout</button></a>
        <?php } ?>
</nav>
<script src="<?php echo $baseurl ?>view/js/index.js"></script>