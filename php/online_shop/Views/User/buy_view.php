<!DOCTYPE html>
<html>
<head>
	<title>BUY</title>
</head>
<body>
	<center>
	<table border="2">
		<caption><h2>Your Bill</h2></caption>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Image</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total</th>
		</tr>
		<?php if(@$products) { $t=0; foreach ($products as $id => $v) { ?>
			<tr>
				<td><?= $id ?></td>
				<td><?= $v['name'] ?></td>
				<td><img src="<?= base_url().'/public/product_image/'.$v[0] ?>" width="50" height="50"></td>
				<td><?= $v['qty'] ?></td>
				<td><?= $v['price'] ?></td>
				<td><?php $t+=$v['qty']*$v['price']; echo $v['qty']*$v['price']; ?></td>
			</tr>
		<?php } } ?>
		<tr>
			<th colspan="5" align="center">Total Amount</th>
			<td><h3><b><?= @$t ?></b></h3></td>
		</tr>
	</table>
	</center>
</body>
</html>