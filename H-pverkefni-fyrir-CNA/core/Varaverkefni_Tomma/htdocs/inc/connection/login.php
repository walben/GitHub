<?php session_start(); ?>
<div class="row">
    <div class="login background large-12 columns right">
        <a href="#" class="loginbutton button right" data-dropdown="contentDrop">Login &raquo;</a>
        <div id="contentDrop" class="f-dropdown content medium" data-dropdown-content>
            <form action="/hopar/GRU_H8/validate.php" class="columns" method="POST">
                <div class="large-8 columns">
                    Username    <input class="columns" type="text" name="konni" id="konni">
                </div>
                <div class="large-8 columns">
                    Password    <input class="columns" type="password" name="gusgus" id="gusgus">
                </div>
                <input type="submit" name="login" value="Login" class="button large-offset-1 pull-1 large-4 columns" >
                <a href="/hopar/GRU_H8/register/index.php" class="button large-4 pull-2 columns" >Register</a>
            </form>
        </div>
    </div>
</div>
<?php

    $_SESSION['query'] = "SELECT `character`.id AS ID, `character`.name AS name, `character`.level AS level, race.name AS race, class.name AS class
                        FROM `character` 
                        INNER JOIN race ON `character`.race_ID = race.ID
                        INNER JOIN class ON `character`.class_ID = class.short
                        INNER JOIN access ON `character`.id = access.character_ID
                        INNER JOIN player ON access.player_ID = player.ID";

?>