<?php
include '../includes/header.php';
include '../model/patient_model.php';
$patientObj = new Patient();
$patientResult = $patientObj->getAllPatients();
$patientNewId = $patientObj->getPatientId();
?>

    <title>ADD PATIENT</title>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3 align="left" style="color: #006699"><img src="../images/medical.png" width="60px" height="60px" />
                    <?php echo strtoupper('Add patient')?></h3>
            </div>
            <div class="col-md-4">
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
                        <li class="breadcrumb-item"><a href="view_patient.php">View Patient</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Patient</li>
                    </ol>
                </nav>
            </div>
        </div>
        <form id="addPatient" enctype="multipart/form-data" method="post" action="../controller/patientController.php?status=add_patient">
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label">Patient Id &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="pat_id" placeholder="PAT00000" class="form-control" id="pat_id"
                           readonly="readonly" value="<?php echo $patientNewId; ?>"/>
                </div>

                <div class="col-md-3 ">
                    <label class="control-label">Title</label>
                </div>
                <div class="col-md-3 ">
                    <select class="form-control" name="pat_title" id="pat_title">
                        <option value="">Select Title</option>
                        <option value="1">Mr</option>
                        <option value="2">Mrs</option>
                        <option value="3">Miss</option>
                        <option value="3">Master</option>
                        <option value="3">Rev</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">First Name &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="pat_fname" placeholder="First Name" class="form-control" id="pat_fname"/>
                </div>

                <div class="col-md-3 ">
                    <label class="control-label">Last Name &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="pat_lname" placeholder="Last Name" class="form-control" id="pat_lname"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="control-label"> Email &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="pat_email" placeholder="Email"class="form-control" id="pat_email"/>
                </div>

                <div class="col-md-3">
                    <label class="control-label"> Age &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="pat_age" placeholder="Age" class="form-control" id="pat_age" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label"> Gender &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="radio" name="pat_gender" value="0" checked="checked"  />&nbsp;<label class="control-label">Male</label>
                    &nbsp;

                    <input type="radio" name="pat_gender" value="1" />&nbsp;<label class="control-label">Female</label>
                </div>

                <div class="col-md-3">
                    <label class="control-label"> Contact Number &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="pat_cno" placeholder="+94711111111"class="form-control" id="pat_cno" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="control-label"> Address &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="pat_no" placeholder="No." class="form-control" id="pat_no" />
                </div>
                <div class="col-md-3">
                    <input type="text" name="pat_street" placeholder="Street" class="form-control" id="pat_street" />
                </div>
                <div class="col-md-3">
                    <input type="text" name="pat_city" placeholder="City" class="form-control" id="pat_city" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-9">
                    <button id="submit" style="width:250px;" class="btn btn-primary">
                        <i class="fa fa-download"></i> Save
                    </button>
                                        &nbsp;
                    <button type="reset" style="width:250px;" class="btn btn-danger">
                        <i class="fa fa-recycle"></i> Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
<?php include '../includes/footer.php';?>
    <script type="text/javascript">

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();


                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
