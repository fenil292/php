<?php
	if(@$ins_res)
		echo "<script>alert('Item Successfully Inserted...')</script>";
	if(@$up_res)
		echo "<script>alert('Item Successfully Updated...')</script>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
<center>
	<h1>Admin Home</h1>
	<a href="<?= site_url()."/Login/logout" ?>">Logout</a>
<?php 
	if(@$validation) {
		echo $validation->listErrors();
	}
	//print_r(@$up_rec);
 ?>
<form method="post" enctype="multipart/form-data">
	<table border="2">
		<caption><h2>Item</h2></caption>
		<tr>
			<th>Name</th>
			<td><input type="text" name="txtname" required="" value="<?php echo @$up_rec['name'] ?>"></td>
		</tr>
		<tr>
			<th>Price</th>
			<td><input type="text" name="txtprice" required="" value="<?php echo @$up_rec['price'] ?>"></td>
		</tr>
		<tr>
			<th>Quantity</th>
			<td><input type="text" name="txtqty" required="" value="<?php echo @$up_rec['quantity'] ?>"></td>
		</tr>
		<tr>
			<th>Category</th>
			<td>
				<select name="lstcat" required="">
				<?php
					foreach (@$rec as $v) { ?>
					<option value="<?= $v->category_id ?>" <?php if(@$up_rec['category']==$v->category_id) {
						echo 'selected';
					} ?>> <?= $v->category_name ?></option>	
				<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="photo"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="submit" value="Insert">
				<input type="submit" name="submit" value="Update">
			</td>
		</tr>
	</table>
</form>
<br>
<table border="2">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Category</th>
		<th>Image</th>
		<th>Action</th>
	</tr>
	<?php foreach (@$items as $v) { ?>
		<tr>
			<td><?= $v->id ?></td>
			<td><?= $v->name ?></td>
			<td><?= $v->price ?></td>
			<td><?= $v->quantity ?></td>
			<td><?= $v->category_name ?></td>
			<td><img src="<?= base_url().'/public/product_image/'.$v->image/*.'/' ?>..<?= 'writable/product_image/'.$v->image*/ ?>" height=80 width=80></td>
			<td><a href="<?= site_url().'/Admin/index/'.$v->id ?>">Edit</a>|
			<a href="<?= site_url().'/Admin/delete/'.$v->id ?>">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
</center>
</body>
</html>