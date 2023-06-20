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
<title>Admin Educator profile details</title>
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
	
	
	.contentaddd{
		display:grid;
		grid-template-columns: 1fr;
		grid-template-rows: auto auto auto;
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
	
	.content{
		display:grid;
		grid-template-columns: 1fr 2fr;
		grid-template-rows: auto;
		grid-template-areas: "pic det";
		grid-gap:20px;
		margin: auto;
		margin-top:1em;
		width: 95%;
		padding:20px;
	}
	
	.contentLeftDetails{
		display:grid;
		grid-template-columns: 1fr;
		grid-template-rows: auto;
	}
	
	.contentLeftDetailsPic{
		display:grid;
		justify-content:center;
		align-items:center;
	}
	
	.contentLeftDetailsBioTitle{
		padding:10px;
		font-size:20px;;
		color:#D6D6D6;
	}
	
	.contentLeftDetailsBioContent{
		padding:10px;
	}
	
	.contentRightName{
		padding-top:10px;
		padding-right:10px;
		padding-left:10px;
		padding-bottom:2px;
		font-size:22px;
	}
	
	.contentRightJob{
		padding-bottom:10px;
		padding-right:10px;
		padding-left:10px;
		font-size:15px;
		color:#FF7478 ;
	}
	
	.contentRightNumRating{
		padding-top:10px;
		padding-right:10px;
		padding-left:10px;
		padding-bottom:2px;
		font-size:22px;
	}
	
	.contentRightTitleRating{
		padding-bottom:10px;
		padding-right:10px;
		padding-left:10px;
		font-size:15px;
		color:#FF7478 ;
	}
	
	.contentRightDetails{
		display:grid;
		margin-top:10px;
		grid-template-columns: auto;
		grid-template-rows: auto;
		padding:10px;
		font-size:20px;
		color:#D6D6D6 ;
	}
	
	
	.aboutgrid{
		display:grid;
		grid-template-columns: 1fr 4fr;
		grid-template-rows: auto;
	}
	
	
	.aboutgridEmail{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		color:#FF7478;
	}
	
	.aboutgridEmailContent{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
	}
	
	.aboutgridContact{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		color:#FF7478;
	}
	
	.aboutgridContactContent{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
	}	
	
	.aboutgridEdu{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		color:#FF7478;
	}
	
	.aboutgridEduContent{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
	}
	
	.aboutgridWork{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		color:#FF7478;
	}
	
	.aboutgridWorkContent{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
	}
	
	.aboutgridCert{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		color:#FF7478;
	}
	
	.aboutgridCertContent{
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
	}
	
	#userSelection{
		padding-right:10px;
		padding-top:10px;
		padding-bottom:10px;
	}
	
	.content2{
		margin: auto;
		margin-top:1em;
		width: 95%;
		padding-right:20px;
		padding-bottom:20px;
		padding-left:20px;
		margin-top:-20px;
	}
	
	.content2Title{
		padding:10px;
		font-size:20px;
		color:#D6D6D6;
		margin-bottom:10px;
	}
	
	.content2Box{
		display:grid;
		grid-template-columns:1fr 1fr;
		grid-gap:20px;
	}
	
	.content2BoxLayout{
		display:grid;
		grid-template-columns:1fr 2fr;
		grid-template-areas: "coursePic courseName" "coursePic courseAuthor";
		background-color:#fff;
		padding:15px;
		border-radius:12px;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
	}
	
	.content2BoxLayoutPic{
		grid-area:coursePic;
	}
	
	.content2BoxLayoutName{
		grid-area:courseName;
		font-size:20px;
		display:grid;
		justify-content:flex-start;
		align-items:center;
		color:black;
	}
	
	.content2BoxLayoutAuthor{
		grid-area:courseAuthor;
		font-size:16px;
		display:grid;
		justify-content:flex-end;
		align-items:flex-end;
		color:black;
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
			$result_profile = mysqli_query($connect, "SELECT * FROM admin WHERE admin_id = '$id'");
			$row_profile = mysqli_fetch_assoc($result_profile);
		}
	?>
	
	
	<div class="main">
		<div class="title">
			<div class="title_title">
				Admin Profile Details
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
		<div class="contentaddd">
			<div class="contentAdd">
				<div class="contentAddBlank">	
				</div>
				<a href="adminAdminProfile.php">
					<div class="contentAddNew">
						<i class="fa fa-arrow-left" aria-hidden="true"></i>Back
					</div>
				</a>
				<div class="contentAddBlank">	
				</div>
			</div>
			<div class="contentDetails">
				
			</div>
		</div>
		<div class="content">
			<div class="contentLeft">
				<div class="contentLeftDetails">
					<div class="contentLeftDetailsPic">
						<?php
							$image = $row['image_admin'];
							$image_src = "admin_profile_image/".$image;
							$result = mysqli_query($connect,"SELECT * FROM admin where image_admin = '$image'");
							$count = mysqli_num_rows($result);
							if($count != 0)
							{
								echo "<img width='200px' height='200px' src='".$image_src ."'>";
							}
							else
							{
							?>
								<img src="src/profilepic.png" width="200px" height="200px"/>
							<?php
							}
						?>
					</div>
					
				</div>
			</div>
			<div class="contentRight">
				<div class="contentRightName">
					<?php echo $row_profile["admin_name"];?>
				</div>

				<div class="contentRightDetails">
					<div class="contentRightDetailsAbout">
						About
					</div>
				</div>
				<div id="userSelection">
					
					<div class="aboutgrid">
						<div class="aboutgridEmail">
							Email
						</div>
						<div class="aboutgridEmailContent">
							<?php echo $row_profile["admin_email"];?>
						</div>
						<div class="aboutgridContact">
							Contact
						</div>
						<div class="aboutgridContactContent">
							<?php echo $row_profile["admin_phone_number"];?>
						</div>
						
						
					</div>
					
				</div>
			</div>
		</div>
		<div class="EditButton" style="padding-bottom: 30px;">
			<div class="EditLeftBlank">
			</div>
			<a href="adminEditAdminSpecific.php?buy&id= <?php echo $row_profile['admin_id']?>">
				<div class="goToEdit">Edit</div>
			</a>
		</div>
	</div>
	
</body>

</html>












