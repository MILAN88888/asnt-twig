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
        return $this->twig->render('signin.html.twig');    
    }
    public function main()
    {
        return $this->twig->render('main.html.twig');
    }
}
?>