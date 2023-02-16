
<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['name']) && isset($_POST['surname'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'condb.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tel = $_POST['status_login'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO login (id_login,password_login,status_login)
    VALUES (:id_login, :password_login, :status_login)");
    $stmt->bindParam(':id_login', $name, PDO::PARAM_STR);
    $stmt->bindParam(':password_login', $surname , PDO::PARAM_STR);
    $stmt->bindParam(':status_login', $tel , PDO::PARAM_STR);
    $result = $stmt->execute();
     // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
 
    if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "Register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>