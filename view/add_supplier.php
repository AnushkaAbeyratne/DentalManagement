<?php
include '../includes/header.php';
include '../model/purchasing_model.php';
$purchaseObj= new Purchase();
$purchaseResult=$purchaseObj->getSupplierDetails();
?>
    <title>ADD EMPLOYEE</title>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3 align="left" style="color: #006699"><img src="../images/inventory.png" width="50px" height="50px"/>&nbsp;
                    <?php echo strtoupper('Add new supplier')?></h3>
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
                        <li class="breadcrumb-item"><a href="purchase_mgt.php">Purchase Management</a></li>
                        <li class="breadcrumb-item"><a href="view_supplier.php">View Supplier</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Supplier</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex">
                <h4 class="title"> COMPANY DETAILS</h4>
            </div>
            <div class="col-md-6 d-flex"></div>
        </div>
        <hr>

        <form id="addSupplier" enctype="multipart/form-data" method="post" action="../controller/purchasingController.php?status=add_supplier">
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label"> Name &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="cname" placeholder=" Name" class="form-control" id="cname" />
                </div>

                <div class="col-md-3">
                    <label class="control-label"> Contact Number 1 &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="ccno1" placeholder="Telephone Number"class="form-control"  id="ccno1" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">Contact Number 2 &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="ccno2" placeholder="Mobile Number"class="form-control" id="ccno2" />
                </div>

                <div class="col-md-3 ">
                    <label class="control-label"> Email &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="cemail" placeholder="Email" class="form-control" id="cemail" />
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
                    <input type="text" name="add_no" placeholder="No." class="form-control" id="add_no" />
                </div>
                <div class="col-md-3">
                    <input type="text" name="add_street" placeholder="Street" class="form-control" id="add_street" />
                </div>
                <div class="col-md-3">
                    <input type="text" name="add_city" placeholder="City" class="form-control" id="add_city" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-6 d-flex">
                    <h4 class="title"> CONTACT PERSON DETAILS</h4>
                </div>
                <div class="col-md-6 d-flex"></div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label"> Name &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="pname" placeholder="First Name" class="form-control" id="pname" />
                </div>

                <div class="col-md-3 ">
                    <label class="control-label">  Email &nbsp;</label>
                </div>
                <div class="col-md-3 ">
                    <input type="text" name="pemail" placeholder="Email"class="form-control" id="pemail"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="control-label"> Contact Number 1 &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="pcno1" placeholder="Telephone Number"class="form-control"  id="pcno1" />
                </div>

                <div class="col-md-3 ">
                    <label class="control-label">Contact Number 2 &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="pcno2" placeholder="Mobile Number"class="form-control" id="pcno2" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">NIC &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="nic" placeholder="NIC"class="form-control" id="nic" />
                </div>
                <div class="col-md-3 ">
                    <label class="control-label"> Position &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="Position" placeholder="Position" class="form-control" id="Position" />
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
<?php include '../includes/footer.php'; ?>
<script>
    var url = window.location.href;
    var spliturl = url.split("?")[0];
    var newspliturl = spliturl.split("localhost")[1];
    window.history.pushState({},document.title,"" + newspliturl);
</script>
