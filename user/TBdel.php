<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'connect.php';
include('menu.php');
//query
$query = "SELECT * FROM tbl_table t,tbl_booking b WHERE t.id=$_GET[id] ";
$result = mysqli_query($condb, $query);
$row = mysqli_fetch_array($result);
//print_r($row);
?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
</head>

<body>

<div class="page-wrapper">

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">ยกเลิกโต๊ะ</h4>
        </div>
      
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="container-fluid">
<div class="card">
<div class="card-body">
<div class="container">
<div class="row">
<div class="col-sm-2 col-md-2"></div>
<div class="col-12 col-sm-11 col-md-7 devbanban" style="margin-top: 50px;">

    <div style="margin-left: 20px;">
      <form action="tableout.php" method="post">
        <div class="form-group row">
          <label class="col-sm-2 ">เลขโต๊ะ</label>
          <div class="col-sm-4">
            <input type="text" name="table_name" class="form-control" disabled value="<?php echo $row['table_name'];?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 ">ผู้จอง</label>
          <div class="col-sm-7">
          <input type="text" name="booking_name" class="form-control" disabled value="<?php echo $row['booking_name'];?>">
          </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 ">จำนวน(คน)</label>
            <div class="col-sm-2">
            <input type="number" name="booking_amt" class="form-control" disabled value="<?php echo $row['amount'];?>">
            </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 ">วันที่</label>
          <div class="col-sm-5">
            <input type="date" name="booking_date" class="form-control"disabled value="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>">
          </div>
          <label class="col-sm-1 ">เวลา</label>
          <div class="col-sm-3">
            <input type="time" name="booking_time" class="form-control" disabled value="<?php echo $row['booking_time'];?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 ">เบอร์โทร</label>
          <div class="col-sm-7">
            <input type="text" name="booking_phone" class="form-control" disabled value="<?php echo $row['booking_phone'];?>" minlength="10" maxlength="10">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 ">ผู้บันทึก</label>
          <div class="col-sm-3">
            <input type="text" name="booking_staff" class="form-control" disabled value="พนักงาน">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 "></label>
          <div class="col-sm-10">
            <input type="hidden" name="table_id" value="<?php echo $_GET['id'];?>">
           <button type="submit" class="btn btn-success">บันทึก</button>
           <br>
          
          
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

</body>

</html>
</body>

</html>