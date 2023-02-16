<?php
include 'connect.php';

$p_name=$_POST['pname'];
$typeID=$_POST['typeID'];
$num=$_POST['num'];
//cho
$price = $_POST['price'];

//อัพภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_img_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $img_up = "./img/" . $new_img_name;
    move_uploaded_file($_FILES['file1']['tmp_name'], $img_up);
}else{
    $new_img_name = "";
}

//ตาราง
$sql = "INSERT INTO sh_product(pro_name,type_id,price,amount,img) VALUES('$p_name','$typeID','$price','$num','$new_img_name')"; // price
$result = mysqli_query($condb, $sql);
if($result){
     echo "<script> alert('บันทึกข้อมูล'); </script>";
     echo "<script> window.location ='stock.php' ;   </script>";

}else{
     echo "<script> alert('ไม่สามารถบันทึกข้อมูล'); </script>";
}

?>