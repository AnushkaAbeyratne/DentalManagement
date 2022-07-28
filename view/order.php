<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <?php
            include '../includes/header.php'
            ?>
            <br>
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header">
                            <h4>New Orders</h4>
                        </div>
                        <div class="card-body">
                            <form id="get_order_data" onsubmit="return false">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" align="right">Order Date</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="order_date" name="order_date" readonly
                                               class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" align="right">Customer Name*</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="cust_name" name="cust_name"
                                               class="form-control form-control-sm" placeholder="Enter Customer Name" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th style="text-align:center;">Item Name</th>
                                                <th style="text-align:center;">Quantity</th>
                                                <th style="text-align:center;">Price</th>
                                            </tr>
                                            </thead>
                                            <tbody id="invoice_item">
                                            <td><b class="number">1</b></td>
                                            <td>
                                                <select name="pid[]" class="form-control form-control-sm pid" required>
                                                    <option value="">Choose Product</option>
<!--                                                    --><?php
//                                                    while ($row) {
//                                                        ?><!--<option value="--><?php //echo $row['pid']; ?><!--">--><?php //echo $row["product_name"]; ?><!--</option>--><?php
//                                                    }
//                                                    ?>
                                                </select>
                                            </td>
                                            <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
                                            <td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></span>
                                                <span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>
                                            </tbody>
                                        </table>
                                        <center style="padding:10px;">
                                            <button id="add" style="width:150px;" class="btn btn-success">Add</button>
                                            <button id="remove" style="width:150px;" class="btn btn-danger">Remove</button>
                                        </center>
                                    </div>
                                </div>
                                <br/>
                                <center>
                                    <input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Order">
                                    <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print Invoice">
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
    <script type="text/javascript" >
        $(document).ready(function() {
            $("#add").click(function (){
                addNewRow();
                function addNewRow() {
                    $("#invoice_item").append(getNewOrderItem:1);
                    var n = 0;
                    $(".number").each(function () {
                        $(this).html(++n);
                    })

                });
        })
        });
    </script>
</html>
