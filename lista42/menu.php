<?php
	if ( isset( $_GET['Sort'] ) )
		$sort = $_GET['Sort'];
	else $sort = 'asc';
	
	if ( isset( $_GET['Producent'] ) )
		$producent = $_GET['Producent'];
	else $producent = '';
	
	if ( isset( $_GET['Kategoria'] ) )
		$kategoria = $_GET['Kategoria'];
	else $kategoria = '';
	
	if ( isset( $_GET['Sort'] ) )
		$sort = $_GET['Sort'];
	else $sort = '';

	$polaczenie = mysql_connect("localhost", "root", "", "lista42");
	if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
	
	if(mysql_select_db('lista42', $polaczenie) == false ) die( mysql_error() );
	mysql_query("SET NAMES 'utf8'");
	
	//kategorie
	$zapytanie = 'SELECT * FROM kategorie';
	$rezultat = mysql_query($zapytanie) or die('Blad kategorii');
	
	while ( $rekord = mysql_fetch_assoc( $rezultat ) )
		{
			$Kategorie[ $rekord['ID'] ] = $rekord['Nazwa_kategori'];
		}
	//producenci
	$zapytanie = 'SELECT * FROM producenci';
	$rezultat = mysql_query($zapytanie) or die('Blad producenta');
	
	while ( $rekord = mysql_fetch_assoc( $rezultat ) )
		{
			$Producenci[ $rekord['ID'] ] = $rekord['Nazwa_producenta'];
		}
	mysql_close($polaczenie);
?>
<ol>
	<li><a href="<?php echo '?Sort='.$sort.'&Producent=&Kategoria='.$kategoria; ?>">Producenci<a>
		<ul>
			<?php
				foreach ( $Producenci as $rekord => $value)
				{
					?>
					<li><a <?php if ( $producent == $rekord ) echo ' style="font-weight: bold"'; ?> href="<?php echo '?Sort='.$sort.'&Producent='.$rekord.'&Kategoria='.$kategoria; ?>"><?php echo $Producenci[ $rekord ]; ?></a></li>
					<?php
				}
					?>
		</ul>
	</li>
	
	<li><a href="<?php echo '?Sort='.$sort.'&Producent='.$producent.'&Kategoria='?>">Kategorie<a>
		<ul>
			<?php
				foreach ( $Kategorie as $rekord => $value)
				{
			?>
					<li><a<?php if ( $kategoria == $rekord ) echo ' style="font-weight: bold"'; ?> href="<?php echo '?Sort='.$sort.'&Producent='.$producent.'&Kategoria='.$rekord; ?>"><?php echo $Kategorie[ $rekord ]; ?></a></li>
			<?php
				}
			?>	
		</ul>
	</li>
</ol>
