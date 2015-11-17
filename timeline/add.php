<?php
	
    # Ex 4 : Write a tweet
    try {
    	include "timeline.php";
		$tweets = array();
		$tweets[0]=$_POST['author'];
		$tweets[1]=$_POST['content'];
       if(strlen($tweets[0]) >= 1 && preg_match("/^[a-zA-Z]+(([ -]?[a-zA-Z])+)$/i", $tweets[0]) && strlen($tweets[0]) <= 20 && isset($tweets[0]) && isset($tweets[1])){
            $add = new TimeLine();
			$add->add($tweets);
            header("Location:index.php");
        }
        else {
            header("Location:error.php");
        }
        
    } catch(Exception $e) {
        header("Location:error.php");
    }
?>
