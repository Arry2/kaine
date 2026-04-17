<?php
include("nav.php");
include("conn.php");
$id=$_GET['id'];
$qe="select donors.donid,donors.fname,donors.lname,donors.sex,donors.date,donors.email,donors.language,donation.name from donors,donation where donation.donid=donors.donid";
$qex=mysqli_query($conn,$qe);
$rw=mysqli_fetch_array($qex);
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
margin-top: 5pc;
}
    </style>
</head>
<body>
    <center>
    <div class="co">
   <h4>UPDATE DONOR</h4>
    <form action="" method="post">
       
        <input type="text" name="fname" value="<?php echo $rw['fname']?>" class="form-control"><br>
        <input type="text" name="lname" value="<?php echo $rw['lname']?>" class="form-control"><br>
    <input type="radio" name="gender" value="male"<?php if ($rw['sex']=='male')  {echo"checked";
        }?>>MALE
    <input type="radio" name="gender" value="female"<?php if ($rw['sex']=='female')  {echo"checked";
        }?>>FEMALE
    <input type="email" name="email" value="<?php echo $rw['email']?>" class="form-control"><br>
    <?php
    $language=explode(',',$rw['language']);?>
    <input type="checkbox" name="lang[]"value="kinyarwanda" <?php if(in_array('kinyarwanda',$language)){ 
        echo"checked";}?>  >KINYARWANDA
    <input type="checkbox" name="lang[]" value="english" <?php   if(in_array('english',$language)){ 
        echo"checked";}?>>ENGLISH
    <input type="checkbox" name="lang[]" value="french" <?php   if(in_array('french',$language)){ 
        echo"checked";}?>>FRENCH
    <input type="checkbox" name="lang[]" value="kiswahili" <?php   if(in_array('kiswahili',$language)){ 
        echo"checked";}?>>KISWAHILI
        <br><br>
   <select name="name" class="form-control">
   <option value="<?php echo $rw['donid']?>"><?php echo $rw['name']?></option>
    <?php
    $sw="SELECT * from donation";
    $swx=mysqli_query($conn,$sw);
    while($row=mysqli_fetch_array($swx)){
    ?>
    <option value="<?php echo $row['donid']?>"><?php echo $row['name']?></option>
    <?php
    }
    ?>
   </select><br>
    <input type="submit" name="update" value="update" class="form-control btn btn-info">
    </form>
    </center>
    </div>
    <?php
    if (isset($_POST['update'])) {
    # code...
    $a=$_POST['fname'];
    $b=$_POST['lname'];
    $c=$_POST['gender'];
    $d=$_POST['email'];
    $e=implode(',',$_POST['lang']);
   $f=$_POST['name'];
    $up="UPDATE `donors` SET `fname` = '$a', `lname` = '$b', `sex` = '$c', `email` = '$d', `language` = '$e', `donid` = '$f' WHERE did = '$id'";
    $upex=mysqli_query($conn,$up);
    if ($upex) {
        # code...
       
       echo"<script>window.alert('donor updated'),window.location.href='donor.php'</script>";
    }else {
        # code...
        echo"<script>window.alert('failed to update'),window.location.href='donor.php'</script>";
    }
}
?>
<?php
    include("footer.php");
    ?>
</body>
</html>