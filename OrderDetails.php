
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Order Details: </p>
<?php

include_once 'Constants.php';
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWD,DB_NAME);

$orderId = $_GET['orderId'];
$orderQuery= "SELECT * FROM Orders WHERE ID=" . $orderId;
$result = $conn->query($orderQuery);
if($result->num_rows > 0){
	$rec = $result->fetch_assoc();
	$orderId = $rec['ID'];
	$frameMaterial = $rec['Frame_Material'];
	$customerName = $rec['CustomerName'];
	$location = $rec['Location'];?>
	<table>  
	<thead>  
		<tr>  
			<td>Order ID : </td>	<td><?php echo $orderId;?></td> 
		</tr>
		<tr>
			<td>Frame_Material : </td>	<td><?php echo $frameMaterial;?></td> 
		</tr>
		<tr>
			<td>CustomerName</td>	<td><?php echo $customerName;?></td>  
		</tr>	
		<tr>
			<td>Location</td>  <td><?php echo $location;?></td> 
		</tr>
	</thead>  
	<tbody>
</table>
<?php
}
else
	echo "Order Details Not Found";


?>

</body>
</html>