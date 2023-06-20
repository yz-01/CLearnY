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
<title>Admin edit learner profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for the icons-->
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart','bar','line']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
	  google.charts.setOnLoadCallback(EducatorChart);
	  google.charts.setOnLoadCallback(LearnerChart);
      google.charts.setOnLoadCallback(ProfitChart);
      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(categoryChart);
	  google.charts.setOnLoadCallback(BuyingChart);
	  google.charts.setOnLoadCallback(drawChart);
      // Callback that draws the pie chart for Sarah's pizza.
	  function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          <?php
                $purchasing = "SELECT * FROM purchasing_new GROUP BY MONTH(purchasing_date) ";
                $result_purchasing = mysqli_query($connect,$purchasing);
                while($row_purchasing = mysqli_fetch_assoc($result_purchasing)){
					$n = date("n", strtotime($row_purchasing["purchasing_date"]));
					$f = date("F", strtotime($row_purchasing["purchasing_date"]));
					$count = mysqli_query($connect,"SELECT course_id FROM purchasing_new where MONTH(purchasing_date) = $n");
					$count_run = mysqli_fetch_assoc($count);
					$count_all = mysqli_num_rows($count);
                    echo "['".$f."',".$count_all."],";
                }
            ?>
        ]);

        var options = {
		width: 1160,
		height: 400,
		  vAxis: {
			title: 'Number of Courses '
		  },
          curveType: 'function',
          legend: { position: 'bottom' },
		   hAxis: {
			title: 'Month 	(The sales of month = 0 will not be appear.)'
		  }

        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
	  
	  function EducatorChart() {

        var data = new google.visualization.arrayToDataTable([
          ['Years', 'Number of Educators'],
          <?php
                $purchasing = "SELECT * FROM educator GROUP BY MONTH(date) ";
                $result_purchasing = mysqli_query($connect,$purchasing);
                while($row_purchasing = mysqli_fetch_assoc($result_purchasing)){
					$n = date("n", strtotime($row_purchasing["date"]));
					$f = date("F", strtotime($row_purchasing["date"]));
					$count = mysqli_query($connect,"SELECT educator_id FROM educator where MONTH(date) = $n");
					$count_all = mysqli_num_rows($count);
                    echo "['".$f."',".$count_all."],";
                }
            ?>	
        ]);

        var options = {
		  title: 'Educator population',
		  vAxis: {
			title: 'Number of Educators'
		  },
		  
		  hAxis: {
			title: 'Years'
		  },
		  
		  width: 370,
          
		  legend: { position: 'none' },

          bar: { groupWidth: "50%" }
        };

        var chart = new google.charts.Bar(document.getElementById('Educator_chart'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

	function LearnerChart() {

        var data = new google.visualization.arrayToDataTable([
          ['Years', 'Number of Learners'],
          <?php
                $purchasing = "SELECT * FROM learner GROUP BY MONTH(date) ";
                $result_purchasing = mysqli_query($connect,$purchasing);
                while($row_purchasing = mysqli_fetch_assoc($result_purchasing)){
					$n = date("n", strtotime($row_purchasing["date"]));
					$f = date("F", strtotime($row_purchasing["date"]));
					$count = mysqli_query($connect,"SELECT learner_id FROM learner where MONTH(date) = $n");
					$count_all = mysqli_num_rows($count);
                    echo "['".$f."',".$count_all."],";
                }
            ?>	
        ]);

        var options = {
		  title: 'Learner population',
		  vAxis: {
			title: 'Number of Learners'
		  },
		  
		  hAxis: {
			title: 'Month'
		  },
		  
		  width: 370,
          
		  legend: { position: 'none' },

          bar: { groupWidth: "50%" }
        };

        var chart = new google.charts.Bar(document.getElementById('Learner_chart'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
	  
	  
	  function ProfitChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Month');
      data.addColumn('number', 'Profit');

      data.addRows([
        [new Date(2020, 0), 20],[new Date(2020, 1), 30],[new Date(2020, 2), 43],[new Date(2020, 3), 43],
		[new Date(2020, 4), 43],  [new Date(2020, 5), 100],[new Date(2020, 6), 123]
      ]);

      var options = {
		width: 765,
		height: 300,
        hAxis: {
          title: 'Month',
          format: 'MMM YYYY'
        },
        vAxis: {
          title: 'Profit (RM)'
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('profile_chart'));

      chart.draw(data, options);
    }
	
	
	function BuyingChart() {

      var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
	  		<?php
				$purchasing = "SELECT * FROM purchasing_new GROUP BY MONTH(purchasing_date)";
				$result_purchasing = mysqli_query($connect,$purchasing);
				while($row_purchasing = mysqli_fetch_assoc($result_purchasing))
				{
					$n = date("n", strtotime($row_purchasing["purchasing_date"]));
					$f = date("F", strtotime($row_purchasing["purchasing_date"]));
					$total = mysqli_query($connect, "SELECT SUM(amount * 0.2) as sum_total FROM purchasing_new where MONTH(purchasing_date) = $n ");
					$row_total = mysqli_fetch_assoc($total);
					echo "['".$f."',".$row_total['sum_total']."],";
				}
			?>
        ]);

        var options = {
		width: 1160,
		height: 400,
		  vAxis: {
			title: 'Profit'
		  },
          curveType: 'function',
          legend: { position: 'bottom' },
		   hAxis: {
			title: 'Month 	(The profit of month = 0 will not be appear.)'
		  }

        };

        var chart = new google.visualization.LineChart(document.getElementById('BuyingChart'));

        chart.draw(data, options);
	}
	  
	  

      // Callback that draws the pie chart for category.
      function categoryChart() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php
                $purchasing = "SELECT * FROM category ";
                $result_purchasing = mysqli_query($connect,$purchasing);
                while($row_purchasing = mysqli_fetch_assoc($result_purchasing)){
					$count = mysqli_query($connect,"SELECT course_id FROM course where category_id = $row_purchasing[category_id]");
					$count_all = mysqli_num_rows($count);
                    echo "['".$row_purchasing['category_name']."',".$count_all."],";
                }
            ?>	
        ]);

        // Set options for Anthony's pie chart.
        var options = {width:370,
                       height:200};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('category_chart'));
        chart.draw(data, options);
      }
    </script>
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
		margin:auto;
		width:100%;
		padding:20px;
		box-sizing: border-box;
		display:grid;
		grid-template-columns: 370px 370px 370px;
		grid-template-rows: auto auto;
		grid-gap:20px;
		grid-template-areas: "usertitle usertitle usertitle" "adm edu lea" 
							 "table table table" "pro pro pro" "table2 table2 table2"
							 "buy buy buy";
	}
	.contentUserTitle{
		display:grid;
		grid-area:usertitle;
		justify-content:center;
		font-size:20px;
	}
	
	.contentTable{
		display:grid;
		grid-area:table;
		justify-content:center;
		font-size:20px;
	}
	
	.contentTable2{
		display:grid;
		grid-area:table2;
		justify-content:center;
		font-size:20px;
	}
	
	.contentAdm{
		grid-area:adm;
		display:grid;
		grid-template-columns: 1fr;
		grid-template-rows: 45px auto;
	}
	
	.content_Title{
		background-color:#0084ff ;
		display:grid;
		justify-content:flex-start;
		align-items:center;
		padding:10px;
		padding-left:15px;
		border-radius:5px;
	}

	.content_Chart{
		display:grid;
		justify-content:center;
		align-items:flex-start;
		margin-top:5px;
	}
	

	
	.contentEdu{
		grid-area:edu;
		display:grid;
		grid-template-columns: 1fr;
		grid-template-rows: 45px auto;
	}
	
	.contentLea{
		grid-area:lea;
		display:grid;
		grid-template-columns: 1fr;
		grid-template-rows: 45px auto;
	}
	
	.contentCat{
		grid-area:cat;
		display:grid;
		grid-template-columns: 1fr;
		grid-template-rows: 45px auto;
	}
	
	.contentPro{
		grid-area:pro;
		display:grid;
		grid-template-columns: 1fr;
		grid-template-rows: 45px auto;
	}
	
	.contentBuy{
		grid-area:buy;
		display:grid;
		grid-template-columns: 1fr;
		grid-template-rows: 45px auto;
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
				Data Analysis
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
		<?php
			if(isset($_GET["buy"]))
			{
				$id = $_GET["id"];
				$result = mysqli_query($connect, "SELECT * FROM educator WHERE educator_id = '$id'");
				$row = mysqli_fetch_assoc($result);
			}
		?>
		<div class="content">
			<div class="contentUserTitle">
				User of Website
			</div>
			<div class="contentAdm">
				<div class="content_Title">	
					Learner
				</div>
				<div class="content_Chart">	
				
				
					<div id="Learner_chart" style="border: 1px solid #ccc"></div>
					
					
				</div>
			</div>
			
			<div class="contentEdu">
				<div class="content_Title">	
					Educator
				</div>
				<div class="content_Chart">	
					
					<div id="Educator_chart" style="border: 1px solid #ccc"></div>
					
				</div>
			</div>
			
			<div class="contentLea">
				<div class="content_Title">	
					Categories
				</div>
				<div class="content_Chart">	
					
					<div id="category_chart" style="border: 1px solid #ccc"></div>
					
				</div>
			</div>
			
			<div class="contentTable">
				Sales of course
			</div>
			
			
			<div class="contentPro">
				<div class="content_Title">	
					Course
				</div>
				<div class="content_Chart">	
					
					<div id="curve_chart" style="border: 1px solid #ccc"></div>
					
				</div>
			</div>
			<div class="contentTable2">
				Profit of C-learnY
			</div>
			<div class="contentBuy">
				<div class="content_Title">	
					Profit
				</div>
				<div class="content_Chart">	
					
					<div id="BuyingChart" style="border: 1px solid #ccc"></div>
					
				</div>
			</div>

			
		</div>
		
	</div>
	
</body>

</html>












