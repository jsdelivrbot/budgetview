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


$idproject = $_GET[prj];
?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/png" href="assets/img/Network.png">


    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>ระบบบริหารงบประมาณเชิงพื้นที่| GISTNU</title>
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

  
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.css" />

  <style>
    h1 {
      font-family: "th sarabunpsk", Georgia, Serif;
      font-size: 30px;
    }

    #map {
      width: 100%;
      height: 650px;
    }

    .info {
      padding: 6px 8px;
      font: 14px/16px Arial, Helvetica, sans-serif;
      background: white;
      background: rgba(255, 255, 255, 0.8);
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
    }

    .info h4 {
      margin: 0 0 5px;
      color: #777;
    }

    .legend {
      text-align: left;
      line-height: 30px;
      color: #555;
    }

    .legend i {
      width: 18px;
      height: 18px;
      float: left;
      margin-right: 8px;
      opacity: 0.9;
    }
    .show-on-hover:hover > ul.dropdown-menu {
        display: block;    
    }
  </style>
</head>
<?php 
     $result3 = pg_query("select * from  budget_view2 a
                         full join area_project b on a.prj_id = b.id_project
                       where prj_id = $idproject; ");
    $arr3 = pg_fetch_array($result3);
?>
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

                <div class="col-md-12">


                    <div class="col-md-8">
                        <h4 class="page-head-line"><a href="./" class="btn btn-default" title="">กลับ</a> รายละเอียดโครงการ</h4>
                        <table class="table">
                            <tbody>
                                <tr >
                                    <td width="25%">ชื่อโครงการ : </td>
                                    <td><b><?php echo $arr3[prj_name]; ?></b><hr></td>
                                </tr>
                                <tr>
                                    <td>ยุทธศาสตร์ชาติ 20 ปี : </td>
                                    <td><b><?php echo $arr3[strategic20]; ?></b></td>
                                </tr>
                                <tr>
                                    <td>แนวทางพัฒนา : </td>
                                    <td> &nbsp &nbsp &nbsp &nbsp<?php echo $arr3[substrategic20]; ?><hr></td>
                                </tr>
                                <tr>
                                    <td>แผนพัฒนาเศรษฐกิจและสังคมแห่งชาติฉบับที่ 12 (พ.ศ. 2560-2564) : </td>
                                    <td><b><?php echo $arr3[economic_plan]; ?></b></td>
                                </tr>
                                <tr>
                                    <td>เป้าหมายการพัฒนา : </td>
                                    <td> &nbsp &nbsp &nbsp &nbsp<?php echo $arr3[economic_target]; ?></td>
                                </tr>
                                <tr>
                                    <td>ตัวชี้วัด : </td>
                                    <td> &nbsp &nbsp &nbsp &nbsp<?php echo $arr3[economic_measure]; ?> <hr></td>
                                </tr>
                                <tr>
                                    <td>แผนงานบูรณาการเชิงยุทธศาสตร์ : </td>
                                    <td><b><?php echo $arr3[integration_29]; ?></b></td>
                                </tr>
                                <tr>
                                    <td>เป้าหมายแผนงาน : </td>
                                    <td> &nbsp &nbsp &nbsp &nbsp<?php echo $arr3[integration_target]; ?></td>
                                </tr>
                                <tr>
                                    <td>ตัวชี้วัดเป้าหมาย : </td>
                                    <td> &nbsp &nbsp &nbsp &nbsp<?php echo $arr3[integration_measure]; ?></td>
                                </tr>
                                <tr>
                                    <td>ตัวชี้วัดแนวทาง : </td>
                                    <td> &nbsp &nbsp &nbsp &nbsp<?php echo $arr3[integration_how]; ?><hr></td>
                                </tr>
                                <tr>
                                    <td>กลุ่มโครงการ/ผลผลิต : </td>
                                    <td><b><?php echo $arr3[project_group]; ?></b></td>
                                </tr>
                                <tr>
                                    <td>ห่วงโซ่คุณค่า : </td>
                                    <td> &nbsp &nbsp &nbsp &nbsp<?php echo $arr3[sub_project_group]; ?> <hr></td>
                                </tr>
                                <tr>
                                    <td>ยุทธศาสตร์ : </td>
                                    <td><b><?php echo $arr3[strategic]; ?></b></td>
                                </tr>
                                <tr>
                                    <td>กลยุทธ์ : </td>
                                    <td> &nbsp &nbsp &nbsp &nbsp<?php echo $arr3[substrategic]; ?> <hr></td>
                                </tr>
                                <tr>
                                    <td>ประเภทโครงการ : </td>
                                    <td><?php echo $arr3[project_cate]; ?></td>
                                </tr>
                                <tr>
                                    <td>เหตุผลความจำเป็น : </td>
                                    <td><?php echo $arr3[reason]; ?></td>
                                </tr>
                                <tr>
                                    <td>วัตถุประสงค์โครงการ : </td>
                                    <td><?php echo $arr3[outcome]; ?></td>
                                </tr>
                                <tr>
                                    <td>เป้าหมายของโครงการ : </td>
                                    <td><?php echo $arr3[outputs]; ?></td>
                                </tr>
                                <tr>
                                    <td>กลุ่มเป้าหมายโครงการ : </td>
                                    <td><?php echo $arr3[target]; ?></td>
                                </tr>
                                <tr>
                                    <td>ผู้ที่มีส่วนได้ส่วนเสีย : </td>
                                    <td><?php echo $arr3[who_target]; ?></td>
                                </tr>
                                <tr>
                                    <td>ตัวชี้วัดของเป้าหมาย และตัวชี้วัดผลลัพธ์ : </td>
                                    <td><?php echo $arr3[indica_tar]; ?></td>
                                </tr>
                                <tr>
                                    <td>กิจกรรม -วิธีดำเนินการ : </td>
                                    <td><?php echo $arr3[activity]; ?></td>
                                </tr>
                                <tr>
                                    <td>ลักษณะของกิจกรรม : </td>
                                    <td><?php echo $arr3[activity_type]; ?></td>
                                </tr>
                                <tr>
                                    <td>ตัวชี้วัดของกิจกรรม : </td>
                                    <td><?php echo $arr3[indica_act]; ?></td>
                                </tr>
                                <tr>
                                    <td>ระยะเวลาดำเนินการโครงการ : </td>
                                    <td><?php echo $arr3[year_project]; ?></td>
                                </tr>
                                <tr>
                                    <td>งบประมาณ : </td>
                                    <td><?php echo $arr3[budget]; ?></td>
                                </tr>
                                <tr>
                                    <td>ชื่อหน่วยงานที่รับผิดชอบ : </td>
                                    <td><?php echo $arr3[agency]; ?></td>
                                </tr>
                                <tr>
                                    <td>ประโยชน์ที่คาดว่าจะได้รับ : </td>
                                    <td><?php echo $arr3[impact]; ?></td>
                                </tr>
                                
                            </tbody>
                        </table>


                    </div>



                    <div class="col-md-4">

                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#menu1">แผนที่ตำแหน่งดำเนินงาน</a></li>
                        <!-- <li><a data-toggle="tab" href="#menu2">แผนที่รวมโครงการ</a></li> -->
                      </ul>

                      <div class="tab-content">
                        <div id="menu1" class="tab-pane fade in active">
                           <iframe src="landmark/view_mark.php?user=<?php echo $id; ?>&idproject=<?php echo $idproject; ?>" width="100%" height="650px" scrolling="no" frameborder="0"></iframe>

                        </div>

<form method="post" >
    
<button type="submit" formaction="edit_project.php"  name="qwidkp" value="<?php echo $arr3[prj_id]; ?>" class="btn btn-info">แก้ไขข้อมูลโครงการ</button>
<a href="add_area.php?idproject=<?php echo $arr3[prj_id]; ?>&user=<?php echo $id; ?>"  class="btn btn-info">แก้ไขข้อมูลพื้นที่</a>

</form>
                      </div>

                    </div>


                </div>

                <div class="col-md-12">

      <hr>
              <h4 class="page-head-line">พื้นที่ดำเนินการ</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>จังหวัด</th>
                                    <th>อำเภอ</th>
                                    <th>ตำบล</th>
                                </tr>
                            </thead>
                            <tbody>
<?php $result4 = pg_query("select * from  budget_view2 a
                         full join area_project b on a.prj_id = b.id_project
                       where prj_id = $idproject order by prov_name; "); 
                       while ($arr4 = pg_fetch_array($result4)) { ?>
                                <tr>
                                    <td><?php echo $arr4[prov_name]; ?></td>
                                    <td><?php echo $arr4[amp_name]; ?></td>
                                    <td><?php echo $arr4[tam_name]; ?></td>
                                </tr>
<?php } ?>
                            </tbody>
                        </table>
<form method="get" >
    
    
<button type="submit" formaction="assets/delete_pro.php"  name="idproject" value="<?php echo $arr3[prj_id]; ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">ลบโครงการ</button>



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
                    Regional Center of Geo-Informatics and Space Technology, Lower Northern Region, Naresuan University
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>


    <script src="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.js"></script>
    <!-- ECharts -->
    <script src="vendors/echarts/dist/echarts.min.js"></script>
        
    <script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
      var statesData = <?php
//-------------------------------------------------------------
// * Name: PHP-PostGIS2GeoJSON  
// * Purpose: GIST@NU (www.cgistln.nu.ac.th)
// * Date: 2016/10/13
// * Author: Chingchai Humhong (chingchaih@nu.ac.th)
// * Acknowledgement: 
//-------------------------------------------------------------
// Database connection settings


    // Retrieve start point
    // Connect to database

  $sql = "
              with a as (
              select id_project,prov_name,strategic,substrategic
              from budget_view2
              inner join area_project on budget_view2.user_id = area_project.user_id
              group by id_project,prov_name,strategic,substrategic
              )
              select prov_name as name_text,prov_name,count(*) as count,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join province_sim on a.prov_name = province_sim.pv_tn
              
              group by prov_name,geom;               


              ";
            

   // Perform database query
   $query = pg_query($db,$sql);   
   //echo $sql;
    // Return route as GeoJSON
   $geojson = array(
      'type'      => 'FeatureCollection',
      'features'  => array()
   ); 
  
   // Add geom to GeoJSON array
   while($edge=pg_fetch_assoc($query)) {  
      $feature = array(
         'type' => 'Feature',
         'geometry' => json_decode($edge['geojson'], true),
         'crs' => array(
            'type' => 'EPSG',
            'properties' => array('code' => '4326')
         ),
            'properties' => array(
            'gid' => $edge['gid'],
            'name_title' => $edge['name_text'], 
            'province' => $edge['province'],
            'tambon' => $edge['tambon'],
            'amphoe' => $edge['ap_tn'],
            'value_sum' => $edge['count'],
            'value' => number_format($edge['count'])
         )
      );
      
      // Add feature array to feature collection array
      array_push($geojson['features'], $feature);
   }
   // Close database connection
   
   // Return routing result
   // header('Content-type: application/json',true);
  echo json_encode($geojson);

?>
    </script>

    <script type="text/javascript">
      <?php
        if ($check == 1) {
              $name1 = 'โครงการ';
        }
        elseif ($check == 2) {
              $name1 = 'บาท';
        }else {
          $name1 = 'โครงการ';
        }
     ?>



      var map = L.map('map').setView([13.4011203, 100.2525025], 6);

      L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
      }).addTo(map);



      // control that shows state info on hover
      var info = L.control();

      info.onAdd = function(map) {
        this._div = L.DomUtil.create('div', 'info');
        this.update();
        return this._div;
      };




      info.update = function(props) {

        this._div.innerHTML = (props ?
          '<b><center>' + props.name_title  :
          '');
      };
      info.addTo(map);





      // get color depending on population PROV_CODE value


      if (<?php echo "'$check'" ?> == 1) {
        function getColor(d) {
          return d > 25 ? '#603006' :
            d > 20 ? '#c0600c' :
            d > 15 ? '#f07d15' :
            d > 10 ? '#f4a157' :
            d > 5 ? '#f9c99f' :
            '#fdf2e7';
        }
      } else if (<?php echo "'$check'" ?> == 2) {
        function getColor(d) {
          return d > 100000000 ? '#603006' :
            d > 50000000 ? '#c0600c' :
            d > 10000000 ? '#f07d15' :
            d > 5000000 ? '#f4a157' :
            d > 1000000 ? '#f9c99f' :
            '#fdf2e7';
        }
      } else {
        function getColor(d) {
          return d > 25 ? '#603006' :
            d > 20 ? '#c0600c' :
            d > 15 ? '#f07d15' :
            d > 10 ? '#f4a157' :
            d > 5 ? '#f9c99f' :
            '#fdf2e7';
        }
      }




      function style(feature) {
        return {
          weight: 2,
          opacity: 1,
          color: 'white',
          dashArray: '3',
          fillOpacity: 0.9,
          fillColor: getColor(feature.properties.value_sum)
        };
      }

      function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
          weight: 5,
          color: '#666',
          dashArray: '',
          fillOpacity: 0.5
        });

        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
          layer.bringToFront();
        }

        info.update(layer.feature.properties);
      }

      var geojson;

      function resetHighlight(e) {
        geojson.resetStyle(e.target);
        info.update();
      }

      function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
      }



      function onEachFeature(feature, layer) {
        var province = feature.properties.province;
        var amphoe = feature.properties.amphoe;
        var tambon = feature.properties.tambon;

        // var popupText = L.popup().setContent('<center><p><b>กราฟแสดงข้อมูลจำนวนโครงการตามประเด็นยุทธศาสตร์</b><br>ในพื้นที่ ' + feature.properties.name_title + '</p> <iframe src="data.php?region=Central&prov_name=' + province + '&amphoe_name=' + amphoe + '&tambon_name=' + tambon + '&strategic=&check_budget=1&no_sql=1&region2=&strategic2=&check_budget=1" name="map_php" style="width: 100%; height: 350px " frameborder="0" scrolling="yes"  ></iframe>');

        // var customOptions = {
        //   'minWidth': '600'
        // }

        // layer.bindPopup(popupText, customOptions);
        layer.on({
          mouseover: highlightFeature,
          mouseout: resetHighlight
        });
      }



      geojson = L.geoJson(statesData, {
        style: style,
        onEachFeature: onEachFeature
      }).addTo(map);



      var legend = L.control({
        position: 'bottomright'
      });

      legend.onAdd = function(map) {


        if (<?php echo "'$check'" ?> == 1) {
          var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 5, 10, 15, 20, 25],
            labels = [],
            from, to;
        } else if (<?php echo "'$check'" ?> == 2) {
          var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 1000000, 5000000, 10000000, 50000000, 100000000],
            labels = [],
            from, to;
        } else {
          var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 5, 10, 15, 20, 25],
            labels = [],
            from, to;
        }



        for (var i = 0; i < grades.length; i++) {
          from = grades[i];
          to = grades[i + 1] - 1;

          labels.push(
            '<i style="background:' + getColor(from + 1) + '"></i> ' +
            from + (to ? '&ndash;' + to : '+') + ' <?php echo $name1; ?>');
        }




        div.innerHTML = labels.join('<br>');
        return div;
      };

      legend.addTo(map);


$("#geojson").click(function(event) {
    event.preventDefault();
    if(map.hasLayer(geojson)) {document.getElementById("geojson").style.color = "";
        $(this).removeClass('selected');
        map.removeLayer(geojson);
        map.removeControl(legend);
    } else {document.getElementById("geojson").style.color = "green";
        map.addLayer(geojson);        
        $(this).addClass('selected');
        legend.addTo(map);
   }
});




    </script>
  <script>
function goBack() {
    window.history.back();
}
</script>
</body>

</html>