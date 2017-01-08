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
		if ( $_SESSION['admin_ok'] != 0 )
		{
			?>
			<a href="wyloguj.php"><b>Wyloguj</b></a>
			<?php
		}
		
	$ID = $_GET['ID'];
		
		if ( isset( $_GET['Sort'] ) )
			$sort = $_GET['Sort'];
		else $sort = 'asc';
		
		if ( isset( $_GET['Producent'] ) )
			$producent = $_GET['Producent'];
		else $producent = '';
		
		if ( isset( $_GET['Kategoria'] ) )
			$kategoria = $_GET['Kategoria'];
		else $kategoria = '';
		
		$polaczenie = mysql_connect("localhost", "root", "", "lista42");
		if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
		if(mysql_select_db('lista42', $polaczenie) == false ) die( mysql_error() );
		mysql_query("SET NAMES 'utf8'"); 
		
		//lista kategorii
		$zapytanie = 'SELECT * FROM kategorie';
		$rezultat = mysql_query($zapytanie) or die('Blad kategori');
		while ( $rekord = mysql_fetch_assoc( $rezultat ) )
		{
			$Kategorie[ $rekord['ID'] ] = $rekord['Nazwa_kategori'];
		}
		
		//lista producentów
		$zapytanie = 'SELECT * FROM producenci';
		$rezultatat = mysql_query($zapytanie) or die('Blad producentow');
		while ( $rekord = mysql_fetch_assoc( $rezultat ) )
		{
			$Producenci[ $rekord['id'] ] = $rekord['Nazwa_producenta'];
		}
		
		$zapytanie = 'SELECT * FROM produkty WHERE ID='.$ID;
		$rezultat = mysql_query( $zapytanie ) or die('Blad');
		
		$item = mysql_fetch_assoc( $rezultat );
		?>
		
		<div class="item">
			<?php
			$zapytanie = 'SELECT * FROM zdjecia WHERE dom=1 AND ID_produktu='.$item['ID'];
			$rezultat = mysql_query( $zapytanie );
			
			if ( ! $miniaturka = mysql_fetch_assoc( $rezult ) )
			{
				$zapytanie = 'SELECT * FROM zdjecia WHERE id_towar='.$item['id'];
				$rezult = mysql_query( $zapytanie );
				$mini = mysql_fetch_assoc( $rezultat );
			}
			?>
			<a rel="grupa" id="inline" href="<?php echo $mini['url']; ?>"><img class="mini" style="height: 200px; width: 200px" src="<?php echo $mini['url']; ?>"/></a>
			
			
			<div class="item_kontent">
					<div class="nazwa"><?php echo $item['Nazwa_produktu']; ?></div>
					
					<div class="producent"><?php echo $Producenci[$item['producent']]; ?></div>
					
					<div class="opis"><?php echo $item['Opis']; ?></div>
					
					<div class="cena"><?php echo $item['Cena']; ?> z³</div>
					
					<div class="kategoria">Kategoria: <?php echo $Kategorie[$item['kategoria']]; ?>
						
					</div>
					<?php
					$zapytanie = 'SELECT * FROM zdjecia WHERE dom=0 AND ID_produktu='.$item['ID'];
					$rezultat = mysql_query( $zapytanie );
					
					while ( $zdjecie = mysql_fetch_assoc( $rezultat ) )
					{
						?>
						<a rel="grupa" id="inline" href="<?php echo $zdjecie['url']; ?>"><img class="zdjecie" src="<?php echo $zdjecie['url']; ?>"/></a>&nbsp;
						<?php
					}
				?>
			</div>
		</div>
		<?php
		
		mysql_close($polaczenie);

		?>
		<div class="separator"></div>
		<center><a href="http://localhost/lista42/administrator.php">Panel administratora</a></center>
		
		<div class="separator"></div>
	</body>
</html>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		