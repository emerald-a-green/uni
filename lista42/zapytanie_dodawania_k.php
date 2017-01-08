<?php
	if ( ! isset( $_POST['Nazwa_kategori'] ) ) header('Location: http://localhost/lista42/administrator.php');

	$polaczenie = mysql_connect("localhost", "root", "", "lista42");
	if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
	if(mysql_select_db('lista42', $polaczenie) == false ) die( mysql_error() );
	mysql_query("SET NAMES 'utf8'"); 
	
	$akcja = $_GET['akcja'];
	$cododac = $_GET['cododac'];
	$ID = $_GET['ID'];
	$czyplik = $_GET['czyplik'];
	

	if ( isset( $_POST['Nazwa_kategori'] ) ) $Nazwa_kategori= "'".$_POST['Nazwa_kategori']."'";
	if ( isset( $_POST['url'] ) ) $url = "'".$_POST['url']."'";
	
	if ( ( $cododac == 'kategorie' ) )
	{
		$zapytanie = 'INSERT INTO `'.$cododac.'` (`ID`, `Nazwa_kategori`) VALUES (NULL, '.$Nazwa_kategori.')';
	}
	else if ( $cododac == 'zdjecie' )
	{
		if ( $czyplik == 0 )
		{
		}
		else if ( $czyplik == 1 )
		{
			if ($_FILES['plik']['error'] > 0)
			{
				echo 'Problem: ';
				switch ( $_FILES['plik']['error'] )
				{
					case 1: echo 'Rozmiar pliku przekroczyl wartosc upload_max_filesize'; break;
					case 2: echo 'Rozmiar pliku przekroczyl wartosc max_file_size'; break;
					//nie moze byc wieksze niz pierwszy parametr
					case 3: echo 'Plik wyslany tylko czesciowo'; break;
					case 4: echo 'Nie wyslano zadnego pliku'; break;
				}
					exit;
			}
			$url = 'img/'.$_FILES['plik']['name'];
			echo $_FILES['plik']['tmp_name'];
			if ( is_uploaded_file( $_FILES['plik']['tmp_name'] ) )
			{
				if (!move_uploaded_file($_FILES['plik']['tmp_name'], $url))
				{
					echo 'Problem: Plik nie moze byc skopiowany do katalogu';
					exit;
				}
			}
			else
			{
				echo 'Przesylanie pliku nie powiodlo sie ';
				echo $_FILES['plik']['name'];
				exit;
			}
			$url = "'".$url."'";
		}
	}
	$zapytanie = 'INSERT INTO zdjecia (`ID`, `ID_produktu`, `url`) VALUES (NULL, '.$ID.', '.$url.')';
	
	echo $zapytanie.'<br><br>';
	
	if (mysql_query($zapytanie) )
		echo 'wykonano pomyslnie';
	else {
		echo 'blad<br><br>';
		Die(mysql_error());
	}
	
	mysql_close($polaczenie);
	
	if ( $akcja == 'dodaj' ) header('Location: http://localhost/lista42/dodawanie.php');
	else if ( $akcja == 'edytuj' )
	{
		$id = $_GET['ID'];
		header('Location: http://localhost/lista42/edycja.php?ID='.$ID.'');
	}
		
?>