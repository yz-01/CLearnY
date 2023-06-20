<?php 
session_start();
include("dataconnection.php");

$eid= $_SESSION['eid'];
$ename= $_SESSION['ename'];
$epass= $_SESSION["epass"];
$ephone= $_SESSION["ephone"];
$eemail= $_SESSION["eemail"];
$result= mysqli_query($connect, "SELECT * from educator where educator_email = '$eemail'");
$result_course= mysqli_query($connect, "SELECT * from course");

$row= mysqli_fetch_assoc($result);
$row_course= mysqli_fetch_assoc($result_course);
?>
<html>
<title>Educator profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<head>
<style>
	body {
	    font-family: "Lato", sans-serif;
		margin:0;
		background-color:#F9F9F9;
	}
/*------------------------------Start of sidebar------------------------------*/
	.sidebar-content {
		overflow:auto;
	}
	
	.sidebar {
		height: 100%;
	    width: 230px;
		position: fixed;
		z-index: 2;
		top: 0;
		left: 0;
		background-color: #fff;
		overflow-x: hidden;
		box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.2);
	}
	
	.sidebar-content i{
		margin-right:10px;
	}

	.sidebar-content a {
	    display: block;
		padding-top: 10px;
		padding-right: 24px;
		padding-bottom: 10px;
		padding-left: 15px;
		margin-bottom:2px;
		margin-top:2px;
	    text-decoration: none;
	    font-size: 18px;
	    color: #606060;
		border-radius: 2px;
	}

	.sidebar-content a:hover {
	    background-color: #F2F2F2;
		
	}
	
	
	.sidebar-content a:focus{
		background-color:#EEEEEE;
		border-left: 6px solid #FF5A5F;
		color: black;
	}
	
	
	
/*------------------------------End of sidebar------------------------------*/
/*------------------------------Start of top bar------------------------------*/
	.topbar {
	    overflow: hidden;
	    background-color: #fff;
	    position: fixed;
	    top: 0;
	    width: 100%;
		height: 70px;
		display: flex;
		justify-content: flex-end;
		z-index:1;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
	}

	.profile {
		display: flex;
		align-items: center;
	}
	
	.profile_detail{
		display:flex;
		align-items: center;  
		margin-right: 30px;
	}
	
	.profile_detail img{
		margin-right: 20px;
	}
	
	.profile a{
		text-decoration: none;
		color: black;
	}
	
	.upload_img{
		margin-right: 20px;
		margin-top: 10px;
	}
	
	
	
	
	
	
	.rightdrop {
		position: relative;
		display: inline-block;
		background-color: #fff;
		border-radius:5px;
		color: black;
		padding: 15px;
	}
	

	.rightdrop-content {
		display: none;
		position: fixed;
		background-color: #fff;
		min-width: 500px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		
	}
	
	.rightdrop:hover{
		background-color:#F2F2F2;
		cursor:pointer;
	}

	.rightdrop:hover .rightdrop-content {
		margin-top: 10px;
		margin-left: -15px;
		display: block;
	}
	
	.rightdrop-content a{
		color:black;
		text-decoration:none;
	}
	
	.rightdrop-content a p{
		font-size:15px;
		padding: 20px;
		margin-top:-16px;
		margin-bottom:-16px;
	}
	
	.rightdrop-content a p:hover{
		background-color:#F2F2F2;
		color: #FF5A5F;
	}


/*------------------------------End of top bar------------------------------*/
/*------------------------------Start of content------------------------------*/
	textarea {
  resize: none;
}
	.main{
		margin-top: 70px;
		margin-left:230px;
		overflow: auto;
	}
	
	.content{
		display:grid;
		grid-template-columns: 1fr 1fr 0.5fr;
		grid-template-rows: auto;
		margin: auto;
		margin-top:1em;
		width: 95%;
		padding:20px;
	}
	
	
	.contentLeftPic{
		padding:20px;
		padding-left: 50px;
		margin-bottom:20px;
	}
	
	.contentRightChangePass{
		padding-left:10px;
		padding-bottom:10px;
	}
	.contentRightChangePass button a{
		text-decoration: none;
		color: black;
	}
	
	.contentRightName, .contentRightPass,
	.contentRightEmail, .contentRightContact,
	.contentRightJob, .contentRightEdu,
	.contentRightWork, .contentRightCert,
	.contentLeftBio{
		padding:10px;
		font-size:18px;
		color:#606060;
	}
	
	
	.content input{
		padding:5px;

	}	
	
	input[type=submit]{
		background-color:#FF7478;
		display:flex;
		align-items: center;
		justify-content: start;
		height:50px;
		font-size:15px;
		color: #fff;
		border: none;
		margin-left: 37%;
		padding-left: 15px;
		padding-right:15px;
	}
	
	input[type=submit]:hover{
		background-color:#FF5A5F;
		cursor:pointer;
	}
	
	input[type=submit]:active{
		
		outline: none;
		
	}
		
