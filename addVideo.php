<html>
<head>	
	<title>Adiciona Videos Youtube</title>

</head>
<body>

<?php
  include 'header.php';

  $titulo = $_POST['titulo'];
  $descricao = $_POST['descricao'];
  $url = $_POST['url'];

  include "connection.php";
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "INSERT into video ".
         "(titulo, descricao, categoria, url) ".
         "VALUES ('$titulo', '$descricao', 'PESSOA', '$url')";
  $retval = mysqli_query($con,$sql);
  if(! $retval )
  { 
    die('Could not enter data: ' . mysql_error());
  }

  mysqli_close($con);
  echo "Video $titulo incluido com sucesso!";
?>
<a href="addFormVideo.php">
  Incluir novo video
</a>
<a href="index.php">
  lista de videos
</a>
</body>
</html>