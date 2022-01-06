<?= $this->extend('layouts\user_home_view') ?>
<?= $this->section('content') ?>
    <br>
    <form method="post">
        <select name="lstcat">
            <?php if(@$category) { foreach ($category as $v) { ?>
                <option value="<?= $v->category_id ?>" <?php if(@$cat==$v->category_id) echo 'selected'; ?>><?= $v->category_name ?></option>
            <?php } } ?>
        </select>
        <input type="submit" name="submit" value="Search">
    </form>
    <br>
        <table border="2" >
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php if(@$items) { foreach ($items as $v) { ?>
            <tr>
                <td><?= $v->id ?></td>
                <td><?= $v->name ?></td>
                <td><?= $v->price ?></td>
                <td><?= $v->quantity ?></td>
                <td><?= $v->category_name ?></td>
                <td><img src="<?= base_url().'/public/product_image/'.$v->image ?>" height=80 width=80></td>
                <td><a href="<?= site_url().'/User/add_to_cart/'.$v->id.'/'.$v->name.'/'.$v->price ?>">Add to Cart</a>
                </td>
            </tr>
        <?php } } ?>
        </table>
    
<?= $this->endSection() ?>