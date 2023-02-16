<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'connect.php';
include 'menu.php';
//query
$query = "SELECT * FROM tbl_table WHERE id=$_GET[id]";
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
            <h4 class="page-title">การจองโต๊ะ</h4>
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
      <form action="save_booking.php" method="post">
        <div class="form-group row">
          <label class="col-sm-2 ">เลขโต๊ะ</label>
          <div class="col-sm-4">
            <input type="text" name="table_name" class="form-control" disabled value="<?php echo $row['table_name'];?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 ">ผู้จอง</label>
          <div class="col-sm-7">
            <input type="text" name="booking_name" class="form-control" required placeholder="ชื่อผู้จอง" minlength="5">
          </div>
        </div>
        <div class="form-group row">
                      <label class="col-sm-2 ">จำนวน(คน)</label>
                      <div class="col-sm-2">
                        <input  type="number" min="1" max="100" value="1" class="form-control" name="booking_amt" >
                      </div>
                    </div>
        <div class="form-group row">
          <label class="col-sm-2 ">วันที่</label>
          <div class="col-sm-5">
            <input type="date" name="booking_date" class="form-control" required value="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>">
          </div>
          <label class="col-sm-1 ">เวลา</label>
          <div class="col-sm-3">
            <input type="time" name="booking_time" class="form-control" required placeholder="เวลา">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 ">เบอร์โทร</label>
          <div class="col-sm-7">
            <input type="text" name="booking_phone" class="form-control" required placeholder="เบอร์โทร" minlength="10" maxlength="10">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 ">ผู้บันทึก</label>
          <div class="col-sm-3">
            <input type="text" name="booking_staff" class="form-control" readonly value="พนักงาน">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 "></label>
          <div class="col-sm-10">
            <input type="hidden" name="table_id" value="<?php echo $_GET['id'];?>">
           <button type="submit" class="btn btn-success">บันทึกการจอง</button>
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
<footer class="footer text-center"> 2023 © Project by Somchai & Atsawut  </footer>
            </footer>
</div>

</body>

</html>