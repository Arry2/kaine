<?php
include("nav.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table table-hower table-bordered table-striped">
        <tr>
            <th>NAMES</th>
            <th>DATE</th>
            <th>DONOTION NAME</th>
        </tr>
        <?php
        include("conn.php");
        $sel=" select donors.fname,donors.lname,donors.date,donation.name from donors,donation where donation.donid=donors.donid";
        $ex=mysqli_query($conn,$sel);
        while ($row=mysqli_fetch_array($ex)) {
            # code...
        
        ?>
        <tr>
            <td><?php echo $row['fname'].' '.$row['lname']?></td>
            <td><?php echo $row['date']?></td>
            <td><?php echo $row['name']?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
    include("footer.php");
    ?>
</body>
</html>