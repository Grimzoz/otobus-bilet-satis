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
            <h1 class="modal-title text-center" id="exampleModalLongTitle">PERSONEL</h1>
        </div>
         <form  method="post" id="personel_form">
                        <div class="form-label-group">
                            <label for="adsoyad">Şoför Adı Soyadı</label>
                            <input type="text" name="s_adi" class="form-control" id="s_adi" placeholder="Şoför Adı" required autofocus>
                        </div>
                        <br>
                        <div class="form-label-group">
                            <label for="firma">Firma</label>
                            <select name="firma" id="firma" class="form-select form-select-lg mb-3">
                            <?php
                                $sorgu =$db->prepare("SELECT * FROM firmalar");
                                $sorgu->execute();
                                $count = $sorgu->rowCount();
                                if ($sorgu->rowCount() > 0)
                                {
                                    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC))
                                    {
                                                                   
                                        $id = $sonuc['id']; 
                                        $firma = $sonuc['firma_adi'];
                                        echo "<option value=".$id.">".$firma."</option>";   
                                  
                                }                        
                                     ?> 
                                </select>
                                <?php
                                    }
                                    ?>  

                        </div>
                        
                        <div class="form-label-group">
                            <label for="muavin">Muavin</label>
                            <select name="muavin" id="muavin" class="form-select form-select-lg mb-3">
                            <?php
                                $sorgu =$db->prepare("SELECT * FROM muavin");
                                $sorgu->execute();
                                $count = $sorgu->rowCount();
                                if ($sorgu->rowCount() > 0)
                                {
                                    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC))
                                    {
                                                                   
                                        $id = $sonuc['id']; 
                                        $muavin = $sonuc['a_muavin'];
                                        $d_muavin = $sonuc['d_muavin'];
                                        echo "<option value=".$id.">".$muavin." -- ".$d_muavin."</option>";   
                                  
                                }                        
                                     ?> 
                                </select>
                                <?php
                                    }
                                    ?>  

                        </div>

                        
                        
                            <br>
                            <input type="submit" class="btn btn-lg btn-secondary btn-block text-uppercase" id="otobus_btn" value="Kaydet">
                    </form>
        </div>
    </div>
</div>
<?php


if($_POST)
{
    $s_adi=$_POST['s_adi'];
    $firma = $_POST['firma'];
    $muavin=$_POST['muavin'];

       if( !$s_adi|| !$firma || !$muavin)
       {
            echo "<script>alert('Boş Geçilemez');</script>"; 
       }
   
       else
       {

   
           $sorgu = $db->prepare("INSERT INTO sorumlu(sofor_adi,firma_id,muavin_id) VALUES(?,?,?)");
           $sorgu->bindParam(1, $s_adi, PDO::PARAM_STR);
           $sorgu->bindParam(2, $firma, PDO::PARAM_INT);
           $sorgu->bindParam(3, $muavin, PDO::PARAM_STR);
    
           
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
