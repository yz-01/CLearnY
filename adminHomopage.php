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
<title>Admin homepage</title>
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
		display:grid;
		grid-template-columns: 1fr 1fr 1fr;
		grid-template-rows: auto;
		grid-template-areas: "";
		margin:auto;
		width:100%;
		grid-gap:20px;
		padding:20px;
		box-sizing: border-box;
	}
	
	.tot_video_box{
		background-color: rgba(255,255,255,0.1);	
		padding:10px;
		border-radius:12px;
	}
	.tot_video_box .learner:hover{
		transform: translateY(-10px);
		box-shadow: 0 15px 35px rgba(0,0,0,.5);
	}
	.learner:hover .percent .number h2{
		color: #fff;
		font-size: 60px;
	}
	.tot_video_box .educator:hover{
		transform: translateY(-10px);
		box-shadow: 0 15px 35px rgba(0,0,0,.5);
	}
	.educator:hover .percent .number h2{
		color: #fff;
		font-size: 60px;
	}
	.tot_video_box .video:hover{
		transform: translateY(-10px);
		box-shadow: 0 15px 35px rgba(0,0,0,.5);
	}
	.video:hover .percent .number h2{
		color: #fff;
		font-size: 60px;
	}
	
	
	
	
	.avg_rating_box{
		background-color: rgba(255,255,255,0.1);
		padding:10px;
		border-radius:12px;
	}
	
	.tot_profit_box{
		background-color: rgba(255,255,255,0.1);
		padding:10px;
		border-radius:12px;
	}

	.content div{
		display:grid;
		justify-content:center;
		font-size:18px;
	}

	#numbers .educator{
		font-size: 40px;
		padding-top: 15px;
	}
	#numbers p{
		font-size: 20px;
		margin-left: 10%;
	}
	#numbers{
		font-size: 40px;
	}
/*------------------------------End of content------------------------------*/
	.box{
		position: relative;
		width: 300px;
		height: 250px;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		box-shadow: 0 30px 60px rgba(0,0,0,.2);
	}
	.box .percent{
		position: relative;
		width: 150px;
		height: 150px;
	}
	.box .percent svg{
		position: relative;
		width: 150px;
		height :150px;
	}
	.box .percent svg circle{
		width: 150px;
		height :150px;
		fill: none;
		stroke-width: 10;
		stroke: #000;
		transform: translate(5px, 5px);
		stroke-dasharray: 440;
		stroke-dashoffset: 440;
	}
	.box .percent svg circle:nth-child(1){
		stroke-dashoffset: 0;
		stroke: #f3f3f3;
	}
	.learner .box .percent svg circle:nth-child(2){
		stroke-dashoffset: calc(440 - (440 * <?php echo $count_learner?>) / <?php echo $total?>);
		stroke: #00fe42;
	}
	.educator .box .percent svg circle:nth-child(2){
		stroke-dashoffset: calc(440 - (440 * <?php echo $count_educator?>) / <?php echo $total?>);
		stroke: #03a9f4;
	}
	.video .box .percent svg circle:nth-child(2){
		stroke-dashoffset: calc(440 - (440 * <?php echo $count_video?>) / <?php echo $total?>);
		stroke: #fb02f1;
	}
	.box .percent .number{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		color: #999;
	}
	.box .percent .number h2{
		font-size: 48px;
	}
	.box .percent .number h2 span{
		font-size: 24px;
	}
	
	

	
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
				Homepage
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
			<div class="tot_video_box">
				<div style="padding:10px; padding-bottom: 20px;">
					Total Learner
				</div>
				<div class="learner">
					<div class="box">
						<div class="percent">
							<svg>
								<circle cx="70" cy="70" r="70"></circle>
								<circle cx="70" cy="70" r="70"></circle>
							</svg>
							<div class="number">
								<h2><?php echo intval(($count_learner/$total)*100)?><span>%</span></h2>
							</div>
						</div>
					</div>
				</div>
				<div id="numbers">
					<div class="educator"><?php echo $count_learner?></div>
					<p>Learners</p>
				</div>
			</div>
			
			<div class="tot_video_box">
				<div style="padding:10px;">
					Total Educator
				</div>
				<div class="educator">
					<div class="box">
						<div class="percent">
							<svg>
								<circle cx="70" cy="70" r="70"></circle>
								<circle cx="70" cy="70" r="70"></circle>
							</svg>
							<div class="number">
								<h2><?php echo intval(($count_educator/$total)*100)?><span>%</span></h2>
							</div>
						</div>
					</div>
				</div>
				<div id="numbers">
					<div class="educator"><?php echo $count_educator?></div>
					<p>Educators</p>
				</div>
			</div>
			
			<div class="tot_video_box">
				<div style="padding:10px;">
					Total Video
				</div>
				<div class="video">
				<div class="box">
					<div class="percent">
						<svg>
							<circle cx="70" cy="70" r="70"></circle>
							<circle cx="70" cy="70" r="70"></circle>
						</svg>
						<div class="number">
							<h2><?php echo intval(($count_video/$total)*100)?><span>%</span></h2>
						</div>
					</div>
				</div>
			</div>
				<div id="numbers">
					<div class="educator"><?php echo $count_video?></div>
					<p>Videos</p>
				</div>
			</div>
			<?php
				$result= mysqli_query($connect, "SELECT * from course");
				$row= mysqli_fetch_assoc($result);
				$r = 0;
				$c = 0;
				do
				{
					if($row["rating"] != 0)
					{
						$r = $r + $row["rating"];
						$c++;
					}
					else
					{
					}
				}while($row= mysqli_fetch_assoc($result));
				$re = $r / $c;
			?>
			<div class="avg_rating_box">
				<div style="padding:10px;">
					Average rating (0-5)
				</div>
				<div id="numbers">
					<?php echo intval($re);?>
				</div>
			</div>
			
			<div class="tot_profit_box">
				<div style="padding:10px;">
					Total profit (RM)
				</div>
				<div id="numbers">
					<?php 
						$price = "Select * from purchasing_new";
						$result_price = mysqli_query($connect,$price);
						$row_price = mysqli_fetch_array($result_price);
						$tprice = 0;
						do
						{
							$tprice = $tprice + $row_price['amount'];
						}while($row_price = mysqli_fetch_array($result_price));
						echo $tprice * 0.2;
					?>
					
				</div>
			</div>
			
			<div class="tot_profit_box">
				<div style="padding:10px;">
					Total 
				</div>
				<div id="numbers">
					<?php echo $total?>
				</div>
			</div>
		</div>
		
		
	</div>
	
</body>

</html>












