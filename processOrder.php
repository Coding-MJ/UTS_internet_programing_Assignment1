<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='style.css'>
        <script src="https://kit.fontawesome.com/e5ece60744.js" crossorigin="anonymous"></script>  
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <title>Market</title>  
        <link rel="icon" type="image/png" href="image/favicon.png" />
        <link rel="stylesheet" href="style.css">
        <script src="main.js" defer></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
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

              <nav class="sidebar card py-2 mb-4">
                <ul class="nav flex-column" id="nav_accordion">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php"> All </a>
                  </li>
                  <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> Frozen <i class="bi small bi-caret-down-fill"></i> </a>
                    <ul class="submenu collapse">
                      <li><a class="nav-link" href="index.php?q=Fish+Finger">Fish Finger </a></li>
                        <li><a class="nav-link" href="index.php?q=Hamburger+Patties">Hamburger Patty </a></li>
                        <li><a class="nav-link" href="index.php?q=Shelled+Prawns">Shelled Prawns</a> </li>
                        <li><a class="nav-link" href="index.php?q=Tub+Ice+Cream">Tub Ice Cream</a> </li>
                    </ul>
                  </li>
                  <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> health <i class="bi small bi-caret-down-fill"></i> </a>
                    <ul class="submenu collapse">
                      <li><a class="nav-link" href="index.php?q=Panadol">Panadol</a></li>
                        <li><a class="nav-link" href="index.php?q=Bath+Soap">Bath Soap</a></li>
                        <li><a class="nav-link" href="index.php?q=Garbage+Bags">Garbage Bags</a></li>
                        <li><a class="nav-link" href="index.php?q=Washing+Powder">Washing Powder</a></li>
                        <li><a class="nav-link" href="index.php?q=Laundry+Bleach">Laundry Bleach</a></li>
                    </ul>
                  </li>
                  <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> fresh <i class="bi small bi-caret-down-fill"></i> </a>
                    <ul class="submenu collapse">
                      <li><a class="nav-link" href="index.php?q=Cheddar+Cheese">Cheese</a></li>
                        <li><a class="nav-link" href="index.php?q=T+Bone+Steak">Steak</a></li>
                        <li><a class="nav-link" href="index.php?q=Navel+Oranges">Oranges</a></li>
                        <li><a class="nav-link" href="index.php?q=Bananas">Bananas</a></li>
                        <li><a class="nav-link" href="index.php?q=Peaches">Peaches</a></li>
                        <li><a class="nav-link" href="index.php?q=Grapes">Grapes</a></li>
                        <li><a class="nav-link" href="index.php?q=Apples">Apples</a></li>
                    </ul>
                  </li>
                  <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> beverage <i class="bi small bi-caret-down-fill"></i> </a>
                    <ul class="submenu collapse">
                      <li><a class="nav-link" href="index.php?q=Earl+Grey+Tea+Bags">Tea</a></li>
                        <li><a class="nav-link" href="index.php?q=Instant+Coffee">Coffee</a></li>
                        <li><a class="nav-link" href="index.php?q=Chocolate+Bar">Chocolate</a></li>
                    </ul>
                  </li>
                  <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> pet <i class="bi small bi-caret-down-fill"></i> </a>
                    <ul class="submenu collapse">
                      <li><a class="nav-link" href="index.php?q=Dry+Dog+Food">Dog</a></li>
                        <li><a class="nav-link" href="index.php?q=Bird">Bird</a></li>
                        <li><a class="nav-link" href="index.php?q=Cat">Cat</a></li>
                        <li><a class="nav-link" href="index.php?q=Fish+Food">Fish</a></li>
                    </ul>
                  </li>
                </ul>
                </nav>
            </div>          
        </section>



        <!-- Main -->
        <section id="main">
          <div class="section__container">

          <div class="main__top-level">
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
      </section>
	  </section>
</body>
</html>