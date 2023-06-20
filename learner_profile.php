<?php 
session_start();
include("dataconnection.php");

$lname= $_SESSION['name'];
$lpass= $_SESSION["pass"];
$lphone= $_SESSION["phone"];
$lemail= $_SESSION["email"];
$result= mysqli_query($connect, "SELECT * from learner where learner_email = '$lemail'");

$row= mysqli_fetch_assoc($result);
?>
<html>
<head>
<title>Learner profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">         <!--for the search bar icon-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
		border-left: 6px solid #007BFF;
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
		justify-content: space-between;
		z-index:1;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
	}

	.boxContainer{
		position: relative;
		width: 400px;
		height: 42px;
		border: 4px solid #007BFF;
		padding: 0px 10px;
		border-radius: 50px;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	
	.elementsContainer{
		width: 100%;
		height: 100%;
		vertical-align:middle;
	}
	
	.search{
		border: none;
		height: 100%;
		width: 100%;
		padding: 0px 5px;
		border-radius: 50px;
		font-size: 18px;
		font-family: "Nunito";
		color: #424242; 
		font-weight: 500;
	}
	
	.search:focus{
		outline:none;
	}
	
	.material-icons{
		font-size: 26;
		color: #2980b9;
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
	
	.dropdown {
		margin-left: 280px;
		margin-top: 10px;
		margin-bottom: 10px;
		position: relative;
		display: inline-block;
		background-color: #0084ff;
		border-radius:5px;
		color: #fff;
		padding: 15px;
	}
	

	.dropdown-content {
		display: none;
		position: fixed;
		background-color: #fff;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		
	}
	
	.dropdown:hover{
		background-color:#007BFF;
		cursor:pointer;
	}

	.dropdown:hover .dropdown-content {
		margin-top: 20px;
		margin-left: -15px;
		display: block;
	}
	
	.dropdown-content a{
		color:black;
		text-decoration:none;
	}
	.dropdown-content a:hover{
		color: #007BFF;
	}
	.dropdown-content a:active{
		color: #5CAAFF;
	}
	

	.dropdown-content a p{
		font-size:15px;
		padding: 20px;
		margin-top:-16px;
		margin-bottom:-16px;
	}
	
	.dropdown-content a p:hover{
		background-color:#F2F2F2;
		color: #007BFF;
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
		color: #007BFF;
	}

/*------------------------------End of top bar------------------------------*/
/*------------------------------Start of content------------------------------*/
	
	.main{
		margin-top: 70px;
		margin-left:230px;
		background-color:#F9F9F9;
		overflow: hidden;
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
	
	.contentLeft{
		display:grid;
	}
	
	.contentLeftPic{
		padding:20px;
		padding-left: 50px;
		margin-bottom:20px;
		display:grid;
		justify-content:center;
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
	.contentRightEdu,
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
		background-color:#0084ff;
		display:flex;
		align-items: center;
		justify-content: start;
		height:50px;
		font-size:15px;
		color: #fff;
		border: none;
		margin-left: 23%;
		padding-left: 15px;
		padding-right:15px;
	}
	
	input[type=submit]:hover{
		background-color:#007BFF;
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
	    <img src="src/C-learnY.png" alt="C-learnY's Logo" style="width:100%; margin-top:10px;">
	    <hr style="height:1px; width:90%" >
		
	   <div class="sidebar-content" >
			<a href="learner homepage.php"><i class="fa fa-fw fa-home"></i> Home</a>
			<a href="learner_courses.php"><i class="fa fa-fw fa-trophy"></i> My Course</a>	
			<a href="cart.php"><i class="fa fa-fw fa-shopping-cart "></i> Shopping Cart</a>
			<a href="notification.php"><i class="fa fa-fw fa-bell"></i> Notification</a>
			<a href="Contact Us.php" target="_blank"><i class="fa fa-fw fa-envelope "></i> Contact</a>
		</div>
	</div>
	
	<div class="topbar">
		
		<div class="dropdown">
			<span>Categories</span>
			<div class="dropdown-content">
			<?php
				$category = "SELECT * FROM category";
				$result_category = mysqli_query($connect,$category);
				$row_category = mysqli_fetch_assoc($result_category);	
				do
				{
				?>
					<a href="learner_explore.php?buy&id= <?php echo $row_category['category_id']?>"><p style="margin-top:-5px; margin-bottom:0px;"><?php echo $row_category['category_name'];?></p></a>
				<?php
				}while($row_category = mysqli_fetch_assoc($result_category));
				?>
			</div>
		</div>
		
		
		<div class="profile">
			<div class="rightdrop">
					<div class="profile_detail">
						<?php
							$image = $row['image_learner'];
							$image_src = "learner_profile_image/".$image;
							$result = mysqli_query($connect,"SELECT * FROM learner where image_learner = '$image'");
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
						<span><?php echo $row["learner_name"];?></span>
						<i class="fa fa-sort-desc" style="margin-left:15px; margin-bottom: 5px; margin-right: -20px;"></i>
					</div>
					<div class="rightdrop-content">
						<a href="learnerViewProfile.php"><p style="margin-top:0px;">My Profile</p></a>
						<a href="landing page.php"><p style="margin-bottom:0px;">Logout</p></a>
					</div>
				</div>
		</div>
		
	</div>
	
	<div class="main">
		<div class="content">
			<div class="contentLeft">
			<form  name="learner_form" action="" method="POST" enctype='multipart/form-data'>
				<div class="contentLeftPic">
					<div class="imgupload">
					<label for="img">
						<input type="file" name="image" id="img" accept="image/*" style="display:none;"/>
						<?php
							$image = $row['image_learner'];
							$image_src = "learner_profile_image/".$image;
							$result = mysqli_query($connect,"SELECT * FROM learner where image_learner = '$image'");
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
				</div>		
			</div>
			<div class="contentRight">
					<div class="contentRightName">
							<span><i class="fa fa-user"></i></span>		Name<br>
							<input type="text" name="name" size="40" style="padding:10px; font-size:15px;" value="<?php echo $row["learner_name"];?>"/>
						</div>
						
						<div class="contentRightPass">
							<span><i class="fa fa-lock"></i></span>		Password<br>
							<input type="password" name="" size="40" style="padding:10px; font-size:15px;" value="thisispassword" required disabled />
						</div>
						
						<div class="contentRightChangePass"><button><a href="learner_edit_password.php">Change password</a></button></div>
						
						<div class="contentRightEmail">
							<span><i class="fa fa-envelope"></i></span>		Email<br>
							<input type="email" name="" size="40" style="padding:10px; font-size:15px;" placeholder="<?php echo $row["learner_email"];?>" required disabled />
						</div>
						
						<div class="contentRightContact">
							<span><i class="fa fa-phone"></i></span>		Contact<br>
							<input type="tel" name="phone" size="40" style="padding:10px; font-size:15px;" value="<?php echo $row["learner_phone_number"];?>"/>
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
	$target = "learner_profile_image/".basename($_FILES['image']['name']);
	$images = $_FILES['image']['name'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	if($_FILES['image']['size'] > 0)
	{
		$result_phone = mysqli_query($connect,"SELECT * FROM learner where learner_phone_number = '$phone' AND learner_id != '$row[learner_id]'");
		$count_phone = mysqli_num_rows($result_phone);
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
		else if($count_phone != 0)
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
			$sql = "UPDATE learner SET image_learner='$images', learner_name='$name', learner_phone_number='$phone' where learner_email='$lemail'";
			mysqli_query($connect, $sql);
			move_uploaded_file($_FILES['image']['tmp_name'], $target);
			$_SESSION['learner_image'] = $target;
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
						window.location.href = "learner_profile.php";
					});
			</script>
			<?php
		}
	}
	else
	{
		$result_phone = mysqli_query($connect,"SELECT * FROM learner where learner_phone_number = '$lphone'");
		$row_phone = mysqli_fetch_assoc($result_phone);	
		$result_phone = mysqli_query($connect,"SELECT * FROM learner where learner_phone_number = '$phone' AND learner_id != '$row[learner_id]'");
		$count_phone = mysqli_num_rows($result_phone);
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
		else if($count_phone != 0)
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
			$sql = "UPDATE learner SET learner_name='$name', learner_phone_number='$phone' where learner_email='$lemail'";
			mysqli_query($connect, $sql);
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
						window.location.href = "learner_profile.php";
					});

			</script>
		<?php
		}
	}
}
?>
</body>
</html>





















