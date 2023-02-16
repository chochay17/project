<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'connect.php';
include('menu.php');
//query
$query = "SELECT * FROM tbl_table ORDER BY id ASC";
$result = mysqli_query($condb, $query);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel="icon" type="image/png" sizes="16x16" href="/project/plugins/images/favicon.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<div class="page-wrapper " style="background-image: url(img/img-bg/bg-2.jpeg);">

            <div class="page-breadcrumb bg-white"   >
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">โต๊ะ</h4>
                    </div>
                  
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
   
         
   <div class="card">
       <div class="card-body">
           <form class="form-horizontal form-material">
               
             
              <center>
              <div class="row" style="margin-bottom: 1px;"  >
                <?php foreach ($result as  $row) {
                  if($row['table_status']==0){ //ว่าง
                    echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 15px;" >';
                  echo '<a href="booking.php?id='.$row["id"].'&act=booking"class="" ><img src="img/table.png "width="80" height="100" "></a></div>';
                    }elseif($row['table_status']==1){ //ถูกจอง
                      echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 15px;">';
                    echo '<a href="TBdel.php?id='.$row["id"].'&act=booking" class="" ><img src="img/x.webp "width="50" height="50" "></a></div>';
                      }else{

                      }
                      
                    } ?>
                  </div>
                  <p>หมายเหตุ X = ไม่ว่าง</p>
                  </center>
                  </table>
       
       </div>
          </form>
           </div>
           </div>
           


<!-- ============================================================== -->
<footer class="footer text-center"> 2023 © Project by Somchai & Atsawut  </footer>
</div>      
          
        </body>
</html>