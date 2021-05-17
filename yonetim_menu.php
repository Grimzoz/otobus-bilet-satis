<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="y_style.css" crossorigin="anonymous">
    <script src="js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/app.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  
</body>
</html>
<?php
require_once('baglan.php');
?>
<div class="nav-side-menu">
      <div class="brand fa fa-tachometer"> YÖNETİM PANELİ</div>
      <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
          <div class="menu-list">
             
              <ul id="menu-content" class="menu-content collapse out">
               <li  data-toggle="collapse" data-target="#products" class="collapsed">
                
                <li>
                    <a href="yonetim.php" >
                    <i class="fa fa-home"></i>Panel</a>
                  </li>

                  <li>
                    <a href="seferler.php" >
                    <i class="fa fa-map-marker"></i>Seferler</a>
                  </li>
                  <li>
                    <a href="tum_bilet.php" >
                    <i class="fa fa-ticket"></i>Biletler</a>
                  </li>

                 <!-- <li  data-toggle="collapse" data-target="#products" class="collapsed">
                    <a href="hareketler.php"><i class="fa fa-compass fa-lg"></i> Güzergah</a>
                  </li>-->
                  
                  <li data-toggle="collapse" data-target="#service" class="collapsed">
                    <a href="otobus.php"><i class="fa fa-bus fa-lg"></i> Otobüsler</a>
                      
                  </li>  

                  <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="guzergah.php"><i class="fa fa-compass fa-lg"></i> Güzergah</a>
                   
                  </li>

                  <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="personel.php"><i class="fa fa-users fa-lg"></i> Personel</a>
                  </li>
                  <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="muavin.php"><i class="fa fa-users fa-lg"></i> Muavin</a>
                  </li>
                  
                <li>
                <a href="index.php">
                    <i class="fa fa-sign-out fa-lg" id="cikis" name="cikis"></i> Anasayfaya Dön
                </a>
                </li>
              </ul>

              
      </div>
  </div>
  </div>

    