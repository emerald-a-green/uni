<!DOCTYPE html>
<html>
	<head>
		<link rel="Stylesheet" type="text/css" href="style.css" />
		<style>
		</style>
	</head>
	<body>
	<?php
		if ( isset( $_POST['login'] ) )
			{
				if ( ( $_POST['login'] == 'admin' ) && ( $_POST['haslo'] == 'admin' ) )
				{
				session_start();
				$_SESSION['admin_ok'] = 1;
				header('Location: http://localhost/lista42/administrator.php');
				}
				echo 'Nieprawidlowe dane logowania(nazwa uzytkownika badz haslo).[Domyslne to admin,admin.]';
			}
		$polaczenie = mysql_connect("localhost", "root", "", "lista42");
		if (!$polaczenie) die( 'Could not connect: ' . mysql_error() );
		
		if
		(mysql_select_db('lista42', $polaczenie) == false )
		die( mysql_error() );
		mysql_query("SET NAMES 'utf8'"); 

		mysql_close($polaczenie);
	?>
	
	<div class="content">
			<form action="zaloguj.php" method="post">
				<center>Formularz logowania dla administratora do bazy danych z listy czwartej.
					<br><br>
				<input type="text" name="login" placeholder="login"></input>
					<br><br>
				<input type="password" name="haslo" placeholder="haslo"></input>
					<br><br>
				<input type="submit" value="Zaloguj"></input>
			</center>
			</form>
		</div>
	</body>
</html>	