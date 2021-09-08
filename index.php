<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title> NBA TIMES </title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="estilos/estilo.css"/>
	<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Glory">
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		$ordem = $_GET['o'] ?? "n";
	?>
	<div id="corpo">
		<?php require_once "topo.php";?>
		<h1>ESCOLHA UM TIME</h1>
		<form method="get" id="busca" action="index.php">
			Ordenar: 
			<a href="index.php?o=n">Nome </a>| 
			<a href="index.php?o=a">Altura </a>| 
			<a href="index.php?o=i">Idade </a>| 
			Buscar: 
			<input type="text" name="c" size="10" maxlength="40"/> <input type="submit" value="ok"/>
		</form>
		<table class= "listagem">
			<?php
				$q = "select * from clubes c, jogadores j where c.id_clube = j.clube_atual";
				
				switch ($ordem) {
					case "n":
						$q .= "ORDER by c.nome_clube";
						break;
				}
				$busca = $banco->query($q);
				if (!$busca) {
					echo "<tr><td>Infelizmente a busca deu errado";
				}else {
					if ($busca->num_rows ==0){
						echo "<tr><td>Nenhum registro encontrado";
					} else {
						while ($reg=$busca->fetch_object ()){
							$t = thumb($reg->imagem);
							
							echo "<tr><td><img src='$t'class='mini'/>";
							echo "<td><a class='list_jogadores' href='jogadores.php?id_clube=$reg->id_clube'>$reg->nome_clube</a>"; 
							
							echo "<td>Adm";
						}
					}
				}
			?>
		</table>
		
	</div>	
	<?php include_once "rodape.php"; ?>
</body>
</html>