/*------------------------------End of content------------------------------*/
	

	
</style>
</head>
<body>

	<div class="sidebar">
	    <img src="src/C-learnY_red.png" alt="C-learnY's Logo" style="width:100%; margin-top:10px;">
	    <hr style="height:1px; width:90%" >
		
	    <div class="sidebar-content" >
			<a href="educator homepage.php"><i class="fa fa-fw fa-home"></i> Home</a>
			<a href="educatorManageCourse.php"><i class="fa fa-fw fa-tasks"></i> Manage Courses</a>
			<a href="educator analytics.php"><i class="fa fa-fw fa-bar-chart "></i> Analytics</a>
			<a href="educator wallet.php"><i class="fa fa-fw fa-money "></i> My Wallet</a>
			<a href="notification_educator.php"><i class="fa fa-fw fa-bell"></i> Notification</a>
			<a href="Contact Us.php" target="_blank"><i class="fa fa-fw fa-envelope "></i> Contact</a>
		</div>
	</div>
	
	<div class="topbar">
		
		<div class="profile">
				<a href="upload_educator.php">
					<div class="upload_img">
						<img src="src/upload.png" alt="upload" width="40px" height="40px">
					</div>
				</a>
				<div class="rightdrop">
					<div class="profile_detail">
						<?php
							$image = $row['image_educator'];
							$image_src = "educator_profile_image/".$image;
							$result = mysqli_query($connect,"SELECT * FROM educator where image_educator = '$image'");
							$count = mysqli_num_rows($result);
							if($count != 0)
							{
								echo "<img width='50px' height='50px' src='".$image_src ."'>";
							}
							else
							{
							?>
								<img src="src/profilepic.png" width="50px" height="50px"/>
							<?php
							}
						?>
						<span><?php echo $row["educator_name"];?></span>
						<i class="fa fa-sort-desc" style="margin-left:15px; margin-bottom: 5px; margin-right: -20px;"></i>
					</div>
					<div class="rightdrop-content">
						<a href="educator_profile.php"><p style="margin-top:0px;">My Profile</p></a>
						<a href="Landing page.php"><p style="margin-bottom:0px;">Logout</p></a>
					</div>
				</div>
		</div>
		
	</div>
	
	<div class="main">
		
		<div class="content">
			
				<div class="contentLeft">
				<form  name="educator_form" action="" method="POST" enctype='multipart/form-data'>
					<div class="contentLeftPic">
						<label for="img">
							<input type="file" name="image" id="img" accept="image/*" style="display:none;"/>
							<?php
								$image = $row['image_educator'];
								$image_src = "educator_profile_image/".$image;
								$result = mysqli_query($connect,"SELECT * FROM educator where image_educator = '$image'");
								$count = mysqli_num_rows($result);
								if($count != 0)
								{
									echo "<img width='200px' height='200px' src='".$image_src ."'>";
								}
								else
								{
								?>
									<img src="src/profilepic.png" width="200px" height="200px"/>
								<?php
								}
							?>
						</label>
					</div>
						<div class="contentRightName">
							<span><i class="fa fa-user"></i></span>		Name<br>
							<input type="text" name="name" size="40" style="padding:10px; font-size:15px;" value="<?php echo $row["educator_name"];?>"  />
						</div>
						
						<div class="contentRightPass">
							<span><i class="fa fa-lock"></i></span>		Password<br>
							<input type="password" name="" size="40" style="padding:10px; font-size:15px;" value="thisispassword" required disabled />
						</div>
						
						<div class="contentRightChangePass"><button><a href="educator_edit_password.php">Change password</a></button></div>
						
						<div class="contentRightEmail">
							<span><i class="fa fa-envelope"></i></span>		Email<br>
							<input type="email" name="" size="40" style="padding:10px; font-size:15px;" placeholder="<?php echo $row["educator_email"];?>" required disabled />
						</div>
						
						<div class="contentRightContact">
							<span><i class="fa fa-phone"></i></span>		Contact<br>
							<input type="tel" name="phone" size="40" style="padding:10px; font-size:15px;" value="<?php echo $row["educator_phone_number"];?>" />
						</div>
						
						<div class="contentRightJob">
							<span><i class="fa fa-briefcase	"></i></span>		Current job<br>
							<input type="text" name="job" size="40" style="padding:10px; font-size:15px;" value="<?php echo $row["currentjob"];?>"/>
						</div>
		
				</div>
				<div class="contentRight">
		
						<div class="contentLeftBio">
							<span><i class="fa fa-address-card	"></i></span>		Bio<br>
							<textarea name="bio" rows="4" cols="40" maxlength="500"  style="padding:10px; font-size:18px"; value="<?php echo $row["bio"];?>"><?php echo $row["bio"];?></textarea>
						</div>
						
						<div class="contentRightEdu">
							<span><i class="fa fa-graduation-cap"></i></span>		Education<br>
							<textarea name="edu" rows="4" cols="40" maxlength="500"  style="padding:10px; font-size:18px;" value="<?php echo $row["education"];?>"><?php echo $row["education"];?></textarea>
						</div>
						
						<div class="contentRightWork">
							<span><i class="fa fa-building	"></i></span>		Working experience<br>
							<textarea name="exp" rows="4" cols="40" maxlength="500"  style="padding:10px; font-size:18px;" value="<?php echo $row["work_exp"];?>"><?php echo $row["work_exp"];?></textarea>
						</div>
						
						<div class="contentRightCert">
							<span><i class="fa fa-certificate	"></i></span>		Achievements / Awards<br>
							<textarea name="cer" rows="4" cols="40" maxlength="500"  style="padding:10px; font-size:18px;" value="<?php echo $row["certificates"];?>"><?php echo $row["certificates"];?></textarea>
						</div>
						
						<input type="submit" name="Sendbtn" value="Save Changes" />
						
				</form>
				</div>
		
		</div>
		
	</div>
