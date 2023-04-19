<!DOCTYPE html>
<html>
<head>
	<title>Order Sheet</title>
	<script>
		function validateForm() {
			var name = document.forms["orderForm"]["name"].value;
			var address = document.forms["orderForm"]["address"].value;
			var suburb = document.forms["orderForm"]["suburb"].value;
			var state = document.forms["orderForm"]["state"].value;
			var country = document.forms["orderForm"]["country"].value;
			var email = document.forms["orderForm"]["email"].value;
			if (name == "" || address == "" || suburb == "" || state == "" || country == "" || email == "") {
				alert("Please fill out all required fields");
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