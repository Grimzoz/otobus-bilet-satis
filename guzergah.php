<?php
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
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
    <title>Güzergah Ekle</title>
</head>
<body>
<?php
include('yonetim_menu.php');
include('baglan.php');   

?>
<div class="container d-flex justify-content-center">
    <div class="card " style="width:50%;">
        <div class="card-body">
        <div class="card-title bg-light text-dark">
            <h1 class="modal-title text-center" id="exampleModalLongTitle">GÜZERGAH</h1>
        </div>
         <form  method="post" id="otobus_form">
             
        <div class="form-label-group">
            <label for="adsoyad">Güzergah Sayısı</label>
            <input type="text" name="g_sayi" id="g_sayi" class="form-control" id="marka_model"  autofocus>
            <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" value="Sayı Ekle">            
        </div>
        <br>

         <?php

         $sorgu =$db->prepare("SELECT * FROM duraklar");
         $sorgu->execute();
         $g_sayi = $_POST['g_sayi'];
        ?> <input type="hidden" name="count" value=<?php echo $g_sayi?>>
        <?php 
         $count = $sorgu->rowCount();
         if ($sorgu->rowCount() > 0)
         {
           
            for($i = 1; $i <= $g_sayi; $i++)
            {   

                ?>
                <select class="form-select form-select-lg mb-3" name="guzergah-<?php echo $i?>" id="guzergah-<?php echo $i ?>" aria-label=".form-select-sm example" style="width :100%;">
                   
                <?php
                
                    $sorgu =$db->prepare("SELECT * FROM duraklar");
                    $sorgu->execute();
                    $count = $sorgu->rowCount();
                    if ($sorgu->rowCount() > 0)
                        {
                            while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC))
                            {
                                //$dizi = array($sonuc);
                                $id = $sonuc['durak_id']; 
                                $durak = $sonuc['adi'];
                                echo "<option value=".$durak.">".$durak."</option>"; 
                               
                            }         
    
                   
                ?> 
                                       
                </select>

                 
                <?php
             }
        }
    }
        
    ?> 
                   
        <input type="submit" class="btn btn-lg btn-secondary btn-block text-uppercase" id="g_kaydet" name="g_kaydet" value="Kaydet">
        </form>
        </div>
    </div>
</div>


<?php

if(isset($_POST["g_kaydet"]))
{
    $guzergah="";
    for($i=1;$i<=$_POST['count'];$i++){
      
      $guzergah.=$_POST['guzergah-'.$i]." - ";
     
    }
   
        //$guzergah=$_POST['guzergah'];

           $sorgu = $db->prepare("INSERT INTO guzergah(guzergah_adi) VALUES(?)");
           $sorgu->bindParam(1, $guzergah, PDO::PARAM_STR);
          
           if($sorgu->execute())
           {
               
              
               echo "<script>alert('Güzergah Kaydı Başarılı!');</script>"; 
               //header('location:yonetim.php');
               //header("Refresh:1 ;url=yonetim.php");
           }
           else
           {
        
            echo "<script>alert('Kayıt Başarısız!');</script>"; 
           }
   
}

?>



</body>
</html>