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
	<h1>Order Sheet</h1>
	<form name="orderForm" action="processOrder.php" onsubmit="return validateForm()" method="post">
		<table>
			<tr>
				<td class="checkout-text">Name<span style="color:red">*</span></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td class="checkout-text">Email<span style="color:red">*</span></td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td class="checkout-text">Address<span style="color:red">*</span></td>
				<td><input type="text" name="address"></td>
			</tr>
			<tr>
				<td class="checkout-text">Suburb<span style="color:red">*</span></td>
				<td><input type="text" name="suburb"></td>
			</tr>
			<tr>
				<td class="checkout-text">State<span style="color:red">*</span></td>
				<td><input type="text" name="state"></td>
			</tr>
			<tr>
				<td class="checkout-text">Country<span style="color:red">*</span></td>
				<td><input type="text" name="country"></td>
			</tr>

		</table>
		<br>
		<input type="submit" value="Place Order">
	</form>
	</div>
	</div>
        </div>
      </section>
	  </section>
</body>
</html>