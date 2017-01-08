<!DOCTYPE html>
<html>
	<head>
		<link rel="Stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php
		session_start();
		
		if ( isset( $_SESSION['admin_ok'] ) )
			unset( $_SESSION['admin_ok'] );
		$_SESSION['admin_ok'] = 0;
		
		if ( isset( $_GET['Sort'] ) )
			$sort = $_GET['Sort'];
		else $sort = 'asc';
		
		if ( isset( $_GET['Producent'] ) )
			$producent = $_GET['Producent'];
		else $producent = '';
		
		if ( isset( $_GET['Kategoria'] ) )
			$kategoria = $_GET['Kategoria'];
		else $kategoria = '';

		include('menu.php');
		
		$polaczenie = mysql_connect("localhost", "root", "", "lista7");
		if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
		if(mysql_select_db('lista4', $polaczenie) == false ) die( mysql_error() );
		mysql_query("SET NAMES 'utf8'"); 
		
		$zapytanie = 'SELECT * FROM produkty';
		
		if ( ( $kategoria != '' ) && ( $producent == '' ) )
			$zapytanie = $zapytanie.' WHERE kategoria="'.$kategoria.'"';
		
		if ( ( $kategoria == '' ) && ( $producent != '' ) )
			$zapytanie = $zapytanie.' WHERE producent="'.$producent.'"';
		
		if ( ( $kategoria != '' ) && ( $producent != '' ) )
			$zapytanie = $zapytanie.' WHERE producent="'.$producent.'" AND kategoria="'.$kategoria.'"';
		
		if ( $sort == 'asc' ) $zapytanie = $zapytanie.' ORDER BY cena ASC';
		else if ( $sort == 'desc' ) $zapytanie = $zapytanie.' ORDER BY cena DESC';
		
		$elementy = mysql_query($zapytanie) or die('Blad');
		$ile = mysql_num_rows($elementy); //liczba elementow spelniajacych zapytanie
		
		//lista kategorii
		$zapytanie = 'SELECT * FROM kategorie';
		$rezult = mysql_query($zapytanie) or die('Blad kategorii');
		while ( $rekord = mysql_fetch_assoc( $rezult ) )
			{
				$Kategorie[ $rekord['ID'] ] = $rekord['Nazwa_kategori'];
			}
		
		//lista producentów
		$zapytanie = 'SELECT * FROM producenci';
		$rezult = mysql_query($zapytanie) or die('Blad producentow');
		while ( $rekord = mysql_fetch_assoc( $rezult ) )
			{
				$Producenci[ $rekord['ID'] ] = $rekord['Nazwa_producenta'];
			}
		
		if ( $ile > 1 )
			{
				?>
					<center>
					<div class="separator"></div>
					<a style="font-size: 18px;" href="<?php echo '?Sort=asc&Producent='.$producent.'&Kategoria='.$kategoria; ?>">Cena rosnąco</a>
					<span style="color: rgba(0, 0, 0, 0.3)";>•</span>
					<a style="font-size: 18px;" href="<?php echo '?Sort=desc&Producent='.$producent.'&Kategoria='.$kategoria; ?>">Cena malejąco</a>
					</center>
					<div class="separator"></div>
				<?php
			}
			
		while($item = mysql_fetch_assoc($elementy))
			{
			?>
			<div class="item">
				<img class="zdjecie" src="<?php echo $item['Zdjecie']; ?>">
				<div class="item_kontent">
					<div class="nazwa"><?php echo $item['Nazwa_produktu']; ?></div>
					
					<div class="producent"><?php echo $Producenci[$item['producent']]; ?></div>
					
					<div class="opis"><?php echo $item['Opis']; ?></div>
					
					<div class="cena"><?php echo $item['Cena']; ?> zł</div>
					
					<div class="kategoria">Kategoria: <?php echo $Kategorie[$item['kategoria']]; ?>
						
					</div>
				</div>
			</div>
			<?php
			}
	mysql_close($polaczenie);
			?>
		<div class="separator"></div>
		<center><a href="http://localhost/lista4/zaloguj.php">Panel administratora</a></center>	
		<div class="separator"></div>
	</body>
</html>	
		