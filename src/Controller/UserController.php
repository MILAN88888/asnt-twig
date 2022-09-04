<?php
/**
 * UserController that controls all the User related functionality
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

/**
 * UserController class handle User method
 * 
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class UserController
{
    private $_userModel;
    public $result;

    /**
     * Constructor for the User controller.
     * 
     * @param $userModel is the object for user model.
     */
    public function __construct($userModel)
    {
        $this->_userModel = $userModel;    
    }

    /**
     * Function to get accecss to system.
     * 
     * @param $userEmail is useremail.
     * @param $userPass  is user password.
     * 
     * @return return nothing.
     */
    public function loginController($userEmail, $userPass)
    {
        $this->result = $this->_userModel->loginModel($userEmail, $userPass);
        if ($this->result != false) {  
            session_start();
            $arr = $this->result;
            $_SESSION['user_email'] = $arr[0]['user_email'];
            $_SESSION['user_id'] =  $arr[0]['user_id'];
            $_SESSION['user_name'] = $arr[0]['user_name'];
            $_SESSION['user_email'] = $arr[0]['user_email'];
            header('location:dashboard.php?type=dashboard');
        } else {    
            header('location:../../index.php?msg=fail');
        }                
    }
    
    /**
     * Function to get signup.
     * 
     * @param $userName    is userName.
     * @param $userEmail   is useremail.
     * @param $userPass    is user password.
     * @param $userPhoneNo is user phone number.
     * @param $userCompany is user's company name.
     * 
     * @return return nothing.
     */
    public function signupController($userName, $userEmail, $userPass,
        $userPhoneNo, $userCompany
    ) {
        $res = $this->_userModel->signupModel(
            $userName, $userEmail,
            $userPass, $userPhoneNo, $userCompany
        );
        if ($res == true) {   
            header('location:../../index.php?msgs=success');
        } else {
            header('location:../../index.php?msgs=fail');
        }    
    }

    /**
     * Function to validate user Email.
     * 
     * @param $userEmail is useremail.
     * 
     * @return return true or false.
     */
    public function loginValidController($userEmail)
    {
        $result = $this->_userModel->loginValidModel($userEmail);
        echo $result;    
    }

    /**
     * Function to delete user from system.
     * 
     * @param $userId is user id.
     * 
     * @return return true or false.
     */
    public function deleteController($userId)
    {    
        $result = $this->_userModel->deleteModel($userId);
        echo $result;        
        
    }

    /**
     * Function to update the user details.
     *
     * @param $userId      is id of user.
     * @param $userName    is userName.
     * @param $userEmail   is useremail.
     * @param $userCompany is user's company name.
     * @param $userPhone   is user phone number.
     * 
     * @return return true or false.
     */
    public function updateController($userId, $userName, $userEmail,
        $userCompany, $userPhone
    ) {
        $result = $this->_userModel->updateModel(
            $userId, $userName,
            $userEmail, $userCompany, $userPhone
        );
        echo $result;
    }

    /**
     * Function to upload document.
     * 
     * @param $filename is name of file.
     * @param $filetmp  is temp name of file.
     * 
     * @return return true or false.
     */
    public function uploadDocumentController($filename, $filetmp)
    {
        $destination='../upload/'.$filename;
        move_uploaded_file($filetmp, $destination);
        $result = $this->_userModel->UploadDocumentModel($filename);
        return $result;
    }
    
    /**
     * Function to add new user.
     * 
     * @param $newName     is userName.
     * @param $newEmail    is useremail.
     * @param $newPassword is user password.
     * @param $newCompany  is user's company name.
     * @param $newPhone    is user phone number.
     * 
     * @return return nothing.
     */
    public function addNewUserControler($newName,$newEmail,
        $newPassword,$newCompany,$newPhone
    ) {
        $res = $this->_userModel->addNewUserModel(
            $newName, $newEmail,
            $newPassword, $newCompany, $newPhone
        );
        if ($res == true) {
            header('location:dashboard.php?user=user&newadd=ok');
        }
    }
     /**
      * Function to get the user loggedOut
      * 
      * @return nothing to return.
      */
    public function logOut()
    {
        session_start();
        if (isset($_SESSION['user_id'])) {    
            session_unset();
            session_destroy();
            header("location:../../index.php");
        }
    }
}
?>
