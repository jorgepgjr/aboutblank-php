<html>
<head>	
	<title>Lista de Videos Youtube</title>

</head>
<body>
	<?php include 'header.php'
	?>

<?php
	include("video.php");
	$video1 = new Video;
	$video1->url = "www.teste1.com";
	$video2 = new Video;
	$video2->url = "www.teste2.com";

?>

<?php


$con = mysqli_connect("localhost:3306", "root", "","aboutblank");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM video");

while($row = mysqli_fetch_array($result)) {
  echo "<div>";  
  echo "<a href='add_to_cart.php?id={$row['id']}'>"; 
  echo $row['url'];
  echo "</a>";
  echo "</div>";
  echo "<br>";
}

echo "<a href='cart_list.php'>"; 
echo "Lista de itens no Carrinho"; 
echo "</a>"; 
echo "<br>";

echo "<a href='cart_clean.php'>"; 
echo "Limpa Carrinho"; 
echo "</a>"; 
echo "<br>";

mysqli_close($con);

?>

</body>
</html>