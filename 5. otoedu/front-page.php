<?php get_header(); ?>

<!-- 1. IMAGE AND SEARCH -->
<section>
    <div class="frontendImageLeft aos-item" data-aos="zoom-out" style="margin-left:-7%;">
        <img src="<?php echo get_field('image01')['url']; ?>" class="img-fluid">
    </div>

    <div class="frontendText">
        <h1><?php the_field('title') ?></h1>

        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="parts active"><a href="#part1" role="tab" data-toggle="tab">Zajęcia</a></li>
            <li class="parts"><a href="#part2" role="tab" data-toggle="tab">Eventy</a></li>
        </ul>

        </br>

        <div class="tab-content">

            <!-- Content: zajęcia -->
            <div class="tab-pane active" id="part1">
                <div class="input-group mb-3" style="width: 600px;">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Miasto</option>
                        <option value="1">Gdańsk</option>
                        <option value="2">Gdynia</option>
                        <option value="3">Sopot</option>
                    </select>
                    <input type="text" class="form-control" placeholder="Szkoła" aria-label="Szkoła" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">Szukaj</button>
                    </div>
                </div>

                <div class="scoreBox">Matematyka
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="scoreBox">Sp. 24
                        <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <!-- Content: zajęcia -->
            <div class="tab-pane" id="part2">
            <div class="input-group mb-3" style="width: 560px;">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Miasto</option>
                        <option value="1">Gdańsk</option>
                        <option value="2">Gdynia</option>
                        <option value="3">Sopot</option>
                    </select>
                    <input type="text" class="form-control" placeholder="Event" aria-label="Event" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">Szukaj</button>
                    </div>
                </div>
             
                <div class="scoreBox">Gdynia
                        <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- 2. THREE BOXES ------->
