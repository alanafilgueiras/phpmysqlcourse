
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";

        $idc = $_GET ['id_clube']?? 0;
		$busca = $banco->query("select * from clubes c where c.id_clube='$idc' ");	
		
	?>

		
		