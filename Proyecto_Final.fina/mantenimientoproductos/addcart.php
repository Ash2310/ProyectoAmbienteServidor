<?php

	if (isset($_POST['add']))
{
	
	
	$prod_id =$_POST['idp'];
	$cust_id =$_POST['id'];
	
		$conn->query ("INSERT INTO cart (idp,id)  VALUES ('$prod_id', '$cust_id')  ") or die(mysqli_error());
								
			header("location: product1.php");	
}
?>