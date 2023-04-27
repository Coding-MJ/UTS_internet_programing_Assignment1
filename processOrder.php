<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='style.css'>
        <script src="https://kit.fontawesome.com/e5ece60744.js" crossorigin="anonymous"></script>  
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <title>Order Sheet</title> 
        <link rel="icon" type="image/png" href="image/favicon.png" />
        <link rel="stylesheet" href="style.css">
        <script src="main.js" defer></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
	
		<script>
	function validateForm() {
		var name = document.forms["orderForm"]["name"].value;
		var address = document.forms["orderForm"]["address"].value;
		var suburb = document.forms["orderForm"]["suburb"].value;
		var state = document.forms["orderForm"]["state"].value;
		var country = document.forms["orderForm"]["country"].value;
		var email = document.forms["orderForm"]["email"].value;
		var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // email regular expression
		if (name == "" || address == "" || suburb == "" || state == "" || country == "" || email == "") {
			alert("Please fill out all required fields");
			return false;
		}
		else if (!emailRegex.test(email)) { // check if email is in valid format
			alert("Please enter a valid email address");
			return false;
		}
	}
</script>

</head>
    
<body>
    <section class="all">
      <!-- Navbar -->
      <nav id="navbar">
        <div class="navbar__logo">
          <a href="index.php"><i class="fa-solid fa-cart-shopping"></i> Market</a>
        </div>

        <!-- search bar -->
        <div class="navbar__search">
          <form id="search-form">
            <div class="searchbar">
              
              <input
                type="search"
                id="mySearch"
                name="q"
                placeholder="Search the site…" />
              <button class="search-button">Search</button>
            </div>
          </form>
        </div>
      </nav>

      <!-- container -->
      <section class="main__view">
        <!-- Side bar -->  
        <section id="side">
          <!-- Navbar top level menu -->
            <div class="side__menu">

            </div>          
        </section>



        <!-- Main -->
        <section id="main">
          <div class="section__container">
	<div class="checkout__form">
	<h1>Thank You for Your Order!</h1>
	<p>We appreciate your business and your order has been placed.</p>
	<p>Please check you e-mail</p>

	<?php
		// Get the order details from the POST request
		$name = isset($_POST['product_name'])? htmlspecialchars($_POST['product_name'], ENT_QUOTES, 'utf-8') : '';
		$price = isset($_POST['unit_price'])? htmlspecialchars($_POST['unit_price'], ENT_QUOTES, 'utf-8') : '';
		$count = isset($_POST['count'])? htmlspecialchars($_POST['count'], ENT_QUOTES, 'utf-8') : '';

		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$suburb = $_POST['suburb'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		// $item_name = $_POST['product_name'];
		// $quantity = $_POST['unit_quantity'];
		// $price = $_POST['unit_price'];

		// Print out the order details
		echo "<p><strong>Name:</strong> $name</p>";
		echo "<p><strong>Email:</strong> $email</p>";
		echo "<p><strong>Address:</strong> $address</p>";
		echo "<p><strong>Suburb:</strong> $suburb</p>";
		echo "<p><strong>State:</strong> $state</p>";
		echo "<p><strong>Country:</strong> $country</p>";


		// // Send an email notification to the store owner
		// $to = "storeowner@example.com";
		// $subject = "New Order Placed";
		// $message = "A new order has been placed with the following details:\n\nName: $name\nEmail: $email\nAddress: $address\nSuburb: $suburb\nState: $state\nCountry: $country\nItem Name: $item_name\nQuantity: $quantity\nPrice: $price";
		// $headers = "From: orders@example.com" . "\r\n" .
		// 	"Reply-To: orders@example.com" . "\r\n" .
		// 	"X-Mailer: PHP/" . phpversion();
		// mail($to, $subject, $message, $headers);
	?>

</div>
	</div>
        </div>
      </section>
	  </section>
</body>
</html>