<?php
session_start();

include "access.php";
access('ARTIST');
$match = 0;
$success = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'webpage.php';
    $albumTitle = $_POST['albumName'];
    $albumTitle = str_replace("'", "\'", $albumTitle);
    trim($albumTitle);
    
    $sql = "select * from `album` where title='$albumTitle'";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $sql = "delete from `album` where title = '$albumTitle' ";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                $success = 1;

            } else {
                die(mysqli_error($connection));
            }
        } else {
            $match = 1;
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
        Delete Albums
    </title>
</head>

<!-- img source: https://www.pexels.com/photo/black-and-silver-headphones-on-black-surface-3721941/ -->

<body style="background: url(bgimage.png) no-repeat; background-size: cover; color:white;">
    <?php
    if ($match) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>OOPS!</strong> Album name does not exist!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }

    if ($success) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations!!</strong> You\'ve deleted an Album!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
    ?>
    <center>
        <h1>Delete Albums</h1>
    </center>

    <form method="post" name="album" action="deletealbums.php">

        <table>
            <tr>
                <td><b>Enter Album Title:</b></td>
                <td><input type="text" id="album" name="albumName" size="30" placeholder="Album Name" /></td>
                <td>
                    <button type="submit" class="btn btn-info">Delete</button>
                </td>
            </tr>
        </table>
        <br><br>

        <table border="3" height="50%" width="50%" bordercolor="white" align=left cellpadding="10">

            <tr>
                <th>Album Id</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Release Year</th>
            </tr>
            <?php
            include 'webpage.php';
            $sql = "SELECT A.album_Id, A.title, A.genre, A.releaseyear FROM 
            album A, makes M, artist AR 
            WHERE A.album_Id = M.album_Id and  M.artist_Id = AR.artist_Id and AR.user_Id=" . $_SESSION['id'];
            $query = mysqli_query($connection, $sql);

            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $row['album_Id'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['genre'] . "</td>";
                echo "<td>" . $row['releaseyear'] . "</td>";
                echo "</tr>";
            }
            ?>
    </form>
</body>

</html>