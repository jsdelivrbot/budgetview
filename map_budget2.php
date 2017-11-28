<?php 
include('config.php');


$region = $_GET[region];
$prov_name  = $_GET[prov_name];
$amphoe_name  = $_GET[amphoe_name];
$tambon_name  = $_GET[tambon_name];
$strategic  = $_GET[strategic];
$substrategic  = $_GET[substrategic];
$check = $_GET[check_budget];


$region2 = $_GET[region2];
$prov_name2  = $_GET[prov_name2];
$amphoe_name2  = $_GET[amphoe_name2];
$tambon_name2  = $_GET[tambon_name2];
$strategic2  = $_GET[strategic2];
$substrategic2  = $_GET[substrategic2];

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
	                        <div id="container2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
	            </div>
		   </div>		

		<div class="col-md-12 ">
				<div class="x_panel">
	                        <div id="container" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
	            </div>
		</div>		  
		<div class="col-md-12 ">
		      <h4 class="page-head-line">รายชื่อโครงการในพื้นที่</h4>
		         <div class="x_panel">
		              <table class="table table-striped table-hover " id="example">
		                <thead>
		                  <tr>
		                    <th>#</th>
		                    <th>ชื่อโครงการ</th>
		                    <th>งบประมาณ</th>
		                    <th>หน่วยงานรับผิดชอบ</th>
		                  </tr>
		                </thead>
		                <tbody>
		          <?php 
		                 $result2 = pg_query("select ROW_NUMBER() OVER(ORDER BY prj_name asc) AS Row,* from  budget_view where province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
		            order by prj_name asc");
		        
		          while ($arr2 = pg_fetch_array($result2)) { 
		          ?>
		                  <tr>
		                    <td><?php echo $arr2[row]; ?></td>
		                    <td><?php echo $arr2[prj_name]; ?></td>
		                    <td><?php echo number_format($arr2[budget]); ?></td>
		                    <td><?php echo $arr2[agency]; ?></td>
		                  </tr>
		                <?php } ?>
		                </tbody>
		              </table> 
		                      
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
	                        <div id="2container2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
	            </div>
		   </div>		

		<div class="col-md-12 ">
				<div class="x_panel">
	                        <div id="2container" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
	            </div>
		</div>		
		<div class="col-md-12 ">
		      <h4 class="page-head-line">รายชื่อโครงการในพื้นที่</h4>
		         <div class="x_panel">
		              <table class="table table-striped table-hover " id="example2">
		                <thead>
		                  <tr>
		                    <th>#</th>
		                    <th>ชื่อโครงการ</th>
		                    <th>งบประมาณ</th>
		                    <th>หน่วยงานรับผิดชอบ</th>
		                  </tr>
		                </thead>
		                <tbody>
		          <?php 
		                 $result2 = pg_query("select ROW_NUMBER() OVER(ORDER BY prj_name asc) AS Row,* from  budget_view where province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
		            order by prj_name asc");
		        
		          while ($arr2 = pg_fetch_array($result2)) { 
		          ?>
		                  <tr>
		                    <td><?php echo $arr2[row]; ?></td>
		                    <td><?php echo $arr2[prj_name]; ?></td>
		                    <td><?php echo number_format($arr2[budget]); ?></td>
		                    <td><?php echo $arr2[agency]; ?></td>
		                  </tr>
		                <?php } ?>
		                </tbody>
		              </table> 
		                      
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
	var statesData =	<?php
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
  if ($check != 2) {
                if ( $prov_name == '') {
                    $sql = "
            select province as name_text,province,count(*) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join province_sim on budget_view.province = province_sim.pv_tn
            where re_royin like '%$region' and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
            group by province,geom; ";
            }elseif ($prov_name != '' and $amphoe_name == '') {
                    $sql = "
            select province,ap_tn as name_text,ap_tn,count(*) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join amphoe_sim on budget_view.amphoe = amphoe_sim.ap_tn and budget_view.province = amphoe_sim.pv_tn
            where re_royin like '%$region' and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
            group by province,ap_tn,geom; ";
            }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
                    $sql = "
            select province,ap_tn,tambon as name_text,tambon,count(*) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join tambon_sim on budget_view.tambon = tambon_sim.tb_tn and budget_view.amphoe = tambon_sim.ap_tn and budget_view.province = tambon_sim.pv_tn
            where re_royin like '%$region' and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
            group by province,ap_tn,tambon,geom; ";
            }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
                    $sql = "
            select province,ap_tn,tambon as name_text,tambon,count(*) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join tambon_sim on budget_view.tambon = tambon_sim.tb_tn and budget_view.amphoe = tambon_sim.ap_tn and budget_view.province = tambon_sim.pv_tn
            where re_royin like '%$region' and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
            group by province,ap_tn,tambon,geom; ";
            }
  }elseif ($check == 2) {
                if ( $prov_name == '') {
                    $sql = "
            select province as name_text,province,sum(budget) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join province_sim on budget_view.province = province_sim.pv_tn
            where re_royin like '%$region' and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
            group by province,geom; ";
            }elseif ($prov_name != '' and $amphoe_name == '') {
                    $sql = "
            select province,ap_tn as name_text,ap_tn,sum(budget) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join amphoe_sim on budget_view.amphoe = amphoe_sim.ap_tn and budget_view.province = amphoe_sim.pv_tn
            where re_royin like '%$region' and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
            group by province,ap_tn,geom; ";
            }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
                    $sql = "
            select province,ap_tn,tambon as name_text,tambon,sum(budget) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join tambon_sim on budget_view.tambon = tambon_sim.tb_tn and budget_view.amphoe = tambon_sim.ap_tn and budget_view.province = tambon_sim.pv_tn
            where re_royin like '%$region' and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
            group by province,ap_tn,tambon,geom; ";
            }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
                    $sql = "
            select province,ap_tn,tambon as name_text,tambon,sum(budget) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join tambon_sim on budget_view.tambon = tambon_sim.tb_tn and budget_view.amphoe = tambon_sim.ap_tn and budget_view.province = tambon_sim.pv_tn
            where re_royin like '%$region' and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
            group by province,ap_tn,tambon,geom; ";
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



	   var map = L.map('map').setView([13.4011203,100.2525025], 6);

    L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);

	

		// control that shows state info on hover
		var info = L.control();

		info.onAdd = function (map) {
			this._div = L.DomUtil.create('div', 'info');
			this.update();
			return this._div;
		};




		info.update = function (props) {

			this._div.innerHTML = (props ?
				'<b><center>' + props.name_title + '</b><br /><hr>' + props.value + ' <?php echo $name1; ?>'
				: '');
		};
		info.addTo(map);



		// get color depending on population PROV_CODE value


  if (<?php echo "'$check'" ?> == 1) {
        function getColor(d) {
        return d > 25 ? '#603006' :
             d > 20  ? '#c0600c' :
             d > 15  ? '#f07d15' :
             d > 10  ? '#f4a157' :
             d > 5  ? '#f9c99f' :
                  '#fdf2e7';
    }
  }else if (<?php echo "'$check'" ?> == 2) {
            function getColor(d) {
        return d > 100000000 ? '#603006' :
             d > 50000000  ? '#c0600c' :
             d > 10000000  ? '#f07d15' :
             d > 5000000  ? '#f4a157' :
             d > 1000000  ? '#f9c99f' :
                  '#fdf2e7';
    }
  }else{
        function getColor(d) {
        return d > 25 ? '#603006' :
             d > 20  ? '#c0600c' :
             d > 15  ? '#f07d15' :
             d > 10  ? '#f4a157' :
             d > 5  ? '#f9c99f' :
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

            var popupText = L.popup().setContent('<center><p><b>กราฟแสดงข้อมูลจำนวนโครงการตามประเด็นยุทธศาสตร์</b><br>ในพื้นที่ '+feature.properties.name_title+'</p> <iframe src="data.php?region=Central&prov_name='+province+'&amphoe_name='+amphoe+'&tambon_name='+tambon+'&strategic=&check_budget=1&no_sql=1&region2=&strategic2=&check_budget=1" name="map_php" style="width: 100%; height: 350px " frameborder="0" scrolling="yes"  ></iframe>');

            var customOptions =
                {
                'minWidth': '600'
                }

            layer.bindPopup(popupText,customOptions);
             layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight
            });
		}



		geojson = L.geoJson(statesData, {
			style: style,
			onEachFeature: onEachFeature
		}).addTo(map);



		var legend = L.control({position: 'bottomright'});

		legend.onAdd = function (map) {


  if (<?php echo "'$check'" ?> == 1) {
			var div = L.DomUtil.create('div', 'info legend'),
				grades = [0, 5,10,15,20,25],
				labels = [],
				from, to;
}else  if (<?php echo "'$check'" ?> == 2) {
        var div = L.DomUtil.create('div', 'info legend'),
        grades = [0, 1000000,5000000,10000000,50000000,100000000],
        labels = [],
        from, to;
}else{
      var div = L.DomUtil.create('div', 'info legend'),
        grades = [0, 5,10,15,20,25],
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

		legend.addTo(map);


		
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
    if ($strategic == '' ) {
           $result1 = pg_query("select strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
      group by strategic order by strategic asc");
    }elseif ($strategic != '' and  $substrategic == '') {
           $result1 = pg_query("select substrategic as strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
      group by substrategic order by substrategic asc");
    }elseif ($strategic != '' and  $substrategic != '') {
           $result1 = pg_query("select substrategic as strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
      group by substrategic order by substrategic asc");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            '<?php echo $arr1[strategic]; ?>',
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
    series: [ {
        name: 'จำนวนโครงการ',
        data: [    <?php 
    if ($strategic == '' ) {
           $result1 = pg_query("select strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
      group by strategic order by strategic asc");
    }elseif ($strategic != '' and  $substrategic == '') {
           $result1 = pg_query("select substrategic as strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
      group by substrategic order by substrategic asc");
    }elseif ($strategic != '' and  $substrategic != '') {
           $result1 = pg_query("select substrategic as strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic'
      group by substrategic order by substrategic asc");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            <?php echo $arr1[count]; ?>,
<?php } ?>],
        color: '#804000'
    }]
});
</script>



<script>

    <?php
        if ($check != 2) {
              $name2 = 'โครงการ';
              $name3 = 'จำนวนโครงการ';
        }
        elseif ($check == 2) {
              $name2 = 'บาท';
              $name3 = 'จำนวนงบประมาณ';
        }
     ?>

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

if ($check != 2) {
       if ($prov_name == '') {
     $result1 = pg_query("select province as name_area,count(*) from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by province order by province asc");
      }elseif ($prov_name != '' and $amphoe_name == '') {
     $result1 = pg_query("select amphoe as name_area,count(*) from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by amphoe order by amphoe asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
     $result1 = pg_query("select tambon as name_area,count(*) from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by tambon order by tambon asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
     $result1 = pg_query("select tambon as name_area,count(*) from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by tambon order by tambon asc");
      } 
    }elseif ($check == 2) {
             if ($prov_name == '') {
     $result1 = pg_query("select province as name_area,sum(budget) as count from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by province order by province asc");
      }elseif ($prov_name != '' and $amphoe_name == '') {
     $result1 = pg_query("select amphoe as name_area,sum(budget) as count from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by amphoe order by amphoe asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
     $result1 = pg_query("select tambon as name_area,sum(budget) as count from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by tambon order by tambon asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
     $result1 = pg_query("select tambon as name_area,sum(budget) as count from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by tambon order by tambon asc");
      } 
    }



    
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            '<?php echo $arr1[name_area]; ?>',
<?php } ?>]
    },
    yAxis: {
        title: {
            text: '<?php echo $name3; ?>'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' <?php echo $name2; ?>'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [ {
        name: '<?php echo $name3; ?>',
        data: [  <?php 
if ($check != 2) {
       if ($prov_name == '') {
     $result1 = pg_query("select province as name_area,count(*) from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by province order by province asc");
      }elseif ($prov_name != '' and $amphoe_name == '') {
     $result1 = pg_query("select amphoe as name_area,count(*) from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by amphoe order by amphoe asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
     $result1 = pg_query("select tambon as name_area,count(*) from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by tambon order by tambon asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
     $result1 = pg_query("select tambon as name_area,count(*) from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by tambon order by tambon asc");
      } 
    }elseif ($check == 2) {
             if ($prov_name == '') {
     $result1 = pg_query("select province as name_area,sum(budget) as count from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by province order by province asc");
      }elseif ($prov_name != '' and $amphoe_name == '') {
     $result1 = pg_query("select amphoe as name_area,sum(budget) as count from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by amphoe order by amphoe asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
     $result1 = pg_query("select tambon as name_area,sum(budget) as count from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by tambon order by tambon asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
     $result1 = pg_query("select tambon as name_area,sum(budget) as count from  budget_view where amphoe is not null and province like '%$prov_name' and amphoe like '%$amphoe_name' and tambon like '%$tambon_name' and strategic like '%$strategic' and substrategic like '%$substrategic' group by tambon order by tambon asc");
      } 
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            <?php echo $arr1[count]; ?>,
<?php } ?>],
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

  if ($check != 2) {
                if ( $prov_name2 == '') {
                    $sql = "
            select province as name_text,province,count(*) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join province_sim on budget_view.province = province_sim.pv_tn
            where re_royin like '%$region2' and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
            group by province,geom; ";
            }elseif ($prov_name2 != '' and $amphoe_name2 == '') {
                    $sql = "
            select province,ap_tn as name_text,ap_tn,count(*) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join amphoe_sim on budget_view.amphoe = amphoe_sim.ap_tn and budget_view.province = amphoe_sim.pv_tn
            where re_royin like '%$region2' and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
            group by province,ap_tn,geom; ";
            }elseif ($prov_name2 != '' and $amphoe_name2 != '' and $tambon_name2 == '') {
                    $sql = "
            select province,ap_tn,tambon as name_text,tambon,count(*) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join tambon_sim on budget_view.tambon = tambon_sim.tb_tn and budget_view.amphoe = tambon_sim.ap_tn and budget_view.province = tambon_sim.pv_tn
            where re_royin like '%$region2' and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
            group by province,ap_tn,tambon,geom; ";
            }elseif ($prov_name2 != '' and $amphoe_name2 != '' and $tambon_name2 != '') {
                    $sql = "
            select province,ap_tn,tambon as name_text,tambon,count(*) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join tambon_sim on budget_view.tambon = tambon_sim.tb_tn and budget_view.amphoe = tambon_sim.ap_tn and budget_view.province = tambon_sim.pv_tn
            where re_royin like '%$region2' and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
            group by province,ap_tn,tambon,geom; ";
            }
  }elseif ($check == 2) {
                if ( $prov_name2 == '') {
                    $sql = "
            select province as name_text,province,sum(budget) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join province_sim on budget_view.province = province_sim.pv_tn
            where re_royin like '%$region2' and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
            group by province,geom; ";
            }elseif ($prov_name2 != '' and $amphoe_name2 == '') {
                    $sql = "
            select province,ap_tn as name_text,ap_tn,sum(budget) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join amphoe_sim on budget_view.amphoe = amphoe_sim.ap_tn and budget_view.province = amphoe_sim.pv_tn
            where re_royin like '%$region2' and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
            group by province,ap_tn,geom; ";
            }elseif ($prov_name2 != '' and $amphoe_name2 != '' and $tambon_name2 == '') {
                    $sql = "
            select province,ap_tn,tambon as name_text,tambon,sum(budget) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join tambon_sim on budget_view.tambon = tambon_sim.tb_tn and budget_view.amphoe = tambon_sim.ap_tn and budget_view.province = tambon_sim.pv_tn
            where re_royin like '%$region2' and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
            group by province,ap_tn,tambon,geom; ";
            }elseif ($prov_name2 != '' and $amphoe_name2 != '' and $tambon_name2 != '') {
                    $sql = "
            select province,ap_tn,tambon as name_text,tambon,sum(budget) as count,ST_AsGeoJSON(geom) AS geojson from budget_view 
            inner join tambon_sim on budget_view.tambon = tambon_sim.tb_tn and budget_view.amphoe = tambon_sim.ap_tn and budget_view.province = tambon_sim.pv_tn
            where re_royin like '%$region2' and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
            group by province,ap_tn,tambon,geom; ";
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



	   var map2 = L.map('map2').setView([13.4011203,100.2525025], 6);

	    L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
	    maxZoom: 20,
	    subdomains:['mt0','mt1','mt2','mt3']
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
             d > 20  ? '#c0600c' :
             d > 15  ? '#f07d15' :
             d > 10  ? '#f4a157' :
             d > 5  ? '#f9c99f' :
                  '#fdf2e7';
    }
  }else if (<?php echo "'$check'" ?> == 2) {
            function getColor(d) {
        return d > 100000000 ? '#603006' :
             d > 50000000  ? '#c0600c' :
             d > 10000000  ? '#f07d15' :
             d > 5000000  ? '#f4a157' :
             d > 1000000  ? '#f9c99f' :
                  '#fdf2e7';
    }
  }else{
        function getColor(d) {
        return d > 25 ? '#603006' :
             d > 20  ? '#c0600c' :
             d > 15  ? '#f07d15' :
             d > 10  ? '#f4a157' :
             d > 5  ? '#f9c99f' :
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

            var popupText = L.popup().setContent('<center><p><b>กราฟแสดงข้อมูลจำนวนโครงการตามประเด็นยุทธศาสตร์</b><br>ในพื้นที่ '+feature.properties.name_title+'</p> <iframe src="data.php?region=Central&prov_name='+province+'&amphoe_name='+amphoe+'&tambon_name='+tambon+'&strategic=&check_budget=1&no_sql=1&region2=&strategic2=&check_budget=1" name="map_php" style="width: 100%; height: 350px " frameborder="0" scrolling="yes"  ></iframe>');

            var customOptions =
                {
                'minWidth': '600'
                }

            layer.bindPopup(popupText,customOptions);
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
				grades = [0, 5,10,15,20,25],
				labels = [],
				from, to;
}else  if (<?php echo "'$check'" ?> == 2) {
        var div = L.DomUtil.create('div', 'info legend'),
        grades = [0, 1000000,5000000,10000000,50000000,100000000],
        labels = [],
        from, to;
}else{
      var div = L.DomUtil.create('div', 'info legend'),
        grades = [0, 5,10,15,20,25],
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
    if ($strategic == '' ) {
           $result1 = pg_query("select strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
      group by strategic order by strategic asc");
    }elseif ($strategic != '' and  $substrategic == '') {
           $result1 = pg_query("select substrategic as strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
      group by substrategic order by substrategic asc");
    }elseif ($strategic != '' and  $substrategic != '') {
           $result1 = pg_query("select substrategic as strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
      group by substrategic order by substrategic asc");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            '<?php echo $arr1[strategic]; ?>',
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
    series: [ {
        name: 'จำนวนโครงการ',
        data: [    <?php 
    if ($strategic == '' ) {
           $result1 = pg_query("select strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
      group by strategic order by strategic asc");
    }elseif ($strategic != '' and  $substrategic == '') {
           $result1 = pg_query("select substrategic as strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
      group by substrategic order by substrategic asc");
    }elseif ($strategic != '' and  $substrategic != '') {
           $result1 = pg_query("select substrategic as strategic,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2'
      group by substrategic order by substrategic asc");
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            <?php echo $arr1[count]; ?>,
<?php } ?>],
        color: '#804000'
    }]
});
</script>



<script>

    <?php
        if ($check != 2) {
              $name2 = 'โครงการ';
              $name3 = 'จำนวนโครงการ';
        }
        elseif ($check == 2) {
              $name2 = 'บาท';
              $name3 = 'จำนวนงบประมาณ';
        }
     ?>

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

if ($check != 2) {
       if ($prov_name == '') {
     $result1 = pg_query("select province as name_area,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by province order by province asc");
      }elseif ($prov_name != '' and $amphoe_name == '') {
     $result1 = pg_query("select amphoe as name_area,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by amphoe order by amphoe asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
     $result1 = pg_query("select tambon as name_area,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by tambon order by tambon asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
     $result1 = pg_query("select tambon as name_area,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by tambon order by tambon asc");
      } 
    }elseif ($check == 2) {
             if ($prov_name == '') {
     $result1 = pg_query("select province as name_area,sum(budget) as count from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by province order by province asc");
      }elseif ($prov_name != '' and $amphoe_name == '') {
     $result1 = pg_query("select amphoe as name_area,sum(budget) as count from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by amphoe order by amphoe asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
     $result1 = pg_query("select tambon as name_area,sum(budget) as count from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by tambon order by tambon asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
     $result1 = pg_query("select tambon as name_area,sum(budget) as count from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by tambon order by tambon asc");
      } 
    }



    
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            '<?php echo $arr1[name_area]; ?>',
<?php } ?>]
    },
    yAxis: {
        title: {
            text: '<?php echo $name3; ?>'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' <?php echo $name2; ?>'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [ {
        name: '<?php echo $name3; ?>',
        data: [  <?php 
if ($check != 2) {
       if ($prov_name == '') {
     $result1 = pg_query("select province as name_area,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by province order by province asc");
      }elseif ($prov_name != '' and $amphoe_name == '') {
     $result1 = pg_query("select amphoe as name_area,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by amphoe order by amphoe asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
     $result1 = pg_query("select tambon as name_area,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by tambon order by tambon asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
     $result1 = pg_query("select tambon as name_area,count(*) from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by tambon order by tambon asc");
      } 
    }elseif ($check == 2) {
             if ($prov_name == '') {
     $result1 = pg_query("select province as name_area,sum(budget) as count from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by province order by province asc");
      }elseif ($prov_name != '' and $amphoe_name == '') {
     $result1 = pg_query("select amphoe as name_area,sum(budget) as count from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by amphoe order by amphoe asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name == '') {
     $result1 = pg_query("select tambon as name_area,sum(budget) as count from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by tambon order by tambon asc");
      }elseif ($prov_name != '' and $amphoe_name != '' and $tambon_name != '') {
     $result1 = pg_query("select tambon as name_area,sum(budget) as count from  budget_view where strategic is not null 
     and province like '%$prov_name2' and amphoe like '%$amphoe_name2' and tambon like '%$tambon_name2' and strategic like '%$strategic2' and substrategic like '%$substrategic2' group by tambon order by tambon asc");
      } 
    }
    while ($arr1 = pg_fetch_array($result1)) { 
    ?>

            <?php echo $arr1[count]; ?>,
<?php } ?>],
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
