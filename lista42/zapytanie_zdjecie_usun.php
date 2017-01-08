<?php
	$polaczenie = mysql_connect("localhost", "root", "", "lista42");
	if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
	if(mysql_select_db('lista42', $polaczenie) == false ) die( mysql_error() );
	mysql_query("SET NAMES 'utf8'"); 
	
	$ID_produktu = $_GET['ID_produktu'];
	$ID_zdjecia = $_GET['ID_zdjecia'];
	
	$zapytanie = 'DELETE FROM zdjecia WHERE ID='.$ID_zdjecia;
	if (mysql_query($zapytanie) )
		echo 'Wykonano';
	else {
		echo 'Niewykonano<br><br>';
		Die(mysql_error());
	}
	
	mysql_close($polaczenie);
	
	header('Location: http://localhost/lista42/edycja.php?ID='.$ID_produktu);
?>