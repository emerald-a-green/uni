<!DOCTYPE html>
<html>
<head>
<title>Zadanie 2.Lista 1</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<style>
div.container {
    width: 100%;
    border: 1px solid gray;
}

header, footer {
    padding: 1em;
    color: white;
    background-color: green;
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
<h1>Witaj w ksiazce kucharskiej</h1>
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
	<h2>Wypelnij formularz dotyczacy dania jakie chcesz przygotowac</h2>

<form>
	Typ dania:<br>
<input type="text" name="typ" autofocus required><br>
	Czas przygotowania:<br>
<input type="text" name="czas" required><br>
	Stopien trudnosci(z zakresu 1-5):<br>
<input type="number" name="stopien" min="1" max="5" required> <br>


<input type="submit" value="Wyslij">

</form>
</section>
<footer>Lista 1.zadanie 2</footer>
</body>
</html>