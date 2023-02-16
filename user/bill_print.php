<?php
session_start();
include 'menu.php';
include 'connect.php';
$id = $_GET['id'];
$sql = "SELECT * FROM tb_order WHERE orderID= '$id' ";
$result = mysqli_query($condb, $sql);
$rs = mysqli_fetch_array($result);
$total_price = $rs['total_price'];
$orderID = $rs['orderID'];
?>
<div class="page-wrapper">
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">ใบเสร็จ</h4>
        </div>
    </div>
</div>
<div class="container-fluid" >
<div class="card">
<div class="card-body">
   <div class="form-group mb-4">
       <table class="table table-striped  table-hover table-responsive table-bordered"></table>
                    <div class="alert alert-primary h4 text-center mb-4 mt-4" role="alert">
                        การสั่งซื้อเสร็จสมบูรณ์
                    </div>
            เลขที่การสั่งซื้อ : <?=$rs['orderID']?> <br>
            ชื่อลูกค้า : <?=$rs['cus_name']?> <br>
            โต๊ะ : <?= $rs['table1'] ?> <br>
            เบอร์โทร : <?=$rs['telephone']?> <br>
            <br>
            <div class="card md-4 mt-4">
                <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th >รหัสสินค้า</th>
                        <th >ชื่อสินค้า</th>
                        <th >ราคา</th>
                        <th >จำนวน</th>
                        <th >ราคารวม</th>
                    </tr>
                </thead>
                <tbody></tbody>
<?php
$sql1="select * from order_detail d,sh_product p where d.pro_id=p.pro_id and d.orderID= $orderID ";
$result1 = mysqli_query($condb, $sql1);
while ($row= mysqli_fetch_array($result1)){

?>          
                    <tr>
                        <td><?=$row['pro_id']?></td>
                        <td><?=$row['pro_name']?></td>
                        <td><?=$row['orderPrice']?></td>
                        <td><?=$row['orderQty']?></td>
                        <td><?=$row['Total']?></td>
                    </tr>
                </tbody>
            <?php 
            }
            mysqli_close($condb);
            ?>
            </table>
            
            <h5 class="text-end">รวมเป็นเงิน <?=number_format($total_price,2)?> บาท</h5>
            </div>
            </div>
   </div>
   <div> ขอบคุณที่มาอุดหนุนนะครับ </div> <br><br>
   <div class="text-center">
   <a href="bill.php" class="btn btn-success">Back</a>
   <button href="sh_product.php" onclick="window.print()" class="btn btn-success">Print</button>
        </div>
    </div>
    </div>
</div>
</div>
        