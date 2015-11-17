<!--2011036782 안정기-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>컴취기</title>
        <link rel="stylesheet" href="feedback.css">

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
    		<div>피드백</div>
    		</p>
    		<form>      
                        <textarea class="feed"></textarea></p>
                        <?php
                        if (isset($_GET['feedbackbutton'])){ 
                        ?>
                        <div class="success">소중한 한마디 감사합니다 ^^</div>
                        <?php
                        }
                        ?>
                        <input class="bt" name="feedbackbutton" type=submit value="Send">
            </form>
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
