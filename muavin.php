<?php ob_start(); 
error_reporting(0);
?> 
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
    <title>Personel</title>
</head>
<body>
<?php
require_once('baglan.php');
include('yonetim_menu.php');
?>
    
    <div class="container d-flex justify-content-center">
    <div class="card " style="width:50%;">
        <div class="card-body">
        <div class="card-title bg-light text-dark">
            <h1 class="modal-title text-center" id="exampleModalLongTitle">MUAVİN EKLE</h1>
        </div>
         <form  method="post" id="personel_form">
                        <div class="form-label-group">
                            <label for="adsoyad">1.Muavin Adı Soyadı</label>
                            <input type="text" name="m_adi" class="form-control" id="m_adi" placeholder="Muavin Adı" required autofocus>
                            <br>
                            <label for="adsoyad">2.Muavin Adı Soyadı</label>
                            <input type="text" name="d_adi" class="form-control" id="d_adi" placeholder="2.Muavin Adı" required autofocus>
                        </div>
                        <br>

                            <br>
                            <input type="submit" class="btn btn-lg btn-secondary btn-block text-uppercase" id="otobus_btn" value="Kaydet">
                    </form>
        </div>
    </div>
</div>
<?php


if($_POST)
{
    $m_adi=$_POST['m_adi'];
    $d_adi = $_POST['d_adi'];
    

       if( !$d_adi|| !$m_adi)
       {
            echo "<script>alert('Boş Geçilemez');</script>"; 
       }
   
       else
       {

   
           $sorgu = $db->prepare("INSERT INTO muavin(a_muavin,d_muavin) VALUES(?,?)");
           $sorgu->bindParam(1, $m_adi, PDO::PARAM_STR);
           $sorgu->bindParam(2, $d_adi, PDO::PARAM_STR);
       
           
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
