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
    <link rel="stylesheet" href="style.css" crossorigin="anonymous">
    <script src="js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/app.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Üye Ol</title>
</head>
<body>


<div class="modal fade" id="uyelik" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header ">
            
                <h5 class="modal-title text-center" id="exampleModalLongTitle">ÜYE OL</h5>
            </div>
                <br>
                <div class="card-body">
                    <form  method="post" name="dsadasda" id="uyelik_form">
                    <div class="form-label-group">
                        <label for="adsoyad">Ad Soyad</label>
                        <input type="text" name="ad_soyad" class="form-control" id="ad_soyad" placeholder="Ad Soyad" required autofocus>
                    </div>
                    <br>

                    <div class="form-label-group">
                        <label for="inputEmail">E-Posta</label>
                        <input type="text" name="eposta" class="form-control" id="eposta" placeholder="E-Posta" required autofocus>
                    </div>
                    <br>

                    <div class="form-label-group">
                        <label for="tcno">TC Kimlik Numarası</label>
                        <input type="text" name="tc_no" class="form-control" id="tc_no" placeholder="TC Kimlik Numarası" required autofocus>
                    </div>

                    <br>
                    <div class="form-label-group">
                        <label for="cinsiyet">Cinsiyet</label>
                        <br>
                        <label for="erkek">Erkek</label>
                        <input type="radio" id="cinsiyet" name="cinsiyet" value="E">
                        <br>
                        <label for="kadin">Kadın</label>
                        <input type="radio" id="cinsiyet" name="cinsiyet" value="K">
                        </div>
                    <br>

                    <div class="form-label-group">
                        <label for="tcno">Telefon Numarası</label>
                        <input type="text" name="tel_no" class="form-control" id="tel_no" placeholder="Telefon Numarası" required autofocus>
                    </div>
                    <br>

                    <div class="form-label-group">
                        <label for="inputPassword">Şifre</label>
                        <input type="password" name="sifre" class="form-control" id="sifre" placeholder="Şifre">              
                    </div>
                        <br>
                        <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" id="uye_btn" value="Üye Ol">
                </form>
                </div>
        </div>
    </div>
</div>
<?php





require_once("baglan.php");

if(isset($_POST['ad_soyad']))
{

       $ad_soyad=$_POST['ad_soyad'];
       $eposta = $_POST['eposta'];
       $cinsiyet=$_POST['cinsiyet'];
       $tc_no=$_POST['tc_no'];
       $tel_no=$_POST['tel_no'];
       $sifre=$_POST['sifre'];
   
       if( !$eposta|| !$sifre || !$ad_soyad || !$cinsiyet || !$tc_no || !$tel_no)
       {
            echo "<script>alert('Boş Geçilemez');</script>"; 
       }
   
       else
       {

   
           $sorgu = $db->prepare("INSERT INTO kullanici(ad_soyad,eposta,cinsiyet,tc_no,tel_no,sifre) VALUES(?,?,?,?,?,?)");
           $sorgu->bindParam(1, $ad_soyad, PDO::PARAM_STR);
           $sorgu->bindParam(2, $eposta, PDO::PARAM_STR);
           $sorgu->bindParam(3, $cinsiyet, PDO::PARAM_STR);
           $sorgu->bindParam(4, $tc_no, PDO::PARAM_STR);
           $sorgu->bindParam(5, $tel_no, PDO::PARAM_STR);
           $sorgu->bindParam(6, $sifre, PDO::PARAM_STR);
           
           //$sorgu->bindParam(4, $_SESSION['user_id']);
          // $sorgu->execute();
   
           if($sorgu->execute())
           {
                echo "<script>alert('Kaydınız Başarılı!');</script>"; 
                //header("Location: index.php");
                header("Refresh: 3; url=index.php");
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






<!--
    <div class="container d-flex justify-content-center">
    <div class="card " style="width:50%;">
        <div class="card-body">
                
        </div>
    </div>
</div>

-->