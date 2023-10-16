<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'braindb');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch all filenames from the database
$sql = "SELECT titles FROM files";
$result = mysqli_query($db, $sql);

// Check if there are rows in the result
if (mysqli_num_rows($result) > 0) {
   
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Print each column in the row
            foreach ($row as $column => $value) {
                if (preg_match('/\.(mp3|mp4)$/', $value)) {
                    /* echo '<ul style="list-style-type: none;display: flex;flex-direction: column;align-items: baseline; overflow: hidden;">'; */
                    echo '<li>' . htmlspecialchars($row['titles']) . '</li>';
                    echo '<hr>';
                  
                } else {
                
                }
            }
            /* echo "<hr>"; // Add a separator between rows */
        }
    }    
    } else {
        echo "No data found.";
    }


// Close the database connection
$db->close();
?>