<section>
    <div class="frontend">
        <div class="d-flex justify-content-center align-items-center">
            <div class="container aos-item" data-aos="zoom-out">
            <div class="title"><?php the_field('title') ?></div>
                <div class="otoedu-d-flex">
                    <div class="p-2">

                        <div class="container">
                            <div class="hr"><hr></div>
                                <img src="<?php echo get_field('image02')['url']; ?>" style="width:100%;" class="img-fluid">
                                <div class="bottom-right">
                                <div class="elementOnImageLogo">
                                    <img src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/otoedu-logo-null.png" style="width:50%;" class="img-fluid">
                            </div>
                        </div>
                        </div></br>
                        <h4 style="color:#0062a0">Zajęcia</h4>
                        <h2><?php the_field('text1') ?></h2>
                        <h3><?php the_field('content-text1') ?></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width:150px;">
                                            <img class="pr-3" style="float:left;" src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/alarm-clock.png" class="img-fluid">
                                            <p class="text-primary pl-3"><b>CZAS TRWANIA</b></p>
                                        </td>
                                        <td><p class="text-primary pl-3" style="text-transform: uppercase;"><?php the_field('time1') ?> min</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="pr-3" style="float:left;" src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/wallet.png" class="img-fluid">
                                            <p class="text-primary pl-3"><b>CENA</b></p>
                                        </td>
                                        <td><p class="text-primary pl-3" style="text-transform: uppercase;"><?php the_field('price1') ?> zł / zajęcia</p></td>
                                    </tr>
                                </tbody>
                            </table>
                        <div class="d-flex justify-content-end" style="float:right;">
                            <a href="#" class="otoeduButton otoeduLabel">Zobacz</a>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="otoeduButtonWhite otoeduLabelWhite">Zapisz się</a>
                        </div>
                        
                    </div>
                    
                    <div class="p-2">

                        <div class="container">
                        <div class="hr"><hr></div>
                                <img src="<?php echo get_field('image03')['url']; ?>" style="width:100%;" class="img-fluid">
                                <div class="bottom-right">
                                <div class="elementOnImageLogo">
                                    <img src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/otoedu-logo-null.png" style="width:50%;" class="img-fluid">
                                </div>
                                </div>
                        </div></br>
                        <h4 style="color:#0062a0">Zajęcia</h4>
                        <h2><?php the_field('text2') ?></h2>
                        <h3><?php the_field('content-text2') ?></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width:150px;">
                                            <img class="pr-3" style="float:left;" src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/alarm-clock.png" class="img-fluid">
                                            <p class="text-primary pl-3"><b>CZAS TRWANIA</b></p>
                                        </td>
                                        <td><p class="text-primary pl-3" style="text-transform: uppercase;"><?php the_field('time2') ?>  min</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="pr-3" style="float:left;" src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/wallet.png" class="img-fluid">
                                            <p class="text-primary pl-3"><b>CENA</b></p>
                                        </td>
                                        <td><p class="text-primary pl-3" style="text-transform: uppercase;"><?php the_field('price2') ?>  zł / zajęcia</p></td>
                                    </tr>
                                </tbody>
                            </table>
                        <div class="d-flex justify-content-end" style="float:right;">
                            <a href="#" class="otoeduButton otoeduLabel">Zobacz</a>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="otoeduButtonWhite otoeduLabelWhite">Zapisz się</a>
                        </div>

                    </div>

                    <div class="p-2">
                        
                        <div class="container">
                        <div class="hr"><hr></div>
                                <img src="<?php echo get_field('image04')['url']; ?>" style="width:100%;" class="img-fluid">
                                <div class="bottom-right">
                                <div class="elementOnImageLogo">
                                    <img src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/otoedu-logo-null.png" style="width:50%;" class="img-fluid">
                                </div>
                                </div>
                        </div></br>
                        <h4 style="color:#0062a0">Zajęcia</h4>
                        <h2><?php the_field('text3') ?></h2>
                        <h3><?php the_field('content-text3') ?></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width:150px;">
                                            <img class="pr-3" style="float:left;" src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/alarm-clock.png" class="img-fluid">
                                            <p class="text-primary pl-3"><b>CZAS TRWANIA</b></p>
                                        </td>
                                        <td><p class="text-primary pl-3" style="text-transform: uppercase;"><?php the_field('time3') ?> min</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="pr-3" style="float:left;" src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/wallet.png" class="img-fluid">
                                            <p class="text-primary pl-3"><b>CENA</b></p>
                                        </td>
                                        <td><p class="text-primary pl-3" style="text-transform: uppercase;"><?php the_field('price3') ?> zł / zajęcia</p></td>
                                    </tr>
                                </tbody>
                            </table>
                        <div class="d-flex justify-content-end" style="float:right;">
                            <a href="#" class="otoeduButton otoeduLabel">Zobacz</a>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="otoeduButtonWhite otoeduLabelWhite">Zapisz się</a>
                        </div>

                        <div class="hr"><hr></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</br></br>

<!-- 3. EVENT ----------->
<section>
    <div class="frontend">
        <div class="d-flex justify-content-center align-items-center">
            <div class="container aos-item" data-aos="zoom-out">
                <div class="d-flex justify-content-between">
                    <div class="imageEvent p-2" style="width:50%;">
                        <div class="container">
                            <img src="<?php echo get_field('image05')['url']; ?>" style="width:100%;" class="img-fluid">
                            <div class="bottom-right">
                            <div class="elementOnImageEvent">&#9733;</div>
                            </div>
                        </div>
                    </div>

                    <div class="frontendEvent">
                        <h4>Event miesiąca</h4>
                        <h2><?php the_field('event-title') ?></h2>
                        <h3><?php the_field('event-content') ?></h3>
                        </br>
                        <table>
                            <tbody>
                                <tr>
                                    <td style="width:150px;">
                                        <img class="pr-3" style="float:left;" src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/alarm-clock.png" class="img-fluid">
                                        <p class="text-primary pl-3"><b>CZAS TRWANIA</b></p>
                                    </td>
                                    <td><p class="text-primary pl-3" style="text-transform: uppercase;"><?php the_field('event-time') ?> min</p></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="pr-3" style="float:left;" src="http://trocha.net.pl/otoedu/wordpress/wp-content/themes/marektrocha/images/wallet.png" class="img-fluid">
                                        <p class="text-primary pl-3"><b>CENA</b></p>
                                    </td>
                                    <td><p class="text-primary pl-3" style="text-transform: uppercase;"><?php the_field('event-price') ?> zł / zajęcia</p></td>
                                </tr>
                            </tbody>
                        </table>
                        </br>
                        <div class="d-flex justify-content-end" style="float:right;">
                            <a href="#" class="otoeduButton otoeduLabel">Zobacz</a>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="otoeduButtonWhite otoeduLabelWhite">Zapisz się</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</br></br>

