<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:loggedin.php');  
}
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <!-- img source: https://www.eteach.com/media/5977883/header-image-background-music.jpg -->

<body style="background: url(music4.jpg) no-repeat; background-size: auto;" >

<center>
  <h1>Welcome 
    <?php
    if(isset($_SESSION['myName'])){
      echo $_SESSION['myName'];
    }
    ?>
    to the Music Library
  </h1>
</center>
</body>

</html>