<?php
$connection = mysqli_connect('localhost:3309', 'root', '', 'assignment1'); // servername, username, password, db_name

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  
  // Get product details from the database based on the product ID
  $query = "SELECT * FROM products WHERE product_id = '$id'";
  $result = mysqli_query($connection, $query);
  
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $product_name = $row['product_name'];
    $product_description = $row['product_name'];
    $product_price = $row['unit_price'];
    $product_image = $row['product_id'];
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
</head>
<body>
  <h1><?php echo $product_name; ?></h1>
  <img class="product__img" src="image/products/' . $row['product_id'] . '.jpg'" alt="img" class="card-img-top card-image" >


  <p><?php echo "the best " . $product_description . "in the world"; ?></p>
  <p>Price: <?php echo $product_price; ?></p>
</body>
</html>