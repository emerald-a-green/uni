<!DOCTYPE html>
<html>
<head>
<title>Zadanie 1.Lista 1</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<style>
div.container {
    width: 100%;
    border: 1px solid gray;
}

header, footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}

nav {
    float: left;
    max-width: 160px;
    margin: 0;
    padding: 1em;
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}

section {
    margin-left: 170px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
</style>
</head>

<body>
<header>
<h1>Witaj w formularzu osobowym!</h1>
</header>
<nav>
<h5>Podreczne linki</h5>
  <ul>
    <li><a href="http://www.pwsz.nysa.pl/~adam.dudek/ntw_sieci/ntw_sieci_lista_1.pdf">Temat zadania</a></li>
    <li><a href="http://www.pwsz.nysa.pl">PWSZ Nysa</a></li>
    <li><a href="http://www.nysa.eu">Nysa</a></li>
  </ul>
</nav>

<section>
	<h2>Pierwsza strona formularzu</h2>

	<form action="strona2.php" method="get">
	Imie:<br>
	<input type="text" name="imie" autofocus><br>
	Nazwisko:<br>
<input type="text" name="nazwisko" required><br>
Data urodzin:<br>
<input type="date" name="data_urodzin" min="1900-12-31"> <br>
Adres email:<br>
<input type="email" name="adres_email" placeholder="poczta@gmail.com" required><br>
Numer telefonu:<br>
<input type="tel" name="numer_telefonu" pattern="[0-9]"> <br>

<input type="submit" value="Wyslij">

</form>
</section>
<footer>Lista 1</footer>
</body>
</html>