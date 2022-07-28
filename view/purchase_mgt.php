<?php
include '../includes/header.php';
include '../model/purchasing_model.php';
$purchaseObj= new Purchase();
?>
<title>PURCHASEMGT</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 8em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Purchase Management</li>
                </ol>
            </nav>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2">&nbsp;</div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <a href="view_supplier.php" style="text-decoration: none">
                <div class="card" style="background-color: whitesmoke;height:220px;color: #366097; border-radius:15px;
                            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
                    <div class="card-body">
                        <img src="../images/inventory.png" width="140px" height="140px" class="card-img-left">
                        <h4 align="right">SUPPLIER</h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <a href="add_grn.php" style="text-decoration: none">
                <div class="card" style="background-color: whitesmoke;height:220px;color: #366097; border-radius:15px;
                            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); padding-top: 1em">
                    <div class="card-body">
                        <img src="../images/purchase-order.png" width="140px" height="140px" class="card-img-left">
                        <h4 align="right">PURCHASE ORDER</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-2">&nbsp;</div>
    </div>
</div>
<?php include '../includes/footer.php';?>



