<?php
include('../config.php');



				$sql2 = "insert into area_project 
				( id_project, user_id, prov_name, amp_name, tam_name, re_royin,re_osm)
				values 
				( '".$_GET["idproject"]."' , '".$_GET["user_id"]."' , '".$_GET["prov_name"]."', '".$_GET["amphoe_name"]."', '".$_GET["tambon_name"]."', '".$_GET["region"]."', '".$_GET["re_osm"]."'  );"; 

				$result = pg_query($sql2);



header("Location: ../add_area.php?idproject=".$_GET["idproject"]."&user=".$_GET["user_id"]." ");


				?>