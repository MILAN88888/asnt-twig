<?php
/**
 * UserModel that controls all the User related functionality
 *
 * PHP version 8.1.3
 *
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
namespace twigasnt\asnt\Model;

/**
 * UserModel class handle User method
 * 
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class UserModel
{

    
    private $_conn;

    /**
     * Constructor for the User Model.
     * 
     * @param $conn is the object for database connectivity.
     */
    public function __construct(object $conn)
    {
        $this->_conn = $conn;    
    }

     /**
      * Function to get accecss to system.
      * 
      * @param $userEmail is useremail.
      * @param $userPass  is user password.
      * 
      * @return mixed return $result or false containts.
      */
    public function loginModel(string $userEmail, string $userPass): mixed
    {
        $sql = "select * from `user` where user_email = ? and user_password = ?";
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("ss", $userEmail, $userPass);
        $stmt->execute();
        $res= $stmt->get_result();
        if ($res->num_rows > 0) {
            $result = array();
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($result, $row);
            }
            return $result;
        } else {
            return false;
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
     * @return bool return true and false.
     */
    public function signupModel(string $userName, string $userEmail,
        string $userPass, string $userPhoneNo, string $userCompany
    ):bool {
        $sql = 'INSERT INTO user 
        (`user_name`,user_email,`user_password`,user_phone_no,`user_company`)
         values (?, ?, ?, ?, ?)';
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param(
            "sssss",
            $userName, $userEmail, $userPass, $userPhoneNo, $userCompany
        );
        $res = $stmt->execute();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Function to validate user Email.
     * 
     * @param $userEmail is useremail.
     * 
     * @return mixed return true or false.
     */
    public function loginValidModel(string $userEmail): mixed
    {
        $sql = "select * from `user` where user_email = ?";
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res->num_rows > 0) {   
            return true;
        } else {
            return false;
        }
    }

    /**
     * Function to delete user from system.
     * 
     * @param $userId is user id.
     * 
     * @return bool return true or false.
     */
    public function deleteModel(int $userId): bool
    {
        $sql = "delete from `user` where user_id= ?";
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $res = $stmt->execute();
        if ($res) {   
            return true;
        } else {
            return false;
        }
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
     * @return bool return true or false.
     */
    public function updateModel(int $userId, string $userName,
        string $userEmail, string $userCompany,string $userPhone
    ): bool {
        $sql = "UPDATE user
         SET `user_name` = ?, user_email = ?, user_company = ?, user_phone_no = ?
           WHERE user_id = ?";
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param(
            "ssssi",
            $userName, $userEmail, $userCompany, $userPhone, $userId
        );
        $res = $stmt->execute();
        if ($res) {   
            return true;
        } else {
            return false;
        }
    }

    /**
     * Function to upload document.
     * 
     * @param $uploadFile is name of file to upload.
     * 
     * @return bool return true or false.
     */
    public function uploadDocumentModel(string $uploadFile): bool
    {
        $sql = 'INSERT INTO document (document_name) values (?)';
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("s", $uploadFile);
        $stmt->execute();
        return true;
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
     * @return mixed return true or false.
     */
    public function addNewUserModel(string $newName, string $newEmail,
        string $newPassword, string $newCompany, string $newPhone
    ): mixed {
        $sql = 'INSERT INTO user
         (`user_name`,user_email,`user_password`,user_phone_no,`user_company`)
         values (?, ?, ?, ?, ?)';
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param(
            "sssss",
            $newName, $newEmail, $newPassword, $newPhone, $newCompany
        );
        $res = $stmt->execute();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}
?>