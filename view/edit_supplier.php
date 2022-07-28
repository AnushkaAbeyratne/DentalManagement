<?php
include '../includes/header.php';
include '../model/purchasing_model.php';
$purchaseObj= new Purchase();
if(!isset($_REQUEST["sup_id"]))
{
    ?>
    <script> window.location="../index.php"</script>
    <?php
}
$supResult=$purchaseObj->getSupplierDetails();
$supId=$_REQUEST["sup_id"];
$supId=base64_decode($supId);
$supResult=$purchaseObj->viewSupplier($supId);
$supRow=$supResult->fetch_assoc();

?>
<title>SUPPLIER DETAILS</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 align="left" style="color: #006699"><img src="../images/profile.png" width="60px" height="60px"/> SUPPLIER DETAILS</h3>
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
                    <li class="breadcrumb-item"><a href="view_supplier.php">View Supplier</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Supplier Details</li>
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
    <form id="addSupplier" enctype="multipart/form-data" method="post" action="../controller/purchasingController.php?status=edit_supplier">
        <input type="hidden" name="sup_id" value="<?php echo $supId;?>"/>
        <div class="row">
            <div class="col-md-3">
                <label class="control-label"> Name &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="cname" placeholder=" Name" class="form-control" id="cname"
                       value="<?php echo $supRow["com_name"]; ?>"/>
            </div>

            <div class="col-md-3">
                <label class="control-label"> Contact Number 1 &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="ccno1" placeholder="Telephone Number"class="form-control"  id="ccno1"
                       value="<?php echo $supRow["com_cno1"]; ?>"/>
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
                <input type="text" name="ccno2" placeholder="Mobile Number"class="form-control" id="ccno2"
                       value="<?php echo $supRow["com_cno2"]; ?>"/>
            </div>
            <div class="col-md-3 ">
                <label class="control-label"> Email &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="cemail" placeholder="Email" class="form-control" id="cemail"
                       value="<?php echo $supRow["com_email"]; ?>"/>
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
                <input type="text" name="add_no" placeholder="No." class="form-control" id="add_no"
                       value="<?php echo $supRow["address_no"]; ?>"/>
            </div>
            <div class="col-md-3">
                <input type="text" name="add_street" placeholder="Street" class="form-control" id="add_street"
                       value="<?php echo $supRow["address_street"]; ?>"/>
            </div>
            <div class="col-md-3">
                <input type="text" name="add_city" placeholder="City" class="form-control" id="add_city"
                       value="<?php echo $supRow["address_city"]; ?>"/>
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
                    <input type="text" name="pname" placeholder="First Name" class="form-control" id="pname"
                           value="<?php echo $supRow["person_name"]; ?>"/>
                </div>

                <div class="col-md-3 ">
                    <label class="control-label">  Email &nbsp;</label>
                </div>
                <div class="col-md-3 ">
                    <input type="text" name="pemail" placeholder="Email"class="form-control" id="pemail"
                           value="<?php echo $supRow["person_email"]; ?>"/>
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
                    <input type="text" name="pcno1" placeholder="Telephone Number"class="form-control"  id="pcno1"
                           value="<?php echo $supRow["person_cno1"]; ?>"/>
                </div>

                <div class="col-md-3 ">
                    <label class="control-label">Contact Number 2 &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="pcno2" placeholder="Mobile Number"class="form-control" id="pcno2"
                           value="<?php echo $supRow["person_cno2"]; ?>"/>
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
                    <input type="text" name="nic" placeholder="NIC"class="form-control" id="nic"
                           value="<?php echo $supRow["nic"]; ?>"/>
                </div>
                <div class="col-md-3 ">
                    <label class="control-label"> Position &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="Position" placeholder="Position" class="form-control" id="Position"
                           value="<?php echo $supRow["positionn"]; ?>"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

        <div class="row">
            <div class="col-md-3">&nbsp;</div>
            <div class="col-md-9">
                <button id="submit" style="width:250px;" class="btn btn-primary">
                    <i class="fa fa-download"></i> Update
                </button>
                &nbsp;
                <button type="reset" style="width:250px;" class="btn btn-danger">
                    <i class="fa fa-recycle"></i> Reset
                </button>
            </div>
        </div>
        </div>
    </form>
</div>
<?php include '../includes/footer.php';?>

