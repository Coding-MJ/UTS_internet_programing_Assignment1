<?php
session_start();

$delete_name = isset($_POST['delete_name'])? htmlspecialchars($_POST['delete_name'], ENT_QUOTES, 'utf-8') : '';

if($delete_name != '') unset($_SESSION['products'][$delete_name]);

$total = 0;
$products = isset($_SESSION['products'])? $_SESSION['products']:[];


foreach($products as $name => $product){
	$subtotal = (int)$product['unit_price']*(int)$product['count'];
	$total += $subtotal;
}

$name = isset($_POST['product_name'])? htmlspecialchars($_POST['product_name'], ENT_QUOTES, 'utf-8') : '';
$price = isset($_POST['unit_price'])? htmlspecialchars($_POST['unit_price'], ENT_QUOTES, 'utf-8') : '';
$count = isset($_POST['count'])? htmlspecialchars($_POST['count'], ENT_QUOTES, 'utf-8') : '';

?>


<?php

if(isset($_SESSION['products'])){
	$products = $_SESSION['products'];
	foreach($products as $key => $product){
 		if($key == $name){ 
			$count = (int)$count + (int)$product['count'];
		}
	}
}

if($name!=''&&$count!=''&&$price!=''){
	$_SESSION['products'][$name]=[
		'count' => $count,
		'unit_price' => $price
	];
}

$products = isset($_SESSION['products'])? $_SESSION['products']:[];
?>

<!-- end add -->

<script>
function updateQuantity(name, price) {
	var quantity = parseInt(document.getElementsByName(name + 'unit_quantity')[0].value);
	if (quantity > 20) {
		alert('You cannot add more than 20 items of the same product');
		document.getElementsByName(name + 'unit_quantity')[0].value = 20;
		quantity = 20;
	}

	if (quantity === 50) {
		alert('You cannot proceed with an order of 20 items of the same product');
		document.getElementsByName(name + 'unit_quantity')[0].value = 1;
		quantity = 1;
	}

	var productPrice = quantity * price;
	document.getElementById(name + 'unit_price').innerHTML = '$' + productPrice;

	var total = 0;
	var prices = document.querySelectorAll('td[id$="unit_price"]');
	for (var i = 0; i < prices.length; i++) {
		total += parseFloat(prices[i].innerHTML.replace('$', ''));
	}

	document.getElementById('total').innerHTML = '$' + total;
}

</script>
<html>
	<head><title>cart</title>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>

<?php if(empty($products)): ?>
	<h4 class="empty-cart">shopping cart</h4>
	<p class="empty-cart">Your shopping cart is empty.</p>

	

<?php else: ?>
	<div class="cart__table">


	<table class="cart-table">
		<thead>
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($products as $name => $product): ?>
			<tr>
				<td label="product_name："><?php echo $name; ?></td>
				<td label="unit_price：" class="text-right">$<?php echo $product['unit_price']; ?></td>
				<td label="unit_quantity" class="text-right">
					<input type="number" name="<?php echo $name; ?>unit_quantity" 
					value="<?php echo $product['count']; ?>" min="1" max="20" onchange="updateQuantity('<?php echo $name; ?>', <?php echo $product['unit_price']; ?>)"></td>
				<td label="unit_price" class="text-right" id="<?php echo $name; ?>unit_price">$<?php echo $product['unit_price']*$product['count']; ?></td>
				<td>
					<form action="cart.php" method="post">
					<input type="hidden" name="delete_name" value="<?php echo $name; ?>">
				<button type="submit" class="delete-btn">Delete</button>
				</form>
				</td>
			</tr>
			<?php endforeach; ?>
			<tr class="total">
				<th colspan="3" class="text-center">Total</th>
				<td class="text-right" id="total">$<?php echo $total; ?></td>
			</tr>
		</tbody>
	</table>
				

		<div class="cart-btn">
			<button type="button" class="checkout-btn" onclick="location.href='checkout.php'" onsubmit="return validateQuantity();" <?php if(empty($products)) echo 'disabled="disabled"'; ?>>Checkout</button>
		</div>
	</div>
	</div>
	<?php endif; ?>
	</body>
</html>	
		