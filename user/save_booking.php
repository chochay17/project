<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'connect.php';

//print_r($_POST);

if (isset($_POST['table_id']) && isset($_POST['booking_name']) && isset($_POST['booking_date'])) {
	

//ประกาศตัวแปรรับค่าจากฟอร์ม

$booking_name = $_POST['booking_name'];
$booking_amt = $_POST['booking_amt'];
$booking_date = $_POST['booking_date'];
$booking_time = $_POST['booking_time'];
$booking_phone = $_POST['booking_phone'];
$booking_staff = $_POST['booking_staff'];
$table_id = $_POST['table_id'];
$dateCreate = date('Y-m-d H:i:s'); //วันที่บันทึก

//insert booking
mysqli_query($condb, "BEGIN");
$sqlInsertBooking	= "INSERT INTO  tbl_booking values(null, '$table_id', '$booking_name',  '$booking_date', '$booking_time', '$booking_phone', '$booking_staff', '$dateCreate', '$booking_amt')";
$rsInsertBooking	= mysqli_query($condb, $sqlInsertBooking);
 
//การใช้ Transection ประกอบด้วย  BEGIN COMMIT ROLLBACK 


//update table status
$sqlUpdate ="UPDATE tbl_table SET table_status=1 WHERE id = $table_id"; //1=จอง
$rsUpdate = mysqli_query($condb, $sqlUpdate);


if($rsInsertBooking && $rsUpdate){ //ตรรวจสอบถ้า 2 ตัวแปรทำงานได้ถูกต้องจะทำการบันทึก แต่ถ้าเกิดข้อผิดพลาดจะ Rollback คือไม่บันทึกข้อมูลใดๆ
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
	$condb = null; //close connect db
}



?>