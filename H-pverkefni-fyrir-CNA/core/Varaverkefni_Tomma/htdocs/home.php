<!DOCTYPE html>
<html class="no-js" lang="en" >

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>DnD</title>
        <link rel="stylesheet" href="css/normalize.css" />
        <link rel="stylesheet" href="css/foundation.css">
        <link rel="stylesheet" href="css/foundation.min.css" />
        <script src="js/vendor/custom.modernizr.js"></script>
        <link rel="stylesheet" href="css/app.css">
    </head>

    <body>

        <!-- start Login -->
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/connection/login.php';
        ?>
        <!-- end Login -->

        <div class="row container"> <!-- Start row Container -->  
            <div class="large-10 columns"> <!-- Start Container Main -->
                <?php
                include_once $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/dbcon/dbcon.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/header.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/search.php';
                ?>
                </table>
            </div>
        </div>
        <!-- start footer -->
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/footer.php';
        ?>
        <!-- end footer -->

        <script>
            document.write('<script src=' +
                    ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
                    '.js><\/script>')
        </script>
        <script src="js/foundation.min.js"></script>

        <script>
            $(document).foundation();
        </script>
        <!-- End Script -->
    </body>
</html>
