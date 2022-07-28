<?php
include '../includes/header.php';
include '../model/patient_model.php';
    $patientObj = new Patient();
    if(!isset($_REQUEST["patient_id"]))
    {
        ?>
        <script>
            window.location="../index.php"
        </script>
        <?php
    }
    $patientId = $_REQUEST["patient_id"];
    $patientId = base64_decode($patientId);
    $historyResult = $patientObj->getHistoryByDate($patientId);

?>
<title>HISTORY DETAILS</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <h3 align="left" style="color: #006699"><img src="../images/details.png" width="50px" height="50px"/>&nbsp;
                HISTORY DETAILS
            </h3>
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
            <?php   }  ?>
            <div class="col-sm-12">
                <div id="alertDiv"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="view_history.php">View History</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History Details</li>
                </ol>
            </nav>
        </div>
    </div>

    <form id="addHistory" enctype="multipart/form-data" method="post" action="../controller/patientController.php?status=add_history">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover table-responsive-*" id="myTable">
                    <thead>
                    <tr>
<!--                        <th scope="col">Patient Id</th>-->
                        <th scope="col">Patient Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($historyRow=$historyResult->fetch_assoc()) {
                        $patientId = $historyRow["patient_id"];

                        ?>
                        <tr>
<!--                            <td scope="row">--><?php //echo $historyRow["patient_id"]; ?><!--</td>-->
                            <td><?php echo $historyRow["patient_fname"]." ". $historyRow["patient_lname"]; ?></td>
                            <td><?php echo $historyRow["history_date"]; ?></td>
                            <td><?php echo $historyRow["history_comment"]; ?></td>

                        </tr>
                        <?Php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
<?php include '../includes/footer.php';?>



