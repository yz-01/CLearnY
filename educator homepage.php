<?php 
session_start();
include("dataconnection.php");

$eid= $_SESSION['eid'];
$ename= $_SESSION['ename'];
$epass= $_SESSION["epass"];
$ephone= $_SESSION["ephone"];
$eemail= $_SESSION["eemail"];
$result= mysqli_query($connect, "SELECT * from educator where educator_email = '$eemail'");
$result_course= mysqli_query($connect, "SELECT * from course where educator_id = '$eid'");

$row= mysqli_fetch_assoc($result);
$row_course= mysqli_fetch_assoc($result_course);
?>
<html>
<title>Edu Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">         <!--for the search bar icon-->
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
		overflow: auto;
	}
	.content_layout{
		display:grid;
		grid-template-columns: 1fr 1fr 1fr;
		grid-auto-rows: auto;
		grid-gap: 1em;
		margin: 2em;
		overflow: auto;
	}
	
	.content{
		background-color:#fff;
		padding:10px;
		box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.2);
		border-radius:20px;
	}
	
	.content a{
		text-decoration: none;
		color:black;
		text-align: center;
		font-size:18px;	
	}
	
	.perform_header{
		text-align:center;
		font-size: 22px;
		font-weight:bold;
		padding:10px;
	}
	
	.performance_details{
		display:grid;
		grid-template-columns: 1fr 3fr;
		padding:10px;
		font-size: 17px;
	}
	
	.left_perform{
		text-align:left;
		padding-bottom:5px;
		padding-left:20px;
		padding-right: 5px;
		padding-top:5px;
	}
	
	.right_perform{
		text-align:right;
		padding-bottom:5px;
		padding-left:5px;
		padding-right: 20px;
		padding-top:5px;
	}
	
	.course_analytics{
		padding:10px;
		background-color:#F2F2F2;
		margin-bottom:5px;
		border-radius:8px;
	}
	
	.course_analytics:hover{
		background-color:#FF5A5F;
		color:#fff;
	}
	
	.course_analytics:active{
		background-color:#FF7478;
	}
	
	.discussion{
		padding:10px;
		background-color:#F2F2F2;
		margin-bottom:5px;
		border-radius:8px;
	}
	
	.discussion:hover{
		background-color:#FF5A5F;
		color:#fff;
	}
	
	.discussion:active{
		background-color:#FF7478;
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
		<div class="content_layout">
				<?php
					$course = "Select * from course where educator_id = '$eid'";
					$result_course = mysqli_query($connect,$course);
					$row_course = mysqli_fetch_array($result_course);
					$result = mysqli_query($connect,"SELECT course_image FROM course where educator_id = '$eid'");
					$count = mysqli_num_rows($result);
					if($count != 0)
					{
						do
						{
						?>
							<div class="content">
								<div class="perform_header">
									Course Performance
								</div>
								<?php
									$image = $row_course['course_image'];
									$image_src = "educator_video_image/".$image;
									echo "<img width='100%' height='280px' src='".$image_src ."'>";
								?>
								<div class="performance_details">
									<div class="left_perform">
										Name: 
									</div>
									<div class="right_perform">
										<?php echo $row_course["course_name"];?>
									</div>
									
									<div class="left_perform">
										Price: 
									</div>
									<div class="right_perform">
										<?php echo $row_course["course_price"];?>
									</div>
								</div>
								<a href="educator specific analytics.php?buy&id= <?php echo $row_course['course_id']?>">
									<div class="course_analytics">
										Course Analytics
									</div>
								</a>
								<a href="DiscussionEdu.php?buy&id= <?php echo $row_course['course_id']?>">
									<div class="discussion">
										Discussion Room
									</div>
								</a>
							</div>
						<?php
						}while($row_course = mysqli_fetch_array($result_course));
					}
					else
					{
	
					}
					
				?>	
					<div style="height:1px;"></div>				
		</div>
	</div>
	
</body>
</html>