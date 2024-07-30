<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="addfilmstyle.css">
    <title>Document</title>
</head>
<body>
    <div class="p">
        <div class="nav">
            <div class="center">
                <div class="n">Film Kabyle</div>
                <div class="n">Film Algerien</div>
            </div>
        </div>
       </div>
       <div >
        <br>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="">id : </label>
            <input type="text" name="id" id="elid">
            <br>
            <label for="">nom du film : </label>
            <input type="text" name="name" id="name">
            <br>
            <label for="">le lien : </label>
            <input type="text" name="lien" id="lien">
            <br>
            <label for="type">type (A/K): </label>
            <input type="text" name="type" id="type">
            <br>
            Select an image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="submit" name="submit">
        </form>
       </div>

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


    $sql="INSERT INTO `kabylemovie`
          VALUES ('$elid','$type','$name','$lien')";

    $id->exec($sql);
        




 }
    


?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>