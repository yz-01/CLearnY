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
<title>Edit Quiz details</title>
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
	
	.contentQuizTitle{
		margin: auto;
		margin-top: 1em;
		margin-bottom: 10px;
		width: 55%;
		background-color:#FF5A5F;
		color:#fff;
		padding: 18px;
		border-radius:12px;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
		font-size:20px;
	}
	
	
	.contentQuizDetails{
		padding:10px;
		font-size:16px;
	}
	
	.contentQuizDetails div{
		margin-bottom:5px;
		font-weight:bold;
	}
	
	.contentQuizDetails input{
		margin-bottom:5px;
	}
	
	.contentQuizContent{
		padding:10px;
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
	
	.contentForm{
		background-color:#fff;
		width:55%;
		margin:auto;
		border-radius:10px;
		padding:15px;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
	}
	
	
	textarea{
	    resize: none;
	}

	.btnbtnbtn{
		padding:5px; 
		padding-left:10px; 
		padding-right:10px;
		background-color:#FF7478;
		color:#fff;
		border-radius:5px;
		border-width:0px;
		margin-right: 10px;
		
	}
	
	.btnbtnbtn a{
		text-decoration: none;
		color: white;
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
			$result_question = mysqli_query($connect, "SELECT * FROM question WHERE question_id = '$id'");
			$row_question = mysqli_fetch_assoc($result_question);
		}
	?>
	<div class="main">
		<div class="content">
			<div class="contentQuizTitle">
				<i class="fa fa-gamepad" aria-hidden="true" style="margin-right:10px;"></i>Edit Question / Answer
			</div>
			<div class="contentForm">
				<form name="upload_educator" action="" method="POST" enctype='multipart/form-data'>
					<div class="contentQuizContent">
						<div>Question</div>
						<textarea name='question' rows='4' cols='50' maxlength='500' value='<?php echo $row_question["question_content"];?>' style='padding:5px; margin-bottom:10px;'><?php echo $row_question["question_content"];?></textarea>
						<?php
							$array = array("A", "B", "C", "D");
							$k=0;
							$j=0;
							$result_answer = mysqli_query($connect, "SELECT * FROM answer WHERE question_id = '$id'");
							$row_answer = mysqli_fetch_assoc($result_answer);
							do
							{
							?>
								<div class="btn" style="margin-bottom:5px;">
									<span><?php echo $array[$j];?></span><input type='text' name='<?php echo $k+$j*1;?>' value='<?php echo $row_answer["answer_content"];?>' style='padding:5px; margin-left:5px;' disabled />
									<button class="btnbtnbtn"><a href="EducatorEditAnswer.php?buy&id= <?php echo $row_answer['asnwer_id']?>">Edit</a></button>
								</div>
							<?php
								$k = $k + 2;
								$j++;
							}while($row_answer = mysqli_fetch_assoc($result_answer));
						?>
						
						<div style="margin-top:15px;">Answer</div>
										<?php
										$find_q_a = mysqli_query($connect, "SELECT * FROM question WHERE question_id = '$row_question[question_id]'");
										$row_find_q_a = mysqli_fetch_assoc($find_q_a);
										if($row_find_q_a['question_answer'] == "a")
										{
										?>
										<select name = 'answer' style='font-size:15px; padding:5px;'>
											<option value='a' selected>A</option><option value='b'>B</option><option value='c'>C</option><option value='d'>D</option>
										</select>
										<?php
										}
										else if($row_find_q_a['question_answer'] == "b")
										{
										?>
										<select name = 'answer' style='font-size:15px; padding:5px;'>
											<option value='a'>A</option><option value='b' selected>B</option><option value='c'>C</option><option value='d'>D</option>
										</select>
										<?php
										}
										else if($row_find_q_a['question_answer'] == "c")
										{
										?>
										<select name = 'answer' style='font-size:15px; padding:5px;'>
											<option value='a'>A</option><option value='b'>B</option><option value='c' selected>C</option><option value='d'>D</option>
										</select>
										<?php
										}
										else if($row_find_q_a['question_answer'] == "d")
										{
										?>
										<select name = 'answer' style='font-size:15px; padding:5px;'>
											<option value='a'>A</option><option value='b'>B</option><option value='c'>C</option><option value='d' selected>D</option>
										</select>
										<?php
										}
										?>
					</div>
					
					
					<div class="form_upload">
						<input type="submit" name="deletebtn" value="Delete">
						<input type="submit" name="Sendbtn" value="Upload">
					</div>
				</form>
			</div>
			
			<div style="margin:30px;"> 
			<div>
		</div>
	</div>
<?php
if(isset($_POST["Sendbtn"]))
{
	$question = $_POST["question"];
	$answer = $_POST["answer"];
	$result_answer = mysqli_query($connect, "SELECT * FROM answer WHERE question_id = '$id'");
	$row_answer = mysqli_fetch_assoc($result_answer);
	
	$result_question = mysqli_query($connect, "UPDATE question SET question_content='$question', question_answer='$answer' where question_id='$row_question[question_id]'");
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
						window.location.href = "EducatorEditQuiz.php?buy&id=<?php echo $row_question['question_id']?>";
					});
		</script>
	<?php
}
else if(isset($_POST["deletebtn"]))
{
	$sql="DELETE FROM answer where question_id = '$row_question[question_id]'";
	mysqli_query($connect, $sql);
	$que="DELETE FROM question where question_id = '$row_question[question_id]'";
	mysqli_query($connect, $que);
	?>
		<script>
			swal(
                {
                    title: "Congratulations!",
                    text: "Deleted Successfully!",
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
?>
</body>
</html>
















