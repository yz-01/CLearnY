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
<title>Upload Quiz details</title>
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
	
	.contentQuizDetails input[type=submit]{
		padding: 8px;
		background-color:#FF7478;
		color:#fff;
		border-radius:12px;
		border-width:0px;
		margin-right: 10px;
	}
	
	.contentQuizDetails input[type=submit]:hover{
		background-color:#FF5A5F;
		cursor:pointer;
	}
	
	.contentQuizDetails input[type=submit]:focus{
		outline:none;
	}
	
	.contentQuizDetails input[type=submit]:active{
		background-color:#ff4146;
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
	
	.btnbtnbtn{
		padding: 12px;
		background-color:#FF7478;
		color:#fff;
		border-radius:12px;
		border-width:0px;
		margin-right: 10px;
	}
	
	.btnbtnbtn a{
		text-decoration: none;
		color: white;
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
	
	.btnbtn{
		padding: 4px;
		background-color:#FF7478;
		color:#fff;
		border-radius:5px;
		border-width:0px;
		margin-right: 10px;
		margin-bottom: 10px;
	}
	
	.btnbtn a{
		text-decoration: none;
		color: white;
	}
	
	textarea {
	  resize: none;
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
			$result_quiz = mysqli_query($connect, "SELECT * FROM quiz WHERE quiz_id = '$id'");
			$row_quiz = mysqli_fetch_assoc($result_quiz);
		}
	?>
	<div class="main">
		<div class="content">
			<div class="contentQuizTitle">
				<i class="fa fa-gamepad" aria-hidden="true" style="margin-right:10px;"></i>View / Edit Quiz Name
			</div>
			<div class="contentForm">
				<form>
					<div class="contentQuizDetails">
				</form>
				<form name="upload_educator" action="" method="POST" enctype='multipart/form-data'>
						<div>Practice Quiz Name</div>
						<input type='text' name='quizname' style='padding:5px;' value='<?php echo $row_quiz["quiz_title"];?>'/>
						<div>Expected time period (minutes)</div>
						<input type='number' name='expectedTIme' min='0' style='padding:5px;' value='<?php echo $row_quiz["quiz_time"];?>'/>
					</div>
					<?php
							$k=0;
							$t=100;
							$i=0;
							$array = array("A", "B", "C", "D");
							$result_question = mysqli_query($connect, "SELECT * FROM question WHERE quiz_id = '$id'");
							$row_question = mysqli_fetch_assoc($result_question);
							$count_of_question = mysqli_query($connect, "SELECT question_id FROM question WHERE quiz_id = '$id'");
							$count_question = mysqli_num_rows($count_of_question);
							if($count_question != 0)
							{
								do
								{
									$j=0;
								?>
									<div class="contentQuizContent">
										<hr style="height:1px; width:100%" >
										<div class="btn">Question <?php echo $i+1;?> 
											<button class="btnbtn" style="padding:5px; padding-left:10px; padding-right:10px;"><a href="EducatorEditQuiz.php?buy&id= <?php echo $row_question['question_id']?>">edit</a></button>
										</div>
										<textarea name='<?php echo $i+1;?>' rows='4' cols='50' maxlength='500' value='<?php echo $row_question["question_content"];?>' style='padding:5px; margin-bottom:10px; 'disabled><?php echo $row_question["question_content"];?></textarea>
										<?php
											$result_answer = mysqli_query($connect, "SELECT * FROM answer WHERE question_id = '$row_question[question_id]'");
											$row_answer = mysqli_fetch_assoc($result_answer);
											do
											{
											?>
											<div style="margin-bottom:5px;">
												<span><?php echo $array[$j];?></span><input type='text' name='<?php echo $k+$j*1;?>' value='<?php echo $row_answer["answer_content"];?>' placeholder='<?php echo $row_answer["answer_content"];?>' style='padding:5px; margin-left:5px;'disabled />
											</div>
											<?php
												$k = $k + 2;
												$j = $j + 1;
											}
											while($row_answer = mysqli_fetch_assoc($result_answer));
										?>								
										<div style="margin-top:15px;">Answer</div>
										<?php
										$find_q_a = mysqli_query($connect, "SELECT * FROM question WHERE question_id = '$row_question[question_id]'");
										$row_find_q_a = mysqli_fetch_assoc($find_q_a);
										if($row_find_q_a['question_answer'] == "a")
										{
										?>
										<select name = '<?php echo $t;?>' style='font-size:15px; padding:5px;' disabled>
											<option value='a' selected>A</option><option value='b'>B</option><option value='c'>C</option><option value='d'>D</option>
										</select>
										<?php
										}
										else if($row_find_q_a['question_answer'] == "b")
										{
										?>
										<select name = '<?php echo $t;?>' style='font-size:15px; padding:5px;' disabled>
											<option value='a'>A</option><option value='b' selected>B</option><option value='c'>C</option><option value='d'>D</option>
										</select>
										<?php
										}
										else if($row_find_q_a['question_answer'] == "c")
										{
										?>
										<select name = '<?php echo $t;?>' style='font-size:15px; padding:5px;' disabled>
											<option value='a'>A</option><option value='b'>B</option><option value='c' selected>C</option><option value='d'>D</option>
										</select>
										<?php
										}
										else if($row_find_q_a['question_answer'] == "d")
										{
										?>
										<select name = '<?php echo $t;?>' style='font-size:15px; padding:5px;' disabled>
											<option value='a'>A</option><option value='b'>B</option><option value='c'>C</option><option value='d' selected>D</option>
										</select>
										<?php
										}
										?>
									</div>
								<?php
									$i = $i + 1;
									$t = $t + 1;
								}while($row_question = mysqli_fetch_assoc($result_question));
							}
							else
							{
							}
					?>				
					<div class="form_upload">
						<button class="btnbtnbtn"><a href="EducatorAddQuizSpecific.php?buy&id= <?php echo $row_quiz['quiz_id']?>">Add Question</a></button>
						<input type="submit" name="Sendbtn" value="Save">
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
	$quizname = $_POST["quizname"];
	$expectedTIme = $_POST["expectedTIme"];
	
	$result_quiz = mysqli_query($connect, "UPDATE quiz SET quiz_title='$quizname', quiz_time='$expectedTIme' where quiz_id='$row_quiz[quiz_id]'");
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
						window.location.href = "EducatorViewQuiz.php?buy&id=<?php echo $row_quiz['quiz_id']?>";
					})
		</script>
	<?php
}
?>
</body>
</html>
