<?php
 //$_FILES['file']['tmp_name'] − the uploaded file in the temporary directory on the web server.

   // $_FILES['file']['name'] − the actual name of the uploaded file.


if(isset($_POST["Sendbtn"]))
{
	$job = $_POST["job"];
	$bio = $_POST["bio"];
	$edu = $_POST["edu"];
	$exp = $_POST["exp"];
	$cer = $_POST["cer"];
	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$target = "educator_profile_image/".basename($_FILES['image']['name']);
	$images = $_FILES['image']['name'];
	if($_FILES['image']['size'] > 0)
	{
		$result_phone = mysqli_query($connect,"SELECT * FROM educator where educator_phone_number = '$phone' AND educator_id != '$row[educator_id]'");
		$count_phone = mysqli_num_rows($result_phone);
		if($count_phone != 0)
		{
		?>
			<script>
				swal(
                {
                    title: "Oh No!",
                    text: "Phone Number had been used, please enter other Phone Number!",
                    icon: "warning",
                    button: "Continue"
                });
			</script>
		<?php
		}
		else
		{
			$sql = "UPDATE educator SET image_educator='$images', educator_phone_number='$phone', educator_name='$name', currentjob='$job', bio='$bio', education='$edu', work_exp='$exp', certificates='$cer' where educator_email='$eemail'";
			mysqli_query($connect, $sql);
			move_uploaded_file($_FILES['image']['tmp_name'], $target);
			?>
			<script>
				swal(
					{
						title: "Congratulations!",
						text: "Upload Successfully!",
						icon: "success",
						button: "Continue"
					}
					).then(function()
					{
						window.location.href = "educatoreditprofile.php";
					});
			</script>
			<?php
		}
	}
	else
	{
		if(strlen($_POST["phone"]) < 10)
		{
			?>
			<script>
				swal(
                {
                    title: "Oh No!",
                    text: "Invalid phone number!",
                    icon: "warning",
                    button: "Continue"
                });
			</script>
			<?php
		}
		else
		{
			$result_phone = mysqli_query($connect,"SELECT * FROM educator where educator_phone_number = '$phone' AND educator_id != '$row[educator_id]'");
			$count_phone = mysqli_num_rows($result_phone);
			if($count_phone != 0)
			{
			?>
				<script>
					swal(
					{
						title: "Oh No!",
						text: "Phone Number had been used, please enter other Phone Number!",
						icon: "warning",
						button: "Continue"
					});
				</script>
			<?php
			}
			else
			{
				$insert = "UPDATE educator SET currentjob='$job', educator_phone_number='$phone', educator_name='$name', bio='$bio', education='$edu', work_exp='$exp', certificates='$cer' where educator_email='$eemail'";
				mysqli_query($connect, $insert);
				?>
				<script>
					swal(
						{
							title: "Congratulations!",
							text: "Upload Successfully!",
							icon: "success",
							button: "Continue"
						}
						).then(function()
						{
							window.location.href = "educatoreditprofile.php";
						});
				</script>
				<?php
			}
		}
	}
}
?>
</body>


</html>
















