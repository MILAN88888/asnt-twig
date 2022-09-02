<?php

namespace twigasnt\asnt\Controller;

class DashboardController
{
    public $_baseurl = 'http://localhost/asnt-twig/';
    private $_obj;
    private $_numresu;
    private $_numresd;

    public function __construct($dashboardModel)
    {
        $this->dashboardModel = $dashboardModel;
    }

    public function numseeUserController()
    {
        $res = $this->dashboardModel->numseeUserModel();
        return $res;
    }

    public function seeUserController($start, $per_page)
    {
        $res = $this->dashboardModel->seeUserModel($start, $per_page);
        return $res;
    }

    public function numseeDocumentController()
    {
        $res = $this->dashboardModel->numseeDocumentModel();
        return $res;
    }

    public function seeDocumentController($docstart, $docper_page)
    {
        $res = $this->dashboardModel->seeDocumentModel($docstart, $docper_page);
        return $res;
    }

    public function dashboard()
    {
        header('location:../view/dashboard.php');
    }
}
// if (
// (isset($_GET['type']) && $_GET['type'] != '') ||
// (isset($_GET['start']) && $_GET['start']  != '') ||
// (isset($_GET['docstart']) && $_GET['docstart']  != '')
// )
// {
// 	$obj1 = new DashboardController();
// 	$obj1->dashboard();
// }
