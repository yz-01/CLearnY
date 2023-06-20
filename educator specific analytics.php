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
<?php
	if(isset($_GET["buy"]))
	{
		$id = $_GET["id"];
	}
?>
<html>
<title>Specific Analytics</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          <?php
                $purchasing = "SELECT * FROM purchasing_new where course_id = $id GROUP BY MONTH(purchasing_date) ";
                $result_purchasing = mysqli_query($connect,$purchasing);
                while($row_purchasing = mysqli_fetch_assoc($result_purchasing)){
					$n = date("n", strtotime($row_purchasing["purchasing_date"]));
					$f = date("F", strtotime($row_purchasing["purchasing_date"]));
					$count = mysqli_query($connect,"SELECT purchasing_id FROM purchasing_new where course_id = $id and MONTH(purchasing_date) = $n");
					$count_all = mysqli_num_rows($count);
                    echo "['".$f."',".$count_all."],";
                }
            ?>
        ]);

        var options = {
            width: 1160,
			height: 500,
		  vAxis: {
			title: 'Number of Learners'
		  },
          curveType: 'function',
          legend: { position: 'bottom' },
		   hAxis: {
			title: 'Month 	(The sales of month = 0 will not be appear.)'
		  }

        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
	</script>
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
	
	.content{
		display:grid;
		grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
		grid-template-rows: auto 1fr 2fr;
		grid-template-areas: "graph graph graph graph graph" 
							 "title_course title_num title_price title_total title_avg"
							 "word_course word_num word_price word_total word_avg";
		margin: auto;
		margin-top:1em;
		width: 95%;
		background-color:#fff;
		padding:20px;
	}
	
	.graph{
		grid-area: graph;
		padding: 0px;
		display: grid;
		justify-content: center;
		align-items: center;
	}
	
	.title_c{
		grid-area: title_course;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 18px;
		color:#fff;
		background-color:#ff4146;
	}
	
	.title_n{
		grid-area: title_num;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 18px;
		color:#fff;
		background-color:#ff4146;
	}
	
	.title_p{
		grid-area: title_price;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 18px;
		color:#fff;
		background-color:#ff4146;
	}
	
	.title_t{
		grid-area: title_total;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 18px;
		color:#fff;
		background-color:#ff4146;
	}
	
	.title_a{
		grid-area: title_avg;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 18px;
		color:#fff;
		background-color:#ff4146;
	}
	
	.word_c{
		grid-area: word_course;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 15px;
		background-color:#F5F5F5;
	}
	
	.word_n{
		grid-area: word_num;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 15px;
		background-color:#F8F8F8;
	}
	
	.word_p{
		grid-area: word_price;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 15px;
		background-color:#F5F5F5;
	}
	
	.word_t{
		grid-area: word_total;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 15px;
		background-color:#F8F8F8;
	}
	
	.word_a{
		grid-area: word_avg;
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 15px;
		background-color:#F5F5F5;
	}
	
	.discussion{
		margin: auto;
		width: 95%;
		background-color:#fff;
		padding:20px;
		height:60px;
	}
	
	.discussion_button {
		border-radius:50px;
		background-color:#ff4146;
		color:#fff;
		padding:15px;
		width: 15%;
		float:right;
	}
	
	.QuizResultBox{
		margin: auto;
		width: 95%;
		background-color:#fff;
		padding:20px;
	}
	
	.QuizResultBoxTitle{
		font-size:28px;
		color:#606060;
		margin-bottom:10px;
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
		text-decoration: none;
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
		width: 95%;
		background-color:#fff;
		padding:20px;
	}
	
	.CoursePurchasedTitle{
		font-size:25px;
		color:#606060;
		margin-bottom:10px;
		margin-top:5px;
		font-size:28px;
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
	<?php
		$count = mysqli_query($connect,"SELECT course_id FROM purchasing_new where course_id = '$row_course[course_id]'");
		$count_result = mysqli_num_rows($count);
		$price = $count_result * $row_course["course_price"];
	?>
	
	<div class="main">
		
		<div class="content">
			<div class="graph">
				<div class="contentBuy">
					<div class="content_Title" style="font-size: 40px; margin-left: 35%; margin-bottom: 1.5%;">	
						Buying course rate
					</div>
					<div class="content_Chart">	
						
						<div id="curve_chart" style="border: 1px solid #ccc"></div>
						
					</div>
				</div>
			</div>
			
			<div class="title_c">
				Course
			</div>
			
			<div class="title_n">
				Number of buyers
			</div>
			
			<div class="title_p">
				Price (RM)
			</div>
			
			<div class="title_t">
				Total (RM)
			</div>
			
			<div class="title_a">
				Average of ratings (5 stars)
			</div>
			
			<div class="word_c">
				<?php echo $row_course["course_name"];?>
			</div>
			
			<div class="word_n">
				<?php echo $count_result?>
			</div>
			
			<div class="word_p">
				<?php echo $row_course["course_price"];?>
			</div>
			
			<div class="word_t">
				<?php echo $price?>
			</div>
			
			<div class="word_a">
				<?php
					$rating = mysqli_query($connect, "SELECT * FROM course WHERE course_id = '$row_course[course_id]'");
					$row_rating = mysqli_fetch_assoc($rating);
					$find_rating = mysqli_query($connect, "SELECT course_id FROM comments WHERE course_id = '$row_course[course_id]'");
					$count_rating = mysqli_num_rows($find_rating);
					if($count_rating != 0)
					{
						echo $row_rating["rating"];
					}
					else
					{
						echo "-";
					}
				?>
			</div>
		</div>
		
		<?php
		$pur_check = mysqli_query($connect, "SELECT purchasing_id FROM purchasing_new WHERE course_id = '$id'");
		$count_pur = mysqli_fetch_assoc($pur_check);
		if($count_pur != 0)
		{
		?>
			<div class="CoursePurchased">
			<div class="CoursePurchasedTitle">
					<span>Course Purchased</span>
				</div>
				<div class="CoursePurchasedBox">
				<?php
					$pur = mysqli_query($connect, "SELECT * FROM purchasing_new WHERE course_id = '$id'");
					$row_pur = mysqli_fetch_assoc($pur);
					do
					{
						$lea = mysqli_query($connect, "SELECT * FROM learner WHERE learner_id = '$row_pur[learner_id]'");
						$row_lea = mysqli_fetch_assoc($lea);
					?>
						<div class="CoursePurchasedBoxName">
							<div class="CoursePurchasedBoxNameArrange"><?php echo $row_lea["learner_name"];?></div>
							<a href="educatorViewLearnerProfile.php?buy&id= <?php echo $row_lea['learner_id']?>"><i style="font-size:25px; color:#0084ff ;" class="fa fa-id-card" aria-hidden="true"></i></a>
						</div>
					<?php
					}while($row_pur = mysqli_fetch_assoc($pur));
				?>
				</div>
			</div>
		<?php
		}
		else
		{
		}
		?>
		
		
		<?php
		$quiz_check_1 = mysqli_query($connect, "SELECT quiz_id FROM quiz WHERE course_id = '$id'");
		$count_quiz_1 = mysqli_fetch_assoc($quiz_check_1);
		if($count_quiz_1 != 0)
		{
		?>
			<div class="QuizResultBox">
				<div class="QuizResultBoxTitle">
					<span>Quiz Result</span>
				</div>
				<?php
					$result_purchasing_new = mysqli_query($connect, "SELECT * FROM purchasing_new WHERE course_id = '$id'");
					$row_purchasing_new = mysqli_fetch_assoc($result_purchasing_new);
				?>
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
											<a href="educatorViewLearnerProfile.php?buy&id= <?php echo $row_learner['learner_id']?>"><?php echo $row_learner["learner_name"];?></a>
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
											<a href="educatorViewLearnerProfile.php?buy&id= <?php echo $row_learner['learner_id']?>"><?php echo $row_learner["learner_name"];?></a>
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
		<?php
		}
		else
		{
		}
		?>
		
		<div class="discussion">
			<a href="DiscussionEdu.php?buy&id= <?php echo $row_course['course_id']?>">
				<span class="discussion_button">
					Go to Discussion Room
				</span>
			</a>
		</div>
		
	</div>
	
</body>


</html>
















