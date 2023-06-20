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
<title>Admin Add Admin profile</title>
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
		padding-left:10px;
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
		padding-left:10px;
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
		justify-content:flex-start;
		align-items:flex-start;
		padding-bottom:10px;
		padding-left:10px;
		font-size:14px;
		color:#D3D3D3;
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
	
	
	
	
	.contentAdd a{
		text-decoration:none;
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
				<a href="adminAnnouncementHomepage.php">
					<div class="contentAddNew">
						<i class="fa fa-arrow-left" aria-hidden="true"></i>Back
					</div>
				</a>
				<div class="contentAddBlank">	
				</div>
			</div>
			
			
			<div class="contentTo">
				<div>
					To
				</div>
				<div>
					<form name="add annoucment" method="POST">
						<select name = "ann" style="font-size:15px; padding:5px;" required>
							<option value="all">All</option>
							<option value="edu">Educator</option>
							<option value="lea">Learner</option>
						</select>
					
				</div>
			</div>
			
			<div class="content_topnav">
				<div class="content_topnavDetails">
					Title
				</div>
				<div class="content_topnavDetails">
					<input type="text" name="title" size="40" required />
				</div>
				<div class="content_topnavDetails">
					Date
				</div>
				<div class="content_topnavDetails">
					<input type="text" name="" size="40" value="Now" disabled />
				</div>
			</div>
			
			<div class="contentPersonal">
				<div class="contentPersonalProfile">
					<div class="contentPersonalProfileImg"> 
						<img src="src/profilepic.png" alt="default profile picture" width="50px" height="50px">
					</div>
					<div class="contentPersonalProfileName">
						<?php echo $row["admin_name"];?>
					</div>
					<div class="contentPersonalProfileId">
						Admin <?php echo $row["admin_id"];?>
					</div>
				</div>
				<div class="contentPersonalText">
					<textarea name="con" rows="20" cols="120" style="padding:10px; width:98%;" placeholder="Type your content here..."></textarea></
				</div>
				<div class="contentPersonalButton">
						<div>
						</div>
						<div class="contentPersonalButtonReset">
							<input type="reset" name="sub" value="Reset" />
						</div>
						<div class="contentPersonalButtonSubmit">
							<input type="submit" name="submit" value="Save" />
						</div>
					</form>
				</div>
			</div>
		</div>
		
	</div>
<?php
if(isset($_POST["submit"])) 
{
	$title = $_POST["title"];
	$for = $_POST["ann"];
	$content = $_POST["con"];
	$insert = mysqli_query($connect,"INSERT INTO website_announcement(announcement_content,admin_id,announcement_title,forwho)VALUES('$content','$row[admin_id]','$title','$for')");
	?>
	<script>
		swal(
					{
						title: "Congratulations!",
						text: "Announcement has been posted!",
						icon: "success",
						button: "Continue"
					}
					).then(function()
					{
						window.location.href = "adminAnnouncementHomepage.php";
					});
	</script>
	<?php
}
?>	
</body>

</html>












