<?php
require '../../vendor/autoload.php';
require '../include/header.php';

echo $dashboardController->dashboard();

$uploadFileMsg = null;
$per_page = 5;
$start = 0;
$docper_page = 5;
$docstart = 0;
if (isset($_GET['start']))
{
    $start = $_GET['start'];
    $current_page = $start;
    $start--;
    $start = $start * $per_page;
}
if (isset($_GET['docstart']))
{
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
    $filename = isset($_FILES['document']['name']) ? $_FILES['document']['name']:null;
    $filetmp =isset($_FILES['document']['tmp_name']) ? $_FILES['document']['tmp_name']:null;
   $uploadFileMsg = $userController->UploadDocumentController($filename, $filetmp);
}


if	(isset($_GET['type']) && $_GET['type'] == 'dashboard')
		{
			echo '<div id="msge"><span>Welcome '.$_SESSION['user_name'].'</span><button id="btn">x</button></div>';
		} 
if	(isset($_GET['type']) && $_GET['type'] == 'success')
{
		echo '<div id="msge"><span>Successfully added</span><button id="btn">x</button></div>';
}
if	(isset($_GET['newadd']) && $_GET['newadd'] == 'ok')
{
		echo '<div id="msge"><span> New user Successfully added</span><button id="btn">x</button></div>';
}
if($uploadFileMsg == true) {
    echo '<div id="msge"><span>Successfully added</span><button id="btn">x</button></div>';
    
}
if(
    (isset($_GET['type']) && $_GET['type'] == 'dashboard') ||
     (isset($_GET['type']) && $_GET['type'] == 'rdashboard')
     ) {
    echo $dashboardController->dashboardsummary($record, $docrecord, $_SESSION['user_email']);
}
if (
	(isset($_GET['docstart']) && $_GET['docstart']  != '') ||
	(isset($_GET['document']) && $_GET['document']  != '') 
	)
	{	
	    echo $dashboardController->seeDocumentController($docstart, $docper_page, $docpagi);
	}
    if (
        (isset($_GET['start']) && $_GET['start']  != '') ||
        (isset($_GET['user']) && $_GET['user']  != '') 
        )
        {	
            echo $dashboardController->seeUserController($start,$per_page,$pagi);
        }

?>
<script src="<?php echo $baseurl?>view/js/dashboard.js"></script>