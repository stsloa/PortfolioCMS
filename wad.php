<?php 
include('./includes/db.php');

?>
<!DOCTYPE html>
<head>
    <title>Websites Developed</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>



<html>
    <?php
    include('./includes/header.php');
    ?>
    <body>
    <div class='box'>
    <?php
    #code that shows project containers
        
        $mysqli = new mysqli('localhost', 'root', '', 'stsloan');
        $searches = "SELECT id, imgurl FROM portfolio ORDER BY id, imgurl";
        $results = $mysqli->query($searches);

        if(!$mysqli) {
            echo 'Nah';
        } else {

            while($row = $results->fetch_assoc()) {
                $ids = $row["id"];
                $testers = "
                <a href='http://localhost/stsloan.com/wadp.php?id=".$ids."'; class='ibox bg'>
                <img src='http://localhost/stsloan.com/admin/includes/imgs/".$row["imgurl"]."'/>
                <style>
                .bg{
                    background-color: none !important;
                    width: inherent;
                    height: inherent;
                    background-size: contain; 
                    background-repeat: no-repeat;
                    background-position: center;
                }

                .bg img {
                    width: inherent;
                    height: inherent;
                }
            </style>
                </a>";
                echo $testers;
            }
        }
    ?>
    </div>
    <!--
        <div class="box">
            <span onclick="window.location='wadp.php'" style="background: url('./imgs/bss.png'); background-size: contain; background-repeat: no-repeat; background-position: center;" class="ibox">
                <div class="iboxHov">
                    <h1>test</h1>
                </div>
            </span>
            <span class="ibox">
                
            </span>
            <span class="ibox">
                
            </span>
        </div>
        <div class="box">
            <div class="ibox">
            </div>
            <div class="ibox">
                    
            </div>
            <div class="ibox">
                    
            </div>
        </div>
        <div class="box">
            <div class="ibox">
                    
            </div>
            <div class="ibox">
                            
            </div>
            <div class="ibox">
                        
            </div>
        </div>
-->
    </body>
</html>