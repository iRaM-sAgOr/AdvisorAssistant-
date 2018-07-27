<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<?php //include('header_all.html'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="lindf/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lindf/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lindf/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lindf/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lindf/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lindf/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lindf/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lindf/css/util.css">
	<link rel="stylesheet" type="text/css" href="lindf/css/main.css">
<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('lindf/images/7.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" action='login.php' method="post">
					<div class="login100-form-avatar">
						<img src="lindf/images/logo.jpg" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Advisor Assistant
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="id" name="id" placeholder="UserId">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
							Forgot Username / Password?
						</a>
					</div>

					<div class="text-center w-full">
						<a class="txt1" href="registrationpage.php">
							Create new account
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
				</form>
				
		<?php
	
			if(isset($_POST['login']))
			{
				@$id=$_POST['id'];
				@$password=$_POST['password'];
				
					$query1 = "select * from teacher where tid='$id' and password='$password' ";
					$query2 = "select * from userinfotbl where sid='$id' and password='$password' ";
				
				
					
				
				
				//echo $query;
				$query_run1 = mysqli_query($con,$query1);
				$query_run2 = mysqli_query($con,$query2);
				//echo mysql_num_rows($query_run);
				if($query_run1 || $query_run2 )
				{
					if(mysqli_num_rows($query_run1)>0 || mysqli_num_rows($query_run2)>0)
					{
					//$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					//$_SESSION['username'] = $username;
					//$_SESSION['password'] = $password;
					
					if(mysqli_num_rows($query_run2)>0){///teacer table
                        $row = mysqli_fetch_array($query_run2,MYSQLI_ASSOC);
					
					     $_SESSION['sid'] = $id;
					     $_SESSION['password'] = $password;
					   	
						$query = "select username from userinfotbl where sid='$id' and password='$password' ";
						$query_run = mysqli_query($con,$query);
						$data=mysqli_fetch_array($query_run);
						$_SESSION['username'] = $data['username'];
						//$teacher="student";
                        //$_SESSION['teacher']=$teacher;
						header( "Location: student_profile_modification/studentprofile.php");
					}
						else{//student table userinfotbl
							$row = mysqli_fetch_array($query_run1,MYSQLI_ASSOC);
					
					      $_SESSION['tid'] = $id;
					      $_SESSION['password'] = $password;
						$query = "select * from teacher where tid='$id' and password='$password' ";
						$query_run = mysqli_query($con,$query);
						$data=mysqli_fetch_array($query_run);
						
						//type taking
						$query1 = "select * from teachers_identity where tid='$id'  ";
						$query_run1 = mysqli_query($con,$query1);
						$data1=mysqli_fetch_array($query_run1);
						
						
						$_SESSION['username'] = $data['username'];
						$_SESSION['type'] = $data1['type'];
					header( "Location: Teachertable.php");
					}
					}
		            else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
			
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
				
			}
			
		?>
				
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="lindf/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="lindf/vendor/bootstrap/js/popper.js"></script>
	<script src="lindf/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="lindf/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="lindf/js/main.js"></script>

</body>
</html>