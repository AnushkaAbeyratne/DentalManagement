<?php
include_once '../commons/dbConnection.php';
$dbConnection = new dbConnection();

class Employee{

      function getEmpId(){
          $con = $GLOBALS['con'];
          $sql = "SELECT emp_id FROM employee ORDER BY emp_id DESC LIMIT 1";
          $result = $con->query($sql);
          $rowCount=$result->num_rows;

          if ($rowCount==0 || $rowCount=""){
              $emp_id="EMP00001";
              return $emp_id;
          } else{
              $Id=$result->fetch_array();
              $count=$Id[0];
              $count++;
//              $emp_id="EMP".str_pad($count,5,"0",STR_PAD_LEFT);
              return $count;
          }

      }
      function getUserRole(){
          $con = $GLOBALS['con'];
          $sql = "SELECT * FROM role WHERE role_id<'5'";
          $result = $con->query($sql);
          return $result;
      }

       function getUserByRole($roleId){
          $con = $GLOBALS['con'];
          $sql = "SELECT role_name FROM login l, role r WHERE l.role_role_id=r.role_id AND r.role_id='$roleId'";
          $result=$con->query($sql);
          return $result;
      }
    public function getModulesByRole($roleId)
    {
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM module m, module_role mr WHERE m.module_id=mr.module_id AND mr.role_id='$roleId'";
        $results=$con->query($sql);
        return $results;
    }

    function getActiveUserCount()
      {
          $con =$GLOBALS["con"];
          $sql="SELECT COUNT(emp_id) as activecount FROM employee WHERE emp_status='1'";
          $result=$con->query($sql);
          $row=$result->fetch_assoc();
          $activeCount=$row["activecount"];
          return $activeCount;

      }

      function getDeactiveUserCount()
      {
          $con =$GLOBALS["con"];
          $sql="SELECT * FROM employee WHERE emp_status='0'";
          $result=$con->query($sql);
          $activeUserCount=$result->num_rows;
          return $activeUserCount;
      }

      function validateEmail($emp_email)
      {
          $con=$GLOBALS['con'];
          $sql="SELECT 1 FROM employee WHERE emp_email='$emp_email'";
          $result= $con->query($sql);
          if($result->num_rows>0) {
              return false;

          }else {
              return true;
          }

      }
      function addEmployee($emp_id,$emp_title,$emp_fname,$emp_lname,$emp_image,$emp_email,$emp_nic,$emp_dob,$emp_gender,$emp_cno1,
                       $emp_cno2)
      {
          $con=$GLOBALS['con'];
          $sql="INSERT INTO employee(emp_id,
                        emp_title,
                        emp_fname,
                        emp_lname,
                        emp_image,
                        emp_email,
                        emp_nic,
                        emp_dob,
                        emp_gender,
                        emp_cno1,
                        emp_cno2
                        )VALUES(
                        '$emp_id','$emp_title','$emp_fname','$emp_lname','$emp_image','$emp_email','$emp_nic','$emp_dob',
                        '$emp_gender','$emp_cno1','$emp_cno2')";
          $con->query($sql);
          $empId=$con->insert_id;
          return $empId;

      }
      function loginExist($emp_id)
      {
          $con=$GLOBALS['con'];
          $sql="SELECT 1 FROM login WHERE employee_emp_id='$emp_id'";
          $result=$con->query($sql) or die($con->error);
          if ($result->num_rows>0){
              return false;
          }else{
              return true;
          }

      }

    function addLogin($login_username,$login_password,$role_role_id,$employee_emp_id)
    {
        $con=$GLOBALS["con"];
        $sql="INSERT INTO login(login_username,login_password,role_role_id,employee_emp_id)
            VALUES('$login_username','$login_password','$role_role_id','$employee_emp_id')";
        $result=$con->query($sql);
        return $result;

    }

      function getAllEmployees()
      {
          $con=$GLOBALS["con"];
          $sql="SELECT * FROM employee";
          $result=$con->query($sql);
          return $result;
      }
      function deactivateEmployee($empId)
      {
          $con=$GLOBALS["con"];
          $sql="UPDATE employee SET emp_status='0' WHERE emp_id='$empId'";
          $result=$con->query($sql);
          return $result;
      }

      function activateEmployee($empId)
      {
          $con=$GLOBALS["con"];
          $sql="UPDATE employee SET emp_status='1' WHERE emp_id='$empId'";
          $result=$con->query($sql);
          return $result;
      }
      function viewEmployees($empId)
      {
          $con=$GLOBALS["con"];
          $sql="SELECT * FROM employee WHERE emp_id='$empId'";
          $result=$con->query($sql);
          return $result;
      }
