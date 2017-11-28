<!DOCTYPE html>
 <?php
include('config.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>ระบบบริหารงบประมาณเชิงพื้นที่</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
   
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">กรุณา Log in ก่อนเข้าใช้งาน</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <center><img src="assets/img/login.jpg" alt="" width="85%"></center>
                       

                </div>
                <div class="col-md-6">
                    <div class="alert alert-warning">
                        <?php

                $name_user = $_POST['name_user'];
                $last_user = $_POST['last_user'];
                $phone_user = $_POST['phone_user'];
                $email_user = $_POST['email_user'];
                $pass_user = $_POST['pass_user'];
                $status_user = "user";
                $office_user = $_POST['office_user'];
                $prov_user = $_POST['prov_name'];
                $amp_user = $_POST['amphoe_name'];
                

                $sql1 = "select * from user_id  where email_user = '$email_user' ";
                $query = pg_query($sql1);
                $num = pg_num_rows($query);
                if ($num < 1){
                $sql2 = "insert into user_id 
                ( name_user, last_user, phone_user, email_user, pass_user, status_user, office_user, prov_user, amp_user)
                values 
                ( '$name_user', '$last_user', '$phone_user', '$email_user', '$pass_user', '$status_user', '$office_user', '$prov_user', '$amp_user');"; 

                $result = pg_query($db,$sql2);

                if($result){
                echo "<h4>ทำการสมัครเรียบร้อยแล้ว</h4><p> 
                
                <form class='login-form' action=\"checklogin.php\">        
                    <input type='hidden' class='form-control' id='email' name='email_user' value = '$email_user'>
                    <input type='hidden' class='form-control' id='pass' name='pass_user' value = '$pass_user'>
                    <button class='btn btn-primary btn-lg' type=\"submit\"><font color='white'>เข้าสู่ระบบเพื่อดูข้อมูลเพิ่มเติม</font></button>
                </form>
                
                ";
                
                }else{
                echo "".$sql;
                }

                }else{ 
                echo "
                <h4>Email นี้มีผู้ใช้งานแล้ว โปรดกรอกข้อมูล Email ใหม่หรือเข้าสู่ระบบ </h4> <p>
            
                    <a href=\"login.html\" class=\"btn btn-primary btn-lg\"><font color=\"white\">กลับ</font></a>
                
                ";
                }

                pg_close();


                ?>

                       
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="https://upload.wikimedia.org/wikipedia/th/thumb/1/15/NU_Logo.png/200px-NU_Logo.png" alt="" width="3%">
                    <img src="http://www.cgistln.nu.ac.th/gistweb_2013/images/logo_gistv1.png" alt="" width="10%"> พัฒนาโดย สถานภูมิภาคเทคโนโลยีอวกาศและภูมิสารสนเทศ ภาคเหนือตอนล่าง และมหาวิทยาลัยนเรศวร
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
