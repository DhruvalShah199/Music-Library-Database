<?php

session_start();
if(!isset($_SESSION['email'])){
    header('location:loggedin.php');
}
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <style type="text/css">

            ul {
                margin:0;
                padding:0;
                text-align: left;
                list-style: square;
            }
            ul  li {
                padding: 2px 5px;
            }
</style>

<title>
        Main Menu
</title>

</script>
</head>
<!-- img source:https://st.depositphotos.com/1030956/5174/v/950/depositphotos_51746503-stock-illustration-music-notes-composition-musical-theme.jpg -->
<body style="background: url(menuimg.png) no-repeat; background-size: 120vmin;"  alink="purple" vlink="Magenta">

<font size = "4">
<b>Main Menu</b>
<br/>
<br/>

<script>function display_ct7() {
var x = new Date()
var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
hours = x.getHours( ) % 12;
hours = hours ? hours : 12;
hours=hours.toString().length==1? 0+hours.toString() : hours;

var minutes=x.getMinutes().toString()
minutes=minutes.length==1 ? 0+minutes : minutes;

var seconds=x.getSeconds().toString()
seconds=seconds.length==1 ? 0+seconds : seconds;

var month=(x.getMonth() +1).toString();
month=month.length==1 ? 0+month : month;

var dt=x.getDate().toString();
dt=dt.length==1 ? 0+dt : dt;

var x1="Date: " + month + "/" + dt + "/" + x.getFullYear(); 
x1=x1 + "\t" + "Time: " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
document.getElementById('ct7').innerHTML = x1;
display_c7();
 }
 function display_c7(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct7()',refresh)
}
display_c7()
</script>
<span id='ct7' style="background-color: #FFFFFF"></span>

<br />
<br />
<br />
<br />
<br />
<ul>
    <a href="createplaylist.php" target="mainbody"><li><b>Create Playlist</li></a>
    <a href="searchsong.php" target="mainbody"><li>Search Song</li></a>
    <a href="searchalbum.php" target="mainbody"><li>Search Album</li></a>
    <a href="searchartist.php" target="mainbody"><li>Search Artist</li></a>
    <a href="addsongs.php" target="mainbody"><li>Add Songs</li></a>
    <a href="addalbums.php" target="mainbody"><li>Add Albums</li></a>
    <a href="deletesongs.php" target="mainbody"><li>Delete Songs</li></a>
    <a href="deletealbums.php" target="mainbody"><li>Delete Albums</b></li></a>
</ul>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div class="container">
  <p style="text-align: left"> <a href="loggout.php" target="_parent" class="btn btn-primary mt-5">Logout</a> </p>
  </div>
</font>
</body>
</html>
