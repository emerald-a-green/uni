<!DOCTYPE html>
<html>
	<head>
		<link rel="Stylesheet" type="text/css" href="style.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>

	<?php
	
		$ile = 0;
		
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
			
		$Columns = array(
			'Kategoria',
			'Producent',
			'Nazwa',
			'Opis',
			'Cena',
			'Inf'
		);
	
		$Lines = explode( '
', file_get_contents( 'towary.txt' ) );

		$Records = array();
		
		foreach( $Lines as $Line )
		{
			$TMPRecord = explode( '|', $Line );
			$Record = array();
		
			foreach( $TMPRecord as $I => $Value )
				$Record[ $Columns[ $I ] ] = $Value;
		
			$Records[] = $Record;
		}
		
		if ( isset( $_GET['Sort'] ) )
		{
			if ( $_GET['Sort'] == 'asc' )
				sort( $Records );
			else
				rsort( $Records );
		}
		
		if ( ! isset( $_GET['Producent'] ) )
			$_GET['Producent'] = "";
		
		if ( ! isset( $_GET['Kategoria'] ) )
			$_GET['Kategoria'] = "";
		
			foreach( $Records as $Item )
			{
				
				
				if ((!$_GET['Producent'] || $Item['Producent'] == $_GET['Producent'] ) &&
					(! $_GET['Kategoria'] || $Item['Kategoria'] == $_GET['Kategoria'] ) )
				{
					$ile++;
			?>
			
			<div class="item">
				<img class="zdjecie" src="zdjecia\<?php echo $Item['Inf']; ?>.jpg">
				<div class="item_kontent">
					<div class="nazwa"><?php echo $Item['Nazwa']; ?></div>
					<div class="producent"><?php echo $Item['Producent']; ?></div>
					<div class="opis"><?php echo $Item['Opis']; ?></div>
					<div class="cena"><?php echo $Item['Cena']; ?> zł</div>
					<div class="kategoria">Kategoria: <?php echo $Item['Kategoria']; ?>
					</div>
				</div>
			</div>
				<?php } }
				
				
		if ( $ile > 0 )
		{
			?>
		
		<center>
		<div class="separator"></div>
		<a style="font-size: 18px;" href="<?php echo '?Sort=asc&Producent='.$producent.'&Kategoria='.$kategoria; ?>">Cena rosnąco</a>
		<span style="color: rgba(0, 0, 0, 0.3)";>•</span>
		<a style="font-size: 18px;" href="<?php echo '?Sort=desc&Producent='.$producent.'&Kategoria='.$kategoria; ?>">Cena malejąco</a>
		
		<div class="separator"></div>
		</center>
		<?php } ?>
	</body>
</html>