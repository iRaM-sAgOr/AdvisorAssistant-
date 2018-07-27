<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<?php include('header_all.html');
 ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Page</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="css/style2.css">

  
</head>

<body>

  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Student Registration</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Teacher Registration</label>



		<div class="login-form">
		<form action="registrationpage.php" method="post" enctype="multipart/form-data">
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
					<button type="submit" class='button' name="register" >Sign Up</button>
					
				</div>

				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="login.php">Already Member</a>
				</div>
			</div>

</form>

<?php
			if(isset($_POST['register']))
			{
				@$username=$_POST['usrname'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				@$email=$_POST['email'];
				@$sid=$_POST['sid'];
				@$tel=$_POST['tel'];
				@$type=$_POST['sir'];
				
                
             
				//echo $type;
				if($password==$cpassword)
				{
					//echo '<script type="text/javascript">alert("value is $type!")</script>';
				
					
					     $query = "select * from userinfotbl where sid='$sid'";
					     //echo $query;
				         $query_run = mysqli_query($con,$query);
				         //echo mysql_num_rows($query_run);
				          if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							//Photo file upladed in a folder for furthe requirement.Not to fetch from database directly.from the folder of the server.
                         $pic=$_FILES['pic']['name'];//pic is the name attribute of image option 
                         $target = "imgs/".basename($pic);//imgs is the folder name.
                         
                         $uploadOk=1;
                         //////////////size check...............
                         if ($_FILES['pic']['size'] > 1000000) {
                         $uploadOk = 0;
                         }
                         /////////////type check..........
                         $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
                         if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                         
                         $uploadOk = 0;
                         }
                        ///////////////////.......................&& move_uploaded_file($_FILES['pic']['tmp_name'], $target)
                            if(move_uploaded_file($_FILES['pic']['tmp_name'], $target) && $uploadOk==1)//if the file is uploaded in the imgs folder then okay and size ,type also
                            {
                            	$cgpa=0.0;
                            	$bl='NO FAIL';
							$query = "INSERT  into student_request values('$username','$password','$email','$sid','$tel','$pic','$type','$cgpa','$bl')";
							//$query_run = mysqli_query($con,$query);
							
							if($query_run = mysqli_query($con,$query))
							{
								//insert in student_cgpa table 
								
								$query1 = "INSERT  into student_cgpa values('0','0','0','0','0','0','0','0','$sid')";
								mysqli_query($con,$query1);
								//end
								
								
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								$_SESSION['sid'] = $sid;
								//header( "Location:login.php");
								//echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
							}
							else
							{
									
								
							
							    echo '<script type="text/javascript">alert("Registration Unsuccessful due to server error. Please try later.")</script>';
						
							}
						}
							else
						{
							echo '<script type="text/javascript">alert("Sorry, there was an error uploading your photo.")</script>';
							
						}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
					
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>










            <form action="registrationpage.php" method="post" enctype="multipart/form-data">

			<div class="sign-up-htm">

				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" name='usrname' class="input" placeholder="Enter Username" required >
				</div>

				<div class="group">
					<label  class="label">Email</label>
					<input id="user" type="Email" name='email' class="input" placeholder="Enter Email" required >
				</div>

				<div class="group">
					<label for="user" class="label">Enter Teachers Id</label>
					<input id="user" type="id" name='id' class="input" placeholder="Enter Id" required >
				</div>

				<div class="group">
					<label for="user" class="label">Mobile Number</label>
					<input id="user" type="tel" name='tel' class="input" placeholder="Enter Mobile Number" required >
				</div>
                
                <div class = "group">
                <p><b>Upload the Image</b></p>
                <input type="file"  name="pic" accept="image/*">
                </div>

              

     

				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" placeholder = "Enter Password" class="input" name='password' data-type="password" required>
				</div>

               
                 <div ></div>
				<div class="group">
					<label for="user" class="label">Confirm Password</label>
					<input id="user" type="text" name='cpassword' class="input" placeholder="Type Again" required >
				</div>
				<div class="group">
					<input type="submit" class="button" name='registerT' value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="login.php">Already Member</a>
				</div>
			</div>
         </form>


<?php
			if(isset($_POST['registerT']))
			{
				@$username=$_POST['usrname'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				@$email=$_POST['email'];
				@$id=$_POST['id'];
				@$tel=$_POST['tel'];
				@$pic=$_POST['pic'];
				//@$type=$_POST['type'];
				
				
				if($password==$cpassword)
				{
					//echo '<script type="text/javascript">alert("value is $type!")</script>';
					
					
			             $query = "select * from teacher where tid='$id'";
			             $query2="select * from teachers_identity where tid='$id'";
					     //echo $query;
				         $query_run = mysqli_query($con,$query);
				         $query_run2 = mysqli_query($con,$query2);
				         //echo mysql_num_rows($query_run);
				        if($query_run)
					 {
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This UserId Already exists.. Please try Valid userId!")</script>';
						}
						else if(mysqli_num_rows($query_run2)==0){
							echo '<script type="text/javascript">alert("This UserId is not Valid for the Registration.. Please try Valid userId!")</script>';
						}
						else
						{
							$pic=$_FILES['pic']['name'];
                         $target = "imgs/".basename($pic);
                         
                         $uploadOk=1;
                         //////////////size check...............
                         if ($_FILES['pic']['size'] > 1000000) {
                         $uploadOk = 0;
                         }
                         /////////////type check..........
                         $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
                         if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                         
                         $uploadOk = 0;
                         }
                        ///////////////////.......................&& move_uploaded_file($_FILES['pic']['tmp_name'], $target)
                        if(move_uploaded_file($_FILES['pic']['tmp_name'], $target) && $uploadOk==1)
                        {
							$query = "insert into teacher values('$username','$email','$password','$id','$tel','$pic')";
							//$query_run = mysqli_query($con,$query);
							if($query_run = mysqli_query($con,$query))
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								$_SESSION['tid']=$id;
								//header( "Location:login.php");
								//header( "Location: login.php");
							}
							 else
		      	             {
							        	echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
					         }





					    }
					    	else
						{
							echo '<script type="text/javascript">alert("Sorry, there was an error uploading your photo.")</script>';
							
						}

					}
					   }
					         else
			                 {
				          	echo '<script type="text/javascript">alert("DB error")</script>';
					          }
					
				
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>


		</div>
	</div>
</div>
  

  

</body>

</html>
