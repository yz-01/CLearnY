<?php 
session_start();
include("dataconnection.php");

$lname= $_SESSION['name'];
$lpass= $_SESSION["pass"];
$lphone= $_SESSION["phone"];
$lemail= $_SESSION["email"];
$result= mysqli_query($connect, "SELECT * from learner where learner_email = '$lemail'");

$row= mysqli_fetch_assoc($result);
?>
<html>
<title>Payment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">         <!--for the search bar icon-->
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
		border-left: 6px solid #007BFF;
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
		justify-content: space-between;
		z-index:1;
		box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
	}

	.boxContainer{
		position: relative;
		width: 400px;
		height: 42px;
		border: 4px solid #007BFF;
		padding: 0px 10px;
		border-radius: 50px;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	
	.elementsContainer{
		width: 100%;
		height: 100%;
		vertical-align:middle;
	}
	
	.search{
		border: none;
		height: 100%;
		width: 100%;
		padding: 0px 5px;
		border-radius: 50px;
		font-size: 18px;
		font-family: "Nunito";
		color: #424242; 
		font-weight: 500;
	}
	
	.search:focus{
		outline:none;
	}
	
	.material-icons{
		font-size: 26;
		color: #2980b9;
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
	
	.dropdown {
		margin-left: 280px;
		margin-top: 10px;
		margin-bottom: 10px;
		position: relative;
		display: inline-block;
		background-color: #0084ff;
		border-radius:5px;
		color: #fff;
		padding: 15px;
	}
	

	.dropdown-content {
		display: none;
		position: fixed;
		background-color: #fff;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		
	}
	
	.dropdown:hover{
		background-color:#007BFF;
		cursor:pointer;
	}

	.dropdown:hover .dropdown-content {
		margin-top: 20px;
		margin-left: -15px;
		display: block;
	}
	
	.dropdown-content a{
		color:black;
		text-decoration:none;
	}
	.dropdown-content a:hover{
		color: #007BFF;
	}
	.dropdown-content a:active{
		color: #5CAAFF;
	}
	

	.dropdown-content a p{
		font-size:15px;
		padding: 20px;
		margin-top:-16px;
		margin-bottom:-16px;
	}
	
	.dropdown-content a p:hover{
		background-color:#F2F2F2;
		color: #007BFF;
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
		background-color:#F9F9F9;
		overflow: auto;
		height:91vh;
	}
	.content{
		display:grid;
		grid-template-columns: 1fr 1fr;
		grid-auto-rows: auto; 
		grid-template-areas: "summary payment";
		margin: auto;
		margin-top:1em;
		width: 95%;
		padding-bottom: 0px;
		padding-left: 20px;
		padding-right: 20px;
		padding-top: 20px;
		grid-gap:20px;
		
	}
	
	.payment{
		grid-area: payment;
		padding:20px;
		border-radius:20px;
		box-shadow: 2px 2px 5px 5px rgba(0,0,0,0.2);
	}
	
	.summary{
		grid-area: summary;
		padding:20px;
		border-radius:5px;
		box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.1);
	}
	
	
	.items{
		display:grid;
		grid-template-columns: 0.8fr 2fr 1fr;
		margin: auto;
		width: 95%;
		padding:5px;
		border-radius:10px;
	}
	
	.courseImg{
		display:grid;
		justify-content: flex-start;
		align-items: center;
		padding: 5px;
		padding-left: 10px;
	}
	
	.courseName{
		display:grid;
		justify-content: flex-start;
		align-items: center;
		padding: 10px;
		font-size:12px;
	}
	
	.priceSpecific{
		display:grid;
		justify-content: center;
		align-items: center;
		padding: 10px;
		font-size:12px;
	}
	
	.payment_details form{
		display:grid;
		grid-template-columns: 1fr 1fr 3fr;
		grid-auto-rows: auto auto auto auto; 
		grid-template-areas: "fn fn fn"
							 "fc fc fc"
							 "fmm fyyyy fs"
							 "fsub fsub fsub";
		grid-gap:10px;		
			
	}
	
	.payment_details{
		padding:10px;
		
	}
	
	.form_name{
		grid-area: fn;
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	
	.form_card{
		grid-area: fc;
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.form_mm{
		grid-area: fmm;
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.form_yyyy{
		grid-area: fyyyy;
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.form_security{
		grid-area: fs;
		display:grid;
		justify-content:flex-start;
		align-items:center;
	}
	
	.form_submit{
		grid-area: fsub;
		display:grid;
		justify-content:flex-end;
		align-items:center;
		padding-top:20px;
	}
	
	.form_submit input{
		padding: 12px;
		background-color:#0084ff;
		color:#fff;
		border-radius:12px;
		border-width:0px;
	}
	
	.form_submit input:hover{
		background-color:#007BFF;
		cursor:pointer;
	}
	
	.form_submit input:focus{
		outline:none;
	}
	
	.form_submit input:active{
		background-color:#006aff;
	}
	
	.payment_title{
		background-color:#007BFF;
		color:#fff;
		border-radius:5px;
		padding:15px;
	}
	
	.summary_title{
		background-color:#007BFF;
		color:#fff;
		border-radius:5px;
		padding:15px;
	}
	
	.payment_choice{
		padding:10px;
		padding-top:20px;
		font-size:15px;
	}
	
	.numberOfItem{
		padding:10px;
		padding-top:20px;
		font-size:18px;
	}
	
	.showDetails{
		padding:10px;
	}
	
	.showDetails button{
		background-color:#606060;
		color:#fff;
		padding: 10px;
		border-width:0px;
		margin-bottom:10px;
	}
	
	.showDetails button:hover{
		background-color:#0084ff;
		cursor:pointer;
	}
	
	.showDetails button:focus{
		outline:none;
	}
	
	.showDetails button:active{
		background-color: #006aff;
	}
	
	.totalPaymentDetails{
		display:grid;
		grid-template-columns: 1fr 1fr;
		grid-auto-rows: auto; 
		grid-template-areas: "total price";
		padding:10px;
	}
	
	.total{
		font-size:18px;
		grid-area:total;
	
	}
	
	.totalPrice{
		font-size:18px;
		grid-area:price;
		display:grid;
		justify-content:flex-end;
	
	}
	
	.onlinePayment{
		display:grid;
		grid-template-columns: 1fr 1fr 1fr 1fr;
		grid-auto-rows: auto; 
		grid-gap:5px;
	}
	
	.onlinePayment a div img{
		width:100%;
		height: 60px;
	}
	
/*------------------------------End of content------------------------------*/
	

	
</style>
</head>
<body>

	<div class="sidebar">
	    <img src="src/C-learnY.png" alt="C-learnY's Logo" style="width:100%; margin-top:10px;">
	    <hr style="height:1px; width:90%" >
		
	   <div class="sidebar-content" >
			<a href="learner homepage.php"><i class="fa fa-fw fa-home"></i> Home</a>
			<a href="learner_courses.php"><i class="fa fa-fw fa-trophy"></i> My Course</a>	
			<a href="cart.php"><i class="fa fa-fw fa-shopping-cart "></i> Shopping Cart</a>
			<a href="notification.php"><i class="fa fa-fw fa-bell"></i> Notification</a>
			<a href="Contact Us.php" target="_blank"><i class="fa fa-fw fa-envelope "></i> Contact</a>
		</div>
	</div>
	
	<div class="topbar">
		
		<div class="dropdown">
			<span>Categories</span>
			<div class="dropdown-content">
			<?php
				$category = "SELECT * FROM category";
				$result_category = mysqli_query($connect,$category);
				$row_category = mysqli_fetch_assoc($result_category);	
				do
				{
				?>
					<a href="learner_explore.php?buy&id= <?php echo $row_category['category_id']?>"><p style="margin-top:-5px; margin-bottom:0px;"><?php echo $row_category['category_name'];?></p></a>
				<?php
				}while($row_category = mysqli_fetch_assoc($result_category));
				?>
			</div>
		</div>
		
		
		<div class="profile">
			<div class="rightdrop">
					<div class="profile_detail">
						<?php
							$image = $row['image_learner'];
							$image_src = "learner_profile_image/".$image;
							$result = mysqli_query($connect,"SELECT * FROM learner where image_learner = '$image'");
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
						<span><?php echo $row["learner_name"];?></span>
						<i class="fa fa-sort-desc" style="margin-left:15px; margin-bottom: 5px; margin-right: -20px;"></i>
					</div>
					<div class="rightdrop-content">
						<a href="learnerViewProfile.php"><p style="margin-top:0px;">My Profile</p></a>
						<a href="landing page.php"><p style="margin-bottom:0px;">Logout</p></a>
					</div>
				</div>
		</div>
		
	</div>
	
	<div class="main">
		<div class="content">
		
			<div class="payment">
				<div class="payment_title">
					PAYMENT
				</div>
				<div class="payment_choice">
					
					  <input type="radio" id="card" name="choice" value="card" onclick="paymentChoice();">
					  <label for="card">By completing your purchase you agree to C-learnY's Terms of Service.</label><br>
					
				</div>
				<div class="payment_details">
					<span id="paymentDetails">
						
					</span>
				</div>
			</div>
			
			<div class="summary">
				<?php
					$shopping_cart = "Select * from shopping_cart where learner_id = '$row[learner_id]'";
					$result_shopping_cart = mysqli_query($connect,$shopping_cart);
					$row_shopping_cart = mysqli_fetch_assoc($result_shopping_cart);	
				?>
				<?php
					$adding = "SELECT * FROM adding WHERE cart_id = '$row_shopping_cart[cart_id]'";
					$result_adding = mysqli_query($connect,$adding);
					$row_adding = mysqli_fetch_assoc($result_adding);	
				?>
				<?php
					$course = "SELECT * FROM course, adding WHERE course.course_id = adding.course_id AND adding.cart_id = '$row_shopping_cart[cart_id]'";
					$result_course = mysqli_query($connect,$course);
					$row_course = mysqli_fetch_assoc($result_course);
					$count = mysqli_query($connect,"SELECT adding_id FROM adding where cart_id = '$row_shopping_cart[cart_id]'");
					$count_result = mysqli_num_rows($count);
				?>
			
				<div class="summary_title">
					SUMMARY
				</div>
				
				
				<div class="numberOfItem">
					<?php echo $count_result?> items
				</div>
				
				<div class="showDetails">
					<div>
						<div id="showitem" class="items">
						<?php
						$price = 0;
						do
						{
							?>
							<div class='courseImg'>
								<?php 
									$image = $row_course['course_image']; 
									$image_src = "educator_video_image/".$image; 
									echo "<img width='48px' height='32px' src='".$image_src ."'>"; 
								?>
							</div>
							<div class='courseName'><?php echo $row_course['course_name'];?></div>
							<div class='priceSpecific'>
							<?php
								if($row_course['course_price'] == 0)
								{
									$display_price = "Free";
									echo $display_price;
								}
								else
								{
									$display_price = $row_course['course_price'];
									?>RM <?php echo $display_price;
								}
							?>
							</div>
							<?php
							$price = $price + $row_course["course_price"];
						}while($row_course = mysqli_fetch_assoc($result_course));
						?>
						</div>
					</div>
					<hr style="width:95%;">
				</div>
				
				<div class='totalPaymentDetails'>
					<div class="total">
						Total
					</div>
					
					
					<div class="totalPrice">
						<?php echo "RM ". number_format($price,2); ?>
					</div>
				</div>
			</div>
				
		</div>
		
	</div>
	
<script>
	function paymentChoice(){
		
		var type = document.getElementsByName("choice");
		if(type[0].checked)
		  {
		   item0 = "<i class='fa fa-cc-visa' style='color:#006aff; font-size:50px;'></i><i class='fa fa-cc-mastercard'style='margin-left:5px; color:#ff4146 ; font-size:50px;'></i>";
		   item1 = "<form name='cardPay' method='POST'>";
		   item2 = "<div class='form_name'><input style='padding:10px;' type='text' name='name' size='50' placeholder ='Name on card' required/></div>";
		   item3 = "<div class='form_card'><input style='padding:10px;' type='text' name='card' size='50' placeholder ='Card number'  pattern='[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}' title='Enter the card number like xxxx-xxxx-xxxx-xxxx ' required/></div>";
		   item4 = "<div class='form_mm'><input style='padding:10px;' type='text' name='mm' size='10' placeholder ='MM' pattern='[0-9]{2}' title='Enter the Month xx 'required/></div>";
		   item5 = "<div class='form_yyyy'><input style='padding:10px;' type='text' name='yyyy' size='10' placeholder ='YY' pattern='[0-9]{2}' title='Enter the Year xx ' required/></div>";
		   item6 = "<div class='form_security'><input style='padding:10px;' type='text' name='code' size='11' placeholder ='Security code' pattern='[0-9]{3}' title='Enter the security code like xxx ' required/></div>";
		   item7 = "<div class='form_submit'><input type='submit' name='payment' value='Complete payment'/></div>";
		   item8 = "</form>"; 

		   document.getElementById("paymentDetails").innerHTML = item0 + item1 + item2 + item3 + item4 + item5 + item6 + item7 + item8;
		   
		  }
		
		
		
	}
	
</script>
<?php
if(isset($_POST["payment"])) 	
{
	$shopping_cart = "Select * from shopping_cart where learner_id = '$row[learner_id]'";
	$result_shopping_cart = mysqli_query($connect,$shopping_cart);
	$row_shopping_cart = mysqli_fetch_assoc($result_shopping_cart);	

	$adding = "SELECT * FROM adding WHERE cart_id = '$row_shopping_cart[cart_id]'";
	$result_adding = mysqli_query($connect,$adding);
	$row_adding = mysqli_fetch_assoc($result_adding);	

	$course = "SELECT * FROM course, adding WHERE course.course_id = adding.course_id AND adding.cart_id = '$row_shopping_cart[cart_id]'";
	$result_course = mysqli_query($connect,$course);
	$row_course = mysqli_fetch_assoc($result_course);
	$tamount = 0;
	do
	{
		$insert = mysqli_query($connect,"INSERT INTO purchasing_new(purchasing_status, learner_id, course_id, amount)VALUES('Payment Successfully', '$row[learner_id]', '$row_course[course_id]', '$row_course[course_price]')");
		$delete_course = mysqli_query($connect,"DELETE FROM adding where cart_id = '$row_shopping_cart[cart_id]' AND course_id = '$row_course[course_id]'");
		$wallet = "Select * from wallet where educator_id = '$row_course[educator_id]'";
		$result_wallet = mysqli_query($connect,$wallet);
		$row_wallet = mysqli_fetch_assoc($result_wallet);	
		$tamount = $row_wallet["balance"] + ($row_course["course_price"]*0.8);
		$insert_money = mysqli_query($connect,"UPDATE wallet SET balance='$tamount' where educator_id='$row_course[educator_id]'");
	}while($row_course = mysqli_fetch_assoc($result_course))
	?>
	<script>
				swal(
                {
                    title: "Congratulations!",
                    text: "Pay Successfully!",
                    icon: "success",
                    button: "Continue"
                }
                ).then(function()
                {
                    window.location.href = "learner homepage.php";
                });
			</script>
	<?php
}
?>
</body>
</html>





















