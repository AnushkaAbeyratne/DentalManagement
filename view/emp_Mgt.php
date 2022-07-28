<?php
include '../includes/header.php';
include '../model/module_model.php';
include '../model/employee_model.php';
$moduleObj = new Module();
$moduleResult=$moduleObj->getAllModules();
$empObj= new  Employee();
?>
        <title>EMPLOYEEMGT</title>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 8em;">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <a href="view_employee.php" style="text-decoration: none">
                        <div class="card" style="background-color: whitesmoke;height:220px;color: #366097; border-radius:15px;
                            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
                            <div class="card-body">
                                <img src="../images/team%20(1).png" width="140px" height="140px" class="card-img-left">
                                <h4 align="right">EMPLOYEES</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <a href="view_user.php" style="text-decoration: none">
                        <div class="card" style="background-color: whitesmoke;height:220px;color: #366097; border-radius:15px;
                            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); padding-top: 1em">
                            <div class="card-body" >
                                <img src="../images/user.png" width="120px" height="120px" class="card-img-left">
                                <h4 align="right">USERS</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">&nbsp;</div>
            </div>
        </div>
<?php include '../includes/footer.php';?>

