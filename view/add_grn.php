<?php
include '../includes/header.php';
include '../model/purchasing_model.php';
include '../model/medicine_item_model.php';
$purchaseObj = new Purchase();
$GrnNewId=$purchaseObj->getGrnId();
$purchaseResult=$purchaseObj->getSupplierDetails();
$itemsObj = new Items();
$itemResult=$itemsObj->getItemsDetails();
?>
<title>ADD GRN</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h3 align="left" style="color: #006699"><img src="../images/notebook.png" width="60px" height="60px" />
                <?php echo strtoupper('Add grn')?>
            </h3>
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
                    <li class="breadcrumb-item active" aria-current="page">Add GRN</li>
                </ol>
            </nav>
        </div>
    </div>
    <form id="addGrn" enctype="multipart/form-data" method="post" action="../controller/purchasingController.php?status=add_grn">
        <div class="row">
            <div class="col-md-3">
                <label class="control-label">Grn Id &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="grn_id" id="grn_id" class="form-control" readonly="readonly" value="<?php echo $GrnNewId; ?>"/>
            </div>
            <div class="col-md-3">
                <label class="control-label">Ref Id &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="ref_id" id="ref_id" class="form-control"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-3 ">
                <label class="control-label">Supplier &nbsp;</label>
            </div>
            <div class="col-md-3">
                <select name="supplier" class="form-control" id="supplier">
                    <option value="">Select Supplier</option>
                    <?php
                    while($sup_row=$purchaseResult->fetch_assoc())
                    {
                        ?>
                        <option value="<?php  echo $sup_row["sup_id"]; ?>"><?php  echo $sup_row["com_name"]; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-3">
                <label class="control-label">Item &nbsp;</label>
            </div>
            <div class="col-md-3">
                <select name="item" class="form-control" id="item">
                    <option value="">Select Item</option>
                    <?php
                    while($item_row=$itemResult->fetch_assoc())
                    {
                        ?>
                        <option value="<?php echo $item_row["item_id"];?>"><?php echo $item_row["item_name"];?></option>
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
            <div class="col-md-3 ">
                <label class="control-label">Receive Date </label>
            </div>
            <div class="col-md-3 ">
                <input type="date" id="receive_date" name="receiveDate" value="<?php echo date('Y-m-d')?>" class="form-control" max="<?php echo date('Y-m-d'); ?>"/>
            </div>
            <div class="col-md-3 ">
                <label class="control-label">Expiry Date </label>
            </div>
            <div class="col-md-3 ">
                <input type="date" id="ex_date" class="form-control" min="<?php echo date('Y-m-d'); ?>" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label class="control-label">Receive Price(Rs). &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="r_price" id="r_price" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label class="control-label">Selling Price(Rs). &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="s_price" id="s_price" class="form-control"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label class="control-label">Receive Qty &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="qty" id="qty" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label class="control-label">Paid Amount(Rs). &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="p_amount" id="p_amount" class="form-control" readonly/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-9"></div>
             <div class="col-md-3">
                <button type="button" id="addGRNItem" class="btn btn-primary btn-block">
                    <i class="fa fa-plus"></i>  ADD
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="col-md-12">
            <table class="table table-responsive-*" id="grn_table">
                <thead>
                <th>Item</th>
                <th>Expiry Date</th>
                <th>Receive Qty </th>
                <th>Receive Price (Rs).</th>
                <th>Selling Price(unit)(Rs).</th>
                <th>Paid Amount(unit)(Rs).</th>
                </thead>
                <tbody id="grn_display"></tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="text-right">Total (Rs)</th>
                        <td>
                            <input type="text" class="form-control" id="total" name="total" readonly="readonly" size="2" value="0">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <button id="save" style="width:150px;" class="btn btn-success">
                    <i class="fa fa-download"></i> Save </button>
                &nbsp;
                <button id="remove" style="width:150px;" class="btn btn-danger">
                    <i class="fa fa-remove"></i> Cancel</button>
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


    // get cost per unit when entered received quantity and payed amount in stock
    $('#qty,#r_price').keyup(function (){
        var qty =  parseFloat($('#qty').val());
        var r_price =  parseFloat($('#r_price').val());
        console.log(qty)
        console.log(r_price)
        if(isNaN(qty) || isNaN(r_price)){
            $('#p_amount').val(0);
        }else {
           var result = qty*r_price;
            console.log(result)
            $('#p_amount').val(result.toFixed(2));
        }
    });

    $('#addGRNItem').click(function (){

        let ref_id = $('#ref_id').val();
        let item = $('#item').val();
        let supplier = $('#supplier').val();
        let receive_date = $('#receive_date').val();
        let item_name = $('#item option:selected').text();
        let ex_date = $('#ex_date').val();
        let qty = +$('#qty').val();
        let r_price = +$('#r_price').val();
        let s_price = +$('#s_price').val();
        let p_amount = +$('#p_amount').val();
        let total = parseFloat($('#total').val());

        console.log(item_name)


        if (ref_id == "") {
            $("#alertDiv").html("Ref Id cannot be Empty!!");
            $("#alertDiv").addClass("alert alert-danger");
            $("#ref_id").focus();
            return false;
        }
        if (supplier == "") {
            $("#alertDiv").html("Please select supplier");
            $("#alertDiv").addClass("alert alert-danger");
            $("#supplier").focus();
            return false;
        }
        if (item==""){
            $("#alertDiv").html("Please select item");
            $("#alertDiv").addClass("alert alert-danger");
            $("#item").focus();
            return false;
        }

        if (receive_date == "") {
            $("#alertDiv").html("Please select receive date");
            $("#alertDiv").addClass("alert alert-danger");
            $("#receive_date").focus();
            return false;
        }
        if (ex_date == "") {
            $("#alertDiv").html("Please select expiry date");
            $("#alertDiv").addClass("alert alert-danger");
            $("#ex_date").focus();
            return false;
        }
        if (receive_date == ex_date) {
            $("#alertDiv").html("Receive date and expiry date cannot same");
            $("#alertDiv").addClass("alert alert-danger");
            $("#ex_date").focus();
            return false;
        }
        if (r_price==""){
            $("#alertDiv").html("Please Enter Cost Per Unit Before Add");
            $("#alertDiv").addClass("alert alert-danger");
            $("#r_price").focus();
            return false;
        }
        if (s_price==""){
            $("#alertDiv").html("Please Enter Regular Price Before Add");
            $("#alertDiv").addClass("alert alert-danger");
            $("#s_price").focus();
            return false;
        }
        if (qty==""){
            $("#alertDiv").html("Quantity Cannot be empty");
            $("#alertDiv").addClass("alert alert-danger");
            $("#qty").focus();
            return false;
        }


        let row = "<tr>";

        row += "<td><input type='text' class='form-control' readonly='readonly' value='" + item_name + "' name='txtpname' /><input type='hidden' value='" + item + "' name='productId[]'/></td>";
        row += "<td><input type='text' name='ex_date[]' class='form-control' readonly='readonly' value='" + ex_date +  "' />";
        row += "<td><input type='text' class='form-control' readonly='readonly' value='" + qty + "' name='cpUnit[]' /></td>";
        row += "<td><input type='text' class='form-control' readonly='readonly' value='" + r_price.toFixed(2) + "' name='rPrice[]' /></td>";
        row += "<td><input type='text' class='form-control' readonly='readonly' value='" + s_price.toFixed(2) + "' name='recQnt[]' /></td>";
        row += "<td><input type='text' class='form-control payAnt' readonly='readonly' value='" + p_amount.toFixed(2) + "' name='payAnt[]' /></td>";
        row += "<td><a href='javascript:void(0)'><i class='fa fa-times text-danger remove' aria-hidden='true'><i/></a></td>";
        total = p_amount + total;
        +$('#total').val(total.toFixed(2));
        row += "</tr>";
        $('#grn_display').append(row);

        $('#item').val('');
        $('#qty').val('');
        // $('#supplier').val('');
        // $('#ref_id').val('');
        $('#ex_date').val('');
        // $('#receive_date').val('');
        $('#r_price').val('');
        $('#s_price').val('');
        $('#p_amount').val('');
    });

    // remove product
    $('#grn_display').on("click", ".remove", function() { // after load page if click remove run function
        let payAnt = +$(this).parents("tr").find(".payAnt").val();
        let total = +$('#total').val();
        total = total - payAnt;
        $("#total").val(total.toFixed(2));
        $(this).parents("tr").remove();
    });


    var url = window.location.href;
    var spliturl = url.split("?")[0];
    var newspliturl = spliturl.split("localhost")[1];
    window.history.pushState({},document.title,"" + newspliturl);


</script>


