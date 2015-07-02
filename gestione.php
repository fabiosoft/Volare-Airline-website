<?php
include_once('Flight.php');
include_once('User.php');
include_once('Cart.php');
$current_user = new User();
$flight_manager = new Flight();
$cart = new Cart();

if($current_user->isAdmin()) {
    if (isset($_POST['delete'])) {
        $deleted_a_flight = $flight_manager->delete($_POST['fid']);
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
                <ul class="pad_bot1 list1">
                    <?php if(isset($deleted_a_flight)) : ?>
                        <li>Volo cancellato con successo.</li>
                    <?php endif; ?>
                </ul>
                <div class="box1">
                    <h2 class="top">Modifica voli</h2>
                    <?php $all_flights = $flight_manager->index(); ?>
                    <?php foreach ($all_flights as $flight) : ?>
                        <form id="form_5" action="gestione.php" class="form_5" method="post">
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
                                            <div class="row"> <span class="left"><b>Partenza:</b></span>
                                                <br/>
                                                <label for="fday">Data</label>
                                                <input id="fday" name="fday" type="date" placeholder=<?php echo $flight['fday'] ?> />
                                                <br/>
                                                <label for="ftsrc">Ora</label>
                                                <input id="ftsrc" name="ftsrc" type="time" placeholder=<?php echo $flight['ftsrc'] ?> />
                                            </div>
                                            <div class="row"> <span class="left"><b>Arrivo:</b></span>
                                                <label for="ftdst">Ora</label>
                                                <input id="ftdst" name="ftdst" type="time" placeholder=<?php echo $flight['ftdst'] ?> />
                                            </div>
                                            <div class="row"> <span class="left">Posti:</span>
                                                <input id="fseat" name="fseat" type="text" placeholder=<?php echo $flight['fseat'] ?> />
                                                <br/>da <b>&euro; <?php echo $flight['fprice'] ?></b> a persona
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="fid" value=<?php echo $flight['fid']?> >
                                    <input class="button_red" type="submit" name="delete" value="Cancella Volo" />
                                    <input class="button_blue" type="submit" name="buy" value="Aggiorna" />
                                    <div class="box2"></div>
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