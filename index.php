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

    $id = $objResult[user_id];

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
            req.open("GET", "admin/location_view.php?data=" + src + "&val=" + val);
            req.send(null);
        }

        window.onLoad = dochange('region', -1);
        window.onLoad = dochange('strategic1', -1);
        
        window.onLoad = dochange('region2', -1);
        window.onLoad = dochange('strategic2', -1);
        window.onLoad = dochange('strategic20', -1);
        window.onLoad = dochange('economic_plan', -1);
        window.onLoad = dochange('integration_29', -1);
        window.onLoad = dochange('all_group', -1);
    </script>


<style type="text/css" media="screen">
    #loading{background: transparent url(https://d13yacurqjgara.cloudfront.net/users/82092/screenshots/1073359/spinner.gif) no-repeat top center;}
</style>
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

                <div class="col-md-3">
                  <a href="#" target="_parent" class="btn btn-block btn-warning"  data-toggle="collapse" data-target="#demo"><h5><b><i class="fa fa-plus"></i>   เพิ่มโครงการใหม่  </b></h5></a>
<div id="demo" class="collapse">
    <a href="add_project_region.php" target="_parent"  class="btn btn-block btn-warning">แผนบูรณาการพัฒนาพื้นที่ระดับภาค</a>
    <a href="add_project_prov.php" target="_parent"  class="btn btn-block btn-warning">แผนบูรณาการส่งเสริมการพัฒนาจังหวัด <br>และกลุ่มจังหวัด</a>
</div>

<hr>
                    <form class="form-horizontal" target="map_php" action="map_budget1.php" method="get">
                        <fieldset>
                            <h4 class="page-head-line">ค้นหาโครงการของท่าน</h4>
                              <div class="form-group"> <label for="select" class="col-lg-2 control-label">ภูมิภาค</label>
                <div class="col-lg-10"> <span id="region">
                                        <select class="form-control" id="select"  data-cip-id="cIPJQ342845642">
                                           <option value='%'>- เลือกทุกภูมิภาค -</option>
                                        </select>
                                    </span> </div>
              </div>
              <div class="form-group"> <label for="select" class="col-lg-2 control-label">เขต</label>
                <div class="col-lg-10"> <span id="re_osm">
                                        <select class="form-control" id="select"  data-cip-id="cIPJQ342845642">
                                           <option value='%'>- เลือกทุกเขต -</option>
                                        </select>
                                    </span> </div>
              </div>
              <div class="form-group"> <label for="select" class="col-lg-2 control-label">จังหวัด</label>
                <div class="col-lg-10"> <span id="prov_name">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                           <option value='%'>- เลือกทุกจังหวัด -</option>
                                        </select>
                                    </span> </div>
              </div>
              <div class="form-group"> <label for="select" class="col-lg-2 control-label">อำเภอ</label>
                <div class="col-lg-10"> <span id="amphoe_name">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                            <option value=''>- เลือกทุกอำเภอ -</option>
                                        </select>
                                    </span> </div>
              </div>
              <div class="form-group"> <label for="select" class="col-lg-2 control-label">ตำบล</label>
                <div class="col-lg-10"> <span id="tambon_name">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''>- เลือกทุกตำบล -</option>
                                        </select>
                                    </span> </div>
              </div>
                            <hr>


                            <h4 class="page-head-line">ประเภทโครงการ</h4>

                            <div class="form-group">
                                <div class="col-lg-12">
                                      <span id="all_group">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- เลือกทั้งหมด -</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

                            <hr>


                            <h4 class="page-head-line">กลุ่มโครงการ/ห่วงโซ่คุณค่า</h4>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <span id="project_group">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- เลือกประเภทโครงการก่อน -</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                     <span id="sub_project_group">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- เลือกทั้งหมด -</option>
                                        </select>
                               </span>
                                </div>
                            </div>
                            <hr>


                            <h4 class="page-head-line">เลือกยุทธศาสตร์ชาติ 20 ปี</h4>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <span id="strategic20">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- เลือกทั้งหมด -</option>
                                        </select>
                                      </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <span id="substrategic20">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642"  >
                                          <option value=''>- เลือกทั้งหมด -</option>
                                        </select>
                                      </span>
                                </div>
                            </div>
                            <hr>


                            <h4 class="page-head-line">แผนพัฒนาเศรษฐกิจและสังคมแห่งชาติฉบับที่ 12</h4>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <span id="economic_plan">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- เลือกทั้งหมด -</option>
                                        </select>
                                      </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <span id="economic_target">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- เลือกทั้งหมด -</option>
                                        </select>
                                      </span>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <div class="col-lg-12">
                                    <span id="economic_measure">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- เลือกทั้งหมด -</option>
                                        </select>
                                      </span>
                                </div>
                            </div> -->
                            <hr>


                            <h4 class="page-head-line">แผนงานบูรณาการเชิงยุทธศาสตร์</h4>

                            <div class="form-group">
                                <div class="col-lg-12">
                                     <span id="integration_29">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- เลือกทั้งหมด -</option>
                                        </select>
                                      </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <span id="integration_target">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- เลือกทั้งหมด -</option>
                                        </select>
                                      </span>
                                </div>
                            </div>
                            <hr>


                            

<!-- 
                            <h4 class="page-head-line">เลือกยุทธศาสตร์</h4>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <span id="strategic1">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''>- เลือกประเด่นยุทธศาสตร์ -</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <span id="substrategic1">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642">
                                          <option value=''>- เลือกกลยุทธ -</option>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <hr> -->


                            <h4 class="page-head-line">เลือกประเภทข้อมูล</h4>

                            <div class="form-group">
                                <div class="col-lg-10">
                                    <div class="">
                                        <label>
                                    <input type="radio" name="check_budget" id="optionsRadios1" value="1" checked="">
                                        จำนวนโครงการในพื้นที่
                                  </label>
                                    </div>
                                    <div class="">
                                        <label>
                                    <input type="radio" name="check_budget" id="optionsRadios2" value="2">
                                        จำนวนงบประมาณในพื้นที่
                                  </label>
                                    </div>
                                    <div class="">
                                        <label>
                                    <input type="radio" name="check_budget" id="optionsRadios1" value="3" >
                                        ห่วงโซ่คุณค่าในพื้นที่
                                  </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>




                    </form>


                </div>

                <div class="col-md-9" id="loading">
                    <iframe src="map_budget1.php"  name="map_php" style="width: 100%; height: 1750px " frameborder="0" scrolling="yes"></iframe>
                </div>


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

  <script type='text/javascript'>

 $(document).ready(function() { 
   $('input[name=check_budget]').change(function(){
        $('form').submit();
   });
  });

</script>
</body>
</body>

</html>