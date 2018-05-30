<?php
	$ans="";
	$msg ="";

	if(isset($_POST['add'])){
			if(isset($_POST['firstnumber']) && isset($_POST['secondnumber'])){
				$first = $_POST['firstnumber'];
				$second = $_POST['secondnumber'];

					$ans = add($first,$second);
			}else{
				$msg = "Please fill in the input fields";
			}
	}else if(isset($_POST['sub'])){
			if(isset($_POST['firstnumber']) && isset($_POST['secondnumber'])){
				$first = $_POST['firstnumber'];
				$second = $_POST['secondnumber'];

					$ans = sub($first,$second);
			}else{
				$msg = "Please fill in the input fields";
			}
	}else if(isset($_POST['divide'])){
			if(isset($_POST['firstnumber']) && isset($_POST['secondnumber'])){
				$first = $_POST['firstnumber'];
				$second = $_POST['secondnumber'];

					$ans = divide($first,$second);
			}else{
				$msg = "Please fill in the input fields";
			}
	}else if(isset($_POST['multiply'])){
			if(isset($_POST['firstnumber']) && isset($_POST['secondnumber'])){
				$first = $_POST['firstnumber'];
				$second = $_POST['secondnumber'];

					$ans = multiply($first,$second);
			}else{
				$msg = "Please fill in the input fields";
			}
	}else if(isset($_POST['reset'])){
			if(isset($_POST['firstnumber']) && isset($_POST['secondnumber'])){
				$first = $_POST['firstnumber'];
				$second = $_POST['secondnumber'];
				$first = '';
				$second = '';

				$ans='';	
			}
	}

	function add($first,$second){

			$result= $first + $second;
			return $result;
	}

	function sub($first,$second){

			$result= $first - $second;
			return $result;
	}

	function divide($first,$second){
			if($second == 0){
				$msg = "Invalid input...Division by zero yields infinity";
				return $msg;
			}else{
				$result= $first / $second;
				return $result;

			}

			
	}

	function multiply($first,$second){
		

					$result= $first * $second;
					return $result;
			

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
					<form action="calculator.php" method="POST">
						<div class="form-group">
							<?php if(!empty($msg)){ echo "<div class='alert alert-danger msg'>".$msg."</div>";} ?>
							<div class="col-md-3"><label for="firstnumber" class="control-label col-md-3">Number 1</label></div>
						
				     	<div class="col-md-9">
				     		<input type = "number" id="firstnumber" class="col-md-9 form-control" name = "firstnumber" value="<?php if(isset($first)){ echo $first; } ?>" />
				     	</div>
				     </div>
				
				
			</div>

			<div class="row"  style="margin-top: 25px;">
						<div class="form-group">
							<div class="col-md-3"><label for="secondnumber" class="control-label col-md-3">Number 2</label></div>
						
				     	<div class="col-md-9">
				     		<input type = "number" id="secondnumber" class="col-md-9 form-control" name = "secondnumber" value="<?php if(isset($second)){ echo $second; } ?>" />
				     	</div>
				     </div>
				
				
			</div>


			<div class="row"  style="margin-top: 25px;">
				<div class="col-lg-3">
					<input type = "submit"  class="col-md-3 form-control btn btn-primary btn-md" name = "add" value="+" />
				</div>
				<div class="col-lg-3">
					<input type = "submit"  class="col-md-3 form-control btn btn-primary btn-md" name = "sub" value="-" />
				</div>
				<div class="col-lg-3">
					<input type = "submit"  class="col-md-3 form-control btn btn-primary btn-md" name = "divide" value="/" />
				</div>
				<div class="col-lg-3">
					<input type = "submit"  class="col-md-3 btn btn-primary btn-md form-control" name = "multiply" value="*" />
				</div>
				
			</div>

			<div class="row" style="margin-top: 25px;">
					<div class="form-group">
							<div class="col-md-3"><label for="result" class="control-label col-md-3">Result</label></div>
						
				     	<div class="col-md-9">
				     		<input type = "text" id="result" readonly="" class="col-md-9 form-control" name = "result" value="<?php if(isset($ans)){ echo $ans; } ?>" />
				     	</div>
				     </div>
				
			</div>



			<div class="row " style="margin-top: 25px; margin-left: 160px;">
					<div class="form-group ">
							
						
				     	<div class="col-md-5 ">
				     		<input type = "submit" id="reset" class="col-md-5 col-offset-md-5  form-control btn btn-primary" name = "reset" value="RESET" />
				     	</div>
				     </div>
				
			</div>

		</div>
		</form>
		</div>
	</div>
	
</body>
</html>