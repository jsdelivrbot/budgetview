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
        window.onLoad = dochange('strategic3', -1);
        window.onLoad = dochange('strategic20', -1);
        window.onLoad = dochange('economic_plan', -1);
        window.onLoad = dochange('integration_29', -1);
        window.onLoad = dochange('project_group_p', -1);
        
    </script>



    <style>
   

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
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

<div class="container">

   <legend> <a href="./" class="btn btn-default" > กลับ</a> แบบฟอร์มเพิ่มโครงการแผนบูรณาการส่งเสริมและพัฒนาจังหวัดและกลุ่มจังหวัด</legend>
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>ขั้นตอนที่ 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>ขั้นตอนที่ 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>ขั้นตอนที่ 3</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
            <p>ขั้นตอนที่ 4</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
            <p>ขั้นตอนที่ 5</p>
        </div>
    </div>
</div>





  <form action="assets/add_pro_p.php" method="post" >


    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12"><hr>
                      <div class="form-group">
                        <label for="exampleSelect1">เลือกยุทธศาสตร์ชาติ 20 ปี</label>
                          <span id="strategic20">
                            <select class="form-control" id="select" data-cip-id="cIPJQ342845642" required="required">
                              <option value=''>- กรุณาเลือก -</option>
                            </select>
                          </span>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelect1">เลือกแนวทางพัฒนา</label>
                          <span id="substrategic20">
                            <select class="form-control" id="select" data-cip-id="cIPJQ342845642"  required="required">
                              <option value=''>- กรุณาเลือก -</option>
                            </select>
                          </span>
                      </div> 
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>



    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12"><hr>
                 <div class="form-group">
                        <label for="exampleSelect1">แผนพัฒนาเศรษฐกิจและสังคมแห่งชาติฉบับที่ 12 (พ.ศ. 2560-2564) </label>
                          <span id="economic_plan">
                            <select class="form-control" id="select" data-cip-id="cIPJQ342845642" required>
                              <option value=''>- กรุณาเลือก -</option>
                            </select>
                          </span>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelect1">เป้าหมายการพัฒนา</label>
                          <span id="economic_target">
                            <select class="form-control" id="select" data-cip-id="cIPJQ342845642" required>
                              <option value=''>- กรุณาเลือก -</option>
                            </select>
                          </span>
                      </div> 

                      <div class="form-group">
                        <label for="exampleSelect1">ตัวชี้วัด</label>
                          <span id="economic_measure">
                            <select class="form-control" id="select" data-cip-id="cIPJQ342845642" required>
                              <option value=''>- กรุณาเลือก -</option>
                            </select>
                          </span>
                      </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>




    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12"><hr>
                      <div class="form-group">
                        <label for="exampleSelect1">แผนงานบูรณาการเชิงยุทธศาสตร์ (29 แผนงาน)</label>
                          <span id="integration_29">
                            <select class="form-control" id="select" data-cip-id="cIPJQ342845642" required>
                              <option value=''>- กรุณาเลือก -</option>
                            </select>
                          </span>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelect1">เป้าหมายแผนงาน</label>
                          <span id="integration_target">
                            <select class="form-control" id="select" data-cip-id="cIPJQ342845642" required>
                              <option value=''>- กรุณาเลือก -</option>
                            </select>
                          </span>
                      </div> 

                      <div class="form-group">
                        <label for="exampleSelect1">ตัวชี้วัดเป้าหมาย</label>
                          <span id="integration_measure">
                            <select class="form-control" id="select" data-cip-id="cIPJQ342845642" required>
                              <option value=''>- กรุณาเลือก -</option>
                            </select>
                          </span>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelect1">ตัวชี้วัดแนวทาง</label>
                          <span id="integration_how">
                            <select class="form-control" id="select" data-cip-id="cIPJQ342845642" required>
                              <option value=''>- กรุณาเลือก -</option>
                            </select>
                          </span>
                      </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>




    <div class="row setup-content" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12"><hr>
                      
                     <div class="form-group">
                        <label for="exampleSelect1">เลือกกลุ่มโครงการ/ผลผลิต</label>
                              <span id="project_group_p">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- กรุณาเลือก -</option>
                                        </select>
                               </span>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelect1">เลือกห่วงโซ่คุณค่า</label>
                                <span id="sub_project_group_p">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- กรุณาเลือก -</option>
                                        </select>
                               </span>
                      </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>


    <div class="row setup-content" id="step-5">
        <div class="col-xs-12">
            <div class="col-md-12"><hr>

                     <!-- <div class="form-group">
                        <label for="exampleSelect1">เลือกยุทธศาสตร์</label>
                       <span id="strategic3">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- กรุณาเลือก -</option>
                                        </select>
                                    </span>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelect1">เลือกกลยุทธ์</label>
                        <span id="substrategic3">
                                        <select class="form-control" id="select" data-cip-id="cIPJQ342845642" >
                                          <option value=''>- กรุณาเลือก -</option>
                                        </select>
                                    </span>
                      </div> -->

                        <fieldset class="form-group">
                        <b>ประเภทโครงการ</b> 
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="project_cate" id="optionsRadios1" value="โครงการใหม่" checked="" >
                              โครงการใหม่
                            </label>
                          </div>
                          <div class="form-check">
                          <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="project_cate" id="optionsRadios2" value="โครงการต่อเนื่อง" >
                              โครงการต่อเนื่อง
                            </label>
                          </div>
                        </fieldset>


                      <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อโครงการ</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="prj_name" placeholder="" required='required'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1" >เหตุผลความจำเป็น</label>
                         <textarea class="form-control" id="exampleTextarea" rows="3" name="reason" required='required'></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">วัตถุประสงค์โครงการ</label>
                         <textarea class="form-control" id="exampleTextarea" rows="3" name="outcome" required></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">เป้าหมายของโครงการ</label>
                         <textarea class="form-control" id="exampleTextarea" rows="3" name="outputs" required></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">กลุ่มเป้าหมายโครงการ</label>
                         <textarea class="form-control" id="exampleTextarea" rows="3" name="target" required></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">ผู้ที่มีส่วนได้ส่วนเสีย</label>
                        <input type="text" class="form-control" id="" name="who_target" placeholder="" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">ตัวชี้วัดของเป้าหมาย และตัวชี้วัดผลลัพธ์</label>
                         <textarea class="form-control" id="exampleTextarea" rows="3" name="indica_tar" required></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">กิจกรรม -วิธีดำเนินการ</label>
                        <input type="text" class="form-control" id="" name="activity" placeholder="" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">ลักษณะของกิจกรรม</label>
                        <input type="text" class="form-control" id="" name="activity_type" placeholder="" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">ตัวชี้วัดของกิจกรรม</label>
                        <input type="text" class="form-control" id="" name="indica_act" placeholder="" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">ระยะเวลาดำเนินการโครงการ</label>
                         <select class="form-control" id="select" data-cip-id="cIPJQ342845642" name="year_project" >
                             <option value='2562'>ปีงบประมาณ 2562</option>
                             <option value='2563'>ปีงบประมาณ 2563</option>
                             <option value='2564'>ปีงบประมาณ 2564</option>
                             <option value='2565'>ปีงบประมาณ 2565</option>
                             <option value='2566'>ปีงบประมาณ 2566</option>
                             <option value='2567'>ปีงบประมาณ 2567</option>
                             <option value='2568'>ปีงบประมาณ 2568</option>
                             <option value='2569'>ปีงบประมาณ 2569</option>
                             <option value='2570'>ปีงบประมาณ 2570</option>
                          </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">งบประมาณ</label>
                        <input type="number" class="form-control" id="" name="budget" placeholder="" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">ชื่อหน่วยงานที่รับผิดชอบ</label>
                        <input type="text" class="form-control" id="" name="agency" placeholder="" required>
                      </div>

                      <div class="form-group">ประโยชน์ที่คาดว่าจะได้รับ</label>
                         <textarea class="form-control" id="exampleTextarea" rows="3" name="impact" required></textarea>
                      </div>


                <input type="hidden" class="form-control" id="" name="user_id" value="<?php echo $user_id; ?>">
                <input type="hidden" class="form-control" id="" name="project_type" value="p">
                <button class="btn btn-success btn-lg pull-right" type="submit" onclick="return confirm('ยืนยันการบันทึก?')">บันทึกโครงการ</button>
            </div>
        </div>
    </div>



</form>
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


<script>
  $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
</body>

</html>