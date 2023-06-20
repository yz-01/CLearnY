<?php 
session_start();
include("dataconnection.php");

$eid= $_SESSION['eid'];
$ename= $_SESSION['ename'];
$epass= $_SESSION["epass"];
$ephone= $_SESSION["ephone"];
$eemail= $_SESSION["eemail"];
$eimage= $_SESSION['educator_image'];
$result= mysqli_query($connect, "SELECT * from educator where educator_email = '$eemail'");
$result_course= mysqli_query($connect, "SELECT * from course");

$row= mysqli_fetch_assoc($result);
$row_course= mysqli_fetch_assoc($result_course);
?>
<html>
<title>Educator view profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<head>
<style>
	body {
	    font-family: "Lato", sans-serif;
		margin:0;
		background-color:#fff;
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
	
	.content{
		display:grid;
		grid-template-columns: 1fr 2fr;
		grid-template-rows: auto;
		grid-template-areas: "pic det";
		grid-gap:20px;
		margin: auto;
		margin-top:1em;
		width: 95%;
		padding:20px;
	}
	
	.contentLeftDetails{
		display:grid;
		grid-template-columns: 1fr;
		grid-template-rows: auto;
	}
	
	.contentLeftDetailsPic{
		display:grid;
		justify-content:center;
		align-items:center;
	}
	
	.contentLeftDetailsBioTitle{
		padding:10px;
		font-size:20px;
		background-color:#F2F2F2;
		border-radius:5px;
		color:#ff4146;
	}
	
	.contentLeftDetailsBioContent{
		padding:10px;
	}
	
	.contentRightName{
		padding-top:10px;
		padding-right:10px;
		padding-left:10px;
		padding-bottom:2px;
		font-size:22px;
	}
	
	.contentRightJob{
		padding-bottom:10px;
		padding-right:10px;
		padding-left:10px;
		font-size:15px;
		color:#ff4146;
	}
	
	.contentRightNumRating{
		padding-top:10px;
		padding-right:10px;
		padding-left:10px;
		padding-bottom:2px;
		font-size:22px;
	}
	
	.contentRightTitleRating{
		padding-bottom:10px;
		padding-right:10px;
		padding-left:10px;
		font-size:15px;
		color:#ff4146;
	}
	
	.contentRightDetails{
		display:grid;
		margin-top:10px;
		grid-template-columns: auto;
		grid-template-rows: auto;
		padding:10px;
		font-size:20px;
		border-bottom:2px solid #FF7478 ;
		color:#606060;
	}
	
	
	.aboutgrid{
		display:grid;
		grid-template-columns: 1fr 4fr;
		grid-template-rows: auto;
	}
	
	
	.aboutgridEmail{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		color:#ff4146;
	}
	
	.aboutgridEmailContent{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
	}
	
	.aboutgridContact{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		color:#ff4146;
	}
	
	.aboutgridContactContent{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
	}	
	
	.aboutgridEdu{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		color:#ff4146;
	}
	
	.aboutgridEduContent{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
	}
	
	.aboutgridWork{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		color:#ff4146;
	}
	
	.aboutgridWorkContent{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
	}
	
	.aboutgridCert{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		color:#ff4146;
	}
	
	.aboutgridCertContent{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
	}
	
	#userSelection{
		padding:10px;
		padding-top:20px;
	}
	
	.EditButton{
		display:grid;
		grid-template-columns: 7fr 1fr;
	}
	
	.goToEdit{
		background-color:#FF7478;
		font-size:15px;
		color: #fff;
		border: none;	
		display:grid;
		justify-content:center;
		align-items:center;
		padding:10px;
		margin-right:30px;
		border-radius:20px;
	}
	
	.EditButton a{
		text-decoration:none;
	}
	
	.EditButton a div:hover{
		background-color:#FF5A5F;
		border-radius:20px;
	}
	
	.EditButton a div:active{
		background-color:#FF7478;
		outline: none;
		border-radius:20px;
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
				<div class="contentLeftDetails">
					<div class="contentLeftDetailsPic">
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
					</div>
					
					<div class="contentLeftDetailsBio">
						<hr style="height:1px; width:100%" >
						<div class="contentLeftDetailsBioTitle">
							Bio
						</div>
						<div class="contentLeftDetailsBioContent">
							<?php echo $row["bio"];?>
						</div>
					</div>
				</div>
			</div>
			<div class="contentRight">
				<div class="contentRightName">
					<?php echo $row["educator_name"];?>
				</div>
				<div class="contentRightJob">
					<?php echo $row["currentjob"];?>
				</div>
				<div class="contentRightDetails">
					<div class="contentRightDetailsAbout">
						About
					</div>
				</div>
				<div id="userSelection">
					
					<div class="aboutgrid">
						<div class="aboutgridEmail">
							Email
						</div>
						<div class="aboutgridEmailContent">
							<?php echo $row["educator_email"];?>
						</div>
						<div class="aboutgridContact">
							Contact
						</div>
						<div class="aboutgridContactContent">
							<?php echo $row["educator_phone_number"];?>
						</div>
						
						<div class="aboutgridEdu">
							Education
						</div>
						<div class="aboutgridEduContent">
							<?php echo $row["education"];?>
						</div>
						<div class="aboutgridWork">
							Working experience
						</div>
						<div class="aboutgridWorkContent">
							<?php echo $row["work_exp"];?>
						</div>
						<div class="aboutgridCert">
							Certificate
						</div>
						<div class="aboutgridCertContent">
							<?php echo $row["certificates"];?>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
		<div class="EditButton">
			<div class="EditLeftBlank">
			</div>
			<a href="educatoreditProfile.php">
				<div class="goToEdit">Edit</div>
			</a>
		</div>
	</div>
	
</body>

</html>



						

						

						















