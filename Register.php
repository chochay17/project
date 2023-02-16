<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สร้างบัญชีผู้ใช้</title>

    <!-- Font Icon -->


    <!-- Main css -->
    <link rel="stylesheet" href="css/style3.css">
</head>
<body class="img js-fullheight" style="background-image: url(images/bg-1.webp);">

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="Register_db.php" >
                        <h2 class="form-title">สร้างบัญชีผู้ใช้</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Username"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-input" name="surname" id="password" placeholder="Password"/> 
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="hidden"  name="status_login" class="form-input" disabled value="customer" >
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="บันทึก"/>
                        </div>
                    </form>
                    
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>