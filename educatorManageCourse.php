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
<title>Manage course</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
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
		border-left: 6px solid #FF5A5F ;
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
		color: #007BFF;
	}


/*------------------------------End of top bar------------------------------*/
/*------------------------------Start of content------------------------------*/
	
	.main{
		margin-top: 70px;
		margin-left:230px;
		overflow: auto;
	}
	
	.content{
		padding:20px;
	}
	
	.contentTitle{
		color:#606060;
		padding-bottom:20px;
		font-size:20px;
	}
	
	.contentItem{
		display: grid;
		grid-template-columns: 0.8fr 4fr 0.6fr 0.6fr;
		background-color:#fff;
		border-radius:12px;
		margin-bottom:10px;
	}
	
	.contentItemImg{
		display: grid;
		justify-content:flex-start;
		align-items:center;
		padding:15px;
	}
	
	.contentItemName{
		display: grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		font-size:18px;
	}
	
	.contentItemQuiz{
		padding:10px;
		display: grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.contentItemQuizButton a button{
		width:80px;
		height:40px;
		background-color:#FF7478;
		color:#fff;
		border:none;
		border-radius:8px;
	}
	
	.contentItemQuizButton a button:hover{
		cursor:pointer;
		background-color:#FF5A5F;
	}
	
	.contentItemQuizButton a button:active{
		outline:none;
		background-color:#ff4146;
	}
	
	.contentItemQuizButton a button:focus{
		outline:none;
	}
	
	
	.contentItemEdit{
		display: grid;
		justify-content:center;
		align-items:center;
		padding:10px;
	}
	
	.contentItemEdit a button{
		width:80px;
		height:40px;
		background-color:#FF7478;
		color:#fff;
		border:none;
		border-radius:8px;
	}
	
	.contentItemEdit a button:hover{
		cursor:pointer;
		background-color:#FF5A5F;
	}
	
	.contentItemEdit a button:active{
		outline:none;
		background-color:#ff4146;
	}
	
	.contentItemEdit a button:focus{
		outline:none;
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
			<div class="contentTitle">
				Manage Course
			</div>
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
						<div class="contentItem">
							<div class="contentItemImg">
								<?php
									$image = $row_course['course_image'];
									$image_src = "educator_video_image/".$image;
									echo "<img width='100px' height='67px' src='".$image_src ."'>";
								?>
							</div>
							<div class="contentItemName">
								<?php echo $row_course["course_name"];?>
							</div>
							<?php
								$quiz = "Select quiz_id from quiz where course_id = '$row_course[course_id]'";
								$result_quiz = mysqli_query($connect,$quiz);
								$row_quiz = mysqli_fetch_array($result_quiz);
								$count_quiz = mysqli_num_rows($result_quiz);
								if($count_quiz != 0)
								{
								?>
									<div class="contentItemQuiz">
										<div class="contentItemQuizButton">
											<a href="EducatorViewQuiz.php?buy&id= <?php echo $row_quiz['quiz_id']?>"><button>Quiz</button></a>
										</div>
									</div>
								<?php
								}
								else
								{
								?>
									<div class="contentItemQuiz">
										<div class="contentItemQuizButton">
											<a href="EducatorAddQuiz.php?buy&id= <?php echo $row_course['course_id']?>"><button>Add Quiz</button></a>
										</div>
									</div>
								<?php
								}
							?>
							<div class="contentItemEdit">
								<a href="educatorManageSpecificCourse.php?buy&id= <?php echo $row_course['course_id']?>"><button>View</button></a>
							</div>
						</div>
						<?php
						}while($row_course = mysqli_fetch_array($result_course));
					}
					else
					{

					}
				?>		
			<!--start second-->
			<!--end second-->
		</div>
		
		
		
	</div>
	
</body>
</html>
















