<?php
include 'connect.php';
$idpro = $_GET['id'];
$sqli1 = "SELECT * FROM sh_product WHERE pro_id='$idpro' ";
$result = mysqli_query($condb,$sqli1);
$rs=mysqli_fetch_array($result);
$p_rypeID = $rs['type_id'];
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title> Admin </title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/project/plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="/project/plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="/project/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- Logo -->
                    <a class="navbar-brand" href="admin.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="/project/plugins/images/logo-icon.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="/project/plugins/images/logo-text.png" alt="homepage" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <li>
                            <a class="profile-pic" href="/project/index.php">
                                <img src="/project/plugins/images/users/varun.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium">ออกจากระบบ</span></a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="menu.php"
                                aria-expanded="false">
                                <i class="fas fa-utensils" aria-hidden="true"></i>
                                <span class="hide-menu">เมนู</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="bill.php"
                                aria-expanded="false">
                                <i class="fab fa-btc" aria-hidden="true"></i>
                                <span class="hide-menu">คิดเงิน</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="table.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">โต๊ะ</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="stock.php"
                                aria-expanded="false">
                                <i class="fas fa-box-open" aria-hidden="true"></i>
                                <span class="hide-menu">คลังอาหาร</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                                aria-expanded="false">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span class="hide-menu">Google Map</span>
                            </a>
                        </li>
                       
                       
                        
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
        </aside>
     
        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                  
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container">
               
            <div class="row">
                <center><div class="col-sm-6" >
                    <div class="alert alert-primary h4 text-center mb-4 mt-4" role="alert">
                        แก้ไขข้อมูลสินค้า
                    </div> </center>

                    <form name="form1" method="post" action="st_formedit_db.php" enctype="multipart/form-data">
                         <label>รหัสสินค้า: </label>
                        <input type="text" name="pro_id" class="form-control" readonly value=<?=$rs['pro_id']?> > <br>
                     
                        <label>ชื่อสินค้า: </label>
                        <input type="text" name="pname" class="form-control" value=<?=$rs['pro_name']?> > <br>
                        <label>ประเภทสินค้า: </label>
                        <select class="form-select" name="typeID" >
                            <?php
                            $sql="SELECT * FROM type ORDER BY type_name";
                            $hand=mysqli_query($condb,$sql);
                            while($row=mysqli_fetch_array($hand)) { 
                                $ttypeID = $row['type_id'] ;
                            ?>                             
                            <option value="<?= $row['type_id'] ?>"  <?php if ($p_rypeID == $ttypeID) {
                                echo "selected=selected";} ?> >       <?=$row['type_name']?></option>
                            <?php 
                        }
                        mysqli_close($condb);
                             ?>
                        </select>
                        <label>จำนวน: </label>
                        <input type="number" name="num" class="form-control" value=<?=$rs['amount']?> > <br>
                        <label>รูปภาพ:</label>
                        <img src="img/<?=$rs['img']?>" width="120" > <br> <br>
                        <input type="file" name="file1"   > <br> <br>
                        <input type="hidden" name="txtimg" class="form-control" value=<?=$rs['img']?> > <br>
                        <button type="submit" class="btn btn-primary">ยืนยัน</button> 
                        <a class="btn btn-danger" href="stock.php" role="button">ยกเลิก</a>

                    </form>




                </div>
                </div>
            </div>


    </div>
    

    <script src="/project/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/project/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/project/js/app-style-switcher.js"></script>
    <script src="/project/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="/project/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/project/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/project/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="/project/plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="/project/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/project/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>