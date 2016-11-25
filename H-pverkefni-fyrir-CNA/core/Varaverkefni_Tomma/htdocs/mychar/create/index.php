<?php session_start(); ?>
<!DOCTYPE html>
<html class="no-js" lang="en" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Create Character</title>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/normalize.css">
        <link rel="stylesheet" href="/hopar/GRU_H8/css/foundation.css">
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <script src="/hopar/GRU_H8/js/_js/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/app.css">
        <script type="text/javascript">
            $(document).ready(function() {
                $('#charcreate').validate({
                    rules: {
                        age: {
                            required: true,
                            number: true
                        },
                        weight: {
                            required: true,
                            number: true
                        },
                        height: {
                            required: true,
                            number: true
                        },
                        hp: {
                            required: true,
                            number: true
                        },
                        ac: {
                            required: true,
                            number: true
                        },
                        ini: {
                            required: true,
                            number: true
                        },
                        spd: {
                            required: true,
                            number: true
                        },
                        str: {
                            required: true,
                            number: true
                        },
                        dex: {
                            required: true,
                            number: true
                        },
                        int: {
                            required: true,
                            number: true
                        },
                        wis: {
                            required: true,
                            number: true
                        },
                        con: {
                            required: true,
                            number: true
                        },
                        cha: {
                            required: true,
                            number: true
                        },
                        fort: {
                            required: true,
                            number: true
                        },
                        reflex: {
                            required: true,
                            number: true
                        },
                        will: {
                            required: true,
                            number: true
                        },
                        //Currency
                        P: {
                            required: true,
                            number: true
                        },
                        G: {
                            required: true,
                            number: true
                        },
                        S: {
                            required: true,
                            number: true
                        },
                        C: {
                            required: true,
                            number: true
                        },
                        // end Currency
                        //selectors
                        class: {
                            required: true
                        },
                        hairColor: {
                            required: true
                        },
                        hairStyle: {
                            required: true
                        },
                        eyeColor: {
                            required: true
                        },
                        Alignment: {
                            required: true
                        },
                        Deity: {
                            required: true
                        },
                        //radio button
                        Gender: {
                            required: true
                        },
                        Race: {
                            required: true
                        }
                    }, //end rules
                    messages: {
                        age: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        weight: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        height: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        hp: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        ac: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        ini: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        spd: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        str: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        dex: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        int: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        wis: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        con: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        cha: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        fort: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        reflex: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        will: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        //Currency
                        P: {
                            required: 'Please select a value or place 0 Platinum',
                            number: 'Please use numbers'
                        },
                        G: {
                            required: 'Please select a value or place 0 Gold',
                            number: 'Please use numbers'
                        },
                        S: {
                            required: 'Please select a value or place 0 Silver',
                            number: 'Please use numbers'
                        },
                        C: {
                            required: 'Please select a value or place 0 Copper',
                            number: 'Please use numbers'
                        },
                        //selectors
                        class: {
                            required: 'Please select a class'
                        },
                        hairColor: {
                            required: 'Please select a hair color'
                        },
                        hairStyle: {
                            required: 'Please select a hair style'
                        },
                        eyeColor: {
                            required: 'Please select an eye color'
                        },
                        Alignment: {
                            required: 'Please select an alignment'
                        },
                        Deity: {
                            required: 'Please select a deity'
                        },
                        //radio button
                        Gender: {
                            required: 'Please select a gender'
                        },
                        Race: {
                            required: 'Please select a race'
                        }
                    },
                    errorPlacement: function(error, element) {
                        if (element.is(":radio") || element.is(":checkbox")) {
                            error.appendTo(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }

                }); // end validate charcreate
            }); // end ready
        </script>
    </head>

    <body>

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
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                ?>
                <div class="row"> <!-- Start row Container -->  
                    <div class="large-10 columns"> <!-- Start Container Main -->
                        <form action="" name="charcreate" id="charcreate" method="POST">
                            <div class="push-2 large-10 small-11 columns">

                                <div class="groupbox columns"> </div>

                                <div class="large-3 small-12 columns">
                                    Prefix:  <input type="text" placeholder="Sir" name="prefix" />
                                </div>
                                <div class="large-6 small-12 columns">
                                    Character Name:  <input type="text" class="characterName required" title="Please type your character name." placeholder="" id='characterName' name="characterName" onkeyup='check_username()' />
                                    <span id='usernamechk'>&nbsp;&nbsp; </span>
                                </div>
                                <div class="large-3 small-12 columns">
                                    Suffix:  <input type="text" placeholder="The Lucky" name="suffix" />
                                </div>
                                <div class="push-1 large-6 small-12 columns">
                                    Class:
                                    <select name="class">
                                        <option value="" name="class">select</option>
                                        <?php
                                        # selecting the short and the name of the classes in the class table, 'any' isn't an actual class, it's only used in the race table
                                        try {
                                            $query = "SELECT class.short, class.name
                                        FROM gru_h8_dnd.class
                                        WHERE short != 'any'";
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                        # putting the classes in a dropbox
                                            ?>
                                            <option name="class" value="<?php echo $row['short']; ?>"><?php echo $row['name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="push-2 large-6 small-12 columns">
                                    <?php
                                    try {
                                    # selecting the id and the name of the gender
                                        $query = "SELECT id, name
                                            FROM gru_h8_dnd.gender";
                                        $result = $pdo->query($query);
                                    } catch (PDOException $e) {
                                        echo $e;
                                        exit();
                                    }
                                    foreach ($result as $row) {
                                    # outputting the genders as radiobuttons
                                        ?>
                                        <input  type="radio" name="Gender" value="<?= $row['id'] ?>"><?= $row['name'] ?>
                                        <br>
                                        <?php
                                    }
                                    ?>
                                </div>

                                <div class="groupbox columns"> </div>

                                <div class="large-offset-1 large-3 small-12 columns">
                                    Age:  <input type="text" placeholder="year" name="age"/>
                                </div>
                                <div class="large-3 small-12 columns">
                                    Height:  <input type="text" placeholder="cm" name="height"/>
                                </div>
                                <div class="large-3 small-12 columns">
                                    Weight:  <input type="text" placeholder="kg" name="weight"/>
                                </div>

                                <div class="groupbox columns"> </div>

                                <div class="large-4 small-12 columns">
                                    Hair Color:
                                    <select name="hairColor">
                                        <option value="" name="hair_color">- select hair color -</option>
                                        <?php
                                        try {
                                        # selecting the id and the color of the hair color
                                            $query = "SELECT id, color
                                        FROM gru_h8_dnd.hair_color";
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            # putting the hair colors in a dropbox
                                            ?>
                                            <option name="hair_color" value="<?php echo $row['id']; ?>"><?php echo $row['color']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="large-4 small-12 columns">
                                    Hair Style:
                                    <select name="hairStyle">
                                        <option value="" name="hair_style">- select hair style -</option>
                                        <?php
                                        # selecting the id and the style of the hair style
                                        try {
                                            $query = "SELECT id, style
                                        FROM gru_h8_dnd.hair_style";
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            # putting the hair styles in a dropbox
                                            ?>
                                            <option name="hair_style" value="<?php echo $row['id']; ?>"><?php echo $row['style']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="large-4 small-12 columns">
                                    Eye Color:
                                    <select name="eyeColor">
                                        <option value="" name="eye_color">- select eye color -</option>
                                        <?php
                                        try {
                                        # selecting the id and the color of the eye color
                                            $query = "SELECT id, color
                                        FROM gru_h8_dnd.eye_color";
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            # putting the eye colors in a dropbox
                                            ?>
                                            <option name="eye_color" value="<?php echo $row['id']; ?>"><?php echo $row['color']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="groupbox columns"> </div>

                                <div class="large-6 small-12 columns">
                                    Alignment:
                                    <select name="Alignment">
                                        <option value="" name="alignment">- select alignment -</option>
                                        <?php
                                        # selecting the id and the name of the alignment
                                        try {
                                            $query = "SELECT id, name
                                            FROM gru_h8_dnd.alignment";
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            # putting the alignments in a dropbox
                                            ?>
                                            <option name="alignment" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="large-6 small-12 columns">
                                    Deity:
                                    <select name="Deity">
                                        <option value="" name="deity">- select deity -</option>
                                        <?php
                                        # selecting the id and the name of the deity
                                        try {
                                            $query = "SELECT id, name
                                            FROM gru_h8_dnd.deity";
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            # putting the alignments in a dropbox
                                            ?>
                                            <option name="deity" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="groupbox columns"> </div>

                                <?php
                                try {
                                    # getting the id, name, bonus stats and favorite class from the race table
                                    $query = "SELECT race.id AS id, race.name AS name, race.str, race.dex, race.con, race.`int`, race.wis, race.cha, class.name AS class, size.name AS size
                                    FROM gru_h8_dnd.race 
                                    INNER JOIN class ON race.FavClass = class.short
                                    INNER JOIN size ON race.size_ID = size.id;";
                                    $result = $pdo->query($query);
                                } catch (PDOException $e) {
                                    echo $e;
                                    exit();
                                }
                                # creating a table containing the results from the former sql query
                                ?>
                                <div class="">
                                    <table class="tablemain">
                                        <th>Race</th>
                                        <th>str</th>
                                        <th>dex</th>
                                        <th>con</th>
                                        <th>int</th>
                                        <th>wis</th>
                                        <th>cha</th>
                                        <th>Favorite Class</th>
                                        <th>Size</th>
                                        <?php
                                        foreach ($result as $row) {
                                            ?>
                                            <tr>
                                                <td><input  type="radio" name="Race" value="<?= $row['id'] ?>"><?= $row['name'] ?></td>
                                                <td><?php echo $row['str']; ?></td>
                                                <td><?php echo $row['dex']; ?></td>
                                                <td><?php echo $row['con']; ?></td>
                                                <td><?php echo $row['int']; ?></td>
                                                <td><?php echo $row['wis']; ?></td>
                                                <td><?php echo $row['cha']; ?></td>
                                                <td><?php echo $row['class']; ?></td>
                                                <td><?php echo $row['size']; ?></td>
                                            <br>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>

                                <div class="groupbox columns"> </div>

                                <div class="large-3 small-12 columns">
                                    HP:  <input type="text" placeholder="" name="hp" />
                                </div>
                                <div class="large-3 small-12 columns">
                                    AC:  <input type="text" placeholder="" name="ac" />
                                </div>
                                <div class="large-3 small-12 columns">
                                    Initiative:  <input type="text" placeholder="" name="ini" />
                                </div>
                                <div class="large-3 small-12 columns">
                                    Speed:  <input type="text" placeholder="" name="spd" />
                                </div>

                                <div class="groupbox columns"> </div>

                                <div class="large-2 small-6 columns">
                                    STR:  <input type="text" placeholder="" name="str"/>
                                </div>
                                <div class="large-2 small-6 columns">
                                    DEX:  <input type="text" placeholder="" name="dex" />
                                </div>
                                <div class="large-2 small-6 columns">
                                    INT:  <input type="text" placeholder="" name="int" />
                                </div>
                                <div class="large-2 small-6 columns">
                                    WIS:  <input type="text" placeholder="" name="wis" />
                                </div>
                                <div class="large-2 small-6 columns">
                                    CON:  <input type="text" placeholder="" name="con" />
                                </div>
                                <div class="large-2 small-6 columns">
                                    CHA:  <input type="text" placeholder="" name="cha" />
                                </div>

                                <div class="groupbox columns"> </div>

                                <div class="large-offset-1 large-3 small-12 columns">
                                    FORT:  <input type="text" placeholder="" name="fort"/>
                                </div>
                                <div class="large-3 small-12 columns">
                                    REFL:  <input type="text" placeholder="" name="reflex" />
                                </div>
                                <div class="large-3 small-12 columns">
                                    WILL:  <input type="text" placeholder="" name="will" />
                                </div>

                                <div class="groupbox columns"> </div>

                                <div class="large-3 small-12 columns">
                                    Platinum:  <input type="text" placeholder="" name="P" value="0"/>
                                </div>
                                <div class="large-3 small-12 columns">
                                    Gold:  <input type="text" placeholder="" name="G" value="0"/>
                                </div>
                                <div class="large-3 small-12 columns">
                                    Silver:  <input type="text" placeholder="" name="S" value="0"/>
                                </div>
                                <div class="large-3 small-12 columns">
                                    Copper:  <input type="text" placeholder="" name="C" value="0"/>
                                </div>

                                <div class="groupbox columns"> </div>

                                <input id="submit" class="button push-1 large-10 columns" type="submit" name="magnus" value="Request To The Gods For Your Creation"/>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['magnus'])) {
                            # defining variables, the values come from the textboxes, dropboxes and radio buttons


                            $prefix = $_POST['prefix'];
                            $characterName = $_POST['characterName'];
                            $suffix = $_POST['suffix'];

                            $class = $_POST['class'];
                            $race = $_POST['Race'];
                            $gender = $_POST['Gender'];
                            $alignment = $_POST['Alignment'];
                            $deity = $_POST['Deity'];

                            $xp = "0";
                            $lvl = "0";


                            $platinum = $_POST['P'];
                            $gold = $_POST['G'];
                            $silver = $_POST['S'];
                            $copper = $_POST['C'];
                            $currency = $platinum * 100 * 100 * 100 + $gold * 100 * 100 + $silver * 100 + $copper;

                            $age = $_POST['age'];
                            $height = $_POST['height'];
                            $weight = $_POST['weight'];
                            $eyeColor = $_POST['eyeColor'];
                            $hairColor = $_POST['hairColor'];
                            $hairStyle = $_POST['hairStyle'];
                            $hp = $_POST['hp'];
                            $ac = $_POST['ac'];
                            $initiative = $_POST['ini'];
                            $speed = $_POST['spd'];

                            $fort = $_POST['fort'];
                            $reflex = $_POST['reflex'];
                            $will = $_POST['will'];

                            $playerid = $_SESSION['id'];

                            try {
                                $sql = "INSERT INTO `character` ( `Prefix` , `Name` , `Suffix` , `Level` , `Xp` , `Currency` , `Gender_ID` , `Race_ID` , `Alignment_ID` , `Class_ID` , `Deity_ID` )  VALUES ('" . $prefix . "','" . $characterName . "','" . $suffix . "'," . $lvl . "," . $xp . "," . $currency . "," . $gender . "," . $race . "," . $alignment . ",'" . $class . "'," . $deity . ");";
                                $s = $pdo->prepare($sql);
                                $s->execute();

                                $sql = "SELECT id FROM `character` WHERE name = '" . $characterName . "';";
                                $result = $pdo->query($sql);
                                foreach ($result as $row) {
                                    $charid = $row['id'];
                                }
                                try {
                                    $query = "SELECT race.str AS str, race.dex as dex, race.`int` AS `int`, race.wis AS wis, race.con AS con, race.cha AS cha
                                    FROM race
                                    INNER JOIN `character` ON race.id = `character`.race_ID
                                    WHERE `character`.id =" . $charid;
                                    $result = $pdo->query($query);
                                } catch (Exception $e) {
                                    $e;
                                    exit();
                                }
                                foreach ($result as $row) {
                                    # the ability scores are the predefined ability scores plus the ability scores from the selected race
                                    $str = $_POST['str'] + $row['str'];
                                    $dex = $_POST['dex'] + $row['dex'];
                                    $int = $_POST['int'] + $row['int'];
                                    $wis = $_POST['wis'] + $row['wis'];
                                    $con = $_POST['con'] + $row['con'];
                                    $cha = $_POST['cha'] + $row['cha'];
                                }
                                $sql = "INSERT INTO `ability_scores`(`Character_ID`, `str`, `dex`, `con`, `int`, `wis`, `cha`) VALUES (" . $charid . "," . $str . "," . $dex . "," . $con . "," . $int . "," . $wis . "," . $cha . ");";
                                $s = $pdo->prepare($sql);
                                $s->execute();

                                $sql = "INSERT INTO `combat`(`Character_ID`, `Max_hp`, `Current_hp`, `Armor_Class`, `Initiative`, `Speed`) VALUES (" . $charid . "," . $hp . "," . $hp . "," . $ac . "," . $initiative . "," . $speed . ");";
                                $s = $pdo->prepare($sql);
                                $s->execute();

                                $sql = "INSERT INTO `saving_throw`(`Character_ID`, `Fortitude`, `Reflex`, `Will`) VALUES (" . $charid . "," . $fort . "," . $reflex . "," . $will . ");";
                                $s = $pdo->prepare($sql);
                                $s->execute();

                                $sql = "INSERT INTO `appearance`(`Character_ID`, `Age`, `Height`, `Weight`, `Hair_Color_ID`, `Eye_Color_ID`, `Hair_Style_ID`) VALUES (" . $charid . "," . $age . "," . $height . "," . $weight . "," . $hairColor . "," . $eyeColor . "," . $hairStyle . ");";
                                $s = $pdo->prepare($sql);
                                $s->execute();

                                $sql = "INSERT INTO `access`(`Player_ID`, `Character_ID`) VALUES ('" . $playerid . "','" . $charid . "');";
                                $s = $pdo->prepare($sql);
                                $s->execute();
                            } catch (PDOException $e) {
                                echo $e;
                                exit();
                            }
                        }
                        ?>
                    </div> <!-- End Container Main-->
                </div> <!-- End row Container -->
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

        <script type="text/javascript">
            function check_username() {
                var uname = document.getElementById("characterName").value;
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
    </body>
</html>
