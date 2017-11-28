<?php
include('../config.php');







    $name_t = $_POST['name_t'];
    $geom = $_POST['geom'];
    $type = $_POST['layerType'];
    $project = $_POST['project'];

    //echo $geom;

    $sql = "INSERT INTO feature (name_t,geom,type_g,id_project) 
			VALUES ( '$name_t', ST_SetSRID(st_geomfromgeojson('$geom'), 4326), '$type','$project')";
    //echo $sql;
    pg_query($sql);
        
    echo 'insert ok';
?>