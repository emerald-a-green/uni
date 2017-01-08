<?php
	if ( ! isset( $_POST['producent'] ) ) header('Location: http://localhost/lista42/administrator.php');
	
	$polaczenie = mysql_connect("localhost", "root", "", "lista42");
	if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
	if(mysql_select_db('lista42', $polaczenie) == false ) die( mysql_error() );
	mysql_query("SET NAMES 'utf8'"); 
	
	$producent = "'".$_POST['producent']."'";
	$Nazwa_produktu = "'".$_POST['Nazwa_produktu']."'";
	$kategoria = "'".$_POST['kategoria']."'";
	$Opis = "'".$_POST['Opis']."'";
	$url_zdjecia = "'".$_POST['url_zdjecia']."'";
	$Cena = "'".$_POST['Cena']."'";
	$plik = $_POST['plik'];
	
	$zapytanie = 'INSERT INTO `produkty` (`ID`, `Nazwa_produktu`, `producent`, `kategoria`, `Opis`, `Cena`) VALUES (NULL, '.$Nazwa_produktu.', '.$producent.', '.$kategoria.', '.$Opis.','.$Cena.')';
	
	echo $zapytanie.'<br><br>';
	
	if (mysql_query($zapytanie) )
		echo 'Wykonano pomyslnie';
	else {
		echo 'Niewykonano<br><br>';
		Die(mysql_error());
		}
		
	$id_towar_last = mysql_insert_id();
	echo $id_towar_last;
	
	$zapytanie = 'INSERT INTO `produkty` (`ID`, `Nazwa_produktu`, `producent`, `kategoria`, `Opis`, `Cena`) VALUES (NULL, '.$Nazwa_produktu.', '.$producent.', '.$kategoria.', '.$Opis.','.$Cena.')';
	
	$zapytanie = "INSERT INTO `zdjecia` (`id`, `ID_produktu`, `url`, `dom`) VALUES (NULL, ".$id_towar_last.", ".$url_zdjecia.", '1')";
	
	if (mysql_query($zapytanie) )
		echo 'Wykonano pomyslnie';
	else {
		echo 'Niewykonano<br><br>';
		Die(mysql_error());
		}
	
	mysql_close($polaczenie);
	
	header('Location: http://localhost/lista42/administrator.php');
?>