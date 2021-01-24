<!DOCTYPE html>
<html lang="en">
    <head>
    <?php wp_head(); ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>OtoEdu | Strona główna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link href="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/css/bootstrap.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/dist/aos.css" />
    <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

</head>
<body>

<header>

    <div class="d-flex justify-content-end">
        
        <!-- LOGO OTOEDU -->
        <div class="mr-auto pl pt-1">
            <a class="navbar-brand" href="http://trocha.net.pl/otoedu/wordpress"><img src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/otoedu-logo.png" class="img-fluid"></a>
        </div>

        <!-- MENU -->
        <!-- < ?php wp_nav_menu(
            array(
                'theme_location' => 'top-menu',
                'menu_class' => 'navbar'
            )
        ); ?>
        -->
        <nav class="navbar navbar-expand-lg navbar-light pt-0 pr-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">O nas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">O zajęciach</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Galeria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontakt</a>
                </li>
                
                <!-- SING IN -->
                <div class="containerLogin">
                    <a href="#">
                        <img class="imageLogin" src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/login.png" class="img-fluid">
                        <div class="overlayLogin">
                            <div class="textLogin">Zaloguj się</div>
                        </div>
                    </a>
                </div>

            </ul>
        </div>
        </nav>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/dist/aos.js"></script>
    <script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>

    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.1.11/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '../dist',
      });

      require(['aos'], function(AOS){
          AOS.init({
              easing: 'ease-in-out-sine'
          });
      });
    </script> -->

</header>

