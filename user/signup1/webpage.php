<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='music_system';

$connection=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if(!$connection){
    die(mysqli_error($connection));
}

?>
