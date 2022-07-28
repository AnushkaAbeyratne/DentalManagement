<?php
include '../includes/header.php';
include "../model/medicine_item_model.php";
include "../model/purchasing_model.php";
$itemsObj= new Items();
$itemResult=$itemsObj->getUnits();

$purchseObj= new Purchase();
$purchaseResult=$purchseObj->viewStock();

?>
<title>VIEW INVENTORY</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h3 align="left" style="color: #006699"><img src="../images/inventory%20(1).png" width="60px" height="60px"/> INVENTORY</h3>
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
            <a href="#" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#itemModal">
                <i class="fa fa-plus"></i>&nbsp;Add New Item
            </a>
        </div>
        <div class="col-md-2">
            <a href="#" class="btn btn-block btn-outline-success" data-toggle="modal" data-target="#viewItemModal">
                <i class="fa fa-search"></i>&nbsp;View Item
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Inventory</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive-*" id="myTable">
                <thead>
                <tr>
                    <th scope="col">Item Id</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Batch Id</th>
                    <th scope="col">Current Qty</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col">Receive Price(Rs).</th>
                    <th scope="col">Selling Price(Rs).</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row=$purchaseResult->fetch_assoc()) {
                    $purchaseId = $row["batch_id"];
                    $purchaseId = base64_encode($purchaseId);
                    ?>
                    <tr>
                        <td scope="row"><?php echo $row["item_id"]; ?></td>
                        <td><?php echo $row["item_name"]; ?></td>
                        <td><?php echo $row["batch_id"]; ?></td>
                        <td><?php echo $row["current_qty"]; ?></td>
                        <td><?php echo $row["exp_date"]; ?></td>
                        <td><?php echo $row["receive_price"]; ?></td>
                        <td><?php echo $row["selling_price"]; ?></td>
                    </tr>
                    <?Php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<!-- Add item modal-->
    <div class="modal fade" id="itemModal" role="dialog">
        <div class="modal-dialog">
            <form action="../controller/inventoryController.php?status=add_item" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Add Item</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Item Name</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="item_name" id="item_name"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Unit</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="unit" id="unit">
                                    <option value="">Select Unit</option>
                                    <?php
                                    while($row=$itemResult->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['unit_id'];?>"><?php echo $row['unit_name'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-block btn-success" value="Save"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!--  End add item modal -->

<!--      view item modal -->
    <div class="modal fade" id="viewItemModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>View Item</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <table class="table table-striped table-hover table-responsive-*">
                            <thead>
                                <tr>
                                    <th scope="col">Item Id</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $itemResult=$itemsObj->ViewItems();
                                while ($itemRow=$itemResult->fetch_assoc()){
                                    $itemId = $itemRow["item_id"];
                                    $itemId = base64_encode($itemId);
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $itemRow["item_id"]; ?></td>
                                        <td><?php echo $itemRow["item_name"];?></td>
                                        <td><?php echo $itemRow["unit_name"];?></td>
                                    </tr>
                                <?Php
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
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

