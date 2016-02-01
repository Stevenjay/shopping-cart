<h1>Checkout</h1>

<table border="1">
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Description</th>
	<th>Quantity</th>
	<th>Item Cost</th>
	<th>Total Cost</th>
</tr>

<?php $grandTotal = 0; ?>


<?php foreach( $_SESSION['cart'] as $product ) : ?>

	<tr>
		<td><?= $product['id']; ?></td>
		<td><?= $product['name']; ?></td>
		<td><?= $product['description']; ?></td>
		<td><?= $product['quantity']; ?></td>
		<td>$<?= $product['price']; ?></td>
		<td>$<?= number_format($product['quantity'] * $product['price'], 2); ?></td>
	</tr>

<? $grandTotal += $product['quantity'] * $product['price']; ?>

<?php endforeach; ?>

<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td><strong><?= number_format($grandTotal, 2); ?></strong></td>
</tr>

</table>