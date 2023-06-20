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
<title>Certificate</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">         <!--for the search bar icon-->
<head>
<style>
	body {
	    font-family: "Lato", sans-serif;
		margin:0;
		background-color:#F0F0F0;
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
		background-color:#F0F0F0;
		overflow: auto;
	}
	.content{
		background-color:#fff;
		margin:auto;
		width:70%;
		margin-top:10px;
		border-radius:20px;
		text-align:center;
	}
	
	.contentImg{
		width:300px;
		margin-top:10px;
	}
	
	.content_name{
		color:#606060;
		font-size:20px;
		font-weight:bold;
		margin-bottom:20px;
	}
	
	.content_certTitle{
		color:#404042;
		font-size:28px;
		text-transform:uppercase;
		margin-bottom:40px;
	}
	
	.content_award{
		color:#606060;
		font-size:15px;
		margin-bottom:20px;
	}
	
	.content_learner{
		color:black;
		font-size:48px;
		font-weight:bold;
		margin-bottom:20px;
		font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI',
					'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans',
					'Helvetica Neue', sans-serif
	}
	
	.content_from{
		color:#606060;
		font-size:15px;
		margin-bottom:5px;
	}
	
	.content_date{
		color:#404042;
	}
	
	.content_serial{
		background-color:#F2F2F2;
		border-radius:12px;
		width:15%;
		padding:20px;
		margin-left:100px;
		margin-top:70px;
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
		color:#0084ff;
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
		<?php
			$quiz = mysqli_query($connect, "SELECT * FROM quiz WHERE course_id = '$id'");
			$row_quiz = mysqli_fetch_assoc($quiz);
			$quiz_check = mysqli_query($connect, "SELECT quiz_id FROM quiz WHERE course_id = '$id'");
			$count_quiz = mysqli_num_rows($quiz_check);
			if($count_quiz != 0)
			{
				$result = mysqli_query($connect, "SELECT * FROM result_quiz WHERE quiz_id = '$row_quiz[quiz_id]'");
				$row_result = mysqli_fetch_assoc($result);
				if($row_result["result"] >= 50)
				{
				?>
					<div class="content">
						<div>
							<img class="contentImg" src="src/C-learnY.png" alt="C-learnY's Logo">
						</div>
						<div class="content_certTitle">
							Certificate of Graduation<br>with Advanced
						</div>
						<div class="content_award">
							Award to
						</div>
						<div class="content_learner">
							<?php echo $row["learner_name"];?>
						</div>
						
						<div class="content_from">
							GRADUATING FROM
						</div>
						
						<div class="content_name">
							<?php echo $row_course["course_name"];?>
						</div>
						
						<div class="content_date">
							Effective date: All Time
						</div>
						
						<div class="content_serial">
							<div style="color:#00AEEF; text-align:left; margin-bottom:5px;">
								Serial No.
							</div>
							<div style="color:#606060; text-align:left;">
								cert_clearny_<?php echo $row["learner_id"];?><?php echo $row_course["course_id"];?>
							</div>
						</div>
						<div style="height:50px;">	
						</div>
						
					</div>
				<?php
				}
				else
				{
				?>
					<div class="content">
						<div>
							<img class="contentImg" src="src/C-learnY.png" alt="C-learnY's Logo">
						</div>
						<div class="content_certTitle">
							Certificate of Graduation<br>Average
						</div>
						<div class="content_award">
							Award to
						</div>
						<div class="content_learner">
							<?php echo $row["learner_name"];?>
						</div>
						
						<div class="content_from">
							GRADUATING FROM
						</div>
						
						<div class="content_name">
							<?php echo $row_course["course_name"];?>
						</div>
						
						<div class="content_date">
							Effective date: All Time
						</div>
						
						<div class="content_serial">
							<div style="color:#00AEEF; text-align:left; margin-bottom:5px;">
								Serial No.
							</div>
							<div style="color:#606060; text-align:left;">
								cert_clearny_<?php echo $row["learner_id"];?><?php echo $row_course["course_id"];?>
							</div>
						</div>
						<div style="height:50px;">	
						</div>
						
					</div>
				<?php
				}
			}
			else
			{
			?>
				<div class="content">
					<div>
						<img class="contentImg" src="src/C-learnY.png" alt="C-learnY's Logo">
					</div>
					<div class="content_certTitle">
						Certificate of Graduation
					</div>
					<div class="content_award">
						Award to
					</div>
					<div class="content_learner">
						<?php echo $row["learner_name"];?>
					</div>
					
					<div class="content_from">
						GRADUATING FROM
					</div>
					
					<div class="content_name">
						<?php echo $row_course["course_name"];?>
					</div>
					
					<div class="content_date">
						Effective date: All Time
					</div>
					
					<div class="content_serial">
						<div style="color:#00AEEF; text-align:left; margin-bottom:5px;">
							Serial No.
						</div>
						<div style="color:#606060; text-align:left;">
							cert_clearny_<?php echo $row["learner_id"];?><?php echo $row_course["course_id"];?>
						</div>
					</div>
					<div style="height:50px;">	
					</div>
					
				</div>
			<?php
			}
			?>
		
	</div>
	
</body>

</html>












