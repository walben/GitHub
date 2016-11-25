<?php

$hostname = 'localhost';
$dbname = 'GRU_H8_DnD';
$db_user = 'GRU_H8';
$db_password = 'Disaster';


$link = mysql_connect($hostname, $db_user, $db_password);
$connect = mysql_select_db($dbname, $link) or die(mysql_error());

$uname = $_POST['user_id'];
$sql = "SELECT player.username FROM gru_h8_dnd.player where username = '$uname'";
$rows = mysql_query($sql);

$res = mysql_num_rows($rows);

if ($res > 0) {

    echo "<label style='margin:10px;color: #B70404;'>Username is Currently Occupied</label>";
} else {

    echo "<label style='margin:10px;color: #018500;'>Avalable</label>";
}
?>