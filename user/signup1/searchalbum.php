<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
        Search Albums
</title>
</head>

<!-- img source: https://www.pexels.com/photo/black-and-silver-headphones-on-black-surface-3721941/ -->
<body style="background: url(bgimage.png) no-repeat; background-size: cover; color:white;" >
	<center>
		<h1>Search Albums</h1>
	</center>

<form method="post" name = "album" action="searchalbum.php">

<table>
	<tr>
		<td><b>Enter Album Name:</b></td>
		<td><input type="text" id="album" name="albumName"size = "30" placeholder="Album Name" /></td>
		<td>
		<button type="submit" class="btn btn-info">Search</button>
		</td>
	</tr>
</table>
<br><br>

<table border="3" height="50%" width="50%"
bordercolor="white" align=left cellpadding ="10" >

<tr>
	<th>Album Name</th>
	<th>Genre</th>
	<th>Release Year</th>
</tr> 
<?php
	session_start();
	include 'webpage.php';
	if(!empty($_POST['albumName'])){	
		$albumName=$_POST['albumName'];
		$albumName = str_replace ("'","\'",$albumName);
		trim($albumName);
		$sql = "SELECT * FROM album WHERE title LIKE '$albumName%'";
		$query = mysqli_query($connection, $sql);
	
	while($row = mysqli_fetch_assoc($query)){
		echo "<tr>";
		echo "<td>".$row['title']."</td>";
		echo "<td>".$row['genre']."</td>";
		echo "<td>".$row['releaseyear']."</td>";
		echo "</tr>";
	}
}
?>
</form>
</body>
</html>