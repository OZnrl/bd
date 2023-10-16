<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="upload.js"></script>
    <script src="progressbarTest.js"></script>
    <script src="uploadMenu.js"></script>

    <title>Document</title>
</head>
<body id="body">
    <nav id="nav">
        <div id="buttonsContainer">
            <button class="navButton">home</button>
            <a href="library.php"><button class="navButton">library</button></a>
            <button class="navButton">notes</button>
            <button class="navButton">settings</button>
        </div>
    </nav>

    <form id="uploadForm" enctype="multipart/form-data" method="post">
    <label for="uploadButton" class="uploadLable" id="uploadLable">
        <input style="display: none;" type="button" id="uploadButton" value="x">
        <span>upload</span>
    </label>    

        <div class="uploadMenu" id="uploadMenu">

            <div id="inputLable" class="hide">
                <label for="file1" class="inputLable">
                    <span id="selectFile">Select File</span>
                </label>
            </div>

            <input type="file" name="file1" id="file1" onchange="uploadFile()"><br>
            <progress id="progressBar" value="0" max="100" style="transition-duration:800ms; max-width: 300px; width: 70vw; min-width: 1px;"></progress>
            <h3 id="status"></h3>
            <p id="amountLoaded" class="hide"></p>
        </div>
    
    </form>

    <div id="listingContainer">
        <div id="recentBooks">recentBooks
            <ul style="padding-left: 10px">
                <?php
                include('listBooks.php');
                ?>
            </ul>
        </div>
        <div id="recentVideos">recentVideos
        <ul style="padding-left: 10px">
                <?php
                include('listVideos.php');
                ?>
            </ul>
        </div>
        <div id="bookNotes">bookNotes</div>
        <div id="videoNotes">videoNotes</div>
    </div>

    
</body>
</html>
