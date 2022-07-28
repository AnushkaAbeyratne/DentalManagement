<?php
include '../includes/header.php';
include '../model/module_model.php';
include '../model/employee_model.php';
$empObj = new Employee();
$empResult=$empObj->getAllEmployees();
$moduleObj = new Module();
?>
    <title>VIEW EMPLOYEE</title>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3 align="left" style="color: #006699"><img src="../images/employee.png" width="50px" height="50px"/> VIEW EMPLOYEE</h3>
            </div>

            <div class="col-md-4">
                <?php if(isset($_GET["msg"])) {?>
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <?php
                        $msg=$_REQUEST["msg"];
                        $msg=  base64_decode($msg);
                        echo $msg;
                        ?>
                    </div>
                </div>
                 <?php
                }
                ?>
                <div class="col-sm-12">
                    <div id="alertDiv"></div>
                </div>
            </div>
            <div class="col-md-2">
                <a href="add_employee.php" class="btn btn-block btn-primary">
                    <i class="fa fa-plus"></i>&nbsp;Add Employee
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="emp_Mgt.php">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Employee</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover table-responsive-*" id="myTable">
                    <thead>
                    <tr>
                        <th scope="col">Emp Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($empRow=$empResult->fetch_assoc()) {
                    $empId = $empRow["emp_id"];
                    $empId = base64_encode($empId);
                    ?>
                    <tr>
                        <td scope="row"><?php echo $empRow["emp_id"]; ?></td>
                        <td>
                            <img src="../images/user_image/<?php echo $empRow["emp_image"]; ?>" width="40"
                                 height="40"/>
                        </td>
                        <td><?php echo $empRow["emp_fname"]." ".$empRow["emp_lname"];?></td>
                        <td><?php echo $empRow["emp_email"]; ?></td>
                        <td><?php echo $empRow["emp_cno2"]; ?></td>
                        <td>
                            <a href="display_employee.php?emp_id=<?php echo $empId;?>" class="btn btn-outline-primary">
                                <i class="fa fa-search"></i>&nbsp;View
                            </a>
                            &nbsp;
                            <a href="../view/edit_employee.php?emp_id=<?php echo $empId;?>" class="btn btn-outline-secondary">
                                <i class="fa fa-pencil"></i>&nbsp;Edit
                            </a>
                            &nbsp;
                            <?php
                            if($empRow["emp_status"]==0)
                            {
                                ?>
                                <a href="../controller/employeeController.php?status=activateEmployee&emp_id=<?php echo $empId;?>"
                                   class="btn btn-outline-success">&nbsp;Activate
                                </a>
                                &nbsp;
                                <?php
                            }
                            ?>
                            <?php
                            if($empRow["emp_status"]=="1")
                            {
                                ?>
                                <a href="../controller/employeeController.php?status=deactivateEmployee&emp_id=<?php echo $empId;?>"
                                   class="btn btn-outline-danger">&nbsp;Deactivate
                                </a>

                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                        <?Php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include '../includes/footer.php';?>
<script>
    var url = window.location.href;
    var spliturl = url.split("?")[0];
    var newspliturl = spliturl.split("localhost")[1];
    window.history.pushState({},document.title,"" + newspliturl);
</script>


