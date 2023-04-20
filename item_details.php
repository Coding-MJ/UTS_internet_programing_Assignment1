<?php




if (isset($_GET['id'])) {
 $id = $_GET['id'];




$query = "SELECT * FROM products WHERE id = $id";

$result = mysqli_query($connection, $query);



// Display the product details

if (mysqli_num_rows($result) > 0) {

$row = mysqli_fetch_array($result);
echo '<h2 class="margin1">' . $row['productName'] . '</h2>';
echo '<img src="images/' . $row['productName'] . '.png" alt="img">';

echo '<p class="margin2">$' . $row['price'] . ' per item</p>';

echo '<p class="margin2">Number of Stock: ' . $row['stock'] . '</p>';




// Check if the product is in stock
// Display the add-to-cart form
if ($row['stock'] > 0) {



echo '<form action="index.php" method="POST">';

echo '<input type="hidden" name="productName" value="' . $row['productName'] . '">';

echo '<input type="hidden" name="price" value="' . $row['price'] . '">';

echo '<label class="margin2" for="quantity">Quantity:</label>';

echo '<input type="number" name="quantity" id="quantity" value="1">';

echo '<p class="margin2"> The product from Australia </p>';

echo '<button type="submit" class="btn-sm btn-blue margin2">Add to Cart</button>';
 echo '</form>';

} else {


 echo '<p class="margin2">This item is currently out of stock.</p>';

 }

} else {



 echo '<p>Invalid product ID.</p>';

 }
// Display an error message if the product ID is not provided
} else {



 echo '<p>Product ID not specified.</p>';

}




?>