<!DOCTYPE html>
<html>
	<head>
		<link rel="Stylesheet" type="text/css" href="style.css" />
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script>
			!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
		</script>
		<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
		<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
		
	</head>
	<body style="padding: 20px">
		<script src="jslightbox.js" type="text/javascript"></script>
		<script>
			$(document).ready(function()
				{
					$("a#inline").fancybox(
						{
							'hideOnContentClick': true
						}
					);
				}
			);
		</script>
	<?php
		session_start();
		
		session_start();
		if ( $_SESSION['admin_ok'] != 0 )
		{
			?>
			<a href="wyloguj.php"><b>Wyloguj</b></a>
			<?php
		}
		
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
		
		$polaczenie = mysql_connect("localhost", "root", "", "lista42");
		if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
		if(mysql_select_db('lista42', $polaczenie) == false ) die( mysql_error() );
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
				<?php
				//zdjecie=1 jako domyslnie wyswietlane
					$zapytanie = 'SELECT * FROM zdjecia WHERE dom=1 AND ID_produktu='.$item['ID'];
					$rezultat = mysql_query( $zapytanie );
					
					if ( ! $mini = mysql_fetch_assoc( $rezultat ) )
					{
						$zapytanie = 'SELECT * FROM zdjecia WHERE ID_produktu='.$item['ID'];
						$rezultat = mysql_query( $zapytanie );
						$mini = mysql_fetch_assoc( $rezultat );
					}
					?>
					
					<a id="inline" href="<?php echo $mini['url']; ?>"><img class="mini" src="<?php echo $mini['url']; ?>"/></a>

				<div class="item_kontent">
				<a class="nazwa" href="szczegoly.php?ID=<?php echo $item['ID']; ?>"><?php echo $item['Nazwa_produktu']; ?></a>

					<div class="producent"><?php echo $Producenci[$item['producent']]; ?></div>
				
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
		<center><a href="http://localhost/lista42/zaloguj.php">Panel administratora</a></center>	
		<div class="separator"></div>
	</body>
</html>	
		