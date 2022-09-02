<?php
require '../../vendor/autoload.php';
require '../include/header.php';


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
$record = $this->numseeUserController();
$pagi = ceil($record/$per_page);

$docrecord = $this->numseeDocumentController();
$docpagi = ceil($docrecord/$docper_page);

$resu = $this->seeUserController($start,$per_page);
$resd = $this->seeDocumentController($docstart,$docper_page);

if	(isset($_GET['type']) && $_GET['type'] == 'dashboard')
		{
			echo '<div id="msge"><span>Welcome '.$_SESSION['user_name'].'</span><button id="btn">x</button></div>';
		} 
if	(isset($_GET['type']) && $_GET['type'] == 'success')
{
			echo '<div id="msge"><span>Successfully added</span><button id="btn">x</button></div>';
}

?>