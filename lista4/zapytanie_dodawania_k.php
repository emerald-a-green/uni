<?php
	if ( ! isset( $_POST['Nazwa_kategori'] ) ) header('Location: http://localhost/lista4/administrator.php');

	$polaczenie = mysql_connect("localhost", "root", "", "lista4");
	if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
	if(mysql_select_db('lista4', $polaczenie) == false ) die( mysql_error() );
	mysql_query("SET NAMES 'utf8'"); 
	
	$akcja = $_GET['akcja'];
	$cododac = $_GET['cododac'];
	
	$Nazwa_kategori = "'".$_POST['Nazwa_kategori']."'";
	$zapytanie = 'INSERT INTO `'.$cododac.'` (`ID`, `Nazwa_kategori`) VALUES (NULL, '.$Nazwa_kategori.')';
	
	echo $zapytanie.'<br><br>';
	
	if (mysql_query($zapytanie) )
		echo 'wykonano pomyslnie';
	else {
		echo 'blad<br><br>';
		Die(mysql_error());
	}
	
	mysql_close($polaczenie);
	
	if ( $akcja == 'dodaj' ) header('Location: http://localhost/lista4/dodawanie.php');
	else if ( $akcja == 'edytuj' )
	{
		$id = $_GET['ID'];
		header('Location: http://localhost/lista4/edycja.php?id='.$ID.'');
	}
		
?>