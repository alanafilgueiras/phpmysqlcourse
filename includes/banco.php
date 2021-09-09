<pre><?php
	$banco = new mysqli("localhost", "root", "021834", "nba_times");
	if ($banco ->connect_errno) {
		echo "<p>Econtrei um erro $banco->errno --> $banco-> connect_errno</p>";
	die ();
	}
	
