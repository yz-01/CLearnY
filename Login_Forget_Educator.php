<!DOCTYPE html>
<html>
  <head>
	<title>Educator Forget password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
		
		*{
		  margin: 0;
		  padding: 0;
		  box-sizing: border-box;
		  font-family: 'Poppins', sans-serif;
		}
		
		body{
			height: 100vh;
			background: url('src/b2.jpg') center no-repeat;
			background-size: cover;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}
		
		.content{
			display:grid;
			grid-template-columns: 0.8fr 1fr;
			align-content:center;
			width:50%;
			background-color:#fff;
			box-shadow: 1px 1px 2px 2px rgba(0,0,0,0.2);
			border-radius:12px;
			margin:auto;
			margin-top:20px;
		}
		
		.contentImg{
			display:grid;
			align-content:center;
			padding-left:20px;
		}
		
		.contentDetails{
			padding:40px;
		}
		

		
		.contentDetailsTitle{
			text-align:center;
			padding-bottom:20px;
			font-size:25px;
		}

		
		.form-input{
		  position: relative;
		}

		.form-input input{
		  width: 100%;
		  height: 45px;
		  padding-left: 40px;
		  margin-bottom: 20px;
		  box-sizing: border-box;
		  box-shadow: none;
		  border: 1px solid #00000020;
		  border-radius: 50px;
		  outline: none;
		  background: transparent;
		}

		.form-input span{
		  position: absolute;
		  top: 10px;
		  padding-left: 15px;
		  color: #FF5A5F;
		}

		.form-input input::placeholder{
		  color: black;
		  padding-left: 0px;
		}

		.form-input input:focus, .form-input input:valid{
		  border: 2px solid #FF5A5F ;
		}

		.form-input input:focus::placeholder{
		  color: #454b69;
		}
		
		.form-registerButton{
			background-color:#FF7478;
			color:#fff;
			border:none;
			outline:none;
			padding:10px;
			width:100%;
			border-radius:50px;
			cursor:pointer;
			font-weight:bold;
		}
		
		.form-registerButton:hover{
			background-color:#FF5A5F;
		}
		
		.form-registerButton:active{
			background-color:#ff4146 ;
		}
		



		
	</style>
    <meta charset="utf-8">

  </head>
  <body>
		
        <form method="POST">
			<div class="content">
				<div class="contentImg">
					<img src="src/cutelogo.png" alt="C-learnY's Logo" style="width:100%;">
				</div>
				<div class="contentDetails">
					
					<div class="contentDetailsTitle">
						Reset your password
					</div>
					<div style="padding:10px;">Please enter your email address</div>
					<div class="form-input">
						<span><i class="fa fa-envelope"></i></span>
						<input type="email" name="email" placeholder="Email Address" required>
					</div>
					
				
					<div class="form-register">
						<button type="submit" class="form-registerButton" name="submit">
							Send reset link
						</button>
					</div>
				
				</div>
			</div>
			
		</form>
<?php
include("dataconnection.php");
if(isset($_POST["submit"])) 	
{
	$email = $_POST["email"];
	$result_email = mysqli_query($connect,"SELECT * FROM educator where educator_email = '$email'");
	$row_email = mysqli_fetch_assoc($result_email);
	$c_email = mysqli_query($connect,"SELECT educator_id FROM educator where educator_email = '$email'");
	$count = mysqli_num_rows($c_email);
	if($count != 1)
	{
		?>
		<script>
			swal(
                {
                    title: "Oh No!",
                    text: "Cannot found your email in our system!",
                    icon: "warning",
                    button: "Continue"
                });
		</script>
		<?php
	}
	else
	{		$n = date("Y", strtotime($row_email["date"]));
			$z = date("m", strtotime($row_email["date"]));
			$total = $n + $z + $row_email["educator_id"];
			mysqli_query($connect,"UPDATE educator SET code='$total' where educator_id='$row_email[educator_id]'");
			$subject = "Reset Password ";
			$body = "Your EMAIL ADDRESS is ".$row_email["educator_email"]."<br>Your code is ".$total."";
			$headers='From: C-learnY'."\r\n".
						'MINE-Version: 1.0'."\r\n".
						'Content-Type: text/html; charset=utf-8';

			mail($email, $subject, $body, $headers);
					?>
		<script>
			swal(
                {
                    title: "Congratulations",
                    text: "Your password have been sent to your email!",
                    icon: "success",
                    button: "Continue"
                }).then(function()
					{
						window.location.href = "Educator_enter_code.php?buy&id=<?php echo $row_email['educator_id']?>";
					});
		</script>
		<?php
	}
}
?>
</body>
</html>
