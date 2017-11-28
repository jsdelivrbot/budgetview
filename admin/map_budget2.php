<?php 
include('config.php');


$region = $_GET[region];
$prov_name  = $_GET[prov_name];
$amphoe_name  = $_GET[amphoe_name];
$tambon_name  = $_GET[tambon_name];
$check = $_GET[check_budget];
$sub_project_group = $_GET[sub_project_group];
$strategic20 = $_GET[strategic20];
$substrategic20 = $_GET[substrategic20];
$economic_plan = $_GET[economic_plan];
$economic_target = $_GET[economic_target];
$economic_measure = $_GET[economic_measure];
$integration_29 = $_GET[integration_29];
$integration_target = $_GET[integration_target];
$project_group = $_GET[project_group];
$sub_project_group = $_GET[sub_project_group];
$strategic1 = $_GET[strategic1];
$type_project = $_GET[type_project];



$region2 = $_GET[region2];
$prov_name2  = $_GET[prov_name2];
$amphoe_name2  = $_GET[amphoe_name2];
$tambon_name2  = $_GET[tambon_name2];

?>

<!DOCTYPE html>
<html>
<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ระบบบริหารงบประมาณเชิงพื้นที่</title>

    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />


	<style>
	h1 {
			font-family: "th sarabunpsk", Georgia, Serif;
			font-size : 30px;
		}
		#map {
			width: 100%;
			height: 650px;
		}

		.info {
			padding: 6px 8px;
			font: 14px/16px Arial, Helvetica, sans-serif;
			background: white;
			background: rgba(255,255,255,0.8);
			box-shadow: 0 0 15px rgba(0,0,0,0.2);
			border-radius: 5px;
		}
		.info h4 {
			margin: 0 0 5px;
			color: #777;
		}

		.info2 {
			padding: 6px 8px;
			font: 14px/16px Arial, Helvetica, sans-serif;
			background: white;
			background: rgba(255,255,255,0.8);
			box-shadow: 0 0 15px rgba(0,0,0,0.2);
			border-radius: 5px;
		}
		.info2 h4 {
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
	</style>


</head>
<body>

	<div class="col-lg-6 col-md-6  col-sm-6">
		<div class="col-md-12">
				<div class="x_panel">
					<div id="map" style="width: 100%; height: 650px;margin: 0 auto" ></div>
	            </div>
		   </div>			

		<div class="col-md-12">
				<div class="x_panel">
              <h4 class="page-head-line">กราฟแสดงข้อมูลกลุ่มโครงการ</h4>
	                        <div id="container2" style="min-width: 100%; height: 350px; margin: 0 auto"></div>
	            </div>
		   </div>		

		<div class="col-md-12 ">
				<div class="x_panel">
              <h4 class="page-head-line">กราฟแสดงข้อมูลยุทธศาสตร์ชาติ 20 ปี</h4>
	                        <div id="container" style="min-width: 100%; height: 350px; margin: 0 auto"></div>
	            </div>
		</div>		  
	


	</div>		



	<div class="col-lg-6 col-md-6  col-sm-6">
		<div class="col-md-12">
				<div class="x_panel">
					<div id="map2" style="width: 100%; height: 650px;margin: 0 auto" ></div>
	            </div>
		   </div>			

		<div class="col-md-12">
				<div class="x_panel">
              <h4 class="page-head-line">กราฟแสดงข้อมูลกลุ่มโครงการ</h4>
	                        <div id="2container2" style="min-width: 100%; height: 350px; margin: 0 auto"></div>
	            </div>
		   </div>		

		<div class="col-md-12 ">
				<div class="x_panel">
              <h4 class="page-head-line">กราฟแสดงข้อมูลยุทธศาสตร์ชาติ 20 ปี</h4>
	                        <div id="2container" style="min-width: 100%; height: 350px; margin: 0 auto"></div>
	            </div>
		</div>	
	

	</div>		




















   <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ECharts -->
    <script src="vendors/echarts/dist/echarts.min.js"></script>
    
	<script src="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.js"></script>

   
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	

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

  if ($check == 1 ) {
              if ( $prov_name == '') {
                      $sql = "
              with a as (
              select id_project,prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where 
               sub_project_group like '%$sub_project_group'
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
              )
              select prov_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join province_sim on a.prov_name = province_sim.pv_tn
              where 
              re_royin like '%$region' 
              and pv_tn like '%$prov_name' 
              
              
              group by prov_name,geom;               


              ";
              }elseif ($prov_name != '' and $amphoe_name == '') {
                      $sql = "
              with a as (
              select id_project,prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where 
               sub_project_group like '%$sub_project_group'
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
              )
              select prov_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join province_sim on a.prov_name = province_sim.pv_tn
              where 
              re_royin like '%$region' 
              and pv_tn like '%$prov_name' 
              
              
              group by prov_name,geom;  

               ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
                      $sql = "              
              with a as (
              select id_project,prov_name,amp_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name
              )
              select prov_name ,amp_name,amp_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join amphoe_sim on a.amp_name = amphoe_sim.ap_tn and a.prov_name = amphoe_sim.pv_tn
              where re_royin like '%$region' and pv_tn like '%$prov_name' and ap_tn like '%$amphoe_name'
              group by prov_name,amp_name,geom;     
               ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
                      $sql = "
              with a as (
              select id_project,prov_name,amp_name,tam_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name,tam_name
              )
              select prov_name ,amp_name ,tam_name,tam_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join tambon_sim on a.tam_name = tambon_sim.tb_tn 
              and a.amp_name = tambon_sim.ap_tn 
              and a.prov_name = tambon_sim.pv_tn
              where re_royin like '%$region' and pv_tn like '%$prov_name'  and ap_tn like '%$amphoe_name' and tb_tn like '%$tambon_name' 
              group by prov_name,amp_name,tam_name,geom; ";
              }







  }elseif ($check == 2) {
              if ( $prov_name == '') {
                      $sql = "
            select prov_name as name_text,prov_name,sum(budget) as count,sum(budget) as total,ST_AsGeoJSON(geom) AS geojson 
from budget_view2
inner join area_project on budget_view2.prj_id = area_project.id_project
inner join province_sim on area_project.prov_name = province_sim.pv_tn
inner join user_id on budget_view2.user_id = user_id.user_id
          where province_sim.re_royin like '%$region' 
              and pv_tn like '%$prov_name' 
               
              
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by prov_name,geom; ";
              }elseif ($prov_name != '' and $amphoe_name == '') {
                      $sql = "
              select prov_name as name_text,prov_name,sum(budget) as count,sum(budget) as total,ST_AsGeoJSON(geom) AS geojson 
from budget_view2
inner join area_project on budget_view2.prj_id = area_project.id_project
inner join province_sim on area_project.prov_name = province_sim.pv_tn
inner join user_id on budget_view2.user_id = user_id.user_id
          where province_sim.re_royin like '%$region' 
              and pv_tn like '%$prov_name' 
               
              
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by prov_name,geom; ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
                      $sql = "
              select amp_name,prov_name,amp_name as name_text,sum(budget) as count,sum(budget) as total,ST_AsGeoJSON(geom) AS geojson 
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              inner join amphoe_sim on area_project.amp_name = amphoe_sim.ap_tn and area_project.prov_name = amphoe_sim.pv_tn
              inner join user_id on budget_view2.user_id = user_id.user_id
              where amphoe_sim.re_royin like '%$region' 
              and pv_tn like '%$prov_name' 
              and ap_tn like '%$amphoe_name'
               
              
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'

              group by prov_name,amp_name,geom; ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
                      $sql = "
              select prov_name,amp_name ,tam_name,tam_name as name_text,sum(budget) as count,sum(budget) as total,ST_AsGeoJSON(geom) AS geojson 
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              inner join tambon_sim on area_project.tam_name = tambon_sim.tb_tn and area_project.amp_name = tambon_sim.ap_tn 
              and area_project.prov_name = tambon_sim.pv_tn
              inner join user_id on budget_view2.user_id = user_id.user_id
               where tambon_sim.re_royin like '%$region' 
              and pv_tn like '%$prov_name' 
              and ap_tn like '%$amphoe_name'
              and tb_tn like '%$tambon_name' 
               
              
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by prov_name,amp_name,tam_name,geom; ";
              }






  }elseif ($check == 3) {
              if ( $prov_name == '') {
                      $sql = "
           with c as (
 with a as (
              select prov_name,
              CASE WHEN sum(chain_1) > 0 THEN 1 ELSE 0 END  as sum_1,
              CASE WHEN sum(chain_2) > 0 THEN 1 ELSE 0 END  as sum_2,
              CASE WHEN sum(chain_3) > 0 THEN 1 ELSE 0 END  as sum_3
              
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by prov_name
              )
              select a.prov_name,sum_1,sum_2,sum_3,total
              from a 
              inner join ( 
    with aa as (  
               select prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
    )select prov_name , count(*) as total from aa group by prov_name
              ) b on a.prov_name = b.prov_name
) 
select prov_name,prov_name as name_text,prov_name,sum(sum_1+sum_2+sum_3) as count,total,ST_AsGeoJSON(geom) AS geojson 
from c
inner join province_sim on c.prov_name = province_sim.pv_tn
 where 
re_royin like '%$region' 
and pv_tn like '%$prov_name' 
group by prov_name,geom,total
";
              }elseif ($prov_name != '' and $amphoe_name == '') {
                      $sql = " with c as (
 with a as (
              select prov_name,
              CASE WHEN sum(chain_1) > 0 THEN 1 ELSE 0 END  as sum_1,
              CASE WHEN sum(chain_2) > 0 THEN 1 ELSE 0 END  as sum_2,
              CASE WHEN sum(chain_3) > 0 THEN 1 ELSE 0 END  as sum_3
              
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by prov_name
              )
              select a.prov_name,sum_1,sum_2,sum_3,total
              from a 
              inner join ( 
    with aa as (  
               select prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
    )select prov_name , count(*) as total from aa group by prov_name
              ) b on a.prov_name = b.prov_name
) 
select prov_name,prov_name as name_text,prov_name,sum(sum_1+sum_2+sum_3) as count,total,ST_AsGeoJSON(geom) AS geojson 
from c
inner join province_sim on c.prov_name = province_sim.pv_tn
 where 
re_royin like '%$region' 
and pv_tn like '%$prov_name' 
group by prov_name,geom,total
              ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
                      $sql = "with c as (
 with a as (
              select prov_name,amp_name,
              CASE WHEN sum(chain_1) > 0 THEN 1 ELSE 0 END  as sum_1,
              CASE WHEN sum(chain_2) > 0 THEN 1 ELSE 0 END  as sum_2,
              CASE WHEN sum(chain_3) > 0 THEN 1 ELSE 0 END  as sum_3
              
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by prov_name,amp_name
              )
              select a.prov_name,a.amp_name,sum_1,sum_2,sum_3,total
              from a 
              inner join ( 
    with aa as (  
               select prov_name,amp_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
               where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name
    )select prov_name,amp_name , count(*) as total from aa group by prov_name,amp_name
              ) b on a.amp_name = b.amp_name
) 
select ap_tn as amp_name,ap_tn as name_text,prov_name,sum(sum_1+sum_2+sum_3) as count,total,ST_AsGeoJSON(geom) AS geojson 
from c
inner join amphoe_sim on c.prov_name = amphoe_sim.pv_tn and c.amp_name = amphoe_sim.ap_tn
where re_royin like '%$region' 
and pv_tn like '%$prov_name' 
and ap_tn like '%$amphoe_name' 
group by prov_name,geom,total,ap_tn
              
              ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
                      $sql = "with c as (
 with a as (
              select prov_name,amp_name,tam_name,
              CASE WHEN sum(chain_1) > 0 THEN 1 ELSE 0 END  as sum_1,
              CASE WHEN sum(chain_2) > 0 THEN 1 ELSE 0 END  as sum_2,
              CASE WHEN sum(chain_3) > 0 THEN 1 ELSE 0 END  as sum_3
              
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by prov_name,amp_name,tam_name
              )
              select a.prov_name,a.amp_name,a.tam_name,sum_1,sum_2,sum_3,total
              from a 
              inner join ( 
    with aa as (  
               select prov_name,amp_name,tam_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name,tam_name
    )select prov_name,amp_name,tam_name , count(*) as total from aa group by prov_name,amp_name,tam_name
              ) b on a.amp_name = b.amp_name
) 
select tb_tn,tb_tn as tam_name,ap_tn,tb_tn as name_text,prov_name,sum(sum_1+sum_2+sum_3) as count,total,ST_AsGeoJSON(geom) AS geojson 
from c
inner join tambon_sim on c.prov_name = tambon_sim.pv_tn and c.amp_name = tambon_sim.ap_tn and c.tam_name = tambon_sim.tb_tn
where re_royin like '%$region' 
and pv_tn like '%$prov_name' 
and ap_tn like '%$amphoe_name' 
and tb_tn like '%$tambon_name'
group by tb_tn,prov_name,geom,total,ap_tn
              
              ";
              }










  }else{
               if ( $prov_name == '') {
                      $sql = "
              with a as (
              select id_project,prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where 
               sub_project_group like '%$sub_project_group'
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
              )
              select prov_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join province_sim on a.prov_name = province_sim.pv_tn
              where 
              re_royin like '%$region' 
              and pv_tn like '%$prov_name' 
              
              
              group by prov_name,geom;               


              ";
              }elseif ($prov_name != '' and $amphoe_name == '') {
                      $sql = "
              with a as (
              select id_project,prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where 
               sub_project_group like '%$sub_project_group'
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
              )
              select prov_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join province_sim on a.prov_name = province_sim.pv_tn
              where 
              re_royin like '%$region' 
              and pv_tn like '%$prov_name' 
              
              
              group by prov_name,geom;  

               ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
                      $sql = "              
              with a as (
              select id_project,prov_name,amp_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name
              )
              select prov_name ,amp_name,amp_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join amphoe_sim on a.amp_name = amphoe_sim.ap_tn and a.prov_name = amphoe_sim.pv_tn
              where re_royin like '%$region' and pv_tn like '%$prov_name' 
              group by prov_name,amp_name,geom;     
               ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
                      $sql = "
              with a as (
              select id_project,prov_name,amp_name,tam_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name,tam_name
              )
              select prov_name ,amp_name ,tam_name,tam_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join tambon_sim on a.tam_name = tambon_sim.tb_tn 
              and a.amp_name = tambon_sim.ap_tn 
              and a.prov_name = tambon_sim.pv_tn
              where re_royin like '%$region' and pv_tn like '%$prov_name'  and ap_tn like '%$amphoe_name' and tb_tn like '%$tambon_name' 
              group by prov_name,amp_name,tam_name,geom; ";
              }




  }

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
            'province' => $edge['prov_name'],
            'amphoe' => $edge['amp_name'],
            'tambon' => $edge['tam_name'],
            'value_sum' => $edge['count'],
            'value' => number_format($edge['total'])
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


