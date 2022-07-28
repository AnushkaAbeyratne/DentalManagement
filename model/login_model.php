<?php
include_once '../commons/dbConnection.php';
        $dbConnObj= new dbConnection();
class Login{


    public function validateLogin($username,$password)
    {
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM login l, employee e WHERE l.employee_emp_id=e.emp_id AND l.login_username='$username' AND l.login_password='$password' And e.emp_status='1'";
        $result= $con->query($sql);
        return $result;
    }

}