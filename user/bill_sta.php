

$sqlUpdate =" //0=ยกเลิก

<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "UPDATE tb_order SET order_satatus = 0 WHERE tb_order.orderID = $id";
if(mysqli_query($condb,$sql)){
        echo "<script> alert('บันทึกข้อมูล'); </script>";
        echo "<script> window.location ='bill.php' ;   </script>";
   
   }else{
        echo "<script> alert('ไม่สามารถบันทึกข้อมูล'); </script>";
   }


?>