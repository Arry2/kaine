<?php
include("conn.php");
session_start();
session_destroy();

echo"<script>window.alert('the system says you have logged out successful'),window.location.href='login.php'</script>";
?>