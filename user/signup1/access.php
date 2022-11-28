<?php

function access($rank){

        if(isset($_SESSION["ACCESS"]) && !$_SESSION["ACCESS"][$rank]){
            header("location:denied.php");
            die;
        }
}

$_SESSION["ACCESS"]["USER"] = isset($_SESSION['myRank']) && trim($_SESSION['myRank']) == "User";
$_SESSION["ACCESS"]["ARTIST"] = isset($_SESSION['myRank']) && trim($_SESSION['myRank']) == "Artist";