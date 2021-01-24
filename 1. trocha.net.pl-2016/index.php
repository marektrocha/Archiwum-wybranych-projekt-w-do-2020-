<?php
require_once("connection.php");

$data = date('Y-m-d');
$ip = $_SERVER['REMOTE_ADDR'];									// Adres IP użytkownika
$deadline = date('Y-m-d H:i:s', strtotime('-1 minutes'));		// Po jakim czasie kolejne wejście ma być liczone jako nowa wizyta?
$ip_db = null;													// Adres IP pobrany z bazy "tymczasowej"
$data_db = null;												// Data rejestracji wejścia w tabeli "tymczasowej" (co do sekundy)
$data_check = null;												// Data wejścia na stronę (co do dnia)
$sum = null;													// Suma wszystkich wejść

		$result = mysqli_query($sql, "SELECT * FROM control_ip WHERE ip = '$ip'");
			while($row=mysqli_fetch_assoc($result)) {
				$ip_db = $row['ip'];
				$data_db = $row['data'];
			}
			
		$result = mysqli_query($sql, "SELECT * FROM counter WHERE data = '$data'");
			while($row=mysqli_fetch_assoc($result)) {
				$data_check = $row['data'];
			}
		
		if ($ip_db) {																							// JEŚLI JEST NUMER IP W BAZIE "TYMCZASOWEJ"...
			if ($deadline > $data_db) {																			// Sprawdzenie, czy można dodać nową wizytę na stronie.
				$delete_ip = $sql->query("DELETE FROM control_ip WHERE ip ='$ip'");								// Jeśli tak, usuń rekord z tabeli "tymczasowej"
				if (!$data_check) {																				// Jeśli tego dnia nikt nie był na stronie...
					$add_visit = $sql->query("INSERT INTO counter (data, visit) VALUES ('$data', 1)");			// ...dodaj 1 do tabeli counter i kolumnie "visit"
				} else {
					$update_visit = $sql->query("UPDATE counter SET visit = visit + 1 WHERE data = '$data';");	// ...a już była data, zaktualizuj wartość "visit" o "1"
				}
				$add_ip = $sql->query("INSERT INTO control_ip (ip) VALUES ('$ip')");							// Dodaj zaktualizowaną pozycję w tabeli "tymczasowej"
			} else {
				// jeszcze za wcześnie na dodanie nowego rekordu
			}
		} else {																								// JEŚLI NIE MA NUMERU IP W BAZIE "TYMCZASOWEJ"...
			$add_ip = $sql->query("INSERT INTO control_ip (ip) VALUES ('$ip')");								// ...to dodaj ten nr w tabeli "tymczasowej"
				if (!$data_check) {																				// Jeśli tego dnia nikt nie był na stronie...
					$add_visit = $sql->query("INSERT INTO counter (data, visit) VALUES ('$data', 1)");			// ...dodaj 1 do tabeli counter i kolumnie "visit"
				} else {
					$update_visit = $sql->query("UPDATE counter SET visit = visit + 1 WHERE data = '$data';");	// ...a już była data, zaktualizuj wartość "visit" o "1"
				}
		}
		
		$sum_query = 'SELECT SUM(visit) FROM counter';															// Suma wszystkich wizyt na stronie
		$result = mysqli_query($sql, $sum_query);
			while($row=mysqli_fetch_assoc($result)) {
				$sum_visit = $row['SUM(visit)'];
			}
		
?>
<!-- DOCTYPE html -->
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>&#8226;&#8226;&#8226; Marek Trocha &#8226;&#8226;&#8226;</title>
    <meta name="description" content="Marek Trocha | Webdeveloper">
    <meta name="keywords" content="php, połączenie, MySQL">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css">
	<link rel="alternate" hreflang="pl" href="http://trocha.net.pl">
	<link rel="alternate" hreflang="en" href="http://trocha.net.pl/en">
	<link rel="alternate" hreflang="x-default" href="http:/trocha.net.pl/en">
</head>

<body>
	<div class="filtr-background">
		<?php include('video.php') ?>
			<div class="main">
				<img style="height:140px; padding-left:4%;" src="main.png">
				<hr style="width:50px;">
				<h1>
					<a href="mini-portfolio.php">Poznaj mnie</a>&nbsp; &#8226; &nbsp;
					<a href="https://github.com/marektrocha" target="_blank">GitHub</a>&nbsp; &#8226; &nbsp;
					<a href="contact.php">Kontakt</a>
				</h1><BR>
				<a href="mini-portfolio.php">
					<div class="button">
						Zobacz więcej
					</div>
				</a>				
				<BR><BR>
				<a style="font-size:14px;" href="en">ENG</a>
			</div>
	</div>
</body>
</html>