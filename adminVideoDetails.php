<?php 
session_start();
include("dataconnection.php");
$aname= $_SESSION['name'];
$apass= $_SESSION["pass"];
$aphone= $_SESSION["phone"];
$aemail= $_SESSION["email"];
$result= mysqli_query($connect, "SELECT * from admin where admin_email = '$aemail'");

$row= mysqli_fetch_assoc($result);
?>
<html>
<title>Courses Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<head>
<style>
	body {
	    font-family: "Lato", sans-serif;
		margin:0;
		background-color:#181818;
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
		background-color: #212121;
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
	    color: #fff;
		border-radius: 2px;
	}

	.sidebar-content a:hover {
	    background-color: #383838;
		
	}
	
	
	.sidebar-content a:focus{
		background-color:#4C4C4C;
	}
	
	
	
/*------------------------------End of sidebar------------------------------*/

/*------------------------------Start of content------------------------------*/
	
	.main{
		margin-left:230px;
		overflow: auto;
		color:#fff;
	}
	
	.title{
		display:grid;
		grid-template-columns: 3fr 1fr;
		grid-template-rows: auto;
		margin:auto;
		width:100%;
		background-color:#212121;
	}
	
	.title_title{
		display:grid;
		justify-content:flex-start;
		align-items: center;
		padding:15px;
		font-size:20px;
		padding-left:30px;
	}
	
	.title_pro{
		display:grid;
		grid-template-columns: 1fr 3fr;
		align-items:center;
		padding:15px;
		font-size:16px;
	}
	
	
	.content{
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
	
	.QuizResultBox{
		margin: auto;
		width: 100%;
		box-sizing:border-box;
		padding:20px;
	}
	
	.QuizResultBoxTitle{
		font-size:25px;
		color:#D3D3D3;
		margin-bottom:20px;
	}
	
	.QuizResultBoxContent{
		display:grid;
		grid-template-columns:1fr 1fr 1fr 1fr;
		grid-gap:10px;
	}
	
	.QuizResultBoxContentBox_Pass{
		display:grid;
		grid-template-columns:3fr 1fr;
		padding:10px;
		background-color:#F8F8F8;
		border:2px solid #6EAF0F;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
	}
	
	.QuizResultBoxContentBoxRight{
		margin: auto;
	    width: 100%;
	}
	
	.QuizResultBoxContentBoxRight a{
		text-decoration:none;
	}
	
	.QuizResultBoxContentBox_Fail{
		display:grid;
		grid-template-columns:3fr 1fr;
		padding:10px;
		background-color:#F8F8F8;
		border:2px solid #FF7478;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
	}
	
	.QuizResultBoxContentBoxGrade{
		display:grid;
		grid-template-columns:1fr;
	}
	
	.QuizResultBoxContentBoxGradeNum{
		display:grid;
		justify-content:center;
		align-items:flex-end;
		color:black;
	}
	
	.QuizResultBoxContentBoxGradeTitle{
		display:grid;
		justify-content:center;
		align-items:flex-start;
		font-size:12px;
		color:#606060;
	}
	
	.CoursePurchased{
		margin: auto;
		width: 100%;
		box-sizing:border-box;
		padding:20px;
	}
	
	.CoursePurchasedTitle{
		font-size:25px;
		color:#D3D3D3;
		margin-bottom:10px;
		padding-left:20px;
		margin-top:5px;
	}
	
	.CoursePurchasedBox{
		display:grid;
		grid-template-columns:1fr 1fr 1fr 1fr;
		grid-gap:10px;
	}
	
	.CoursePurchasedBoxName{
		background-color:#fff;
		padding:10px;
		border:2px solid grey;
		color:black;
		display:grid;
		grid-template-columns:6fr 1fr;
	}
	.CoursePurchasedBoxNameArrange{
		display:grid;
		align-items:center;
	}
	
	.contentQues{
		padding:10px;
		display:grid;
		grid-template-columns:12fr 1fr;
		grid-gap:20px;
	}
	
	.contentQuesBox{
		background-color:#fff;
		padding:10px;
		border-radius:12px;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
	}
	
	.contentQuesBoxQnumber{
		color:#606060;
		font-size:15px;
	}
	
	.contentQuesBoxTitle{
		padding-top:10px;
		padding-left:10px;
		padding-bottom:10px;
		font-size:18px;
		color:black;
	}
	
	.contentQuesBoxPoint{
		border-radius:50px;
		background-color:#fff;
		border:2px solid #0084ff ;
		text-align:center;
		font-size:12px;
		color:#606060;
		padding:2px;
	}
	
	.contentAns{
		padding-bottom:20px;
		padding-left:10px;
	}
	
	.contentAns label{
		font-size:18px;
	}
	
	.ansss{
		margin-left:15px; 
		background-color:#fff; 
		padding:8px; 
		color:black;
		border-radius:5px;
	}
	
	.Ques{
		padding:10px;
	}
	
	.QuesTitle{
		font-size:25px;
		color:#D3D3D3;
		margin-bottom:10px;
		padding-left:10px;
		margin-top:5px;
	}
		.EditButton{
		display:grid;
		grid-template-columns: 7fr 1fr;
	}
	
	.goToEdit{
		background-color:#FF7478;
		font-size:15px;
		color: #fff;
		border: none;	
		display:grid;
		justify-content:center;
		align-items:center;
		padding:10px;
		margin-right:30px;
		border-radius:20px;
	}
	
	.EditButton a{
		text-decoration:none;
	}
	
	.EditButton a div:hover{
		background-color:#FF5A5F;
		border-radius:20px;
	}
	
	.EditButton a div:active{
		background-color:#FF7478;
		outline: none;
		border-radius:20px;
	}
	
/*------------------------------End of content------------------------------*/
	

	
</style>
</head>
<body>

	<div class="sidebar">
	    <img src="src/whitelogo.png" alt="C-learnY's Logo" style="width:100%; margin-top:10px;">
	    <hr style="height:1px; width:90%" >
		
	    <div class="sidebar-content" >
			<a href="adminhomopage.php"><i class="fa fa-fw fa-home"></i> Home</a>
			<a href="adminAdminProfile.php"><i class="fa fa-fw fa-user"></i> Admin profile</a>	
			<a href="adminEduProfile.php"><i class="fa fa-fw fa-address-card-o "></i> Educator profile</a>
			<a href="adminLearnerProfile.php"><i class="fa fa-fw fa-address-card"></i> Learner profile</a>
			<a href="adminVideo.php"><i class="fa fa-fw fa-video-camera "></i> Course</a>
			<a href="adminData.php"><i class="fa fa-fw fa-bar-chart "></i> Data</a>
			<a href="adminManageCategory.php"><i class="fa fa-fw fa-list-alt"></i> Category</a>
			<a href="adminEarning.php"><i class="fa fa-fw fa-money "></i> Earning summary</a>
			<a href="adminPendingWithdraw.php"><i class="fa fa-fw fa-upload "></i> Withdraw</a>
			<a href="adminOrderHistory.php"><i class="fa fa-history"></i> Order History</a>
			<a href="adminAnnouncementHomepage.php"><i class="fa fa-fw fa-bell "></i> Announcement</a>
			<a href="login_admin.php"><i class="fa fa-fw fa-sign-out "></i> Logout</a>
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
		<div class="title">
			<div class="title_title">
				Course Details : <?php echo $row_course["course_name"];?>
			</div>
			
			<div class="title_pro">
				<?php
					$image = $row['image_admin'];
					$image_src = "admin_profile_image/".$image;
					$result = mysqli_query($connect,"SELECT * FROM admin where image_admin = '$image'");
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
				<div><?php echo $row["admin_name"];?></div>
			</div>

		</div>
		<div class="content">
			<div class="contentAdd">
				<div class="CoursePurchasedTitle">
					<span>Course Purchased</span>
				</div>
				<a href="adminVideo.php">
					<div class="contentAddNew">
						<i class="fa fa-arrow-left" aria-hidden="true"></i>Back
					</div>
				</a>
				<div class="contentAddBlank">	
				</div>
			</div>
			
			<div class="CoursePurchased">
				<div class="CoursePurchasedBox">
				<?php
					$pur = mysqli_query($connect, "SELECT * FROM purchasing_new WHERE course_id = '$id'");
					$row_pur = mysqli_fetch_assoc($pur);
					$pur_count = mysqli_query($connect, "SELECT purchasing_id FROM purchasing_new WHERE course_id = '$id'");
					$row_pur_count = mysqli_num_rows($pur_count);
					if($row_pur_count != 0)
					{
						do
						{
							$lea = mysqli_query($connect, "SELECT * FROM learner WHERE learner_id = '$row_pur[learner_id]'");
							$row_lea = mysqli_fetch_assoc($lea);
						?>
							<div class="CoursePurchasedBoxName">
								<div class="CoursePurchasedBoxNameArrange"><?php echo $row_lea["learner_name"];?></div>
								<a href="adminLearnerProfileDetails.php?buy&id= <?php echo $row_lea['learner_id']?>"><i style="font-size:25px; color:#0084ff ;" class="fa fa-id-card" aria-hidden="true"></i></a>
							</div>
						<?php
						}while($row_pur = mysqli_fetch_assoc($pur));
					}
					else
					{
					}
				?>
				</div>
			</div>

			<div class="QuizResultBox">
			<div class="QuizResultBoxTitle">
				<span>Quiz Result</span>
			</div>
			<div class="QuizResultBoxContent">
			<?php
				$quiz = mysqli_query($connect, "SELECT * FROM quiz WHERE course_id = '$id'");
				$row_quiz = mysqli_fetch_assoc($quiz);
				$check_quiz = mysqli_query($connect, "SELECT quiz_id FROM quiz WHERE course_id = '$id'");
				$count_quiz = mysqli_num_rows($check_quiz);
				if($count_quiz != 0)
				{
					$learner_answer = mysqli_query($connect, "SELECT * FROM learner_answer WHERE quiz_id = '$row_quiz[quiz_id]'");
					$row_learner_answer = mysqli_fetch_assoc($learner_answer);
					$check_learner_answer = mysqli_query($connect, "SELECT learner_answer_id FROM learner_answer WHERE quiz_id = '$row_quiz[quiz_id]'");
					$count_learner_answer = mysqli_num_rows($check_learner_answer);
					if($count_learner_answer != 0)
					{
						$result_quiz = mysqli_query($connect, "SELECT * FROM result_quiz WHERE quiz_id = '$row_quiz[quiz_id]'");
						$row_result_quiz = mysqli_fetch_assoc($result_quiz);
						do
						{
							$learner = mysqli_query($connect, "SELECT * FROM learner WHERE learner_id = '$row_result_quiz[learner_id]'");
							$row_learner = mysqli_fetch_assoc($learner);
							if($row_result_quiz['result'] >= 50)
							{
								?>
								<div class="QuizResultBoxContentBox_Pass">
									<div class="QuizResultBoxContentBoxRight">
										<a href="adminLearnerProfileDetails.php?buy&id= <?php echo $row_learner['learner_id']?>"><?php echo $row_learner["learner_name"];?></a>
									</div>
									<div class="QuizResultBoxContentBoxGrade">
										<div class="QuizResultBoxContentBoxGradeNum"><?php echo $row_result_quiz["result"];?></div>
										<div class="QuizResultBoxContentBoxGradeTitle">Grade</div>
									</div>
								</div>
								<?php
							}
							else
							{
								?>
								<div class="QuizResultBoxContentBox_Fail">
									<div class="QuizResultBoxContentBoxRight">
										<a href="adminLearnerProfileDetails.php?buy&id= <?php echo $row_learner['learner_id']?>"><?php echo $row_learner["learner_name"];?></a>
									</div>
									<div class="QuizResultBoxContentBoxGrade">
										<div class="QuizResultBoxContentBoxGradeNum"><?php echo $row_result_quiz["result"];?></div>
										<div class="QuizResultBoxContentBoxGradeTitle">Grade</div>
									</div>
								</div>
								<?php
							}
						}while($row_result_quiz = mysqli_fetch_assoc($result_quiz));
					}
					else
					{
					}
				}
				else
				{
				}
			?>
				
			</div>
		</div>
		
		<div class="Ques">
			<div class="QuesTitle">
				<span>Quiz Question</span>
			</div>
			<?php
				if($count_quiz != 0)
				{
					$result_question = mysqli_query($connect, "SELECT * FROM question WHERE quiz_id = '$row_quiz[quiz_id]'");
					$row_question = mysqli_fetch_assoc($result_question);
					$i=0;
					$j=0;
					do
					{
					?>
						<div>
							<div class="contentQues">
								<div class="contentQuesBox">
									<div class="contentQuesBoxQnumber">Question <?php echo $i+1?></div>
									<div class="contentQuesBoxTitle"><?php echo $row_question["question_content"];?></div>
								</div>
								<div>
									<div class="contentQuesBoxPoint">1 point</div>
								</div>
							</div>
							<?php
							$result_answer = mysqli_query($connect, "SELECT * FROM answer WHERE question_id = '$row_question[question_id]'");
							$row_answer = mysqli_fetch_assoc($result_answer);
							do
							{
							?>
								<div class="contentAns">
									<input type="radio" id="Q1a" name="<?php echo $j;?>" value="<?php echo $row_answer["asnwer_id"];?>" disabled>
									<label for="Q1a"><?php echo $row_answer["answer_content"];?></label><br>
								</div>
							<?php
							}while($row_answer = mysqli_fetch_assoc($result_answer));
							?>
							<div style='height:20px;'>
							</div>
						</div>
					<?php
						$j++;
						$i++;
						?>
						<span class="ansss">Answer: <?php echo $row_question["question_answer"];?></span>
						<?php
					}while($row_question = mysqli_fetch_assoc($result_question));
				}
				else
				{
				}
			?>
			

			
			<div style='height:20px;'>
			</div>
		</div>
	
				<div class="EditButton" style="padding-bottom: 30px;">
			<div class="EditLeftBlank">
			</div>
			<a href="adminEditCourseSpecific.php?buy&id= <?php echo $row_course['course_id']?>">
				<div class="goToEdit">Edit</div>
			</a>
		</div>
			
		</div>
		
	</div>
	
</body>

</html>












