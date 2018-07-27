<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>





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
							$query = "INSERT  into student_request values('$username','$password','$email','$sid','$tel','$pic','$type')";
							$query_run = mysqli_query($con,$query);
							if($query_run   )
							{
								$teacher="student";
                                $_SESSION['teacher']=$teacher;
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								$_SESSION['sid'] = $sid;
								header( "Location: registrationpage.php");
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
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