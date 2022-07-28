<?php
include '../includes/header.php';
print_r($_SESSION["user"]);
include '../model/employee_model.php';
$empObj= new Employee();
$role_id=$_SESSION["user"]["role_id"];
$moduleResult=$empObj->getModulesByRole($role_id);
include '../model/module_model.php';
$moduleObj = new Module();

?>
    <title>DASHBOARD</title>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 4em;">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center font-weight-bold h3">DASHBOARD</div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
        </div>
        <div class="row">
            <?php
            $counter=0;
            while($row=$moduleResult->fetch_assoc()){
            ?>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <a href="<?php echo strtolower($row["module_url"]);?>" style=" text-decoration: none; color: black;">
                    <div class="card" style="border-radius: 1em;  border-left:.5em solid #8B9DC3;  background-color: whitesmoke;
                            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
                        <div class="card-body d-inline-flex">
                            <img src="../images/icon/<?php echo $row["module_image"];?>" class="card-img-left" width="80px" height="80px">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <h5 class="card-title " style="padding-top: 1em;"><?php echo ucfirst($row["module_name"]);?></h5>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            $counter++;
            if($counter%3==0){
            ?>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 2em;">&nbsp;</div>
        </div>
        <div class="row">
            <?php
            }}
            ?>
        </div>
    </div>
<?php include '../includes/footer.php';?>