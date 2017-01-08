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
	?>
	<ol>
	<li><a href="index.php">Strona główna<a>
	</li></ol>
<ol>
	<li><a href="<?php echo '?Sort='.$sort.'&Producent=&Kategoria='.$kategoria; ?>">Producenci<a>
		<ul>
			<?php
				$Producenci = array();
				
				foreach ( $Records as $Rekord )
				{
					$Producenci[] = $Rekord['Producent'];
				}
				
				$Producenci = array_unique($Producenci);
			
				foreach( $Producenci as $Item )
				{
			?>
			
			<li><a href="<?php echo '?Sort='.$sort.'&Producent='.$Item.'&Kategoria='.$kategoria; ?>"><?php echo $Item; ?><a></li>
			
			<?php
				}
			?>
			
		</ul>
	</li>
	
	<li><a href="<?php echo '?Sort='.$sort.'&Producent=&Kategoria='.$kategoria; ?>">Kategorie<a>
		<ul>
			<?php
				$Kategorie = array();
				
				foreach ( $Records as $Rekord )
				{
					$Kategorie[] = $Rekord['Kategoria'];
				}
				
				$Kategorie = array_unique($Kategorie);
			
				foreach( $Kategorie as $Item )
				{
			?>
			
			<li><a href="<?php echo '?Sort='.$sort.'&Producent='.$producent.'&Kategoria='.$Item; ?>"><?php echo $Item; ?><a></li>
			
			<?php
				}
			?>
			
		</ul>
	</li>

</ol>
