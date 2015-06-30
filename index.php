<?php
	include_once('User.php');
	$current_user = new User();

    if(isset($_POST['logout'])) {
        $current_user->logout();
    }
	if(isset($_POST['login'])){
		$uname = $_POST['uname'];
		$password = $_POST['upsw'];
		$auth_user = $current_user->login($uname, $password);
		if ($auth_user) {
			// Login Success
            //echo "Login Success";
		   //header("location:home.php");
		} else {
			// Login Failed
            //echo "Login Failed";
			echo "<script>alert('User / Password Not Match')</script>";
		}
	}
	if(isset($_POST['register'])){
		$uname = $_POST['uname'];
		$password = $_POST['upsw'];
		$confirmPassword = $_POST['confirm_password'];
		if($password == $confirmPassword){
			$email = $current_user->isUserExist($uname);
			if(!$email){
				$register = $current_user->join($username, $uname, $password);
				if($register){
					 echo "<script>alert('Registration Successful')</script>";
				}else{
					echo "<script>alert('Registration Not Successful')</script>";
				}
			} else {
				echo "<script>alert('Email Already Exist')</script>";
			}
		} else {
			echo "<script>alert('Password Not Match')</script>";
		
		}
	}
?>
<!--------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>VolareWeb</title>
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
<body id="page1">
<div class="main">
    <!--header -->
    <header>
        <div class="wrapper">
            <h1><a href="index.php" id="logo">VolareWeb</a></h1>
            <span id="slogan">Fast, Frequent &amp; Safe Flights</span>
            <nav id="top_nav">
                <?php include_once ('top_nav.php')?>
            </nav>
        </div>
        <nav>
            <ul id="menu">
                <li id="menu_active"><a href="index.php"><span><span>Home</span></span></a></li>
                <li><a href="voli.php"><span><span>Voli</span></span></a></li>
                <li><a href="book.html"><span><span>Book</span></span></a></li>
                <li><a href="services.html"><span><span>Services</span></span></a></li>
                <li><a href="safety.html"><span><span>Safety</span></span></a></li>
                <li class="end"><a href="contacts.html"><span><span>Contacts</span></span></a></li>
            </ul>
        </nav>
    </header>
    <!-- / header -->
    <!--content -->
    <section id="content">
        <div id="slider"> <img src="images/banner1.jpg" alt=""> <img src="images/banner2.jpg" alt=""> <img src="images/banner3.jpg" alt=""> </div>
        <div class="for_banners">

            <article class="col1">
                <div class="tabs">
                    <ul class="nav">
                        <li class="selected"><a href="#Flight">Utente</a></li>
                    </ul>
                    <div class="content">
                        <div class="tab-content" id="Flight">

                            <form id="form_1" name="login" method="post" action="">
                                <div>
                                    <div class="radio">
                                        <div class="wrapper">
                                            <p>Hello, <b><?php echo $current_user->getUserName() ?></b></p>
                                        </div>
                                    </div>
                                    <?php if (!$current_user->isLoggedIn()) : ?>
                                        <div class="row"> <span class="left">Username</span>
                                            <input name="uname" type="text" class="input" required="required" placeholder="username">
                                        </div>
                                        <div class="row"> <span class="left">Password</span>
                                            <input name="upsw" type="password" class="input" required="required" placeholder="ex: 123pippo">
                                        </div>

                                        <div class="wrapper">
                                            <span class="right relative">
                                                <input class="button1" type="submit" name="login" value="Login" />
                                            </span>
                                            <a href="#" class="link1">Join Us</a>
                                        </div>
                                    <?php else : ?>
                                        <div class="wrapper">
                                            <span class="right relative">
                                                <input type=”hidden” name=”logout”>
                                                <input class="button1" type="submit" name="logout" value="Logout" />
                                            </span>
                                        </div>
                                </div>
                                <?php endif; ?>
                            </form>
                        </div>
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
<script type="text/javascript">
    $(document).ready(function () {
        tabs.init();
    });
    jQuery(document).ready(function ($) {
        $('#form_1, #form_2, #form_3').jqTransform({
            imgPath: 'jqtransformplugin/img/'
        });
    });
    $(window).load(function () {
        $('#slider').nivoSlider({
            effect: 'fade', //Specify sets like: 'fold,fade,sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft'
            slices: 15,
            animSpeed: 500,
            pauseTime: 6000,
            startSlide: 0, //Set starting Slide (0 index)
            directionNav: false, //Next & Prev
            directionNavHide: false, //Only show on hover
            controlNav: false, //1,2,3...
            controlNavThumbs: false, //Use thumbnails for Control Nav
            controlNavThumbsFromRel: false, //Use image rel for thumbs
            controlNavThumbsSearch: '.jpg', //Replace this with...
            controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
            keyboardNav: true, //Use left & right arrows
            pauseOnHover: true, //Stop animation while hovering
            manualAdvance: false, //Force manual transitions
            captionOpacity: 1, //Universal caption opacity
            beforeChange: function () {},
            afterChange: function () {},
            slideshowEnd: function () {} //Triggers after all slides have been shown
        });
    });
</script>
</body>
</html>
















<!----- ----- >
<!DOCTYPE html>
 <html lang="en" class="no-js">
 <head>
        <meta charset="UTF-8" />
        <title>Volare - Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <!--<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		-->
    </head>
    <body>
        <div class="container">
            
            
            <header>
                <h1>Login and Registration Form  </h1>
			</header>
            <section>				
                <div id="container_demo" >
                   
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">


                        <div id="register" class="animate form">
                            <form name="login" method="post" action="">
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="username" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailid" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="confirm_password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" name="register" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>