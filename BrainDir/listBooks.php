<?php
$db = new mysqli('localhost', 'root', '', 'braindb');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT titles FROM files";
$result = mysqli_query($db, $sql);
$linksQuery = "SELECT links FROM files";
$linkSqli = mysqli_query ($db, $linksQuery);
$links = $linkSqli->fetch_assoc();
if (mysqli_num_rows($result) > 0) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            foreach ($row as $column => $value) {
                if (preg_match('/\.(txt|log|json)$/', $value)) {
                    echo '<a style="text-decoration: none; color: bisque;"href="' . htmlspecialchars($links['links']) . '"><li>' . htmlspecialchars($row['titles']) . '</li></a>';
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
