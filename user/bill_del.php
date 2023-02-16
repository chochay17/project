<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM tb_order WHERE orderID ='$id' ";
if(mysqli_query($condb,$sql)){
        echo "<script> alert('บันทึกข้อมูล'); </script>";
        echo "<script> window.location ='bill.php' ;   </script>";
   
   }else{
        echo "<script> alert('ไม่สามารถบันทึกข้อมูล'); </script>";
   }


?>