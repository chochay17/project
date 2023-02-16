<?php
include 'connect.php';
$proid = $_POST['pro_id'];
$proname = $_POST['pname'];
$typeid = $_POST['typeID'];
$num = $_POST['num'];
$img = $_POST['txtimg'];
//ภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_img_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $img_up = "./img/" . $new_img_name;
    move_uploaded_file($_FILES['file1']['tmp_name'], $img_up);
}else{
    $new_img_name = "$img";
}
//อัพเดท
$sql = "UPDATE sh_product SET pro_name = '$proname', type_id = '$typeid',amount = '$num',img ='$new_img_name' WHERE pro_id='$proid'"; //st_product
$result = mysqli_query($condb, $sql);
if($result){
     echo "<script> alert('บันทึกข้อมูล'); </script>";
     echo "<script> window.location ='stock.php' ;   </script>";

}else{
     echo "<script> alert('ไม่สามารถบันทึกข้อมูล'); </script>";
}
?>