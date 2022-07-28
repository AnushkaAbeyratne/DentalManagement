<?php
include '../includes/header.php';
?>
<title>REPORTS</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <h3 align="left" style="color: #006699"><img src="../images/application.png" width="60px" height="60px"/> REPORTS</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reports</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!--  nav tab -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a id="patientNav" class="nav-link text-uppercase active" data-toggle="tab" href="#patientReport">Patient</a>
                        </li>
                        <li class="nav-item">
                            <a  id="scheduleNav" class="nav-link text-uppercase" data-toggle="tab" href="#scheduleReport">schedule</a>
                        </li>
                        <li class="nav-item">
                            <a  id="appointmentNav" class="nav-link text-uppercase" data-toggle="tab" href="#appointmentReport">appointment</a>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a  id="inventoryNav" class="nav-link text-uppercase" data-toggle="tab" href="#inventoryReport">inventory</a>-->
<!--                        </li>-->
                    </ul>

                    <div class="tab-content">

                        <div id="patientReport" class="container tab-pane active p-0" style="max-width: inherit"><br>
                            <div class="row">
                                <ul>
                                    <li><a href="patient_report.php" class="text-decoration-none">ALL PATIENTS</a></li>
                                    <li><a href="today_patient_report.php" class="text-decoration-none">TODAY PATIENTS</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#customPatient" class="text-decoration-none">
                                            CUSTOMIZED PATIENTS</a></li>
                                </ul>
                            </div>
                        </div>

                        <div id="scheduleReport" class="container tab-pane fade  p-0" style="max-width: inherit"><br>
                            <div class="row">
                                <ul>
                                    <li><a href="#" data-toggle="modal" data-target="#customSchedule" class="text-decoration-none">
                                            CUSTOMIZED SCHEDULE</a></li>
                                </ul>
                            </div>
                        </div>

                        <div id="appointmentReport" class="container tab-pane fade  p-0" style="max-width: inherit"><br>
                            <div class="row">
                                <ul>
                                    <li><a href="get_all_appointment_report.php" class="text-decoration-none">ALL APPOINTMENTS</a></li>
<!--                                    <li>TODAY PATIENTS</li>-->
<!--                                    <li>CUSTOMIZED PATIENTS</li>-->
                                </ul>
                            </div>
                        </div>

<!--                        <div id="inventoryReport" class="container tab-pane fade  p-0" style="max-width: inherit"><br>-->
<!--                            <div class="row">-->
<!--                                <ul>-->
<!--                                    <li>ALL PATIENTS</li>-->
<!--                                    <li>TODAY PATIENTS</li>-->
<!--                                    <li>CUSTOMIZED PATIENTS</li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="customPatient" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Customize Patient</h4>
                </div>
                <form id="customPatient" method="post" action="from_to_patient_report.php" target="_blank">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">From</label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="from" class="form-control" id="from"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">To</label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="to" class="form-control" id="to"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">GENERATE REPORT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="customSchedule" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Customize Patient</h4>
                </div>
                <form id="customSchedule" method="post" action="from_to_schedule_count.php" target="_blank">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">From</label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="from" class="form-control" id="from"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">To</label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="to" class="form-control" id="to"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">GENERATE REPORT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include '../includes/footer.php';
?>