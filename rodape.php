<?php
    echo "<footer>";
    echo "<p> Acessado por ".$_SERVER ['REMOTE_ADDR']." em ".date('d/m/y')."</p>";
    echo "<p>Desenvolvido por Alana, a bonita &copy; 2021</p>";
    echo "</footer>";
    $banco->close();
