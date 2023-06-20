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
<title>Manage specific course</title>
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
		display:grid;
		grid-template-columns: 1fr;
		grid-template-rows: auto auto auto;
		margin:auto;
		width:100%;
		padding:20px;
		box-sizing: border-box;
	}
	
	.contentAdd{
		display:grid;
		grid-template-columns: 10fr 0.5fr 0.1fr;
		grid-template-rows: auto;
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
	
	.contentDetailsArrange{
		display:grid;
		grid-template-columns: 0.8fr 2fr 0.8fr 2fr;
		grid-template-rows: auto;
	}
	
	.contentDetailsArrange2{
		display:grid;
		grid-template-columns: 7fr 1fr;
		grid-template-rows: auto;
		margin-top:10px;
	}
	
	.contentDetailsArrange2Button{
		display:grid;
		grid-template-columns: auto auto;
		grid-template-rows: auto;
	}
	
	.contentDetails{
		padding:20px;
		color:black;
	}
	
	.contentDetailsArrange div{
		padding:10px;
		display:grid;
		justify-content:flex-start;
		align-items:flex-start;
	}
	
	
	.contentDetailsArrange div input{
		padding:5px;
	}
	
	.contentDetailsArrange div select{
		padding:5px;
	}
	
	.contentDetailsArrange2Button div input{
		padding:10px;
		cursor:pointer;
	}
	
	.contentDetailsArrange2ButtonReset input{
		background-color:#FF7478;
		border:2px solid #FF7478;
		color:#fff;
		border-radius:5px;
	}
	
	.contentDetailsArrange2ButtonReset input:hover{
		background-color:#FF5A5F ;
		border:2px solid #FF5A5F ;
		color:#fff;
	}
	
	.contentDetailsArrange2ButtonReset input:active{
		background-color:#ff4146 ;
		border:2px solid #ff4146 ;
		color:#fff;
		outline:none;
	}
	
	.contentDetailsArrange2ButtonReset input:focus{
		outline:none;
	}
	
	.contentDetailsArrange2ButtonSubmit input{
		background-color:#0084ff;
		border:2px solid #0084ff;
		color:#fff;
		border-radius:5px;
		margin-left:10px;
	}
	
	.contentDetailsArrange2ButtonSubmit input:hover{
		background-color:#007BFF;
		border:2px solid #007BFF;
		color:#fff;
	}
	
	.contentDetailsArrange2ButtonSubmit input:active{
		background-color:#006aff;
		border:2px solid #006aff;
		color:#fff;
		outline:none;
	}
	
	.contentDetailsArrange div{
		display:grid;
		grid-template-columns:auto auto;
	}
	
	.contentDetailsArrange div i{
		padding-right:10px;
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
		
		<div class="content">
			<div class="contentAdd">
				<div class="contentAddBlank">	
				</div>
				<a href="educatorManageCourse.php">
					<div class="contentAddNew">
						<i class="fa fa-arrow-left" aria-hidden="true" style="margin-right:10px; color:#FF7478 ;"></i>Back
					</div>
				</a>
				<div class="contentAddBlank">	
				</div>
			</div>
			<div class="contentDetails">
				<form  name="educatorcourseedit" action="" method="POST" enctype='multipart/form-data'>
					<div class="contentDetailsArrange">
						<div>
							<i class="fa fa-trophy" aria-hidden="true"></i>Course
						</div>
						<div>
							<input type="text" name="name" size="40" value="<?php echo $row_course["course_name"];?>"/>
						</div>
						
						<div >
							<i class="fa fa-money" aria-hidden="true"></i>Price(RM)
						</div>
						<div>
							<input type="text" name="email" size="40" value="<?php echo $row_course["course_price"];?>"/>
						</div>
						
						<div >
							<i class="fa fa-id-card" aria-hidden="true"></i>Educator Name
						</div>
						<div>
							<input type="text" name="pass" size="40" placeholder="<?php echo $row["educator_name"];?>" disabled/>
						</div>
						
						
						<div >
							<i class="fa fa-check" aria-hidden="true"></i>Status
						</div>
						<div>
							<select name = "stat">
								<option value="ACTIVE">Active</option>	
								<option value="INACTIVE">Inactive</option>
							</select>
						</div>
						
						<div >
							<i class="fa fa-calendar" aria-hidden="true" disabled></i>Date
						</div>
						<div>
							<input type="text" name="join" size="40" value="<?php echo $row_course["date"];?>" disabled/>
						</div>
						
						
						<div >
							<i class="fa fa-list-alt" aria-hidden="true"></i>Category
						</div>
						<?php
							$category = "Select * from category";
							$result_category = mysqli_query($connect,$category);
							$row_category = mysqli_fetch_array($result_category);
						?>
						<div>
							<select name = "cate">
							<?php  
								do
								{
								?>
									<option value="<?php echo $row_category["category_id"]; ?>"><?php echo $row_category["category_name"]; ?></option>
								<?php
								}while($row_category=mysqli_fetch_array($result_category));
							?>
							</select>
						</div>
						
						<div >
							<i class="fa fa-clock-o" aria-hidden="true"></i>Duration(min)
						</div>
						<div>
							<input type="number" name="num" size="40" value="<?php echo $row_course["course_duration"];?>"/>
						</div>
						
						<div>
							<i class="fa fa-file-text" aria-hidden="true"></i>Description
						</div>
						<div>
							<textarea name="des" rows="5" cols="40" maxlength="500"  style="padding:10px;" value="<?php echo $row_course["course_description"];?>"><?php echo $row_course["course_description"];?></textarea>
						</div>
						
						<div>
							<i class="fa fa-picture-o" aria-hidden="true"></i>Thumbnail
						</div>
						<div style="display:block;">
							<?php
								$image = $row_course['course_image'];
								$image_src = "educator_video_image/".$image;
								echo "<img width='240px' height='160px' src='".$image_src ."'>";
							?>
							<input type="file" name="image" id="img" accept="image/*" style="width:200px;"/>
						</div>
						
						<div>
							<i class="fa fa-video-camera" aria-hidden="true"></i>Thumbnail (Video)
						</div>
						<div style="display:block;">
							<div style="display:block;">
								<?php
									$image = $row_course['course_video'];
									$image_src = "educator_video/".$image;
									echo "<video width='240px' height='160px' src='".$image_src ."'>";
								?>
							</div>
							<div style="display:block;">
								<input type="file" name="video" id="vdo" accept="video/*" style="width:200px;"/>
							</div>
						</div>
						
						
					</div>
					
			</div>
			
			<div>	
					<div class="contentDetailsArrange2">
						
						<div class="contentDetailsArrange2Blank">
						</div>
						
						<div class="contentDetailsArrange2Button">
							<div class="contentDetailsArrange2ButtonSubmit">
								<input type="submit" name="submit" value="Save Course" />
							</div>
						</div>
						
					</div>
				</form>
			</div>
		</div>
		
		
		
	</div>
<?php
if(isset($_POST["submit"])) 	
{
	$target = "educator_video_image/".basename($_FILES['image']['name']);
	$images = $_FILES['image']['name'];
	$target_video = "educator_video/".basename($_FILES['video']['name']);
	$videos = $_FILES['video']['name'];
	$lname = $_POST["name"];  		
	$lemail = $_POST["email"];  	
	$sta = $_POST["stat"];
	$cat = $_POST["cate"];
	$time = $_POST["num"];
	$des = $_POST["des"];
	if($_FILES['image']['size'] > 0)
	{
		mysqli_query($connect,"UPDATE course SET course_name='$lname', course_price='$lemail', state='$sta', category_id='$cat', course_duration='$time', course_image='$images', course_description='$des' where course_id='$row_course[course_id]'");
		move_uploaded_file($_FILES['image']['tmp_name'], $target);
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
							window.location.href = "educatorManageCourse.php";
						});
		</script>
		<?php
	}
	else if($_FILES['video']['size'] > 0)
	{
		mysqli_query($connect,"UPDATE course SET course_name='$lname', course_price='$lemail', state='$sta', category_id='$cat', course_duration='$time', course_video='$videos', course_description='$des' where course_id='$row_course[course_id]'");
		move_uploaded_file($_FILES['video']['tmp_name'], $target_video);
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
							window.location.href = "educatorManageCourse.php";
						});
		</script>
		<?php
	}
	else if($_FILES['video']['size'] > 0 && $_FILES['image']['size'] > 0)
	{
		mysqli_query($connect,"UPDATE course SET course_name='$lname', course_price='$lemail', state='$sta', category_id='$cat', course_duration='$time', course_image='$images', course_video='$videos', course_description='$des' where course_id='$row_course[course_id]'");
		move_uploaded_file($_FILES['image']['tmp_name'], $target);
		move_uploaded_file($_FILES['video']['tmp_name'], $target_video);
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
							window.location.href = "educatorManageCourse.php";
						});
		</script>
		<?php
	}
	else
	{
		mysqli_query($connect,"UPDATE course SET course_name='$lname', course_price='$lemail', state='$sta', category_id='$cat', course_duration='$time', course_description='$des' where course_id='$row_course[course_id]'");
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
							window.location.href = "educatorManageCourse.php";
						});
		</script>
		<?php
	}
}																																																																																																							
?>	
</body>
</html>
















