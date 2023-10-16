<?php
$db = new mysqli('localhost', 'root', '', 'braindb');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file1'])) {
        $file = $_FILES['file1'];
        $uploadDirectory = 'Files/';
        $file_name = $file['name'];
        if ($file['error'] === 0) {
            $destination = $uploadDirectory . $file['name'];
            move_uploaded_file($file['tmp_name'], $destination);
            echo 'File uploaded successfully.';
        $check_sql = "SELECT * FROM files WHERE titles = '$file_name'";
        $check_result = mysqli_query($db, $check_sql);
        if (mysqli_num_rows($check_result) > 0) {
            $update_sql = "UPDATE files SET titles = '$file_name' WHERE titles = '$file_name'";
            $update_result = mysqli_query($db, $update_sql);
            if ($update_result) {
                echo 'upload succesful'; 
                exit;
            } else {
                echo 'Error updating record: ' . mysqli_error($db);
            }
        } else {
            $file_links = "Files/$file_name";
            $insert_title = "INSERT INTO files (titles, links) VALUES ('$file_name', '$file_links')";
            $insert_result = mysqli_query($db, $insert_title);
            if ($insert_result) {
                echo 'record inserted';
                exit;
            } else {
                echo 'Error inserting record: ' . mysqli_error($db);
            }
        }
    } else {
        echo 'Error uploading file.';
    }
        } else {
            echo 'File upload failed: ' . $file['error'];
        }
    } else {
        echo 'No file was uploaded.';
    }
$db->close();

?>


