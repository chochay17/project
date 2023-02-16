<?php 
include 'connect.php';
include 'menu.php';
?>

<div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">รายการลูกค้า</h4>
                    </div>
                  
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
   
       
   <div class="card">
       <div class="card-body">
           <form class="form-horizontal form-material ">
               <div class="form-group mb-4">
                   <table class="table table-striped  table-hover table-responsive table-bordered">
              
                  
        <table class="table table-striped table-hover">
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อลูกค้า</th>
                <th>โต๊ะ</th>
                <th>เบอร์โทรศัพท์</th>
                <th>ยอดรวมสุทธิ</th>
                <th>วัน/เดือน/ปี-เวลา</th>
                <th> <center> สถานะ <center> </th>
                <th>แก้ไข</th>
                <th>ลบ</th>
               
            </tr>
            <?php
            $sql = "SELECT * FROM tb_order WHERE orderID  ";
            
            $hand = mysqli_query($condb, $sql);
            
            while($row=mysqli_fetch_array($hand)){
                $sta =  $row['order_satatus'];


            ?>
            <tr>
                <td><?=$row['orderID']?></td>
                <td><?=$row['cus_name']?></td>
                <td><?=$row['table1']?></td>
                <td><?=$row['telephone']?></td>
                <td><?=$row['total_price']?></td>
                <td><?=$row['reg_date']?></td>
                <td>
                         <?php 
                            if($sta  <= 0 ){ ?>
                         <center> <a  class="btn btn-success"> เสร็จสิ้น </a> </center> 
                         <?php } else {  ?>
                         <center>  <a href="bill_sta.php?id=<?= $row['orderID'];?>"  class="btn btn-primary"> รอดำเนินการ </a></center>
                         <?php
                          }
                          ?>
                </td>
                <td><a href="bill_print.php?id=<?= $row['orderID'];?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                <td><a href="bill_del.php?id=<?= $row['orderID'];?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
               
               
                
            </tr>
            <?php if($sta  <= 0){
                    @$amount_total += $row['total_price'];
                    }
                }
                    ?>
                    <tr class="table-danger ">
                    <td class="text-over" colspan="4"> รวมเป็นเงิน </td>
                    <td class="text-over"> <?php echo number_format($amount_total,2);?> </td>
                    <td class="text-over"> บาท </td>
                    <td> </td>
                    <td> </td>
                    </tr>
            <?php
            
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