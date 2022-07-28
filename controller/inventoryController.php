<?php
if(isset($_REQUEST["status"])) {
include "../model/medicine_item_model.php";
$itemsObj= new Items();
$status=$_REQUEST["status"];

switch ($status) {
    case "add_item":

         $item_name = $_POST["item_name"];
         $unit = $_POST["unit"];

        try {
            if ($item_name == "") {
                throw new Exception("Item cannot be Empty!!");
            }
            if ($unit == "") {
                throw new Exception("Unit cannot be Empty");
            }
//            $isValid = $itemsObj->itemExist($item_id);
//            if ($isValid=== false) {
//                throw new Exception("Already Item Added!");
//            }
            $itemId = $itemsObj->addItems($item_name, $unit);
            $msg = "Successfully Inserted Item";
            $msg = base64_encode($msg);
            ?>
            <script>
                window.location = "../view/view_inventory.php?msg=<?php echo $msg;?>"
            </script>
            <?php
        }

        catch (Exception $ex) {
            $msg = $ex->getMessage();
            $msg = base64_encode($msg);
            ?>
            <script>
                window.location = "../view/view_inventory.php?msg=<?php echo $msg; ?>"
            </script>
            <?php
        }

            break;

        case "delete_item":
            $itemId = $_POST['item_id'];
            $itemsObj->deleteItem($itemId);
            echo $itemId;
            break;

        }



}




