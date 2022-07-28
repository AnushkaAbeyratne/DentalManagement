<?php
include_once '../commons/dbConnection.php';
$dbConnObj= new dbConnection();
class Items {

    function addItems($item_name,$unit_unit_id){
        $con=$GLOBALS["con"];
        $sql="INSERT INTO medicine_item(item_name,unit_unit_id)VALUES('$item_name','$unit_unit_id')";
        $con->query($sql);
        $itemId=$con->insert_id;
        return $itemId;

    }

    public function ViewItems()
    {
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM medicine_item i, unit u WHERE i.unit_unit_id=u.unit_id AND i.status=1";
        $result = $con->query($sql);
        return $result;

    }
        public function getItems()
    {
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM medicine_item i, unit u, stock s WHERE i.unit_unit_id=u.unit_id AND s.medicine_item_item_id = i.item_id AND s.stock_status=1 AND i.status=1 GROUP BY i.item_id";
        $result=$con->query($sql);
        return $result;

    }
    public function getItemsDetails()
    {
        $con=$GLOBALS["con"];
        $sql="SELECT item_id,item_name FROM medicine_item";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }
    public function getUnits()
    {
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM unit";
        $result=$con->query($sql);
        return $result;

    }

    function getPriceByItem($medId){
        $con = $GLOBALS["con"];
        $sql = "SELECT MAX(selling_price) AS price FROM stock WHERE medicine_item_item_id='$medId' AND stock_status=1";
        $result = $con->query($sql);
        return $result;
    }

    function deleteItem($itemId){
        $con=$GLOBALS["con"];
        $sql="UPDATE medicine_item SET medicine_item.status=0 WHERE item_id='$itemId'";
        $result=$con->query($sql);
        return $result;
    }

//    function itemExist($itemId)
//    {
//        $con=$GLOBALS['con'];
//        $sql="SELECT 1 FROM medicine_item WHERE item_id='$itemId'";
//        $result=$con->query($sql) or die($con->error);
//        if ($result->num_rows>0){
//            return false;
//        }else{
//            return true;
//        }
//    }

    function getSupplierByItem($supId)
    {
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM medicine_item m, supplier s WHERE m.supplier_sup_id=s.sup_id AND m.item_id='$supId'";
        $result=$con->query($sql);
        return $result;
    }


}
