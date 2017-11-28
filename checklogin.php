	  <?php
include('config.php');
?>

<?php
	session_start();
	

	$strpg = "SELECT * FROM user_id WHERE email_user = '".pg_escape_string ($_GET['email_user'])."' 
	and pass_user = '".pg_escape_string ($_GET['pass_user'])."' ;"   ;


	$objQuery = pg_query($strpg);

	$objResult = pg_fetch_array($objQuery);


	if(!$objResult)
	{
		header("location:login.html");
	}
	else
	{
			$_SESSION["email_user"] = $objResult["email_user"];
			$_SESSION["status_user"] = $objResult["status_user"];

			session_write_close();
			
			
			if($objResult["status_user"] == "user")
			{
				header("location:index.php");
			}
			
			else if($objResult["status_user"] == "admin")
			{
				header("location:admin/index.php");
			}
			
			else if($objResult["status_user"] == "admin_gistnu")
			{
				header("location:admin/index.php");
			}
	
			
	}
	pg_close($db);
	
	

	
?>