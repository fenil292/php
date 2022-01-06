<?= $this->extend('layouts\user_home_view'); ?>
<?= $this->section('content') ?>
<br>
        <table border="2" >
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <?php if(@$products) { foreach ($products as $k=>$v) { ?>
            <tr>
                <td><?= $k ?></td>
                <td><?= $v['name'] ?></td>
                <td><?= $v['price'] ?></td>
                <td><?= $v['qty'] ?></td>
                <td><a href="<?= site_url().'/User/view_cart/add/'.$k ?>"><h3>+</h3></a> | 
                    <a href="<?= site_url().'/User/view_cart/sub/'.$k ?>"><h3>-</h3></a> | 
                    <a href="<?= site_url().'/User/view_cart/remove/'.$k ?>">Remove</a>
                </td>
            </tr>
        <?php } } ?>
        </table>
        <?php if(@$products) { ?><h2><a href="<?= site_url()."/User/buy" ?>">BUY</a></h2><?php } ?>
<?= $this->endSection() ?>