<?php ob_start(); 
error_reporting(0);
?> 

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    
    <title>Otobüs</title>
</head>
<body>
<?php
include('yonetim_menu.php');
?>
<div class="container d-flex justify-content-center">
    <div class="card " style="width:50%;">
        <div class="card-body">
        <div class="card-title bg-light text-dark">
            <h1 class="modal-title text-center" id="exampleModalLongTitle">OTOBÜSLER</h1>
        </div>
        
         <form  method="post" id="otobus_form">
                        <div class="form-label-group">
                            <label for="adsoyad">Marka Model</label>
                            <input type="text" name="marka_model" class="form-control" id="marka_model" placeholder="Marka Model" required autofocus>
                        </div>
                        <br>

                        <div class="form-label-group">
                            <label for="inputEmail">Cıkış Yılı</label>
                            <input type="text" name="cikis_yili" class="form-control" id="cikis_yili" placeholder="Cıkış Yılı" required autofocus>
                        </div>
                        <br>

                        <div class="form-label-group">
                            <label for="tipi">Otobüs Tipi</label>
                            <br>
                            <label for="2+1">2+1</label>
                                <input type="radio" id="tipi" name="tipi" value="2+1">
                            <br>
                            <label for="kadin">2+2</label>
                                <input type="radio" id="tipi" name="tipi" value="2+2">
                        </div>
                        <br>
                        
                        <div class="form-label-group">
                            <label for="tcno">Kapasite</label>
                            <input type="text" name="kapasite" class="form-control" id="kapasite" placeholder="Kapasite" required autofocus>
                        </div>
                        <br>

                        <div class="form-label-group">
                            <label for="tcno">Plaka</label>
                            <input type="text" name="plaka" class="form-control" id="plaka" placeholder="Plaka" required autofocus>
                        </div>
                        <br>
                        
                            <br>
                            <input type="submit" class="btn btn-lg btn-secondary btn-block text-uppercase" id="otobus_btn" value="Kaydet">
                    </form>
        </div>
    </div>
</div>
<?php

require_once("baglan.php");

if($_POST)
{
    $marka_model=$_POST['marka_model'];
    $cikis_yili = $_POST['cikis_yili'];
    $tipi=$_POST['tipi'];
    $kapasite=$_POST['kapasite'];
    $plaka=$_POST['plaka'];

       if( !$marka_model|| !$cikis_yili || !$tipi || !$kapasite || !$plaka)
       {
            echo "<script>alert('Boş Geçilemez');</script>"; 
       }
   
       else
       {

   
           $sorgu = $db->prepare("INSERT INTO otobusler(marka_model,cikis_yili,tipi,kapasite,plaka) VALUES(?,?,?,?,?)");
           $sorgu->bindParam(1, $marka_model, PDO::PARAM_STR);
           $sorgu->bindParam(2, $cikis_yili, PDO::PARAM_INT);
           $sorgu->bindParam(3, $tipi, PDO::PARAM_STR);
           $sorgu->bindParam(4, $kapasite, PDO::PARAM_STR);
           $sorgu->bindParam(5, $plaka, PDO::PARAM_STR);

           
           //$sorgu->bindParam(4, $_SESSION['user_id']);
          // $sorgu->execute();
   
           if($sorgu->execute())
           {
              
               echo "<script>alert('Kaydınız Başarılı!');</script>"; 
              // header('location:index.php');
               header("Refresh:1 ; url=yonetim.php");
           }
           else
           {
        
            echo "<script>alert('Kayıt Başarısız!');</script>"; 
           }
        }
}






?>
</body>
</html>
<?php 
ob_flush();
 ?>   
