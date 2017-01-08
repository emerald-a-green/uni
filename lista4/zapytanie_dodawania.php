<?php
	if ( ! isset( $_POST['producent'] ) ) header('Location: http://localhost/lista4/administrator.php');
	
	$polaczenie = mysql_connect("localhost", "root", "", "lista4");
	if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
	if(mysql_select_db('lista4', $polaczenie) == false ) die( mysql_error() );
	mysql_query("SET NAMES 'utf8'"); 
	
	$producent = "'".$_POST['producent']."'";
	$Nazwa_produktu = "'".$_POST['Nazwa_produktu']."'";
	$kategoria = "'".$_POST['kategoria']."'";
	$Opis = "'".$_POST['Opis']."'";
	$Zdjecie = "'".$_POST['Zdjecie']."'";
	$Cena = "'".$_POST['Cena']."'";
	
	$zapytanie = 'INSERT INTO `produkty` (`ID`, `Nazwa_produktu`, `producent`, `kategoria`, `Opis`, `Zdjecie`, `Cena`) VALUES (NULL, '.$Nazwa_produktu.', '.$producent.', '.$kategoria.', '.$Opis.', '.$Zdjecie.', '.$Cena.')';
	
	echo $zapytanie.'<br><br>';
	
	if (mysql_query($zapytanie) )
		echo 'Wykonano pomyslnie';
	else {
		echo 'Niewykonano<br><br>';
		Die(mysql_error());
	}
	
	mysql_close($polaczenie);
	
	header('Location: http://localhost/lista4/administrator.php');
?>