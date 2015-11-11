<?php
	include "timeline.php";
	$tweets = array();
	$tweets[0]="aaa";
	$tweets[1]="bbb";
	$add = new TimeLine();
	$add->add($tweets);
    # Ex 4 : Write a tweet
    try {
        /*
        if () { validate author & content
            call add function
            header("Location:index.php"); redirect to index.php
        } else {
            header("Loaction:error.php");
        }
        */
    } catch(Exception $e) {
        /* header("Loaction:error.php"); */
    }
?>
