<html>
<head>	
	<title>Adiciona Videos Youtube</title>

</head>
<body>

<?php
include 'header.php';
$titulo = $descricao = $url =  "";
$tituloErr = $descricaoErr = $urlErr =  "";
?>
  <form method="post" action="addVideo.php" accept-charset="ISO-8859-1"> 
     Titulo: <input type="text" name="titulo" value="<?php echo $titulo;?>">
     <span class="error">* <?php echo $nameErr;?></span>
     <br><br>
     Descrição: <input type="text" name="descricao" value="<?php echo $descricao;?>">
     <span class="error">* <?php echo $emailErr;?></span>
     <br><br>
     Url: <input type="text" name="url" value="<?php echo $url;?>">
     <span class="error"><?php echo $urlErr;?></span>     
     <br><br>
     Categoria: <select name="categoria">
     <?php
        include 'connection.php';
        $result = mysqli_query($con,"SELECT * FROM categoria");
        while($row = mysqli_fetch_array($result)) {
            echo "<option value=\"{$row['nome']}\">{$row['nome']}</option>";
        }
        mysqli_close($con);
     ?>
        
    </select>



     <input type="submit" name="add" value="Submit"> 
</form>
<a href="index.php">
  lista de videos
</a>
</body>
</html>