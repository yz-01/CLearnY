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
<title>Select Course</title>
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
		grid-template-columns: 3fr 3fr;
		grid-auto-rows: auto; 
		grid-template-areas: "detail preview" "com com";
		margin: auto;
		margin-top:1em;
		width: 95%;
		padding-bottom: 0px;
		padding-left: 20px;
		padding-right: 20px;
		padding-top: 20px;
		background-color:#fff;
		grid-gap:20px;
	}
		
	.course_preview img{
		width:100%;
	}
	
	.course_price{
		padding:10px;
		font-size:30px;
	}
	
	.add_shop{
		background-color:#007BFF;
		color: #fff;
		padding: 15px;
		text-align: center;
		border-radius:10px;
		border-color: white;
		width: 100%;
	}
	
	.buy_now{
		margin-top:5px;
		background-color:#FF5A5F;
		color: #fff;
		padding: 15px;
		text-align: center;
		border-radius:7px;
		border-color: white;
	}
	
	.preview{
		grid-area: preview;
	}
	
	.preview a{
		text-decoration:none;
	}
	
	.add_shop:hover{
		background-color: #4ca5ff;
	}
	
	.add_shop:active{
		background-color: #006aff ;
	}
	
	.buy_now:hover{
		background-color: #FF7478;
	}
	
	.buy_now:active{
		background-color: #ff4146 ;
	}
	
	.details{
		grid-area: detail;
	}
	
	.details_layout{
		padding:10px;
	}
	
	.courseName{
		font-size:30px;
		font-weight:bold;
		padding:10px;
	}
	
	.courseDis{
		font-size:20px;
		padding:10px;
	}
	
	.courseRatings{
		font-size:15px;
		padding:10px;
	}
	
	.courseAuthor{
		font-size:20px;
		padding:10px;
	}
	
	.title_comment{
		margin-top:15px;
		border-top: 1px solid #D3D3D3;
		grid-area: com;
		padding-top:20px;
		padding-bottom:10px;
		padding-left:20px;
		padding-right:20px;
		font-size: 30px;
		display: grid;
		justify-content: flex-start;
		align-items: center;
	}	
	
	.comments_layout{
		margin: auto;
		width: 95%;
		padding:20px;
		background-color:#fff;
	}
	
	.comments{
		display:grid;
		grid-template-columns: 0.3fr 5fr 1fr; 
		grid-auto-rows: 20px auto; 
		border-radius: 8px;
		margin: auto;
		width: 95%;
		padding:20px;
		background-color:#F2F2F2;
		grid-gap:15px;
		margin-bottom:10px;
	}
	
	.bywhom{
		display: grid;
		justify-content: flex-start;
		align-items: center;
	}
	
	.com_date{
		display: grid;
		justify-content: flex-end;
		align-items: center;
	}
	
	.com_rate{
		display: grid;
		justify-content: flex-start;
		align-items: center;
	}
	
	.com_content{
		font-size:20px;
		grid-column: 1 / span 3;
	}
	.courseDetailsItems i{
		padding-left:10px;
		padding:5px;
		color:orange;
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
		$learner_id = mysqli_query($connect, "SELECT * FROM shopping_cart WHERE learner_id = '$row[learner_id]'");
		$row_learner_id = mysqli_fetch_assoc($learner_id);
	?>
	<?php
		if(isset($_GET["buy"]))
		{
			$id = $_GET["id"];
			$result_course = mysqli_query($connect, "SELECT * FROM course WHERE course_id = '$id'");
			$row_course = mysqli_fetch_assoc($result_course);
		}
	?>
	<div class="main">
		<div class="content">
		
			<div class="details">
				<div class="details_layout">
					<div class="courseName">
						<?php echo $row_course["course_name"];?>
					</div>
					<div class="courseDis">
						<?php echo $row_course["course_description"];?>
					</div>
					<div class="courseRatings">
						Ratings  <span style="font-size:20px;"><?php echo intval($row_course["rating"]);?></span>  stars
					</div>
					<div class="courseAuthor">
						<?php
							$educatorid = $row_course['educator_id'];
							$educator = "SELECT * FROM educator where educator_id = '$educatorid'";
							$result_educator = mysqli_query($connect,$educator);
							$row_educator = mysqli_fetch_assoc($result_educator);
						?>
						Created by <a href="educatorOtherViewProfile.php?buy&id= <?php echo $row_educator['educator_id']?>"><?php echo $row_educator['educator_name'];?></a>
					</div>
					<div class="courseDetailsItems">
						<i class="fa fa-star" aria-hidden="true"></i> Certificate is provided
					</div>
					<?php
					$quiz = mysqli_query($connect, "SELECT * FROM quiz WHERE course_id = '$id'");
					$row_quiz = mysqli_num_rows($quiz);
					if($row_quiz != 0)
					{
					?>
						<div class="courseDetailsItems">
							<i class="fa fa-star" aria-hidden="true"></i> Quiz is provided
						</div>
					<?php
					}
					else
					{
					}
					?>	
				</div>
			</div>
			<form class="form-box px-3" name="learner_click" method="post">
				<div class="preview">
					<div class="course_preview">
						<?php
							$image = $row_course['course_image'];
							$image_src = "educator_video_image/".$image;
							echo "<img height='500px' src='".$image_src ."'>";
						?>
					</div>
					<div class="course_price">
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
					<button class="add_shop" name="submit">
						Add to shopping cart
					</button>
					<a href="payment_buy_now.php?buy&id= <?php echo $row_course['course_id']?>">
						<div class="buy_now">
							Buy now
						</div>
					</a>
				</div>
			</form>
			
			<div class="title_comment">
				Comments
			</div>
				
		</div>
		
		
		
		<div class="comments_layout">
		<?php
			$comments = mysqli_query($connect, "SELECT * FROM comments where course_id = '$row_course[course_id]'");
			$row_comments = mysqli_fetch_assoc($comments);
			$comment = mysqli_query($connect, "SELECT comment_id FROM comments where course_id = '$row_course[course_id]'");
			$count_comments = mysqli_num_rows($comment);
			if($count_comments != 0)
			{
				do
				{
				?>		
					<div class="comments">
						
						<div class="com_rate">
							<?php echo $row_comments['rating']?> stars 
						</div>
						<?php
							$learner = mysqli_query($connect, "SELECT * FROM learner where learner_id = '$row_comments[learner_id]'");
							$row_learner = mysqli_fetch_assoc($learner);
						?>	
						<?php
							$image = $row_learner['image_learner'];
							$image_src = "learner_profile_image/".$image;
						?>
						<div class="bywhom">
							by <?php echo $row_learner['learner_name'];?>
						</div>
						
						<div class="com_date">
							<?php echo $row_comments['comment_date']?> 
						</div>
						
						<div class="com_content">
							<?php echo $row_comments['comment_content']?> 
						</div>
					</div>
				<?php
				}while($row_comments = mysqli_fetch_assoc($comments));
			}
			else
			{
			}
		?>		
		</div>
			
			
	</div>
<?php
if(isset($_POST["submit"])) 	
{
	$find_adding = mysqli_query($connect,"SELECT adding_id FROM adding WHERE course_id = '$row_course[course_id]' and cart_id = '$row_learner_id[cart_id]'");
	$count_find_adding = mysqli_num_rows($find_adding);
	$find_purchasing = mysqli_query($connect,"SELECT purchasing_id FROM purchasing_new WHERE course_id = '$row_course[course_id]' and learner_id = '$row[learner_id]'");
	$count_find_purchasing = mysqli_num_rows($find_purchasing);
	if($count_find_adding != 0 || $count_find_purchasing != 0)
	{
		?>
			<script>
				swal(
                {
                    title: "Oh No!",
                    text: "This Course Already Exist!",
                    icon: "warning",
                    button: "Continue"
                });
			</script>
		<?php
	}
	else
	{
		$insert = mysqli_query($connect,"INSERT INTO adding(course_id, cart_id)VALUES('$row_course[course_id]', '$row_learner_id[cart_id]')");
		?>
			<script>
				swal(
                {
                    title: "Yahoo!",
                    text: "Your Course Add Successfully!",
                    icon: "success",
                    button: "Continue"
                });
			</script>
		<?php
	}
}
?>
	
</body>
</html>






















