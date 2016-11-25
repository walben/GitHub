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
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <script src="/hopar/GRU_H8/js/jquery.validate.min.js"></script>
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

    <div class="row container"> <!-- Start row Container -->
        <div class="large-10 columns"> <!-- Start Container Main -->
            <div>
                <?php
                // for space
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                ?>
                <?php
                include_once $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/dbcon/dbcon.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/header.php';
                ?>
                <div class="push-4 large-6 columns">
                    <form action="#" method="POST" name="signup" id="signup">
                        Email:  <input name="email" type="email" placeholder="" required data-invalid/><br />
                        Password <input name="password" type="password" id="oldpassword">
                        <input type="submit" class="button large-12 columns" id="submit" name="update" value="Submit Changes" />
                        <a href="/hopar/GRU_H8/management/index.php" class="button columns right">Go Back To Management</a>
                    </form>
                </div>
                <?php
                if (isset($_POST['update'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    try {
                        $query = "SELECT password FROM player WHERE player.id = " . $_SESSION['id'];
                        $result = $pdo->query($query);
                    } catch (PDOExeption $e) {
                        echo $e;
                    }
                    foreach ($result as $row) {
                        $confirmPassword = $row['password'];
                    }
                    if ($confirmPassword == $password) {
                        try {
                            $query = "UPDATE `player` SET `email`='" . $_POST['email'] . "' WHERE id = " . $_SESSION['id'];
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                    }
                    if ($confirmPassword != $password) {
                        echo "incorrect password";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Start Script -->
    <!-- Start Cheack Password -->
    <script>
        function checkStrength(pass)
        {
            var str = 0;
            if (pass.length < 6)
                alert("Vinsamlegast hafÃ°u lykilorÃ°iÃ° meira en 6 bÃ³kstafi");
            if (pass.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
                str += 1
            if (pass.match(/([a-zA-Z])/) && pass.match(/([0-9])/))
                str += 1
            if (pass.match(/([!,%,&,@,#,$,^,*,?,_,~])/))
                str += 1
            if (pass.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/))
                str += 1

            if (str < 2) {
                alert("LykilorÃ°iÃ° Ã¾itt er veikt. Vinsamlegast bÃ¦ttu viÃ° hÃ¡stÃ¶fum, nÃºmertum eÃ°a tÃ¡knum.");
            } else if (str == 2) {
                alert("LykilorÃ°iÃ° Ã¾itt er meÃ°alveikt. ÃžÃº gÃ¦tirÃ° betrumbÃ¦tt meÃ° hÃ¡stÃ¶fum, nÃºmerum eÃ°a tÃ¡knum.");
            } else {
                alert("LykilorÃ°iÃ° Ã¾itt er sterkt.");
            }
        }
    </script>
    <!-- End Cheack Password -->

    <!-- End Script -->

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