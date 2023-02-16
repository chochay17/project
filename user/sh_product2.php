<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel="icon" type="image/png" sizes="16x16" href="/project/plugins/images/favicon.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>


    <?php include 'menu.php' ?>
    <div class="page-wrapper" >

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">เมนู</h4>
                    </div>
                  
                </div>
                <!-- /.col-lg-12 -->
            </div>
    <div class="container-fluid">
<div class="card">
<div class= "img js-fullheight" style="background-image: url(img/img-bg/bg-2.jpeg);">   <!-- bg -->

   <div class="form-group mb-4">
       <table class="table table-striped  table-hover table-responsive table-bordered"></table>
       
    
    <div class="container mt-1">
    <div class="row">
        
        <?php 
        include 'connect.php';
        //แบ่งหน้า
        $perpage = 8;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $start = ($page - 1) * $perpage;
        //แสดงข้อมูล
        $sql = "SELECT * FROM sh_product WHERE type_id=2 limit {$start}, {$perpage} ";
        $hand = mysqli_query($condb,$sql);
        while($row=mysqli_fetch_array($hand)){
        $amount = $row['amount'];
        $price = $row['price'];
        ?>
        
        <div class="col-md-3 mt-3"  >
            <div class=" p-10 my-3 bg-white border" >
            
            <img src="img/<?=$row['img']?>" width="240" height="250" class=" p-2 my-2 bg-white border" > <br>
            ID: <?=$row['pro_id']?> 
            <h5 class="text-success "><?=$row['pro_name']?> </h5>
            ราคา: <b class="text-danger"><?=number_format($price,2)?></b> บาท <br>
            จำนวนคงเหลือ: <b class="text-success"><?= $row['amount'];?></b> ชิ้น <br> <br>
        <?php 
        if($amount <= 0 ){ ?>
           <center> <a href="#" class="btn btn-danger"> สินค้าหมด </a> </center> 
           <?php 
        }else{  ?>
          <center>  <a href="sh_product_dt.php?id=<?=$row['pro_id']?>" class="btn btn-outline-primary">  รายละเอียด </a></center> 
           <?php
        }
         ?>
               <br>
               </div>
        </div>
        <?php
        }
        //mysqli_close($condb);
        ?>

    </div>
    <?php
    $sql1 = "SELECT * FROM sh_product";
    $query1 = mysqli_query($condb,$sql1);
    $total_record = mysqli_num_rows($query1);
    $total_page = ceil($total_record / $perpage);   
    ?>
    </div>
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="sh_product2.php?page=1">Previous</a></li>
   <?php for ($i = 1;$i<=$total_page;$i++) { ?>
    <li class="page-item"><a class="page-link" href="sh_product2.php?page=<?=$i?>"><?=$i?></a></li>
   <?php } ?>
    <li class="page-item"><a class="page-link" href="sh_product2.php?page=<?=$total_page?>">Next</a></li>
  </ul>
</nav>
    <?php mysqli_close($condb); ?>
    </div>
</div>
</div>
</div>
<!-- ============================================================== -->
<footer class="footer text-center"> 2023 © Project by Somchai & Atsawut  </footer>
            </footer>
</div>

   
</body>

</html>