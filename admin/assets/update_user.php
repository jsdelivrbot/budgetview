<?php
include('../config.php');
	session_start();
				$user_id = $_GET['user_id'];
				$name_user = $_GET['name_user'];
				$last_user = $_GET['last_user'];
				$phone_user = $_GET['phone_user'];
				$email_user = $_GET['email_user'];
				$pass_user = $_GET['pass_user'];
				


				$sql2 = "update  user_id  set   name_user = '$name_user' , last_user = '$last_user', phone_user = '$phone_user' 
				, email_user = '$email_user' , pass_user = '$pass_user' 
				where user_id =  $user_id;"; 

				$result = pg_query($db,$sql2);

	session_start();
	$_SESSION["email_user"] = $email_user;

header("Location: ../user.php");


				?>