<?php
    if ($prov_name == ''){
      $lat = 13.4011203;
      $lon = 100.2525025;
      $zoom = 6;
    }if ($prov_name != '' and $amphoe_name == ''){
      $result5 = pg_query($db,"SELECT ST_Y(ST_Centroid(geom)) as lat, ST_X(ST_Centroid(geom)) as long , pv_tn FROM province_sim  where pv_tn like '%$prov_name'  ;");
      $row5 = pg_fetch_array($result5); 
      $lat = $row5[lat];
      $lon = $row5[long];
      $zoom = 8;
    }if ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
      $result5 = pg_query($db,"SELECT ST_Y(ST_Centroid(geom)) as lat, ST_X(ST_Centroid(geom)) as long , pv_tn ,ap_tn FROM amphoe_sim  where pv_tn like '%$prov_name' and ap_tn like '%$amphoe_name'  ;");
      $row5 = pg_fetch_array($result5); 
      $lat = $row5[lat];
      $lon = $row5[long];
      $zoom = 11;
    }if ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
      $result5 = pg_query($db,"SELECT ST_Y(ST_Centroid(geom)) as lat, ST_X(ST_Centroid(geom)) as long , pv_tn ,ap_tn,tb_tn FROM tambon_sim  where pv_tn like '%$prov_name' and ap_tn like '%$amphoe_name' and tb_tn like '%$tambon_name' ;");
      $row5 = pg_fetch_array($result5); 
      $lat = $row5[lat];
      $lon = $row5[long];
      $zoom = 12;
    }
      ?>



      var map = L.map('map').setView([<?php echo $lat;?>, <?php echo $lon;?>], <?php echo $zoom;?>);

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
          '<b><center>' + props.name_title + '</b><br /><hr>' + props.value + ' <?php echo $name1; ?>' :
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
      } else if (<?php echo "'$check'" ?> == 3) {
        function getColor(d) {
          return d == 3 ? '#004d00' :
            d == 2 ? '#b3b300' :
            d == 1 ? '#b30000' :
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
        var project_group = '<?php echo $project_group; ?>';
        var type_project = '<?php echo $type_project; ?>';
        var sub_project_group = '<?php echo $sub_project_group; ?>';
        var strategic20 = '<?php echo $strategic20; ?>';
        var substrategic20 = '<?php echo $substrategic20; ?>';
        var economic_plan = '<?php echo $economic_plan; ?>';
        var economic_target = '<?php echo $economic_target; ?>';
        var economic_measure = '<?php echo $economic_measure; ?>';
        var integration_29 = '<?php echo $integration_29; ?>';
        var integration_target = '<?php echo $integration_target; ?>';
        var strategic1 = '<?php echo $strategic1; ?>';
        var region = '<?php echo $region; ?>';

        var popupText = L.popup().setContent('<center><p><b>กราฟแสดงข้อมูลจำนวนโครงการตามประเด็นยุทธศาสตร์</b><br>ในพื้นที่ ' + feature.properties.name_title + '</p> <iframe src="data.php?'+
          '&region=' + region + 
          '&prov_name=' + province + 
          '&_name='  + amphoe + 
          '&tam_name=' + tambon + 
          '&project_group='+ project_group +
          '&type_project='+ type_project +
          '&sub_project_group='+ sub_project_group +
          '&strategic20='+ strategic20 +
          '&substrategic20='+ substrategic20 +
          '&economic_plan='+ economic_plan +
          '&economic_target='+ economic_target +
          '&economic_measure='+ economic_measure +
          '&integration_29='+ integration_29 +
          '&integration_target='+ integration_target +
          '&strategic=&check_budget=1&no_sql=1&region2=&strategic2=&check_budget=1" name="map_php" style="width: 100%; height: 400px " frameborder="0" scrolling="yes"  ></iframe>');

        var customOptions = {
          'minWidth': '600'
        }

        layer.bindPopup(popupText, customOptions);
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
        } else if (<?php echo "'$check'" ?> == 3) {
          var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 1, 2, 3],
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
      Highcharts.chart('container2', {
        chart: {
          type: 'column'
        },
        title: {
          text: ''
        },
        legend: {
          x: 150,
          y: 100,
          floating: true,
          borderWidth: 1,
          backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
          categories: [

            <?php 
    if ($project_group == '' ) {
           $result1 = pg_query("with a as (
select project_group,sub_project_group from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name'
and re_royin like '%$region' 
and amp_name like '%$amphoe_name'
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
and project_type like '%$type_project'
group by project_group,sub_project_group
order by project_group asc
)
select project_group,count(*) from  a
group by project_group

");
    }elseif ($project_group != '' and  $sub_project_group == '') {
           $result1 = pg_query("with a as (
select project_group,sub_project_group from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name' 
and re_royin like '%$region' 
and amp_name like '%$amphoe_name' 
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by project_group,sub_project_group
order by sub_project_group asc
)
select sub_project_group as project_group,count(*) from  a
group by sub_project_group");
    }elseif ($project_group != '' and  $sub_project_group != '') {
           $result1 = pg_query("with a as (
select project_group,sub_project_group from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name' 
and re_royin like '%$region' 
and amp_name like '%$amphoe_name' 
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by project_group,sub_project_group
order by sub_project_group asc
)
select sub_project_group as sub_project_group,count(*) from  a
group by sub_project_group");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            '<?php echo $arr1[project_group]; ?>',
            <?php } ?>

          ]
        },
        yAxis: {
          title: {
            text: 'จำนวนโครงการ'
          }
        },
        tooltip: {
          shared: true,
          valueSuffix: ' โครงการ'
        },
        credits: {
          enabled: false
        },
        plotOptions: {
          areaspline: {
            fillOpacity: 0.5
          }
        },
        series: [{
          name: 'จำนวนโครงการ',
          data: [<?php 
    if ($project_group == '' ) {
           $result1 = pg_query("with a as (
select project_group,sub_project_group from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name' 
and re_royin like '%$region' 
and amp_name like '%$amphoe_name' 
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by project_group,sub_project_group
order by project_group asc
)
select project_group,count(*) from  a
group by project_group");
    }elseif ($project_group != '' and  $sub_project_group == '') {
           $result1 = pg_query("with a as (
select project_group,sub_project_group from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name' 
and re_royin like '%$region' 
and amp_name like '%$amphoe_name' 
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by project_group,sub_project_group
order by project_group asc
)
select sub_project_group as sub_project_group,count(*) from  a
group by sub_project_group");
    }elseif ($project_group != '' and  $sub_project_group != '') {
           $result1 = pg_query("with a as (
select substrategic  from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name' 
and re_royin like '%$region' 
and amp_name like '%$amphoe_name' 
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by project_group,sub_project_group
order by project_group asc
)
select sub_project_group as strategic,count(*) from  a
group by sub_project_group");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            <?php echo $arr1[count]; ?>,
            <?php } ?>
          ],
          color: '#804000'
        }]
      });
    </script>









 <script>
      Highcharts.chart('container', {
        chart: {
          type: 'column'
        },
        title: {
          text: ''
        },
        legend: {
          x: 150,
          y: 100,
          floating: true,
          borderWidth: 1,
          backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
          categories: [

            <?php 
    if ($strategic20 == '' ) {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name' 
and re_royin like '%$region' 
and amp_name like '%$amphoe_name' 
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by strategic20,substrategic20,prj_id
order by strategic20 asc
)
select strategic20,count(*) from  a
group by strategic20

");
    }elseif ($strategic20 != '' and  $substrategic20 == '') {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name' 
and re_royin like '%$region' 
and amp_name like '%$amphoe_name' 
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by strategic20,substrategic20,prj_id
order by substrategic20 asc
)
select substrategic20 as strategic20,count(*) from  a
group by substrategic20");
    }elseif ($strategic20 != '' and  $substrategic20 != '') {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name' 
and re_royin like '%$region' 
and amp_name like '%$amphoe_name' 
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
              and project_type like '%$type_project'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
group by strategic20,substrategic20,prj_id
order by substrategic20 asc
)
select substrategic20 as strategic20,count(*) from  a
group by substrategic20");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            '<?php echo $arr1[strategic20]; ?>',
            <?php } ?>

          ]
        },
        yAxis: {
          title: {
            text: 'จำนวนโครงการ'
          }
        },
        tooltip: {
          shared: true,
          valueSuffix: ' โครงการ'
        },
        credits: {
          enabled: false
        },
        plotOptions: {
          areaspline: {
            fillOpacity: 0.5
          }
        },
        series: [{
          name: 'จำนวนโครงการ',
          data: [<?php 
    if ($strategic20 == '' ) {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name' 
and re_royin like '%$region' 
and amp_name like '%$amphoe_name' 
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by strategic20,substrategic20,prj_id
order by strategic20 asc
)
select strategic20,count(*) from  a
group by strategic20

");
    }elseif ($strategic20 != '' and  $substrategic20 == '') {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name' 
and re_royin like '%$region' 
and amp_name like '%$amphoe_name' 
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by strategic20,substrategic20,prj_id
order by substrategic20 asc
)
select substrategic20 as substrategic20,count(*) from  a
group by substrategic20");
    }elseif ($strategic20 != '' and  $substrategic20 != '') {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name' 
and re_royin like '%$region' 
and amp_name like '%$amphoe_name' 
and tam_name like '%$tambon_name' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by strategic20,substrategic20,prj_id
order by substrategic20 asc
)
select substrategic20 as substrategic20,count(*) from  a
group by substrategic20");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            <?php echo $arr1[count]; ?>,
            <?php } ?>
          ],
          color: '#804000'
        }]
      });
    </script>

