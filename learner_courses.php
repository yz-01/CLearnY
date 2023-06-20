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
<title>Learner course</title>
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
		overflow: auto;
	}
	.content{
		display:grid;
		padding:30px;
		grid-gap: 2em;
		grid-template-columns: repeat(3, 1fr);
		grid-auto-rows: auto; 
	}
	.content_details{
		display:grid;
		grid-template-columns: 1fr 3fr 1fr;
		grid-template-rows: auto auto auto auto auto;
		grid-template-areas: "cimg cimg cimg" 
							 "cname cname cname"
							 "cpro caut cper"
							 ;
		box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.2);
		border-radius:20px;
		background-color:#FFF;
		padding:10px;
	}
	
	.content_details_img{
		grid-area: cimg;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
	}
	
	.content_details_pro{
		grid-area: cpro;
		display: grid;
		justify-content: center;
		align-items: center;
		padding-top:20px;
		padding-bottom:10px;
	}
	
	.content_details_name{
		grid-area: cname;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		font-size:20px;
	}
	
	.content_details_aut{
		grid-area: caut;
		display: grid;
		justify-content: flex-start;
		align-items: center;
		padding-top:20px;
		padding-bottom:10px;
	}
	
	.content_details_progress{
		grid-area: cprogress;
		display: grid;
		justify-content: center;
		align-items: center;
	}
	
	.content_details_percentage{
		grid-area: cper;
		display: grid;
		justify-content: center;
		align-items: flex-end;
		font-size:20px;
		padding-top:20px;
		padding-bottom:10px;
	}
	
	.content_details_percentage .btn{
		color: white; 
		background-color: #0084ff; 
		border: none; 
		padding: 10px 15px; 
		border-radius: 8px;
		text-decoration: none;
		cursor: pointer;
		display: inline-block;
		outline:none;
	}
	
	.content_details_percentage .btn:active{
		background-color: #006aff;
	}
	
	.btn:hover {
		background-color:#007BFF;
	}
	
	.content_details_complete{
		grid-area: ccom;
		display: grid;
		justify-content: center;
		align-items: flex-start;
		font-size:10px;
	}
	
	.OrderHistory{
		padding-top:15px;
		padding-left:15px;
		padding-right:15px;
		display:grid;
		grid-template-columns:10fr 1fr;
	}
	
	.OrderHistory a button{
		padding:10px;
		background-color:transparent ;
		color:#0084ff;
		border:2px #0084ff solid;
		border-radius:8px;
		cursor:pointer;
		font-size:16px;
	}
	
	.OrderHistory a button:hover{
		outline:none;
		border:2.5px #007BFF  solid;
		color: #007BFF;
	}
	
	.OrderHistory a button:active{
		outline:none;
		border:2px #006aff  solid;
		color: #006aff;
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
			<div class="OrderHistory">
			<div></div>
			<a href="OrderHistory.php">
				<button>
					OrderHistory
				</button>
			</a>
		</div>
		<div class="content">
		<?php
			$purchasing = "Select * from course, purchasing_new where course.course_id = purchasing_new.course_id AND purchasing_new.learner_id = '$row[learner_id]'";
			$result_purchasing = mysqli_query($connect,$purchasing);
			$row_purchasing = mysqli_fetch_assoc($result_purchasing);	
			$result = mysqli_query($connect,"SELECT purchasing_id FROM purchasing_new where learner_id = '$row[learner_id]'");
			$count = mysqli_num_rows($result);			
			if($count != 0)
			{
				do
				{
					?>
					<div class="content_details">
						<div class="content_details_img">
							<a href="learner specific course.php?coursebuy&courseid= <?php echo $row_purchasing['course_id']?>">
							<?php
								$image = $row_purchasing['course_image'];
								$image_src = "educator_video_image/".$image;
								echo "<img width='100%' height='200px' src='".$image_src ."'>";
							?>
							</a>
						</div>
						
						<div class="content_details_name">
							<?php echo $row_purchasing["course_name"];?>
						</div>
						
						
						<div class="content_details_pro">
							<?php 
								$educator = "Select * from educator where educator_id = '$row_purchasing[educator_id]'";
								$result_educator = mysqli_query($connect,$educator);
								$row_educator = mysqli_fetch_assoc($result_educator);
								$image_edu = $row_educator['image_educator'];
								$image_edu_src = "educator_profile_image/".$image_edu;
								$result = mysqli_query($connect,"SELECT * FROM educator where image_educator = '$image_edu'");
								$count = mysqli_num_rows($result);
								if($count != 0)
								{
									echo "<img width='40px' height='40px' src='".$image_edu_src ."'>";
								}
								else
								{
								?>
									<img src="src/profilepic.png" width="40px" height="40px"/>
								<?php
								}
								
		
							?>
							</a>
						</div>
						
						<div class="content_details_aut">
							<?php 
								$educator = "Select * from educator where educator_id = '$row_purchasing[educator_id]'";
								$result_educator = mysqli_query($connect,$educator);
								$row_educator = mysqli_fetch_assoc($result_educator);
								echo $row_educator["educator_name"];
							?>
						</div>
						
						<?php
						$find_quiz = mysqli_query($connect, "Select quiz_id from quiz where course_id = '$row_purchasing[course_id]'");
						$quiz = mysqli_query($connect, "Select * from quiz where course_id = '$row_purchasing[course_id]'");
						$row_quiz = mysqli_fetch_assoc($quiz);
						$count_quiz = mysqli_num_rows($find_quiz);
						if($count_quiz != 0)
						{
							$learner_answer = mysqli_query($connect, "Select learner_answer_id from learner_answer where quiz_id = '$row_quiz[quiz_id]' AND learner_id = '$row[learner_id]'");
							$count_learner_answer = mysqli_num_rows($learner_answer);
							if($count_learner_answer != 0)
							{
								$result = mysqli_query($connect, "Select * from result_quiz where quiz_id = '$row_quiz[quiz_id]' AND learner_id = '$row[learner_id]'");
								$row_result = mysqli_fetch_assoc($result);
								?>
									<div class="content_details_percentage">
										<a href="certificate.php?buy&id= <?php echo $row_purchasing['course_id']?>"><button class="btn">Certificates </button></a>
									</div>
								<?php

							}
							else
							{
							?>
								<div class="content_details_percentage">
									<button class="btn" id="fail" name="fail" onclick="check()">Certificates </button></a>
								</div>
								<script>
									function check()
									{
										swal(
										{
											title: "Oh No!",
											text: "Please complete your quiz !",
											icon: "warning",
											button: "Continue"
										});
									}
								</script>
							<?php
							}
						}
						else
						{
								?>
									<div class="content_details_percentage">
										<a href="certificate.php?buy&id= <?php echo $row_purchasing['course_id']?>"><button class="btn">Certificates </button></a>
									</div>
								<?php
						}
						?>
						
					</div>
					<?php
				}while($row_purchasing = mysqli_fetch_assoc($result_purchasing));
			}
			else
			{
			}
		?>
			
				
				
		</div>
	</div>
	
</body>
</html>












