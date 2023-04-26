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
	<h1>Order Sheet</h1>
	<form name="orderForm" action="processOrder.php" onsubmit="return validateForm()" method="post">
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><input type="text" name="address"></td>
			</tr>
			<tr>
				<td>Suburb:</td>
				<td><input type="text" name="suburb"></td>
			</tr>
			<tr>
				<td>State:</td>
				<td><input type="text" name="state"></td>
			</tr>
			<tr>
				<td>Country:</td>
				<td><input type="text" name="country"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email"></td>
			</tr>
		</table>
		<br>
		<input type="submit" value="Submit Order">
	</form>
</body>
</html>