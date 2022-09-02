<?php

namespace twigasnt\asnt\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class DashboardController
{
    private $loader;
    private $twig;

    public $_baseurl = 'http://localhost/asnt-twig/';
    private $_obj;
    private $_numresu;
    private $_numresd;


    public function __construct($dashboardModel)
    {
        $this->loader = new FilesystemLoader(__DIR__.'/../view/templates');
        $this->twig = new Environment($this->loader);
        $this->dashboardModel = $dashboardModel;
    }

    public function numseeUserController()
    {
        $res = $this->dashboardModel->numseeUserModel();
        return $res;
    }

    public function seeUserController($start, $per_page, $pagi)
    {
        $res = $this->dashboardModel->seeUserModel($start, $per_page);
        return $this->twig->render('user.html.twig',['res'=>$res,'pagi'=>$pagi]);
    }

    public function numseeDocumentController()
    {
        $res = $this->dashboardModel->numseeDocumentModel();
        return $res;
    }

    public function seeDocumentController($docstart, $docper_page, $docpagi)
    {
        $res = $this->dashboardModel->seeDocumentModel($docstart, $docper_page);
        return $this->twig->render('document.html.twig',['res'=>$res,'docpagi'=>$docpagi]);
    }

    public function dashboard($record, $docrecord, $email)
    {
        return $this->twig->render('dashboard.html.twig',['record'=>$record,'docrecord' => $docrecord, 'useremail'=>$email]);
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
