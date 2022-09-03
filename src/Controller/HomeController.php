<?php
/**
 * HomeController that controls all the Index related functionality
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
 * Home Controller class handle Dashboard method
 * 
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class HomeController
{
    private $_loader;
    private $_twig;

    /**
     * Constructor for the Home controller.
     */
    public function __construct()
    {
        $this->_loader = new FilesystemLoader(__DIR__.'/../view/templates');
        $this->_twig = new Environment($this->_loader);
    }

    /**
     * Function to rendor of siginin modal.
     * 
     * @return return singini modal.
     */
    public function home()
    {
        return $this->_twig->render('signin.html.twig');    
    }
    /**
     * Function to rendor of main twig file.
     * 
     * @return return main twig file.
     */
    public function main()
    {
        return $this->_twig->render('main.html.twig');
    }
}
?>
