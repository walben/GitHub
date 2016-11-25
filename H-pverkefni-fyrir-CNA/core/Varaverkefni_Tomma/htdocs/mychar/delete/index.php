<!DOCTYPE html>
<html class="no-js" lang="en" >

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Delete</title>
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
                <?php
                $charid = $_GET['id'];
                try {
                    $query = "SELECT `character`.name AS name
                    FROM `character`
                    WHERE `character`.id =" . $charid;
                    $result = $pdo->query($query);
                } catch (PDOException $e) {
                    echo $e;
                    exit();
                }
                foreach ($result as $row) {
                    $name = $row['name'];
                }
                ?>
                <form action="" class="" method="POST">
                    <span class="suretodelete large-6 columns push-3">Are you sure you wish to delete: <?php echo $name ?></span>
                    <div class="columns">
                        <?php
                        //This is to make space
                        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                        ?>
                        <input class="button large-3 small-12 push-2 columns" type="submit" name="yes" value="yes" />
                        <input class="button large-3 small-12 push-3 left" type="submit" name="no" value="no" />
                    </div>
                </form>
                <?php
                if (isset($_POST['yes'])) {
                    try {
                        $query = "DELETE FROM `combat` where Character_ID = " . $charid . ";DELETE FROM `Saving_Throw` where Character_ID = " . $charid . ";DELETE FROM `Ability_Scores` where Character_ID = " . $charid . ";DELETE FROM `Appearance` where Character_ID = " . $charid . ";DELETE FROM access where character_ID = " . $charid . ";DELETE FROM `character` where ID = " . $charid . ";";
                        $result = $pdo->query($query);
                        header('Location: /hopar/GRU_H8/mychar/index.php');
                    } catch (PDOException $e) {
                        echo $e;
                        exit();
                    }
                }
                if (isset($_POST['no'])) {
                    header('Location: /hopar/GRU_H8/mychar/index.php');
                }
                ?>
                </table>
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
