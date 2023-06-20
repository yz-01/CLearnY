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
<title>Educator Edit Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">         <!--for the search bar icon-->
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
	
	.main{
		margin-top: 70px;
		margin-left:230px;
		background-color:#F9F9F9;
		height: 100vh;
		overflow: hidden;
	}
	.content{
		margin: 50px;
		width: 500px;
		background-color:#fff;
		margin-left: 30%;
	}
	.aboutme{
		background-color:#FF5A5F;
		display:flex;
		align-items: center;
		justify-content: start;
		padding-left:30px;
		height:50px;
		font-size:20px;
		color: #fff;
		margin-bottom: 5%;
	}
	
	.aboutme i{
		margin-right:10px;
		margin-bottom: 3px;
	}
	.content p{
		padding-left:35%;
		padding-bottom: 10px;
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
	
	.imgupload{
		display:flex;
		justify-content: flex-start;
		align-items: flex-end;
		padding-left:30%;
		padding-top:20px;
		padding-bottom: 20px;
	}
	.form-input{
		position: relative;
		padding-left: 5vw;
	}
	.form-input input{
		  width: 80%;
		  height: 45px;
		  padding-left: 40px;
		  margin-bottom: 20px;
		  box-sizing: border-box;
		  box-shadow: none;
		  border: 1px solid #00000020;
		  border-radius: 50px;
		  outline: none;
		  background: transparent;
	}

	.form-input span{
	  position: absolute;
	  top: 15px;
	  padding-left: 15px;
	  color: #FF5A5F;
	}

	.form-input input::placeholder{
	  color: black;
	  padding-left: 0px;
	}

	.form-input input:focus, .form-input input:valid{
	  border: 2px solid #FF5A5F;
	}

	.form-input input:focus::placeholder{
	  color: #454b69;
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
			<form  name="user_form" action="" method="POST" enctype='multipart/form-data'>
			<div class="aboutme"><i class="fa fa-lock" aria-hidden="true"></i>Change Password</div>
				<div class="form-input">
					<span><i class="fa fa-lock"></i></span>
					<input type="password" name="oldp" placeholder="Old Password" required>
				</div>
				<div class="form-input">
					<span><i class="fa fa-lock"></i></span>
					<input type="password" name="newp" placeholder="New Password"  required>
				</div>
				<div class="form-input">
					<span><i class="fa fa-lock"></i></span>
					<input type="password" name="conp" placeholder="Confirm Password"  required>
				</div>
				<input type="submit" name="Sendbtn" value="Save Changes">
			</form>
		</div>
	</div>
	
<?php
if(isset($_POST["Sendbtn"]))
{
	$oldp = $_POST['oldp'];//password
	$newp = $_POST['newp'];//new password
	$conp = $_POST['conp'];//confirmation password
	$customer = mysqli_query($connect,"SELECT * from educator where educator_name = '$ename'");
    $cust = mysqli_fetch_assoc($customer);
    $orip = $cust["educator_password"];
	if($oldp == $orip)
	{
		if($newp != $oldp)
		{
			if($conp == $newp)
			{
				$sql = mysqli_query($connect,"UPDATE educator SET educator_password = '$newp' WHERE educator_name = '$ename'");
				if($sql)
                {
                    ?>
                    <script>
						swal(
						{
							title: "Congratulations!",
							text: "Update Successfully!",
							icon: "success",
							button: "Continue"
						}
						).then(function()
						{
							window.location.href = "educator homepage.php";
						});
                    </script>
                    <?php
                }
			}
			else
			{
				?>
					<script>
						swal(
						{
							title: "Oh No!",
							text: "Your Confirmation password is not same with New password!",
							icon: "warning",
							button: "Continue"
						}
						);
					</script>
				<?php
			}
		}
		else
		{
			?>
				<script>
						swal(
						{
							title: "Oh No!",
							text: "Your New password is same with Current password!",
							icon: "warning",
							button: "Continue"
						}
						);
				</script>
			<?php
		}
	}
	else
	{
		?>
			<script>
					swal(
						{
							title: "Oh No!",
							text: "Your Old password is not same with Original password!",
							icon: "warning",
							button: "Continue"
						}
						);
			</script>
		<?php
	}
}
?>

</body>
</html>