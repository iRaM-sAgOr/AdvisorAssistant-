<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Random Login Form</title>
  
  
  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url("a.jpg");
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=id]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}


.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}
.login button[type=submit]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=button]:hover{
	opacity: 0.8;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login input[type=id]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}


.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

.login button[type=submit]:focus{
	outline: none;
}
::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body >

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Please <span>LogIn</span></div>

		</div>
		<br>
		<form action='login.php' method="post">
		<div class="login" >
				<input type="id" placeholder="userid" name="id"><br>
				<input type="password" placeholder="password" name="password"><br>
				<button type="submit" name="login" >LogIn</button>
				 <a href="registrationpage.php">
				<input type="button" value ='New Here' >
				</a>
		</div>
	</form>
		
		<?php
	
			if(isset($_POST['login']))
			{
				@$id=$_POST['id'];
				@$password=$_POST['password'];
				//@$type=$_POST['type'];
				/*if(@$id==10101 || @$id==11111 || @$id==99999){
                   if(@$id==10101)$_SESSION['username'] = 'Sagor';
                   elseif(@$id==11111)$_SESSION['username'] = 'Fahim';
                   elseif(@$id==99999)$_SESSION['username'] = 'Rema';
                   $_SESSION['userid'] = $id;
					//$_SESSION['password'] = $password;
                     header( "Location: Admin_page.php");
				}
				else {*/
					$query1 = "select * from teacher where tid='$id' and password='$password' ";
					$query2 = "select * from userinfotbl where sid='$id' and password='$password' ";
				//}
				
					
				
				
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
					
					if(mysqli_num_rows($query_run2)>0){
                        $row = mysqli_fetch_array($query_run2,MYSQLI_ASSOC);
					
					     $_SESSION['sid'] = $id;
					     $_SESSION['password'] = $password;
					   	//header("Location: student_view_page.php");
						$query = "select username from userinfotbl where sid='$id' and password='$password' ";
						$query_run = mysqli_query($con,$query);
						$data=mysqli_fetch_array($query_run);
						$_SESSION['username'] = $data['username'];
						//$teacher="student";
                        //$_SESSION['teacher']=$teacher;
						header( "Location: student_profile_view.php");
					}
						else{
							$row = mysqli_fetch_array($query_run1,MYSQLI_ASSOC);
					
					      $_SESSION['tid'] = $id;
					      $_SESSION['password'] = $password;
						$query = "select username from teacher where tid='$id' and password='$password' ";
						$query_run = mysqli_query($con,$query);
						$data=mysqli_fetch_array($query_run);
						$_SESSION['username'] = $data['username'];
					header( "Location: teacher_profile_view.php");
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
</body>
</html>