//      function updateEmailValidation($empId,$emp_email)
//      {
//          $con=$GLOBALS['con'];
//          $sql="SELECT 1 FROM employee WHERE emp_email='$emp_email' AND emp_id!=$empId";
//          $result= $con->query($sql);
//          if($result->num_rows>0)
//          {
//              return false;
//
//          }
//          else
//          {
//              return true;
//          }
//
//
//      }
      function updateEmployee($emp_id,$emp_title,$emp_fname,$emp_lname,$emp_image,$emp_email,$emp_nic,$emp_dob,$emp_gender,$emp_cno1,
                          $emp_cno2)
      {
          $con = $GLOBALS['con'];

          if ($emp_image != "defaultImage.jpg") {
              $sql = "UPDATE employee SET "
                  . "emp_title='$emp_title',"
                  . "emp_fname='$emp_fname',"
                  . "emp_lname='$emp_lname',"
                  . "emp_image='$emp_image',"
                  . "emp_email='$emp_email',"
                  . "emp_nic='$emp_nic',"
                  . "emp_dob='$emp_dob',"
                  . "emp_gender='$emp_gender',"
                  . "emp_cno1='$emp_cno1',"
                  . "emp_cno2='$emp_cno2'"
                  . "WHERE emp_id='$emp_id'";
          } else {
              $sql = "UPDATE employee SET "
                  . "emp_title='$emp_title',"
                  . "emp_fname='$emp_fname',"
                  . "emp_lname='$emp_lname',"
                  . "emp_email='$emp_email',"
                  . "emp_nic='$emp_nic',"
                  . "emp_dob='$emp_dob',"
                  . "emp_gender='$emp_gender',"
                  . "emp_cno1='$emp_cno1',"
                  . "emp_cno2='$emp_cno2'"
                  . "WHERE emp_id='$emp_id'";
          }
          $result= $con->query($sql) or die($con->error);
      }

      function searchEmployee($emp_id){
          $con=$GLOBALS["con"];
          $sql="SELECT emp_id,emp_title,emp_fname,emp_lname,emp_email,emp_nic FROM employee WHERE emp_id='$emp_id'";
          $result=$con->query($sql);
          return $result;
      }

      function searchKey($key){
          $con=$GLOBALS["con"];
//          $sql="SELECT e.emp_id,e.emp_fname,e.emp_lname FROM employee e  WHERE NOT EXISTS (SELECT *  FROM  login l WHERE e.emp_id = l.employee_emp_id AND e.emp_id LIKE'%$key%' OR e.emp_fname LIKE'%$key%'
//                OR e.emp_lname LIKE'%$key%')";
          $sql="SELECT * FROM employee WHERE emp_id LIKE '%$key%' OR emp_fname LIKE '%$key%' OR emp_lname LIKE '%$key%'";
          $result=$con->query($sql);
          return $result;

      }
       function getAllUsers()
       {
            $con=$GLOBALS["con"];
            $sql="SELECT * FROM employee e, login l WHERE l.employee_emp_id=e.emp_id";
            $result=$con->query($sql);
            return $result;
       }


  }





