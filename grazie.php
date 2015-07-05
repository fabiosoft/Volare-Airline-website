<?php
    include_once('User.php');
    include_once('Flight.php');
    include_once('Cart.php');

    $current_user = new User();
    $flight_manager = new Flight();
    $cart = new Cart();

    if($current_user->isLoggedIn()) {
        if (isset($_POST['now'])) {
            //buy now
            $my_flights = $current_user->flights_reserved();
            $success_payed = TRUE;
            foreach (array_keys($my_flights) as $cur_flight_id) {
                //$current_flight = $flight_manager->find($cur_flight_id);
                $price = abs($my_flights[$cur_flight_id]['price']);
                if($current_user->can_afford($price)) {
                    $seats = abs($my_flights[$cur_flight_id]['seats']);
                    $payed = $current_user->pay_for_flight($cur_flight_id, $seats, $price);

                    $success_payed = $success_payed & $payed; // bitwise AND so i can check all payments were successful
                    if($success_payed) {
                        $cart->remove_item($cur_flight_id);
                    }

                }else{
                    $success_payed = FALSE;
                }
            }

            if($success_payed == TRUE){
                $cart->remove_all_items($current_user);
            }
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
            <h1><a href="home.php" id="logo">AirLines</a></h1>
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
                <?php if($current_user->isAdmin()): ?>
                    <li><a href="gestione.php"><span><span>Gestione</span></span></a></li>
                <?php endif; ?>

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
                    <div class="box2 top">
                        <?php if($success_payed == TRUE) : ?>
                            <strong>Acquisto effettuato!</strong>
                        <?php else : ?>
                            <strong>Oops!</strong>
                        <?php endif; ?>
                    </div>
                    <div>
                        <div class="pad">
                            <div class="wrapper under">
                                <div class="col1">
                                    <div class="row">
                                        <?php if($success_payed == TRUE) : ?>
                                            <span class="left">Grazie</span>
                                        <?php else : ?>
                                            <span class="left">Non puoi acquistare tutti i voli.</span>
                                        <?php endif; ?>
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