<?php


session_start();
require "connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['btn_login']) && $username && $password){

    $query = "SELECT * FROM db_project.login WHERE id_login='$username' AND password_login='$password'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1){
      
        $row = mysqli_fetch_array($result);

        $name = $row['name_login'];
        $status = $row['status_login'];

        switch($status){

            case "admin";
                $_SESSION['admin_name_lon'] = $status;
                Header('Location: admin/dashboard.php');
                break;

                case "user";
                $_SESSION['user_name_login'] = $status;
                Header('Location: user/show.php');
                break;

                case "customer";
                $_SESSION['admin_name_lon'] = $status;
                Header('Location: customer/show.php');
                break;

                default:
                echo"<script>aleipt('สถานะของคุณถูกแก้ไข')</script>";
                Header('Location: index.php');
                break;
                
        }
    
    
    
    }else {  

        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')</script>";
        Header('Refresh:0; url=index.php');

    }


}




?>