<?php
include("conn.php");
if (isset($_POST['register'])) {
    # code...
    $a=$_POST['uname'];
    $b=$_POST['pass'];
    $ins="INSERT INTO users values(null,'$a','$b')";
    $inex=mysqli_query($conn,$ins);
    if ($inex) {
        # code...
       
       echo"<script>window.alert('user registered'),window.location.href='login.php'</script>";
    }else {
        # code...
        echo"<script>window.alert('user exist'),window.location.href='reg.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
.co{
    width: 15pc;
    margin-top: 8pc;
}
.co2{
    box-shadow: 0 0 30px black;
    background-color: orange;
}
    </style>
</head>
<body>
    <center>
        <div class="co2">
    <h1>KAINE FC DONOR MANAGEMENT SYSTEM</h1>
    </div>
    <div class="co">
        <a href="login.php">BACK</a>
    <h4>REGISTER HERE</h4>
    <form action="" method="post">
        <input type="text" name="uname" placeholder="ENTER USERNAME" class="form-control"><br>
   <input type="password" name="pass" placeholder="ENTER PASSWORD" class="form-control"><br>
<input type="submit" name="register" value="register" class="form-control btn btn-info">   <br>
   
</form>
</center>
</div>
<?php
    include("footer.php");
    ?>
</body>
</html>