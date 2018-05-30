<?php

require "conn.php";
require "todoProcess.php";
require "delProcess.php";


$msg ='';

$query2 = mysql_query("SELECT * FROM task2 ORDER BY Id");
if(!$query2){
	die("Unable to execute query").mysql_error();
}



?>


<!DOCTYPE html>
<html>
<head>
	<title>ToDo List</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no,maximum-scalable=1">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		body{
			background-color: purple;
		}
		.main{
			height:600px;
			background-color: white;
			margin-top: 15px;
			margin-left: 80px;
			border-radius: 7px;
		}
		.table td,.table th{
			text-align: center;
			width: 100%;
		}
		.table th{
			color: white;
		}

		
		
	</style>
</head>
<body>

	<div class="container text-center ">
		<div class="row col-lg-5 col-lg-offset-4 col-md-5 col-md-offset-4 col-sm-7 col-sm-offset-3 col-xs-7 col-xs-offset-3" style="color: white;">
			<h1 style="font-family: cursive;text-shadow: 3px 3px 3px #ba55d3;" class="">MY TODO LIST</h1>
		</div>
		<div class="container">
		<div class="row main col-lg-11  col-md-10 col-sm-10 col-xs-10">
			<div class="row" >
				<form method="POST" action="todoassignment2.php">
				<div class="col-lg-5 col-md-4 col-sm-12 col-xs-12" style="padding: 20px;">
					<div class="row">

						<div class="row">
				     	
				     		<?php if(isset($_GET['msg'])){ echo "<div class='col-lg-offset-1 col-lg-10 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1  alert alert-success'>".$_GET['msg']."</div>";}  ?>
				     		
				     	
				     </div>

						<div class="col-lg-12">
				         <select id="day" class=" form-control col-lg-12"  name = "day" size="1" >
				            <option selected="" value="Null">Select the Day of the week</option>
				            <option  value="Monday">Monday</option>
				            <option  value="Tuesday">Tuesday</option>
				            <option  value="Wednesday">Wednesday</option>
				            <option  value="Thursday">Thursday</option>
				            <option  value="Friday">Friday</option>
				            <option  value="Saturday">Saturday</option>
				            <option  value="Sunday">Sunday</option>
				         </select>
				     	</div>
				     </div>
				     <div class="row">
				     	<div class="col-lg-12">
				     		<input type = "text" class="col-lg-3 form-control" style="margin-top: 50px;" name = "task" value="" placeholder="Enter task" />
				     	</div>
				     </div>


				     <div class="row">
				     	<div class="col-lg-12">
				     		<select id="day" class=" form-control col-lg-12" style="margin-top: 50px;" name = "priority" size="1" >
				            <option selected="" value="null">Select the order of Priority</option>
				            <option  value="Very Important">Very Important</option>
				            <option  value="Urgent">Urgent</option>
				            <option  value="Medium">Medium</option>
				            <option  value="Normal">Normal</option>
				           
				         </select>
				     	</div>
				     </div>

				      <div class="row">
				     	<div class="col-lg-12">
				     		<input type = "text" class="col-lg-12 form-control" style="margin-top: 50px;" name = "status" value="" placeholder="Status e.g. Done or Not Done" />
				     		
				     	</div>
				     </div>


				      <div class="row">
				     	<div class="col-lg-12">
				     		<input type = "datetime-local" class="col-lg-12 form-control" style="margin-top: 50px;" name = "datetime" value="" />
				     	</div>
				     </div>

				      <div class="row">
				     	<div class="col-lg-12">
				     		<input type = "submit" class="btn btn-primary col-lg-5 col-lg-offset-3" style="margin-top: 50px;" name = "add" value="ADD TODO" />
				     	</div>
				     </div>

				     </form>

				     
				</div>
				<div class="col-lg-7 col-md-8 col-sm-12 col-xs-12" style="background-color: #ba55d3; padding: 15px; height: 600px;border-radius:0  7px 7px 0;">
					
					<div class="row align-self-center">
						<div class="">
						<table class="table table-striped">
			  				<thead class="thead-dark">
							    <tr>
							      <th scope="col">S/N</th>
							      <th scope="col">ToDo</th>
							      <th scope="col">Priority</th>
							      <th scope="col">Target Date</th>
							      <th scope="col">Status</th>
							      <th scope="col"></th>
							      <th scope="col"></th>
							    </tr>
			  				</thead>
			 				<tbody style="color: black;">
			 					
			 						
			 					
								    
								      <?php
								      	$i = 1;
								      		while($row = mysql_fetch_array($query2)){
								      			$dbId = $row['Id'];
								      			$dbTask = $row['Task'];
								      			$dbDay = $row['Day'];
								      			$dbStatus = $row['Status'];
								      			$dbTargetTime = $row['TargetTime'];

								      			$dbPriority = $row['Priority'];
								      			 $dbTargetTime2 =  date("D d M Y H:i:s A", substr($dbTargetTime, 0, 10));

								      		$order = "<tr><th scope='row' style='color:black;'>";
								      		$order.= $i."</th><td>".$dbTask."</td><td>".$dbPriority."</td><td>".$dbTargetTime2."</td><td>".$dbStatus."</td><td><a class='btn btn-primary btn-md' href='update.php?pid=$dbId'>Update</a></td><td><a class='btn btn-danger btn-md' href='todoassignment2.php?mid=$dbId'>Delete</a>".
								      		"</td></tr>";
								      				echo $order;
								      				$i++;
								      		}
								       ?>
								      
								    
							</tbody>

			</table>
				</div>
					</div>
				</div>
			
			</div>
		</div>

		</div>
	</div>



</body>
</html>