<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div a  
        { 
            margin-right: 50px;
        }
        h3
        {
            margin: 0px;
            display: inline;
        }
    </style>
</head>
<body>
    <center>
        <h1>User Home</h1>
        <div>
            <a href="<?= site_url().'/User' ?>">Display Items</a>
            <a href="<?= site_url().'/User/view_cart' ?>">View Cart</a>
            <a href="<?= site_url().'/Login/logout' ?>">Log out</a>
        </div>
    <?php echo $this->renderSection('content') ?>
    </center>
</body>
</html>