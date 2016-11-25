<?php session_start(); ?>
<!DOCTYPE html>
<html class="no-js" lang="en" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>My Characters</title>

        <!-- Main stuff -->
        <link rel="stylesheet" href="/hopar/GRU_H8/css/normalize.css">
        <link rel="stylesheet" href="/hopar/GRU_H8/css/foundation.css">
        <link rel="stylesheet" href="/hopar/GRU_H8/css/foundation.min.css">
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <script src="/hopar/GRU_H8/js/vendor/old/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/app.css">
    </head>

    <!-- start include -->
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/dbcon/dbcon.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/connection/logout.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/nav.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/header.php';
    ?>
    <!-- end include -->
    <?php
    if (isset($_GET['find'])) {
        $search = $_GET['search'];
        $search = "'%" . $search . "%'";
        $query = "SELECT `character`.id AS ID, `character`.name AS name, `character`.level AS level, race.name AS race, class.name AS class, player.username AS player FROM `character` 
                    INNER JOIN race ON `character`.race_ID = race.ID 
                    INNER JOIN class ON `character`.class_ID = class.short 
                    INNER JOIN access ON `character`.id = access.character_ID 
                    INNER JOIN player ON access.player_ID = player.ID 
                    WHERE (`character`.name LIKE " . $search . " OR class.name LIKE " . $search . " OR `character`.level LIKE " . $search . ") AND (player.id = " . $_SESSION['id'] . ");";
        $_SESSION['query'] = $query;
    }
    ?>
    <div class="row container"> <!-- Start row Container -->
        <div class="large-10 columns"> <!-- Start Container Main -->
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
            ?>
            <div class="large-8 columns push-2">
                <form action="" method="GET" name="signup" id="signup">
                    Search: <input type="text" placeholder=""  name="search"/><br />
                    <input class="button large-10 push-1 columns" type="submit" name="find" value="Search" />
                </form>
                <?php
                try {
                    $query = $_SESSION['query'];
                    $result = $pdo->query($query);
                } catch (PDOException $e) {
                    echo $e;
                    exit();
                }
                ?>
                <table class="tablemain responsive">
                    <th>Name</th>
                    <th>Level</th>
                    <th>Race</th>
                    <th>Class</th>
                    <th colspan="3">Options</th>
                    <?php
                    foreach ($result as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['level']; ?></td>
                            <td><?php echo $row['race']; ?></td>
                            <td><?php echo $row['class']; ?></td>
                            <td><a href="/hopar/GRU_H8/mychar/view/index.php?id=<?php echo $row['ID']; ?>" >View</td>
                            <td><a href="/hopar/GRU_H8/mychar/update/index.php?id=<?php echo $row['ID']; ?>" >Update</td>
                            <td><a href="/hopar/GRU_H8/mychar/delete/index.php?id=<?php echo $row['ID']; ?>" >Delete</td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>


            </div>
        </div>
        <!-- start footer -->
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/footer.php';
        ?>
        <!-- end footer -->

        <!-- Start Script -->
        <script>
            document.write('<script src=' +
                    ('__proto__' in {} ? '/hopar/GRU_H8/js/vendor/zepto' : '/hopar/GRU_H8/js/vendor/jquery') +
                    '.js><\/script>')
        </script>
        <script src="/hopar/GRU_H8/js/foundation.min.js"></script>

        <script>
            $(document).foundation();
        </script>
        <!-- End Script -->
    </body>
</html>