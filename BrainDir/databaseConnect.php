<?php

$db = new mysqli('localhost', 'root', '', 'braindb');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if (isset($_POST['submit'])) {
    $file_name = $_FILES['file']['name'];
    $upload_dir = "Files/";
    $success = move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $file_name);
    if ($success) {
        $check_sql = "SELECT * FROM files WHERE titles = '$file_name'";
        $check_result = mysqli_query($db, $check_sql);
        if (mysqli_num_rows($check_result) > 0) {
            $update_sql = "UPDATE files SET titles = '$file_name' WHERE titles = '$file_name'";
            $update_result = mysqli_query($db, $update_sql);
            if ($update_result) {
                header("Location: home.html.php");
                exit;
            } else {
                echo 'Error updating record: ' . mysqli_error($db);
            }
        } else {
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
$sql = "SELECT titles FROM files";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    echo '<ul>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<li>' . htmlspecialchars($row['titles']) . '</li>';
    }
    echo '</ul>';
} else {
    echo 'No files found.';
}
$db->close();
?>
