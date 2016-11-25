<!DOCTYPE html>
<html class="no-js" lang="en" >

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>View</title>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/normalize.css" />
        <link rel="stylesheet" href="/hopar/GRU_H8/css/foundation.css">
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <script src="/hopar/GRU_H8/js/jquery.validate.min.js"></script>
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
                $charid = $_GET['id'];
                ?>
                <?php
                try {
                    $query = "SELECT `character`.prefix AS prefix, `character`.name AS name, `character`.suffix AS suffix
                        FROM gru_h8_dnd.`character`
                        WHERE `character`.id =" . $charid;
                    $result = $pdo->query($query);
                } catch (PDOException $e) {
                    echo $e;
                    exit();
                }
                foreach ($result as $row) {
                    $prefix = $row['prefix'];
                    $name = $row['name'];
                    $suffix = $row['suffix'];
                }
                ?>
                <h1><?php echo $prefix . " " . $name . " " . $suffix; ?></h1>

                <form action="" name="charcreate" method="POST">
                    <div class="large-centered large-10 small-11 columns">

                        <?php
                        //for some space
                        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                        ?>

                        <div>
                            <a href="/hopar/GRU_H8" class="button large-12 small-12 columns">Go back</a>
                        </div>

                        <?php
                        //for some space
                        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/misc/space.php';
                        ?>

                        <div class="space columns"> </div>

                        <div class="large-4 small-12 columns">
                            Prefix:  <input readonly type="text" placeholder="" name="prefix" value="<?php echo $prefix; ?>"/>
                        </div>
                        <div class="large-4 small-12 columns">
                            Character Name:  <input readonly type="text" class="required" title="Please type your name." placeholder="" name="characterName" value="<?php echo $name; ?>"/>
                        </div>
                        <div class="large-4 small-12 columns">
                            Suffix:  <input readonly type="text" placeholder="" name="suffix" value="<?php echo $suffix; ?>"/>
                        </div>

                        <div class="space columns"> </div>
                        <?php
                        try {
                            $query = "SELECT race.name AS race
                                FROM gru_h8_dnd.`race`
                                INNER JOIN `character` ON race.id =  `character`.race_ID
                                WHERE `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $race = $row['race'];
                        }
                        ?>
                        <div class="large-4 small-12 columns">
                            Race:  <input readonly type="text" placeholder="" name="race"  value="<?php echo $race; ?>"/>
                        </div>
                        <?php
                        try {
                            $query = "SELECT class.name AS class
                                FROM gru_h8_dnd.`class`
                                INNER JOIN `character` ON class.short =  `character`.class_ID
                                WHERE `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $class = $row['class'];
                        }
                        ?>
                        <div class="large-4 small-12 columns">
                            Class:<input readonly type="text" placeholder="" name="class" value="<?php echo $class; ?>" />
                        </div>
                        <?php
                        try {
                            $query = "SELECT gender.name AS gender
                                FROM gru_h8_dnd.`gender`
                                INNER JOIN `character` ON gender.id =  `character`.gender_ID
                                WHERE `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $gender = $row['gender'];
                        }
                        ?>
                        <div class="large-4 small-12 columns">
                            Gender:<input readonly type="text" placeholder="" name="gender" value="<?php echo $gender; ?>" />
                        </div>

                        <div class="space columns"> </div>
                        <?php
                        try {
                            $query = "SELECT appearance.age AS age, appearance.height AS height, appearance.weight AS weight
                                    FROM gru_h8_dnd.`appearance` 
                                    INNER JOIN `character` ON appearance.character_ID = `character`.ID
                                    WHERE `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $age = $row['age'];
                            $height = $row['height'];
                            $weight = $row['weight'];
                        }
                        ?>
                        <div class="large-2 small-12 columns">
                            Age:  <input readonly type="text" placeholder="" name="age" value="<?php echo $age; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            Height:  <input readonly type="text" placeholder="" name="height" value="<?php echo $height; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            Weight:  <input readonly type="text" placeholder="" name="weight" value="<?php echo $weight; ?>" />
                        </div>
                        <?php
                        try {
                            $query = "SELECT `character`.level AS lvl, `character`.xp
                                    FROM gru_h8_dnd.`character`
                                    WHERE `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $lvl = $row['lvl'];
                            $xp = $row['xp'];
                        }
                        ?>
                        <div class="large-4 small-12 columns">
                            XP:  <input readonly type="text" placeholder="" name="xp" value="<?php echo $xp; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            Level:  <input readonly type="text" placeholder="" name="lvl" value="<?php echo $lvl; ?>" />
                        </div>

                        <div class="space columns"> </div>
                        <?php
                        try {
                            $query = "SELECT hair_color.color AS hColor, hair_style.style AS hStyle, eye_color.color AS eColor
                                    FROM hair_color
                                    INNER JOIN appearance ON hair_color.id = appearance.hair_color_id
                                    INNER JOIN eye_color ON appearance.eye_color_id = eye_color.id
                                    INNER JOIN hair_style ON appearance.hair_style_id = hair_style.id
                                    INNER JOIN  `character` ON appearance.character_ID =  `character`.id
                                    WHERE  `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $hColor = $row['hColor'];
                            $eColor = $row['eColor'];
                            $hStyle = $row['hStyle'];
                        }
                        ?>
                        <div class="large-4 small-12 columns">
                            Hair Color:    <input readonly type="text" placeholder="" name="hairolor" value="<?php echo $hColor; ?>" />
                        </div>
                        <div class="large-4 small-12 columns">
                            Hair Style:    <input readonly type="text" placeholder="" name="hairstyle" value="<?php echo $hStyle; ?>" />
                        </div>
                        <div class="large-4 small-12 columns">
                            Eye Color:    <input readonly type="text" placeholder="" name="eyecolor" value="<?php echo $eColor; ?>" />
                        </div>
                        <?php
                        try {
                            $query = "SELECT alignment.name AS alignment
                            FROM alignment
                            INNER JOIN `character` ON alignment.id = `character`.alignment_ID
                            WHERE `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $alignment = $row['alignment'];
                        }
                        ?>
                        <div class="space columns"> </div>

                        <div class="large-6 small-12 columns">
                            Alignment:    <input readonly type="text" placeholder="" name="alignment" value="<?php echo $alignment; ?>" />
                        </div>
                        <?php
                        try {
                            $query = "SELECT deity.name AS deity
                            FROM deity
                            INNER JOIN `character` ON deity.id = `character`.deity_ID
                            WHERE `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $deity = $row['deity'];
                        }
                        ?>
                        <div class="large-6 small-12 columns">
                            Deity:    <input readonly type="text" placeholder="" name="deity" value="<?php echo $deity; ?>" />
                        </div>

                        <div class="space columns"> </div>
                        <?php
                        try {
                            $query = "SELECT combat.current_hp AS currentHP, combat.max_hp AS maxHP, combat.armor_class AS ac, combat.initiative AS initiative, combat.speed AS speed
                                FROM gru_h8_dnd.`combat`
                                INNER JOIN `character` ON combat.character_ID =  `character`.ID
                                WHERE `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $currentHP = $row['currentHP'];
                            $maxHP = $row['maxHP'];
                            $ac = $row['ac'];
                            $initiative = $row['initiative'];
                            $speed = $row['speed'];
                        }
                        ?>
                        <div class="large-3 small-12 columns">
                            Current HP:  <input readonly type="text" placeholder="" name="currenthp" value="<?php echo $currentHP; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            Max HP:  <input readonly type="text" placeholder="" name="hp" value="<?php echo $maxHP; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            AC:  <input readonly type="text" placeholder="" name="ac" value="<?php echo $ac; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            Initiative:  <input readonly type="text" placeholder="" name="ini" value="<?php echo $initiative; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            Speed:  <input readonly type="text" placeholder="" name="spd" value="<?php echo $speed; ?>" />
                        </div>

                        <div class="space columns"> </div>
                        <?php
                        try {
                            $query = "SELECT ability_scores.str AS str, ability_scores.dex AS dex, ability_scores.con AS con, ability_scores.`int` AS `int` , ability_scores.wis AS wis, ability_scores.cha AS cha
                                    FROM gru_h8_dnd.`ability_scores` 
                                    INNER JOIN `character` ON ability_scores.character_ID = `character`.ID
                                    WHERE `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $str = $row['str'];
                            $dex = $row['dex'];
                            $con = $row['con'];
                            $int = $row['int'];
                            $wis = $row['wis'];
                            $cha = $row['cha'];
                        }
                        ?>
                        <div class="large-2 small-12 columns">
                            STR:  <input readonly type="text" placeholder="" name="str" value="<?php echo $str; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            DEX:  <input readonly type="text" placeholder="" name="dex" value="<?php echo $dex; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            CON:  <input readonly type="text" placeholder="" name="con" value="<?php echo $con; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            INT:  <input readonly type="text" placeholder="" name="int" value="<?php echo $int; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            WIS:  <input readonly type="text" placeholder="" name="wis" value="<?php echo $wis; ?>" />
                        </div>
                        <div class="large-2 small-12 columns">
                            CHA:  <input readonly type="text" placeholder="" name="cha" value="<?php echo $cha; ?>" />
                        </div>

                        <div class="space columns"> </div>
                        <?php
                        try {
                            $query = "SELECT saving_throw. Fortitude AS fort, saving_throw.reflex AS reflex, saving_throw.will AS will
                                    FROM gru_h8_dnd.`saving_throw` 
                                    INNER JOIN `character` ON saving_throw.character_ID = `character`.ID
                                    WHERE `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $fort = $row['fort'];
                            $reflex = $row['reflex'];
                            $will = $row['will'];
                        }
                        ?>
                        <div class="large-2 small-12 columns">
                            FORT:  <input readonly type="text" placeholder="" name="fort" value="<?php echo $fort; ?>"/>
                        </div>
                        <div class="large-2 small-12 columns">
                            REFL:  <input readonly type="text" placeholder="" name="reflex" value="<?php echo $reflex; ?>"/>
                        </div>
                        <div class="large-2 small-12 columns">
                            WILL:  <input readonly type="text" placeholder="" name="will" value="<?php echo $will; ?>"/>
                        </div>

                        <div class="space columns"> </div>
                        <?php
                        try {
                            $query = "SELECT `character`.currency AS currency
                                    FROM gru_h8_dnd.`character`
                                    WHERE `character`.id =" . $charid;
                            $result = $pdo->query($query);
                        } catch (PDOException $e) {
                            echo $e;
                            exit();
                        }
                        foreach ($result as $row) {
                            $currency = $row['currency'];
                        }
                        $platinum = $currency / (100 * 100 * 100);
                        $currency = $currency % (100 * 100 * 100);
                        $gold = $currency / (100 * 100);
                        $currency = $currency % (100 * 100);
                        $silver = $currency / 100;
                        $currency = $currency % (100);
                        $copper = $currency;
                        ?>
                        <div class="large-2 small-12 columns">
                            Platinum:  <input readonly type="text" placeholder="" name="P" value="<?php echo intval($platinum); ?>"/>
                        </div>
                        <div class="large-2 small-12 columns">
                            Gold:  <input readonly type="text" placeholder="" name="G" value="<?php echo intval($gold); ?>"/>
                        </div>
                        <div class="large-2 small-12 columns">
                            Silver:  <input readonly type="text" placeholder="" name="S" value="<?php echo intval($silver); ?>"/>
                        </div>
                        <div class="large-2 left small-12 columns">
                            Copper:  <input readonly type="text" placeholder="" name="C" value="<?php echo intval($copper); ?>"/>
                        </div>
                        <div>
                            <a href="/hopar/GRU_H8" class="button large-12 small-12 columns">Go back</a>
                        </div>
                    </div>
                </form>

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


                <script>
                    $(document).ready(function() {
                        $('#charcreate').validate({
                            rules: {
                                characterName: {
                                    required: true,
                                    rangelength: [8, 16]
                                },
                            }, //end rules
                            messages: {
                                characterName: {
                                    required: 'Please type a password',
                                    rangelength: 'Password must be between 8 and 16 characters long.'
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
            </div>
        </div>
    </body>
</html>
