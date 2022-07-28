<?php
include '../includes/header.php';
include '../model/purchasing_model.php';
$purchaseObj= new Purchase();
$supResult=$purchaseObj->getSupplierDetails();

?>

<title>VIEW SUPPLIER</title>
<div class="container">
   <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
   </div>
   <div class="row">
       <div class="col-md-6">
           <h3 align="left" style="color: #006699"><img src="../images/employee%20(1).png" width="60px" height="50px"/> VIEW SUPPLIER</h3>
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
           <a href="add_supplier.php" class="btn btn-block btn-primary">
               <i class="fa fa-plus"></i>&nbsp;Add Supplier
           </a>
       </div>
   </div>
   <div class="row">
       <div class="col-md-12">
           <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                   <li class="breadcrumb-item"><a href="purchase_mgt.php">Purchase Management</a></li>
                   <li class="breadcrumb-item active" aria-current="page">View Supplier</li>
               </ol>
           </nav>
       </div>
   </div>
   <div class="row">
       <div class="col-md-12">
           <table class="table table-striped table-hover table-responsive-*" id="myTable">
               <thead>
               <tr>
                   <th scope="col">Supplier Id</th>
                   <th scope="col">Company Name</th>
                   <th scope="col">Company Email</th>
                   <th scope="col">Person Name</th>
                   <th scope="col">Email</th>
                   <th scope="col">Option</th>
               </tr>
               </thead>
               <tbody>
                <?php
                while ($supRow=$supResult->fetch_assoc()) {
                    $supId = $supRow["sup_id"];
                    $supId = base64_encode($supId);
                    ?>
                    <tr>
                        <td><?php echo $supRow["sup_id"]; ?></td>
                        <td><?php echo $supRow["com_name"]; ?></td>
                        <td><?php echo $supRow["com_email"]; ?></td>
                        <td><?php echo $supRow["person_name"]; ?></td>
                        <td><?php echo $supRow["person_email"]; ?></td>
                        <td>
                            <a href="display_supplier.php?sup_id=<?php echo $supId;?>" class="btn btn-outline-primary">
                                <i class="fa fa-search"></i>&nbsp;View
                            </a>
                            &nbsp;
                            <a href="edit_supplier.php?sup_id=<?php echo $supId;?>" class="btn btn-outline-secondary">
                                <i class="fa fa-pencil"></i>&nbsp;Edit
                            </a>
                        </td>
                    </tr>
                    <?Php
                }
                ?>
                </tbody>
            </table>
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