<script>
  $(document).ready(function() {
    var table = $('#example').DataTable();
 
    $('button').click( function() {
        var data = table.$('input, select').serialize();
        alert(
            "The following data would have been submitted to the server: \n\n"+
            data.substr( 0, 120 )+'...'
        );
        return false;
    } );
} );
</script>



































<script type="text/javascript">
	var statesData2 =	<?php
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

  if ($check == 1 ) {
              if ( $prov_name == '') {
                      $sql = "
              with a as (
              select id_project,prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where 
               sub_project_group like '%$sub_project_group'
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
              )
              select prov_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join province_sim on a.prov_name = province_sim.pv_tn
              where 
              re_royin like '%$region2' 
              and pv_tn like '%$prov_name2' 
              
              
              group by prov_name,geom;               


              ";
              }elseif ($prov_name != '' and $amphoe_name == '') {
                      $sql = "
              with a as (
              select id_project,prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where 
               sub_project_group like '%$sub_project_group'
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
              )
              select prov_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join province_sim on a.prov_name = province_sim.pv_tn
              where 
              re_royin like '%$region2' 
              and pv_tn like '%$prov_name2' 
              
              
              group by prov_name,geom;  

               ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
                      $sql = "              
              with a as (
              select id_project,prov_name,amp_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name
              )
              select prov_name ,amp_name,amp_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join amphoe_sim on a.amp_name = amphoe_sim.ap_tn and a.prov_name = amphoe_sim.pv_tn
              where re_royin like '%$region2' 
              and pv_tn like '%$prov_name2' 
              and ap_tn like '%$amphoe_name2'
              group by prov_name,amp_name,geom;     
               ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
                      $sql = "
              with a as (
              select id_project,prov_name,amp_name,tam_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name,tam_name
              )
              select prov_name ,amp_name ,tam_name,tam_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join tambon_sim on a.tam_name = tambon_sim.tb_tn 
              and a.amp_name = tambon_sim.ap_tn 
              and a.prov_name = tambon_sim.pv_tn
              where re_royin like '%$region' 
              and pv_tn like '%$prov_name2'  
              and ap_tn like '%$amphoe_name2' 
              and tb_tn like '%$tambon_name2' 
              group by prov_name,amp_name,tam_name,geom; ";
              }







  }elseif ($check == 2) {
              if ( $prov_name == '') {
                      $sql = "
            select prov_name as name_text,prov_name,sum(budget) as count,sum(budget) as total,ST_AsGeoJSON(geom) AS geojson 
from budget_view2
inner join area_project on budget_view2.prj_id = area_project.id_project
inner join province_sim on area_project.prov_name = province_sim.pv_tn
inner join user_id on budget_view2.user_id = user_id.user_id
          where province_sim.re_royin like '%$region2' 
              and pv_tn like '%$prov_name2' 
               
              
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by prov_name,geom; ";
              }elseif ($prov_name != '' and $amphoe_name == '') {
                      $sql = "
              select prov_name as name_text,prov_name,sum(budget) as count,sum(budget) as total,ST_AsGeoJSON(geom) AS geojson 
from budget_view2
inner join area_project on budget_view2.prj_id = area_project.id_project
inner join province_sim on area_project.prov_name = province_sim.pv_tn
inner join user_id on budget_view2.user_id = user_id.user_id
          where province_sim.re_royin like '%$region2' 
              and pv_tn like '%$prov_name2' 
               
              
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by prov_name,geom; ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
                      $sql = "
              select amp_name,prov_name,amp_name as name_text,sum(budget) as count,sum(budget) as total,ST_AsGeoJSON(geom) AS geojson 
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              inner join amphoe_sim on area_project.amp_name = amphoe_sim.ap_tn and area_project.prov_name = amphoe_sim.pv_tn
              inner join user_id on budget_view2.user_id = user_id.user_id
              where amphoe_sim.re_royin like '%$region2' 
              and pv_tn like '%$prov_name2' 
              and ap_tn like '%$amphoe_name2'
               
              
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'

              group by prov_name,amp_name,geom; ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
                      $sql = "
              select prov_name,amp_name ,tam_name,tam_name as name_text,sum(budget) as count,sum(budget) as total,ST_AsGeoJSON(geom) AS geojson 
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              inner join tambon_sim on area_project.tam_name = tambon_sim.tb_tn and area_project.amp_name = tambon_sim.ap_tn 
              and area_project.prov_name = tambon_sim.pv_tn
              inner join user_id on budget_view2.user_id = user_id.user_id
               where tambon_sim.re_royin like '%$region2' 
              and pv_tn like '%$prov_name2' 
              and ap_tn like '%$amphoe_name2'
              and tb_tn like '%$tambon_name2' 
               
              
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by prov_name,amp_name,tam_name,geom; ";
              }






  }elseif ($check == 3) {
              if ( $prov_name == '') {
                      $sql = "
           with c as (
 with a as (
              select prov_name,
              CASE WHEN sum(chain_1) > 0 THEN 1 ELSE 0 END  as sum_1,
              CASE WHEN sum(chain_2) > 0 THEN 1 ELSE 0 END  as sum_2,
              CASE WHEN sum(chain_3) > 0 THEN 1 ELSE 0 END  as sum_3
              
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by prov_name
              )
              select a.prov_name,sum_1,sum_2,sum_3,total
              from a 
              inner join ( 
    with aa as (  
               select prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
    )select prov_name , count(*) as total from aa group by prov_name
              ) b on a.prov_name = b.prov_name
) 
select prov_name,prov_name as name_text,prov_name,sum(sum_1+sum_2+sum_3) as count,total,ST_AsGeoJSON(geom) AS geojson 
from c
inner join province_sim on c.prov_name = province_sim.pv_tn
 where 
re_royin like '%$region2' 
and pv_tn like '%$prov_name2' 
group by prov_name,geom,total
";
              }elseif ($prov_name != '' and $amphoe_name == '') {
                      $sql = " with c as (
 with a as (
              select prov_name,
              CASE WHEN sum(chain_1) > 0 THEN 1 ELSE 0 END  as sum_1,
              CASE WHEN sum(chain_2) > 0 THEN 1 ELSE 0 END  as sum_2,
              CASE WHEN sum(chain_3) > 0 THEN 1 ELSE 0 END  as sum_3
              
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by prov_name
              )
              select a.prov_name,sum_1,sum_2,sum_3,total
              from a 
              inner join ( 
    with aa as (  
               select prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
    )select prov_name , count(*) as total from aa group by prov_name
              ) b on a.prov_name = b.prov_name
) 
select prov_name,prov_name as name_text,prov_name,sum(sum_1+sum_2+sum_3) as count,total,ST_AsGeoJSON(geom) AS geojson 
from c
inner join province_sim on c.prov_name = province_sim.pv_tn
 where 
re_royin like '%$region2' 
and pv_tn like '%$prov_name2' 
group by prov_name,geom,total
              ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
                      $sql = "with c as (
 with a as (
              select prov_name,amp_name,
              CASE WHEN sum(chain_1) > 0 THEN 1 ELSE 0 END  as sum_1,
              CASE WHEN sum(chain_2) > 0 THEN 1 ELSE 0 END  as sum_2,
              CASE WHEN sum(chain_3) > 0 THEN 1 ELSE 0 END  as sum_3
              
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by prov_name,amp_name
              )
              select a.prov_name,a.amp_name,sum_1,sum_2,sum_3,total
              from a 
              inner join ( 
    with aa as (  
               select prov_name,amp_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
               where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name
    )select prov_name,amp_name , count(*) as total from aa group by prov_name,amp_name
              ) b on a.amp_name = b.amp_name
) 
select ap_tn as amp_name,ap_tn as name_text,prov_name,sum(sum_1+sum_2+sum_3) as count,total,ST_AsGeoJSON(geom) AS geojson 
from c
inner join amphoe_sim on c.prov_name = amphoe_sim.pv_tn and c.amp_name = amphoe_sim.ap_tn
where re_royin like '%$region2' 
and pv_tn like '%$prov_name2' 
and ap_tn like '%$amphoe_name2' 
group by prov_name,geom,total,ap_tn
              
              ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
                      $sql = "with c as (
 with a as (
              select prov_name,amp_name,tam_name,
              CASE WHEN sum(chain_1) > 0 THEN 1 ELSE 0 END  as sum_1,
              CASE WHEN sum(chain_2) > 0 THEN 1 ELSE 0 END  as sum_2,
              CASE WHEN sum(chain_3) > 0 THEN 1 ELSE 0 END  as sum_3
              
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by prov_name,amp_name,tam_name
              )
              select a.prov_name,a.amp_name,a.tam_name,sum_1,sum_2,sum_3,total
              from a 
              inner join ( 
    with aa as (  
               select prov_name,amp_name,tam_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name,tam_name
    )select prov_name,amp_name,tam_name , count(*) as total from aa group by prov_name,amp_name,tam_name
              ) b on a.amp_name = b.amp_name
) 
select tb_tn,tb_tn as tam_name,ap_tn,tb_tn as name_text,prov_name,sum(sum_1+sum_2+sum_3) as count,total,ST_AsGeoJSON(geom) AS geojson 
from c
inner join tambon_sim on c.prov_name = tambon_sim.pv_tn and c.amp_name = tambon_sim.ap_tn and c.tam_name = tambon_sim.tb_tn
where re_royin like '%$region2' 
and pv_tn like '%$prov_name2' 
and ap_tn like '%$amphoe_name2' 
and tb_tn like '%$tambon_name2'
group by tb_tn,prov_name,geom,total,ap_tn
              
              ";
              }










  }else{
               if ( $prov_name == '') {
                      $sql = "
              with a as (
              select id_project,prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where 
               sub_project_group like '%$sub_project_group'
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
              )
              select prov_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join province_sim on a.prov_name = province_sim.pv_tn
              where 
              re_royin like '%$region2' 
              and pv_tn like '%$prov_name2' 
              
              
              group by prov_name,geom;               


              ";
              }elseif ($prov_name != '' and $amphoe_name == '') {
                      $sql = "
              with a as (
              select id_project,prov_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where 
               sub_project_group like '%$sub_project_group'
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name
              )
              select prov_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join province_sim on a.prov_name = province_sim.pv_tn
              where 
              re_royin like '%$region2' 
              and pv_tn like '%$prov_name2' 
              
              
              group by prov_name,geom;  

               ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
                      $sql = "              
              with a as (
              select id_project,prov_name,amp_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name
              )
              select prov_name ,amp_name,amp_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join amphoe_sim on a.amp_name = amphoe_sim.ap_tn and a.prov_name = amphoe_sim.pv_tn
              where re_royin like '%$region2' and pv_tn like '%$prov_name2' 
              group by prov_name,amp_name,geom;     
               ";
              }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
                      $sql = "
              with a as (
              select id_project,prov_name,amp_name,tam_name
              from budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
              group by id_project,prov_name,amp_name,tam_name
              )
              select prov_name ,amp_name ,tam_name,tam_name as name_text,prov_name,count(*) as count,count(*) as total,ST_AsGeoJSON(geom) AS geojson 
              from a
              inner join tambon_sim on a.tam_name = tambon_sim.tb_tn 
              and a.amp_name = tambon_sim.ap_tn 
              and a.prov_name = tambon_sim.pv_tn
              where re_royin like '%$region2' 
              and pv_tn like '%$prov_name2'  
              and ap_tn like '%$amphoe_name2' 
              and tb_tn like '%$tambon_name2' 
              group by prov_name,amp_name,tam_name,geom; ";
              }




  }
   


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
            'province' => $edge['prov_name'],
            'amphoe' => $edge['amp_name'],
            'tambon' => $edge['tam_name'],
            'value_sum' => $edge['count'],
            'value' => number_format($edge['total'])
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


