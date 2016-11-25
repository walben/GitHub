<?php
if (isset($_GET['find'])) {
    $search = $_GET['search'];
    $search = "'%" . $search . "%'";
    $query = "SELECT `character`.id AS ID, `character`.name AS name, `character`.level AS level, race.name AS race, class.name AS class, player.username AS player
        FROM `character` 
        INNER JOIN race ON `character`.race_ID = race.ID
        INNER JOIN class ON `character`.class_ID = class.short
        INNER JOIN access ON `character`.id = access.character_ID
        INNER JOIN player ON access.player_ID = player.ID
        WHERE (`character`.name LIKE " . $search . " OR class.name LIKE " . $search . " OR `character`.level LIKE " . $search . " OR player.username LIKE " . $search . ")";
    $_SESSION['query1'] = $query;
}
?>
<form action="" method="GET" name="signup" id="signup">
    <div class="large-8 columns push-2">
        Search: <input type="text" placeholder="" name="search"/><br />
        <input class="button columns" type="submit" name="find" value="Search" />
</form>
<?php
try {
    $query = $_SESSION['query1'];
    $result = $pdo->query($query);
} catch (PDOException $e) {
    echo $e;
    exit();
}
?>
<div>
    <table class="tablemain">
        <th>Name</th>
        <th>Level</th>
        <th>Race</th>
        <th>Class</th>
        <th>Player</th>
        <th>View</th>
        <?php
        foreach ($result as $row) {
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['level']; ?></td>
                <td><?php echo $row['race']; ?></td>
                <td><?php echo $row['class']; ?></td>
                <td><?php echo $row['player']; ?></td>
                <td><a href="/hopar/GRU_H8/home/view/index.php?id=<?php echo $row['ID']; ?>" >View</td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
