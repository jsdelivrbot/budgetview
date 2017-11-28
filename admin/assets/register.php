<?php
include('../config.php');

				$name_user = $_POST['name_user'];
				$last_user = $_POST['last_user'];
				$phone_user = $_POST['phone_user'];
				$email_user = $_POST['email_user'];
				$pass_user = $_POST['pass_user'];
				$status_user = "user";
				

				$sql1 = "select * from user_id  where email_user = '$email_user' ";
				$query = pg_query($sql1);
				$num = pg_num_rows($query);
				if ($num < 1){
				$sql2 = "insert into user_id 
				( name_user, last_user, phone_user, email_user, pass_user, status_user)
				values 
				( '$name_user', '$last_user', '$phone_user', '$email_user', '$pass_user', '$status_user');"; 

				$result = pg_query($db,$sql2);

				if($result){
				echo "ทำการสมัครเรียบร้อยแล้ว<p> 
				
				<form class='login-form' action=\"checklogin.php\">        
					<input type='hidden' class='form-control' id='email' name='email' value = '$email'>
					<input type='hidden' class='form-control' id='pass' name='pass' value = '$telephone'>
					<button class='btn btn-primary btn-lg' type=\"submit\"><font color='white'>เข้าสู่ระบบเพื่อดูข้อมูลเพิ่มเติม</font></button>
				</form>
				
				";
				
				}else{
				echo "".$sql;
				}

				}else{ 
				echo "
				Email นี้มีผู้ใช้งานแล้ว โปรดกรอกข้อมูล Email ใหม่หรือเข้าสู่ระบบ  <p>
			
					
					<button class=\"btn btn-primary btn-lg\" onclick=\"goBack()\"><font color=\"white\">กลับหน้าลงทะเบียน</font></button>
					<a href=\"login.php\" class=\"btn btn-primary btn-lg\"><font color=\"white\">เข้าสู่ระบบเพื่อดูข้อมูลเพิ่มเติม</font></a>
				
				";
				}

				pg_close();


				?>