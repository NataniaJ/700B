

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<link href="css/style.css" type="text/css" rel="stylesheet" />
    <title></title>
    <SCRIPT language="Javascript" type="text/javascript" src="css/dtreeck.js"></SCRIPT>

    <style type="text/css">
        a:link {
            font-size: 12px;
            color: #0000FF;
            text-decoration: none;
        }
        a:visited {
            font-size: 12px;
            color: #0000FF;
            text-decoration: none;
        }
        a:hover {
            font-size: 12px;
            color: #CC6600;
            text-decoration: none;
        }
        a:active {
            font-size: 12px;
            color: #006600;
            text-decoration: none;
        }
        li{font-size: 20px;}
        .menuUl a{font-size: 20px; color: #080808}
        .menuUl li i { left: 10px; top: 0px; cursor: pointer; color: #161616; 			}
		body{background:#fff;color:#333;font-family:"Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;font-size:0.9em;}
#container{width:900px;margin:50px auto;}
#chart, #chartData{border:1px solid #333;background:#ebedf2 url("images/gradient.png") repeat-x 0 0;}
#chart{display:block;margin:0 0 50px 0;float:left;cursor:pointer;}
#chartData{width:200px;margin:0 40px 0 0;float:right;border-collapse:collapse;box-shadow:0 0 1em rgba(0, 0, 0, 0.5);-moz-box-shadow:0 0 1em rgba(0, 0, 0, 0.5);-webkit-box-shadow:0 0 1em rgba(0, 0, 0, 0.5);background-position:0 -100px;}
#chartData th, #chartData td{padding:0.5em;border:1px dotted #666;text-align:left;}
#chartData th{border-bottom:2px solid #333;text-transform:uppercase;}
#chartData td{cursor:pointer;}
#chartData td.highlight{background:#e8e8e8;}
#chartData tr:hover td{background:#f0f0f0;}
    </style>
<script src="js/jquery.min.js"></script>
<!--[if IE]>
<script src="js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="js/pieChart.js"></script>
<div style="text-align:center;clear:both;">
<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
<script src="/follow.js" type="text/javascript"></script>
</div>
</head>
<body style="background-color: #d5d9dd">
<div>
    <link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<div style="height: 80px; width: 100%; background-color: #FFFFFF">
    &nbsp&nbsp;
	<a href="frontpage.php"><img src="img/logo.png" height="70px" width="70px"></a>
	<div style="font-family: Brush Script MT ;position: relative; left:100px; top: -75px;z-index: 999; font-size:50px"><p>Newark Data Portal</p></div>
</div>
    <div style="position: relative; width: 200px; height:500px ; left:20px; top:50px;">
        <div class="innerUl"></div>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/proTree.js" ></script>
    </div>
    <div style="position: relative;  margin-left: 300px;  top: -450px; width: 500px; height: 1000px;
        ">
        <div class="container">
            <table class="table table-hover table-expandable">
                <thead>
                <tr>
                    <th>Data Name</th>
                    <th>Data Type</th>
                    <th>Update Time</th>
                    <th>Data Source</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "700b";
						$port = "3307";
						$conn = new mysqli($servername, $username, $password, $dbname, $port);
						if ($conn->connect_error) {
							die("连接失败: " . $conn->connect_error);
						}
						$keyword = $_POST['keyword'];
						$s = $_POST['s'];
						if($s==null){
							$sql = "SELECT DataName, DataType, UpdateName, DataSource, DataContent, Url FROM data where DataName like '%$keyword%' ";
						}
						else{
							$sql = "SELECT DataName, DataType, UpdateName, DataSource, DataContent, Url FROM data where Menu='$s' and DataName like '%$keyword%' ";
						}
							$count_government = "select * from data where DataName like '%$keyword%' and Menu='government'";
							$count_business = "select * from data where DataName like '%$keyword%' and Menu='business'";
							$count_education = "select * from data where DataName like '%$keyword%' and Menu='education'";
							$count_safety = "select * from data where DataName like '%$keyword%' and Menu='safety'";
							$count_environment = "select * from data where DataName like '%$keyword%' and Menu='environment'";
							$count_transportation =  "select * from data where DataName like '%$keyword%' and Menu='transportation'";
							$count_development = "select * from data where DataName like '%$keyword%' and Menu='development'";
							$count_health = "select * from data where DataName like '%$keyword%' and Menu='health'";
							
							$result_government = $conn->query($count_government);
							$result_business = $conn->query($count_business);
							$result_education = $conn->query($count_education);
							$result_safety = $conn->query($count_safety);
							$result_environment = $conn->query($count_environment);
							$result_transportation = $conn->query($count_transportation);
							$result_development = $conn->query($count_development);
							$result_health = $conn->query($count_health);
							
							$result_government = $result_government->num_rows;
							$result_business = $result_business->num_rows;
							$result_education = $result_education->num_rows;
							$result_safety = $result_safety->num_rows;
							$result_environment = $result_environment->num_rows;
							$result_transportation = $result_transportation->num_rows;
							$result_development = $result_development->num_rows;
							$result_health = $result_health->num_rows;
							
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								$name = $row["DataName"];
								echo "<tr>";
								echo "<td> " .$row["DataName"]. "</td>".
									"<td> " .$row["DataType"]. "</td>".
									"<td> " .$row["UpdateName"]. "</td>".
									"<td> " .$row["DataSource"]. "</td>";
								echo "</tr>";
								
								echo    "<tr>
										<td colspan='5'>
										<h3>DataContents</h3>
										<ul>
											<li>" . $row["DataContent"].
											"<a href='data.php?m=$name'> more details
											</li>
										</ul>
										</td>
									</tr>";
								}
							}
						else{
							echo "<tr>";
									echo "Not Found";
							echo "</tr>";
							$result_government =0;
							$result_business = 0;
							$result_education = 0;
							$result_safety = 0;
							$result_environment = 0;
							$result_transportation = 0;
							$result_development = 0;
							$result_health = 0;
						}       
                echo "</tbody>
            </table>
 </table>
		<canvas id='chart' width='600' height='500' style='position:relative; left:200px'></canvas>
		<table id='chartData'>
			<tr>
				<th>Menu</th><th>Number</th>
			</tr>
			<tr style='color:#194E9C'>
				<td>government</td><td>".$result_government."</td>
			</tr>
			
			<tr style='color:#0DA068'>
				<td>business</td><td>".$result_business."</td>
			</tr>
			
			<tr style='color:#ED9C13'>
				<td>education</td><td>".$result_education."</td>
			</tr>
			
			<tr style='color:#ED5713'>
				<td>safety</td><td>".$result_safety."</td>
			</tr>
			
			<tr style='color:#057249'>
				<td>environment</td><td>".$result_environment."</td>
			</tr>
			
			<tr style='color:#5F91DC'>
				<td>transportation</td><td>".$result_transportation."</td>
			</tr>
			
			<tr style='color:#F88E5D'>
				<td>development</td><td>".$result_development."</td>
			</tr>
			
			<tr style='color:#000000'>
				<td>health</td><td>".$result_health."</td>
			</tr>
		</table>
        </div>
        </div>" ?>

    </div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</body>
</html>