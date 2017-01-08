<!DOCTYPE html>
<html>
	<head>
		<link rel="Stylesheet" type="text/css" href="style.css" />
		<style>
			tr {
				height: 50px;
			}
			
			td, th {
				padding: 10px;
			}
			
			table {
				width: 100%;
			}
		</style>
	</head>
	<body>
	<?php
		
		session_start();
		if ( ! isset( $_SESSION['admin_ok'] ) || ( ! $_SESSION['admin_ok'] == 1) )
			header('Location: http://localhost/lista4/zaloguj.php');
		
		$polaczenie = mysql_connect("localhost", "root", "", "lista4");
		if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
		
		if(mysql_select_db('lista4', $polaczenie) == false ) die( mysql_error() );
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
		$rezultat = mysql_query($zapytanie) or die('Blad producenci');
		
		while ( $rekord = mysql_fetch_assoc( $rezultat ) )
			{
				$Producenci[ $rekord['ID'] ] = $rekord['Nazwa_producenta'];
			}
		
		//produkty
		$zapytanie = 'SELECT * FROM produkty';
		$rezultat = mysql_query($zapytanie) or die('Blad produktu');
		
		/*while ( $rekord = mysql_fetch_assoc( $rezultat ) )
			{
				$Produkty[ $rekord['ID'] ] = $rekord['Nazwa_produktu'];
			}	
		*/
		
		$ile = mysql_num_rows($rezultat); //rekordy spelniajace zapytanie
		
		?>
			<center>
			<h2>Panel administratora</h2>
			Wybierz widok tabeli
			<select name="wybor">
				<option value="pelna" name="pelna">pelna</option>
				<option value="skrocona" name="skrocona">skrocona</option>
			</select>
			<?php while ($wybor==$pelna)
			{?>
			<table>
				<tr style="background-color: rgba(0, 0, 0, 0.1)">
					<th>ID</th>
					<th>Nazwa produktu</th>
					<th>Producent</th>
					<th>Kategoria</th>
					<th>Opis</th>
					<th>Cena</th>
					<th>Zdjecie</th>
					<th style="text-align: center">Edytuj</th>
					<th style="text-align: center">Usun</th>
				</tr>
				
		<?php
		$kursor = 1;	
		while($item = mysql_fetch_assoc( $rezultat ) )
		{
			?>
				<tr<?php if ( $kursor % 2 == 0 ) echo ' style="background-color: rgba(0, 0, 0, 0.05)"'; ?>>
						<td><?php echo $item['ID']?></td>
						<td><?php echo $item['Nazwa_produktu']?></td>
						<td><?php echo $Producenci[$item['producent']]?></td>					
						<td><?php echo $Kategorie[$item['kategoria'] ]?></td>
						<td><?php echo substr($item['Opis'], 0, 64).'...'?></td>
						<td><?php echo $item['Cena']?></td>
						<td><?php echo substr($item['Zdjecie'], 0, 64).'...'?></td>
						<td style="text-align: center"><?php echo '<a href=edycja.php?ID='.$item['ID'].'>edytuj</a>';?></td>
						<td style="text-align: center"><?php echo '<a href=zapytanie_usun.php?ID='.$item['ID'].'>usun</a>';?></td>	
				</tr>
			<?php
			$kursor++;
		}
		
		?>
			<tr>
				<td colspan="9" style="text-align: center; background-color: rgba(0, 0, 0, 0.2)"><?php echo '<a href=dodawanie.php>Dodaj produkt/producenta/kategorie produktu</a>';?></td>
			</tr>
			</table>
			</center>
		<?php
			}
		?>
		
		<?php while ($wybor==$skrocona)
			{?>
			<table>
				<tr style="background-color: rgba(0, 0, 0, 0.1)">
					<th>ID</th>
					<th>Nazwa produktu</th>
					<th>Producent</th>
					<th>Kategoria</th>
					<th style="text-align: center">Edytuj</th>
					<th style="text-align: center">Usun</th>
				</tr>
				
		<?php
		$kursor = 1;	
		while($item = mysql_fetch_assoc( $rezultat ) )
		{
			?>
				<tr<?php if ( $kursor % 2 == 0 ) echo ' style="background-color: rgba(0, 0, 0, 0.05)"'; ?>>
						<td><?php echo $item['ID']?></td>
						<td><?php echo $item['Nazwa_produktu']?></td>
						<td><?php echo $Producenci[$item['producent']]?></td>					
						<td><?php echo $Kategorie[$item['kategoria'] ]?></td>
						<td style="text-align: center"><?php echo '<a href=edycja.php?ID='.$item['ID'].'>edytuj</a>';?></td>
						<td style="text-align: center"><?php echo '<a href=zapytanie_usun.php?ID='.$item['ID'].'>usun</a>';?></td>	
				</tr>
			<?php
			$kursor++;
		}
		
		?>
			<tr>
				<td colspan="9" style="text-align: center; background-color: rgba(0, 0, 0, 0.2)"><?php echo '<a href=dodawanie.php>Dodaj produkt/producenta/kategorie produktu</a>';?></td>
			</tr>
			</table>
			</center>
		<?php
			}
		?>
		
		<?php
		mysql_close($polaczenie);
		?>
	</body>
</html>
		
		
		
		
		
		
		
		
		
		
		
		
		
			