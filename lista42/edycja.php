<link rel="Stylesheet" type="text/css" href="style.css" />
<body style="padding: 20px">

Edytuj<br><br>

<?php

	if ( ! isset( $_GET['ID'] ) ) header('Location: http://localhost/lista42/administrator.php');

	$polaczenie = mysql_connect("localhost", "root", "", "lista42");
	if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
	if(mysql_select_db('lista42', $polaczenie) == false ) die( mysql_error() );
	mysql_query("SET NAMES 'utf8'"); 
	
	//lista kategorii
	$zapytanie_kategorie = 'SELECT * FROM kategorie';
	$kategorie = mysql_query($zapytanie_kategorie);
	
	//lista kategorii
	$zapytanie_producenci = 'SELECT * FROM producenci';
	$producenci = mysql_query($zapytanie_producenci);
	
	$ID = $_GET['ID'];
	
	$zapytanie = 'SELECT * FROM produkty WHERE ID='.$ID;
	$rezultat = mysql_query($zapytanie);
	$item = mysql_fetch_assoc( $rezultat );
	
	//mysql_close($polaczenie);
	
	?>
	<form action="zapytanie_edycja.php?ID=<?php echo $ID ?>" method="post">
		<ul>
		<li>Producent<br>
		<select name="producent">
			<?php while ( $producent = mysql_fetch_assoc( $producenci ) ) { ?>
			<option value="<?php echo $producent['ID']?>"<?php if ( $producent['ID'] == $item['producent'] ) echo ' selected';?>><?php echo $producent['Nazwa_producenta'] ?></option>
			<?php } ?>
		</select>
		
		<br><br>
		
		<li>Produkt<br>
		<input type="text" name="Nazwa_produktu" value="<?php echo $item['Nazwa_produktu'] ?>"></input>
		
		<br><br>
		
		<li>Kategoria<br>
		<select name="kategoria" >
			<?php while ( $kategoria = mysql_fetch_assoc( $kategorie ) ) { ?>
			<option value="<?php echo $kategoria['ID']?>"<?php if ( $kategoria['ID'] == $item['kategoria'] ) echo ' selected'; ?>><?php echo $kategoria['Nazwa_kategori'] ?></option>
			<?php } ?>
		</select>
		
		<br><br>
		
		<li>Opis<br>
		<textarea style="height: 200px; width: 500px" name="Opis"><?php echo $item['Opis'] ?></textarea>
		
		<br><br>
		
		<li>Zdjęcia<br>
		<?php
		$zapytanie = 'SELECT * FROM zdjecia WHERE ID_produktu='.$item['ID'];
		$rezultat = mysql_query( $zapytanie );
		while ( $zdjecie = mysql_fetch_assoc( $rezultat ) )
		{
		?>
			<a href="zapytanie_zdjecie_usun.php?ID_zdjecia=<?php echo $zdjecie['ID']; ?>&ID_produktu=<?php echo $ID; ?>">usun</a>
			
			<a href="zapytanie_zdjecie_dom.php?ID_zdjecia=<?php echo $zdjecie['ID']; ?>&ID_produktu=<?php echo $ID; ?>"><img class="zdjecie<?php if ( $zdjecie['dom'] == 1 ) echo 'dom'; ?>" src="<?php echo $zdjecie['url'];?>"/></a>
			<?php
		}
			?>

		<br><br>
		
		<li>Cena<br>
		<input type="text" name="Cena" value="<?php echo $item['Cena'] ?>"></input>
		
		<br><br>
		
		<input type="submit" value="Edycja produktu"></input>
		</ul>
	</form>

	
	
	
	
	
	
	
	
	
	
	
	
	