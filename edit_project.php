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

    $user_id = $objResult[user_id];

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

$idproject = $_POST[qwidkp];

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
            req.open("GET", "edit_project.php?data=" + src + "&val=" + val);
            req.send(null);
        }

        window.onLoad = dochange('strategic3', -1);
        
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

      <?php 
     $result = pg_query("select * from  budget_view2 a
                         full join area_project b on a.prj_id = b.id_project
                       where  prj_id = $idproject; ");
    $arr = pg_fetch_array($result);
?>


                    <fieldset>
                      <legend> <button class="btn btn-default"  onclick="goBack()"> กลับ</button> แก้ไขข้อมูลโครงการ</legend>
<form action="assets/add_pro.php" method="get">
                      <div class="form-group">
                        <label for="exampleSelect1">ยุทธศาสตร์ชาติ 20 ปี</label>
                      
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''><?php echo $arr[strategic20]; ?></option>
                                        </select><br>
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''><?php echo $arr[substrategic20]; ?></option>
                                        </select>
                              
                      </div>


                      <div class="form-group">
                        <label for="exampleSelect1">แผนพัฒนาเศรษฐกิจและสังคมแห่งชาติฉบับที่ 12</label>
                      
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''><?php echo $arr[economic_plan]; ?></option>
                                        </select><br>
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''><?php echo $arr[economic_measure]; ?></option>
                                        </select><br>
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''><?php echo $arr[economic_target]; ?></option>
                                        </select>
                              
                      </div>


                      <div class="form-group">
                        <label for="exampleSelect1">แผนงานบูรณาการเชิงยุทธศาสตร์</label>
                      
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''><?php echo $arr[integration_29]; ?></option>
                                        </select><br>
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''><?php echo $arr[integration_target]; ?></option>
                                        </select><br>
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''><?php echo $arr[integration_measure]; ?></option>
                                        </select><br>
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''><?php echo $arr[integration_how]; ?></option>
                                        </select>
                              
                      </div>


                      <div class="form-group">
                        <label for="exampleSelect1">กลุ่มโครงการ/ผลผลิต</label>
                      
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''><?php echo $arr[project_group]; ?></option>
                                        </select><br>
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''><?php echo $arr[sub_project_group]; ?></option>
                                        </select>
                              
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">ประเภทโครงการ</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $arr[project_cate]; ?>" name="project_cate" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อโครงการ</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $arr[prj_name]; ?>" name="prj_name" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">เหตุผลความจำเป็น</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $arr[reason]; ?>" name="reason" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">วัตถุประสงค์โครงการ</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $arr[outcome]; ?>" name="outcome" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">เป้าหมายของโครงการ</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $arr[outputs]; ?>" name="outputs" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">กลุ่มเป้าหมายโครงการ</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $arr[target]; ?>" name="target" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">ผู้ที่มีส่วนได้ส่วนเสีย</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $arr[who_target]; ?>" name="who_target" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">ตัวชี้วัดของเป้าหมาย และตัวชี้วัดผลลัพธ์ </label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $arr[indica_tar]; ?>" name="indica_tar" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">กิจกรรม -วิธีดำเนินการ</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $arr[activity]; ?>" name="activity" placeholder="">
                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail1">ลักษณะของกิจกรรม</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $arr[activity_type]; ?>" name="activity_type" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">ตัวชี้วัดของกิจกรรม</label>
                        <input type="text" class="form-control" value="<?php echo $arr[indica_act]; ?>" id="" name="indica_act" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">ระยะเวลาดำเนินการโครงการ</label>
                        <input type="text" class="form-control" value="<?php echo $arr[year_project]; ?>" id="" name="year_project" placeholder="">
                      </div>


                      <div class="form-group">
                        <label for="exampleInputPassword1">งบประมาณ</label>
                        <input type="text" class="form-control" value="<?php echo $arr[budget]; ?>" id="" name="budget" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">ชื่อหน่วยงานที่รับผิดชอบ</label>
                        <input type="text" class="form-control" value="<?php echo $arr[agency]; ?>" id="" name="agency" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">ประโยชน์ที่คาดว่าจะได้รับ</label>
                        <input type="text" class="form-control" value="<?php echo $arr[impact]; ?>" id="" name="impact" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">ประเภทโครงการ</label>
                        <input type="text" class="form-control" value="<?php echo $arr[project_type]; ?>" id="" name="project_type" placeholder="">
                      </div>

                      <input type="hidden" class="form-control" id="" name="idproject" value="<?php echo $arr[prj_id]; ?>">
                      <input type="hidden" class="form-control" id="" name="user" value="<?php echo $user_id; ?>">



                      <button type="submit" formaction="assets/update_pro.php" class="btn btn-success" onclick="return confirm('ยืนยันการบันทึก?')">ยืนยันการแก้ไข</button>


                      </form>
                    </fieldset>
                  

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
    <script>
function goBack() {
    window.history.back();
}
</script>


</body>

</html>