<?php
    if ($prov_name2 == ''){
      $lat = 13.4011203;
      $lon = 100.2525025;
      $zoom = 6;
    }if ($prov_name2 != '' and $amphoe_name2 == ''){
      $result5 = pg_query($db,"SELECT ST_Y(ST_Centroid(geom)) as lat, ST_X(ST_Centroid(geom)) as long , pv_tn FROM province_sim  where pv_tn like '%$prov_name2'  ;");
      $row5 = pg_fetch_array($result5); 
      $lat = $row5[lat];
      $lon = $row5[long];
      $zoom = 8;
    }if ($prov_name2 != '' and $amphoe_name2 != '' and $tambon_name2 == '') {
      $result5 = pg_query($db,"SELECT ST_Y(ST_Centroid(geom)) as lat, ST_X(ST_Centroid(geom)) as long , pv_tn ,ap_tn FROM amphoe_sim  where pv_tn like '%$prov_name2' and ap_tn like '%$amphoe_name2'  ;");
      $row5 = pg_fetch_array($result5); 
      $lat = $row5[lat];
      $lon = $row5[long];
      $zoom = 11;
    }if ($prov_name2 != '' and $amphoe_name2 != '' and $tambon_name2 != '') {
      $result5 = pg_query($db,"SELECT ST_Y(ST_Centroid(geom)) as lat, ST_X(ST_Centroid(geom)) as long , pv_tn ,ap_tn,tb_tn FROM tambon_sim  where pv_tn like '%$prov_name2' and ap_tn like '%$amphoe_name2' and tb_tn like '%$tambon_name2' ;");
      $row5 = pg_fetch_array($result5); 
      $lat = $row5[lat];
      $lon = $row5[long];
      $zoom = 12;
    }
      ?>



      var map2 = L.map('map2').setView([<?php echo $lat;?>, <?php echo $lon;?>], <?php echo $zoom;?>);

      L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
      }).addTo(map2);

	

		// control that shows state info on hover
		var info2 = L.control();

		info2.onAdd = function (map2) {
			this._div = L.DomUtil.create('div', 'info2');
			this.update();
			return this._div;
		};




		info2.update = function (props) {

			this._div.innerHTML = (props ?
				'<b><center>' + props.name_title + '</b><br /><hr>' + props.value + ' <?php echo $name1; ?>'
				: '');
		};
		info2.addTo(map2);



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
      } else if (<?php echo "'$check'" ?> == 3) {
        function getColor(d) {
          return d == 3 ? '#004d00' :
            d == 2 ? '#b3b300' :
            d == 1 ? '#b30000' :
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
				fillOpacity: 0.7
			});

			if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
				layer.bringToFront();
			}

			info2.update(layer.feature.properties);
		}

		var geojson;

		function resetHighlight(e) {
			geojson.resetStyle(e.target);
			info2.update();
		}

		function zoomToFeature(e) {
			map2.fitBounds(e.target.getBounds());
		}



