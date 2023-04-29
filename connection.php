<?php
	class config {
		private $_conn;
		
		function config() {
			if (!$this->_conn) {
				$this->_conn = mysqli_connect('localhost', 'mle38', 'mle38', 'mle38') or die ('Connection Errors!'); 
				mysqli_query($this->_conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");	  
			}	 
		}
		
		function checkAccount($username) {
			$sql = "SELECT * FROM users WHERE username = '$username'";
			$query = mysqli_query($this->_conn, $sql);
			return $query;
		}
	
		function register($username, $password) {
			echo "aaaa";
			$sql = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
			mysqli_query($this->_conn, $sql);
		}
		
		function login($username, $password) {
		    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$query = mysqli_query($this->_conn, $sql);
			$row = mysqli_num_rows($query);
			return $row;
		}
		
		function rank() {
			$sql = "SELECT name, amount FROM users ORDER BY amount DESC limit 5";
			$query = mysqli_query($this->_conn, $sql);		
			$arr = array();
			while ($ft = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$arr[] = $ft;
			}	
			return $arr;
		}
		
		function getName($user) {
			$sql = "SELECT name FROM users WHERE username = '$user'";
			$query = mysqli_query($this->_conn, $sql);	
			$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
			$name = $arr['name'];	
			return $name;	
		}		
				
		function getLevel($user) {
			$sql = "SELECT level FROM users WHERE username = '$user'";
			$query = mysqli_query($this->_conn, $sql);	
			$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
			$lv = $arr['level'];	
			return $lv;	
		}
		
		function upLevel($newlv, $user) {
			$query = "UPDATE users SET level = '$newlv' WHERE username = '$user'";
			mysqli_query($this->_conn, $query);
		}
		
		function getCoin($user) {
			$sql = "SELECT amount FROM users WHERE username = '$user'";
			$query = mysqli_query($this->_conn, $sql);	
			$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
			$account = $arr['amount'];	
			return $account;	
		}
		
		function updateCoin($amount, $user) {
			$sql = "UPDATE users SET amount = '$amount' WHERE username = '$user'";
			mysqli_query($this->_conn, $sql);		
		}
		
		//VIETNAMESE DICE
		function getLevelVNDice($user) {
			$sql = "SELECT lv1 FROM users WHERE username = '$user'";
			$query = mysqli_query($this->_conn, $sql);	
			$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
			$lv = $arr['lv1'];	
			return $lv;	
		}
		
		function updateLevelVNDice($lv, $user) {
			$query = "UPDATE users SET lv1 = '$lv' WHERE username = '$user'";
			mysqli_query($this->_conn, $query);
		}
		
		//CHINESE DICE
		function getLevelCNDice($user) {
			$sql = "SELECT lv2 FROM users WHERE username = '$user'";
			$query = mysqli_query($this->_conn, $sql);	
			$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
			$lv = $arr['lv2'];	
			return $lv;	
		}
		
		function updateLevelCNDice($lv, $user) {
			$query = "UPDATE users SET lv2 = '$lv' WHERE username = '$user'";
			mysqli_query($this->_conn, $query);
		}
		
		//CARD
		function getLevelCard($user) {
			$sql = "SELECT lv3 FROM users WHERE username = '$user'";
			$query = mysqli_query($this->_conn, $sql);	
			$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
			$lv = $arr['lv3'];	
			return $lv;	
		}
		
		function updateLevelCard($lv, $user) {
			$query = "UPDATE users SET lv3 = '$lv' WHERE username = '$user'";
			mysqli_query($this->_conn, $query);
		}

		// MATH		
		function getLevelMath($user) {
			$sql = "SELECT lv4 FROM users WHERE username = '$user'";
			$query = mysqli_query($this->_conn, $sql);	
			$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
			$lv = $arr['lv4'];	
			return $lv;	
		}
		
		function updateLevelMath($lv, $user) {
			$query = "UPDATE users SET lv4 = '$lv' WHERE username = '$user'";
			mysqli_query($this->_conn, $query);
		}
				
		function getWinMath($user) {
			$sql = "SELECT winmath FROM users WHERE username = '$user'";
			$query = mysqli_query($this->_conn, $sql);	
			$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
			$num = $arr['winmath'];	
			return $num;	
		}
		
		function updateWinMath($num, $user) {
			$sql = "UPDATE users SET winmath = '$num' WHERE username = '$user'";
			mysqli_query($this->_conn, $sql);
		}
	}
?>