<!-- 4. BLUE BLOCK -->
<section>
    <div class="frontendBlock aos-item" data-aos="zoom-out">
        <div class="d-flex justify-content-center align-items-center" style="min-height:250px">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="p-2" style="width:50%;"><?php the_field('bluebox'); ?></div>
                    <div class="p-2">
                        <a href="#" class="otoeduButtonWhite otoeduLabelWhite">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</br></br>

<!-- 5. ABOUT OTOEDU ------>
<section>

<div class="frontend aos-item" data-aos="zoom-out">
    <div class="imageAbout1">
        <img style="float:left;" src="<?php echo get_field('image06')['url']; ?>" class="img-fluid">
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="frontendTextAbout">
            <h1><?php the_field('about1'); ?></h1>
            <h3><?php the_field('content-about1'); ?></h3></br></br>
            <div class="d-flex justify-content-end">
                <a href="#" class="otoeduButton otoeduLabel">Zobacz więcej</a>
            </div>
        </div>
    </div>
</div>

<div class="hr"><hr></div>

<div class="frontend aos-item" data-aos="zoom-out">
    <div class="imageAbout2">
        <img style="float:right;" src="<?php echo get_field('image07')['url']; ?>" class="img-fluid">
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="frontendTextAbout">
        <h1><?php the_field('about2'); ?></h1>
            <h3><?php the_field('content-about2'); ?></h3></br></br>
            <div class="d-flex justify-content-end">
                <a href="#" class="otoeduButton otoeduLabel">Zobacz więcej</a>
            </div>
        </div>
    </div>
</div>

<div class="hr"><hr></div>

</section>

</br></br>

<!-- 6. BLOG -------------->
<section>
    <div class="frontend">
        <div class="d-flex justify-content-center align-items-center">
            <div class="container">

                <h1>Blog</h1>
                <div class="otoedu-d-flex">

                    <div class="blog p-2">
                        <div class="container aos-item" data-aos="zoom-out">
                                <img src="<?php echo get_field('image08')['url']; ?>" style="width:100%;" class="img-fluid">
                                <div class="bottom-right">
                                <div class="elementOnImageDate"><?php the_field('date1'); ?></div>
                                </div>
                        </div></br>
                        <h2><?php the_field('blog-title1'); ?></h2>
                        <h3><?php the_field('blog-content1'); ?></h3>
                        <div class="d-flex justify-content-end" style="float:right;">
                            <a href="#" class="otoeduButton otoeduLabel">Zobacz</a>
                        </div>
                    </div>

                    <div class="blog p-2">
                        <div class="container aos-item" data-aos="zoom-out">
                        <div class="hr"><hr></div>
                                <img src="<?php echo get_field('image09')['url']; ?>" style="width:100%;" class="img-fluid">
                                <div class="bottom-right">
                                <div class="elementOnImageDate"><?php the_field('date2'); ?></div>
                                </div>
                        </div></br>
                        <h2><?php the_field('blog-title2'); ?></h2>
                        <h3><?php the_field('blog-content2'); ?></h3>
                        <div class="d-flex justify-content-end" style="float:right;">
                            <a href="#" class="otoeduButton otoeduLabel">Zobacz</a>
                        </div>
                    </div>

                    <div class="blog p-2">
                        <div class="container aos-item" data-aos="zoom-out">
                        <div class="hr"><hr></div>
                                <img src="<?php echo get_field('image10')['url']; ?>" style="width:100%;" class="img-fluid">
                                <div class="bottom-right">
                                <div class="elementOnImageDate"><?php the_field('date3'); ?></div>
                                </div>
                        </div></br>
                        <h2><?php the_field('blog-title3'); ?></h2>
                        <h3><?php the_field('blog-content3'); ?></h3>
                        <div class="d-flex justify-content-end" style="float:right;">
                            <a href="#" class="otoeduButton otoeduLabel">Zobacz</a>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</section>

</br></br>


<?php get_footer(); ?>