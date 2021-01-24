<?php
session_start();

	require_once 'PHPMailer.php';
	require_once 'SMTP.php';
	require_once 'Exception.php';
	require_once 'OAuth.php';
			
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\OAuth;

	if (isset($_POST['submit'])){
		
		// Czy reCAPTCHA ok ? - tajny klucz
		$wszystko_OK = true;
		$secret = "***";
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);	
		$odpowiedz = json_decode($sprawdz);
		
		$to = $_POST['email_kontakt'];
		$subject = $_POST['tytul_kontakt'];
		$content = $_POST['tresc_wiadomosci'];

		$_SESSION['fr_email'] = $to;
		$_SESSION['fr_subject'] = $subject;
		$_SESSION['fr_text'] = $content;
		
		if ($odpowiedz->success == false) {
			$wszystko_OK = false;
			$_SESSION['e_bot']='<span style="color:red; font-weight:bold;">Potwierdź, że nie jesteś botem</span>';
			} else {
	
		// Send email
		$mail = new PHPMailer();
			
		//Server settings
		$mail->isSMTP();
		$mail->Host       = '***';
		$mail->Username   = '***';
		$mail->Password   = '***';
		$mail->Port = ***;
		$mail->SMTPAuth = ***; 

		//Recipients
		$mail->AddReplyTo('***');
		$mail->SetFrom('***');
		$mail->AddAddress('***');
	//	$mail->AddBCC('***');

		// Content
		$mail->CharSet = "UTF-8";
		$mail->isHTML(true);
		$mail->Subject = 'Wiadomość ze strony trocha.net.pl';
		$mail->Body    = '
				<B>E-mail nadawcy:</B><BR> '.$to.'<BR><BR>
				<B>Tytuł wiadomości:</B><BR> '.$subject.'<BR><BR>
				<B>Treść wiadomości:</B><BR> '.$content.'<BR><BR>
				<span style="font-size:12px; color:red;">Uwaga! Wiadomość wysłana automatycznie. Nie odpowiadaj na nią!</span>';
		$mail->send();
		header('Location: done.php');			
	}
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
    <link rel="stylesheet" href="main2.css">
	<link rel="alternate" hreflang="pl" href="http://trocha.net.pl">
	<link rel="alternate" hreflang="en" href="http://trocha.net.pl/en">
	<link rel="alternate" hreflang="x-default" href="http://trocha.net.pl/en">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="flickity.pkgd.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

	<div class="container">
		<div class="black">
			<?php include('cms/text/pl_black.php') ?>
		</div>
		<div class="header">
			<?php include('video.php') ?>
			<?php include('header.php') ?>
		</div>

			<div class="main_content">
				
			<BR><BR><h1>Skontaktuj się ze mną lub prześlij wiadomość</h1><BR>
			
			<center>
			<table>
				<tr>
					<td valign="top">
						<div class="foto_mt">
							<img style="height:255px;" src="marek_trocha.png"><BR>
							<span style="font-size:50px; font-weight:bold;"><sup>&#9990;</sup></span>
							<span style="font-size:40px; font-weight:bold; letter-spacing:-3; color:black;">693 877 101</span><BR>
							<span style="font-size:20px; text-align:right;">marek@trocha.net.pl</span>
						</div>
					</td>
					<td>
						<div style="float:left">
							<form method="POST" action="">
								<table align="center" cellpadding="5">
								<tr>
									<td>Twój e-mail:<BR>
									<input style="width:390px;" type="email" name="email_kontakt" value="<?php
										if (isset($_SESSION['fr_email'])) {
											echo $_SESSION['fr_email'];
											unset($_SESSION['fr_email']);
										}
										?>" required/></td>
								</tr>
								<tr>
									<td>Tytuł:<BR>
									<input style="width:390px;" type="text" name="tytul_kontakt" value="<?php
										if (isset($_SESSION['fr_subject'])) {
											echo $_SESSION['fr_subject'];
											unset($_SESSION['fr_subject']);
										}
										?>" required/></td>
								</tr>
								<tr>
									<td>Wiadomość:<BR>
									<input valign="top" style="width:390px; min-height:100px;" type="text" name="tresc_wiadomosci" value="<?php
										if (isset($_SESSION['fr_text'])) {
											echo $_SESSION['fr_text'];
											unset($_SESSION['fr_text']);
										}
										?>" required/></td>
								</tr>
								<td>
									<!-- reCAPCHA start -->
									<div style="padding-top:10px;" class="g-recaptcha" data-sitekey="6Lfzk9cZAAAAADqtjAGUEUKtORUQC_w1zikY23GG"></div>
									<?php
										if (isset($_SESSION['e_bot'])) {
											echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
											unset($_SESSION['e_bot']); 		// trzeba wyczyścić sesję, aby ktoś mógł poprawić błąd
										}
									?>
								</td>
								<tr>
									<td colspan="2" style="padding-top:15px;"><input type="submit" name="submit" Value="Wyślij" />
									</td>
								</tr>
								</table>
							</form><BR>
						</div>
					</td>
				</tr>
			</table>
			</center>
			
			</div>

		<div class="push"></div>
		<div class="white"></div>
		<div class="m_white"></div>
	</div>	
	<div class="footer">
		<?php include('cms/text/pl_footer.php') ?>
	</div>
	
</body>
</html>