<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Log In/Up Page</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="css/style2.css">

  
</head>

<body>

  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Student Registration</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Teacher Registration</label>



		<div class="login-form">
		<form action="pp.php" method="post" enctype="multipart/form-data">
			<div class="sign-in-htm">
				<div class="group">
					<label  class="label">Username</label>
					<input  type="text" name='usrname' class="input" placeholder="Enter Username"  >
				</div>

				<div class="group">
					<label  class="label">Email</label>
					<input  type="Email" name='email' class="input" placeholder="Enter Email" required >
				</div>

				<div class="group">
					<label  class="label">Enter Student Id</label>
					<input  type="id" name='sid' class="input" placeholder="Enter Id" required >
				</div>

				<div class="group">
					<label  class="label">Mobile Number</label>
					<input  type="tel" name='tel' class="input" placeholder="Enter Mobile Number" required >
				</div>
				<div class = "group">
                <p><b>Upload the Image</b></p>
                <input type="file"  name="pic" accept="image/*">
                </div>
				<div class="group">
					<label  class="label">Password</label>
					<input  type="password" placeholder = "Enter Password" class="input" name='password' data-type="password" required>
				</div>

               
                 <div ></div>
				<div class="group">
					<label  class="label">Confirm Password</label>
					<input id="user" type="text" name='cpassword' class="input" placeholder="Type Again" required >
				</div>
				
				
				       <div class="group">
               <label ><b>Supervised by:</b></label>
				<br></br>
 <select name='sir' >
 	<option >Supervisors Name:</option>
         <?php
         ///Dynamically fetch the current registered teachers name by admin........
         $query="select * from teachers_identity";
         $query_run = mysqli_query($con,$query);
         //echo "<select name='sir'>";
          while($data=mysqli_fetch_array($query_run)){
         	//echo "<option >Select car:</option>"
             echo "<option value='{$data["tid"]}'>";
             echo $data['username'];
                 echo '</option>';
    }
                  echo ' </select>';
                   
   
?>
</div>
				
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" name='register' value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="login.php">Already Member</a>
				</div>
			</div>
			</form>
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</div>
	</div>
</div>
  

  

</body>

</html>
