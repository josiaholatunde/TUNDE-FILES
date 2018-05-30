<?php

	if(isset($_GET['mid'])) {
		$msg='';
		

		$dbId = $_GET['mid'];
		echo $dbId;
		$query5 = mysql_query("DELETE FROM task2 WHERE Id ='$dbId'");
		if(!$query5){
			die("Unable to execute query").mysql_error();
		}else{
			header("Location:todoassignment2.php?msg=Your todo has been successfully deleted");

		}

	
	


}


?>