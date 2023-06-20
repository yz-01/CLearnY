<?php 
session_start();
include("dataconnection.php");

$eid= $_SESSION['eid'];
$ename= $_SESSION['ename'];
$epass= $_SESSION["epass"];
$ephone= $_SESSION["ephone"];
$eemail= $_SESSION["eemail"];
$result= mysqli_query($connect, "SELECT * from educator where educator_email = '$eemail'");

$row= mysqli_fetch_assoc($result);
?>
<html>
<title>Upload</title>
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
		overflow: auto;
	}
	
	.form_title{
		margin: auto;
		margin-top: 2em;
		margin-bottom: 10px;
		width: 60%;
		background-color:#FF5A5F;
		color:#fff;
		padding: 18px;
		border-radius:12px;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
		font-size:20px;
	}
	
	.form_title i{
		margin-right:10px;
		margin-left:5px;
	}
	
	.content_layout{
		margin: auto;
		width: 60%;
		padding: 18px;
		background-color:#fff;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
		border-radius:5px;
	}
	
	.form_upload_pic{
		margin: auto;
		width: 100px;
		margin-top: 10px;
	}
	
	.form_choose{
		margin-top: 20px;
		text-align:center;
	}
	
	.form_choose input:hover{
		cursor:pointer;
	}
	
	.form_info{
		margin-top: 20px;
		font-size:12px;
		color:grey;
		text-align:center;
	}
	
	.form_next{
		text-align: right;
	}
	
	.form_next input{
		margin-top: 20px;
		padding: 12px;
		background-color:#FF7478;
		color:#fff;
		border-radius:12px;
		border-width:0px;
		margin-right: 10px;
	}
	
	.form_next input:hover{
		background-color:#FF5A5F;
		cursor:pointer;
	}
	
	.form_next input:focus{
		outline:none;
	}
	
	.form_next input:active{
		background-color:#ff4146;
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
	
		<div class="form_title">
			<i class="fa fa-upload" aria-hidden="true"></i>Upload Courses
		</div>
		<div class="content_layout">
				<form  name="upload_educator" action="" method="POST" enctype='multipart/form-data'>
				
					<div class="form_upload_pic">
						<img src="src/upload.png" alt="upload" width="100px" height="100px">
					</div>
					
					<div class="form_choose">
						<input type="file" name="video" id="video" accept="video/*" style="width:200px;">
					</div>
					
					<div class="form_next">
						<input type="reset" value="Delete">
						<input type="submit" name="Sendbtn" value="Next">
					</div>
					
					<div class="form_info">
						<p>By submitting your videos to C-learnY, you acknowledge that you agree to C-learnY's Terms of Service and Community Guidelines.</p>
						<p>Please be sure not to violate others' copyright or privacy rights. </p>
						<p style="color: red;">For the profit, C-learnY will take 20% of the profit, educator can get 80% of profit</p>
					</div>
					
					
				
				</form> 
		</div>
	</div>
<?php
if(isset($_POST["Sendbtn"]))
{
	$target = "educator_video//".basename($_FILES['video']['name']);
	$images = $_FILES['video']['name'];
	
	if($_FILES['video']['size'] > 0)
	{
		$sql="INSERT INTO course(course_video, educator_id)VALUES('$images', '$eid')";
		mysqli_query($connect, $sql);
		move_uploaded_file($_FILES['video']['tmp_name'], $target);
		$_SESSION['course_video'] = $images;
		?>
		<script>
			window.location.href = "upload_details_educator.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			swal(
						{
							title: "Oh No!",
							text: "Please upload some videos!",
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
















