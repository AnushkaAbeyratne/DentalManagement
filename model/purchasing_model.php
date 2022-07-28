<?php

include_once '../commons/dbConnection.php';
$dbConnection = new dbConnection();

class Purchase{

    function getGrnId(){
        $con = $GLOBALS['con'];
        $sql = "SELECT grn_id FROM grn ORDER BY grn_id DESC LIMIT 1";
        $result = $con->query($sql);
        $rowCount=$result->num_rows;

        if ($rowCount==0 || $rowCount=""){
            $grn_id="GRN00001";
            return $grn_id;
        } else{
            $Id=$result->fetch_array();
            $count=$Id[0];
            $count++;
            return $count;

        }
    }

    function addSupplier($com_name, $com_cno1,$com_cno2, $com_email,$add_no,$add_street,$add_city, $person_name, $person_email, $person_cno1,
                         $person_cno2, $nic, $position){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO supplier(com_name,
                        com_cno1,
                        com_cno2,
                        com_email,
                        address_no,
                        address_street,
                        address_city,
                        person_name,
                        person_email,
                        person_cno1,
                        person_cno2,
                        nic,
                        positionn
                        )VALUES(
                        '$com_name','$com_cno1','$com_cno2','$com_email','$add_no','$add_street','$add_city','$person_name','$person_email',
                        '$person_cno1','$person_cno2','$nic','$position')";
        $result = $con->query($sql);
        $supId = $con->insert_id;
        return $supId;
    }
    function getSupplierDetails()
    {
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM supplier";
        $result=$con->query($sql);
        return $result;
    }
    function viewSupplier($supId)
    {
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM supplier WHERE sup_id='$supId'";
        $result= $con->query($sql);
        return $result;

    }
    function updateSupplier($supId,$com_name,$com_cno1,$com_cno2,$com_email, $add_no,$add_street,$add_city, $person_name, $person_email, $person_cno1,
                            $person_cno2, $nic, $position){
        $con=$GLOBALS['con'];
        $sql="UPDATE supplier SET "
                . "com_name='$com_name',"
                . "com_cno1='$com_cno1',"
                . "com_cno2='$com_cno2',"
                . "com_email='$com_email',"
                ." address_no='$add_no',"
                ."address_street='$add_street',"
                ."address_city='$add_city',"
                . "person_name='$person_name',"
                . "person_email='$person_email',"
                . "person_cno1='$person_cno1',"
                . "person_cno2='$person_cno2',"
                . "nic='$nic',"
                . "positionn='$position'"
                . "WHERE sup_id='$supId'";
        $result= $con->query($sql) ;
        return $result;
    }
    function addGrn($grn_id,$ref_id,$total,$receive_date,$supplier){
        $con=$GLOBALS["con"];
        $sql="INSERT INTO grn(grn_id,
                             ref_id,
                             total,
                             receive_date, 
                             supplier_sup_id
                             )VALUES (
                            '$grn_id','$ref_id','$total','$receive_date','$supplier')";
        $result=$con->query($sql) or die($con->error);
        return $result;

    }
    function addStock($receive_qty,$receive_date,$exp_date,$receive_price,$selling_price,$stock_paid_amount,
                      $medicine_item_item_id,$grn_grn_id){
        $con=$GLOBALS["con"];
        $sql="INSERT INTO stock(receive_qty,
                             current_qty,
                             receive_date,
                             exp_date, 
                             receive_price,
                             selling_price,
                             stock_paid_amount,
                             medicine_item_item_id,
                             grn_grn_id
                             )VALUES (
                            '$receive_qty','$receive_qty','$receive_date','$exp_date','$receive_price','$selling_price',
                            '$stock_paid_amount','$medicine_item_item_id','$grn_grn_id')";
        $result=$con->query($sql) or die($con->error);
        return $result;

    }
    function viewStock(){
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM stock s, medicine_item m, grn g WHERE s.medicine_item_item_id=m.item_id AND s.grn_grn_id=g.grn_id AND s.stock_status=1";
        $result= $con->query($sql);
        return $result;

    }

}

