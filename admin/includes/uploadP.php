<?php
#Reminder to intergrate session() data after the login is added.
#Reminder to learn more about Salt&Pepper Encrytion (JS).

# Variables For Connection Info
$ip = 'localhost';
$un = 'root';
$pw = '';
$db = 'stsloan';

# Variables For Grabbing Table Data
$sqlConnect = new mysqli($ip, $un, $pw, $db);
$request = $sqlConnect->query("SELECT * FROM portfolio");
$row = mysqli_fetch_assoc($request);

# Form Table Input
# Update to && !session() user after login is added
    if (!$sqlConnect) {
        printf('DB error: ' . mysqli_connect_error() . '');
        exit(0);
    } else {
# Post Data Variables
    $postDataVarName = $_POST["name"];
    $postDataVarWebsiteUrl = $_POST["websiteurl"];
    #$postDataVarImgUrl = $_POST['file'];
    $postDataVarDescription = $_POST["descr"];
    $targetDir = "./imgs/";
    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

#Image Handler for MySQL
    $statusMsg = 'asdasd';
    if(isset($_POST['fileUp']) && !empty($_FILES['file']['name'])) {

        $acceptedFileTypes = array('jpg','png','jpeg','gif','pdf');

        if(in_array(strtolower($fileType), $acceptedFileTypes)) {
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $sqlConnect->query("INSERT INTO portfolio (name, websiteurl, imgurl, descr) VALUES ('" . $_POST['name'] ."', '" . $_POST['websiteurl'] ."', '".$fileName."', '" . $_POST['descr'] ."')");
                if($insert) {
                    #echo '<h1> Name: ' . $postDataVarName . '</h1>';
                    #echo '<h1> websiteurl: ' . $postDataVarWebsiteUrl . '</h1>';
                    #echo '<h1> imgurl: ' . $fileName . '</h1>';
                    #echo '<h1> descr: ' . $postDataVarDescription . '</h1>';
                    #sleep(5);
                    #exit;
                } else {
                    $statusMsg = "File upload failed, please try again.";
                }
            
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }

        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
        # Import the rest of the data
        $query = "INSERT INTO portfolio (name, websiteurl, descr) VALUES ('" . $_POST['name'] ."', '" . $_POST['websiteurl'] ."', '" . $_POST['descr'] ."')";
        if(!$sqlConnect->query($query)) {
        printf('Failed: ' . mysqli_connect_error() .'');
    }
    }
    if(!$statusMsg = '') {
        header('Location: http://localhost/stsloan.com/admin/upload.php');
        
    } else {
        echo $statusMsg;
    }

}

?>