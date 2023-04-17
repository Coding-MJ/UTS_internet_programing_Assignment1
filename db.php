<?php


   //create a connection to the database 
$link = mysqli_connect('localhost:3309', 'root', '', 'assignment1');

if (!$link)
  die("can not connect the DB");

$query_string = "select * from products";

//run the query and assign the return values to $result
$result = mysqli_query($link, $query_string);

//check the number of records returned using $num_rows
$num_rows = mysqli_num_rows($result);


$options= "<option>List of the products</option>";

//check if the $num_rows has values

if ($num_rows > 0) {
    while ($a_row = mysqli_fetch_assoc($result)) {
        $options = $options."\n"."<option>".$a_row['name']."</option>";
    }
}

	//add while loop to fetch the values using mysqli_fetch_assoc


	//use
        $options=$options."\n"."<option>"./* add here the films name using title column */"</option>";


//close the connection

 echo $options;

?>
