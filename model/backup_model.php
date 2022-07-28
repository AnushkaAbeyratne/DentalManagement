<?php
include_once '../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class backup{

    function showTables() {
        $con = $GLOBALS["con"];
        $sql = "SHOW TABLES";
        $result = $con->query($sql);
        return $result;
    }

    function selectTable($table) {
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM $table";
        $result = $con->query($sql);
        return $result;
    }

    function getCreateTable($table) {
        $con = $GLOBALS["con"];
        $sql = "SHOW CREATE TABLE $table";
        $result = $con->query($sql);
        return $result;
    }
    function addBackup($location) {
        date_default_timezone_set('Asia/colombo');
        $date=date('Y-m-d');
        $time=date('H:i:s',time());
        $con = $GLOBALS["con"];
        $sql = "INSERT INTO backup (backup_date,backup_time,location)VALUES ('$date','$time','$location')";
        $result = $con->query($sql);
        return $result;
    }
    function getBackup(){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM backup";
        $result = $con->query($sql);
        return $result;
    }



}