<?php
include("nav.php");
include("conn.php");
if (isset($_POST['submit'])) {
    # code...
    $a=$_POST['fname'];
    $b=$_POST['lname'];
    $c=$_POST['gender'];
    $d=$_POST['email'];
    $e=implode(',',$_POST['lang']);
    $f=$_POST['name'];
    $ins="INSERT INTO donors values(null,'$a','$b','$c',current_date(),'$d','$e','$f')";
    $inex=mysqli_query($conn,$ins);
    if ($inex) {
        # code...
       
       echo"<script>window.alert('donor added'),window.location.href='donor.php'</script>";
    }else {
        # code...
        echo"<script>window.alert('insert failed'),window.location.href='donor.php'</script>";
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
        .co{
            width: 20pc;
            padding-right: -5pc;
        }
        .co2{
            width: 60pc;
            padding-left: 10pc;
        }
        .container{
            margin-top: 5pc;
            display: flex;
            justify-content: space-between;
            width:150pc;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="co">
            <h4>ADD DONOR</h4>
    <form action="" method="post">
        <input type="text" name="fname" placeholder="ENTER FIRST NAME" class="form-control"><br>
        <input type="text" name="lname" placeholder="ENTER LAST NAME" class="form-control"><br>
    <input type="radio" name="gender" value="male">MALE
    <input type="radio" name="gender" value="female">FEMALE
    <input type="email" name="email" placeholder="ENTER EMAIL" class="form-control"><br>
    <input type="checkbox" name="lang[]" value="kinyarwanda">KINYARWANDA
    <input type="checkbox" name="lang[]" value="english">ENGLISH
    <input type="checkbox" name="lang[]" value="french">FRENCH
    <input type="checkbox" name="lang[]" value="kiswahili">KISWAHILI
<br><br>
   <select name="name" class="form-control">
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
    <input type="submit" name="submit" value="submit" class="form-control btn btn-info">
    </form>
</div>
<div class="co2">
    <h4>LIST OF DONORS</h4>
    <table class="table table-hower table-bordered table-striped">
        <tr>
            <th>DONOR NAME</th>
            <th>GENDER</th>
            <th>DATE</th>
            <th>EMAIL</th>
            <th>LANGUAGE</th>
            <th>DONATION</th>
            <th>ACTION</th>
        </tr>
        <?php
        $sel="select donors.did,donors.fname,donors.lname,donors.sex,donors.date,donors.email,donors.language,donation.name from donors,donation where donation.donid=donors.donid";
        $selex=mysqli_query($conn,$sel);
        while ($rw=mysqli_fetch_array($selex)) {
            # code...
       
        ?>
        <tr>
            <td><?php echo $rw['fname'].' '.$rw['lname']?></td>
            <td><?php echo $rw['sex']?></td>
            <td><?php echo $rw['date']?></td>
            <td><?php echo $rw['email']?></td>
            <td><?php echo $rw['language']?></td>
            <td><?php echo $rw['name']?></td>
            <td>
                <a class="btn btn-info" href="updated.php?id=<?php echo $rw['did']?>">update</a>
                <a onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE')" class="btn btn-danger" href="deleted.php?id=<?php echo $rw['did']?>">delete</a>
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