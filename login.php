<?php
include("conn.php");
session_start();
if (isset($_POST['login'])) {
    # code...
    $a=$_POST['uname'];
    $b=$_POST['pass'];
    $ins="SELECT * from users where uname='$a' and password='$b'";
    $inex=mysqli_query($conn,$ins);
   if (mysqli_num_rows($inex)>0) {
    # code...
$row=mysqli_fetch_array($inex);
$_SESSION['id']=$row['uid'];
$_SESSION['name']=$row['uname'];
       echo"<script>window.alert('welcome'),window.location.href='index.php'</script>";
    }else {
        # code...
        echo"<script>window.alert('use correct credentials'),window.location.href='login.php'</script>";
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
    <h4>LOGIN HERE</h4>
    <form action="" method="post">
        <input type="text" name="uname" placeholder="ENTER USERNAME" class="form-control"><br>
   <input type="password" name="pass" placeholder="ENTER PASSWORD" class="form-control"><br>
<input type="submit" name="login" value="login" class="form-control btn btn-info">  <br> 
<a class="btn btn-success"href="reg.php">register</a>   
</form>
</div>
</center>
<?php
    include("footer.php");
    ?>
</body>
</html>