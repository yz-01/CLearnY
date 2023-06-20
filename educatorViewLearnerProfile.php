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
<title>View Learner profile</title>
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
		color: red;
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
	
	.contentRightDetails{
		display:grid;
		margin-top:10px;
		grid-template-columns: auto;
		grid-template-rows: auto;
		padding:10px;
		font-size:20px;
		border-bottom:2px solid #ff4146 ;
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
	
	.aboutgridName{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		color:#ff4146;
	}
	
	.aboutgridNameContent{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
	}
	
	#userSelection{
		padding:10px;
		padding-top:20px;
	}
	
	.contentAdd{
		display:grid;
		grid-template-columns: 10fr 0.5fr 0.1fr;
		grid-template-rows: auto;
		padding:10px;
	}
	
	.contentAddNew{
		display:grid;
		grid-template-columns: 1fr 6fr;
		justify-content:center;
		background-color:#fff;
		color:black;
		padding:10px;
		border-radius:5px;
	}
	
	.contentAddNew i{
		color:#FF7478;
		padding-right:10px;
	}
	
	.contentAdd a{
		text-decoration:none;
	}
	
	.contentAddNew:hover{
		background-color:#F2F2F2;
	}
	
	.contentAddNew:active{
		background-color:#D6D6D6;

	}
	
	.contentAdd a{
		text-decoration:none;
	}
/*----------------------------------------Start Copy from here----------------------------------------*/
	
	.content2{
		margin: auto;
		margin-top:1em;
		width: 95%;
		padding:20px;
	}
	
	.content2Title{
		padding:10px;
		font-size:20px;
		border-bottom:2px solid #ff4146 ;
		color:#606060;
		margin-bottom:20px;
	}
	
	.content2Box{
		display:grid;
		grid-template-columns:1fr 1fr;
		grid-gap:20px;
	}
	
	.content2BoxLayout{
		display:grid;
		grid-template-columns:1fr 2fr;
		grid-template-areas: "coursePic courseName" "coursePic courseAuthor";
		background-color:#fff;
		padding:20px;
		border-radius:12px;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
	}
	
	.content2BoxLayoutPic{
		grid-area:coursePic;
	}
	
	.content2BoxLayoutName{
		grid-area:courseName;
		font-size:20px;
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.content2BoxLayoutAuthor{
		grid-area:courseAuthor;
		font-size:16px;
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.content2BoxLayoutAuthor div a{
		text-decoration:none;
		color:black;
	}
	
/*----------------------------------------End Copy from here----------------------------------------*/
	
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
	<?php
		if(isset($_GET["buy"]))
		{
			$id = $_GET["id"];
			$result_learner = mysqli_query($connect, "SELECT * FROM learner WHERE learner_id = '$id'");
			$row_learner = mysqli_fetch_assoc($result_learner);
		}
	?>
	<div class="main">
		<div class="contentAdd">
			<div class="contentAddBlank">	
			</div>
			<a href="educator analytics.php">
				<div class="contentAddNew">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>Back
				</div>
			</a>
			<div class="contentAddBlank">	
			</div>
		</div>
		<div class="content">
			<div class="contentLeft">
				<div class="contentLeftDetails">
					<div class="contentLeftDetailsPic">
						<?php
							$image = $row_learner['image_learner'];
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
					</div>
				</div>
			</div>
			<div class="contentRight">
				<div class="contentRightDetails">
					<div class="contentRightDetailsAbout">
						About
					</div>
				</div>
				<div id="userSelection">
					
					<div class="aboutgrid">
						<div class="aboutgridName">
							Name
						</div>
						<div class="aboutgridNameContent">
							<?php echo $row_learner["learner_name"];?>
						</div>
					
						<div class="aboutgridEmail">
							Email
						</div>
						<div class="aboutgridEmailContent">
							<?php echo $row_learner["learner_email"];?>
						</div>
						<div class="aboutgridContact">
							Contact
						</div>
						<div class="aboutgridContactContent">
							<?php echo $row_learner["learner_phone_number"];?>
						</div>
						
					</div>
					
				</div>
			</div>
			
		</div>
		<div class="content2"> 
			<div class="content2Title">
				Courses Purchased
			</div>
			<?php
				$pur = mysqli_query($connect, "SELECT * FROM purchasing_new WHERE learner_id = '$id'");
				$row_pur = mysqli_fetch_assoc($pur);
			?>
			<div class="content2Box">
			<?php
				do
				{
					$course = mysqli_query($connect, "SELECT * FROM course WHERE course_id = '$row_pur[course_id]'");
					$row_course = mysqli_fetch_assoc($course);
					$edu = mysqli_query($connect, "SELECT * FROM educator WHERE educator_id = '$row_course[educator_id]'");
					$row_edu = mysqli_fetch_assoc($edu);
				?>
					<div class="content2BoxLayout">
						<div class="content2BoxLayoutPic">
							<?php
								$image = $row_course['course_image'];
								$image_src = "educator_video_image/".$image;
								$result = mysqli_query($connect,"SELECT * FROM course where course_image = '$image'");
								$count = mysqli_num_rows($result);
								if($count != 0)
								{
									echo "<img width='150px' height='100px' src='".$image_src ."'>";
								}
								else
								{
								?>
									<img src="src/profilepic.png" width="150px" height="100px"/>
								<?php
								}
							?>
						</div>
						<div class="content2BoxLayoutName">
							<?php echo $row_course["course_name"];?>
						</div>
						<div class="content2BoxLayoutAuthor">
							<div><span style="color:#ff4146; margin-right:10px;">Author </span> <a href="#eduprofile"><?php echo $row_edu["educator_name"];?></a></div>
						</div>
					</div>	
				<?php
				}while($row_pur = mysqli_fetch_assoc($pur));
			?>
			</div>

		</div>
	</div>
	
</body>

</html>
















