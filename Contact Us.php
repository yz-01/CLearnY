<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" href="css_contactuspage/contactus.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Contact Us</h2>
					<form name="contactform" method="post" action="">
					<input type="text" class="field" placeholder="Your Name" name="name">
					<input type="text" class="field" placeholder="Your Email" name="email">
					<input type="text" class="field" placeholder="Phone" name="phone">
					<textarea placeholder="Message" class="field" name="message"></textarea>
					<button class="btn" name="submit">Send</button>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
include("dataconnection.php");
if(isset($_POST["submit"])) 	
{
	$cname = $_POST["name"];  	
	$cemail = $_POST["email"];  	
	$cphone = $_POST["phone"];  	
	$cmessage = $_POST["message"];  	
	
	mysqli_query($connect,"INSERT INTO contactus(contact_name,contact_email,contact_phone,contact_message)
	VALUES('$cname','$cemail','$cphone','$cmessage')");
	
	?>
	
		<script>
			swal(
                {
                    title: "Well Done!",
                    text: "Thank for feedback!",
                    icon: "success",
                    button: "Continue"
                }
                );
		</script>
	
	<?php
	
	
}

?>