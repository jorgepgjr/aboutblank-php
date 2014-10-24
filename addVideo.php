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
  $categoria = $_POST['categoria'];

  include "connection.php";
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "INSERT into video ".
         "(titulo, descricao, url) ".
         "VALUES ('$titulo', '$descricao', '$url')";
  $retval = mysqli_query($con,$sql);
  if(! $retval )
  { 
    die('Could not enter data: ' . mysql_error());
  }

$id = mysqli_insert_id($con);
$sql = "INSERT into video_categoria ".
         "(id_video, id_categoria) ".
         "VALUES ('$id', '$categoria')";
$retval = mysqli_query($con,$sql);
if(! $retval )
  { 
    die('Could not enter data: ' . mysql_error());
  }
  mysqli_close($con);
  echo "Video $titulo incluido com sucesso! $categoria";
?>
<br/>
<a href="addFormVideo.php">
  Incluir novo video
</a>
<br/>
<a href="index.php">
  lista de videos
</a>
</body>
</html>