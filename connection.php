<?php
	class config {
		private $_conn;
		
		function config() {
			if (!$this->_conn) {
				$this->_conn = mysqli_connect('localhost', 'nla2', 'nla2', 'nla2') or die ('Connection Errors!'); 
				mysqli_query($this->_conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");	  
			}	 
		}
		
		function checkAccount($username) {
			$sql = "SELECT * FROM users WHERE username = '$username'";
			$query = mysqli_query($this->_conn, $sql);
			return $query;
		}
	
		function register($username, $password) {
			$sql = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
			mysqli_query($this->_conn, $sql);
		}
		
		function login($username, $password) {
		    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$query = mysqli_query($this->_conn, $sql);
			$row = mysqli_num_rows($query);
			return $row;
		}
		
		function getAllNameTypes() {
			$sql = "SELECT * FROM types ORDER BY id DESC";
			$query = mysqli_query($this->_conn, $sql);
			$arr = array();
			while ($item = mysqli_fetch_assoc($query)) { 
				$arr[$item["id"]] = $item["nameType"];
			}
			return $arr;
		}
		
		function checkTypes($nameType) {
			$sql = "SELECT * FROM types WHERE nameType = '$nameType'";
			$query = mysqli_query($this->_conn, $sql);
			return $query;
		}
		
		function addType($nameType) {
			$query = "INSERT INTO types(nameType) VALUES ('$nameType')";
			mysqli_query($this->_conn, $query);
		}
		
		function getInfoByTypeID($id) {
			$sql = "SELECT * FROM types WHERE id = '$id'";
			$query = mysqli_query($this->_conn, $sql);
			return $query;
		}
		
		function updateType($id, $nameType) {
			$query = "UPDATE types SET nameType = '$nameType' WHERE id = '$id'";
			mysqli_query($this->_conn, $query);
		}
		
		function deleteType($id) {
			$query = "DELETE FROM types WHERE id = '$id'";
			mysqli_query($this->_conn, $query);
		}
		
		function getAllNameProducts() {
			$sql = "SELECT * FROM products ORDER BY id DESC";
			$query = mysqli_query($this->_conn, $sql);
			$arr = array();
			while ($item = mysqli_fetch_assoc($query)) { 
				$arr[$item["id"]] = array(
					"id" => $item["id"],
					"nameProduct" => $item["nameProduct"],
					"descriptions" => $item["descriptions"],
					"price" => $item["price"],
					"image" => $item["image"],
					"sizeID" => $item["sizeID"],
					"colorID" => $item["colorID"],
					"typesID" => $item["typesID"]
				);
			}
			return $arr;
		}
		
		function getAllNameProductsByType($id) {
			$sql = "SELECT * FROM products WHERE typesID = '$id'";
			$query = mysqli_query($this->_conn, $sql);
			$arr = array();
			while ($item = mysqli_fetch_assoc($query)) { 
				$arr[$item["id"]] = array(
					"id" => $item["id"],
					"nameProduct" => $item["nameProduct"],
					"descriptions" => $item["descriptions"],
					"price" => $item["price"],
					"image" => $item["image"],
					"sizeID" => $item["sizeID"],
					"colorID" => $item["colorID"],
					"typesID" => $item["typesID"]
				);
			}
			return $arr;
		}
		
		function addProduct($name, $description, $price, $image, $size, $color, $types) {
			$query = "INSERT INTO products (nameProduct, descriptions, price, image, sizeID, colorID, typesID) VALUES ('$name', '$description', '$price', '$image', '$size', '$color', '$types')";
			mysqli_query($this->_conn, $query);
		}
		
		function getInfoByProductID($id) {
			$sql = "SELECT * FROM products WHERE id = '$id'";
			$query = mysqli_query($this->_conn, $sql);
			return $query;
		}
		
		function updateProduct($id, $nameProduct, $descriptions, $price, $image, $sizeID, $colorID, $typesID) {
			$query = "UPDATE products SET nameProduct = '$nameProduct', descriptions = '$descriptions', price = '$price', image = '$image', sizeID = '$sizeID', colorID = '$colorID', typesID = '$typesID' WHERE id = '$id'";
			mysqli_query($this->_conn, $query);
		}
		
		function updateProductNotImage($id, $nameProduct, $descriptions, $price, $sizeID, $colorID, $typesID) {
			$query = "UPDATE products SET nameProduct = '$nameProduct', descriptions = '$descriptions', price = '$price', sizeID = '$sizeID', colorID = '$colorID', typesID = '$typesID' WHERE id = '$id'";
			mysqli_query($this->_conn, $query);
		}
		
		function deleteProduct($id) {
			$query = "DELETE FROM products WHERE id = '$id'";
			mysqli_query($this->_conn, $query);
		}
		
		function getAllNameSizes() {
			$sql = "SELECT * FROM sizes ORDER BY id DESC";
			$query = mysqli_query($this->_conn, $sql);
			$arr = array();
			while ($item = mysqli_fetch_assoc($query)) { 
				$arr[$item["id"]] = $item["nameSize"];
			}
			return $arr;
		}
		
		function getAllNameColors() {
			$sql = "SELECT * FROM colors ORDER BY id DESC";
			$query = mysqli_query($this->_conn, $sql);
			$arr = array();
			while ($item = mysqli_fetch_assoc($query)) { 
				$arr[$item["id"]] = $item["nameColor"];
			}
			return $arr;
		}
		
		function searchProduct($key) {
			$sql = "SELECT * FROM products WHERE nameProduct LIKE '%$key%'";
			$query = mysqli_query($this->_conn, $sql);
			$arr = array();
			while ($item = mysqli_fetch_assoc($query)) { 
				$arr[$item["id"]] = array(
					"id" => $item["id"],
					"nameProduct" => $item["nameProduct"],
					"descriptions" => $item["descriptions"],
					"price" => $item["price"],
					"image" => $item["image"],
					"sizeID" => $item["sizeID"],
					"colorID" => $item["colorID"],
					"typesID" => $item["typesID"]
				);
			}
			return $arr;
		}
	}
?>