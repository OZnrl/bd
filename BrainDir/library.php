<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body id="body">
    <nav id="nav">
        <div id="buttonsContainer">
            <a href="home.html.php"><button class="navButton">home</button></a>
            <a href="library.html.php"><button class="navButton">library</button></a>
            <button class="navButton">notes</button>
            <button class="navButton">settings</button>
        </div>
    </nav>
    
     
            <ul style="padding-left: 10px">
                <?php
                include('libraryList.php');
                ?>
            </ul>
        </div>

    
</body>
</html>
