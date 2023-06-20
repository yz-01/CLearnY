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
<title>Educator discussion</title>
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
		color: #007BFF;
	}


/*------------------------------End of top bar------------------------------*/
/*------------------------------Start of content------------------------------*/
	
	.main{
		margin-top: 70px;
		margin-left:230px;
		overflow: auto;
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
	
	.content{
		padding:10px;
	}
	
	.contentTitle{
		color:#606060;
		padding:10px;
		padding-top:15px;
		padding-bottom:15px;
		font-size:20px;
		background-color: #F2F2F2 ;
		padding-left:20px;
		margin-bottom:30px;
	}
	
	.contentBlock{
		display:grid;
		grid-template-columns: 1fr 15fr;
		margin-top:10px;
	}
	
	textarea{
		resize:none;
		border:none;
		border-bottom:1.5px solid #FF7478;
		background-color:#F9F9F9;
		font-size:16px;
		overflow: auto;
	}
	
	textarea:active, textarea:focus{
		border-bottom:2px solid #FF7478;
		outline:none;
	}
	
	.contentBlockImg{
		display:grid;
		justify-content:center;
		align-items:flex-start;
	}
	
	.contentBlockImg img{
		padding-left:10px;
		padding-right:20px;
	}
	
	.contentBlockRight{
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.contentBlockRightButton{
		margin-top:10px;
		display:grid;
		grid-template-columns: 10fr 0.5fr 0.5fr 0.5fr;
	}
	
	.contentBlockRightButton input{
		padding:10px;
		padding-left:20px;
		padding-right:20px;
		cursor:pointer;
	}
	
	.contentBlockRightButtonReset{
		background-color:#F9F9F9;
		border:none;
	}
	
	.contentBlockRightButtonSubmit{
		background-color:#FF7478;
		color:#fff;
		border-radius:5px;
		border:none;
	}
	
	.contentBlockRightButtonReset:active, .contentBlockRightButtonReset:focus{
		outline:none;
	}
	
	.contentBlockRightButtonSubmit:hover{
		background-color:#FF5A5F ;
		outline:none;
	}
	
	.contentBlockRightButtonSubmit:active{
		background-color:#ff4146 ;
		outline:none;
	}
	
	.contentBelowComment{
		display:grid;
		grid-template-columns: 1fr 15fr;
		margin-top:5px;
		background-color:#fff;
		padding:15px;
		border-radius:5px;
	}
	
	.contentBelowCommentImg{
		padding-left:10px;
		padding-right:20px;
	}
	
	.contentBelowCommentDetailsName{
		font-size:16px;
		color:#FF7478;
	}
	
	.contentBelowCommentDetailsName2{
		font-size:16px;
		color:#606060;
	}
	
	.contentBelowCommentDetailsMin{
		font-size:13px;
		margin-left:10px;
	}
	
	.contentBelowCommentDetailsContent{
		margin-top:5px;
		font-size:18px;
	}
	
	.contentBelowCommentUser{
		display:grid;
		grid-template-columns: 1fr 15fr;
		margin-top:5px;
		background-color:#fff;
		padding:15px;
		border-radius:5px;
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
	
	<?php
		if(isset($_GET["buy"]))
		{
			$id = $_GET["id"];
			$result_course = mysqli_query($connect, "SELECT * FROM course WHERE course_id = '$id'");
			$row_course = mysqli_fetch_assoc($result_course);
		}
	?>
	<div class="main">
	
		<div class="contentAdd">
			<div class="contentAddBlank">	
			</div>
			<a href="learner_courses.php">
				<div class="contentAddNew">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>Back
				</div>
			</a>
			<div class="contentAddBlank">	
			</div>
		</div>
			
		<div class="contentTitle">
			Discussion Room - <?php echo $row_course["course_name"];?>
		</div>
	
	
		<div class="content">
			
			<div class="contentBlock">
				<div class="contentBlockImg">
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
				</div>
				<div class="contentBlockRight">
					<div class="contentBlockRightComment">
						<form name="comment" method="POST">
						<textarea name="com" rows="auto" cols="120" placeholder="Add your thoughts" required></textarea>
					</div>
					<div class="contentBlockRightButton">
						<div></div>
						<input class="contentBlockRightButtonReset" type="reset" name="re" value="Cancel"/>
						<input class="contentBlockRightButtonSubmit" type="submit" name="Sendbtn" value="Comment"/>
						<div></div>
						</form>
					</div>
				</div>
			</div>

			<div style="height:30px;">
			</div>
			<?php
				$discussion_room = "SELECT * FROM discussion_room where course_id = '$row_course[course_id]'";
				$result_discussion_room = mysqli_query($connect,$discussion_room);
				$row_discussion_room = mysqli_fetch_assoc($result_discussion_room);
			
				$discussion_content = "SELECT * FROM discussion_content where discussion_room_id = '$row_discussion_room[discussion_room_id]'";
				$result_discussion_content = mysqli_query($connect,$discussion_content);
				$row_discussion_content = mysqli_fetch_assoc($result_discussion_content);	
				
				do
				{					
					if($row_discussion_content["who"] == "edu")
					{
						$educator = mysqli_query($connect,"SELECT * FROM educator where educator_id = '$row_discussion_content[educator_id]'");
						$row_educator = mysqli_fetch_assoc($educator);
					?>
						<div class="contentBelowComment">
							<div class="contentBelowCommentImg">
								<?php
									$image = $row_educator['image_educator'];
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
							</div>
							<div class="contentBelowCommentDetails">
								<div>
									<span class="contentBelowCommentDetailsName"><?php echo $row_educator["educator_name"];?></span>
									<span class="contentBelowCommentDetailsMin"><?php echo $row_discussion_content["discussion_date"];?> <?php echo $row_discussion_content["discussion_time"];?></span>
								</div>
								<div class="contentBelowCommentDetailsContent">
									<?php echo $row_discussion_content["content"];?>
								</div>
							</div>
						</div>
					<?php
					}
					else if($row_discussion_content["who"] == "lea")
					{
						$learner = mysqli_query($connect,"SELECT * FROM learner where learner_id = '$row_discussion_content[learner_id]'");
						$row_learner = mysqli_fetch_assoc($learner);
					?>
						<div class="contentBelowCommentUser">
							<div class="contentBelowCommentImg">
								<?php
									$image = $row_learner['image_learner'];
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
							</div>
							<div class="contentBelowCommentDetails">
								<div>
									<span class="contentBelowCommentDetailsName2"><?php echo $row_learner["learner_name"];?></span>
									<span class="contentBelowCommentDetailsMin"><?php echo $row_discussion_content["discussion_date"];?> <?php echo $row_discussion_content["discussion_time"];?></span>
								</div>
								<div class="contentBelowCommentDetailsContent">
									<?php echo $row_discussion_content["content"];?>
								</div>
							</div>
						</div>
					<?php
					}
				}while($row_discussion_content = mysqli_fetch_assoc($result_discussion_content));
			?>
			
		</div>
	</div>
<?php
if(isset($_POST["Sendbtn"]))
{
	$com = $_POST["com"];
	
	$comment = mysqli_query($connect, "INSERT INTO discussion_content (content, discussion_room_id, who, educator_id) VALUES ('$com', '$row_discussion_room[discussion_room_id]', 'edu', '$row[educator_id]')");
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
						window.location.href = "DiscussionEdu.php?buy&id=<?php echo $row_course['course_id']?>";
					});
		</script>
	<?php
}
?>
</body>

</html>
















