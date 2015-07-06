<ul>
    <li><a href="home.php" class="nav1">Home</a></li>
    <li><a href="#" class="nav3">
            <b>
                <?php
                echo $current_user->getUserName();
                if ($current_user->isLoggedIn())
                    echo "&euro;" . $current_user->getMoney();
                ?>
                <?php if ($current_user->isLoggedIn()) : ?>

                    <form id="form_1" name="login" method="post" action="home.php">
                    <div class="wrapper">
                        <span class="right relative">
                            <input type="hidden" name="logout">
                            <a href="home.php" onclick="document.forms[0].submit();return false;">Logout</a>
                        </span>
                    </div>
                </form>
                <?php endif; ?>
            </b>
        </a>
    </li>
</ul>