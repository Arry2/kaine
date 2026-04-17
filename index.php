<?php
include("nav.php");
include("conn.php");
if (isset($_POST['submit'])) {
    # code...
    $a=$_POST['name'];
    $b=$_POST['type'];
    $c=$_POST['amount'];
    $ins="INSERT INTO donation values(null,'$a',current_date(),'$b','$c')";
    $inex=mysqli_query($conn,$ins);
    if ($inex) {
        # code...
       
       echo"<script>window.alert('donation added'),window.location.href='index.php'</script>";
    }else {
        # code...
        echo"<script>window.alert('insert failed'),window.location.href='index.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            margin-top: 8pc;
            display: flex;
            justify-content: space-between;
            width: 60pc;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="co1">
<h4>ADD DONATION</h4>
<form action="" method="post">
    <input type="text" name="name" placeholder="ENTER DONATION NAME" class="form-control"><br>
    <input type="text" name="type" placeholder="ENTER TYPE" class="form-control"><br>
    <input type="number" name="amount" placeholder="ENTER AMOUNT" class="form-control"><br>
    <input type="submit" name="submit" value="submit" class="form-control btn btn-info">
    </form>
    </div>
    <div class="co2">
        <h4>LIST OF ALL DONATIONS</h4>
    <table class="table table-hower table-bordered table-striped">
        <tr>
            <th>DONATION NAME</th>
            <th>DATE</th>
            <th>TYPE</th>
            <th>AMOUNT</th>
            <th>ACTION</th>
        </tr>
        <?php
        $sel="SELECT * from donation";
        $selex=mysqli_query($conn,$sel);
        while ($row=mysqli_fetch_array($selex)) {
            # code...
       
        ?>
        <tr>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['date']?></td>
            <td><?php echo $row['type']?></td>
            <td><?php echo $row['amount']?></td>
            <td>
                <a class="btn btn-info" href="updatedt.php?id=<?php echo $row['0']?>">update</a>
                <a onclick="return confirm('ARE SURE YOU WANT TO DELETE')" class="btn btn-danger" href="deletedt.php?id=<?php echo $row['0']?>">delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
    </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>