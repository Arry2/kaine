<?php
include("nav.php");
include("conn.php");
$id=$_GET['id'];
$qe="SELECT * from donation";
$qex=mysqli_query($conn,$qe);
$row=mysqli_fetch_array($qex);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .co{
        width: 15pc;
margin-top: 8pc;
    }
    </style>
</head>
<body>
    <center>
<div class="co">
    <h4>UPDATE DONATION</h4>
    <form action="" method="post">
        <input type="text" name="name" value="<?php echo $row['name']?>" class="form-control"><br>
    <input type="text" name="type" value="<?php echo $row['type']?>" class="form-control"><br>
    <input type="number" name="amount" value="<?php echo $row['amount']?>" class="form-control"><br>
    <input type="submit" name="update" value="update" class="form-control btn btn-info">
    </form>
    </center>
    </div>
    <?php
    if (isset($_POST['update'])) {
    # code...
    $a=$_POST['name'];
    $b=$_POST['type'];
    $c=$_POST['amount'];
    $up="UPDATE `donation` SET `name` = '$a', `type` = '$b', `amount` = '$c' WHERE donid ='$id'";
    $upex=mysqli_query($conn,$up);
    if ($upex) {
        # code...
       
       echo"<script>window.alert('donation updated'),window.location.href='index.php'</script>";
    }else {
        # code...
        echo"<script>window.alert('update failed'),window.location.href='index.php'</script>";
    }
}
?>
<?php
    include("footer.php");
    ?>
</body>
</html>