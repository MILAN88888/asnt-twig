<?php
/**
 * DashboardController that controls all the User related functionality
 *
 * PHP version 8.1.3
 *
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
namespace twigasnt\asnt\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
/**
 * Dashboard Controller class handle Dashboard method
 * 
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class DashboardController
{
    private $_loader;
    private $_twig;
    public $res;
    public $dashboardModel;
    public $baseurl = 'http://localhost/asnt-twig/';

    /**
     * Constructor for the User controller.
     * 
     * @param $dashboardModel is the object for user model.
     */
    public function __construct($dashboardModel)
    {
        $this->_loader = new FilesystemLoader(__DIR__.'/../view/templates');
        $this->_twig = new Environment($this->_loader);
        $this->dashboardModel = $dashboardModel;
    }

    /**
     * Function to get number of all users.
     * 
     * @return int return $res number of user.
     */
    public function numseeUserController() :int 
    {
        $res = $this->dashboardModel->numseeUserModel();
        return $res;
    }
    /**
     * SeeUserController function that displays the documents.
     * 
     * @param $start    start point for pagination.
     * @param $per_page per page user count.
     * @param $pagi     pagi for user.
     * 
     * @return void return user twig  from the twig.
     */
    public function seeUserController($start, $per_page, $pagi)
    {
        $res = $this->dashboardModel->seeUserModel($start, $per_page);
        echo $this->_twig->render('user.html.twig', ['res'=>$res,'pagi'=>$pagi]);
    }
    /**
     * Function to get number of all documents.
     * 
     * @return int return $res number of document.
     */
    public function numseeDocumentController():int
    {
        $res = $this->dashboardModel->numseeDocumentModel();
        return $res;
    }
    /**
     * SeeDocumentController function that displays the documents.
     * 
     * @param $docstart    start point for pagination.
     * @param $docper_page per page document count.
     * @param $docpagi     pagi for document.
     * 
     * @return void return document twig file.
     */
    public function seeDocumentController($docstart, $docper_page, $docpagi)
    {
        $res = $this->dashboardModel->seeDocumentModel($docstart, $docper_page);
        echo $this->_twig->render(
            'document.html.twig', 
            ['res'=>$res,'docpagi'=>$docpagi]
        );
    }
    /**
     * Dashboardsummary function that displays summary.
     * 
     * @param $record    start point for pagination.
     * @param $docrecord per page document count.
     * @param $email     user email.
     * 
     * @return void return document twig file.
     */
    public function dashboardsummary($record, $docrecord, $email)
    {
        echo $this->_twig->render(
            'dashboardsummary.html.twig',
            ['record'=>$record,'docrecord' => $docrecord, 'useremail'=>$email]
        );
    }
    /**
     * Dashboard function that displays the dashboard.
     * 
     * @return void return dashboard twig file.
     */
    public function dashboard() 
    {
        echo $this->_twig->render(
            'dashboard.html.twig'
        );
    }
}
?>