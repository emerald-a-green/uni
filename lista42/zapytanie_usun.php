<?php
	$polaczenie = mysql_connect("localhost", "root", "", "lista42");
	if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
	if(mysql_select_db('lista42', $polaczenie) == false ) die( mysql_error() );
	mysql_query("SET NAMES 'utf8'"); 
	
	$ID = $_GET['ID'];
	
	$zapytanie = 'DELETE FROM produkty WHERE ID='.$ID;
	if (mysql_query($zapytanie) )
		echo 'wykonano';
	else {
		echo 'blad<br><br>';
		Die(mysql_error());
	}
	$zapytanie = 'DELETE FROM zdjecia WHERE ID_produktu='.$ID;
	
	//echo $zapytanie.'<br><br>';
	
	if (mysql_query($zapytanie) )
		echo 'wykonano';
	else {
		echo 'blad<br><br>';
		Die(mysql_error());
	}
	
	mysql_close($polaczenie);
	
	header('Location: http://localhost/lista42/administrator.php');
?>