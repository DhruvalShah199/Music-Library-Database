<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
        Playlist
</title>
</head>

<!-- img source: https://www.pexels.com/photo/black-and-silver-headphones-on-black-surface-3721941/ -->
<body style="background: url(bgimage.png) no-repeat; background-size: cover; color:white;">

	<center>
		<h1>
            <?php
                session_start();  
                include 'webpage.php';     
                $sql = "SELECT p.playlist_Name FROM playlist p, user u, add_playlist ad WHERE p.playlist_Id = ad.playlist_Id and u.id = ad.id and u.id=".$_SESSION['id'];
                $result = mysqli_query($connection, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['Playlist']."</td>";
                    echo "</tr>";
                }
            ?>
        </h1>
	</center>

<form method="post" name = "displayplaylist" action="displayplaylist.php">

<table border="3" height="50%" width="50%"
bordercolor="white" align=left cellpadding ="10" >

<tr><th>Song Name</th>
<th>Duration</th> </tr> 

<tbody>
	<?php
	    include 'webpage.php';
		$sql_Query = "SELECT s.song_Name, s.duration FROM songs s, playlist p, features f 
		WHERE p.playlist_Id = f.playlist_Id and s.song_Id = f.song_Id";

		$query = mysqli_query($connection, $sql_Query);
		
         while($row = mysqli_fetch_assoc($query)){
			echo "<tr>";
			echo "<td>".$row['song_Name']."</td>";
			echo "<td>".$row['duration']."</td>";
			echo "</tr>";
		}
	?>
</tbody>

</form>

</body>

</html>