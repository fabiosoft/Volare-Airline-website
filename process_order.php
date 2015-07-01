<?php
    include_once('User.php');
    include_once('Flight.php');
    include_once('Cart.php');

    $current_user = new User();
    $flight_manager = new Flight();

    if($current_user->isLoggedIn()) {

        echo "<pre>";
        echo print_r($_POST);
        echo "</pre>";

        if (isset($_POST['now'])) {
            //buy now
            $my_flights = $current_user->flights_reserved();
            $success_payed = $current_user->pay_for_flight(1,1,1);
            echo "<pre>";
            echo $success_payed;
            echo "</pre>";
        }

    }else{
        die("not logged in");
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>VolareWeb</title>
    <?php require_once('head_imports.php') ?>
</head>
<body id="page3">
<div class="main">
    <!--header -->
    <header>
        <div class="wrapper">
            <h1><a href="index.html" id="logo">AirLines</a></h1>
            <span id="slogan">Fast, Frequent &amp; Safe Flights</span>
            <nav id="top_nav">
                <?php include_once ('top_nav.php')?>
            </nav>
        </div>
        <nav>
            <ul id="menu">
                <li><a href="home.php"><span><span>Home</span></span></a></li>
                <li><a href="voli.php"><span><span>Voli</span></span></a></li>
                <li><a href="carrello.php"><span><span>Carrello</span></span></a></li>
                <li><a href="services.html"><span><span>Services</span></span></a></li>
                <li><a href="safety.html"><span><span>Safety</span></span></a></li>
                <li class="end"><a href="contacts.html"><span><span>Contacts</span></span></a></li>
            </ul>
        </nav>
    </header>
    <!-- header -->
    <!--content -->
    <section id="content">
        <div class="wrapper pad1">
            <article class="col1">
                <div class="box1">
                    <h2 class="top"></h2>
                    <div class="pad">
                    </div>
                </div>
            </article>
            <article class="col2">
                <div class="box1">
                    <?php  ?>
                    <div class="box2 top"> <strong>Acquisto effettuato!</strong> </div>
                    <div>
                        <div class="pad">
                            <div class="wrapper under">
                                <div class="col1">
                                    <div class="row"> <span class="left">Grazie</span>
                                    </div>
                                </div>
                                <span class="price"></span>
                            </div>
                        </div>
                        <div class="wrapper pad_bot2"></div> <!-- division line -->
                        <div class="pad"></div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <!--content end-->
    <!--footer -->
    <footer>
        <?php include_once('footer.php') ?>
    </footer>
    <!--footer end-->
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>