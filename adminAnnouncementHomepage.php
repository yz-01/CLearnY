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
<title>Admin Add Announcement</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
		grid-template-columns: 1fr;
		grid-template-rows: auto auto auto;
		margin:auto;
		width:100%;
		padding:20px;
		box-sizing: border-box;
	}
	
	.contentTo{
		margin-top:10px;
		display:grid;
		grid-template-columns: 0.5fr 10.5fr;
	}
	
	.contentTo div{
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.content_topnav{
		margin-top:20px;
		display:grid;
		grid-template-columns: 0.2fr 2fr 0.2fr 2fr;
		grid-template-rows: auto;
	}
	
	.content_topnav input{
		padding:5px;
	}
	
	.content_topnavDetails{
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
		
	.contentPersonal{
		display:grid;
		grid-template-columns: 1fr;
	}
	
	.contentPersonalProfile{
		display:grid;
		grid-template-columns: 1fr 18fr;
		grid-template-areas: "pic name" "pic id";
		margin-top:20px;
	}
	
	.contentPersonalProfileImg{
		grid-area: pic;
		display:grid;
		justify-content:flex-start:
		align-items:center;
		padding:10px;
	}

	
	.contentPersonalProfileName{
		grid-area: name;
		display:grid;
		justify-content:flex-start:
		align-items:flex-end;
		padding-top:15px;
		padding-left:10px;
	}
	
	.contentPersonalProfileId{
		grid-area: id;
		display:grid;
		justify-content:flex-start:
		align-items:flex-start;
		padding-bottom:10px;
		padding-left:10px;
	}
	
	.contentPersonalText{
		padding:10px;
	}
	
	.contentPersonalButton{
		display:grid;
		grid-template-columns: 15fr 1fr 1fr;
		margin-top:20px;
	}
	

	
	.contentPersonalButtonReset input{
		background-color:#FF7478;
		border:2px solid #FF7478;
		color:#fff;
		border-radius:5px;
		padding:10px;
		cursor:pointer;
	}
	
	.contentPersonalButtonReset input:hover{
		background-color:#FF5A5F ;
		border:2px solid #FF5A5F ;
		color:#fff;
	}
	
	.contentPersonalButtonReset input:active{
		background-color:#ff4146 ;
		border:2px solid #ff4146 ;
		color:#fff;
		outline:none;
	}
	
	
	.contentPersonalButtonReset input:focus{
		outline:none;
	}
	
	
	.contentPersonalButtonSubmit input{
		background-color:#0084ff;
		border:2px solid #0084ff;
		color:#fff;
		border-radius:5px;
		padding:10px;
		cursor:pointer;
	}
	
	.contentPersonalButtonSubmit input:hover{
		background-color:#007BFF;
		border:2px solid #007BFF;
		color:#fff;
	}
	
	.contentPersonalButtonSubmit input:active{
		background-color:#006aff;
		border:2px solid #006aff;
		color:#fff;
		outline:none;
	}
	
	.contentPersonalButtonSubmit input:focus{
		outline:none;
	}
	
	.contentAdd{
		display:grid;
		grid-template-columns: 5fr 1fr 0.05fr;
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
	
	.contentAdd a{
		text-decoration:none;
	}
	
	.contentContent{
		display:grid;
		grid-template-columns: 1fr 3fr;
		grid-template-areas: "pro text" "date text";
		padding:10px;
		margin-bottom:20px;
	}
	
	.contentContent2{
		grid-area: pro;
		display:grid;
		
		justify-content:flex-start;
		align-items:flex-start;
	}
	
	.contentContent3{
		grid-area: text;
		display:grid;
		justify-content:flex-start;
		align-items:flex-start;
		padding:20px;
		background-color:#fff;
		color:black;
		border-radius:8px;
		margin-right:10px;
	}
	
	.contentContent4{
		grid-area: date;
		display:grid;
		justify-content:flex-start;
		align-items:flex-end;
	}
	
	.contentContent4 p{
		background-color:grey;
		padding-top:5px;
		padding-right:10px;
		padding-left:10px;
		padding-bottom:5px;
		display:grid;
		justify-content:center;
		align-items:center;
		border-radius:50px;
	}
	
	.contentContentPro{
		display:grid;
		grid-template-columns: auto auto;
		grid-template-areas: "img name" "img admin";
	}
	
	.contentContentProImg{
		grid-area: img;
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.contentContentProName{
		grid-area: name;
		display:grid;
		justify-content:center;
		align-items:center;
		padding-top:5px;
		padding-right:10px;
		padding-left:10px;
		padding-bottom:5px;
		background-color:#0084ff ;
		border-radius:50px;
		margin-left:20px;
	}
	
	.contentContentProAdmin{
		grid-area: admin;
		display:grid;
		justify-content:center;
		align-items:flex-end;
		margin-top:5px;
		background-color:#FF7478 ;
		border-radius:50px;
		font-size:13px;
		width:auto;
		padding-top:5px;
		padding-right:10px;
		padding-left:10px;
		padding-bottom:5px;
		margin-left:20px;
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
				Admin profile
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
				<div class="contentAddBlank">	
				</div>
				<a href="adminAnnouncement.php">
					<div class="contentAddNew">
						<i class="fa fa-plus-circle" aria-hidden="true"></i>Add announcement
					</div>
				</a>
				<div class="contentAddBlank">	
				</div>
			</div>
			
		</div>	
		<?php
			$announcement = "Select * from website_announcement, admin where website_announcement.admin_id = admin.admin_id";
			$result_announcement = mysqli_query($connect,$announcement);
			$row_announcement = mysqli_fetch_array($result_announcement);	
			do
			{
			?>
				<div class="contentContent">	
						<div class="contentContent2">
							<div class="contentContentPro">
								<div class="contentContentProImg">
									<img src="src/profilepic.png" alt="default profile picture" width="50px" height="50px">
								</div>
								<div class="contentContentProName">
									<?php echo $row_announcement["admin_name"];?>
								</div>
								<div class="contentContentProAdmin">
									Admin <?php echo $row_announcement["admin_id"];?>
								</div>
							</div>
						</div>
						<div class="contentContent3">
							<span>
								<?php echo $row_announcement["announcement_content"];?>
							</span>
						</div>
						<div class="contentContent4">
							<p><?php echo $row_announcement["date_publish"];?></p>
						</div>	
				</div>
				<?php
			}while($row_announcement = mysqli_fetch_array($result_announcement));
			?>
		
		
		
		
		
		
		
		
		
		
	</div>
	
</body>

</html>












