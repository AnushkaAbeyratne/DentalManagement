<?php
include '../includes/header.php';
include '../model/patient_model.php';
$patientObj = new Patient();
$patientResult=$patientObj->getAllPatients();

?>
<title>VIEW PATIENT</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h3 align="left" style="color: #006699"><img src="../images/profile.png" width="50px" height="50px"/> VIEW PATIENT</h3>
        </div>

        <div class="col-md-6">
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
            <a href="add_patient.php" class="btn btn-block btn-primary">
                <i class="fa fa-plus"></i>&nbsp;Add Patient
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="patient_mgt.php">Patient</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Patient</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive-*" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Patient Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($patRow=$patientResult->fetch_assoc()) {
                    $patientId = $patRow["patient_id"];
                    $patientId = base64_encode($patientId);
                    ?>
                    <tr>
                        <td scope="row"><?php echo $patRow["patient_id"]; ?></td>
                        <td><?php echo $patRow["patient_fname"]." ". $patRow["patient_lname"]; ?></td>
                        <td><?php echo $patRow["patient_email"]; ?></td>
                        <td><?php echo $patRow["patient_cno"]; ?></td>

                        <td>
                            <a href="../view/display_patient.php?patient_id=<?php echo $patientId;?>" class="btn btn-outline-primary">
                                <i class="fa fa-search"></i>&nbsp;View
                            </a>
                            &nbsp;
                            <a href="../view/edit_patient.php?patient_id=<?php echo $patientId;?>" class="btn btn-outline-secondary">
                                <i class="fa fa-pencil"></i>&nbsp;Edit
                            </a>
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

