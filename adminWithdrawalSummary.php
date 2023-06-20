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
<title>Withdrawal Summary</title>
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
	
	
	.contentEduTitle{
		font-size:20px;
		color:#D6D6D6;
		border-bottom:3px #0084ff solid;
		padding-bottom:5px;
		width:170px;

	}
	
	.contentEduTitleSubtitle{
		display:grid;
		grid-gap:50px;
		grid-template-columns:1fr 8fr 2fr;
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
		grid-template-columns:10fr 2fr;
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
				Withdrawal Summary
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
			<div class="contentEdu">
				<div class="contentEduTitle">
					Withdrawal Report
				</div>
				<div class="contentEduTitleSubtitle">
					<div>
						Educator ID
					</div>
					<div>
						Educator Name
					</div>
					<div class="contentEduTitleSubtitleSymbol">
						Total approved funds
					</div>
				</div>
				<?php
					$edu= mysqli_query($connect, "SELECT * from educator ");
					$row_edu= mysqli_fetch_assoc($edu);
					do
					{
						$wallet= mysqli_query($connect, "SELECT * from wallet where educator_id = '$row_edu[educator_id]'");
						$row_wallet= mysqli_fetch_assoc($wallet);
						$with= mysqli_query($connect, "SELECT SUM(withdrawal_amount) as total from withdrawal where wallet_id = '$row_wallet[wallet_id]'");
						$row_with= mysqli_fetch_assoc($with);
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
							<?php
							if($row_with["total"] != 0)
							{
							?>
								<div class="contentEduTitleContentNumber">
									<?php echo $row_with["total"];?>
								</div>
							<?php
							}
							else
							{
							?>
								<div class="contentEduTitleContentNumber">
									<?php echo 0;?>
								</div>
							<?php
							}
							?>
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












