<?php

$con = mysql_connect("82.148.66.15", "GRU_H8", "Disaster");
mysql_select_db("gru_h8_dnd", $con);


session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/hopar/GRU_H8/dbcon/dbcon.php';
$message = array();
if (isset($_POST['uname']) && !empty($_POST['uname'])) {
    $uname = mysql_real_escape_string($_POST['uname'], $con);
} else {
    $message[] = 'Please enter username';
}

if (isset($_POST['password']) && !empty($_POST['password'])) {
    $password = mysql_real_escape_string($_POST['password'], $con);
} else {
    $message[] = 'Please enter password';
}

$countError = count($message);

if ($countError > 0) {
    for ($i = 0; $i < $countError; $i++) {
        echo ucwords($message[$i]) . '<br/><br/>';
    }
} else {
    $query = "SELECT player.username, player.id FROM gru_h8_dnd.player WHERE username='$uname' and password='$password'";
    $res = mysql_query($query);
    $checkUser = mysql_num_rows($res);
    if ($checkUser > 0) {
        $_SESSION['LOGIN_STATUS'] = true;
        $_SESSION['UNAME'] = $uname;
        $_SESSION['ID'] = $myID;

        echo 'correct';
    } else {
        echo ucwords('please enter correct user details');
    }
}