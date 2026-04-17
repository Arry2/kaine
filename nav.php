<?php
include("conn.php");
session_start();
if (!isset($_SESSION['id'])) {
    # code...
    echo"<script>window.alert('access denied'),window.location.href='login.php'</script>";
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
        .c{
            box-shadow: 0 0 20px black;
            background-color: orange;
            height: 8pc;
        }
    </style>
</head>
<body>
    <div class="c">
    <CEnter>    <h1>KAINE FC DONOR MANAGEMENT SYSTEM</h1>
    <a class="btn btn-info" href="index.php">DONATION</a>
    <a class="btn btn-info" href="donor.php">DONOR</a>
    <a class="btn btn-info" href="report.php">REPORT</a>
    <a class="btn btn-info" href="logout.php">LOGOUT(<?php echo $_SESSION['name']?>)</a>
    </CEnter>
    </div>
   
</body>
</html>