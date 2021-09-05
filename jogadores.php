<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title> Titulo da Página</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="estilos/estilo.css"/>
</head>

<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
		<?php
			$idc = $_GET ['id_clube']?? 0;
			$busca = $banco->query("select * from jogadores j, clubes c where c.id_clube='$idc' and j.clube_atual='$idc' order by j.nome_jogador ");	
				
		?>
		<h1>JOGADORES </h1>
		<table class = 'jogadores'>
			<?php
				if(!$busca){
					echo "<tr><td>Busca falhou! $banco->error";
				} else {
					if($busca->num_rows ==3) {
						
						$reg=$busca->fetch_object();
						
						echo "<h1>$reg->nome_clube</h1>"; 

					    $busca->data_seek(0);
										
						while($reg=$busca->fetch_object()){
						
							$t=thumb($reg->imagem_jogador);
							
							echo "<tr><td rowspan='7'><img src='$t' class='full'/>"; 
							echo "<tr><td>NOME: $reg->nome_jogador ";
							echo "<tr><td>IDADE: $reg->idade ";
							echo "<tr><td>ALTURA: $reg->altura";
							echo "<tr><td>ENVERGADURA: $reg->envergadura ";
							echo "<tr><td>POSIÇÃO: $reg->posicao";
							echo "<tr><td>Adm";		
						}
					} else {
						echo "Nenhum registro encontrado";
					}
				}								
			?>
		</table>
		

</body>
</html>