<?php
include("conn.php");
$id=$_GET['id'];
$del="DELETE from donors where did='$id'";
$delex=mysqli_query($conn,$del);
if ($delex) {
    # code...
    echo"<script>window.alert('donor deleted'),window.location.href='donor.php'</script>";
}else {
    # code...
    echo"<script>window.alert('donor deleted failed'),window.location.href='donor.php'</script>";
}

?>