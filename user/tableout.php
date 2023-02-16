<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'connect.php';

//print_r($_POST);

if (isset($_POST['table_id'])) {
	
$table_id = $_POST['table_id'];

$sqlUpdate ="UPDATE tbl_table SET table_status=0 WHERE id = $table_id"; //1=จอง
$rsUpdate = mysqli_query($condb, $sqlUpdate);


if($rsUpdate){ //ตรรวจสอบถ้า 2 ตัวแปรทำงานได้ถูกต้องจะทำการบันทึก แต่ถ้าเกิดข้อผิดพลาดจะ Rollback คือไม่บันทึกข้อมูลใดๆ
	echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
 
		mysqli_query($condb, "COMMIT");
		echo '<script>
		setTimeout(function() {
		 swal({
			 title: "แก้ไขข้อมูลสำเร็จ",
			 type: "success"
		 }, function() {
			 window.location = "table.php"; //หน้าที่ต้องการให้กระโดดไป
		 });
	   }, 1000);
   </script>';
	}else{
		mysqli_query($condb, "ROLLBACK");  
		$msg = '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';	
	}
} //iset 
else{
	header("Location: user.php");	
	$conn = null; //close connect db
}
//ลองเอาไปประยุกต์ใช้ดูครับ devbanban.com


?>