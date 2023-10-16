<?php

$db = new mysqli('localhost', 'root', '', 'braindb');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT titles, links FROM files";
$result = mysqli_query($db, $sql);
$value = -1;
if (mysqli_num_rows($result) > 0) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<a href="' . htmlspecialchars($row['links']) . '">' . htmlspecialchars($row['titles']) . '</a><br>';
            echo '<hr>';
        }        
    }    
} else {
        echo "No data found.";
}
$db->close();
?>
