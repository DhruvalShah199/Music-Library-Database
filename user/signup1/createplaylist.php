<?php
session_start();
$match=0;
$success=0;
if(isset($_POST['create'])){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include 'webpage.php';
		$playlist = $_POST['playlist'];
		$playlist = str_replace ("'","\'",$playlist);
		trim($playlist);
		
		$sql="select * from `playlist` p join `add_playlist` up ON (p.playlist_Id = up.playlist_Id) where
		p.playlist_Name='$playlist' and up.id=".$_SESSION['id'];
		
		$result=mysqli_query($connection, $sql);
		
		if ($result){
			$num=mysqli_num_rows($result);
			if($num>0){
				$match=1;
			}
			else{
				$sql="insert into `playlist`(playlist_Name)
				values('$playlist')";
				$result = mysqli_query($connection, $sql);
				if ($result) {
					$last_id = $connection->insert_id;
					$sql2="insert into `add_playlist` (id, playlist_Id)	values(".$_SESSION['id'].", ".$last_id.")";
					$result = mysqli_query($connection, $sql2);
					$success=1;
				} else {
					die(mysqli_error($connection));
				}

			}
		}
	}
}
else if(isset($_POST['displayPlaylist'])){
	include 'webpage.php';


		$query = mysqli_query($connection, $sql_Query);
		
         while($row = mysqli_fetch_assoc($query)){
			echo "<tr>";
			echo "<td>".$row['song_Name']."</td>";
			echo "<td>".$row['duration']."</td>";
			echo "</tr>";
		}
}
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
        Create Playlist
</title>
</head>

<!-- img source: https://www.pexels.com/photo/black-and-silver-headphones-on-black-surface-3721941/ -->
<body style="background: url(bgimage.png) no-repeat; background-size: cover; color:white;" >

<?php 
if($match){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>OOPS!</strong> Playlist name already exisits!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!!</strong> You\'ve added a playlist!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>
	<center>
		<h1>Create Playlist</h1>
	</center>

<form method="post" name = "playlist" action="createplaylist.php">

<table>
	<tr>
		<td><b>Enter Playlist Name:</b></td>
		<td><input type="text" id="playlist" name="playlist"size = "30" placeholder="Playlist Name" /></td>
		<td>
		<button type="submit" class="btn btn-info" name="create">Create</button>
		</td>
	</tr>
</table>
<br><br>
<table border="3" height="50%" width="50%"
bordercolor="white" align=left cellpadding ="10" >

<tr><th>Playlist Name</th>
<th>Duration</th> 
<th>Show Playlist</th>
</tr> 

<tbody>
	<?php
	    include 'webpage.php';
		$sql_Query = "SELECT p.playlist_Id, p.playlist_Name, p.duration FROM playlist p, user u, add_playlist ad 
		WHERE p.playlist_Id = ad.playlist_Id and u.id = ad.id and u.id=".$_SESSION['id'];

		$query = mysqli_query($connection, $sql_Query);

		while($row = mysqli_fetch_assoc($query)){
			echo "<tr>";
			echo "<td>".$row['playlist_Name']."</td>";
			echo "<td>".$row['duration']."</td>";
			//echo "<td>"."<input class=\"btn btn-primary\" type=\"submit\" value=\"Show Playlist\" name=\"displayPlaylist\">"."</td>";
			$playlistId = $row['playlist_Id'];
			$sql = "SELECT s.song_Name, s.duration FROM songs s, features f 
			WHERE s.song_Id = f.song_Id and f.playlist_Id = $playlistId";
			$queryTwo = mysqli_query($connection, $sql);
			$duration = 0;
			echo "<td><ul>";
			while($rowTwo = mysqli_fetch_assoc($queryTwo)){
				echo "<li>".$rowTwo["song_Name"]." (".$rowTwo["duration"] .")</li>";
			}
			echo "</ul></td>";
			echo "</tr>";

		}
	?>
</tbody>
</form>
</body>
</html>