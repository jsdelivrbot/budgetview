<?php
include('../config.php');

				$strategic = $_GET['strategic'];
				$substrategic = $_GET['substrategic'];
				$prj_name = $_GET['prj_name'];
				$budget = $_GET['budget'];
				$agency = $_GET['agency'];
				$idproject = $_GET['idproject'];
				


				$sql2 = "update  budget_view2  set   prj_name = '$prj_name' , budget = '$budget', agency = '$agency' 
				where prj_id =  $idproject;"; 

				$result = pg_query($db,$sql2);




header("Location: ../project_detail.php?prj=$idproject");


				?>