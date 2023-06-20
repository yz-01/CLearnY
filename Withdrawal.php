<?php 
session_start();
include("dataconnection.php");

$eid= $_SESSION['eid'];
$ename= $_SESSION['ename'];
$epass= $_SESSION["epass"];
$ephone= $_SESSION["ephone"];
$eemail= $_SESSION["eemail"];
$result= mysqli_query($connect, "SELECT * from educator where educator_email = '$eemail'");

$row= mysqli_fetch_assoc($result);
?>
<html>
<title>Withdrawal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
	
	.content{
		padding:20px;
	}
	
	.contentTitle{
		background-color:#ff4146 ;
		color:#fff;
		margin:auto;
		width:25%;
		border-radius:12px;
		padding:20px;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
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
	
	.contentTo{
		margin-top:10px;
		display:grid;
		grid-template-columns: 0.5fr 4fr;
		padding-left:10px;
	}
	
	.contentTo div{
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.inputHere{
		border:none;
		border-bottom:1px solid #606060;
		padding-top:10px;
		padding-bottom:10px;
		background-color:transparent;
	}
	
	.inputHere:active, .inputHere:focus{
		outline:none;
		border-bottom:2px solid #606060;
	}
	
	.contentAcc{
		margin-top:30px;
		padding-left:10px;
	}
	
	.Box{
		background-color:#fff;
		margin:auto;
		width:25%;
		margin-top:10px;
		border-radius:20px;
		padding:20px;
		padding-bottom:40px;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
	}
	
	.contentBlockRightButton{
		margin-top:20px;
		display:grid;
		grid-template-columns: 10fr 0.5fr 0.5fr 7fr;
	}
	
	.contentBlockRightButton input{
		padding:10px;
		padding-left:20px;
		padding-right:20px;
		cursor:pointer;
	}
	
	.contentBlockRightButtonReset{
		background-color:#F9F9F9;
		border:none;
	}
	
	.contentBlockRightButtonSubmit{
		background-color:#FF7478;
		color:#fff;
		border-radius:5px;
		border:none;
	}
	
	.contentBlockRightButtonReset:active, .contentBlockRightButtonReset:focus{
		outline:none;
		
	}
	
	.contentBlockRightButtonSubmit:hover{
		background-color:#FF5A5F ;
		outline:none;
	}
	
	.contentBlockRightButtonSubmit:active{
		background-color:#ff4146 ;
		outline:none;
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
				<div class="contentAddBlank">	
				</div>
				<a href="educator wallet.php">
					<div class="contentAddNew">
						<i class="fa fa-arrow-left" aria-hidden="true" style="margin-right:10px; color:#FF7478 ;"></i>Back
					</div>
				</a>
				<div class="contentAddBlank">	
				</div>
			</div>
			<div class="contentTitle">
				Withdrawal
			</div>
			<div class="Box">
				<div style=" font-size:16px; color:#fff ; background-color:#606060; padding:10px; border-radius:50px; text-align:center;">
				 Account Balance: RM <?php echo $row_wallet["balance"];?>
				</div>
				<div class="contentTo">
					<div>
						To
					</div>
					<div>
						<form name="withdrawal" method="POST">
							<select name = "bank" style="font-size:15px; padding:5px;" required>
								<option value="Maybank">Maybank Bank</option>
								<option value="PublicBank">Public Bank</option>
								<option value="AllianceBank">Alliance Bank</option>
								<option value="CimbBank">Cimb Bank</option>
								<option value="HongLeongBank">Hong Leong Bank</option>
							</select>
						
					</div>
				</div>
				
				<div class="contentAcc">
					<div style="font-size:16px;">
						Account Name
					</div>
					<div>
						<input class="inputHere" type="text" size="36" required>
					</div>
					<div style="margin-top:30px; font-size:16px;">
						Account Number
					</div>
					<div>
						<input class="inputHere" name="account" type="text" size="36" required>
					</div>
					<div style="margin-top:30px; font-size:16px;">
						Amount (RM)
					</div>
					<div>
						<input class="inputHere" name="withdrawal" type="text" size="36" required>
					</div>
				</div>
			</div>
			
			<div class="contentBlockRightButton">
				<div></div>
				<input class="contentBlockRightButtonReset" type="reset" name="re" value="Delete"/>
				<input class="contentBlockRightButtonSubmit" type="submit" name="sub" value="Submit"/>
				<div></div>
			</div>	
		</form>
			
		</div>

	</div>
<?php
if(isset($_POST["sub"])) 	
{
	$withdrawal = $_POST["withdrawal"];
	$bank = $_POST["bank"];
	$account = $_POST["account"];
	$amount = 0;
	
	$find = mysqli_query($connect,"Select * from wallet where wallet_id = '$id'");
	$row_wallet = mysqli_fetch_assoc($find);
	if($withdrawal > $row_wallet["balance"])
	{
		?>
			<script>
				swal(
                {
                    title: "Oh No!",
                    text: "Balance not enough!",
                    icon: "warning",
                    button: "Continue"
                }
                ).then(function()
                {
                    window.location.href = "educator homepage.php";
                });
			</script>
		<?php
	}
	else
	{
		$insert = mysqli_query($connect,"INSERT INTO withdrawal(withdrawal_amount, withdrawal_bank, account, wallet_id, withdrawal_status)VALUES('$withdrawal', '$bank', '$account', '$id', 'Pending')");
		$amount = $row_wallet["balance"] - $withdrawal;
		$insert_money = mysqli_query($connect,"UPDATE wallet SET balance='$amount' where wallet_id = '$id'");
				?>
				<script>
					swal(
					{
						title: "Congratulations!",
						text: "Withdrawal Successfully!",
						icon: "success",
						button: "Continue"
					}
					).then(function()
					{
						window.location.href = "educator homepage.php";
					});
				</script>
			<?php
	}
}
?>
</body>
</html>
















