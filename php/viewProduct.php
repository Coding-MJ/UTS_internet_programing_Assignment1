<?php

// DB connection
$connection = mysqli_connect('localhost:3309', 'root', '', 'assignment1'); // servername, username, password, db_name
 

$made_after = $_REQUEST['earliest_made'];
$made_before = $_REQUEST['latest_made'];

$query_string ="select * from products where (id >= $made_after and id <= $made_before)"; // sql query
 
$result = mysqli_query($connection, $query_string); // retrieve MySQL
 
$num_rows = mysqli_num_rows($result);
echo "Displaying the results using associative array";

// using associative array
// mysql_fetch_assoc: This function will return a row as an associative array where the column names will be the keys storing corresponding value.
$row = mysqli_num_rows($result);
// echo $row['name'];

if ($num_rows > 0 ) {
    print "<table border='0'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['price']."</td>";
        echo "<td>".$row['quantity']."</td>";
        echo "<td>".$row['in_stock']."</td>";
        echo "</tr>";
    }
	// write the code here to get values using associative array
    print "</table>";
}

 
mysqli_close($connection);


?>