<?php
include_once('Flight.php');
include_once('User.php');
include_once('Cart.php');
$current_user = new User();
$flight_manager = new Flight();
$cart = new Cart();

if($current_user->isAdmin()) {
    if (isset($_POST['clear'])) {
        $cart->remove_all_items($current_user);
    }
}else{
    die("you are not an Admin!");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>VolareWeb | Gestione</title>
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
                <li><a href="voli.php"><span><span>Voli</span></span></a></li>
                <li><a href="carrello.php"><span><span>Carrello</span></span></a></li>
                <?php if($current_user->isAdmin()): ?>
                    <li id="menu_active"><a href="gestione.php"><span><span>Gestione</span></span></a></li>
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
                    <h2 class="top">Nuovo Volo</h2>
                    <div class="pad"> <strong></strong><br>
                        <ul class="pad_bot1 list1">
                            <li><a href="create_volo.php">Inserisci un nuovo volo.</a></li>
                        </ul>

                    </div>
                </div>
            </article>
            <article class="col2">
                <div class="box1">
                    <h2 class="top">Modifica voli</h2>
                    <?php $all_flights = $flight_manager->index(); ?>
                    <?php foreach ($all_flights as $flight) : ?>
                        <form id="form_8" action="gestione.php" class="form_5" method="post">
                            <div>
                                <div class="pad">
                                    <div class="wrapper under">
                                        <div class="col1">
                                            <div class="row"> <span class="left">Partenza</span>
                                                <?php echo $flight['fsrc'] ?>
                                            </div>
                                            <div class="row"> <span class="left">Arrivo</span>
                                                <?php echo $flight['fdst'] ?> da &euro; <?php echo $flight['fprice'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pad">
                                    <div class="wrapper under">
                                        <div class="col1">
                                            <div class="row"> <span class="left">Partenza:</span>
                                                <?php echo $flight['fday'] ?> alle <?php echo $flight['ftsrc'] ?>
                                                <label for="fday" class="uname" data-icon="u">Data</label>
                                                <input id="fday" name="fday" type="date" placeholder="mysuperusername690" />
                                                <input type="datetime" name="fday">
                                            </div>
                                            <div class="row"> <span class="left">Arrivo:</span>
                                                <?php echo $flight['ftdst']?>
                                            </div>
                                            <div class="row"> <span class="left">Posti:</span>
                                                <?php echo $flight['fseat'] ?> da <b>&euro; <?php echo $flight['fprice'] ?></b> a persona
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="fprice" value=<?php echo $flight['fprice']?> >
                                    <input type="hidden" name="fid" value=<?php echo $flight['fid']?> >
                                    <input class="button_red" type="reset" name="reset" value="Cancella" />
                                    <input class="button_blue" type="submit" name="buy" value="Acquista" />
                                </div>
                            </div>
                        </form>
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
<script type="text/javascript">
    $(document).ready(function () {
        tabs2.init();
    });
</script>
</body>
</html>