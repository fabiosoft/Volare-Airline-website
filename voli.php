<?php
    include_once('Flight.php');
    include_once('User.php');
    include_once('Cart.php');
    $current_user = new User();
    $flight_manager = new Flight();
    $cart = new Cart();

    if(isset($_POST['clear'])){
        $cart->remove_all_items($current_user);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>VolareWeb | Voli</title>
    <?php require_once('head_imports.php') ?>
</head>
<body id="page3">
<div class="main">
    <!--header -->
    <header>
        <div class="wrapper">
            <h1><a href="home.php" id="logo">VolareWeb</a></h1>
            <span id="slogan">Fast, Frequent &amp; Safe Flights</span>
            <nav id="top_nav">
                <?php include_once ('top_nav.php')?>
            </nav>
        </div>
        <nav>
            <ul id="menu">
                <li><a href="home.php"><span><span>Home</span></span></a></li>
                <li id="menu_active"><a href="voli.php"><span><span>Voli</span></span></a></li>
                <li><a href="carrello.php"><span><span>Carrello</span></span></a></li>
                <?php if($current_user->isAdmin()): ?>
                    <li><a href="gestione.php"><span><span>Gestione</span></span></a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <!-- / header -->
    <!--content -->
    <section id="content">
        <div class="wrapper pad1">
            <article class="col1">
                <div class="box1">
                    <h2 class="top">Offerte speciali!</h2>
                    <div class="pad"> <strong>I nostri voli a prezzo più basso!</strong><br>
                        <ul class="pad_bot1 list1">
                            <?php
                            $low_price_flights = $flight_manager->top_offers(3);
                            foreach ($low_price_flights as $flight) : ?>
                                <form id="form_5" action="volo.php" class="form_5" method="post">
                                    <input type="hidden" name="fid" value=<?php echo $flight['fid']?> >
                                    <li><span class="right color1">da &euro;<?php echo $flight['fprice']?></span><a href="volo.php" onclick="document.forms[0].submit();return false;"><?php echo $flight['fsrc']?></a></li>
                                </form>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                </div>
            </article>
            <article class="col2">
                <div class="box1">
                    <h2 class="top">Tutti i nostri voli</h2>
                    <?php
                    $all_flights = $flight_manager->index();
                    foreach ($all_flights as $flight) : ?>

                    <div class="content">
                        <div class="tab-content" id="Flight">
                            <?php if($current_user->isLoggedIn()) : ?>
                                <form id="form_5" action="volo.php" class="form_5" method="post">
                            <?php else :?>
                                <form id="form_5" action="home.php" class="form_5" method="post">
                            <?php endif; ?>
                                <div>
                                    <div class="wrapper">
                                        <h2><?php echo $flight['fsrc'] . " - " . $flight['fdst']?></h2>
                                    </div>

                                    <div class="pad">
                                        <div class="wrapper under"> <span class="left">Volo:</span>
                                            <div class="cols marg_right1">
                                                <h6><?php echo $flight['fsrc']?></h6>
                                            </div>
                                            <div class="cols">
                                                <h5><?php echo $flight['fdst']?></h5>
                                            </div>
                                            <input type="hidden" name="fsrc" value=<?php echo $flight['fsrc']?> >
                                            <input type="hidden" name="fdst" value=<?php echo $flight['fdst']?> >
                                        </div>
                                        <!--<div class="wrapper under"><span class="left">Orario:</span>
                                            <div class="col1">
                                                <h6>Partenza: <?php /*echo $flight['fday']*/?> alle <?php /*echo $flight["ftsrc"] */?></h6>
                                            </div>
                                        </div>-->
                                        <span class="right relative">
                                            <?php if($current_user->isLoggedIn()) : ?>
                                                <input class="button_blue" type="submit" name="details" value="Seleziona" />
                                            <?php else :?>
                                                <input class="button_blue" type="submit" name="login_page" value="Login" />
                                            <?php endif; ?>
                                        </span>
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
        <?php include_once('footer.php') ?>
    </footer>
    <!--footer end-->
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>