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
<title>Home Page</title>
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
		padding:40px;
		grid-gap: 2em;
		grid-template-columns: repeat(3, 1fr);
		grid-auto-rows: auto; 
	}
	.content_details{
		box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.2);
		border-radius:20px;
		background-color:#FFF;
		padding:20px;
		display:grid;
		grid-template-columns: 1fr 3fr 1fr;
		grid-template-rows: 200px auto auto auto;
		grid-template-areas: "cimg cimg cimg" "cpro cname cname" "cpro caut cprice" "cpro cbuy cprice";
	}
	
	.content_details_img{
		grid-area: cimg;
		display: grid;
		justify-content: center;
		align-items: center;
	}
	
	.content_details_pro{
		grid-area: cpro;
		display: grid;
		justify-content: center;
		align-items: flex-start;
		padding-top:20px;
	}
	
	.content_details_name{
		grid-area: cname;
		display: grid;
		justify-content: flex-start;
		align-items: flex-start;
		font-size:18px;
		padding-top:30px;
		padding-bottom:5px;
		padding-left:5px;
	}
	
	.content_details_price{
		grid-area: cprice;
		display: grid;
		justify-content: center;
		align-items: flex-end;
		padding-bottom:10px;
		font-size:18px;
	}
	
	.content_details_aut{
		grid-area: caut;
		display: grid;
		justify-content: flex-start;
		align-items: center;
		padding-top:10px;
		padding-bottom:5px;
		font-size:14px;
		color:#606060;
	}
	
	.content_details_buy{
		grid-area: cbuy;
		display: grid;
		justify-content: flex-start;
		align-items: center;
		padding-bottom:5px;
		font-size:14px;
		color:#606060;
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
			$result_category_get = mysqli_query($connect, "SELECT * FROM category WHERE category_id = '$id'");
			$row_category_get = mysqli_fetch_assoc($result_category_get);
		}
	?>
	
	<div class="main">
		<div class="content">	
				<?php
					$course = "Select * from course Where state = 'ACTIVE' and category_id = '$row_category_get[category_id]' ORDER BY rand()";
					$result_course = mysqli_query($connect,$course);
					$row_course = mysqli_fetch_array($result_course);	
					$result = mysqli_query($connect,"SELECT course_image FROM course");
					$count = mysqli_num_rows($result);
					$get =  mysqli_query($connect,"Select course_id from course Where state = 'ACTIVE' and category_id = '$row_category_get[category_id]' ORDER BY rand()");
					$count_get = mysqli_num_rows($get);
					if($count_get != 0)
					{
						if($count != 0)
						{					
							do
							{
								?>
									<div class="content_details">
										<?php
											$pur = mysqli_query($connect,"SELECT * FROM purchasing_new where learner_id = '$row[learner_id]' AND course_id =' $row_course[course_id]'");
											$pur_count = mysqli_num_rows($pur);
											$row_pur = mysqli_fetch_array($pur);
											if($pur_count != 0)
											{
												$display = "Purchased";
											}
											else
											{
												$display = null;
											}
										?>
										<div class="content_details_img">
											<a href="learner_click.php?buy&id= <?php echo $row_course['course_id']?>">
												<?php
													$image = $row_course['course_image'];
													$educatorid = $row_course['educator_id'];
													$image_src = "educator_video_image/".$image;
													echo "<img width='100%' height='200px' src='".$image_src ."'>";
												?>
											</a>
											<span style="color:red; margin-left: 250px;"><?php echo $display;?></span>
										</div>
										<?php
											$educator = "SELECT * FROM educator where educator_id = '$educatorid'";
											$result_educator = mysqli_query($connect,$educator);
											$row_educator = mysqli_fetch_array($result_educator);
										?>
										<div class="content_details_pro">
											<a href="educatorOtherViewProfile.php?buy&id= <?php echo $row_educator['educator_id']?>">
												<?php
													$image_educator = $row_educator['image_educator'];
													$image_src_educator = "educator_profile_image/".$image_educator;
													$result = mysqli_query($connect,"SELECT * FROM educator where image_educator = '$image_educator'");
													$count = mysqli_num_rows($result);
													if($count != 0)
													{
														echo "<img width='50px' height='50px' src='".$image_src_educator ."'>";
													}
													else
													{
													?>
														<img src="src/profilepic.png" width="50px" height="50px"/>
													<?php
													}
												?>
											</a>
										</div>
										<?php
											if($row_course['course_price'] == 0)
											{
												$display_price = "Free";
											}
											else
											{
												$display_price = $row_course['course_price'];
											}
										?>
										<div class="content_details_name">
											<?php echo $row_course['course_name'];?>
										</div>
										
										<div class="content_details_price">
										<?php
											if($row_course['course_price'] == 0)
											{
												$display_price = "Free";
												echo $display_price;
											}
											else
											{
												$display_price = $row_course['course_price'];
												?>RM <?php echo $display_price;
											}
										?>
										</div>
										
										<div class="content_details_aut">
											<?php
												echo $row_educator['educator_name'];
											?>
										</div>
										<?php
											$count_pur = mysqli_query($connect,"SELECT purchasing_id FROM purchasing_new where course_id = '$row_course[course_id]'");
											$count_pur_result = mysqli_num_rows($count_pur);
										?>
										<div class="content_details_buy">
											<?php echo $count_pur_result?> buyers
										</div>
									</div>
								<?php
							}while($row_course = mysqli_fetch_array($result_course));
						}
						else
						{
						?>
							<img src="">
						<?php
						}
					}
					else
					{
					}
				?>	
			
			
			
			
				
		</div>
	</div>
	
</body>
</html>












