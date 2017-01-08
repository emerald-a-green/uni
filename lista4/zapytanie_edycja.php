<?php
	if ( ! isset( $_GET['id'] ) ) header('Location: http://localhost/lista4/administrator.php');
	
	$polaczenie = mysql_connect("localhost", "root", "", "lista7");
	if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
	if(mysql_select_db('lista4', $polaczenie) == false ) die( mysql_error() );
	mysql_query("SET NAMES 'utf8'"); 
	
	$ID = $_GET['ID'];
	$producent = $_POST['producent'];
	$Nazwa_produktu = $_POST['Nazwa_produktu'];
	$kategoria = $_POST['kategoria'];
	$Opis = $_POST['Opis'];
	$Zdjecie = $_POST['Zdjecie'];
	$Cena = $_POST['Cena'];
	
	$zapytanie = 'UPDATE produkty SET producent = '.$producent.', Nazwa_produktu = "'.$Nazwa_produktu.'", kategoria = '.$kategoria.', Opis = "'.$Opis.'", Zdjecie = "'.$Zdjecie.'", Cena = '.$Cena.' WHERE ID = '.$ID;

	echo $zapytanie.'<br><br>';
	
	
	if (mysql_query($zapytanie) )
		echo 'Wykonano';
	else {
		echo 'blad<br><br>';
		Die(mysql_error());
	}
	
	mysql_close($polaczenie);
	
	header('Location: http://localhost/lista4/administrator.php');
?>