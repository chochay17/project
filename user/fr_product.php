<?php
include 'connect.php';
include 'menu.php'; 

?>
      <div class="page-wrapper">
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">คลังอาหาร</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="card">
<div class="card-body">
   <div class="form-group mb-4">
       <table class="table table-striped  table-hover table-responsive table-bordered"></table>                                
                    <div class="alert alert-primary h4 text-center mb-4 mt-4" role="alert">
                        เพิ่มข้อมูลสินค้า
                    </div> </center>
               

                    <form name="form1" method="post" action="save_product.php" enctype="multipart/form-data">
                        <label>ชื่อสินค้า: </label>
                        <input type="text" name="pname" class="form-control" placeholder="ชื่อสินค้า...." required > <br>
                        <label>ประเภทสินค้า: </label>
                        <select class="form-select" name="typeID" >
                            <?php
                            $sql="SELECT * FROM type ORDER BY type_name";
                            $hand=mysqli_query($condb,$sql);
                            while($row=mysqli_fetch_array($hand)) { 
                            ?>                             
                            <option value="<?=$row['type_id']?>"><?=$row['type_name']?></option>
                            <?php 
                        }
                        mysqli_close($condb);
                             ?> 
                        </select> <br>
                        <label>ราคา: </label>
                        <input type="number" name="price" class="form-control" placeholder="ราคา...." required > <br> 
                        <label>รายละเอียด: </label>
                        <input type="text" name="detail" class="form-control" placeholder="รายละเอียด...." required > <br>              
                        <label>รูปภาพ:</label>
                        <input type="file" name="file1" required  > <br> <br>
                        <button type="submit" class="btn btn-primary">ยืนยัน</button> 
                        <a class="btn btn-danger" href="sh_product.php" role="button">ยกเลิก</a>

                    </form>




                </div>
                </div>