
<!DOCTYPE html>
<html lang="en">
    <?php include('./includes/header.php') ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <?php 
        include('./includes/db.php');

        $testId = $_GET['id'];

        $query = "SELECT name, websiteurl, imgurl, descr FROM portfolio where id = '$testId'";
        $results = $link->query($query);

        if(!$link) {
            echo 'error';
        } else if(mysqli_num_rows($results) > 0) {
            while($results = mysqli_fetch_assoc($results)) {
               echo "<div class='wadpC'>
            <div class='wadpWebImg'>
            <img src='http://localhost/stsloan.com/admin/includes/imgs/".$results["imgurl"]."'>
            </div>
            <div class='wadpTitle'>
                <h1>".$results["name"]."</h1>
                <div class='wadpSubtext'>
                    <p>".$results["descr"]."</p>
                </div>
            </div>
        </div>";
        exit;
            }
        } else {
            echo "nah";
        }

        echo "<p>ID = '".$testId."'</p>";

    ?>
<!-- 
    <div class="wadpC">
        <div class="wadpWebImg" style="background-image: url('./imgs/bss.PNG');">
        </div>
        <div class="wadpTitle">
            <h1>Title</h1>
            <div class="wadpSubtext">
                <p>Subtext</p>
            </div>
        </div>
    </div>
    -->
</body>
</html>
