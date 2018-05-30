<?php
	$ans="";
	$msg ="";


	if(isset($_POST['fib'])){
		if(isset($_POST['start']) && isset($_POST['end'])){
			$first = $_POST['start'];
			$end = $_POST['end'];
			$sec = $first;

			//printFibonacci(50);

			//function printFibonacci($n, $first = 1, $sec= 1){
				if($first == 0 ){
					$msg = "<strong style='color:red;'>Invalid input. Start number must be greater than zero</strong>";

				}else{
					$msg = $first.", ".$first.", ";
						for($i=1;$i < 1000000; $i++){
							$z = $first + $sec;
							
							if($z == $end || $z > $end){
								break;
							}else{
								$msg.= $z.", ";
								$first = $sec;
								$sec = $z;
							}

						}
				}

			}else{
			echo "The inputs can not be empty";
		}
	}
			
?>


<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		body{
			/*background-color: maroon;*/
			background:url('img/images3.jpg') no-repeat;
			background-size: cover;

		}

		.main{
			height:380px;
			background-color: white;
			margin-top: 35px;
			margin-left: 160px;
			
			padding: 15px;
		}
		.container{
			padding: 10px;
			margin-top: 50px;
		}
		.msg{
			text-align: center;
		}
	</style>

</head>
<body>
	<div class="container">
		<div class="row col-md-7 col-md-offset-2">
			<div class=" main">
				
				<div class="row">
					<form action="fibonacci.php" method="POST">
						<div class="form-group">
							
							<div class="col-md-3"><label for="firstnumber" class="control-label col-md-3">Start</label></div>
						
				     	<div class="col-md-9">
				     		<input type = "number" id="firstnumber" min="0" class="col-md-9 form-control" name = "start" value="" />
				     	</div>
				     </div>
				
				
			</div>

			<div class="row"  style="margin-top: 25px;">
						<div class="form-group">
							<div class="col-md-3"><label for="secondnumber"  min="0" class="control-label col-md-3">End</label></div>
						
				     	<div class="col-md-9">
				     		<input type = "number" id="secondnumber" class="col-md-9 form-control" name = "end" value="" />
				     	</div>
				     </div>
				
				
			</div>



			<div class="row col-md-6 col-offset-md-3" style="margin-top: 25px;" >
					<div class="form-group ">
				
				     		<input type = "submit" id="reset" class="form-control btn btn-success" name = "fib" value="PRINT FIBONACCI SERIES" />
				     	
				     </div>
				
			</div>
			<div class="row" style="margin-top: 25px;">
				 <div class="col-md-12">
					<?php  echo $msg; ?>
			
				</div>
		</div>
		</form>
		</div>
	</div>
	
</body>
</html>