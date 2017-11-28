<?php
include('../config.php');

				$idproject = $_GET['idproject'];
				$prj_name = $_GET['prj_name'];
				$budget = $_GET['budget'];
				$agency = $_GET['agency'];
				$reason = $_GET['reason'];
				$outcome = $_GET['outcome'];
				$outputs = $_GET['outputs'];
				$target = $_GET['target'];
				$who_target = $_GET['who_target'];
				$indica_tar = $_GET['indica_tar'];
				$activity = $_GET['activity'];
				$activity_type = $_GET['activity_type'];
				$indica_act = $_GET['indica_act'];
				$year_project = $_GET['year_project'];
				$impact = $_GET['impact'];
				$project_type = $_GET['project_type'];
				


				$sql2 = "update  budget_view2  set  
				prj_name = '$prj_name' , 
				budget = '$budget', 
				agency = '$agency', 
				reason = '$reason'  , 
				outcome = '$outcome'  , 
				outputs = '$outputs'  , 
				target = '$target'  , 
				who_target = '$who_target'  , 
				indica_tar = '$indica_tar'  , 
				activity = '$activity'  , 
				activity_type = '$activity_type'  , 
				indica_act = '$indica_act'  , 
				year_project = '$year_project'  , 
				project_type = '$project_type'


				where prj_id =  $idproject;"; 

				$result = pg_query($db,$sql2);




header("Location: ../project_detail.php?prj=$idproject");


				?>