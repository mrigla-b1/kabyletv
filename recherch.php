<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
		<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
    <title>Recherche</title>
</head>
<body>
<div class="p">
    <div class="nav">
       <!-- <div class="center">
        <div class="n" onclick="window.location.href ='index.php'"> Acceuil</div>
        <div class="n" onclick="window.location.href ='FilmKabyle.php'"> Film Kabyle</div>
        <div class="n" onclick="window.location.href ='FilmAlgerien.php'">Film Algerien</div>
        <div class="n">
       <form action="" method="post">
        <input type="text" name="valuesh" id="value" placeholder="sherch">
        <input type="submit" value="sherch" name="sherch">
        </form>
        </div>-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
 <a class="navbar-brand" href="#">
      <img src="image/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top" style="width: 55px;height: 55px">
      
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil  <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="FilmKabyle.php">Film Kabyle</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link disabled" href="FilmAlgerien.php">Film Algerien</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="valuesh">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="sherch">Search</button>
    </form>
  </div>
</nav>
    </div>
   
    </div>
    <div class="body">
    

       <?php
        if(isset($_POST['sherch'])){
                
$u="kabyletv";
        $pwd="mouh2626";
        $dd="kabyletv_webmovie";
        $ch="mysql:host=mysql-kabyletv.alwaysdata.net;dbname=$dd";
        $id=new PDO ($ch,$u,$pwd);
        $aa=$_POST["valuesh"];
        $k='%'.$aa.'%';

        
        $sql="SELECT * FROM kabylemovie where name like '%" . $aa . "%'";
        $req= $id->prepare($sql);
        $e=$req->execute(); 
        if(!$e)	{
            echo "la requete a echouer ";  }
           
        while ( $enreg= $req->fetch() ) {
            $elid=$enreg['id'];
            $category=$enreg['category'];
            $name=$enreg['name'];
            $namev = str_replace("!", "'", $name);
            $img=$enreg['image'];
                
                echo '<div class="film" onclick="window.location.href =`film.php?id='. $elid .'`"><div class="img"><img src="'. $img .'" alt="image/atdawuzru.jpg"></div><div class="name">'.$namev.'</div></div>';
        }         


        }

       else{
        $u="root";
        $pwd="";
        $dd="webmovie";
        $ch="mysql:host=localhost;dbname=$dd";
        $id=new PDO ($ch,$u,$pwd);


        $sql="SELECT * FROM kabylemovie";
        $req= $id->prepare($sql);
        $e=$req->execute(); 
        if(!$e)	{
            echo "la requete a echouer ";  }
           $k=0;
        while ( $enreg= $req->fetch() ) {
            $elid=$enreg['id'];
            $category=$enreg['category'];
            $name=$enreg['name'];
            $namev = str_replace("!", "'", $name);
            $img=$enreg['image'];
            if($k!=0){
              echo '<div class="film" onclick="window.location.href =`film.php?id='. $elid .'`"><div class="img"><img src="'. $img .'" alt="walou"></div><div class="name">'.$namev.'</div></div>';
              }
                else{
                echo '<div class="film f1" onclick="window.location.href =`film.php?id='. $elid .'`"><div class="img"><img src="'. $img .'" alt="image/atdawuzru.jpg"></div><div class="name">'.$namev.'</div></div>';
        }  
         }    

       }
		echo "<div class='fin'></div>";
       
       ?>
       

    </div>

</div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




</body>
</html>