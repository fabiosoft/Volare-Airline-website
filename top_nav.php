<ul>
    <li><a href="index.php" class="nav1">Home</a></li>
    <li><a href="#" class="nav2">
            <b>
                <?php
                echo $current_user->getUserName();
                if ($current_user->isLoggedIn())
                    echo "<br/>" . "&euro;" . $current_user->getMoney();
                ?>
            </b>
        </a>
    </li>
</ul>