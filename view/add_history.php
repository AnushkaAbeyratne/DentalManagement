<?php
include '../includes/header.php';
include '../model/patient_model.php';
$patientObj = new Patient();
?>
<title>ADD HISTORY</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <h3 align="left" style="color: #006699"><img src="../images/medical-record%20(1).png" width="50px" height="50px"/>
                <?php echo strtoupper('Add history')?>
            </h3>
        </div>

        <div class="col-md-5">
            <?php
            if(isset($_GET["msg"]))
            {
                ?>
                <div class="col-md-12">
                    <div class="alert alert-danger">
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
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="view_history.php">View History</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add History</li>
                </ol>
            </nav>
        </div>
    </div>
    <form id="addHistory" enctype="multipart/form-data" method="post" action="../controller/patientController.php?status=add_history">
        <br>
        <div class="row">
            <div class="col-md-3">
                <label class="control-label">Patient Id </label>
            </div>
            <div class="col-md-3">
                <input type="text" name="pat_id" placeholder="PAT" class="form-control" id="pat_id" list="searchPatients" value=""
                       autocomplete="off"/>
                <div>
                    <datalist id="searchPatients">
                        <option value="">
                    </datalist>
                </div>
            </div>
            <div class="col-md-6 ">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label class="control-label">Patient Name </label>
            </div>
            <div class="col-md-9">
                <input type="text" name="pat_name" placeholder="Patient Name" class="form-control" id="pat_name" readonly="readonly"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-3 ">
                <label class="text">Comment </label>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <textarea class="form-control" id="his_comment" name="his_comment"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-3">&nbsp;</div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-block btn-primary">
                    <i class="fa fa-download"></i> Save</button>
            </div>
            <div class="col-md-2">
                <button type="reset" class="btn  btn-block btn-danger">
                    <i class="fa fa-recycle"></i> Reset</button>
            </div>
            <div class="col-md-5">&nbsp;</div>
        </div>
    </form>
</div>
<?php include '../includes/footer.php'; ?>




