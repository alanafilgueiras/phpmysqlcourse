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
		$ordem = $_GET['o'] ?? "i";
	?>
	<div id="corpo">
		<?php require_once "topo.php";?>
		<h1>ESCOLHA UM TIME</h1>
		<form method="get" id="busca" action="index.php">
			Ordenar: <a href="index.php?o=n">Nome </a>| <a href="index.php?o=a">Altura </a>| <a href="index.php?o=i">Idade </a>| Buscar: <input type="text" name="c" size="10" maxlength="40"/> <input type="submit" value="ok"/>
		</form>
		<table class= "listagem">
			<?php
				$q = "select * from clubes ";
				
				$busca = $banco->query($q);


				if (!$busca) {
					echo "<tr><td>Infelizmente a busca deu errado";
				}else {
					if ($busca->num_rows ==0){
						echo "<tr><td>Nenhum registro encontrado";
					} else {

						while ($reg=$busca->fetch_object ()){

							$t = thumb($reg->imagem);
							echo "<table>";
							echo "<tr><td><img src='$t'class='mini'/></td><td style='padding: 15px'><a class='list_jogadores' href='jogadores.php?id_clube=$reg->id_clube'>$reg->nome_clube</a></td></tr>";
							$jogadores = "select nome_jogador from jogadores where clube_atual = $reg->id_clube ";
							switch ($ordem){
								case "n";
									$jogadores .= "ORDER BY nome_jogador";
									break; 
								case "a";
									$jogadores .= "ORDER BY altura DESC";
									break;
								case "i";
									$jogadores .= "ORDER BY idade";
									break;
								default:
									$jogadores .= "ORDER BY idade";
									break;

							}
							$busca_jogadores = $banco->query($jogadores);
							
						
							while ($reg_busca_jogadores=$busca_jogadores->fetch_object()){
	
								echo "<tr><td style='color:black;'><a class='list_jogadores'>$reg_busca_jogadores->nome_jogador</a> </td></tr>";

							}
							echo "</table> ";
						}
					}
				}
			?>
		</table>
		
	</div>	
	<?php include_once "rodape.php"; ?>
</body>
</html>