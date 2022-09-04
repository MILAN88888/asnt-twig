<?php
/**
 * Action that controls all the User related functionality
 *
 * PHP version 8.1.3
 *
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
require '../../vendor/autoload.php';
require '../include/header.php';

$db = new twigasnt\asnt\Config\Db();
$conn = $db->getConnection();

$dashboardModel = new \twigasnt\asnt\Model\DashboardModel($conn);
$userModel = new \twigasnt\asnt\Model\UserModel($conn);

$userController = new \twigasnt\asnt\Controller\UserController($userModel);
$dashboardController = new 
\twigasnt\asnt\Controller\DashboardController($dashboardModel);
$dashboardController->dashboard();
$baseurl = 'http://localhost/asnt-twig/src/';
$uploadFileMsg = 0;
$per_page = 5;
$start = 0;
$docper_page = 5;
$docstart = 0;
if (isset($_GET['start'])) {
    $start = $_GET['start'];
    $current_page = $start;
    $start--;
    $start = $start * $per_page;
}
if (isset($_GET['docstart'])) {
    $docstart = $_GET['docstart'];
    $doccurrent_page = $docstart;
    $docstart--;
    $docstart = $docstart * $docper_page;
}
$record = $dashboardController->numseeUserController();
$pagi = ceil($record/$per_page);

$docrecord = $dashboardController->numseeDocumentController();
$docpagi = ceil($docrecord/$docper_page);

if (isset($_POST['uploadfile'])) {
    $filename = isset($_FILES['document']['name']) ?
     $_FILES['document']['name']:null;
    $filetmp =isset($_FILES['document']['tmp_name'])
     ? $_FILES['document']['tmp_name']:null;
    $uploadFileMsg = $userController->uploadDocumentController($filename, $filetmp);
}


if (isset($_GET['type']) && $_GET['type'] == 'dashboard') {
    echo '<div id="msge"><span>Welcome '.$_SESSION['user_name'].
    '</span><button id="btn">x</button></div>';
} 
if (isset($_GET['type']) && $_GET['type'] == 'success') {
    echo '<div id="msge"><span>Successfully added</span>
    <button id="btn">x</button></div>';
}
if (isset($_GET['newadd']) && $_GET['newadd'] == 'ok') {
    echo '<div id="msge"><span> New user Successfully added</span>
    <button id="btn">x</button></div>';
}
if ($uploadFileMsg == true) {
    echo '<div id="msge"><span>Successfully added</span>
    <button id="btn">x</button></div>';   
}
if ((isset($_GET['type']) && $_GET['type'] == 'dashboard') 
    || (isset($_GET['type']) && $_GET['type'] == 'rdashboard')
) {
        $dashboardController->dashboardsummary(
            $record, $docrecord, $_SESSION['user_email']
        );
}
if ((isset($_GET['docstart']) && $_GET['docstart']  != '') 
    || (isset($_GET['document']) && $_GET['document']  != '') 
) {    
        $dashboardController->seeDocumentController(
            $docstart, $docper_page, $docpagi
        );
}
if ((isset($_GET['start']) && $_GET['start']  != '') 
    || (isset($_GET['user']) && $_GET['user']  != '') 
) {    
        $dashboardController->seeUserController($start, $per_page, $pagi);
}

?>
<script src="<?php echo $baseurl?>view/js/dashboard.js"></script>
