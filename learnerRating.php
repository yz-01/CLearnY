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
<title>Rating</title>
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
		grid-template-columns: 1fr 2fr;
		padding:20px;
	}
	
	.contentLeft{
		display:grid;
		justify-content:center;
	}
	
	.contentLeft img{
		padding:10px;
	}
	
	.contentLeftTitle{
		display:grid;
		justify-content:center;
		padding:10px;
		font-size:18px;
	}
	
	.contentRight{
		display:grid;
		grid-template-columns: 1fr 1fr 5fr 1fr;
		grid-template-rows: auto auto auto 1fr;
		grid-template-areas: "top top top top"
							 "title rate blank blank2"
							 "commenttitle comment comment blank6"
							 "blank3 blank4 blank5 sub";
		padding:10px;
							 
	}
	
	.blank{
		grid-area:blank;
	}
	
	.blank2{
		grid-area:blank2;
	}
	
	.blank3{
		grid-area:blank3;
	}
	
	.blank4{
		grid-area:blank4;
	}
	
	.blank5{
		grid-area:blank5;
	}
	
	.blank6{
		grid-area:blank6;
	}
	
	.contentRightTitle{
		grid-area:top;
		font-size:20px;
		padding:10px;
		background-color:#0084ff;
		color:#fff;
		border-radius:50px;
		padding-left:20px;
	}
	
	.contentRightRatingTitle{
		grid-area:title;
		padding:10px;
		margin-top:10px;
	}
	
	.contentRightRating{
		grid-area:rate;
		padding:5px;
		margin-top:10px;
	}
	
	.contentRightCommmentTitle{
		grid-area:commenttitle;
		padding:10px;
	}
	
	.contentRightCommment{
		grid-area:comment;
		padding:5px;
	}
	
	
	.contentRightSubmit{
		grid-area:sub;
		display:grid;
		align-items:flex-end;
	}
	
	.contentRightSubmit input{
		background-color:#0084ff ;
		color:#fff;
		border-radius:12px;
	}
	
	.contentRightSubmit input{
		background-color:#0084ff;
		border:2px solid #0084ff;
		color:#fff;
		border-radius:5px;
		padding:10px;
	}
	
	.contentRightSubmit input:hover{
		background-color:#007BFF;
		border:2px solid #007BFF;
		color:#fff;
		cursor:pointer;
	}
	
	.contentRightSubmit input:active{
		background-color:#006aff;
		border:2px solid #006aff;
		color:#fff;
		outline:none;
	}
	
	.contentRightSubmit input:focus{
		outline:none;
	}
	textarea {
	  resize: none;
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
		<div class="content">
		
			<div class="contentLeft">
				<?php
					$image = $row_course['course_image'];
					$image_src = "educator_video_image/".$image;
					echo "<img width='360px' height='240px' src='".$image_src ."'>";
				?>
				<div class="contentLeftTitle">
					<?php echo $row_course["course_name"];?>
		
				</div>
			</div>
			<form name="rating" method="POST">
			<?php
			$com = mysqli_query($connect, "SELECT comment_id FROM comments WHERE course_id = '$id' AND learner_id = '$row[learner_id]'");
			$count_com = mysqli_fetch_assoc($com);
			if($count_com != 0)
			{
				$coms = mysqli_query($connect, "SELECT * FROM comments WHERE course_id = '$id' AND learner_id = '$row[learner_id]'");
				$row_coms = mysqli_fetch_assoc($coms);
			?>
				<div class="contentRight">
					<div class="contentRightTitle">
						Do you love the course ?
					</div>
					<div class="contentRightRatingTitle">
						Rating
					</div>
			
					<div class="contentRightRating">
						<select name = "cate" style="font-size:15px; padding:5px;" disabled required>
							<option value="1">1 star</option>
							<option value="2">2 stars</option>
							<option value="3">3 stars</option>
							<option value="4">4 stars</option>
							<option value="5">5 stars</option>
						</select>
					</div>
					<div class="blank">
		
					</div>
					
					<div class="blank2">
		
					</div>
					
					<div class="contentRightCommmentTitle">
						Comment
					</div>
					
					<div class="contentRightCommment">
						<textarea name="com" rows="5" cols="60" maxlength="500"  style="padding:10px;" value="<?php echo $row_coms["comment_content"];?>" required><?php echo $row_coms["comment_content"];?></textarea>
					</div>
					
					<div class="blank3">
		
					</div>
					
					<div class="blank4">
		
					</div>
					
					<div class="blank5">
		
					</div>
					
					<div class="contentRightSubmit">
						<input type="submit" name="save" value="Save"/>
					</div>
				</div>
			<?php
			}
			else
			{
			?>
				<div class="contentRight">
					<div class="contentRightTitle">
						Do you love the course ?
					</div>
					<div class="contentRightRatingTitle">
						Rating
					</div>
			
					<div class="contentRightRating">
						<select name = "cate" style="font-size:15px; padding:5px;" required>
							<option value="1">1 star</option>
							<option value="2">2 stars</option>
							<option value="3">3 stars</option>
							<option value="4">4 stars</option>
							<option value="5">5 stars</option>
						</select>
					</div>
					<div class="blank">
		
					</div>
					
					<div class="blank2">
		
					</div>
					
					<div class="contentRightCommmentTitle">
						Comment
					</div>
					
					<div class="contentRightCommment">
						<textarea name="com" rows="5" cols="60" maxlength="500"  style="padding:10px;" placeholder="Add a public comment" required></textarea>
					</div>
					
					<div class="blank3">
		
					</div>
					
					<div class="blank4">
		
					</div>
					
					<div class="blank5">
		
					</div>
					
					<div class="contentRightSubmit">
						<input type="submit" name="submit" value="Submit"/>
					</div>
				</div>
			<?php		
			}
			?>
			</form>
			
		</div>
	</div>
<?php
if(isset($_POST["submit"])) 	
{
	$cate = $_POST["cate"];
	$com = $_POST["com"];
	mysqli_query($connect,"INSERT INTO comments (comment_content, course_id, learner_id, rating) VALUES ('$com', '$row_course[course_id]', '$row[learner_id]', '$cate')");
	$find_time = mysqli_query($connect,"SELECT comment_id FROM comments where course_id='$row_course[course_id]'");
	$find_time_result = mysqli_num_rows($find_time);
	$find_rate = mysqli_query($connect,"SELECT SUM(rating) as rating_total FROM comments where course_id='$row_course[course_id]'");
	$find_rate_result= mysqli_fetch_assoc($find_rate);
	$total = $find_rate_result['rating_total']/$find_time_result;
	mysqli_query($connect,"UPDATE course SET rating = '$total' where course_id='$row_course[course_id]'");
	?>
		<script>
					swal(
						{
							title: "Congratulations!",
							text: "Thanks for your responds",
							icon: "success",
							button: "Continue"
						}
						).then(function()
						{
							window.location.href = "learner homepage.php";
						});
		</script>
	<?php
}
else if(isset($_POST["save"]))
{
	$com = $_POST["com"];
	$sql = "UPDATE comments SET comment_content='$com' where course_id = '$id' AND learner_id = '$row[learner_id]'";
	mysqli_query($connect, $sql);
		?>
		<script>
					swal(
						{
							title: "Congratulations!",
							text: "Thanks for your responds",
							icon: "success",
							button: "Continue"
						}
						).then(function()
						{
							window.location.href = "learner homepage.php";
						});
		</script>
	<?php
}
?>
	
</body>
</html>












