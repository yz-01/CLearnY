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
<title>Withdrawal History</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
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
		color:#FF5A5F ;
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
	
	.content{
		padding:20px;
	}
	
	.historyTItle{
		color:#606060;
		font-size:25px;
	}
	
	.historyDetails{
		background-color:#fff;
		border-radius:12px;
		padding:15px;
		display:grid;
		grid-template-columns:4fr 4fr 4fr 3fr 10fr;
		margin-bottom:5px;
	}
	
	.historyDetailsID{
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.historyDetailsBank{
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.historyDetailsAccBank{
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.historyDetailsAmount{
		display:grid;
		justify-content:flex-end;
		align-items:center;
	}
	
	
	
	
	.historyDetailsTitle{
		padding:15px;
		display:grid;
		grid-template-columns:4fr 4fr 4fr 3fr 10fr;
		color:#606060;
		font-size:18px;
	}
	
	.historyDetailsTitleID{
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.historyDetailsTitleBank{
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.historyDetailsTitleAccBank{
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.historyDetailsTitleStatus{
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.historyDetailsTitleAmount{
		display:grid;
		justify-content:flex-end;
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
			$result_wallet = mysqli_query($connect, "SELECT * FROM wallet WHERE wallet_id = '$id'");
			$row_wallet = mysqli_fetch_assoc($result_wallet);
		}
	?>
	<div class="main">
		
		<div class="content">
			<div class="contentAdd">
				<div class='historyTItle'>
					<i class="fa fa-history" aria-hidden="true" style="margin-right:10px; color:#FF7478 ;"></i>History
				</div>
				<a href="educator wallet.php">
					<div class="contentAddNew">
						<i class="fa fa-arrow-left" aria-hidden="true"></i>Back
					</div>
				</a>
				<div class="contentAddBlank">	
				</div>
			</div>
			<div style="height:20px;">
			</div>
			
			<div class="historyDetailsTitle">
				<div class="historyDetailsTitleID">
					Account ID
				</div>
				<div class="historyDetailsTitleBank">
					Bank
				</div>
				<div class="historyDetailsTitleAccBank">
					Account Bank
				</div>
				<div class="historyDetailsTitleStatus">
					Status
				</div>
				<div class="historyDetailsTitleAmount">
					Withdrawal amount(RM)
				</div>
			</div>
			<!--start-->
			<?php
				$result_withdrawal = mysqli_query($connect, "SELECT * FROM withdrawal WHERE wallet_id = '$id'");
				$row_withdrawal = mysqli_fetch_assoc($result_withdrawal);
				$with = mysqli_query($connect, "SELECT withdrawal_id FROM withdrawal WHERE wallet_id = '$id'");
				$count_with = mysqli_fetch_assoc($with);
				if($count_with != 0)
				{
					$i = 1;
					do
					{
					?>
						<div class="historyDetails">
							<div class="historyDetailsID">
								<?php echo $i;?>
							</div>
							<div class="historyDetailsBank">
								<?php echo $row_withdrawal["withdrawal_bank"];?>
							</div>
							<div class="historyDetailsAccBank">
								<?php echo $row_withdrawal["account"];?>
							</div>
							<div class="historyDetailsAccBank">
								<?php echo $row_withdrawal["withdrawal_status"];?>
							</div>
							<div class="historyDetailsAmount">
								<?php echo $row_withdrawal["withdrawal_amount"];?>
							</div>
						</div>
					<?php
						$i++;
					}while($row_withdrawal = mysqli_fetch_assoc($result_withdrawal));
				}
				else
				{
				}
			?>
			<!--end-->


			
		</div>	

	</div>
	
</body>
</html>
















