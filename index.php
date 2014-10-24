
<html lang="pt-BR">
<head>	
	<title>Lista de Videos Youtube</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<body>

<?php
include 'header.php';
include ("connection.php");
?>
<form method="post" action="index.php">
	Pesquisar: <input type="text" name="search"/>
	<input type="submit" value="Submit"> 
</form>
<?php
$search = '';
$search = $_POST['search'];

if ($search == '') {
	$result = mysqli_query($con,"SELECT * FROM video");	
	echo "SELECT * FROM video";
}else {
	echo "SELECT * FROM video where titulo like '%$search%' ";
	$result = mysqli_query($con,"SELECT * FROM video where titulo like '%$search%' ");	
}

while($row = mysqli_fetch_array($result)) {
  echo "<div>";     
  echo "<iframe width=\"420\" height=\"315\" src=\"http://www.youtube.com/embed/{$row['url']}\" frameborder=\"0\" allowfullscreen></iframe>";
  echo "<br/>";
  echo "Titulo: {$row['titulo']}";
  echo "<br/>";
  echo "Descrição: {$row['descricao']}";
  echo "<br/>";
  echo "<a href='add_to_cart.php?id={$row['id']}'>";
  echo "Adicionar ao carrinho";
  echo "</a>";
  echo "</div>";
  echo "<br>";
}
mysqli_close($con);

?>
	<a href='cart_list.php'> 
		Lista de itens no Carrinho
	</a>
	<br>
	<a href='addFormVideo.php'>
		Incluir novo video na Base
	</a>
	<br>
	<a href='cart_clean.php'>
		Limpa Carrinho
	</a>
	<br>
</body>
</html>