<?php ob_start(); 
//error_reporting(0);
?> 

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <title>Seferler</title>
</head>
<body>
<?php
include('yonetim_menu.php');
include('baglan.php');
?>

<div class="container d-flex justify-content-center">
    <div class="card" style="width:50%;">
        <div class="card-body">
        <div class="card-title bg-light text-dark">
            <h1 class="modal-title text-center" id="exampleModalLongTitle">SEFER</h1>
        </div>
         <form  method="post" id="sefer_form">
                        <div class="form-label-group">
                            <label for="kalkis">Kalkış Yeri</label>
                            <select name="kalkis" id="kalkis" class="form-select form-select-lg mb-3">
                           
                            <?php
                                $sorgu =$db->prepare("SELECT * FROM duraklar");
                                $sorgu->execute();
                                $count = $sorgu->rowCount();
                                if ($sorgu->rowCount() > 0)
                                {
                                    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC))
                                    {
                                        $id = $sonuc['durak_id']; 
                                        $durak = $sonuc['adi'];
                                        echo "<option value=".$id.">".$durak."</option>";  
                        
                                }                        
                                     ?> 
                                       
                                </select>
                                
                                <?php
                                    }
                                    ?>  
                        </div>
                        <div class="form-label-group">
                            <label for="varis">Varış Yeri</label>
                            <select name="varis" id="varis" class="form-select form-select-lg mb-3">
                            <?php
                                $sorgu =$db->prepare("SELECT * FROM duraklar");
                                $sorgu->execute();
                                $count = $sorgu->rowCount();
                                if ($sorgu->rowCount() > 0)
                                {
                                    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC))
                                    {                               
                                        $id = $sonuc['durak_id']; 
                                        $durak = $sonuc['adi'];
                                        echo "<option value=".$id.">".$durak."</option>";   
                                }                        
                                     ?> 
                                       
                                </select>
                                
                                <?php
                                    }
                                    ?>  
                        </div>
                        <br>
                        <div class="form-label-group">
                            <label for="inputEmail">Kalkış Tarihi</label>
                            <input type="datetime-local" class="form-control" name="k_tarih" id="k_tarih" value="2021-01-12T19:30"
                            min="2021-00-07T00:00" max="2021-12-14T00:00" required autofocus>     
                        </div>
                        <br>
                        <div class="form-label-group">
                            <label for="date">Varış Tarihi</label>
                            <input type="datetime-local" class="form-control" name="v_tarih" id="v_tarih" value="2021-01-12T19:30"
                            min="2021-00-07T00:00" max="2021-12-14T00:00" required autofocus>     
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
                            <label for="sorumlu">Personel</label>
                            <select name="sorumlu" id="sorumlu" class="form-select form-select-lg mb-3">
                            <?php
                                $sorgu =$db->prepare("SELECT * FROM sorumlu");
                                $sorgu->execute();
                                $count = $sorgu->rowCount();
                                if ($sorgu->rowCount() > 0)
                                {
                                    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC))
                                    {
                                       
                                        $id = $sonuc['id']; 
                                        $s_adi = $sonuc['sofor_adi'];
                                        //$s_adi2  $sonuc['sofor_adi'];
                                        //$d_muavin = $sonuc['d_muavin'];
                                        echo "<option value=".$id.">".$s_adi."</option>";   
                                  
                                }                        
                                     ?> 
                                </select>
                                <?php
                                    }
                                    ?>  

                        </div>
                        <div class="form-label-group">
                            <label for="otobus">Otobüs</label>
                            <select name="otobus" id="otobus" class="form-select form-select-lg mb-3">
                            <?php
                                $sorgu =$db->prepare("SELECT * FROM otobusler");
                                $sorgu->execute();
                                $count = $sorgu->rowCount();
                                if ($sorgu->rowCount() > 0)
                                {
                                    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC))
                                    {
                                                                   
                                        $id = $sonuc['id']; 
                                        $otobus = $sonuc['marka_model'];
                                        $tip =  $sonuc['tipi'];                                       
                                        $plaka = $sonuc['plaka'];
                                        echo "<option value=".$id.">".$otobus." ".$tip." ".$plaka." </option>";   
                                         
                                }                        
                                     ?> 
                                     
                                </select>
                                <?php
                                    }
                                    ?>  

                        </div>
                        <br>
                        <div class="form-label-group">
                            <label for="fiyat">Fiyat</label>
                            <input type="text" name="fiyat" id="fiyat"  class="form-control"  placeholder="Fiyat" required autofocus>
                        </div>
                        <br>

                        <div class="form-label-group">
                            <label for="guzergah">Güzergah Durakları</label>
                            <select name="guzergah" id="guzergah" class="form-select form-select-lg mb-3">
                            <?php
                                $sorgu =$db->prepare("SELECT * FROM guzergah");
                                $sorgu->execute();
                                $count = $sorgu->rowCount();
                                if ($sorgu->rowCount() > 0)
                                {
                                    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC))
                                    {
                                                                   
                                        $id = $sonuc['id']; 
                                        $guzergah = $sonuc['guzergah_adi'];
                                        echo "<option value=".$id.">".$guzergah."</option>";
                                }                        
                                     ?> 
                                     
                                </select>
                                <?php
                                    }
                                    ?>  

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
    $kalkis=$_POST['kalkis'];
    $varis = $_POST['varis'];
    $k_tarih=$_POST['k_tarih'];
    $v_tarih=$_POST['v_tarih'];
    $firma=$_POST['firma'];
    $fiyat=$_POST['fiyat'];
    $otobus=$_POST['otobus'];
    $guzergah=$_POST['guzergah'];
    $sorumlu=$_POST['sorumlu'];
    

       if( !$kalkis|| !$varis || !$k_tarih || !$v_tarih || !$fiyat)
       {
            echo "<script>alert('Boş Geçilemez');</script>"; 
       }
   
       else
       {

           $sorgu = $db->prepare("INSERT INTO seferler(kalkis,varis,k_tarih,v_tarih,fiyat,firma_id,guzergah_id,otobus_id,sorumlu_id) VALUES(?,?,?,?,?,?,?,?,?)");
           $sorgu->bindParam(1, $kalkis, PDO::PARAM_STR);
           $sorgu->bindParam(2, $varis, PDO::PARAM_INT);
           $sorgu->bindParam(3, $k_tarih, PDO::PARAM_STR);
           $sorgu->bindParam(4, $v_tarih, PDO::PARAM_STR);
           $sorgu->bindParam(5, $fiyat, PDO::PARAM_STR);
           $sorgu->bindParam(6, $firma, PDO::PARAM_STR);
           $sorgu->bindParam(7, $guzergah, PDO::PARAM_STR);
           $sorgu->bindParam(8, $otobus, PDO::PARAM_STR);
           $sorgu->bindParam(9, $sorumlu, PDO::PARAM_STR);


           
           //$sorgu->bindParam(4, $_SESSION['user_id']);
          // $sorgu->execute();
   
           if($sorgu->execute())
           {
              
               echo "<script>alert('Sefer Kaydı Başarılı!');</script>"; 
               //header('location:yonetim.php');
               header("Refresh:1 ;url=yonetim.php");
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