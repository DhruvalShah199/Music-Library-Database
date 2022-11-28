<?php
session_start();

include "access.php";
access('ARTIST');
$match = 0;
$success = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include 'webpage.php';
	$albumName = $_POST['albumName'];
	$albumName = str_replace("'", "\'", $albumName);
	trim($albumName, "");
	$genre = $_POST['genre'];
	$genre = str_replace("'", "\'", $genre);
	trim($genre, "");
	$year = $_POST['year'];
	trim($year);

	$sql = "select * from `album` where
title='$albumName'";

	$artistquerry = "select artist_Id from `artist` where
user_Id=" . $_SESSION['id'];

	$result = mysqli_query($connection, $sql);
	$res = mysqli_query($connection, $artistquerry);

	if ($result) {
		$num = mysqli_num_rows($result);
		if ($num > 0) {
			$match = 1;
		} else {
			$sql = "insert into `album`(title, genre, releaseyear)
		 values('$albumName','$genre', '$year')";
			$result = mysqli_query($connection, $sql);
			$data = $res->fetch_all(PDO::FETCH_ASSOC);
			if (is_array($data) && count($data) > 0) {
				$_SESSION['artist_Id'] = $data[0][0]; // get Id
			}
			if ($result) {
				$last_id = $connection->insert_id;
				$queryTwo = "insert into `makes` (album_Id, artist_Id) values(" . $last_id . ", " . $_SESSION['artist_Id'] . ")";
				$result = mysqli_query($connection, $queryTwo);
				$success = 1;

			} else {
				die(mysqli_error($connection));
			}

		}
	}
}
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
	<title>
		Add Albums
	</title>
</head>

<!-- img source: https://www.pexels.com/photo/black-and-silver-headphones-on-black-surface-3721941/ -->

<body style="background: url(bgimage.png) no-repeat; background-size: cover; color:white;">

	<?php
if ($match) {
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>OOPS!</strong> Album name already exisits!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if ($success) {
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!!</strong> You\'ve added an Album!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>
	<center>
		<h1>Add Albums</h1>
	</center>

	<form method="post" name="Songs" action="addalbums.php">

		<div class="form-group">
			<label for="formGroupExampleInput">Enter Album Name: </label>
			<input required class="form-control" type="text" id="albumName" name="albumName" size="30"
				placeholder="Album Name" />
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput2">Enter Genre: </label>
			<input input required class="form-control" type="text" id="genre" name="genre" size="30"
				placeholder="Genre" />
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput2">Enter Release Year: </label>
			<input type="number" id="year" name="year" size="30" placeholder="Release Year xxxx" maxlength="4"
				pattern="\d{4}" />
		</div>
		<br><br>
		<td><button type="submit" class="btn btn-info">Create</button></td>
		<br><br><br><br>

		<table border="3" height="50%" width="50%" bordercolor="white" align=left cellpadding="10">

			<tr>
				<th>Album Id</th>
				<th>Title</th>
				<th>Genre</th>
				<th>Release Year</th>
			</tr>

			<tbody>
				<?php
    include 'webpage.php';
    $sql_Query = "SELECT A.album_Id, A.title, A.genre, A.releaseyear FROM 
			 album A, makes M, artist AR 
			 WHERE A.album_Id = M.album_Id and  M.artist_Id = AR.artist_Id and AR.user_Id=" . $_SESSION['id'];
    $query = mysqli_query($connection, $sql_Query);
    while ($row = mysqli_fetch_assoc($query)) {
	    echo "<tr>";
	    echo "<td>" . $row['album_Id'] . "</td>";
	    echo "<td>" . $row['title'] . "</td>";
	    echo "<td>" . $row['genre'] . "</td>";
	    echo "<td>" . $row['releaseyear'] . "</td>";
	    echo "</tr>";
    }
    ?>
			</tbody>
	</form>
</body>

</html>