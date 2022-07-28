<?php
include '../includes/header.php';
include '../model/backup_model.php';
$backupObj=new backup();
$backupResult=$backupObj->getBackup();

?>
<title>BACKUPMGT</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <h3 align="left" style="color: #006699"><img src="../images/backup.png" width="60px" height="60px"/> BACKUP</h3>
        </div>
        <div class="col-md-2">
            <a href="../controller/backupController.php?status=makeBackup"  class="btn btn-block btn-primary">
                <i class="fa fa-database"></i>&nbsp;Make Backup
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Database Backup</li>
                </ol>
            </nav>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive-*" id="myTable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Backup Date</th>
                    <th scope="col">Backup Time</th>
                    <th scope="col">Location</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $count=0;
                while ($row=$backupResult->fetch_assoc()) {
                    $count++;
                    ?>
                    <tr>
                        <td scope="row"><?php echo $count; ?></td>
                        <td><?php echo $row["backup_date"] ?></td>
                        <td><?php echo $row["backup_time"]; ?></td>
                        <td><?php echo $row["location"]; ?></td>

                    </tr>
                    <?Php
                }
//                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include '../includes/footer.php';?>

