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
	<h2>Druga strona formularzu</h2>
Imie:<br>
<input type="text" name="imie" value="<?php if(isset($_GET['imie']))echo $_GET['imie']; ?>"><br>
Nazwisko:<br>
<input type="text" name="nazwisko" value="<?php if(isset($_GET['nazwisko']))echo $_GET['nazwisko'];?>" required><br>
Data urodzin:<br>
<input type="date" name="data_urodzin" value="<?php if(isset($_GET['data_urodzin']))echo $_GET['data_urodzin'];?>"  min="1900-12-31"> <br>
Adres email:<br>
<input type="email" name="adres_email" value="<?php if(isset($_GET['adres_email']))echo $_GET['adres_email'];?>"placeholder="poczta@gmail.com" required><br>
Numer telefonu:<br>
<input type="tel" name="numer_telefonu" value="<?php if(isset($_GET['numer_telefonu']))echo $_GET['numer_telefonu'];?>"pattern="[0-9]"> <br>
<br><br>
Kolor produktu:<br>
<input type="color" name="kolor"><br>
Strona internetowa sklepu:<br>
<input type="url" name="strona" placeholder="http://www.skapiec.pl"><br>
Miesiac dostawy:<br>
<input type="month" name="miesiac"><br>
Czas dostawy:<br>
<input type="time" name="czas"><br>
Priorytet zamowienia:<br>
<input type="range" name="wartosc" min="1" max="10" step="1" value="5">
<br><br>
<centre>
<input type="submit" value="Wyslij">
</centre>
</form>
</section>
<footer>Lista 1</footer>
</body>
</html>