<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'braindb');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the file name from the uploaded file
    $file_name = $_FILES['file']['name'];

    // Define the directory where you want to store uploaded files
    $upload_dir = "Files/";

    $success = move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $file_name);

    // Check if the file has been uploaded successfully
    if ($success) {
        // Check if a record with the same file name exists in the database
        $check_sql = "SELECT * FROM files WHERE titles = '$file_name'";
        $check_result = mysqli_query($db, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // If a record with the same file name exists, update the existing row
            $update_sql = "UPDATE files SET titles = '$file_name' WHERE titles = '$file_name'";
            $update_result = mysqli_query($db, $update_sql);

            if ($update_result) {
                header("Location: home.html.php
                 
                  ");
                exit;
            } else {
                echo 'Error updating record: ' . mysqli_error($db);
            }
        } else {
            // If no record with the same file name exists, insert a new row
            $file_links = "Files/$file_name";
            $insert_title = "INSERT INTO files (titles, links) VALUES ('$file_name', '$file_links')";
            $insert_result = mysqli_query($db, $insert_title);

            if ($insert_result) {
                header("Location: home.html.php");
                exit;
            } else {
                echo 'Error inserting record: ' . mysqli_error($db);
            }
        }
    } else {
        echo 'Error uploading file.';
    }
}

// Fetch all filenames from the database
$sql = "SELECT titles FROM files";
$result = mysqli_query($db, $sql);

// Check if there are rows in the result
if (mysqli_num_rows($result) > 0) {
    echo '<ul>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<li>' . htmlspecialchars($row['titles']) . '</li>';
    }
    echo '</ul>';
} else {
    echo 'No files found.';
}

// Close the database connection
$db->close();
?>
