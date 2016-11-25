<!DOCTYPE html>
<html class="no-js" lang="en" >

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Home Page</title>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/normalize.css" />
        <link rel="stylesheet" href="/hopar/GRU_H8/css/foundation.css">
        <link rel="stylesheet" href="/hopar/GRU_H8/css/foundation.min.css" />
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/app.css">
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
