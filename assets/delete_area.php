<?php 
include('../config.php');




$strSQL = "delete from area_project where id_project = ".$_GET["idproject"]." and prov_name = '".$_GET["prov_name"]."' and  amp_name  = '".$_GET["amp_name"]."' and   tam_name  = '".$_GET["tam_name"]."'; ";
$objQuery = pg_query($strSQL);



header("Location: ../add_area.php?idproject=".$_GET["idproject"]."&user=".$_GET["user_id"]."");

   
?>
