<!-- DOCTYPE html -->
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>&#8226;&#8226;&#8226; Marek Trocha &#8226;&#8226;&#8226;</title>
    <meta name="description" content="Marek Trocha | Webdeveloper">
    <meta name="keywords" content="php, połączenie, MySQL">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main2.css">
	<link rel="alternate" hreflang="pl" href="http://trocha.net.pl">
	<link rel="alternate" hreflang="en" href="http://trocha.net.pl/en">
	<link rel="alternate" hreflang="x-default" href="http:/trocha.net.pl/en">
	<script src="flickity.pkgd.min.js"></script>
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
			
				<div class="imgmt">
					<img align="left" style="padding-right:30px; width:50%;" src="marek_trocha_01.png">
					<?php include('cms/text/pl_about_me.php') ?><BR><BR>
					<a href="contact.php">
						<div class="button2">Napisz lub zadzwoń do mnie</div>
					</a>
				</div>
				
				<div class="m_imgmt">
					<img align="left" style="padding-right:30px; width:100%;" src="marek_trocha_01.png">
					<?php include('cms/text/pl_about_me.php') ?><BR><BR>
					<a href="contact.php">
						<div class="button2">Napisz lub zadzwoń do mnie</div>
					</a>
				</div>

				<div class="main-carousel" style="clear:both;">
					<div class="box">
						<?php include('monika-trocha.php') ?>				
					</div>
					<div class="box">
						<?php include('fullmed.php') ?>				
					</div>
					<div class="box">
						<?php include('spe.php') ?>	
					</div>
					<div class="box">
						<?php include('robotworcy.php') ?>	
					</div>
				</div>
				<script>
					var elem = document.querySelector('.main-carousel');
					var flkty = new Flickity( elem, {
					  // options
					  cellAlign: 'left',
					  contain: true
					});

					// element argument can be a selector string
					//   for an individual element
					var flkty = new Flickity( '.main-carousel', {
					  // options
					});
				</script>
				<div class="m_white2"></div>
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