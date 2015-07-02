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

    if (isset($_POST['update'])) {
        $update_a_flight = $flight_manager->update($_POST['fid'],$_POST['fday'],$_POST['ftsrc'],$_POST['ftdst'],$_POST['fseat']);
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
                    <h2 class="top">Menu</h2>
                    <div class="pad"> <strong></strong><br>
                        <ul class="pad_bot1 list1">
                            <li><a href="gestione.php">Gestione voli.</a></li>
                        </ul>

                    </div>
                </div>
            </article>
            <article class="col2">
                <ul class="pad_bot1 list1">
                </ul>
                <div class="box1">
                    <h2 class="top">Inserisci volo</h2>

                        <form id="form_5" action="gestione.php" class="form_5" method="post">
                            <div>
                                <div class="pad">
                                    <div class="wrapper under">
                                        <div class="col1">
                                            <div class="row"> <span class="left"><b>Volo:</b></span>
                                                <br/>
                                                <label for="fsrc">Partenza</label>
                                                <input id="fsrc" name="fsrc" type="text" placeholder="aereoporto partenza" value=<?php echo $qualcosa ?>/>
                                                <br/>
                                                <label for="fdst">Arrivo</label>
                                                <input id="fdst" name="fdst" type="text" placeholder="aereoporto arrivo"/>
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
                                                <input id="fday" name="fday" type="date"/>
                                                <br/>
                                                <label for="ftsrc">Ora</label>
                                                <input id="ftsrc" name="ftsrc" type="time"/>
                                            </div>
                                            <div class="row"> <span class="left"><b>Arrivo:</b></span>
                                                <br/>
                                                <label for="ftdst">Ora</label>
                                                <input id="ftdst" name="ftdst" type="time"/>
                                            </div>
                                            <div class="row"> <span class="left">Nmero posti:</span>
                                                <input id="fseat" name="fseat" type="text" placeholder="#"/>
                                                <br/>da <input id="fprice" name="fprice" type="number" placeholder="€"/> a persona
                                            </div>
                                        </div>
                                    </div>
                                    <input class="button_blue" type="submit" name="insert" value="Inserisci" />
                                    <div class="box2"></div>
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
    $(document).ready(function () {
        tabs2.init();
    });
</script>
</body>
</html>