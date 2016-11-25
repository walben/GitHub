<?php
try {
    $pdo = new PDO('mysql:host=82.148.66.15;dbname=gru_h8_dnd', 'GRU_H8', 'Disaster');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
} catch (PDOException $e) {
    echo "Connection to database failed. Please contact administrator and send him the following message:." . "<br>" . $e->getMessage();
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
    exit();
}
?>