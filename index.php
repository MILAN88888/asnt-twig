<?php
/**
 * Db that controls database connectivity.
 *
 * PHP version 8.1.3
 *
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
require 'vendor/autoload.php';
require 'src/include/header.php';
$homeController = new twigasnt\asnt\Controller\HomeController();
if (!isset($_SESSION['user_id'])) {
   
    echo $homeController->home();
}
if (isset($_SESSION['user_id'])) {
    header('location:src/view/dashboard.php?type=rdashboard');
}

if (isset($_GET['msg']) && $_GET['msg'] == 'fail') {
    echo '<div id="msge"><span>Invalid credentials !!</span>
    <button id="btn3">x</button></div>';
        unset($_GET['msg']);
} 
if (isset($_GET['msgs']) && $_GET['msgs'] == 'fail') {    
    echo '<div id="msge"><span>Failed to Register. Try again !!</span>
    <button id="btn3">x</button></div>';
        unset($_GET['msgs']);
} 
if (isset($_GET['msgs']) && $_GET['msgs'] == 'success') {    
    echo '<div id="msge"><span>Successfully Registered. procced login!!</span>
    <button id="btn3">x</button></div>';
    unset($_GET['msgs']);
} 
if (!isset($_SESSION['user_id'])) {
   
    echo $homeController->main();
}
?>
