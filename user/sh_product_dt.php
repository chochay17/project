<?php include 'menu.php'; 
include 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail</title>
</head>
<body>

<div class="page-wrapper">
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">คิดเงิน</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="card">
<div class="card-body">
   <div class="form-group mb-4">
       <table class="table table-striped  table-hover table-responsive table-bordered"></table>
                    <div class="alert alert-primary h4 text-center mb-4 mt-4" role="alert">
                        การสั่งซื้ออาหาร
                    </div>
<div class="container">
  <div class="row">
    <?php 
    $ids=$_GET['id'];
     $sql = "SELECT * FROM sh_product,type  WHERE sh_product.type_id = type.type_id and sh_product.pro_id='$ids' ";
        $result = mysqli_query($condb,$sql);
    $row = mysqli_fetch_array($result);
    $price = $row['price'];
            ?>

    <div class="col-md-4 ">
    <img src="img/<?=$row['img']?>" width="250" height="200"  class=" p-2 my-2 bg-white border" >
    </div>
    <div  class=" col-md-6 mt-5  ">
    <h3> ID: <?=$row['pro_id']?></h3><br>
            <h3 class="text-danger"><?=$row['pro_name']?> </h3>
           <h4 ประเภทสินค้า : <?=$row['type_name']?>> 
            รายละเอียด : <?=$row['detail']?> <br>
            ราคา <b class="text-danger"><?=number_format($price,2)?></b> บาท </h4> <br>
            <a href="order.php?id=<?=$row['pro_id']?>" class="btn btn-outline-success"> Add </a> <br> <br>
             <br>
    </div>
    
  </div>
</div>
 <?php mysqli_close($condb); ?>
</body>
</html>