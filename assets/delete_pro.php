<?php
include('../config.php');


				$idproject = $_GET['idproject'];
				


				$sql1 = "delete from  budget_view2  where prj_id =  $idproject ;"; 
				$result1 = pg_query($db,$sql1);

				$sql2 = "delete from  area_project  where id_project =  $idproject ;"; 
				$result2 = pg_query($db,$sql2);




header("Location: .././");


				?>