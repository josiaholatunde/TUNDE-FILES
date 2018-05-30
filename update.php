<?php

require "conn.php";
if(isset($_GET['pid'])){
	$newpid = $_GET['pid'];
}


$query3 = mysql_query("SELECT * FROM task2 WHERE Id = '$newpid'");
if(!$query3){
	die("Unable to execute query").mysql_error();
}else{
	while($row = mysql_fetch_array($query3)){
		$day = $row['Day'];
		$task = $row['Task'];
		$targetTime = $row['TargetTime'];
		$epoch = substr($targetTime, 0, 10);

		$dbTargetTime =  date("Y-m-d\TH:i",$epoch );
		
		$new = strtotime($epoch);
	

		$priority = $row['Priority'];
		$status = $row['Status'];

	}
}



?>


<!DOCTYPE html>
<html>
<head>
	<title>ToDo List</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		body{
			background-color: purple;
		}
		.main{
			height:600px;
			background-color: white;
			/*margin-top: 15px;
			margin-left: 350px;*/

			border-radius: 7px;
		}
		.table td,.table th{
			text-align: center;
		}
		.table th{
			color: white;
		}
		
		
	</style>
</head>
<body>

	<div class="container ">
		<div class="row col-lg-5 col-lg-offset-4" style="color: white;">
			<h1 style="font-family: cursive;text-shadow: 3px 3px 3px #ba55d3;">MY TODO LIST</h1>
		</div>
		<div class="row main col-lg-5 col-lg-offset-3">
			
				<div class="row" >
				<form method="POST" action="update.php">
				<div class="col-lg-12" style="padding: 20px;">
					<div class="row ">
						<div class="col-lg-12">
				         <select id="day" class=" form-control col-lg-12"  name = "newday" size="1" >
				            <option selected="" value="null">Select the Day of the week</option>
				            <option  value="Monday" <?php if($day == 'Monday'){ echo "selected";}   ?>>Monday</option>
				            <option  value="Tuesday" <?php if($day == 'Tuesday'){ echo "selected";}   ?>>Tuesday</option>
				            <option  value="Wednesday" <?php if($day == 'Wednesday'){ echo "selected";}   ?>>Wednesday</option>
				            <option  value="Thursday" <?php if($day == 'Thursday'){ echo "selected";}   ?>>Thursday</option>
				            <option  value="Friday" <?php if($day == 'Friday'){ echo "selected";}   ?>>Friday</option>
				            <option  value="Saturday" <?php if($day == 'Saturday'){ echo "selected";}   ?>>Saturday</option>
				            <option  value="Sunday" <?php if($day == 'Sunday'){ echo "selected";}   ?>>Sunday</option>
				         </select>
				     	</div>
				     </div>
				     <div class="row">
				     	<div class="col-lg-12">
				     		<input type = "text" class="col-lg-3 form-control" style="margin-top: 50px;" name = "newtask" value="<?php echo $task;   ?>" placeholder="Enter task" />
				     	</div>
				     </div>


				     <div class="row">
				     	<div class="col-lg-12">
				     		<select id="day" class=" form-control col-lg-12" style="margin-top: 50px;" name = "newpriority" size="1" >
				            <option selected="" value="null">Select the order of Priority</option>
				            <option  value="Very Important" <?php if($priority == 'Very Important'){ echo "selected";}   ?>>Very Important</option>
				            <option  value="Urgent" <?php if($priority == 'Urgent'){ echo "selected";}   ?>>Urgent</option>
				            <option  value="Medium" <?php if($priority == 'Medium'){ echo "selected";}   ?>>Medium</option>
				            <option  value="Normal" <?php if($day == 'Normal'){ echo "selected";}   ?>>Normal</option>
				           
				         </select>
				     	</div>
				     </div>

				      <div class="row">
				     	<div class="col-lg-12">
				     		<input type = "text" class="col-lg-12 form-control" style="margin-top: 50px;" name = "newstatus" value="<?php echo $status; ?>" placeholder="Status e.g. Done or Not Done" />
				     		<input type="hidden" name="uniquepid" value="<?php echo $newpid;?>">
				     	</div>
				     </div>


				      <div class="row">
				     	<div class="col-lg-12">
				     		<input type = "datetime-local" class="col-lg-12 form-control" style="margin-top: 50px;" name = "newdatetime" value="<?php echo $dbTargetTime;  ?>" />
				     	</div>
				     </div>

				      <div class="row">
				     	<div class="col-lg-12">
				     		<input type = "submit" class="btn btn-primary col-lg-5 col-lg-offset-3" style="margin-top: 50px;" name = "update" value="UPDATE TODO" />
				     	</div>
				     </div>

				     
				</div>
				
		</div>

		
	</div>


<?php

	if(isset($_POST['update'])){
		if(!empty($_POST['newday']) && !empty($_POST['newtask']) && !empty($_POST['newpriority']) && !empty($_POST['newdatetime']) && !empty($_POST['newstatus']) && !empty($_POST['uniquepid'])){
			$newday = $_POST['newday'];
			$newtask = $_POST['newtask'];
			$newstatus = $_POST['newstatus'];
			$newpriority = $_POST['newpriority'];
			$uniquepid = $_POST['uniquepid'];

			 $newepoch = strtotime($_POST['newdatetime']);
			 /*echo $epoch."<br/>";
			 echo date("Y M D H:i:s A", substr($epoch, 0, 10));*/
			 $query = mysql_query("UPDATE task2
			 						 SET Day='$newday',Task='$newtask',Priority='$newpriority', TargetTime='$newepoch',Status='$newstatus'
			 						 WHERE Id = '$uniquepid'
			 						 ");
			 if(!$query){
			 	die("Unable to execute query").mysql_error();
			 }else{
			 	header("Location:todoassignment2.php?msg=Your Todo has been successfully updated");
			 }


		}else{
			echo "variable not created";
		}
	}


?>
</body>
</html>