<?php
include('../config.php');

				$user_id = $_POST['user_id'];
				$chain = $_POST["sub_project_group_p"];
				$word1 = "ต้นทาง";
				$word2 = "กลางทาง";
				$word3 = "ปลายทาง";

				if (strpos($chain, $word1) !== FALSE){
					$chain_1 = 1;
					$chain_2 = 0;
					$chain_3 = 0;
				}elseif (strpos($chain, $word2) !== FALSE){
					$chain_1 = 0;
					$chain_2 = 1;
					$chain_3 = 0;
				}elseif (strpos($chain, $word3) !== FALSE){
					$chain_1 = 0;
					$chain_2 = 0;
					$chain_3 = 1;
				}
				

echo $chain_1;
echo $chain_2;
echo $chain_3;


				$sql2 = "insert into budget_view2 
				(	user_id, 
					strategic20, 
					substrategic20, 
					economic_plan, 
					economic_target,
					economic_measure,
					integration_29,
					integration_target,
					integration_measure,
					integration_how,
					project_group,
					sub_project_group,
					project_cate,
					prj_name,
					reason,
					outcome,
					outputs,
					target,
					who_target,
					indica_tar,
					activity,
					activity_type,
					indica_act,
					year_project,
					budget,
					agency,
					impact,
					project_type,
					chain_1,
					chain_2,
					chain_3
				)
				values 
				( 	'".$_POST["user_id"]."',
					'".$_POST["strategic20"]."',
					'".$_POST["substrategic20"]."',
					'".$_POST["economic_plan"]."',
					'".$_POST["economic_target"]."',
					'".$_POST["economic_measure"]."',
					'".$_POST["integration_29"]."',
					'".$_POST["integration_target"]."',
					'".$_POST["integration_measure"]."',
					'".$_POST["integration_how"]."',
					'".$_POST["project_group_p"]."',
					'".$_POST["sub_project_group_p"]."',
					'".$_POST["project_cate"]."',
					'".$_POST["prj_name"]."',
					'".$_POST["reason"]."',
					'".$_POST["outcome"]."',
					'".$_POST["outputs"]."',
					'".$_POST["target"]."',
					'".$_POST["who_target"]."',
					'".$_POST["indica_tar"]."',
					'".$_POST["activity"]."',
					'".$_POST["activity_type"]."',
					'".$_POST["indica_act"]."',
					'".$_POST["year_project"]."',
					'".$_POST["budget"]."',
					'".$_POST["agency"]."',
					'".$_POST["impact"]."',
					'".$_POST["project_type"]."',
					$chain_1,
					$chain_2,
					$chain_3


				);"; 

			$result = pg_query($db,$sql2);



 $sea = pg_query($db, "SELECT * FROM budget_view2 where user_id = '$user_id' order by prj_id desc limit 1 ;");
 $search = pg_fetch_array($sea);
 $idproject = $search[prj_id];

 header("Location: ../add_area.php?idproject=$idproject&user=$user_id");


				?>