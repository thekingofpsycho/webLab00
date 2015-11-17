   
           
					
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Simple Timeline</title>
        <link rel="stylesheet" href="timeline.css">
    </head>
    <body>
        <div>
            <a href="index.php"><h1>Simple Timeline</h1></a>
            <div class="search">
                <!-- Ex 3: Modify forms -->
                <form class="search-form" method="get" action="index.php">
                    <input type="submit" value="search">
                    <input type="text" placeholder="Search" name="search_con">
                    <select name="search_op">
                        <option>Author</option>
                        <option>Content</option>
                    </select>
                </form>
             	
					
                
				
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <!-- Ex 3: Modify forms -->
                    <form class="write-form" method="post" action="add.php">
                        <input type="text" placeholder="Author" name="author">
                        <div>
                            <input type="text" placeholder="Content" name="content">
                        </div>
                        <input type="submit" value="write">
                    </form>
                </div>
                <!-- Ex 3: Modify forms & Load tweets -->
                <?php
   				 try {
    				include "timeline.php";
    				
    				$sc = new TimeLine();
    				$load=$sc->loadTweets();
    				
   			 		}catch(Exception $e) {
    				    //header("Loaction:error.php");
   				 	}
				
        			if (isset($_GET['search_con'])){ 
           				$search_op=isset($_GET['search_op'])?$_GET['search_op']:'';
           				$search_con=isset($_GET['search_con'])?$_GET['search_con']:'';
						$load=$sc->searchTweets($search_op,$search_con);
   			 		}
                foreach($load as $loads){
                	$time=explode(" ",$loads["time"]);
                	$times=explode("-",$time[0]);
                ?>
                <div class="tweet">
                    <form class="delete-form" method="POST" action="delete.php">
                        <input type="submit" value="delete">
                        <input type="hidden" value="<?=$loads["no"]?>" name="no">
                    </form>
                    <div class="tweet-info">
                        <span><?=$loads["author"]?></span>
                        <span><?=$time[1]." ".$times[0]."/".$times[1]."/".$times[2]?>
                    	</span>
                    </div>
                    <div class="tweet-content">
                    
                    <?php 
                   
                    $hash=preg_replace("/#([a-zA-Z0-9]+[a-zA-Z0-9]*)/", "<a href=index.php?search_con=%23$1&search_op=Content>$0</a>" , $loads["contents"]);
                    
                    ?>
                        <?=$hash?>
                    </div>
                </div>
                <?php
                    }
                ?>
                
                
                
                
                
                
                
                
                
            </div>
        </div>
    </body>
</html>
