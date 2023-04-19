<!DOCTYPE html>
<html>
<head>
	<title>Thank You!</title>
</head>
<body>
	<h1>Thank You for Your Order!</h1>
	<p>We appreciate your business and your order has been placed.</p>
	<p>Here are the details of your order:</p>

	<?php
		// Get the order details from the POST request
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$suburb = $_POST['suburb'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$item_name = $_POST['item_name'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];

		// Print out the order details
		echo "<p><strong>Name:</strong> $name</p>";
		echo "<p><strong>Email:</strong> $email</p>";
		echo "<p><strong>Address:</strong> $address</p>";
		echo "<p><strong>Suburb:</strong> $suburb</p>";
		echo "<p><strong>State:</strong> $state</p>";
		echo "<p><strong>Country:</strong> $country</p>";
		echo "<p><strong>Item Name:</strong> $item_name</p>";
		echo "<p><strong>Quantity:</strong> $quantity</p>";
		echo "<p><strong>Price:</strong> $price</p>";

		// Send an email notification to the store owner
		$to = "storeowner@example.com";
		$subject = "New Order Placed";
		$message = "A new order has been placed with the following details:\n\nName: $name\nEmail: $email\nAddress: $address\nSuburb: $suburb\nState: $state\nCountry: $country\nItem Name: $item_name\nQuantity: $quantity\nPrice: $price";
		$headers = "From: orders@example.com" . "\r\n" .
			"Reply-To: orders@example.com" . "\r\n" .
			"X-Mailer: PHP/" . phpversion();
		mail($to, $subject, $message, $headers);
	?>
</body>
</html>