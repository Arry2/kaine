<?php
include("conn.php");
$id=$_GET['id'];
$del="DELETE from donation where donid='$id'";
$delex=mysqli_query($conn,$del);
if ($delex) {
    # code...
    echo"<script>window.alert('donation deleted'),window.location.href='index.php'</script>";
} else {
    # code...
    echo"<script>window.alert('donation delete failed'),window.location.href='index.php'</script>";
}

?>
