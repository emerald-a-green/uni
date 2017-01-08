<link rel="Stylesheet" type="text/css" href="style.css" />
<body style="padding: 20px">

Dodaj nowy produkt:<br><br>

<?php
	$polaczenie = mysql_connect("localhost", "root", "", "lista4");
	if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
	if(mysql_select_db('lista4', $polaczenie) == false ) die( mysql_error() );
	mysql_query("SET NAMES 'utf8'"); 
	
	//lista kategorii
	$zapytanie_kategorie = 'SELECT * FROM kategorie';
	$kategorie = mysql_query($zapytanie_kategorie);
	
	//lista producentow
	$zapytanie_producenci = 'SELECT * FROM producenci';
	$producenci = mysql_query($zapytanie_producenci);
	mysql_close($polaczenie);
	
?>
	<form action="zapytanie_dodawania.php" method="post">
		<ul>
		<li>Producent
		<select name="producent">
			<?php while ( $producent = mysql_fetch_assoc( $producenci ) ) { ?>
			<option value="<?php echo $producent['ID']?>"><?php echo $producent['Nazwa_producenta'] ?></option>
			<?php } ?>
		</select>
		
		<br><br>
		
		<li>Produkt
		<input type="text" name="Nazwa_produktu" placeholder="nazwa produktu"></input>
		
		<br><br>
		
		<li>Kategoria
		<select name="kategoria" >
			<?php while ( $kategoria = mysql_fetch_assoc( $kategorie ) ) { ?>
			<option value="<?php echo $kategoria['ID']?>"><?php echo $kategoria['Nazwa_kategori'] ?></option>
			<?php } ?>
		</select>
		
		<br><br>
		
		<li>Opis<br>
		<textarea style="height: 60px; width: 300px" name="Opis" placeholder="opis produktu"></textarea>
		
		<br><br>
		
		<li>Zdjęcie
		<input type="text" name="Zdjecie"></input>
		
		<br><br>
		
		<li>Cena
		<input type="text" name="Cena"placeholder="zł"></input>
		
		<br><br>
		
		<input type="submit" value="Dodaj nowy produkt"></input>
	</form>
	</ul>
	<br><br>
	
	Dodaj producenta:
	<form action="zapytanie_dodawania_p.php?cododac=producenci&akcja=dodaj" method="post">
		<br>
		<input type="text" name="Nazwa_producenta" placeholder="nazwa producenta"></input>
		<br><br>
		<input type="submit" value="Dodaj nowego producenta"></input>
	</form>
	
	Dodaj kategorię:
	<form action="zapytanie_dodawania_k.php?cododac=kategorie&akcja=dodaj" method="post">
		<br>
		<input type="text" name="Nazwa_kategori" placeholder="nazwa kategorii"></input>
		<br><br>
		<input type="submit" value="Dodaj nową kategorie"></input>
	</form>