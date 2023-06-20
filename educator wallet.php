<?php 
session_start();
include("dataconnection.php");

$eid= $_SESSION['eid'];
$ename= $_SESSION['ename'];
$epass= $_SESSION["epass"];
$ephone= $_SESSION["ephone"];
$eemail= $_SESSION["eemail"];
$eimage= $_SESSION['educator_image'];
$result= mysqli_query($connect, "SELECT * from educator where educator_email = '$eemail'");
$result_course= mysqli_query($connect, "SELECT * from course");

$row= mysqli_fetch_assoc($result);
$row_course= mysqli_fetch_assoc($result_course);
?>
<html>
<title>Wallet</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">         <!--for the search bar icon-->
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
	
	.content_layout{
		margin-top:50px;
		height:615px;
	}
	
	.content_layout a{
		text-decoration: none;
		color: black;
	}
	
	.content_layout a div:hover{
		background-color: #F2F2F2;
	}
	
	.content_layout a div:active{
		background-color: #D6D6D6;
	}
	
	.content_title{
		width: 85%;
		background-color:#F9F9F9;
		color:#606060;
		display: grid;
		grid-template-columns: 0.6fr 1fr 1fr 1fr;
		position: fixed;
	}
	
	.title_course{
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 18px;
	}
	
	.title_price{
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 18px;
	}
	
	.title_buyer{
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 18px;
	}
	
	.title_total{
		display: grid;
		justify-content: center;
		align-items: center;
		padding:10px;
		text-transform: uppercase;
		font-size: 18px;
	}
	
	.content{
		margin: auto;
		margin-top: 10px;
		width: 100%;
		background-color:#fff;
		display: grid;
		grid-template-columns: 0.6fr 1fr 1fr 1fr;
	}
	
	.course{
		padding: 10px;
		display: grid;
		justify-content: center;
		align-items: center;
	}
	
	.numunits{
		font-size: 20px;
		padding: 10px;
		display: grid;
		justify-content: center;
		align-items: center;
	}
	
	.numbuyers{
		font-size: 20px;
		padding: 10px;
		display: grid;
		justify-content: center;
		align-items: center;
	}
	
	.numtotal{
		font-size: 20px;
		padding: 10px;
		display: grid;
		justify-content: center;
		align-items: center;
		color:#6EAF0F;
		font-weight:bold;
	}
	
	.bottom_bar{
		position: fixed;
		bottom:0;
		background-color:#fff;
		width:85%;
		height:10%;
		display: grid;
		grid-template-columns: 1fr 0.2fr 1fr 0.2fr 1fr 0.5fr 0.8fr;
		border-top: 2px solid #FF5A5F ;
	}
	
	.bottom_barProfit{
		display: grid;
		justify-content:center;
		align-items:center;
	}
	
	.bottom_barWithdraw{
		display: grid;
		justify-content:center;
		align-items:center;
	}
	
	.bottom_barBalance{
		display: grid;
		justify-content:center;
		align-items:center;
	}
	
	.bottom_barM{
		display: grid;
		justify-content:center;
		align-items:center;
		color:#606060;
	}
	
	.bottom_barE{
		display: grid;
		justify-content:center;
		align-items:center;
		color:#606060;
	}
	
	.bottom_barProfitT{
		display: grid;
		justify-content:center;
		font-size:20px;
		margin-top:15px;
	}
	
	.bottom_barProfitB{
		display: grid;
		justify-content:center;
		text-transform:uppercase;
		color:#606060;
		margin-bottom:15px;
	}
	
	.bottom_barH{
		display:grid;
		align-items:center;
		justify-content:center;
		background-color:#F2F2F2;
		border-left:1px solid #D3D3D3;
	}
	
	.bottom_barH a i{
		display:grid;
		justify-content:center;
		margin-top:10px;
	}
	
	.bottom_barH a{
		text-decoration:none;
	}
	
	
	.bottom_barHTitle{
		display:grid;
		align-items:center;
		justify-content:center;
		margin-bottom:10px;
		color:#606060;
		text-transform:uppercase;
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
		
		<div class="content_title">
			<div class="title_course">
				course
			</div>
			<div class="title_price">
				price (RM)
			</div>
			<div class="title_buyer">
				number of learners
			</div>
			<div class="title_total">
				total profit (RM)
			</div>
		</div>
		<div class="content_layout">
				<?php
					$course = "Select * from course where educator_id = '$eid'";
					$result_course = mysqli_query($connect,$course);
					$row_course = mysqli_fetch_array($result_course);
					$result = mysqli_query($connect,"SELECT course_image FROM course where educator_id = '$eid'");
					$count = mysqli_num_rows($result);
					$total = 0;
					if($count != 0)
					{
						$tprice = 0;
						do
						{
						?>
							<a href="#each content">
								<div class="content">
								
									<div class="course">
										<?php
											$image = $row_course['course_image'];
											$image_src = "educator_video_image/".$image;
											echo "<img width='100px' height='67px' src='".$image_src ."'>";
										?>
									</div>
									
									<div class="numunits">
										<?php echo $row_course["course_price"];?>
									</div>
									
									<div class="numbuyers">
										<?php
											$price = 0;
											$count = mysqli_query($connect,"SELECT course_id FROM purchasing_new where course_id = '$row_course[course_id]'");
											$count_result = mysqli_num_rows($count);
											
											$count_pur = mysqli_query($connect,"SELECT SUM(amount) as total FROM purchasing_new where course_id = '$row_course[course_id]'");
											$count_result_pur = mysqli_fetch_array($count_pur);
											$price = $count_result * $row_course["course_price"];
											$tprice = $tprice + $price;
											echo $count_result
										?>
									</div>
									
									<div class="numtotal">
										<?php echo $count_result_pur['total'] * 0.8?>
									</div>
									
								</div>
							</a>
						<?php
							$total = $total + ($count_result_pur['total'] * 0.8);
						}while($row_course = mysqli_fetch_array($result_course));
						$wallet = mysqli_query($connect,"SELECT * FROM wallet where educator_id = '$row[educator_id]'");
						$row_wallet= mysqli_fetch_assoc($wallet);
						?>
						<div class="bottom_bar">
							<div class="bottom_barProfit">
								<div class="bottom_barProfitT">
									RM <?php echo $total;?>
								</div>
								<div class="bottom_barProfitB">
									profit 
								</div>
							</div>
							
							<div class="bottom_barM" style="font-size: 40px;">
								-
							</div>
							<?php
								$withdraw = mysqli_query($connect,"SELECT SUM(withdrawal_amount) as amount FROM withdrawal where wallet_id = '$row_wallet[wallet_id]'");
								$row_withdraw= mysqli_fetch_assoc($withdraw);
							?>
							<div class="bottom_barWithdraw">
								<div class="bottom_barProfitT">
									RM <?php echo $row_withdraw["amount"];?>
								</div>
								<div class="bottom_barProfitB">
									withdrawal 
								</div>
							</div>
							
							<div class="bottom_barE" style="font-size: 30px;">
								=
							</div>
					

							<div class="bottom_barBalance">
								<div class="bottom_barProfitT">
									RM <?php echo $row_wallet["balance"];?>
								</div>
								<div class="bottom_barProfitB">
									balance 
								</div>
							</div>
							
							<div class="bottom_barH">
								<a href="History.php?buy&id= <?php echo $row_wallet['wallet_id']?>"><i class="fa fa-history" aria-hidden="true" style="color:#FF7478; font-size:30px;"></i></a>
								<div class="bottom_barHTitle">
									History
								</div>
							</div>
							<div class="bottom_barH">
								<a href="Withdrawal.php?buy&id= <?php echo $row_wallet['wallet_id']?>"><i class="fa fa-upload" style='color:#FF7478; font-size:30px'></i></a>
								<div class="bottom_barHTitle">
									Withdrawal
								</div>
							</div>
						</div>
						<?php
					}
					else
					{
						?>
						<div class="bottom_bar">
							<div class="wallet">
								Wallet : RM -
							</div>
							<a href="#withdraw form">
								<div class="withdraw">
									withdraw money
								</div>
							</a>
						</div>
						<?php
					}
				?>	
			
		</div>	
		
	</div>
	
</body>
</html>
















