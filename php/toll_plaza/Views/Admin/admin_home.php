<?php
    if(@$ins_res) echo "<script>alert('Record Successfully Inserted...')</script>";
    if(@$up_res) {echo "<script>alert('Record Successfully Updated...')</script>"; $up_rec=false;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <center>
        <a href="<?= site_url().'/Login/logout' ?>">Logout</a>
    <form method="post">
        <table border="2">
            <caption><h1>Fare</h1></caption>
            <tr>
                <th>Vehicle Type</th>
                <td>
                    <select name="vehicle_type" required="">
                        <option value="Two Wheeler" <?php if(@$up_rec->vehicle_type=="Two Wheeler") echo 'selected'; ?>>Two Wheeler</option>
                        <option value="Four Wheeler" <?php if(@$up_rec->vehicle_type=="Four Wheeler") echo 'selected'; ?>>Four Wheeler</option>
                        <option value="Three Wheeler" <?php if(@$up_rec->vehicle_type=="Three Wheeler") echo 'selected'; ?>>Three Wheeler</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Rate for Single</th>
                <td><input type="text" name="s_rate" required="" value="<?= @$up_rec->single_rate ?>"></td>
            </tr>
            <tr>
                <th>Rate for Double</th>
                <td><input type="text" name="d_rate" required="" value="<?= @$up_rec->double_rate ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Insert">
                    <input type="submit" name="submit" value="Update">
                </td>
            </tr>
        </table>
    </form> <br>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Vehicle Type</th>
            <th>Single rate</th>
            <th>Double rate</th>
            <th>Action</th>
        </tr>
        <?php if(@$fares) { foreach ($fares as $v) { ?>
            <tr>
                <td><?= $v->id ?></td>
                <td><?= $v->vehicle_type ?></td>
                <td><?= $v->single_rate ?></td>
                <td><?= $v->double_rate ?></td>
                <td><a href="<?php echo site_url().'/Admin/index/'.$v->id ?>">Edit</a>
                    <a href="<?php echo site_url().'/Admin/delete/'.$v->id ?>">Delete</a></td>
            </tr>
        <?php } }?>
    </table>
    </center>
</body>
</html>