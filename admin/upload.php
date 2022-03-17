<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesA.css">
    <link rel="stylesheet" href="./includes/styles.css">
    <title>Upload</title>
</head>
<body class="innerB">
    <?php include('./includes/sideNav.php') ?>
    <!-- Form Box -->
    <span class="upLF" id="formBox">
    <span class="fFH"><p>Upload</p></span>
        <form class="" action="./includes/uploadP.php" method="POST" enctype="multipart/form-data">
            <label for="name">name</label>
            <input type="text" name="name" id="name" required>
            <label for="websiteurl">websiteurl</label>
            <input type="text" name="websiteurl" id="websiteurl" required>
            <label for="descr">descr</label>
            <input type="text" name="descr" id="descr">
            <label for="file">Select an image to upload:</label>
            <input type="file" name="file" id="file">
            <input type="submit" name="fileUp" value="Upload">
        </form>
    </span>

            <!-- List of current post (View/Delete area) -->
    <div class="upLF">
        <span class="uDH">
            <?php
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $sql = new mysqli('localhost', 'root', '', 'stsloan');
            $query = "SELECT * FROM portfolio";
            $result = $sql->query($query);
            if (!$sql) {
                echo '<h1>Error Connecting: %s\n ' . mysqli_connect_error() .'</h1>';
                exit();
            } else {
                while ($row = $result->fetch_assoc()) {
                    $value = '<h4>IMG#' . $row['id'] .': <a target="_NewTab" href="./includes/imgs/'.$row['imgurl'].'">' . $row['imgurl'] .'</a></h4>';
                    echo $value;
                }

                
            }
            
            ?>
        </span>
    </div>

    <span class="upLF">

    
    </span>
<!--
<div class="upLF">
        <?php
        /*
        $sql = new mysqli('localhost', 'root', '', 'stsloan');
        $result = $sql->query("SELECT * FROM portfolio");
        $row = mysqli_fetch_assoc($result);
        if (!$sql) {
            echo '<h1>Error Connecting: %s\n ' . mysqli_connect_error() .'</h1>';
            exit();
        } else {
            echo '<h4>IMG#' . $row['id'] .': ' . $row['imgurl'] . '</h1>';
        }
        */
        ?>
</div>
-->
</body>
</html>