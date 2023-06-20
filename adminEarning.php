<?php 
session_start();
include("dataconnection.php");
$result_learner = mysqli_query($connect,"SELECT learner_id FROM learner");
$count_learner = mysqli_num_rows($result_learner);
$result_video = mysqli_query($connect,"SELECT course_id FROM course");
$count_video = mysqli_num_rows($result_video);
$result_educator = mysqli_query($connect,"SELECT educator_id FROM educator");
$count_educator = mysqli_num_rows($result_educator);
$total = $count_learner + $count_educator + $count_video;

$aname= $_SESSION['name'];
$apass= $_SESSION["pass"];
$aphone= $_SESSION["phone"];
$aemail= $_SESSION["email"];
$result= mysqli_query($connect, "SELECT * from admin where admin_email = '$aemail'");

$row= mysqli_fetch_assoc($result);
?>
<html>
<title>Earning Summary</title>
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
		grid-template-columns: 4fr 1fr;
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
		grid-template-columns: 1fr 2fr;
		align-items:center;
		padding:15px;
		font-size:16px;
	}
	
	.content{
		padding:20px;
	}
	
	.contentClearnYTitle{
		font-size:20px;
		color:#D6D6D6;
		border-bottom:3px #0084ff  solid;
		width:170px;
		padding-bottom:5px;
	}
	
	.contentClearnYTitleSubtitle{
		display:grid;
		grid-gap:50px;
		grid-template-columns:10fr 1fr;
		margin-top:10px;
		margin-bottom:10px;
	
	}
	
	.contentClearnYTitleSubtitleSymbol{
		display:grid;
		justify-content:center;
	}
	
	.contentClearnYTitleContent{
		display:grid;
		grid-template-columns:10fr 1fr;
		grid-gap:50px;
		color:black;
	}
	
	.contentClearnYTitleContentTitle{
		background-color:#fff;
		padding:20px;
		border-radius:10px;
	}
	
	.contentClearnYTitleContentNumber{
		background-color:#fff;
		padding:20px;
		border-radius:10px;
		display:grid;
		justify-content:center;
	}
	
	.contentEduTitle{
		font-size:20px;
		color:#D6D6D6;
		margin-top:40px;
		border-bottom:3px #FF5A5F   solid;
		padding-bottom:5px;
		width:170px;

	}
	
	.contentEduTitleSubtitle{
		display:grid;
		grid-gap:50px;
		grid-template-columns:1fr 8fr 1fr;
		margin-top:30px;
		margin-bottom:10px;

	}
	
	.contentEduTitleSubtitleSymbol{
		display:grid;
		justify-content:center;

	}
	
	.contentEduTitleContent{
		display:grid;
		grid-gap:50px;
		grid-template-columns:10fr 1fr;
		color:black;
		margin-bottom:8px;
	}
	
	.contentEduTitleContentNumber{
		background-color:#fff;
		padding:20px;
		border-radius:10px;
		display:grid;
		justify-content:center;
	}
	
	.contentEduTitleContentTitle{
		display:grid;
		grid-template-columns:1fr 6fr;
		background-color:#fff;
		padding:20px;
		border-radius:10px;
	}
	
	
	.contentAdd{
		display:grid;
		grid-template-columns: 10fr 2.2fr 0.1fr;
		grid-template-rows: auto;
		padding-top:10px;
		padding-right:10px;
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
	
	.contentEduextra{
		display:flex;
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
	
	
	<div class="main">
		<div class="title">
			<div class="title_title">
				Earning Summary
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
					<?php 
						$price = "Select * from purchasing_new";
						$result_price = mysqli_query($connect,$price);
						$row_price = mysqli_fetch_array($result_price);
						$total = 0;
						do
						{
							$total = $total + $row_price["amount"];
						}while($row_price = mysqli_fetch_array($result_price));
					?>
					
<!-----------------------------------------add here start--------------------------------------------------------->
		
		
		<div class="contentAdd">
			<div class="contentAddBlank">	
			</div>
			<a href="adminEarningYear.php">
				<div class="contentAddNew">
					<i class="fa fa-file" aria-hidden="true"></i>Yearly Earning Report
				</div>
			</a>
			<div class="contentAddBlank">	
			</div>
		</div>
		
		
<!------------------------------------------add here end-------------------------------------------------------->
					
					
					
		<div class="content">
			<div class="contentClearnY">
				<div class="contentClearnYTitle">
					C-learnY's earning
				</div>
				<div class="contentClearnYTitleSubtitle">
					<div>
					</div>
					<div class="contentClearnYTitleSubtitleSymbol">
						RM
					</div>
				</div>
				<div class="contentClearnYTitleContent">
					<div class="contentClearnYTitleContentTitle">
						Total Earning
					</div>
					<div class="contentClearnYTitleContentNumber">
						<?php echo $total * 0.2;?>
					</div>
				</div>
			</div>
			
			<div class="contentEdu">
				<div class="contentEduextra">
					<div class="contentEduTitle">
						Educator's earning
					</div>
	
					<a href="reports.php?pdfPHP=total_sales_report" target="_blank"><i class='fa fa-download fa-2x text-gray-300' style="color: white; margin-top:40px; padding-left:10px;"></i></a>
				
				</div>
				
				<div class="contentEduTitleSubtitle">
					<div>
						Education ID
					</div>
					<div>
						Education Name
					</div>
					<div class="contentEduTitleSubtitleSymbol">
						RM
					</div>
				</div>
				<?php
					$edu= mysqli_query($connect, "SELECT * from educator");
					$row_edu= mysqli_fetch_assoc($edu);
					do
					{
					?>
						<div class="contentEduTitleContent">
							<div class="contentEduTitleContentTitle">
								<div>
									<?php echo $row_edu["educator_id"];?>
								</div>
								<div>
									<?php echo $row_edu["educator_name"];?>
								</div>
							</div>
							<div class="contentEduTitleContentNumber">
							<?php
								$course= mysqli_query($connect, "SELECT * from course where educator_id='$row_edu[educator_id]'");
								$row_course= mysqli_fetch_assoc($course);
								$course_c= mysqli_query($connect, "SELECT course_id from course where educator_id='$row_edu[educator_id]'");
								$count_course = mysqli_num_rows($course_c);
								$total = 0;
								if($count_course != 0)
								{
									do
									{
										$pur= mysqli_query($connect, "SELECT * from purchasing_new where course_id='$row_course[course_id]'");
										$row_pur= mysqli_fetch_assoc($pur);
										$pur_c= mysqli_query($connect, "SELECT purchasing_id from purchasing_new where course_id='$row_course[course_id]'");
										$count_pur= mysqli_num_rows($pur_c);
										if($count_pur != 0)
										{
											$add = $row_pur["amount"];
										}
										else
										{
											$add = 0;
										}
										$total = $total + $add;
									}while($row_course= mysqli_fetch_assoc($course));
									echo $total * 0.8;
								}
								else
								{
									echo 0;
								}
							?>
							</div>
						</div>
					<?php
					}while($row_edu= mysqli_fetch_assoc($edu));
				?>
				<!--loop start-->
				<!--loop end-->
				
			</div>
			
			
			
		</div>
		
	</div>
	
</body>

</html>












