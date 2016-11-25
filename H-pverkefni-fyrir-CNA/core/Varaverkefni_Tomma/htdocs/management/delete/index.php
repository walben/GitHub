<?php session_start(); ?>
<!DOCTYPE html>
<html class="no-js" lang="en" >

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>DnD</title>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/normalize.css" />
        <link rel="stylesheet" href="/hopar/GRU_H8/css/foundation.css">
        <link rel="stylesheet" href="/hopar/GRU_H8/css/foundation.min.css" />
        <link rel="stylesheet" href="/hopar/GRU_H8/css/app.css">
    </head>

    <body>

        <!-- start include -->
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/dbcon/dbcon.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/header.php';
        ?>
        <!-- end include -->

        <div class="row container"> <!-- Start row Container -->  
            <div class="large-10 columns"> <!-- Start Container Main -->
                <?php
                //This is to make space
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                ?>
                <div class="push-3 large-8 columns">
                    <form action="" class="" method="POST">
                        <span class="suretodelete large-6 columns push-3">Are you sure you wish to delete your account?</span>
                        <div class="columns">

                            <?php
                            //This is to make space
                            include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                            ?>
                            <form action="#" method="POST" name="signup" id="signup">
                                Password <input name="password" type="password" id="password">
                                Confirm Password <input name="passwordcon" type="password" id="passwordcon">
                                <input type="submit" class="button large-12 columns" id="submit" name="delete" value="Delete my Account" />
                                <a class="button columns" href="/hopar/GRU_H8/management/index.php">No, Get me out of here!</a>
                            </form>
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_POST['delete'])) {
                    $password1 = $_POST['password'];
                    $password2 = $_POST['passwordcon'];
                    try {
                        $query = "SELECT password FROM player WHERE player.id = " . $_SESSION['id'];
                        $result = $pdo->query($query);
                    } catch (PDOExeption $e) {
                        echo $e;
                    }
                    foreach ($result as $row) {
                        $confirmPassword = $row['password'];
                    }
                    if ($password1 == $password2) {
                        if ($password1 == $confirmPassword) {
                            try {
                                $query = "SELECT `character`.id AS id FROM `character` INNER JOIN access ON `character`.id = access.character_ID INNER JOIN player ON access.player_ID = player.id
                                    WHERE player.id = " . $_SESSION['id'];
                                $result = $pdo->query($query);
                            } catch (PDOExeption $e) {
                                echo $e;
                            }
                            foreach ($result as $row) {
                                $charid = $row['id'];
                                try {
                                    $query = "DELETE FROM `combat` where Character_ID = " . $charid . ";";
                                    $result = $pdo->query($query);
                                    $query = "DELETE FROM `Saving_Throw` where Character_ID = " . $charid . ";";
                                    $result = $pdo->query($query);
                                    $query = "DELETE FROM `Ability_Scores` where Character_ID = " . $charid . ";";
                                    $result = $pdo->query($query);
                                    $query = "DELETE FROM `Appearance` where Character_ID = " . $charid . ";";
                                    $result = $pdo->query($query);
                                    $query = "DELETE FROM access where character_ID = " . $charid . ";";
                                    $result = $pdo->query($query);
                                    $query = "DELETE FROM `character` where ID = " . $charid . ";";
                                    $result = $pdo->query($query);
                                    header('Location: /hopar/GRU_H8/index.php');
                                } catch (PDOException $e) {
                                    echo $e;
                                    exit();
                                }
                            }
                            try {
                                $query = "DELETE FROM `player` where `player`.id =" . $_SESSION['id'];
                                $result = $pdo->query($query);
                            } catch (PDOException $e) {
                                echo $e;
                                exit();
                            }
                        }
                        if ($password1 != $password2) {
                            echo "passwords do no match";
                        }
                    }
                    if ($password1 != $confirmPassword) {
                        echo "incorrect password";
                    }
                }
                ?>
                <?php
                //This is to make space
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                ?>
            </div>
        </div>

        <!-- start footer -->
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/footer.php';
        ?>
        <!-- end footer -->

    </body>
</html>
