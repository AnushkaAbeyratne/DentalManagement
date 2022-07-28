<?php
include '../includes/header.php';
include '../model/appointment_model.php';
include '../model/payment_model.php';
include "../model/medicine_item_model.php";
$paymentObj = new Payment();
if (!isset($_REQUEST["appointment_id"])) {
    ?>
    <script>
        window.location = "../index.php";
    </script>
    <?php
    }
    $paymentId=$_REQUEST["appointment_id"];
    $appointmentId=base64_decode($paymentId);
    $payResult=$paymentObj->viewAppointment($appointmentId);
    $row=$payResult->fetch_assoc();
    $paymentNewId = $paymentObj->getPaymentId();
    ?>

<title>VIEW PAYMENT</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 align="left" style="color: #006699"><img src="../images/budget.png" width="60px" height="60px"/>&nbsp;
                GENERATE INVOICE
            </h3>
        </div>
        <div class="col-md-6">
            <?php if (isset($_REQUEST["msg"])||(isset($_REQUEST["error"]))) { ?>
                <?php if (isset($_REQUEST["msg"])){?>
                    <div class="alert alert-success">
                        <?php echo base64_decode($_REQUEST["msg"]);?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }else {?>
                    <div class="alert alert-danger">
                        <?php echo base64_decode($_REQUEST["error"]);?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }?>
            <?php } ?>
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
                    <li class="breadcrumb-item"><a href="payment.php">Payment</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Generate Invoice</li>
                </ol>
            </nav>
        </div>
    </div>

    <form id="addPayment" enctype="multipart/form-data" method="post" action="../controller/paymentController.php?status=add_invoice">
        <div class="row">
            <div class="col-md-3">
                <label class="control-label">Payment Id</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="invoice_id" placeholder="INV00000" class="form-control" id="invoice_id"
                       style="background-color: white" readonly value="<?php echo $paymentNewId; ?>"/>
            </div>
            <div class="col-md-6">
                <input type="hidden" name="appointment_id" value="<?php echo $row ["appointment_id"]; ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label class="control-label">Patient Name </label>
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo $row["patient_patient_id"] ?>" id="patient_id" name="patient_id"/>
                <input type="text" class="form-control"  readonly style="background-color: white"
                value="<?php echo $row["patient_fname"]." ".$row["patient_lname"];?>"/>
            </div>
            <div class="col-md-3">
                <label class="control-label">Doctor Name </label>
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo $row["employee_emp_id"] ?>" id="dentist_id" name="dentist_id"/>
                <input type="text" class="form-control"  readonly style="background-color: white"
                       value="<?php echo $row["emp_fname"]." ".$row["emp_lname"];?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label class="control-label">App date </label>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="appointment_date" name="appointment_date" readonly style="background-color: white"
                       value="<?php echo $row["appointment_date"];?>"/>
            </div>
            <div class="col-md-3">
                <label class="control-label">App time </label>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="schedule_time" name="schedule_time" readonly style="background-color: white"
                       value="<?php echo $row["timeslot_start_time"];?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label class="control-label">Treatment Type </label>
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo $row["treatment_treatment_id"];?>" id="treatment_id" name="treatment_id"/>
                <input type="text" class="form-control" readonly style="background-color: white"
                       value="<?php echo $row["treatment_name"];?>"/>
            </div>
            <div class="col-md-3">
                <label class="control-label">Treatment Price(Rs). </label>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="treatment_price" name="treatment_price" readonly style="background-color: white"
                       value="<?php echo $row["treatment_price"];?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-9">&nbsp;</div>
            <div class="col-md-3">
                <button type="button" id="addPay" class="btn btn-primary btn-block">
                    <i class="fa fa-plus"></i> ADD
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="col-md-12">
            <table class="table table-responsive-*" id="pay_table">
                <thead>
                    <th class="w-25">Item</th>
                    <th class="w-25">Selling Price(per item)(Rs).</th>
                    <th class="w-25">Qty </th>
                    <th class="w-25">Paid Amount(Rs).</th>
                </thead>
                <tbody id="invtbl"></tbody>
                <tfoot style="text-align:center">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Total (Rs).</span>
                                </div>
                                <input type="text" id="total" name="total" class="form-control" value="<?php echo $row["treatment_price"];?>"
                                       readonly style="background-color: white"/>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-6">&nbsp;</div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-block btn-primary"
                    <i class="fa fa-download"></i> SUBMIT
                </button>
            </div>
            <div class="col-md-3">
                <button type="reset" class="btn btn-block btn-danger">
                    <i class="fa fa-recycle"></i> RESET
                </button>
            </div>
        </div>
    </form>
</div>

<?php include '../includes/footer.php'?>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
        }
    }

    var count=0;
    $('#addPay').click(function () {
        count++;
        $('#invtbl').append(
            '<tr><td>'+
            '<select class="form-control" name="item_id[]" id="item_id_'+ count +'" onChange="getPrice('+ count +')">'+
            '<option value=" " selected> ---- select item here --- </option>'+
            <?php  $itemsObj= new Items(); $itemResult=$itemsObj->getItems(); ?>
            <?php while($row=$itemResult->fetch_assoc()) {?>
            '<option value="<?php echo $row["item_id"]?>"><?php echo $row["item_name"]?> </option>'+
            <?php } ?>
            '</select>'+
            '</td> <td>'+
            '<input type="text" class="form-control" id="price_'+ count +'" name="price[]" readonly style="background-color: white" />'+
            '</td> <td>'+
            '<input type="text" autocomplete="off" class="form-control" id="qty_'+ count +'" onChange="getSubTot('+ count +')" name="qty[]"/>'+
            '</td> <td class="d-flex">'+
            '<input type="text" class="form-control subTot" id="sub_total_'+ count +'"  name="sub_total[]" readonly style="background-color: white" /> &nbsp  &nbsp  &nbsp'+
            '<a href="javascript:void(0)"  ><i class="fa fa-times text-danger remove pt-2" aria-hidden></a></tr>'
        )
    })

    function getPrice(x) {
        var itemId = $("#item_id_"+x).val();
        var url = '../controller/purchasingController.php';
        $.post(url, {
            status: 'get_price',
            batch_id: itemId
        }, function (response) {
            $("#price_"+x).val(response)
        });
    };

    function getSubTot(x) {
        var price = parseFloat($('#price_'+x).val());
        var qty = parseFloat($('#qty_'+x).val());
        var total = parseFloat($('#total').val());

        // console.log(price)
        // console.log(qty)

        if ((price!='')||(qty!='')){
            var stotal= price*qty;
            $("#sub_total_"+x).val(stotal.toFixed(2));
            console.log(stotal)
            var ftotal=total+stotal;

            $("#total").val(ftotal.toFixed(2));
        }
    }

    $('#invtbl').on("click",".remove", function () {
        var subTot = +$(this).parents("tr").find(".subTot").val();
        var  total = +$('#total').val();
        total = total - subTot;
        $('#total').val(total.toFixed(2));
        $(this).parents("tr").remove();
    })

    $("#addPayment").submit(function () {

        var grn_display = $("#invtbl tr").length;
        if (grn_display == 0) {
            $("#alertDiv").html("Table cannot be empty");
            $("#alertDiv").addClass("alert alert-danger");
            $("#grn_display").focus();
            return false;
        }
    })
</script>

