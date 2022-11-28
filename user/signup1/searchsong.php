<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
        Search Songs
</title>

<style type="text/css">
	.users {
  table-layout: fixed;
  width: 100%;
  white-space: nowrap;
}
.users td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Column widths are based on these cells */
.row-sName {
  width: 25%;
}
.row-Duration {
  width: 25%;
}
.row-sPlayList {
  width: 25%;
}
.row-addToList {
  width: 25%;
}
</style>
</head>
<!-- Table source: https://css-tricks.com/fixing-tables-long-strings/ -->
<!-- img source: https://www.pexels.com/photo/black-and-silver-headphones-on-black-surface-3721941/ -->
<body style="background: url(bgimage.png) no-repeat; background-size: cover; color:white;" >
	<center>
		<h1>Search Song</h1>
	</center>

<form method="post" name = "searchsong" action="searchsong.php">

<table>
	<tr>
		<td><b>Enter Song Name:</b></td>
		<td><input type="text" id="song" name="songname"size = "30" placeholder="Song Name" /></td>
		<td>
			<button type="submit" class="btn btn-info">Search</button>
		</td>
	</tr>
</table>
<br><br>
</form>
<!-- <table border="3" height="50%" width="50%"
bordercolor="white" align=left cellpadding ="10" > -->
<table class="users" >

<tr>
	<th class="row 1 row-sName">Song Name</th>
	<th class="row 2 row-Duration">Duration</th>	
	<th class="row 3 row-sPlayList">Select playlist</th>
	<th class="row 4 row-addToList">Add to Playlist</th>
</tr>
</table>

<?php
	session_start();
	include 'webpage.php';
	
	if(isset($_POST['addToList']) && isset($_POST['PlayList'])){
		
		$sql="select * from `features` where
		 playlist_Id=".$_POST['PlayList']." and song_Id=".$_POST['songID'];

		$result=mysqli_query($connection, $sql);
		
		if ($result){
			$num=mysqli_num_rows($result);
			if($num>0){
				$match=1;
			}
			else{
				$sql="insert into `features`(playlist_Id, song_Id)
				values(".$_POST['PlayList'].", ".$_POST['songID'].")";
				$result = mysqli_query($connection, $sql);
				echo $_POST['duration'];
				$update = "update playlist set duration = ADDTIME(duration ,\"".$_POST['duration']."\") where playlist_Id =".$_POST['PlayList'];
				$updateResult = mysqli_query($connection, $update);
				}
			}
		}
		

	if(!empty($_POST['songname'])){	
		$songName=$_POST['songname'];
		$songName = str_replace("'", "\'", $songName);
		trim($songName, "");
		$arrayPlaylist = array();

		$selectOptions="<td>"."<select name=\"PlayList\" id=\"PlayList\"> 
		<option disabled selected value>- select a Playlist -</option>";

		$sqlTwo="select * from `playlist` p join `add_playlist` up ON (p.playlist_Id = up.playlist_Id) where up.id=".$_SESSION['id'];

		$queryTwo = mysqli_query($connection, $sqlTwo);
		while($row = $queryTwo->fetch_assoc()) {
			$selectOptions = $selectOptions."<option value=\"".$row["playlist_Id"]."\">".$row["playlist_Name"]."</option>";
		}
		$selectOptions = $selectOptions."</select>"."</td>";

		$sql = "SELECT * FROM songs WHERE song_Name LIKE '$songName%'";
		$query = mysqli_query($connection, $sql);
		while($row = mysqli_fetch_assoc($query)){
			echo "<form method=\"post\" name = \"submitForm\" action=\"searchsong.php\" >";
			echo "<input type=\"hidden\" name=\"songID\" value=\"".$row['song_Id']."\" />";
			echo "<input type=\"hidden\" name=\"songname\" value=\"".$songName."\" />";
			echo "<input type=\"hidden\" name=\"duration\" value=\"".$row['duration']."\" />";
			echo "<table class=\"users\" >";
			echo "<tbody>";
			echo "<tr>";
			echo "<td>".$row['song_Name']."</td>";
			echo "<td>".$row['duration']."</td>";
			echo $selectOptions;
			echo "<td>"."<input class=\"btn btn-primary\" type=\"submit\" value=\"Add To List\" name=\"addToList\">"."</td>";
			echo "</tr>";
			echo "</tbody>";
			echo "</table>";
			echo "</form>";
		}
	}
?>
</body>
</html>