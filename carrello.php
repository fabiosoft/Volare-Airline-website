<?php
include_once('User.php');
include_once('Flight.php');
include_once('Cart.php');

$current_user = new User();
$flight_manager = new Flight();

if($current_user->isLoggedIn()) {

    if (isset($_POST['fid'])) {
        $seats = intval($_POST['adults']) + intval($_POST['children']);
        $price = intval($_POST['fprice']);
        $current_user->add_flight($_POST['fid'],$seats,$price);
    }

    $cart = new Cart();
    $my_flights = $current_user->flights_reserved();

    if (isset($_POST['fid'])) {
        $flight_id = $_POST['fid'];
        $this_flight = $flight_manager->find($flight_id);
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
                    <h2 class="top">Il mio carrello</h2>
                    <div class="pad">
                        <strong>Hai <?php echo count($my_flights) ?> voli prenotati</strong><br>
                        Totale: <span class="price"><?php echo $cart->total_amount($current_user) ?>&euro;</span>
                        <br/><br/>
                    </div>
                </div>
            </article>
            <article class="col2">
                <div class="box1">
                    <div class="box2 top"> <strong>Riepilogo voli</strong> </div>

                        <div>
                            <?php foreach (array_keys($my_flights) as $cur_flight_id) : ?>
                            <?php $current_flight = $flight_manager->find($cur_flight_id) ?>

                            <div class="pad">
                                <div class="wrapper under">
                                    <div class="col1">
                                        <div class="row"> <span class="left">Partenza</span>
                                            <?php echo $current_flight['fsrc'] ?>
                                        </div>
                                        <div class="row"> <span class="left">Arrivo</span>
                                            <?php echo $current_flight['fdst'] ?> da &euro; <?php echo $current_flight['fprice'] ?>
                                        </div>
                                    </div>
                                    <?php
                                        $price = $my_flights[$cur_flight_id]['price']; $seats = $my_flights[$cur_flight_id]['seats'];
                                        $this_flight_seats_price = $price * $seats;
                                    ?>
                                    <span class="price"><?php echo $this_flight_seats_price  ?>&euro;</span>
                                </div>
                            </div>


                            <div class="wrapper pad_bot2"></div> <!-- division line -->

                            <?php endforeach; ?>

                            <div class="pad">
                                <div class="wrapper under">
                                    <form id="form_8" action="grazie.php" class="form_5" method="post">
                                    <input class="button_red" type="submit" name="now" value="Acquista ora" />
                                    </form>

                                    <form id="form_8" action="salvati.php" class="form_5" method="post">
                                    <input class="button_blue" type="submit" name="later" value="Acquista più tardi" />
                                    </form>

                                    <form id="form_8" action="voli.php" class="form_5" method="post">
                                    <input class="button_red" type="submit" name="clear" value="Svuota carrello" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
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