
<html>
<head>
<title>Login</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
* {
  margin: 0;
  padding: 0;
}
.center{
	display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
body {
	font-family: "Open Sans";
  font-size: 14px;
  background-image: url("hole.jpg");
  background-position: top;
  background-repeat: no-repeat;
  background-size: auto;
}
form {
  width: 80%;
  margin: 0 auto;
  margin-top: 10%;
}
form label,
form input,
form button {
  margin-bottom: 1px;
  display: block;
  width: 100%;
  color: white;
}
form input {
  height: 25px;
  line-height: 25px;
  color: #000;
  padding: 0 6px;
  box-sizing: border-box;
}
.button {
  height: 30px;
  line-height: 30px;
  background: blue;
  color: #fff;
  margin-top: 10px;
  cursor: pointer;
  border: 0;
  border-radius: 30px;
}

.back{
	width: 300px;
	margin: 25px auto;
	background-color: #343a40;
	border-radius: 30px;
	padding: 5px;
	padding-bottom: 15px;
}
p{
	padding: 20px;
  	background-color: #f44336;
  	color: white;
	text-align: center;
}
.logged{
	padding: 20px;
  	background-color: #3c464f;
  	color: white;
	text-align: center;
}
img{
	width:700px;
}
</style>
<body>
<nav class="navbar sticky-top navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.html">Početna</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
    </ul>
  </div>  
</nav>
<?php
$username="";
$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$resp=$_POST;
	if (empty($resp["username"]))  {
        	echo "<p>Korisnički račun nije unesen.</p>";
    		}
	else if (empty($resp["password"]))  {
        	echo "<p>Lozinka nije unesena.</p>";
    		}
	else {
		$username= $resp["username"];
		$password= $resp["password"];
		$xml=simplexml_load_file("korisnici.xml");

		foreach ($xml->korisnik as $korisnik) {
			   $ime = $korisnik->korisnicko_ime;
			$pass = $korisnik->password;
			$kor_ime=$korisnik->ime;
			$prezime=$korisnik->prezime;
			$jmbag=$korisnik->JMBAG;
			$adresa=$korisnik->adresa;
			if($ime==$username){
				if($pass == $password){
					echo "<p class='logged' >Welcome: " .$kor_ime. " " .$prezime. "</br>JMBAG: " .$jmbag. "</br>Adresa: " .$adresa. "</p>";
					echo '<div class="center"><img class="center" src="user.jpg"></div>';
					echo '<div class="center"><H1 class="center">Earth from space</H1></div>';
					return;
					}
				else{
					echo "<p>Netočna lozinka</p>";
					print '<div class="back" >
					<form action="" method="post">
						<label>USERNAME:</label></br>
						<input id="name" name="username" placeholder="Username" type="text"></br>
						<label>PASSWORD:</label></br>
						<input id="password" name="password" placeholder="Password" type="password"></br>
						<input class="button" name="submit" type="submit" value=" Login ">
					</form>
				</div>';
					return;
					}
				}
			}
			
		echo "<p>Korisnik ne postoji.</p>";
		print '<div class="back" >
					<form action="" method="post">
						<label>USERNAME:</label></br>
						<input id="name" name="username" placeholder="Username" type="text"></br>
						<label>PASSWORD:</label></br>
						<input id="password" name="password" placeholder="Password" type="password"></br>
						<input class="button" name="submit" type="submit" value=" Login ">
					</form>
				</div>';
		return;
	}
}


?>

<div class="back" >
	<form action="" method="post">
		<label>USERNAME:</label></br>
		<input id="name" name="username" placeholder="Username" type="text"></br>
		<label>PASSWORD:</label></br>
		<input id="password" name="password" placeholder="Password" type="password"></br>
		<input class="button" name="submit" type="submit" value=" Login ">
	</form>
</div>



</body>
</html>
