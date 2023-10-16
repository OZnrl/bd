<?php
$db = new mysqli('localhost', 'root', '', 'braindb');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT titles FROM files";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            foreach ($row as $column => $value) {
                if (preg_match('/\.(mp3|mp4)$/', $value)) {
                    echo '<li>' . htmlspecialchars($row['titles']) . '</li>';
                    echo '<hr>';  
                } else {
                }
            }
        }
    }    
} else {
    echo "No data found.";
}
$db->close();
?>
