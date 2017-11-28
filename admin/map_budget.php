<?php 
include('config.php');

?>

<!DOCTYPE html>
<html>
<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MAP_FIRE</title>

    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.css" />

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

	<div class="col-md-12 ">
			<div class="x_panel">
				<div id="map" style="width: 100%; height: 650px;" ></div>
            </div>
	   </div>		
   <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ECharts -->
    <script src="vendors/echarts/dist/echarts.min.js"></script>
    
	<script src="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.js"></script>

   
	
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

      $sql = "
select ap_tn,count(*),ST_AsGeoJSON(geom) AS geojson from budget_view 
inner join amphoe_sim on budget_view.amphoe = amphoe_sim.ap_tn
group by ap_tn,geom; ";
   


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
            'prov_nam_t' => $edge['ap_tn'],
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

	var map = L.map('map');
	var OpenStreetMap_BlackAndWhite = L.tileLayer('http://{s}.tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png', {
		maxZoom: 18,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	});
		
	OpenStreetMap_BlackAndWhite.addTo(map);
	map.setView([17.011434, 100.515485], 9);
	
	

		// control that shows state info on hover
		var info = L.control();

		info.onAdd = function (map) {
			this._div = L.DomUtil.create('div', 'info');
			this.update();
			return this._div;
		};

		
		info.update = function (props) {
			this._div.innerHTML = (props ?
				'<b><center>' + props.prov_nam_t + '</b><br /><hr>' + props.value + ' โครงการ'
				: '');
		};
		info.addTo(map);



		// get color depending on population PROV_CODE value
		function getColor(d) {
				return d > 25 ? '#603006' :
					   d > 20  ? '#c0600c' :
					   d > 15  ? '#f07d15' :
					   d > 10  ? '#f4a157' :
					   d > 5  ? '#f9c99f' :
								  '#fdf2e7';
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
			 var popupContent =  feature.properties.value_sum  ;
            layer.bindPopup(popupContent);
             layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
		}

		geojson = L.geoJson(statesData, {
			style: style,
			onEachFeature: onEachFeature
		}).addTo(map);



		var legend = L.control({position: 'bottomright'});

		legend.onAdd = function (map) {

			var div = L.DomUtil.create('div', 'info legend'),
				grades = [0, 5,10,15,20,25],
				labels = [],
				from, to;

			for (var i = 0; i < grades.length; i++) {
				from = grades[i];
				to = grades[i + 1] - 1;

				labels.push(
					'<i style="background:' + getColor(from + 1) + '"></i> ' +
					from + (to ? '&ndash;' + to : '+')+ ' โครงการ');
			}

			div.innerHTML = labels.join('<br>');
			return div;
		};

		legend.addTo(map);


		
	</script>
	
	
</body>
</html>
