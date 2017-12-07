<?php
if (isset($_POST['add'])) {
    $prod_id = $_POST['idp'];
    $cust_id =$_POST['id'];

    $BD->query("INSERT INTO cart (prod_id,cust_id)  VALUES ('$prod_id', '$cust_id')  ") or die(mysqli_error());
    
    header("location: catalogoa.php");
}
?>