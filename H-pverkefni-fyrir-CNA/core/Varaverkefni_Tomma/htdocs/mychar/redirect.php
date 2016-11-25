<!-- This file runs from the navigation in inc/nav.php -->
<?php session_start(); ?>
<?php
$query = "SELECT `character`.id AS ID, `character`.name AS name, `character`.level AS level, race.name AS race, class.name AS class, player.username AS player FROM `character` 
                                INNER JOIN race ON `character`.race_ID = race.ID 
                                INNER JOIN class ON `character`.class_ID = class.short 
                                INNER JOIN access ON `character`.id = access.character_ID 
                                INNER JOIN player ON access.player_ID = player.ID 
                                WHERE player.id = " . $_SESSION['id'] . ";";
$_SESSION['query'] = $query;
header('Location: /hopar/GRU_H8/mychar/index.php');
?>