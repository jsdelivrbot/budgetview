<?php
include('../config.php');

				$strategic = $_POST['strategic'];
				$substrategic = $_POST['substrategic'];
				$prj_name = $_POST['prj_name'];
				$budget = $_POST['budget'];
				$agency = $_POST['agency'];
				$user_id = $_POST['user_id'];
				


				$sql2 = "insert into budget_view2 
				( strategic, substrategic, prj_name, budget, agency,user_id)
				values 
				( '$strategic', '$substrategic', '$prj_name', '$budget', '$agency','$user_id');"; 

				$result = pg_query($db,$sql2);


$sea = pg_query($db, "SELECT * FROM budget_view2 where user_id = '$user_id' order by prj_id desc limit 1 ;");
$search = pg_fetch_array($sea);
$idproject = $search[prj_id];

header("Location: ../add_area.php?idproject=$idproject&user=$user_id");


				?>