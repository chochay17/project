<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM sh_product WHERE pro_id='$id'";
if(mysqli_query($condb,$sql)){
        echo "<script> alert('บันทึกข้อมูล'); </script>";
        echo "<script> window.location ='stock.php' ;   </script>";
   
   }else{
        echo "<script> alert('ไม่สามารถบันทึกข้อมูล'); </script>";
   }


?>