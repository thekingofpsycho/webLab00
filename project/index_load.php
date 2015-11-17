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
        	$this->db->exec("INSERT INTO tweets (contents, author,time) VALUES ('$tweet[1]', '$tweet[0]', now());");
            //Fill out here
        }
        public function feed_add($tweet) // This function inserts a tweet
        {
        	$this->db->exec("INSERT INTO tweets (contents, author,time) VALUES ('$tweet[1]', '$tweet[0]', now());");
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
        public function newproblem() // This function load all tweets
        {
        	$loadtweet=$this->db->query("SELECT * FROM tweets");
        	
        	return $loadtweet;
            //Fill out here
        }
        
        public function hardproblem() // This function load all tweets
        {
        	$loadtweet=$this->db->query("SELECT * FROM tweets");
        	
        	return $loadtweet;
            //Fill out here
        }
        
        public function myproblem() // This function load all tweets
        {
        	$loadtweet=$this->db->query("SELECT * FROM tweets");
        	
        	return $loadtweet;
            //Fill out here
        }
       
    }
?>
