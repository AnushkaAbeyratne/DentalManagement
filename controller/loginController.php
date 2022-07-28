<?php
session_start();
include '../model/login_model.php';
include '../model/employee_model.php';

$empObj= new Employee();
$loginObj= new Login();
$status=$_REQUEST["status"];

switch ($status){

    case "login":

         $username=$_POST["username"];
         $password=$_POST["password"];

        $password=sha1($password);
        /// convert the pw to uppercase
        $password=strtoupper($password);

        $result=$loginObj->validateLogin($username,$password);
        if($result->num_rows==1)
        {
            $empRow=$result->fetch_assoc();

            $emp_id=$empRow["emp_id"];   /// get user id
            $role_id=$empRow["role_role_id"];  ///  get Role id
            $firstName=$empRow["emp_fname"]; //Get user first name
            $lastName=$empRow["emp_lname"]; //Get user last name
            $image=$empRow["emp_image"];

            $empArray=array(
                "emp_id"=>$emp_id,
                "firstName"=>$firstName,
                "lastName"=>$lastName,
                "role_id"=>$role_id,
                "image"=>$image
            );
           $_SESSION["user"] = $empArray;
            ?>
            <script>
                window.location="../view/dashboard.php"
            </script>
            <?php
        }
        else
        {
            $msg="The Credentials: Username and the Password does not match!";
            $msg=base64_encode($msg);
            ?>
            <script>
                window.location="../view/login.php?msg=<?php echo $msg;?>"
            </script>
            <?php
        }
        break;

        case "logout":
        session_destroy();
        ?>
        <script> window.location="../index.php"</script>
        <?php
            break;
            default:
        echo "Invalid Parameters";
    }
?>

