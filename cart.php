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
<title>Shopping Cart</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">         <!--for the search bar icon-->
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
	}
	
	.content_title{
		margin: auto;
		width: 100%;
		padding:12px;
		padding-left:40px;
		font-size:28px;
		color:#606060;
		background-color:#F2F2F2;
		box-sizing: border-box;
		position:fixed;
	}
	
	.content_layout{
		margin-top:65px;
		height:590px;
	}
	
	.content{
		display:grid;
		grid-template-columns: 0.8fr 2fr 1fr 0.5fr;
		background-color:#fff;
		margin: auto;
		margin-top:60px;
		margin-bottom:-50px;
		width: 92%;
		padding:15px;
		border-radius:20px;
	}
	
	.courseImg{
		display:grid;
		justify-content: flex-start;
		align-items: center;
		padding: 5px;
	}
	
	.courseName{
		display:grid;
		justify-content: flex-start;
		align-items: center;
		padding: 10px;
		font-size:20px;
	}
	
	.priceSpecific{
		display:grid;
		justify-content: center;
		align-items: center;
		padding: 10px;
		font-size:20px;
	}
	
	.bin{
		display:grid;
		justify-content: center;
		align-items: center;
		padding: 10px;
	}
	
	.bin button{
		background-color:#fff;
		border-width:0px;
	}
	
	.bin button:hover{
		cursor:pointer;
	}
	
	.bin button:focus{
		outline:none;
	}
	
	.bottom_bar{
		position: fixed;
		bottom:0;
		background-color:#fff;
		width:85%;
		height:10%;
		display: grid;
		grid-template-columns: 3fr 1fr;
		box-shadow: 3px 2px 2px 3px rgba(0,0,0,0.2);  /*if you see this add this line to wallet.html same class name*/
	}
	
	.total_price{
		display: grid;
		justify-content: flex-start;
		align-items: center;
		font-size: 22px;
		margin-left:50px;
	}
	
	.checkout{
		display: grid;
		justify-content: center;
		align-items: center;
		padding:30px;
		font-size: 23px;
		background-color:#0084ff ;
		color:#fff;
	}
	
	.bottom_bar a{
		text-decoration: none;
	}
	
	.bottom_bar a div:hover{
		background-color: #007BFF;
	}	
	
	.bottom_bar a div:active{
		background-color: #006aff;
	}	
	
	.showbtn{
		margin-left: 40%;
		margin-top: 20%;
		font-size: 30px;
	}
	
	.showbtn .btn{
		margin-left: 10%;
		margin-top:10px;
		color: white; 
		background-color: #0084ff; 
		border: none; 
		padding: 10px 15px; 
		border-radius: 8px;
		text-decoration: none;
		cursor: pointer;
		display: inline-block;
	}
	
	.showbtn .btn a{
		text-decoration: none;
		color: white;
	}
	
	.btn:hover{
		background-color: #007BFF ; 
	}
	
	.btn:active{
		background-color: #006aff  ; 
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
		<div class="content_title">
			Shopping Cart 
		</div>
		<div class="content_layout">
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
		<?php
		if($count_result != 0)
		{
			$price = 0;
			do
			{
				?>
					
					<div class="content">
						
						<div class="courseImg">
							<a href="#learner_click.html">
								<?php
									$image = $row_course['course_image'];
									$image_src = "educator_video_image/".$image;
									echo "<img width='120px' height='80px' src='".$image_src ."'>";
								?>
							</a>
						</div>
								
						<div class="courseName">
							<?php echo $row_course['course_name'];?>
						</div>
								
						<div class="priceSpecific">
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
								
						<div class="bin">
						<form class="form-box px-3" name="learner_click" method="post">
							<a href="cart.php?action=remove&id=<?php echo $row_course["course_id"]; ?>">
								<img src="src/bin.jpg" alt="rubbish bin" width="40px" height="40px">
							</a>
						</form>
						</div>	
						<?php
						if(isset($_GET["action"]))
						{
							$course_id_delete = $_GET["id"];
							$delete_course="DELETE FROM adding where cart_id = '$row_shopping_cart[cart_id]' AND course_id = '$course_id_delete'";
							mysqli_query($connect, $delete_course);
							?>
							<script>
								window.location.href = "cart.php";
							</script>
							<?php
						}
						?>	
					</div>			
				<?php
				$price = $price + $row_course["course_price"];
			}while($row_course = mysqli_fetch_assoc($result_course));
			?>
			<div class="bottom_bar">
				<div class="total_price">
					Total : <?php echo "RM ". number_format($price,2); ?>
				</div>
				<a href="payment.php">
					<div class="checkout">
						Checkout
					</div>
				</a>
			</div>
			<?php
		}
		else
		{
		?>
			<div class="showbtn">
				<span>Your Cart is Empty !</span><br>
				<button class="btn"><a href="learner homepage.php">Add Courses</a></button>
			</div>
		<?php
		}
		?>
		</div>
		
	</div>
	
</body>
</html>












