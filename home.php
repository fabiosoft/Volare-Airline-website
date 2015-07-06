<?php
	include_once('User.php');
	$current_user = new User();

    if(isset($_POST['logout'])) {
        $current_user->logout();
    }
	if(isset($_POST['login'])){

        $val_errors = User::validate($_POST);
        if(count($val_errors) == 0) {
            $uname = $_POST['uname'];
            $password = $_POST['upwd'];
            $auth_user = $current_user->login($uname, $password);
            if ($auth_user) {
                // Login Success
                //echo "Login Success";
                //header("location:home.php");
            } else {
                // Login Failed
                //echo "Login Failed";
                echo "<script>alert('Nome utente e Password non corrispondono. Riprova')</script>";
            }
        }
	}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>VolareWeb</title>
    <?php require_once('head_imports.php') ?>
</head>
<body id="page1">
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
                <li id="menu_active"><a href="home.php"><span><span>Home</span></span></a></li>
                <li><a href="voli.php"><span><span>Voli</span></span></a></li>
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
        <div id="slider"></div>
        <div class="for_banners">

            <article class="col1">
                <div class="tabs">
                    <ul class="nav">
                        <li class="selected"><a href="#login">Utente</a></li>
                    </ul>
                    <div class="content">
                        <div class="tab-content" id="login">
                            <form id="form_1" name="login" method="post" action="">
                                <div>
                                    <div class="radio">
                                        <div class="wrapper">
                                            <p>Hello, <b><?php echo $current_user->getUserName() ?></b></p>
                                            <ul class="pad_bot1 list1">
                                                <?php include_once("validation_errors.php") ?>
                                            </ul>
                                        </div>
                                    </div>


                                    <?php if (!$current_user->isLoggedIn()) : ?>
                                        <div class="row"> <span class="left">Username</span>
                                            <input name="uname" type="text" class="input" required="required" placeholder="username">
                                        </div>
                                        <div class="row"> <span class="left">Password</span>
                                            <input name="upwd" type="password" class="input" placeholder="ex: 123pippo">
                                        </div>

                                        <div class="wrapper">
                                            <span class="right relative">
                                                <input class="button_blue" type="submit" name="login" value="Login" />
                                            </span>
                                        </div>
                                    <?php else : ?>
                                        <div class="wrapper">
                                            <span class="right relative">
                                                <input type="hidden" name="logout">
                                                <input class="button_blue" type="submit" name="logout" value="Logout" />
                                            </span>
                                        </div>
                                </div>
                                <?php endif; ?>
                            </form>
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