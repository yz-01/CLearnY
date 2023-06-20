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
<title>Admin Courses</title>
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
	
	.contentAdd{
		display:grid;
		grid-template-columns: 5.4fr 1fr 0.03fr;
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
	
	.contentTitle{
		display:grid;
		grid-template-columns: 0.15fr 1.2fr 0.5fr 0.5fr 0.5fr 0.5fr 0.3fr ;
		color:#D3D3D3;
		font-weight: bold;
		padding:10px;
	}
	
	.contentTitle div{
		display:grid;
		justify-content:flex-start;
	}
	
	.contentDetails{
		display:grid;
		grid-template-columns: 0.15fr 1.2fr 0.5fr 0.5fr 0.5fr 0.5fr 0.3fr ;
		grid-template-rows:35px;
		background-color:#fff;
		color:#606060;
		padding:10px;
		padding-top:20px;
		padding-bottom:20px;
		box-sizing: border-box;
		border-radius:10px;
		margin-bottom:10px;
	}

	
	.contentDetailsProName{
		display:grid;
		align-items:center;
	}
	
	.contentDetails div{
		display:grid;
		align-items:center;
		overflow: auto;
	}
	
	.contentDetailsActions{
		display:grid;
		grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
	}
	
	.contentDetailsActions a{
		text-decoration:none;
		display:grid;
		grid-template-columns: 1fr 1fr 1fr;
	}
	
	.contentDetailsActions a i{
		color:#FF7478  ;
		font-size:30px;		
	}
	
	
	
	.contentDetailsActions a i:hover{
		color:#FF5A5F    ;
		font-size:31px;		
	}
	
	.contentDetailsActions a i:active{
		color:#ff4146   ;
		font-size:29px;		
	}
		.OrderHistory{
		padding-bottom:5px;
		display:grid;
		grid-template-columns:10fr 1fr;
	}
	
	.OrderHistory a button{
		padding:10px;
		background-color:#0084ff ;
		color:#fff;
		border:none;
		border-radius:8px;
		cursor:pointer;
	}
	
	.OrderHistory a button:focus{
		outline:none;
		background-color:#007BFF ;
	}
	
	.OrderHistory a button:active{
		outline:none;
		background-color:#006aff ;
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
				Courses
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
					<div class="OrderHistory">
				<div></div>
				<a href="adminOrderHistory.php">
					<button>
						OrderHistory
					</button>
				</a>
			</div>
		<!--
			<div class="contentAdd">
				<div class="contentAddBlank">	
				</div>
				<a href="#add">
					<div class="contentAddNew">
						<i class="fa fa-plus-circle" aria-hidden="true"></i>Add New Educator
					</div>
				</a>
				<div class="contentAddBlank">	
				</div>
			</div>
		-->
			<div class="contentTitle">
				<div>
					Id
				</div>
				<div>
					Course
				</div>
				<div>
					Price(RM)
				</div>
				<div>
					Date
				</div>
				<div>
					Educator ID
				</div>
				<div>
					Status
				</div>
				<div>
					Actions
				</div>
				<div>
					
				</div>
			</div>
			<?php
				$course = "Select * from course";
				$result_course = mysqli_query($connect,$course);
				$row_course = mysqli_fetch_array($result_course);	
				$result = mysqli_query($connect,"SELECT learner_id FROM learner");
				$count = mysqli_num_rows($result);
				do
				{
					?>
					<div class="contentDetails">
						<div>
							<?php echo $row_course["course_id"];?>
						</div>
						
						<div class="contentDetailsPro">
							<?php echo $row_course["course_name"];?>
						</div>
						
						<div>
							<?php echo $row_course["course_price"];?>
						</div>
						
						<div>
							<?php echo $row_course["date"];?> 
						</div>
						
						<div>
							<?php echo $row_course["educator_id"];?>
						</div>
						
						<div>
							<?php echo $row_course["state"];?>
						</div>
						
						<div  class="contentDetailsActions">
					
							<a href="adminVideoDetails.php?buy&id= <?php echo $row_course['course_id']?>">
								<i class="fa fa-cog" aria-hidden="true"></i>
							</a>
							
							<div class="contentAddBlank">	
							</div>
							<div class="contentAddBlank">	
							</div>
							
							<div class="contentAddBlank">	
							</div>
							
							
							<div class="contentAddBlank">	
							</div>
						</div>
						
						
					</div>
					<?php
				}while($row_course = mysqli_fetch_array($result_course));
			?>
			
			
			
			<!--  loop div class="contentDetails" -->
			
			
			
		</div>
		
	</div>
</body>

</html>












