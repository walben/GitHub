<?php session_start(); ?>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/dbcon/dbcon.php';
$valid = 0;
$_SESSION['playername'] = $_POST['konni'];
$_SESSION['password'] = $_POST['gusgus'];

try {
    $query = "SELECT id
        FROM gru_h8_dnd.player
        WHERE username = '" . $_SESSION['playername'] . "';";
    $result = $pdo->query($query);
} catch (PDOException $e) {
    echo $e;
    exit();
}
foreach ($result as $row) {
    $_SESSION['id'] = $row['id'];
}

try {
    $query = "SELECT username, password
            FROM gru_h8_dnd.player 
            WHERE username = '" . $_SESSION['playername'] . "';";
    $result = $pdo->query($query);
} catch (PDOException $e) {
    echo $e;
    exit();
}
foreach ($result as $row) {
    if (strtolower($_SESSION['playername']) == strtolower($row['username'])) {
        $valid = $valid + 1;
    }
    if ($_SESSION['password'] == $row['password']) {
        $valid = $valid + 1;
    }
}
$query = "SELECT `character`.id AS ID, `character`.name AS name, `character`.level AS level, race.name AS race, class.name AS class, player.username AS player FROM `character` 
                                INNER JOIN race ON `character`.race_ID = race.ID 
                                INNER JOIN class ON `character`.class_ID = class.short 
                                INNER JOIN access ON `character`.id = access.character_ID 
                                INNER JOIN player ON access.player_ID = player.ID 
                                WHERE player.id = " . $_SESSION['id'] . ";";
$_SESSION['query'] = $query;
if ($valid == 2) {#er til
    header('Location: /hopar/GRU_H8/mychar/index.php');
} else {# er ekki til
    header('Location: /hopar/GRU_H8/index.php');
}
?>