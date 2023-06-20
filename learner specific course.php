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
<title>Learner specific course</title>
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
		grid-template-columns: 5fr 1fr 1fr 1fr 1fr;
		grid-template-rows: auto auto 50px;
		grid-template-areas: "cv cv cv cv cv"
							 "ct ct ct ct ct"
							 "cb cq cr cd cdl";
		
		padding-top:20px;
		margin:auto;
		width:80%;
	}
	
	.content_video{
		grid-area: cv;
		display: grid;
		justify-content: center;
		align-items: center;
	}
	
	.content_title{
		grid-area: ct;
		display: grid;
		justify-content: flex-start;
		align-items: center;
		padding:20px;
		padding-left:60px;
		font-size:24px;
	}
	
	.content_blank{
		grid-area: cb;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		box-sizing: border-box;
	}
	
	.content_quiz{
		grid-area: cq;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		border-top:3px solid #007BFF;
		border-bottom:3px solid #007BFF;
		border-left:3px solid #007BFF;
		color:#007BFF;
		box-sizing: border-box;
	}
	.content div a{
		text-decoration:none;
	}
	
	.content_quiz:hover{
		background-color: #F2F2F2;
		cursor:pointer;
		font-weight: bold;
	}
	
	.quizlink a div:active{
		background-color: #D6D6D6;
		
	}
	
	
	.content_rating{
		grid-area: cr;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		border-top:3px solid #007BFF;
		border-bottom:3px solid #007BFF;
		border-left:3px solid #007BFF;
		color:#007BFF;
		box-sizing: border-box;
	}
	
	.content div a{
		text-decoration:none;
	}
	
	.content_rating:hover{
		background-color: #F2F2F2;
		cursor:pointer;
		font-weight: bold;
	}
	
	.ratelink a div:active{
		background-color: #D6D6D6;
		
	}
	
	.content_discussion{
		grid-area: cd;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		border:3px solid #007BFF;
		color:#007BFF;
		box-sizing: border-box;
	}
	
	.content div a{
		text-decoration:none;
	}
	
	.content_discussion:hover{
		background-color: #F2F2F2;
		cursor:pointer;
		font-weight: bold;
	}
	
	.dislink a div:active{
		background-color: #D6D6D6;
	
	}
	
	
	.content_download{
		grid-area: cdl;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		border:3px solid #007BFF;
		color:#007BFF;
		box-sizing: border-box;
	}
	
	.content div a{
		text-decoration:none;
	}
	
	.content_download:hover{
		background-color: #F2F2F2;
		cursor:pointer;
		font-weight: bold;
	}
	
	.downlink a div:active{
		background-color: #D6D6D6;
		
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
	<?php
		if(isset($_GET["coursebuy"]))
		{
			$id = $_GET["courseid"];
			$result_course = mysqli_query($connect, "SELECT * FROM course WHERE course_id = '$id'");
			$row_course = mysqli_fetch_assoc($result_course);
		}
	?>
	
	
	<div class="main">
		<div class="content">
			<div class="content_title">
				<?php echo $row_course["course_name"];?>
			</div>
			<div class="content_blank">
				
			</div>
			<div class="quizlink">	
				<a href="QuizInterface.php?buy&id= <?php echo $row_course['course_id']?>"><div class="content_quiz">Quiz</div></a>
			</div>
			<div class="ratelink">
				<a href="learnerRating.php?buy&id= <?php echo $row_course['course_id']?>"><div class="content_rating">Rating</div></a>
			</div>
			<div class="dislink">
				<a href="learnerDiscussion.php?buy&id= <?php echo $row_course['course_id']?>"><div class="content_discussion">Room</div></a>
			</div>
		
			<div class="content_video">
				<?php
					$iframe = $row_course['course_video'];
					$iframe_src = "educator_video/".$iframe;
					echo "<iframe width='855px' height='540px' src='".$iframe_src ."'>";
				?>
			</div>
		</div>
		
	</div>
	
	
</body>

</html>












