<!--2011036782 안정기-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>컴취기</title>
        <link rel="stylesheet" href="index.css">

   </head>
    <body>
    <header>
    	<div id=brand>
    		<center><a href="index.php"><img src="img/logo.png" alt="CIS"/></a></center>
    	</div>
    </header>
    <nav>
    	<div>
    		<div><a href="index.php">첫화면</a></div>
        	<div>문제풀기</div>
        	<div>내정보</div>
        	<div>실시간</div>
        	<div><a href="feedback.php">피드백</a></div>
    	</div>
    </nav>
    <article>
    	<div>
         	<div>새로운 문제
         	
         		<div>
         		  <?php
   				 try {
    				include "index_load.php";
    				$sc = new TimeLine();
    				$load=$sc->newproblem();
   			 		}catch(Exception $e) {
    				    //header("Loaction:error.php");
   				 	}
                foreach($load as $loads){                	
                ?>
                <div><li><ul><?=$loads["contents"]?></ul></li></div>
                
                <?php } ?>

         		
         		</div>
         	</div>
         	<div>어려운 문제
         		<div>
         		
         		  <?php
   				 try {
    				
    				$sc = new TimeLine();
    				$load=$sc->hardproblem();
   			 		}catch(Exception $e) {
    				    //header("Loaction:error.php");
   				 	}
                foreach($load as $loads){                	
                ?>
                <div><li><ul><?=$loads["contents"]?></ul></li></div>
                
                <?php } ?>
         		
         		
         		
         		</div>
         	</div>
         	<div>나의 문제 정보
         		<div>
         	
         	
         	
         	  <?php
   				 try {
    				
    				$sc = new TimeLine();
    				$load=$sc->myproblem();
   			 		}catch(Exception $e) {
    				    //header("Loaction:error.php");
   				 	}
                foreach($load as $loads){                	
                ?>
                <div><li><ul><?=$loads["contents"]?></ul></li></div>
                
                <?php } ?>
         	
         	
         	
         	
         	</div>
         	</div>
    	</div>
    </article>
    
        
        <footer>
            <div>
            	<div>개발자</p><img src="img/face1.png"><p>김태성</p></div>
            	<div>개발자</p><img src="img/face2.jpeg"><p>김민규</p></div>
            	<div>개발자</p><img src="img/face2.jpeg"><p>박거성</p></div>
            	<div>개발자</p><img src="img/face2.jpeg"><p>안정기</p></div>
            	<div>개발자</p><img src="img/face2.jpeg"><p>최준태</p></div>
            </div>
        </footer>
    </body>
</html>
