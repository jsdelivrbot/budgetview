<?php
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
include('../config.php');


$type = $_GET[type];


$region = $_GET[region];
$prov_name  = $_GET[prov_name];
$amp_name  = $_GET[_name];
$tam_name  = $_GET[tam_name];
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
$type_project = $_GET[type_project];





$sql = "SELECT row_to_json(fc)
 FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features
 FROM (SELECT 'Feature' As type
    , ST_AsGeoJSON(a.geom)::json As geometry
    , row_to_json((name_t, a.id_project)) As properties
   FROM feature As a  
    inner join budget_view2 b on a.id_project = b.prj_id 
    inner join area_project c on b.prj_id = c.id_project
 where
                        re_royin like '%$region'  
                        and prov_name like '%$prov_name' 
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
                        and type_g = '$type'
    ) As f )  As fc;";

   $res = pg_query($sql);
  
   while ($row = pg_fetch_row($res)) {
    echo $row[0];
  }


?>