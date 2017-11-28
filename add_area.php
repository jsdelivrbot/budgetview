<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php
include('config.php');

session_start();
$strpg = "SELECT * FROM user_id  WHERE email_user = '".$_SESSION['email_user']."' ";
    $objQuery = pg_query($db,$strpg);
    $objResult = pg_fetch_array($objQuery);

    $status = $objResult[status_user];

 $id = $_GET[user];
    $idproject = $_GET[idproject];


    if($_SESSION['email_user'] == "")
    {
        header('Location: login.html');
        exit();
    }

    else if($status != "user")
    {
        header('Location: login.html');
        exit();
    }



?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/png" href="assets/img/Network.png">

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

    <script language=Javascript>
        function Inint_AJAX() {
            try {
                return new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {}
            try {
                return new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
            try {
                return new XMLHttpRequest();
            } catch (e) {}
            alert("XMLHttpRequest not supported");
            return null;
        };

        function dochange(src, val) {
            var req = Inint_AJAX();
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    if (req.status == 200) {
                        document.getElementById(src).innerHTML = req.responseText;
                    }
                }
            };
            req.open("GET", "location.php?data=" + src + "&val=" + val);
            req.send(null);
        }

        window.onLoad = dochange('prov_name1', -1);
        window.onLoad = dochange('region', -1);
        
    </script>

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


    <!-- LOGO HEADER END-->
    <section class="menu-section ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-left">
                            <li><a href="user.php">ยินดีต้อนรับ คุณ <?php echo $objResult[name_user],' ',$objResult[last_user]; ?></a></li>

                        </ul>
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.php">การบริหารงบประมาณเชิงพื้นที่</a></li>
                            <li><a href="login.html">ออกจากระบบ</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->


    <div class="content-wrapper">
        <div class="container">
            <div class="row">

                  <form action="assets/add_area.php" method="get">
                    <fieldset>
                      <legend>  เพิ่มข้อมูลพื้นที่โครงการ</legend>

                      <div class="form-group">
                        <label for="exampleSelect1">เลือกภูมิภาค</label>
                                    <span id="region">
                                        <select class="form-control" id="select"  data-cip-id="cIPJQ342845642">
                                           <option value='%'>- เลือกภูมิภาค -</option>
                                        </select>
                                    </span>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelect1">เลือกจังหวัด</label>
                                    <span id="prov_name">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                           <option value='%'>- เลือกจังหวัด -</option>
                                        </select>
                                    </span>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelect1">เลือกอำเภอ</label>
                                    <span id="amphoe_name">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                            <option value=''>- เลือกอำเภอ -</option>
                                        </select>
                                    </span>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelect1">เลือกตำบล</label>
                                    <span id="tambon_name">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''>- เลือกตำบล -</option>
                                        </select>
                                    </span>
                      </div>

                      <hr>
                     
<input type="hidden" name="user" value="<?php echo $id; ?>">

         <input type="hidden" class="form-control" id="" name="user_id" value="<?php echo $id; ?>">
        <input type="hidden" class="form-control" id="" name="idproject" value="<?php echo $idproject; ?>">
                      <button type="submit" class="btn btn-primary" >บันทึกพื้นที่</button>
 <button formaction="add_landmark.php" type="submit" class="btn btn-primary" >เพิ่มตำแหน่งแบบเจาะจงพื้นที่</button>

                    </fieldset>
                  </form>
<br>


                  <table class="table">
                      <legend>พื้นที่ที่เพิ่มแล้ว</legend>
                      <thead>
                          <tr>
                              <th>จังหวัด</th>
                              <th>อำเภอ</th>
                              <th>ตำบล</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
 <?php    
                     
                       $result2 = pg_query("select * from  area_project where id_project = '$idproject' order by id_project asc");
              
                while ($arr2 = pg_fetch_array($result2)) { 
                ?>
                          <tr>
                                <td>
                                    <?php echo $arr2[prov_name]; ?>
                                </td>
                                <td>
                                    <?php echo $arr2[amp_name]; ?>
                                </td>
                                <td>
                                    <?php echo $arr2[tam_name]; ?>
                                </td>
                                <td>
                                    <form action="assets/delete_area.php" method="get">
                     <input type="hidden" name="idproject" value="<?php echo $idproject ?>" >
                     <input type="hidden" name="user_id" value="<?php echo $user_id ?>" >
                     <input type="hidden" name="prov_name" value="<?php echo $arr2[prov_name]; ?>" >
                     <input type="hidden" name="amp_name" value="<?php echo $arr2[amp_name]; ?>" >
                     <input type="hidden" name="tam_name" value="<?php echo $arr2[tam_name]; ?>" >     
                                       <button type="submit" name="" class="btn btn-danger"  onclick="return confirm('ยืนยันการลบ?')">X</button>
                                    </form>
                                   
                                </td>
                          </tr>
         <?php } ?>
                      </tbody>
                  </table>
                <form action="project_detail.php" method="get" accept-charset="utf-8">
                    <input type="hidden" name="user" value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-success" name="prj" value="<?php echo $idproject; ?>" onclick="return confirm('ยืนยันการบันทึก?')">เสร็จสิ้นการบันทึก</button>
                 
                </form>
                  

            </div>

        </div>
        <!-- MENU SECTION END-->





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


    <script type="text/javascript">
        // the selector will match all input controls of type :checkbox
        // and attach a click event handler 
        $("input:checkbox").on('click', function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });


        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
        }
    </script>

</body>

</html>