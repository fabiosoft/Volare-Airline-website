<?php
    include_once('User.php');
    include_once('Flight.php');

    $current_user = new User();
    $flight_manager = new Flight();

    if(isset($_POST['fid'])){
        $flight_id = $_POST['fid'];
        $this_flight = $flight_manager->find($flight_id);
    }else{
        echo "no volo selezionato";
        die();
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
                    <div class="box2 top"> <strong>Compilare i dettagli</strong> </div>
                    <?php if($current_user->isLoggedIn()) : ?>
                        <form id="form_8" action="carrello.php" class="form_5" method="post">
                    <?php else :?>
                        <form id="form_5" action="home.php" class="form_5" method="post">
                    <?php endif; ?>
                        <div>
                            <div class="pad">
                                <div class="wrapper under">
                                    <div class="col1">
                                        <div class="row"> <span class="left">Partenza</span>
                                            <?php echo $this_flight['fsrc'] ?>
                                        </div>
                                        <div class="row"> <span class="left">Arrivo</span>
                                            <input type="checkbox" name="selected">
                                            <?php echo $this_flight['fdst'] ?> da &euro; <?php echo $this_flight['fprice'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrapper pad_bot2"> <span class="left">Viaggiatori</span>
                                    <div class="col2">
                                        <input name="adults" type="text" class="input2" value="1"  onblur="if(this.value=='') this.value='1'" onFocus="if(this.value =='1' ) this.value=''">
                                        <span class="left">Adults</span>
                                        <input name="children" type="text" class="input2" value="0"  onblur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''">
                                        <span class="left">Children</span> </div>
                                </div>
                            </div>
                            <div class="box2"></div>

                            <div class="pad">
                                <div class="wrapper under">
                                    <div class="col1">
                                        <div class="row"> <span class="left">Partenza:</span>
                                            <?php echo $this_flight['fday'] ?> alle <?php echo $this_flight['ftsrc'] ?>
                                        </div>
                                        <div class="row"> <span class="left">Arrivo:</span>
                                            <?php echo $this_flight['ftdst']?>
                                        </div>
                                        <div class="row"> <span class="left">Posti:</span>
                                            <?php echo $this_flight['fseat'] ?> da <b>&euro; <?php echo $this_flight['fprice'] ?></b> a persona
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="fprice" value=<?php echo $this_flight['fprice']?> >
                                <input type="hidden" name="fid" value=<?php echo $this_flight['fid']?> >
                                <?php if($current_user->isLoggedIn()) : ?>
                                    <input class="button_red" type="reset" name="reset" value="Cancella" />
                                    <input class="button_blue" type="submit" name="buy" value="Acquista" />
                                <?php else :?>
                                    <input class="button_blue" type="submit" name="login" value="Login" />
                                <?php endif; ?>
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
<script type="text/javascript">
</script>
</body>
</html>