function onEachFeature(feature, layer) {
        var province = feature.properties.province;
        var amphoe = feature.properties.amphoe;
        var tambon = feature.properties.tambon;
        var project_group = '<?php echo $project_group; ?>';
        var type_project = '<?php echo $type_project; ?>';
        var sub_project_group = '<?php echo $sub_project_group; ?>';
        var strategic20 = '<?php echo $strategic20; ?>';
        var substrategic20 = '<?php echo $substrategic20; ?>';
        var economic_plan = '<?php echo $economic_plan; ?>';
        var economic_target = '<?php echo $economic_target; ?>';
        var economic_measure = '<?php echo $economic_measure; ?>';
        var integration_29 = '<?php echo $integration_29; ?>';
        var integration_target = '<?php echo $integration_target; ?>';
        var strategic1 = '<?php echo $strategic1; ?>';
        var region = '<?php echo $region; ?>';

        var popupText = L.popup().setContent('<center><p><b>กราฟแสดงข้อมูลจำนวนโครงการตามประเด็นยุทธศาสตร์</b><br>ในพื้นที่ ' + feature.properties.name_title + '</p> <iframe src="data.php?'+
          '&region=' + region + 
          '&prov_name=' + province + 
          '&_name='  + amphoe + 
          '&tam_name=' + tambon + 
          '&project_group='+ project_group +
          '&type_project='+ type_project +
          '&sub_project_group='+ sub_project_group +
          '&strategic20='+ strategic20 +
          '&substrategic20='+ substrategic20 +
          '&economic_plan='+ economic_plan +
          '&economic_target='+ economic_target +
          '&economic_measure='+ economic_measure +
          '&integration_29='+ integration_29 +
          '&integration_target='+ integration_target +
          '&strategic=&check_budget=1&no_sql=1&region2=&strategic2=&check_budget=1" name="map_php" style="width: 100%; height: 400px " frameborder="0" scrolling="yes"  ></iframe>');

        var customOptions = {
          'minWidth': '600'
        }

        layer.bindPopup(popupText, customOptions);
        layer.on({
          mouseover: highlightFeature,
          mouseout: resetHighlight
        });
      }



		geojson = L.geoJson(statesData2, {
			style: style,
			onEachFeature: onEachFeature
		}).addTo(map2);



		var legend = L.control({position: 'bottomright'});

		legend.onAdd = function (map2) {

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
        } else if (<?php echo "'$check'" ?> == 3) {
          var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 1, 2, 3],
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
					from + (to ? '&ndash;' + to : '+')+ ' <?php echo $name1; ?>');
			}




			div.innerHTML = labels.join('<br>');
			return div;
		};

		legend.addTo(map2);


		
	</script>
	


	
