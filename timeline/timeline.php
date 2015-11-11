<?php
    class TimeLine {
        # Ex 2 : Fill out the methods
        private $db;
        function __construct()
        {
            # You can change mysql username or password
            $this->db = new PDO("mysql:host=localhost;dbname=timeline", "root", "root");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        public function add($tweet) // This function inserts a tweet
        {
        	$this->db->exec("INSERT INTO tweets (contents, author,time) VALUES ('$tweet[0]', '$tweet[1]', now());");
            //Fill out here
        }
        public function delete($no) // This function deletes a tweet
        {
        	//$no = db->quote($no);
        	//db->query("DELETE FROM tweets WHERE no=$no");
        	
        	$this->db->exec("DELETE FROM tweets WHERE no='$no';");

            //Fill out here
        }
        # Ex 6: hash tag
        # Find has tag from the contents, add <a> tag using preg_replace() or preg_replace_callback()
        public function loadTweets() // This function load all tweets
        {
        	$loadtweet = array();
        	$loadtweet[0]=$this->db->exec("SELECT author FROM tweets");
        	$loadtweet[1]=$this->db->exec("SELECT time FROM tweets");
        	$loadtweet[2]=$this->db->exec("SELECT contents FROM tweets");
            //Fill out here
        }
        public function searchTweets($type, $query) // This function load tweets meeting conditions
        {
        	$loadtweet = array();
        	if($type=="Author"){
        		$loadtweet[0]=$this->db->exec("SELECT author FROM tweets WHERE author like %'$query'%;");
        		$loadtweet[1]=$this->db->exec("SELECT time FROM tweets WHERE author like %'$query'%;");
        		$loadtweet[2]=$this->db->exec("SELECT contents FROM tweets WHERE author like %'$query'%;");
        	}
        	else if($type=="Contents"){
        		$loadtweet[0]=$this->db->exec("SELECT author FROM tweets WHERE contents like %'$query'%;");
        		$loadtweet[1]=$this->db->exec("SELECT time FROM tweets WHERE contents like %'$query'%;");
        		$loadtweet[2]=$this->db->exec("SELECT contents FROM tweets WHERE contents like %'$query'%;");
        	}
            //Fill out here
        }
    }
?>
