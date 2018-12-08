<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
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
	body{
	}
</style>
<body style="background-color:#ffffff">
<div style="height: 80px; width: 100%;background-color:#FFFFFF">
		 <div style="height: 80px; width: 100%;">
        &nbsp&nbsp;
		<a href="frontpage.php"><img src="img/logo.png" height="70px" width="70px"></a>
		<div style="font-family:  Brush Script MT  ;position: relative; left:100px; top: -125px;z-index: 999; font-size:50px"><p>Newark Data Portal</p></div>
    </div>
</div>

<div style="color:#333333;height: 300px; width: 80%; position: relative; top: 20px; left: 150px;background:#ffffff;color:#333;">
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
			
			$name = $_GET['m'];
			$sql = "SELECT DataName,DataType,UpdateName, DataSource,DataContent, Url FROM data where DataName='$name'";
			$result = $conn->query($sql);
						if ($result->num_rows ==1) {
							while($row = $result->fetch_assoc()) {
								$url = $row["Url"];
		echo"
		<p style='text-align: center'>".$row["DataName"]. "</p>
		
		<HR align=center width= 100% color=#987cb9 SIZE=1>
		Content: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<span style='text-align: center'>".$row["DataContent"]."</span>
		<br>
		DataType:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<span style='text-align: center'>".$row["DataType"]."</span>
		<br>
		Come From:&nbsp&nbsp&nbsp&nbsp;<span style='text-align: center'>".$row["DataSource"]."</span>
		<br>
		UpdateTime:&nbsp&nbsp&nbsp;<span style='text-align: center'>".$row["UpdateName"]."</span>
		<br>

		
		<br><br><br><br><br><br><br>
		
		<HR align=center width=100% color=#987cb9 SIZE=1>
		
		<p>Access the data</p>
		
		<link href='css/bootstrap.min.cs' rel='stylesheet'/>
		<link href='css/style.css' rel='stylesheet' type='text/css' />
		";
		echo "<a class='downloadBtn purple' href='$url'>
			<span><strong>Download Now</strong>0.5 MB</span>
		</a>";
							}
						}
	?>
</div>
   <div  id="contack us" style="   width:100%; height: 300px;position: relative; top:50px;font-family: Bradley Hand ITC ">
        <b><p style="z-index: 999; color: black; opacity: 1; text-align: center; font-size: 30px;">Contact us</p></b>
		<b><p style="z-index: 999; color: black; opacity: 1; text-align: center; font-size: 30px;">Our email is zl434@njit.edu</p></b>
		<b><p style="z-index: 999; color: black; opacity: 1; text-align: center; font-size: 20px;">NJIT</p></b>
        <b><p style="z-index: 999; color: black; opacity: 1; text-align: center; font-size: 20px;">Team: Data Driven and Data Portal</p></b>
		<b><p style="z-index: 999; color: black; opacity: 1;text-align: center;font-size: 20px;">Members: Lin Yang, Zhaohe Li, Tanyue Jiang</p></b>
	</div>
</body>
</html>