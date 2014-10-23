<html>
<head>	
	<title>Carrinho</title>

</head>
<body>
	<?php include 'header.php'?>

	Carrinho:
	<br/>

<?php 
	session_start();  
	/*  * check if the 'cart' session array was created  * if it is NOT, create the 'cart' session array  */ 



	if(!isset($_SESSION['cart_items'])){
	     $_SESSION['cart_items'] = array(); 
	 }

	 if(count($_SESSION['cart_items'])>0){

		$ids = "";
		//Adiciona todos IDs em uma unica variavel.
		 foreach($_SESSION['cart_items'] as $id=>$value){
	 	 	$ids = $ids . $id . ",";	 	 
		} 
	 	 // remove the last comma
	 	 $ids = rtrim($ids,',');

		include 'connection.php';
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$query = "SELECT id, url, descricao FROM video WHERE id IN ({$ids}) ORDER BY id";
		$result = mysqli_query($con,$query);

		while($row = mysqli_fetch_array($result)) {
		  echo "<div>";
		  echo $row['id'];    		  
		  echo $row['url'] . "    ";
		  echo $row['descricao'];
		  echo "</div>";
		  echo "<br>";
		}
	 	mysqli_close($con);
 	}
?>
<a href='cart_clean.php'>
		Limpa Carrinho
	</a>
	<br/>
<a href="index.php">
  lista de videos
</a>
</body>
</html>