<script>
      Highcharts.chart('2container2', {
        chart: {
          type: 'column'
        },
        title: {
          text: ''
        },
        legend: {
          x: 150,
          y: 100,
          floating: true,
          borderWidth: 1,
          backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
          categories: [

            <?php 
    if ($project_group == '' ) {
           $result1 = pg_query("with a as (
select project_group,sub_project_group from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2'
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2'
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
and project_type like '%$type_project'
group by project_group,sub_project_group
order by project_group asc
)
select project_group,count(*) from  a
group by project_group

");
    }elseif ($project_group != '' and  $sub_project_group == '') {
           $result1 = pg_query("with a as (
select project_group,sub_project_group from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2' 
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2' 
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by project_group,sub_project_group
order by sub_project_group asc
)
select sub_project_group as project_group,count(*) from  a
group by sub_project_group");
    }elseif ($project_group != '' and  $sub_project_group != '') {
           $result1 = pg_query("with a as (
select project_group,sub_project_group from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2' 
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2' 
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by project_group,sub_project_group
order by sub_project_group asc
)
select sub_project_group as sub_project_group,count(*) from  a
group by sub_project_group");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            '<?php echo $arr1[project_group]; ?>',
            <?php } ?>

          ]
        },
        yAxis: {
          title: {
            text: 'จำนวนโครงการ'
          }
        },
        tooltip: {
          shared: true,
          valueSuffix: ' โครงการ'
        },
        credits: {
          enabled: false
        },
        plotOptions: {
          areaspline: {
            fillOpacity: 0.5
          }
        },
        series: [{
          name: 'จำนวนโครงการ',
          data: [<?php 
    if ($project_group == '' ) {
           $result1 = pg_query("with a as (
select project_group,sub_project_group from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2' 
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2' 
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by project_group,sub_project_group
order by project_group asc
)
select project_group,count(*) from  a
group by project_group");
    }elseif ($project_group != '' and  $sub_project_group == '') {
           $result1 = pg_query("with a as (
select project_group,sub_project_group from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2' 
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2' 
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by project_group,sub_project_group
order by project_group asc
)
select sub_project_group as sub_project_group,count(*) from  a
group by sub_project_group");
    }elseif ($project_group != '' and  $sub_project_group != '') {
           $result1 = pg_query("with a as (
select substrategic  from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2' 
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2' 
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by project_group,sub_project_group
order by project_group asc
)
select sub_project_group as strategic,count(*) from  a
group by sub_project_group");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            <?php echo $arr1[count]; ?>,
            <?php } ?>
          ],
          color: '#804000'
        }]
      });
    </script>






 <script>
      Highcharts.chart('2container', {
        chart: {
          type: 'column'
        },
        title: {
          text: ''
        },
        legend: {
          x: 150,
          y: 100,
          floating: true,
          borderWidth: 1,
          backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
          categories: [

            <?php 
    if ($strategic20 == '' ) {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2' 
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2' 
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by strategic20,substrategic20,prj_id
order by strategic20 asc
)
select strategic20,count(*) from  a
group by strategic20

");
    }elseif ($strategic20 != '' and  $substrategic20 == '') {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2' 
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2' 
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by strategic20,substrategic20,prj_id
order by substrategic20 asc
)
select substrategic20 as strategic20,count(*) from  a
group by substrategic20");
    }elseif ($strategic20 != '' and  $substrategic20 != '') {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2' 
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2' 
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
              and project_type like '%$type_project'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
group by strategic20,substrategic20,prj_id
order by substrategic20 asc
)
select substrategic20 as strategic20,count(*) from  a
group by substrategic20");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            '<?php echo $arr1[strategic20]; ?>',
            <?php } ?>

          ]
        },
        yAxis: {
          title: {
            text: 'จำนวนโครงการ'
          }
        },
        tooltip: {
          shared: true,
          valueSuffix: ' โครงการ'
        },
        credits: {
          enabled: false
        },
        plotOptions: {
          areaspline: {
            fillOpacity: 0.5
          }
        },
        series: [{
          name: 'จำนวนโครงการ',
          data: [<?php 
    if ($strategic20 == '' ) {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2' 
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2' 
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by strategic20,substrategic20,prj_id
order by strategic20 asc
)
select strategic20,count(*) from  a
group by strategic20

");
    }elseif ($strategic20 != '' and  $substrategic20 == '') {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2' 
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2' 
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by strategic20,substrategic20,prj_id
order by substrategic20 asc
)
select substrategic20 as substrategic20,count(*) from  a
group by substrategic20");
    }elseif ($strategic20 != '' and  $substrategic20 != '') {
           $result1 = pg_query("with a as (
select strategic20,substrategic20 from  budget_view2 
full join area_project on budget_view2.prj_id = area_project.id_project
where 
 prov_name like '%$prov_name2' 
and re_royin like '%$region2' 
and amp_name like '%$amphoe_name2' 
and tam_name like '%$tambon_name2' 




and strategic20 like '%$strategic20'
and substrategic20 like '%$substrategic20'
and economic_plan like '%$economic_plan'
and economic_target like '%$economic_target'
and economic_measure like '%$economic_measure'
and integration_29 like '%$integration_29'
and integration_target like '%$integration_target'
and project_group like '%$project_group'
and sub_project_group like '%$sub_project_group'
              and project_type like '%$type_project'
group by strategic20,substrategic20,prj_id
order by substrategic20 asc
)
select substrategic20 as substrategic20,count(*) from  a
group by substrategic20");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            <?php echo $arr1[count]; ?>,
            <?php } ?>
          ],
          color: '#804000'
        }]
      });
    </script>

<script>
  $(document).ready(function() {
    var table = $('#example2').DataTable();
 
    $('button').click( function() {
        var data = table.$('input, select').serialize();
        alert(
            "The following data would have been submitted to the server: \n\n"+
            data.substr( 0, 120 )+'...'
        );
        return false;
    } );
} );
</script>










</body>
</html>
