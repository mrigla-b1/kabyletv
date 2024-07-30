<?php
 if (isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["lien"]) && !empty($_POST["lien"]) && ($_POST["type"]=="A" or $_POST["type"]=="K")){
    echo "<h1>oui</h1>";

    $u="kabyletv";
        $pwd="mouh2626";
        $dd="kabyletv_webmovie";
        $ch="mysql:host=mysql-kabyletv.alwaysdata.net;dbname=$dd";
        $id=new PDO ($ch,$u,$pwd);

    $name=$_POST["name"];
    $lien=$_POST["lien"];
    $type=$_POST["type"];
    $elid=$_POST["id"];


 

$targetDir = "image/";
$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size (adjust as needed)
if ($_FILES["fileToUpload"]["size"] > 5000000) { // 5MB
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
$allowedExtensions = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowedExtensions)) {
    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $image=htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));

    echo "ici $image";  

    $imagev="image/".$image;
    
    $lienv = str_replace('"', '!', $lien);
    $namev = str_replace("'", '!', $name);
    

    
    $sql="INSERT INTO `kabylemovie`
          VALUES ('$elid','$type','$namev','$lienv','$imagev')";

    $id->exec($sql);
}

}
else {

    echo "il ya un probleme reseyer";
}
?>
