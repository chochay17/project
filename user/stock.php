<?php
include 'connect.php';
include('menu.php');
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
            <h4 class="page-title">คลังอาหาร</h4>
        </div>
      
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="container-fluid">


<div class="card">
<div class="card-body">
<form class="form-horizontal form-material">
   <div class="form-group mb-4">
       <table class="table table-striped  table-hover table-responsive table-bordered">
      
        <a class="btn btn-primary mb-4" href="fr_stock.php" role="button">เพิ่ม</a>
        <table class="table  table-hover table-responsive table-bordered">
<tr  style="text-align:center ">
    <th>รหัสสินค้า</th>
    <th>ชื่อสินค้า</th>
    <th>ประเภท</th>
    <th>รูปภาพ</th>
    <th>จำนวน</th>
    <th>แก้ไข</th>
    <th>ลบ</th>
</tr>
<?php //cho
$sql = "SELECT * FROM sh_product,type WHERE sh_product.type_id = type.type_id ";
$hand = mysqli_query($condb, $sql);
while($row=mysqli_fetch_array($hand)){
    if($row['amount'] == 0){
        //สินค้าหมด
        $tableClass = "table-danger";
        $txtTitle = "<font color='red'> สินค้าหมด !! </font>";
      }elseif($row['amount'] <= 20) {
        //สินค้ากำลังจะหมด
        $tableClass = "table-warning";
        $txtTitle = "";
      }else{

        $tableClass = "table-info";
        $txtTitle = "";
      }

?>
<tr>
    <td><?=$row['pro_id']?></td>
    <td><?=$row['pro_name']?></td>
    <td><?=$row['type_name']?></td>
    <td><center><img src="img/<?=$row['img']?> "width="100px" hieght="100px"></center></td>
    <td class="<?= $tableClass;?>" style="text-align:right "><?=$row['amount']?></td>
    
    <td><center><a href="st_formedit.php?id=<?= $row['pro_id'];?>" class="btn btn-warning btn-sm">แก้ไข</a></center></td>
    <td><center><a href="st_del.php?id=<?= $row['pro_id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></center></td>
</tr>
<?php
}
mysqli_close($condb);
?>
</table>

</div>
</form>
 </div>
 </div>
 </div>



<!-- ============================================================== -->
<footer class="footer text-center"> 2023 © Project by Somchai & Atsawut  </footer>
            </footer>
</div>
</body>

</html>