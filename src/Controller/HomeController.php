<?php
namespace twigasnt\asnt\Controller;
// require_once 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController
{
    private $_loader;
    private $_twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(__DIR__.'/../view/templates');
        $this->twig = new Environment($this->loader);
    }

    public function home()
    {
        // echo "i am working";
        // print_r($this->twig);
        // if (!isset($_SESSION['user_id'])) {
            // include ('view/main.php');
            return $this->twig->render('signin.html.twig',["name" => "ajeet"]);
            
            // $this->twig->render('signup.html.twig');
        // }
    }
}
?>