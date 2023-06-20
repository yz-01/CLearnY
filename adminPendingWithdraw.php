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
<title>Admin Pending Withdrawal</title>
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
		padding-right:20px;
		padding-left:20px;
		box-sizing: border-box;
	}

	
	.contentTitle{
		display:grid;
		grid-template-columns: 0.2fr 1.5fr 0.6fr 0.6fr 0.5fr 0.5fr 0.3fr 0.3fr;
		color:#D3D3D3;
		font-weight: bold;
		margin-top:10px;
		padding:10px;
	}
	
	.contentTitle div{
		display:grid;
		justify-content:flex-start;
	}
	
	.contentDetails{
		display:grid;
		grid-template-columns: 0.2fr 1.5fr 0.6fr 0.6fr 0.5fr 0.5fr 0.3fr 0.3fr;
		
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
		grid-template-columns: 1fr;
		width:50px;
		float:right;
		margin-top:10px;
	}

	.contentDetailsMess{
		display:grid;
	}
	
	.contentDetailsMess a{
		text-decoration:none;
	}
	
	.contentDetailsMess a i{
		font-size:30px;
		color:#FF7478 ;
		display:grid;
		justify-content:center;
	}
	
	.contentDetailsMess a i:hover{
		font-size:31px;
		color:#FF5A5F  ;
	}
	
	.contentDetailsMess a i:active{
		font-size:29px;
		color:#ff4146  ;
	}
	
	.contentDetailsArrange2{
		display:grid;
		grid-template-columns: 12fr 1fr;
		grid-template-rows: auto;
		margin-top:10px;
	}
	
	.contentDetailsArrange2Button div input{
		padding:10px;
		cursor:pointer;
	}
	
	.contentDetailsArrange2ButtonSubmit input{
		background-color:#0084ff;
		border:2px solid #0084ff;
		color:#fff;
		border-radius:5px;
		margin-left:10px;
		outline:none;
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

	.contentDetailsArrange2Report{
		padding:10px;
		padding-left:20px;
	}
	
	.contentDetailsArrange2ReportButton{
		padding:10px;
		padding-left:20px;
		padding-right:20px;
		border:none;
		outline:none;
		border-radius:5px;
		background-color:transparent;
		color:#FF7478 ;
		border:2px #FF7478 solid;
		cursor:pointer;
		font-size:16px;
	}
	
	.contentDetailsArrange2ReportButton:hover{
		color:#FF5A5F  ;
		border:3px #FF5A5F  solid;
	}
	
	.contentDetailsArrange2ReportButton:active{
		color:#ff4146   ;
		border:2px #ff4146   solid;
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
				Pending Withdrawal
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
		<form name="pending" method="POST">
			<div class="contentDetailsArrange2">
						
						<div class="contentDetailsArrange2Report">
								<button class="contentDetailsArrange2ReportButton">
									<a href="adminWithdrawalSummary.php" style="text-decoration:none; color: #FF7478;">
										Withdrawal Report
									</a>
								</button>
						</div>
						
						<div class="contentDetailsArrange2Button">
							<div class="contentDetailsArrange2ButtonSubmit">
								<input type="submit" name="sub" value="Save" />
							</div>
						</div>
						
					</div>

		
		<div class="content">
			<div class="contentTitle">
				<div>
					ID
				</div>
				<div>
					Educator Name
				</div>
				<div>
					Bank
				</div>
				<div>
					Amount (RM)
				</div>
				<div>
					Date
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
				$with= mysqli_query($connect, "SELECT * from withdrawal where withdrawal_status = 'Pending'");
				$row_with= mysqli_fetch_assoc($with);
				$row_with_count= mysqli_num_rows($with);
				if($row_with_count != 0)
				{
					$i = 1;
					$k=100;
					do
					{
						$wallet= mysqli_query($connect, "SELECT * from wallet where wallet_id = '$row_with[wallet_id]'");
						$row_wallet= mysqli_fetch_assoc($wallet);
						$edu= mysqli_query($connect, "SELECT * from educator where educator_id = '$row_wallet[educator_id]'");
						$row_edu= mysqli_fetch_assoc($edu);
						?>
						<div class="contentDetails">
							<div>
								<?php echo $i;?>
							</div>
							
							<div>
								<div class="contentDetailsProName"><?php echo $row_edu["educator_name"];?></div>
							</div>
							
							<div>
								<?php echo $row_with["withdrawal_bank"];?>
							</div>
							
							<div>
								<?php echo $row_with["withdrawal_amount"];?>
							</div>
							
							<div>
								<?php echo $row_with["date"];?>
							</div>
							
							<div>
								<select name = "<?php echo $k;?>" style="width: 90px; border:none; font-size:15px; outline:none;" required>
									<option value="Pending">Pending</option>
									<option value="Approved">Approved</option>
								</select>
							</div>
							
							<div class="contentDetailsMess">
								<a href="adminEduProfileDetails.php?buy&id= <?php echo $row_edu['educator_id']?>">
									<i class="fa fa-id-card" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					<?php
						$k++;
						$i++;
					}while($row_with= mysqli_fetch_assoc($with));
				}
				else
				{
				}
			?>
			
			
			
			</form >
			
			<!--  loop div class="contentDetails" -->
			
			
			
		</div>
		
	</div>
<?php
if(isset($_POST["sub"]))
{
	$with= mysqli_query($connect, "SELECT * from withdrawal where withdrawal_status = 'Pending'");
	$row_with= mysqli_fetch_assoc($with);
	$k=100;
	do
	{
		$sta = $_POST[$k];
		$wallet= mysqli_query($connect, "SELECT * from wallet where wallet_id = '$row_with[wallet_id]'");
		$row_wallet= mysqli_fetch_assoc($wallet);
		$edu= mysqli_query($connect, "SELECT * from educator where educator_id = '$row_wallet[educator_id]'");
		$row_edu= mysqli_fetch_assoc($edu);
		
		mysqli_query($connect,"UPDATE withdrawal SET withdrawal_status='$sta' where withdrawal_id='$row_with[withdrawal_id]'");
		$k++;
	}while($row_with= mysqli_fetch_assoc($with));
	?>
	<script>
		swal(
					{
						title: "Congratulations!",
						text: "Withdraw status updated!",
						icon: "success",
						button: "Continue"
					}
					).then(function()
					{
						window.location.href = "adminWithdrawalSummary.php";
					});
	</script>
	<?php
}
?>
</body>

</html>












