<?php

include_once 'Constants.php';
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWD,DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//display records for the page number that was queried
if(isset($_GET['page']) && $_GET['page']!=0){
	$page = $_GET['page'];
}else{
	$page=1;
}

$limit = 5;
$start_from = ($page-1) * $limit;
$paginatedQuery = "SELECT * FROM Orders LIMIT $start_from,$limit";
$paginatedResult = $conn->query($paginatedQuery);  
if($paginatedResult->num_rows > 0){
?>
<br>
<table>  
	<thead>  
		<tr>  
			<th>Order ID</th>   
			<th>CustomerName</th>  
		</tr>  
	</thead>  
	<tbody>
<?php
// output data of each row as new table entries
while($row = $paginatedResult->fetch_assoc()){
?>
		<tr> 
			<td><?php echo "<a href='OrderDetails.php?orderId=". $row["ID"]. "'>". $row["ID"]."</a>";?></td>    
            <td><?php echo $row["CustomerName"]; ?></td>  
        </tr>
<?php
	}?>
	</tbody>
</table>
<?php
}
 else 
    echo "0 results";

//calculate the number of records to display the page numbers as anchors 
$totalRecCntQuery = "SELECT COUNT(*) as recCnt FROM Orders";

$totalRecCnt = $conn->query($totalRecCntQuery);
$total_records = $totalRecCnt->fetch_assoc()['recCnt'];
if($total_records > 0){	
$total_pages = ceil($total_records / $limit);  
$pagLink = "<br><div>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<a href='ShowEntries.php?page=".$i."'>".$i."    </a>";  
};  
echo $pagLink . "</div>"; 	
}  
echo "<p>Total Orders : ".$total_records."</p>"
?> 























