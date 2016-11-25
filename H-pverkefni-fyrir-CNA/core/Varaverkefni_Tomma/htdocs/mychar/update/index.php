<?php session_start(); ?>
<!DOCTYPE html>
<html class="no-js" lang="en" >

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Update</title>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/normalize.css">
        <link rel="stylesheet" href="/hopar/GRU_H8/css/foundation.css">
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="/hopar/GRU_H8/js/vendor/custom.modernizr.js"></script>
        <script src="/hopar/GRU_H8/js/_js/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="/hopar/GRU_H8/css/app.css">
        <script type="text/javascript">
            //code does not work
            $(document).ready(function() {
                $('#charcreate').validate({
                    rules: {
                        currentHP: {
                            required: true,
                            number: true
                        },
                        xp: {
                            required: true,
                            number: true
                        },
                        lvl: {
                            required: true,
                            number: true
                        },
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
                        }
                    }, //end rules
                    messages: {
                        currentHP: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        xp: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
                        lvl: {
                            required: 'This field is required',
                            number: 'Please use numbers'
                        },
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
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/dbcon/dbcon.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/connection/logout.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/nav.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/header.php';
        $charid = $_GET['id'];
        ?>
        <div class="row container"> <!-- Start row Container -->  
            <div class="large-10 columns"> <!-- Start Container Main -->
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
<?php
                        if (isset($_POST['update'])) {
                            #character
                            $prefix = $_POST['prefix'];
                            $suffix = $_POST['suffix'];
                            $lvl = $_POST['lvl'];
                            $xp = $_POST['xp'];
                            $p = $_POST['P'];
                            $g = $_POST['G'];
                            $s = $_POST['S'];
                            $c = $_POST['C'];
                            $currency = $p * (100 * 100 * 100) + $g * (100 * 100) + $s * 100 + $c;

                            #Deity
                            $deity = $_POST['Deity'];

                            #Alignment
                            $alignment = $_POST['Alignment'];

                            #combat
                            $currentHP = $_POST['currentHP'];
                            $maxHP = $_POST['maxHP'];
                            $ac = $_POST['ac'];
                            $initiative = $_POST['ini'];
                            $speed = $_POST['spd'];

                            #ability score
                            $str = $_POST['str'];
                            $dex = $_POST['dex'];
                            $con = $_POST['con'];
                            $int = $_POST['int'];
                            $wis = $_POST['wis'];
                            $cha = $_POST['cha'];

                            #saving throw
                            $fort = $_POST['fort'];
                            $reflex = $_POST['reflex'];
                            $will = $_POST['will'];

                            #appearance
                            $age = $_POST['age'];
                            $height = $_POST['height'];
                            $weight = $_POST['weight'];
                            $hair_color = $_POST['hairColor'];
                            $hair_style = $_POST['hairStyle'];

                            #update character
                            try {
                                $query = "UPDATE `character` SET `Prefix`='" . $prefix . "', `Suffix`='" . $suffix . "',`Level`=" . $lvl . ",`Xp`=" . $xp . ",`Currency`=" . $currency . ",`Alignment_ID`=" . $alignment . ",`Deity_ID`=" . $deity . " WHERE `character`.id =" . $charid;
                                $result = $pdo->query($query);
                            } catch (PDOException $e) {
                                echo $e;
                                exit();
                            }
                            #update combat
                            try {
                                $query = "UPDATE `combat` SET `Max_hp` = " . $maxHP . ",`Current_hp`=" . $currentHP . ",`Armor_Class`=" . $ac . ",`Initiative`=" . $initiative . ",`Speed`=" . $speed . " WHERE character_id = " . $charid;
                                $result = $pdo->query($query);
                            } catch (PDOException $e) {
                                echo $e;
                                exit();
                            }
                            #update ability scores
                            try {
                                $query = "UPDATE `ability_scores` SET `str`=" . $str . ",`dex`=" . $dex . ",`con`=" . $con . ",`int`=" . $int . ",`wis`=" . $wis . ",`cha`=" . $cha . " WHERE character_id = " . $charid;
                                $result = $pdo->query($query);
                            } catch (PDOException $e) {
                                echo $e;
                                exit();
                            }
                            #update saving throw
                            try {
                                $query = "UPDATE `saving_throw` SET `Fortitude`=" . $fort . ",`Reflex`=" . $reflex . ",`Will`=" . $will . " WHERE character_id = " . $charid;
                                $result = $pdo->query($query);
                            } catch (PDOException $e) {
                                echo $e;
                                exit();
                            }
                            #update appearance
                            try {
                                $query = "UPDATE `appearance` SET `Age`=" . $age . ",`Height`=" . $height . ",`Weight`=" . $weight . ",`hair_color_id`=" . $hair_color . ",`hair_style_id`=" . $hair_style . " WHERE character_id = " . $charid;
                                $result = $pdo->query($query);
                            } catch (PDOException $e) {
                                echo $e;
                                exit();
                            }
                        }
                        ?>
                <h1><?php echo $name; ?></h1>
                <div class="row"> <!-- Start row Container --> 
                    <div class="large-10 columns"> <!-- Start Container Main -->
                        <form action="" name="charcreate" method="POST">
                            <div class="push-2 large-10 small-11 columns">
                                <div class="groupbox columns"> </div>
                                <div class="large-4 small-12 columns">
                                    Prefix:  <input type="text" placeholder="" name="prefix" value="<?php echo $prefix; ?>"/>
                                </div>
                                <div class="large-4 small-12 columns">
                                    Name:  <input readonly type="text" placeholder="" name="name" value="<?php echo $name; ?>"/>
                                </div>
                                <div class="large-4 small-12 columns">
                                    Suffix:  <input type="text" placeholder="" name="suffix" value="<?php echo $suffix; ?>"/>
                                </div>

                                <div class="groupbox columns"> </div>

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
                                <div class="large-4 hide-for-small columns">
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
                                <div class="large-4 hide-for-small columns">
                                    Class:  <input readonly type="text" placeholder="" name="class" value="<?php echo $class; ?>"/>
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
                                <div class="large-4 hide-for-small columns">
                                    Gender:  <input readonly type="text" placeholder="" name="gender" value="<?php echo $gender; ?>"/>
                                </div>

                                <div class="large-6 small-12 columns">
                                    Alignment:
                                    <select name="Alignment">
                                        <?php
                                        try {
                                            $query = "SELECT alignment.id as alignment, `character`.id AS charid 
                                            FROM gru_h8_dnd.alignment 
                                            INNER JOIN `character` on alignment.id = `character`.alignment_id
                                            WHERE `character`.id =" . $charid;
                                            echo $query;
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            $selectedAlignment = $row['alignment'];
                                        }
                                        try {
                                            $query = "SELECT id, name
                                            FROM gru_h8_dnd.alignment";
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            if ($row['id'] == $selectedAlignment) {
                                                ?>
                                                <option selected="selected" name="alignment" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php
                                            }
                                            if ($row['id'] != $selectedAlignment) {
                                                ?>
                                                <option name="alignment" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="large-6 small-12 columns">
                                    Deity:
                                    <select name="Deity">
                                        <?php
                                        try {
                                            $query = "SELECT deity.id as deity, `character`.id AS charid 
                                                    FROM gru_h8_dnd.deity 
                                                    INNER JOIN `character` on deity.id = `character`.deity_id 
                                                    WHERE `character`.id =" . $charid;
                                            echo $query;
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            $selectedDeity = $row['deity'];
                                        }
                                        try {
                                            $query = "SELECT id, name
                                            FROM gru_h8_dnd.deity";
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            if ($row['id'] == $selectedDeity) {
                                                ?>
                                                <option selected="selected" name="deity" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php
                                            }
                                            if ($row['id'] != $selectedDeity) {
                                                ?>
                                                <option name="deity" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="groupbox columns"> </div>
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
                                <div class="push-3 large-4 small-12 columns">
                                    XP:  <input type="text" placeholder="" name="xp" value="<?php echo $xp ?>" />
                                </div>
                                <div class="push-3 large-2 small-12 columns">
                                    Level:  <input type="text" placeholder="" name="lvl" value="<?php echo $lvl ?>" />
                                </div>

                                <div class="groupbox columns"> </div>
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
                                <div class="large-3 small-12 columns">
                                    Copper:  <input type="text" placeholder="" name="C" value="<?php echo intval($copper); ?>"/><br />
                                </div>
                                <div class="large-3 small-12 columns">
                                    Silver:  <input type="text" placeholder="" name="S" value="<?php echo intval($silver); ?>"/><br />
                                </div>
                                <div class="large-3 small-12 columns">
                                    Gold:  <input type="text" placeholder="" name="G" value="<?php echo intval($gold); ?>"/><br />
                                </div>
                                <div class="large-3 small-12 columns">
                                    Platinum:  <input type="text" placeholder="" name="P" value="<?php echo intval($platinum); ?>"/><br />
                                </div>

                                <div class="groupbox columns"> </div>
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
                                    Current HP:  <input type="text" placeholder="" name="currentHP" value="<?php echo $currentHP ?>"/>
                                </div>
                                <div class="large-3 small-12 columns">
                                    Max HP:  <input type="text" placeholder="" name="maxHP" value="<?php echo $maxHP ?>" />
                                </div>
                                <div class="large-2 small-12 columns">
                                    AC:  <input type="text" placeholder="" name="ac" value="<?php echo $ac ?>"/>
                                </div>
                                <div class="large-2 small-12 columns">
                                    Initiative:  <input type="text" placeholder="" name="ini" value="<?php echo $initiative ?>"/>
                                </div>
                                <div class="large-2 small-12 columns">
                                    Speed:  <input type="text" placeholder="" name="spd" value="<?php echo $speed ?>"/>
                                </div>

                                <div class="groupbox columns"> </div>
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
                                <div class="large-2 small-6 columns">
                                    STR:  <input type="text" placeholder="" name="str" value="<?php echo $str ?>"/>
                                </div>
                                <div class="large-2 small-6 columns">
                                    DEX:  <input type="text" placeholder="" name="dex" value="<?php echo $dex ?>"/>
                                </div>
                                <div class="large-2 small-6 columns">
                                    INT:  <input type="text" placeholder="" name="int" value="<?php echo $int ?>"/>
                                </div>
                                <div class="large-2 small-6 columns">
                                    WIS:  <input type="text" placeholder="" name="wis" value="<?php echo $wis ?>"/>
                                </div>
                                <div class="large-2 small-6 columns">
                                    CON:  <input type="text" placeholder="" name="con" value="<?php echo $con ?>"/>
                                </div>
                                <div class="large-2 small-6 columns">
                                    CHA:  <input type="text" placeholder="" name="cha" value="<?php echo $cha ?>"/>
                                </div>

                                <div class="groupbox columns"> </div>
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
                                <div class="large-offset-3 large-2 small-12 columns">
                                    FORT:  <input type="text" placeholder="" name="fort" value="<?php echo $fort ?>"/>
                                </div>
                                <div class="large-2 small-12 columns">
                                    REFL:  <input type="text" placeholder="" name="reflex" value="<?php echo $reflex ?>"/>
                                </div>
                                <div class="large-2 small-12 columns">
                                    WILL:  <input type="text" placeholder="" name="will" value="<?php echo $will ?>"/>
                                </div>

                                <div class="groupbox columns"> </div>
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
                                <div class="large-offset-3 large-2 small-12 columns">
                                    Age:  <input type="text" placeholder="" name="age" value="<?php echo $age ?>"/>
                                </div>
                                <div class="large-2 small-12 columns">
                                    Height:  <input type="text" placeholder="" name="height" value="<?php echo $height ?>"/>
                                </div>
                                <div class="large-2 small-12 columns">
                                    Weight:  <input type="text" placeholder="" name="weight" value="<?php echo $weight ?>"/>
                                </div>

                                <div class="groupbox columns"> </div>

                                <div class="large-4 small-12 columns">
                                    Eye Color:
                                        <?php
                                        try {
                                            $query = "SELECT eye_color.color AS eye_color, `character`.id AS charid
                                                    FROM gru_h8_dnd.eye_color
                                                    INNER JOIN appearance ON eye_color.id = appearance.eye_color_id
                                                    INNER JOIN `character` ON appearance.character_id = `character`.id
                                                    WHERE `character`.id =" . $charid;
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            $eye_color = $row['eye_color'];
                                        }
                                        ?>
                                        <input readonly type="text" placeholder="" name="eye_color" value="<?php echo $eye_color ?>"/>
                                </div>
                                <div class="large-4 small-12 columns">
                                    Hair Color:
                                    <select name="hairColor">
                                        <?php
                                        try {
                                            $query = "SELECT hair_color.id as hair_color, `character`.id AS charid 
                                                        FROM gru_h8_dnd.hair_color 
                                                        INNER JOIN appearance ON hair_color.id = appearance.hair_color_id
                                                        INNER JOIN `character` ON appearance.character_id = `character`.id
                                                        WHERE `character`.id =" . $charid;
                                            echo $query;
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            $selectedHair_color = $row['hair_color'];
                                        }
                                        try {
                                            $query = "SELECT id, color
                                                FROM gru_h8_dnd.hair_color";
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            if ($row['id'] == $selectedHair_color) {
                                                ?>
                                                <option selected="selected" name="hair_color" value="<?php echo $row['id']; ?>"><?php echo $row['color']; ?></option>
                                                <?php
                                            }
                                            if ($row['id'] != $selectedHair_color) {
                                                ?>
                                                <option name="hair_color" value="<?php echo $row['id']; ?>"><?php echo $row['color']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="large-4 small-12 columns">
                                    Hair Style:
                                    <select name="hairStyle">
                                        <?php
                                        try {
                                            $query = "SELECT hair_style.id as hair_style, `character`.id AS charid 
                                                        FROM gru_h8_dnd.hair_style 
                                                        INNER JOIN appearance ON hair_style.id = appearance.hair_style_id
                                                        INNER JOIN `character` ON appearance.character_id = `character`.id
                                                        WHERE `character`.id =" . $charid;
                                            echo $query;
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            $selectedHair_style = $row['hair_style'];
                                        }
                                        try {
                                            $query = "SELECT id, style
                                                FROM gru_h8_dnd.hair_style";
                                            $result = $pdo->query($query);
                                        } catch (PDOException $e) {
                                            echo $e;
                                            exit();
                                        }
                                        foreach ($result as $row) {
                                            if ($row['id'] == $selectedHair_style) {
                                                ?>
                                                <option selected="selected" name="hair_style" value="<?php echo $row['id']; ?>"><?php echo $row['style']; ?></option>
                                                <?php
                                            }
                                            if ($row['id'] != $selectedHair_style) {
                                                ?>
                                                <option name="hair_style" value="<?php echo $row['id']; ?>"><?php echo $row['style']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="large-10 small-11 columns">
                                    <input class="button large-12 columns" type="submit" name="update" value="Save Changes"/>
                                </div>
                            </div>
                        </form>
                        
                    </div> <!-- End Container Main-->
                </div> <!-- End row Container -->
            </div>
        </div>
        <!-- start footer -->
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/inc/footer.php';
        ?>
        <!-- end footer -->
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
