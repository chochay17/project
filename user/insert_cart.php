<?php
session_start();
include 'connect.php';

$cusName= $_POST['cus_name'];
$cusTbl= $_POST['cus_tbl'];
$cusTel= $_POST['cus_tel'];


$sql = "INSERT INTO tb_order(cus_name,table1,telephone,total_price,order_satatus) VALUES('$cusName','$cusTbl','$cusTel',' " .$_SESSION["sum_price"]."','1')";
mysqli_query($condb, $sql);

$orderID = mysqli_insert_id($condb);
$_SESSION["order_id"] = $orderID ;

for ($i = 0; $i <= (int) $_SESSION["intLine"]; $i++) {
    if (($_SESSION["strProductID"][$i]) != "") {
        //ดึงข้อมูล
        $sql1 = "SELECT * FROM sh_product WHERE pro_id ='" . $_SESSION["strProductID"][$i] . "' ";
        $result1 = mysqli_query($condb, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $price = $row1['price'];
        $total = $_SESSION["strQty"][$i] * $price;

        $sql2 = "INSERT INTO order_detail(orderID,pro_id,orderPrice,orderQty,Total) VALUES('$orderID','" . $_SESSION["strProductID"][$i] . "','$price','" . $_SESSION["strQty"][$i] . "','$total')";
        if (mysqli_query($condb, $sql2)) {
            //ตัดสต๊อก
            $sql3 = "UPDATE sh_product SET amount= amount -'" . $_SESSION["strQty"][$i] . "' WHERE pro_id= '" . $_SESSION["strProductID"][$i] . "'";
            mysqli_query($condb, $sql3);
            echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว') </script>";
            echo "<script> window.location = 'print_order.php' </script>";

        } else {
            echo "<script> alert('ไม่สามารถบันทึกข้อมูล'); </script>";

        }
    }
}
mysqli_close($condb);
unset($_SESSION['intLine']);
unset($_SESSION['strProductID']);
unset($_SESSION['strQty']);
unset($_SESSION['sum_price']);
//session_destroy();
?>
   </div>
   </div>
   </div>
   </div>
   </div>
   
   