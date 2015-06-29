<?php
    include_once('Flight.php');
    $flight_manager = new Flight();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>AirLines | Book</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/cufon-replace.js"></script>
    <script type="text/javascript" src="js/Cabin_400.font.js"></script>
    <script type="text/javascript" src="js/tabs.js"></script>
    <script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="js/atooltip.jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5.js"></script>
    <style type="text/css">.main, .tabs ul.nav a, .content, .button1, .box1, .top { behavior:url("../js/PIE.htc")}</style>
    <![endif]-->
</head>
<body id="page3">
<div class="main">
    <!--header -->
    <header>
        <div class="wrapper">
            <h1><a href="index.html" id="logo">AirLines</a></h1>
            <span id="slogan">Fast, Frequent &amp; Safe Flights</span>
            <nav id="top_nav">
                <ul>
                    <li><a href="index.html" class="nav1">Home</a></li>
                    <li><a href="#" class="nav2">Sitemap</a></li>
                    <li><a href="contacts.html" class="nav3">Contact</a></li>
                </ul>
            </nav>
        </div>
        <nav>
            <ul id="menu">
                <li><a href="index.html"><span><span>About</span></span></a></li>
                <li><a href="offers.html"><span><span>Offers</span></span></a></li>
                <li id="menu_active"><a href="book.html"><span><span>Book</span></span></a></li>
                <li><a href="services.html"><span><span>Services</span></span></a></li>
                <li><a href="safety.html"><span><span>Safety</span></span></a></li>
                <li class="end"><a href="contacts.html"><span><span>Contacts</span></span></a></li>
            </ul>
        </nav>
    </header>
    <!-- / header -->
    <!--content -->
    <section id="content">
        <div class="wrapper pad1">
            <article class="col1">
                <div class="box1">
                    <h2 class="top">Hot Offers of the Week</h2>
                    <div class="pad"> <strong>Birmingham</strong><br>
                        <ul class="pad_bot1 list1">
                            <li><span class="right color1">from GBP 143.-</span><a href="book2.html">Zurich</a></li>
                        </ul>
                        <strong>London (LCY)</strong><br>
                        <ul class="pad_bot1 list1">
                            <li><span class="right color1">from GBP 176.-</span><a href="book2.html">Geneva</a></li>
                            <li><span class="right color1">from GBP 109.-</span><a href="book2.html">Zurich</a></li>
                        </ul>
                        <strong>London (LHR)</strong><br>
                        <ul class="pad_bot2 list1">
                            <li><span class="right color1">from GBP 100.-</span><a href="book2.html">Geneva</a></li>
                            <li><span class="right color1">from GBP 112.-</span><a href="book2.html">Zurich</a></li>
                            <li><span class="right color1">from GBP 88.-</span><a href="book2.html">Basel</a></li>
                        </ul>
                        <strong>Manchester</strong><br>
                        <ul class="pad_bot2 list1">
                            <li><span class="right color1">from GBP 97.-</span><a href="book2.html">Basel</a></li>
                            <li><span class="right color1">from GBP 103.-</span><a href="book2.html">Zurich</a></li>
                        </ul>
                        <strong>Edinburgh</strong><br>
                        <ul class="pad_bot2 list1">
                            <li><span class="right color1">from GBP 165.-</span><a href="book2.html">Zurich</a></li>
                        </ul>
                        <strong>Birmingham</strong><br>
                        <ul class="pad_bot1 list1">
                            <li><span class="right color1">from GBP 143.-</span><a href="book2.html">Zurich</a></li>
                        </ul>
                        <strong>London (LCY)</strong><br>
                        <ul class="pad_bot1 list1">
                            <li><span class="right color1">from GBP 176.-</span><a href="book2.html">Geneva</a></li>
                            <li><span class="right color1">from GBP 109.-</span><a href="book2.html">Zurich</a></li>
                        </ul>
                        <strong>London (LHR)</strong><br>
                        <ul class="pad_bot2 list1">
                            <li><span class="right color1">from GBP 100.-</span><a href="book2.html">Geneva</a></li>
                            <li><span class="right color1">from GBP 112.-</span><a href="book2.html">Zurich</a></li>
                            <li><span class="right color1">from GBP 88.-</span><a href="book2.html">Basel</a></li>
                        </ul>
                    </div>
                </div>
            </article>
            <article class="col2">
                <div class="box1">
                    <h2 class="top">All our flights</h2>

                    <?php
                    $all_flights = $flight_manager->index();
                    foreach ($all_flights as $flight) : ?>

                    <div class="content">
                        <div class="tab-content" id="Flight">
                            <form id="form_5" action="#" class="form_5" method="post">
                                <div>
                                    <div class="wrapper">
                                        <h2><?php echo $flight['fsrc']?></h2>
                                    </div>

                                    <div class="pad">
                                        <div class="wrapper under"> <span class="left">Flights</span>
                                            <div class="cols marg_right1">
                                                <h6><?php echo $flight['fsrc']?></h6>
                                            </div>
                                            <div class="cols">
                                                <h5><?php echo $flight['fdst']?></h5>
                                            </div>
                                            <span class="right relative"><a href="#" class="button1"><strong>Details</strong></a></span> </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php endforeach; ?>


                </div>
            </article>
        </div>
    </section>
    <!--content end-->
    <!--footer -->
    <footer>
        <div class="wrapper">
            <ul id="icons">
                <li><a href="#" class="normaltip"><img src="images/icon1.jpg" alt=""></a></li>
                <li><a href="#" class="normaltip"><img src="images/icon2.jpg" alt=""></a></li>
                <li><a href="#" class="normaltip"><img src="images/icon3.jpg" alt=""></a></li>
                <li><a href="#" class="normaltip"><img src="images/icon4.jpg" alt=""></a></li>
                <li><a href="#" class="normaltip"><img src="images/icon5.jpg" alt=""></a></li>
                <li><a href="#" class="normaltip"><img src="images/icon6.jpg" alt=""></a></li>
            </ul>
            <div class="links">Copyright &copy; <a href="#">Domain Name</a> All Rights Reserved<br>
                Design by <a target="_blank" href="http://www.templatemonster.com/">TemplateMonster.com</a></div>
        </div>
    </footer>
    <!--footer end-->
</div>
<script type="text/javascript">Cufon.now();</script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.form_5').jqTransform({
            imgPath: 'jqtransformplugin/img/'
        });
    });
    $(document).ready(function () {
        tabs2.init();
    });
</script>
</body>
</html>