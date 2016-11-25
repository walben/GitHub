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
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <script src="/hopar/GRU_H8/js/_js/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/app.css">
        <script>
            $(document).ready(function() {
                $('#signup').validate({
                    rules: {
                        currentPassword: {
                            required: true
                        },
                        password: {
                            required: true,
                            rangelength: [8, 16]
                        },
                        passwordcon: {equalTo: '#password'},
                        spam: "required"
                    }, //end rules
                    messages: {
                        password: {
                            required: 'Please type a password',
                            rangelength: 'Password must be between 8 and 16 characters long.'
                        },
                        passwordcon: {
                            equalTo: 'The two passwords do not match.'
                        }
                    },
                    errorPlacement: function(error, element) {
                        if (element.is(":radio") || element.is(":checkbox")) {
                            error.appendTo(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }

                }); // end validate 
            }); // end ready
        </script>
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
                        Current Password <input name="currentPassword" type="password" id="currentPassword">
                        Password <input name="password" type="password" id="password">
                        Confirm Password <input name="passwordcon" type="password" id="passwordcon">
                        <input type="submit" class="button large-12 columns" id="submit" name="update" value="Submit Changes" />
                        <a href="/hopar/GRU_H8/management/index.php" class="button columns right">Go Back To Management</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['update'])) {
        $password1 = $_POST['password'];
        $password2 = $_POST['passwordcon'];
        $currentPassword = $_POST['currentPassword'];
        try {
            $query = "SELECT password FROM player WHERE player.id = " . $_SESSION['id'];
            $result = $pdo->query($query);
        } catch (PDOExeption $e) {
            echo $e;
        }
        foreach ($result as $row) {
            $confirmPassword = $row['password'];
        }
        if ($confirmPassword == $currentPassword) {
            if ($password1 == $password2) {
                try {
                    $query = "UPDATE `player` SET `password`='" . $password1 . "' WHERE id = " . $_SESSION['id'];
                    $result = $pdo->query($query);
                    echo "success";
                } catch (PDOException $e) {
                    echo $e;
                    exit();
                }
            }
            if ($password1 != $password2) {
                echo "passwords do no match";
            }
        }
        if ($confirmPassword != $currentPassword) {
            echo "incorrect password";
        }
    }
    ?>
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