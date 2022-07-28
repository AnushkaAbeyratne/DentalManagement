<html>
    <head>
    <?php
    include '../includes/bootstrap_includes_css.php';
    include '../model/purchasing_model.php';
    $purchaseObj = new Purchase();
    $purchaseResult=$purchaseObj->getSupplierDetails();
    ?>

    </head>

    <body>
        <div class="container">
            <?php
            include '../includes/header.php'
            ?>

            <div class="row">
                <div class="col-md-12"><h2 style="color: black; text-align: center"><?php echo strtoupper('grn')?></h2></div>
            </div>
            <br>
            <div class="col-md-12">
                <?php
                if(isset($_GET["msg"]))
                {
                    ?>
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
            </div>
            <br/>
            <form id="#" enctype="multipart/form-data" method="post" action="../controller/purchasingController.php">
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">GRN No: &nbsp;</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="grn_no" placeholder="" class="form-control" id="grn_no" />
                    </div>

                    <div class="col-md-3 ">
                        <label class="control-label">Supplier &nbsp;</label>
                    </div>
                    <div class="col-md-3">
                        <select name="user_role" class="form-control"
                                id="supplier">
                            <option value="">Select Supplier</option>
                            <?php
                            while($sup_row=$purchaseResult->fetch_assoc())
                            {
                                ?>
                                <option value="<?php  echo $sup_row["sup_id"]; ?>" >
                                    <?php  echo $sup_row["com_name"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">Supplier Ref No: &nbsp;</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="ref_no" placeholder="" class="form-control" id="ref_no" />
                    </div>
                    <div class="col-md-3 ">
                        <label class="control-label">GRN Note Receive Date </label>
                    </div>
                    <div class="col-md-3 ">
                        <input type="date" id="receive_date" name="receive_date"
                               class="form-control"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">Payment Value &nbsp;</label>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Rs.</span>
                            <input type="text" name="value" class="form-control" id="value" />
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <label class="control-label">GRN Note Enter Date </label>
                    </div>
                    <div class="col-md-3 ">
                        <input type="date" id="enter_date" name="enter_date"
                               class="form-control"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-3">&nbsp;</div>
                    <div class="col-md-9">
                        <button id="save"  type="submit" style="width:150px;" class="btn btn-primary">
                            <i class="fa fa-download"></i> Save </button>
                        &nbsp;
                        <button id="remove" type="reset" style="width:150px;" class="btn btn-danger">
                            <i class="fa fa-refresh"></i> Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
        <?php
        include '../includes/bootstrap_script_includes.php';

        ?>

    <script type="text/javascript">

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript" src="../js/category.js"></script>
</html>


