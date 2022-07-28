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
        <div class="col-md-6"></div>
    </div>
    <hr>
    <form id="addSupplier"  enctype="multipart/form-data" method="post" action="../controller/purchasingController.php?status=add_supplier">
        <div class="row">
            <div class="col-md-3">
                <label class="control-label"> Name &nbsp;</label>
            </div>
            <div class="col-md-3">
                <label class="control-label"><?php echo $supRow["com_name"];?></label>
            </div>
            <div class="col-md-3">
                <label class="control-label"> Contact Number 1 &nbsp;</label>
            </div>
            <div class="col-md-3">
                <label class="control-label"><?php echo $supRow["com_cno1"];?></label>
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
                <label class="control-label"><?php echo $supRow["com_cno2"];?></label>
            </div>

            <div class="col-md-3 ">
                <label class="control-label"> Email &nbsp;</label>
            </div>
            <div class="col-md-3">
                <label class="control-label"><?php echo $supRow["com_email"];?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label class="control-label"> Address &nbsp;</label>
            </div>
            <div class="col-md-9">
                <label class="control-label"><?php echo $supRow["address_no"].",".$supRow["address_street"].",".$supRow["address_city"];?></label>
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
                <label class="control-label"><?php echo $supRow["person_name"];?></label>
            </div>

            <div class="col-md-3 ">
                <label class="control-label">  Email &nbsp;</label>
            </div>
            <div class="col-md-3 ">
                <label class="control-label"><?php echo $supRow["person_email"];?></label>
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
                <label class="control-label"><?php echo $supRow["person_cno1"];?></label>
            </div>

            <div class="col-md-3 ">
                <label class="control-label">Contact Number 2 &nbsp;</label>
            </div>
            <div class="col-md-3">
                <label class="control-label"><?php echo $supRow["person_cno2"];?></label>
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
                <label class="control-label"><?php echo $supRow["nic"];?></label>
            </div>
            <div class="col-md-3 ">
                <label class="control-label"> Position &nbsp;</label>
            </div>
            <div class="col-md-3">
                <label class="control-label"><?php echo $supRow["positionn"];?></label>
            </div>
        </div>
    </form>
</div>
<?php include '../includes/footer.php';?>


