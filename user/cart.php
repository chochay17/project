<?php
session_start();
include 'menu.php';
include 'connect.php';


?>
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
    <form method="POST" id="form1" action="insert_cart.php">
    <div class="row">
        <div class="col=md-10">
            <table class="table table-hover">
                <tr>    
                    <th>ลำดับที่</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    <th>เพิ่ม-ลด</th>
                    <th>ลบ</th>
                </tr>
                <?php
                echo "project";
                $Total = 0;
                $sumPrice = 0;
                $m = 1;
                
                for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++){
                  if(( $_SESSION["strProductID"][$i]) != ""){
                    $sql1 ="SELECT * FROM sh_product WHERE pro_id = '" .$_SESSION["strProductID"][$i] . "'";
                    $result1 = mysqli_query($condb,$sql1);
                    $row_pro = mysqli_fetch_array($result1);

                        $_SESSION["price"] = $row_pro['price'];
                        $_SESSION["amount"] = $row_pro['amount'];
                        $Total = $_SESSION["strQty"][$i];
                        $sum = $Total *  $row_pro['price'];
                        $sumPrice = $sumPrice + $sum;
                        
                        $_SESSION["sum_price"] = $sumPrice;
                 
                ?>

                <tr>  
                    
                    <td> <?=$m?> </td>
                    <td> <?=$row_pro['pro_name'] ?>  </td>
                    <td> <?=$row_pro['price'] ?>  </td>
                    <td> <?=$_SESSION["strQty"][$i] ?>  </td>
                    <td> <?= $sum?>  </td>
                    <td> 
                    <?php if($_SESSION["strQty"][$i] < $_SESSION["amount"]  ){ 
                            ?>
                        <a href="order.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-primary">+</a>
                        <?php }if($_SESSION["strQty"][$i] > 1 ){
                            ?>
                        <a href="order_del.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-danger">-</a> 
                        
                    </td> <?php }  ?>
                    <td> <a href="or_del.php?Line=<?=$i?>"><img src="/project/user/img/delete.jpg" width="30px" ></a> </td> 
                       
                </tr>
            <?php
            $m = $m + 1;
            }
        }
        
                mysqli_close($condb);
                
            ?>
            <tr>
            <td class="text-end" colspan="4"> รวมเป็นเงิน </td>
            <td class="text-center"> <?=$sumPrice?> </td>
            <td> บาท </td>
            </tr>

            </table>
            <div style="text-align:right">
            <a href="show.php" type="button" class="btn btn-outline-secondary">เลือกสินค้า</a> |
            <button type="submit" class="btn btn-outline-success">ยืนยัน</button>
            </div>
        </div>

        <div class="row">
   <div class="col-md-6">
    <div class="alert alert-success" h4 role="alert">
  ข้อมูลลูกค้า
</div>
ชื่อ :
<input type="text" name="cus_name" class="form-control " required placeholder="ชื่อลูกค้า..."><br>
โต๊ะ :    
<input type="text" name="cus_tbl" class="form-control " required placeholder="โต๊ะ"><br>
เบอร์โทรศัพท์ :
<input type="number" name="cus_tel" class="form-control "  placeholder="เบอร์โทรศัพท์"><br>

</div>
  </div>
</form>
<br><br><br>
    </div>

</div>
</div>
</div>
</div>
</div>
</div>
