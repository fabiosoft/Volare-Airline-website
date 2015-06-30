<?php
    include_once('User.php');
    include_once('Flight.php');

    $current_user = new User();
    $flight_manager = new Flight();

    if(isset($_POST['fid'])){
        $flight_id = $_POST['fid'];
        echo $flight_id;
    }else{
        echo "no volo selezionato";
    }

?>



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
                <li><a href="index.php"><span><span>Home</span></span></a></li>
                <li><a href="voli.php"><span><span>Voli</span></span></a></li>
                <li><a href="book.html"><span><span>Book</span></span></a></li>
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
                    <h2 class="top">Offerte speciali!</h2>
                    <div class="pad"> <strong>I nostri voli a prezzo più basso!</strong><br>
                        <ul class="pad_bot1 list1">
                            <?php
                            $low_price_flights = $flight_manager->top_offers(3);
                            foreach ($low_price_flights as $flight) : ?>
                                <li><span class="right color1">da €<?php echo $flight['fprice']?></span><a href="book2.html"><?php echo $flight['fsrc']?></a></li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                </div>
            </article>
            <article class="col2">
                <div class="box1">
                    <div class="box2 top"> <strong>Please complete your details</strong> </div>
                    <form id="form_8" action="#" class="form_5" method="post">
                        <div>
                            <div class="pad">
                                <div class="wrapper under">
                                    <div class="col1">
                                        <div class="row"> <span class="left">From</span>
                                            <input type="text" class="input" value="Birmingham"  onblur="if(this.value=='') this.value='Birmingham'" onFocus="if(this.value =='Birmingham' ) this.value=''">
                                        </div>
                                        <div class="row"> <span class="left">Destination</span>
                                            <input type="radio" name="name">
                                            Zurich from GBP 143.- </div>
                                    </div>
                                </div>
                                <div class="wrapper pad_bot2"> <span class="left">Travellers</span>
                                    <div class="col2">
                                        <input type="text" class="input2" value="2"  onblur="if(this.value=='') this.value='2'" onFocus="if(this.value =='2' ) this.value=''">
                                        <span class="left">Adults</span>
                                        <input type="text" class="input2" value="0"  onblur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''">
                                        <span class="left">Children</span> </div>
                                </div>
                            </div>
                            <div class="box2"> Please select in the calendar the date you would like to start your travel (outbound flight, left hand side) and the date you would like to fly back (return flight, right hand side). </div>
                            <div class="pad">
                                <div class="wrapper"> <span class="left">&nbsp;</span>
                                    <div class="cols marg_right1">
                                        <h6>Outbound flight</h6>
                                        <div class="row">
                                            <input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
                                            <input type="text" class="input1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
                                        </div>
                                        <div class="marg_top1">
                                            <div class="select1"> <a href="#" class="marker_left"></a>
                                                <select>
                                                    <option>May 11</option>
                                                    <option>June 11</option>
                                                    <option>July 11</option>
                                                </select>
                                                <a href="#" class="marker_right"></a> </div>
                                        </div>
                                        <div class="calendar">
                                            <ul class="thead">
                                                <li>Mon</li>
                                                <li>Tue</li>
                                                <li>Wed</li>
                                                <li>Thu</li>
                                                <li>Fri</li>
                                                <li>Sat</li>
                                                <li>Sun</li>
                                            </ul>
                                            <ul class="tbody">
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#" class="active">5</a></li>
                                                <li><a href="#" class="selected">6</a></li>
                                                <li><a href="#">7</a></li>
                                                <li><a href="#" class="selected">8</a></li>
                                                <li><a href="#">9</a></li>
                                                <li><a href="#" class="active">10</a></li>
                                                <li><a href="#" class="active">11</a></li>
                                                <li><a href="#">12</a></li>
                                                <li><a href="#" class="active">13</a></li>
                                                <li><a href="#">14</a></li>
                                                <li><a href="#">15</a></li>
                                                <li><a href="#">16</a></li>
                                                <li><a href="#">17</a></li>
                                                <li><a href="#">18</a></li>
                                                <li><a href="#" class="selected">19</a></li>
                                                <li><a href="#">20</a></li>
                                                <li><a href="#" class="active">21</a></li>
                                                <li><a href="#">22</a></li>
                                                <li><a href="#" class="active">23</a></li>
                                                <li><a href="#" class="selected">24</a></li>
                                                <li><a href="#" class="selected">25</a></li>
                                                <li><a href="#" class="selected">26</a></li>
                                                <li><a href="#">27</a></li>
                                                <li><a href="#">28</a></li>
                                                <li><a href="#">29</a></li>
                                                <li><a href="#">30</a></li>
                                                <li><a href="#">31</a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <h5>Outbound flight</h5>
                                        <div class="row">
                                            <input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
                                            <input type="text" class="input1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
                                        </div>
                                        <div class="marg_top1">
                                            <div class="select1"> <a href="#" class="marker_left"></a>
                                                <select>
                                                    <option>May 11</option>
                                                    <option>June 11</option>
                                                    <option>July 11</option>
                                                </select>
                                                <a href="#" class="marker_right"></a> </div>
                                        </div>
                                        <div class="calendar">
                                            <ul class="thead">
                                                <li>Mon</li>
                                                <li>Tue</li>
                                                <li>Wed</li>
                                                <li>Thu</li>
                                                <li>Fri</li>
                                                <li>Sat</li>
                                                <li>Sun</li>
                                            </ul>
                                            <ul class="tbody">
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#" class="active">5</a></li>
                                                <li><a href="#" class="selected">6</a></li>
                                                <li><a href="#">7</a></li>
                                                <li><a href="#" class="selected">8</a></li>
                                                <li><a href="#">9</a></li>
                                                <li><a href="#" class="active">10</a></li>
                                                <li><a href="#" class="active">11</a></li>
                                                <li><a href="#">12</a></li>
                                                <li><a href="#" class="active">13</a></li>
                                                <li><a href="#">14</a></li>
                                                <li><a href="#">15</a></li>
                                                <li><a href="#">16</a></li>
                                                <li><a href="#">17</a></li>
                                                <li><a href="#">18</a></li>
                                                <li><a href="#" class="selected">19</a></li>
                                                <li><a href="#">20</a></li>
                                                <li><a href="#" class="active">21</a></li>
                                                <li><a href="#">22</a></li>
                                                <li><a href="#" class="active">23</a></li>
                                                <li><a href="#" class="selected">24</a></li>
                                                <li><a href="#" class="selected">25</a></li>
                                                <li><a href="#" class="selected">26</a></li>
                                                <li><a href="#">27</a></li>
                                                <li><a href="#">28</a></li>
                                                <li><a href="#">29</a></li>
                                                <li><a href="#">30</a></li>
                                                <li><a href="#">31</a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrapper pad_bot1">
                                    <div class="markers"> <strong class="active"></strong> <span>Special fare available</span> <strong class="selected"></strong> <span>Special fare not available</span> <strong></strong> <span class="end">Availability not checked</span> </div>
                                    <span class="right relative"><a href="#" class="button1"><strong>Search</strong></a></span> </div>
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
    jQuery(document).ready(function ($) {
        $('.form_5').jqTransform({
            imgPath: 'jqtransformplugin/img/'
        });
    });
</script>
</body>
</html>