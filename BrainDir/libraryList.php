<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'braindb');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch all filenames from the database
$sql = "SELECT titles, links FROM files";
$result = mysqli_query($db, $sql);
$value = -1;

// Check if there are rows in the result
if (mysqli_num_rows($result) > 0) {
   
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Print the "titles" column
            echo '<a href="' . htmlspecialchars($row['links']) . '">' . htmlspecialchars($row['titles']) . '</a><br>';
            echo '<hr>';
        }
            /* echo "<hr>"; // Add a separator between rows */
        
    }    
    } else {
        echo "No data found.";
    }


// Close the database connection
$db->close();
?>
