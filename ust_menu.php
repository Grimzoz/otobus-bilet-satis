<?php
require_once('baglan.php');
$girisyap = $db->prepare("SELECT * FROM kullanici");
$girisyap->execute();
$count = $girisyap->rowCount();
$row  = $girisyap->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" crossorigin="anonymous">
  <script src="js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/app.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta charset="UTF-8">

</head>

<body>

  <div class="topnav" id="myTopnav">
    <a href="index.php"><i class="fa fa-home"></i> Anasayfa</a>
    <!--<a href="bilet.php"><i class="fa fa-ticket" aria-hidden="true"></i> Bilet Satın Al</a>-->

    <div class="d-flex justify-content-end">
      <?php
      if (isset($_SESSION['user_id'])) {
      ?>
        <a href="biletlerim.php"><i class="fa fa-ticket"></i>Biletlerim</a></li>
        <?php

        if ($_SESSION['rol'] == 'admin') {
        ?>
          <a href="yonetim.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Yönetim</a>
        <?php
        }
        ?>

        <a href="profil.php"><i class="fa fa-user"></i> <?php echo $_SESSION['ad'] ?></a></li>
        <a href="cikis.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Çıkış</a>
      <?php
      } else {
      ?>
        <a href="#" data-toggle="modal" data-target="#giris"><i class="fa fa-sign-in " aria-hidden="true"></i>Giriş</a>
        <a href="#" data-toggle="modal" data-target="#uyelik"><i class="fa fa-user"></i> Üye Ol</a>

      <?php
      }
      ?>
    </div>




    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>



  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>



</body>

</html>