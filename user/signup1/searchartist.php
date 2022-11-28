<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
        Search Artists
</title>
</head>

<!-- img source: https://www.pexels.com/photo/black-and-silver-headphones-on-black-surface-3721941/ -->
<body style="background: url(bgimage.png) no-repeat; background-size: cover; color:white;" >
	<center>
		<h1>Search Artists</h1>
	</center>

<form method="post" name = "artist" action="searchartist.php">

<table>
	<tr>
		<td><b>Enter Artist Name:</b></td>
		<td><input type="text" id="artist" name="artistName"size = "30" placeholder="Artist Name"/></td>
		<td>
		<button type="submit" class="btn btn-info">Search</button>
		</td>
	</tr>
</table>
<br><br>

<table border="3" height="50%" width="50%"
bordercolor="white" align=left cellpadding ="10" >

<tr>
	<th>Artist Name</th>
	<th>Style</th>
	<th>Country</th>
</tr> 
<?php
	session_start();
	include 'webpage.php';
	if(!empty($_POST['artistName'])){	
		$artistName=$_POST['artistName'];
		$artistName = str_replace("'", "\'", $artistName);
		trim($artistName, "");
		$sql = "SELECT * FROM artist WHERE artist_Name LIKE '$artistName%'";
		$query = mysqli_query($connection, $sql);
	
	while($row = mysqli_fetch_assoc($query)){
		echo "<tr>";
		echo "<td>".$row['artist_Name']."</td>";
		echo "<td>".$row['Style']."</td>";
		echo "<td>".$row['Country']."</td>";
		echo "</tr>";
	}
}
?>
</form>
</body>
</html>