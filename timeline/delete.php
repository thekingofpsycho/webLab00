<?php
# Ex 5 : Delete a tweet
try {
	include "timeline.php";
    $no=$_POST['no'];
    $delete=new timeline();
    $delete->delete($no);
    header("Location:index.php");
    
} catch(Exception $e) {
    header("Loaction:error.php");
}
?>
