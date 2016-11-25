<!DOCTYPE html>
<html class="no-js" lang="en" >

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Register</title>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/normalize.css">
        <link rel="stylesheet" href="/hopar/GRU_H8/css/foundation.css">
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/app.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <script src="/hopar/GRU_H8/js/_js/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#signup').validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            rangelength: [8, 16]
                        },
                        passwordcon: {equalTo: '#password'},
                        spam: "required"
                    }, //end rules
                    messages: {
                        email: {
                            required: "Please supply an e-mail address.",
                            email: "This is not a valid email address."
                        },
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

    <body>
        <div class="row container"> <!-- Start row Container -->  
            <div class="large-10 columns"> <!-- Start Container Main -->
                <?php
                include_once $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/dbcon/dbcon.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/header.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/gohome.php';
                ?>
                <div class="push-4 large-6 columns">
                    <form action="#" method="POST" name="signup" id="signup">
                        Username:  <input type="text" placeholder="" required data-invalid name="username" id='username' title="Please type your username" onkeyup='check_username()' />
                        <span id='usernamechk'>&nbsp;&nbsp; </span>
                        Email:  <input name="email" type="email" placeholder="example@example.com" required data-invalid/>
                        Password <input name="password" type="password" id="password">
                        Confirm Password <input name="passwordcon" type="password" id="passwordcon">
                        <input type="submit" class="button large-12 columns" id="submit" name="link" value="Register" />
                    </form>
                </div>
                <?php
                if (isset($_POST['link'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    try {
                        $sql = "INSERT INTO `player`(`Username`, `Password`, `Email`) VALUES ('" . $username . "','" . $password . "','" . $email . "');";
                        $s = $pdo->prepare($sql);
                        $s->execute();
                        echo "<br>1: successful <br>";
                    } catch (PDOException $e) {
                        echo $e;
                        exit();
                    }
                }
                ?>
                <!-- Start Script -->

                <script type="text/javascript">
            function check_username() {
                var uname = document.getElementById("username").value;
                var params = "user_id=" + uname;
                var url = "chk_username.php";
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'html',
                    data: params,
                    beforeSend: function() {
                        document.getElementById("usernamechk").innerHTML = 'checking';
                    },
                    complete: function() {
                        //do something	
                    },
                    success: function(html) {
                        document.getElementById("usernamechk").innerHTML = html;
                    }
                });

            }
                </script>

                <script type="text/javascript">
                    $(document).ready(function() {

                        $("#submit_btn").click(function() {
                            //get input field values
                            var user_name = $('input[name=name]').val();
                            var user_email = $('input[name=email]').val();
                            var user_phone = $('input[name=phone]').val();
                            var user_message = $('textarea[name=message]').val();

                            //simple validation at client's end
                            //we simply change border color to red if empty field using .css()
                            var proceed = true;
                            if (user_name == "") {
                                $('input[name=name]').css('border-color', 'red');
                                proceed = false;
                            }
                            if (user_email == "") {
                                $('input[name=email]').css('border-color', 'red');
                                proceed = false;
                            }
                            if (user_phone == "") {
                                $('input[name=phone]').css('border-color', 'red');
                                proceed = false;
                            }
                            if (user_message == "") {
                                $('textarea[name=message]').css('border-color', 'red');
                                proceed = false;
                            }

                            //everything looks good! proceed...
                            if (proceed)
                            {
                                //data to be sent to server
                                post_data = {'userName': user_name, 'userEmail': user_email, 'userPhone': user_phone, 'userMessage': user_message};

                                //Ajax post data to server
                                $.post('contact_me.php', post_data, function(data) {

                                    //load success massage in #result div element, with slide effect.       
                                    $("#result").hide().html('<div class="success">' + data + '</div>').slideDown();

                                    //reset values in all input fields
                                    $('#contact_form input').val('');
                                    $('#contact_form textarea').val('');

                                }).fail(function(err) {  //load any error data
                                    $("#result").hide().html('<div class="error">' + err.statusText + '</div>').slideDown();
                                });
                            }

                        });

                        //reset previously set border colors and hide all message on .keyup()
                        $("#contact_form input, #contact_form textarea").keyup(function() {
                            $("#contact_form input, #contact_form textarea").css('border-color', '');
                            $("#result").slideUp();
                        });

                    });
                </script>


                <!-- End Script -->
            </div> <!-- End row Container -->  
        </div> <!-- End Container Main -->
    </body>
</html>