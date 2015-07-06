<ul>
    <li><a href="home.php" class="nav1">Home</a></li>
    <li><a href="#" class="nav3">
            <b>
                <?php
                echo $current_user->getUserName();
                if ($current_user->isLoggedIn()) :
                    ?>
                    <form id="form_1" name="login" method="post" action="home.php">
                        <input type="hidden" name="add_money">
                        <a href="home.php" title="Aggiungi 1000€" onclick="document.forms[0].submit();return false;"><?php echo "\t&euro;" . $current_user->getMoney();?></a>
                    </form>
                <?php endif; ?>
                <?php if ($current_user->isLoggedIn()) : ?>
                    <form id="form_1" name="login" method="post" action="home.php">
                    <div class="wrapper">
                        <br/>
                        <span class="right">
                            <input type="hidden" name="logout">
                            <a href="home.php" onclick="document.forms[1].submit();return false;">Logout</a>
                        </span>
                    </div>
                </form>
                <?php endif; ?>
            </b>
        </a>
    </li>
</ul>