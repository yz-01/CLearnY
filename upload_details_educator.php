<?php 
session_start();
include("dataconnection.php");

$evideo= $_SESSION['course_video'];
$eid= $_SESSION['eid'];
$ename= $_SESSION['ename'];
$epass= $_SESSION["epass"];
$ephone= $_SESSION["ephone"];
$eemail= $_SESSION["eemail"];
$result= mysqli_query($connect, "SELECT * from educator where educator_email = '$eemail'");
$result_course= mysqli_query($connect, "SELECT * from course where course_video = '$evideo'");

$row= mysqli_fetch_assoc($result);
$row_course= mysqli_fetch_assoc($result_course);
?>
<html>
<title>Upload details</title>
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
		color: #FF5A5F;
	}


/*------------------------------End of top bar------------------------------*/
/*------------------------------Start of content------------------------------*/
	
	.main{
		margin-top: 70px;
		margin-left:230px;
		overflow: auto;
	}
	
	.form_title{
		margin: auto;
		margin-top: 2em;
		margin-bottom: 10px;
		width: 60%;
		background-color:#FF5A5F;
		color:#fff;
		padding: 18px;
		border-radius:12px;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
		font-size:20px;
	}
	
	.form_title i{
		margin-right:10px;
		margin-left:5px;
	}
	
	.content_layout{
		margin: auto;
		margin-bottom:6em;
		width: 60%;
		padding: 18px;
		background-color:#fff;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
		border-radius:5px;
	}
	
	.content_layout form{
		display:grid;
		grid-template-columns: 1fr 1fr;
		grid-template-rows: auto auto auto auto auto;
		grid-template-areas: "name iframe" "des iframe" "thum thumpic" "cate sell" "upload upload" ;
		grid-gap:10px;
	}
	
	.form_name{
		font-size: 18px;
		grid-area: name;
		padding:10px;
	}
	
	.form_name textarea{
		padding:5px;
	}
	
	.form_iframe{
		display:grid;
		grid-area: iframe;
		justify-content:center;
		align-items: center;
	}	
	
	.form_des{
		font-size: 18px;
		grid-area: des;
		padding:10px;
	}
	
	.form_des textarea {
		padding:5px;
	}
	
	.form_thum{
		font-size: 18px;
		grid-area: thum;
		padding:10px;
		display:grid;
		align-items: center;
	}
	
	.form_thum_pic{
		display:grid;
		grid-area: thumpic;	
		justify-content:center;
		align-items: center;
	}
	
	.thum_des{
		font-size:13px;
		color:grey;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	
	.form_cate{
		font-size: 18px;
		grid-area: cate;
		padding:10px;
	}
	
	
	.form_sell{
		font-size: 18px;
		grid-area: sell;
		padding:10px;
	}
	
	.form_sell input{
		padding:5px;
	}
	.form_duration{
		font-size: 18px;
		grid-area: sell;
		padding:10px;
		margin-left: 50%;
	}
	
	.form_duration input{
		padding:5px;
	}
	
	.form_upload{
		font-size: 18px;
		grid-area: upload;
		padding:10px;
	}
	
	.form_upload{
		text-align: right;
	}
	
	.form_upload input{
		padding: 12px;
		background-color:#FF7478;
		color:#fff;
		border-radius:12px;
		border-width:0px;
		margin-right: 10px;
	}
	
	.form_upload input:hover{
		background-color:#FF5A5F;
		cursor:pointer;
	}
	
	.form_upload input:focus{
		outline:none;
	}
	
	.form_upload input:active{
		background-color:#ff4146;
	}
	
	#cate_other_input input{
		font-size:15px;
		padding:5px;
	}
	
	.form_del{
		
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
	
		<div class="form_title">
			<i class="fa fa-upload" aria-hidden="true"></i><?php echo $row_course["course_video"];?>
		</div>
		<div class="content_layout">
			<form  name="user_form" action="" method="POST" enctype='multipart/form-data'>
				<div class="form_name">
						<div>
							<b>Title</b>
						</div>
						<textarea name="title" rows="2" cols="40" maxlength="100" required></textarea>
				</div>
				
				<div class="form_des">
					<div>
						<b>Description</b>
					</div>
					<textarea name="description" rows="4" cols="40" maxlength="500" required></textarea>
				</div>
				
				<div class="form_iframe">
					<?php
						$video = $row_course['course_video'];
						$video_src = "educator_video/".$video;
						echo "<video width='300px' height='200px' src='".$video_src ."'>";
					?>
				</div>
				<div class="form_thum">
					<div>
						<b>Thumbnail</b>
					</div>
					<div class="thum_des">
						Upload a picture that shows what's in your video.<br>A good thumbnail stands out and draws viewers' attention
					</div>
					<label for="img">
						<input type="file" name="image" id="img" accept="image/*" style="width:200px;" required />
					</label>
				</div>
				<div class="form_cate">
					<div>
						<b>Category</b>
					</div>
					<br>
					<?php
						$category = "Select * from category";
						$result_category = mysqli_query($connect,$category);
						$row_category = mysqli_fetch_array($result_category);
					?>
					<select name = "cate" style="font-size:15px; padding:5px;" onchange="other_description();"required>
						<option value="">Select an option</option>
						<?php  
							do
							{
							?>
								<option value="<?php echo $row_category["category_id"]; ?> "><?php echo $row_category["category_name"]; ?></option>
							<?php
							}while($row_category=mysqli_fetch_array($result_category));
						?>
					</select>
					
					<br><br>									
					
					<div id="cate_other_input">&nbsp;</div>
					<span id="cate_des" style="font-size:13px; padding:5px; color:grey;">&nbsp;</span>
					
					
				
				</div>
				<div class="form_sell">
					<div>
						<b>Selling price</b>
					</div>
					<br>RM <input type="number" name="price" step=".01" min="0.00" max="500" style="width:60px;" required>
					<div class="thum_des">
						If selling price = 0,<br>will display as Free.
					</div>
				</div>
				<div class="form_duration">
					<div>
						<b>Duration</b>
					</div>
					<br><input type="number" name="time" step=".1" min="1.00" max="500" style="width:60px;" required> minutes
				</div>
				<div class="form_upload">
					<input type="submit" name="Sendbtn" value="Save Changes">
				</div>
			</form>
			<form>
				<div class="form_upload" style="margin-top: -70px;">
					<input type="submit" name="deletebtn" value="Delete">
				</div>
			</form>
		</div>
	</div>
	
<?php
 //$_FILES['file']['tmp_name'] − the uploaded file in the temporary directory on the web server.

   // $_FILES['file']['name'] − the actual name of the uploaded file.

 
if(isset($_POST["Sendbtn"]))
{
	$target = "educator_video_image/".basename($_FILES['image']['name']);
	$images = $_FILES['image']['name'];
	$title = $_POST["title"]; 
	$description = $_POST["description"]; 
	$price = $_POST["price"];
	$time = $_POST["time"];
	$category = $_POST["cate"];
	if($_FILES['image']['size'] > 0)
	{
		$sql="UPDATE course SET course_name='$title', course_description='$description', course_price='$price', course_duration='$time', course_image='$images', category_id='$category', state = 'ACTIVE' where course_video = '$evideo'";
		mysqli_query($connect, $sql);
		move_uploaded_file($_FILES['image']['tmp_name'], $target);
		$dr = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM course where course_video = '$evideo'"));
		
		$dr_insert = mysqli_query($connect,"INSERT INTO discussion_room(course_id)VALUES('$dr[course_id]')");

		$drr = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM discussion_room where course_id = '$dr[course_id]'"));

		$dc_insert = mysqli_query($connect,"INSERT INTO discussion_content(content, educator_id, discussion_room_id, who)VALUES('Welcome to $dr[course_name]', '$row[educator_id]', '$drr[discussion_room_id]', 'edu')");
		$_SESSION['course_image'] = $images;
		?>
		<script> 
			swal
			(
				{
					title: "Do you provide any quiz for this course?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				}
			)
			.then
			((willDelete) => 
			{
				if (willDelete) 
				{
					swal
					(
					);
					window.location.href = "upload_Quiz.php";
				} 
				else 
				{
					swal(
					{
						title: "Congratulations!",
						text: "Upload Successfully!",
						icon: "success",
						button: "Continue"
					}
					).then(function()
					{
						window.location.href = "educator homepage.php";
					});
				}
			});
		</script>
		<?php
	}
	else
	{
		?>
		<script> 
			swal({
			  title: "Oh No!",
			  text: "Please upload some images for your videos!",
			  icon: "warning",
			  button: "continue!",
			});
		</script>
		<?php
	}
}
else if(isset($_GET["deletebtn"]))
{
				$sql="DELETE FROM course where course_video = '$evideo'";
				mysqli_query($connect, $sql);
		?>
		<script> 
			swal({
			  title: "Oh No!",
			  text: "Your video have been deleted!",
			  icon: "warning",
			  button: "continue!",
			}).then(function()
					{
						window.location.href = "educator homepage.php";
					});
		</script>
		<?php
}
?>
	
</body>
</html>





















