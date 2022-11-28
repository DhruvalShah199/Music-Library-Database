<?php
session_start();

include "access.php";
access('ARTIST');
$match=0;
$success=0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'webpage.php';
$songName = $_POST['songName'];
$songName = str_replace ("'","\'",$songName);
trim($songName);
$duration = $_POST['duration'];
$albumId = $_POST['albumId'];

$sql="select * from `songs` where
song_Name='$songName'";

$result=mysqli_query($connection, $sql);

if ($result){
	$num=mysqli_num_rows($result);
	if($num>0){
		$match=1;
	}
	else{
		$sql="insert into `songs`(song_Name, duration, Album_Id)
		 values('$songName','$duration', '$albumId')";

		$result = mysqli_query($connection, $sql);
		if ($result) {
			$success=1;

		} else {
			die(mysqli_error($connection));
		}

	}
}
}
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
        Add Songs
</title>
</head>

<!-- img source: https://www.pexels.com/photo/black-and-silver-headphones-on-black-surface-3721941/ -->
<body style="background: url(bgimage.png) no-repeat; background-size: cover; color:white;" >

<?php 
if($match){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>OOPS!</strong> Song name already exisits!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!!</strong> You\'ve added a song!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>
	<center>
		<h1>Add Songs</h1>
	</center>

<form method="post" name = "Songs" action="addsongs.php">

  <div class="form-group">
    <label for="formGroupExampleInput">Enter Song Name: </label>
    <input required class="form-control" type="text" id="songName" name="songName"size = "30" placeholder="Song Name"/>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Enter duration of Song: </label>
    <input input required class="form-control" type="number" step="0.01" id="duration" name="duration"size = "30" placeholder="Song Duration" />
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Enter Album Id: </label>
    <input type="number" id="albumId" name="albumId"size = "30" placeholder="Album ID" />
    <small class="form-text text-muted">Entering an Album ID is optional!</small>
  </div>
  <br><br>

		<td><button type="submit" class="btn btn-info">Create</button></td>
<br><br><br><br>


<table border="3" height="50%" width="50%"
bordercolor="white" align=left cellpadding ="10" >

<tr>
    <th>Song Id</th>
    <th>Song Name</th>
    <th>Duration</th>
    <th>Album Id</th>
</tr> 

<tbody>
	<?php
	    include 'webpage.php';
		$sql_Query = "SELECT S.song_Id, S.song_Name, S.duration, S.Album_Id FROM album A, makes M, artist AR, songs S 
		WHERE A.album_Id = M.album_Id and  M.artist_Id = AR.artist_Id and M.album_Id = S.Album_Id and AR.user_Id=" . $_SESSION['id'];
		$query = mysqli_query($connection, $sql_Query);
		while($row = mysqli_fetch_assoc($query)){
			echo "<tr>";
			echo "<td>".$row['song_Id']."</td>";
			echo "<td>".$row['song_Name']."</td>";
			echo "<td>".$row['duration']."</td>";
			echo "<td>".$row['Album_Id']."</td>";
			echo "</tr>";
		}
		?>
		</tbody>
</form>
</body>
</html>