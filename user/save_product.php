<?php
include 'connect.php';

$p_name=$_POST['pname'];
$typeID=$_POST['typeID'];
$detail = $_POST['detail'];
$price = $_POST['price'];

//อัพภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_img_name = 'sh_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $img_up = "./img/" . $new_img_name;
    move_uploaded_file($_FILES['file1']['tmp_name'], $img_up);
}else{
    $new_img_name = "";
}

//ตาราง
$sql = "INSERT INTO sh_product(pro_name,type_id,price,detail,img) VALUES('$p_name','$typeID','$price','$detail','$new_img_name')";
$result = mysqli_query($condb, $sql);
if($result){
     echo "<script> alert('บันทึกข้อมูล'); </script>";
     echo "<script> window.location ='sh_product.php' ;   </script>";

}else{
     echo "<script> alert('ไม่สามารถบันทึกข้อมูล'); </script>";
}

?>