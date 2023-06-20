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
<title>Admin Add Category</title>
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
	
	.contentDetailsArrange{
		display:grid;
		grid-template-columns: 0.7fr 2fr 0.7fr 2fr;
		grid-template-rows: auto;
	}
	
	.contentDetailsArrange2{
		display:grid;
		grid-template-columns: 7fr 1fr;
		grid-template-rows: auto;
		margin-top:10px;
	}
	
	.contentDetailsArrange2Button{
		display:grid;
		grid-template-columns: auto auto;
		grid-template-rows: auto;
	}
	
	.contentDetails{
		padding:20px;
		color:#D3D3D3;
	}
	
	.contentDetailsArrange div{
		padding:10px;
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.contentDetailsArrange div input{
		padding:5px;
	}
	
	.contentDetailsArrange div select{
		padding:5px;
	}
	
	.contentDetailsArrange2Button div input{
		padding:10px;
		cursor:pointer;
	}
	
	.contentDetailsArrange2ButtonReset input{
		background-color:#FF7478;
		border:2px solid #FF7478;
		color:#fff;
		border-radius:5px;
	}
	
	.contentDetailsArrange2ButtonReset input:hover{
		background-color:#FF5A5F ;
		border:2px solid #FF5A5F ;
		color:#fff;
	}
	
	.contentDetailsArrange2ButtonReset input:active{
		background-color:#ff4146 ;
		border:2px solid #ff4146 ;
		color:#fff;
		outline:none;
	}
	
	.contentDetailsArrange2ButtonReset input:focus{
		outline:none;
	}
	
	.contentDetailsArrange2ButtonSubmit input{
		background-color:#0084ff;
		border:2px solid #0084ff;
		color:#fff;
		border-radius:5px;
		margin-left:10px;
	}
	
	.contentDetailsArrange2ButtonSubmit input:hover{
		background-color:#007BFF;
		border:2px solid #007BFF;
		color:#fff;
	}
	
	.contentDetailsArrange2ButtonSubmit input:active{
		background-color:#006aff;
		border:2px solid #006aff;
		color:#fff;
		outline:none;
	}
	
	.contentDetailsArrange div{
		display:grid;
		grid-template-columns:auto auto;
	}
	
	.contentDetailsArrange div i{
		padding-right:10px;
		color:#F5DEB3;
	}
	/*---------------------------------------Input CSS---------------------------------*/
	.contentDetailsArrange div input{
		padding:10px;
		border:3px #0084ff  solid;
		border-radius:50px;
		outline:none;
	}
	
	.contentDetailsArrange div input:hover{
		border:3px #007BFF  solid;
	}
	
	.contentDetailsArrange div input:focus{
		border:3px #006aff  solid;
	}
	/*---------------------------------------Input CSS---------------------------------*/
	
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
				Adding New Category
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
				<a href="adminManageCategory.php">
					<div class="contentAddNew">
						<i class="fa fa-arrow-left" aria-hidden="true"></i>Back
					</div>
				</a>
				<div class="contentAddBlank">	
				</div>
			</div>
			<div class="contentDetails">
				<form name="edudetail" method="POST">
					<div class="contentDetailsArrange">
						<div>
							<i class="fa fa-fw fa-list-alt"></i>Category
						</div>
						<div>
							<input type="text" name="name" size="40" required/>
						</div>
					</div>
					
			</div>
			
			<div>	
					<div class="contentDetailsArrange2">
						
						<div class="contentDetailsArrange2Blank">
						</div>
						
						<div class="contentDetailsArrange2Button">
							<div class="contentDetailsArrange2ButtonReset">
								<input type="reset" name="sub" value="Reset" />
							</div>
							<div class="contentDetailsArrange2ButtonSubmit">
								<input type="submit" name="submit" value="Save Category" />
							</div>
						</div>
						
					</div>
				</form>
			</div>
		</div>
		
	</div>
<?php
if(isset($_POST["submit"])) 	
{
	$name = $_POST["name"];
	$cate= mysqli_query($connect, "SELECT category_id from category where category_name = '$name'");
	$row_cate= mysqli_num_rows($cate);
	if($row_cate != 0)
	{
			?>
			<script>
				swal(
                {
                    title: "Oh No!",
                    text: "This category already exits!",
                    icon: "warning",
                    button: "Continue"
                });
			</script>
			<?php
	}
	else
	{
		mysqli_query($connect,"INSERT INTO category(category_name)
		VALUES('$name')");
					?>
				<script>
					swal(
					{
						title: "Nice!",
						text: "Add Successfully!",
						icon: "success",
						button: "Continue"
					});
				</script>
				<?php
	}
}
?>
</body>

</html>












