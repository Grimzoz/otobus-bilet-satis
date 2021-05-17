<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Güncelle</title>
</head>
<body>
<?php
include('ust_menu.php');

$sorgu =$db->prepare("SELECT * FROM kullanici WHERE id=".(int)$_GET['id']);
$sorgu->execute();
$count = $sorgu->rowCount();
$sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);
?>
    
<div class="container d-flex justify-content-center">
    <div class="card " style="width:50%;">
        <div class="card-body">
         <form  method="post" id="guncelle_form">
                    
                        <div class="form-label-group">
                            <label for="adsoyad">Ad Soyad</label>
                            <input type="text" name="ad_soyad" class="form-control" id="ad_soyad" value="<?php echo $sonuc['ad_soyad'];?>" required autofocus> 
                        </div>  
                        <br>

                        <div class="form-label-group">
                            <label for="inputEmail">E-Posta</label>
                            <input type="text" name="eposta" class="form-control" id="eposta"  value="<?php echo $sonuc['eposta'];?>" required autofocus>
                        </div>
                        <br>

                        <div class="form-label-group">
                            <label for="tcno">Telefon Numarası</label>
                            <input type="text" name="tel_no" class="form-control" id="tel_no" value="<?php echo $sonuc['tel_no'];?>" required autofocus>
                        </div>
                        <br>

                        <div class="form-label-group">
                            <label for="inputPassword">Şifre</label>
                            <input type="password" name="sifre" class="form-control" id="sifre" value="<?php echo $sonuc['sifre'];?>">              
                        </div>
                            <br>
                            
                            <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" id="guncel_btn" value="Güncelle">
                    </form>
                
        </div>
    </div>
</div>

<?php


if($_POST)
{
    //$_SESSION['user_id']  = $row['id'];
    $id = $_SESSION['user_id'];
    $ad_soyad=$_POST['ad_soyad'];
    $eposta=$_POST['eposta'];
    $tel_no=$_POST['tel_no'];
    $sifre=$_POST['sifre'];

    if(!$ad_soyad|| !$eposta|| !$tel_no|| !$sifre)
    {
        echo "<script>alert('Boş Bırakılmış Alan!');</script>"; 
    }

    else
    {

        $sorgu = $db->prepare("UPDATE kullanici SET ad_soyad = ?, eposta = ?, tel_no= ? , sifre = ? WHERE id = ?");
        $sorgu->bindParam(1, $ad_soyad);
        $sorgu->bindParam(2, $eposta);
        $sorgu->bindParam(3, $tel_no);
        $sorgu->bindParam(4, $sifre);
        $sorgu->bindParam(5, $id);

        if($sorgu->execute())
        {
            echo "<script>alert('Güncelleme Başarılı!');</script>"; 
            header("Location: profil.php");
        }
        else
        {
            echo "<script>alert('Güncelleme Başarısız!');</script>"; 

        }
   

}   


}





?>
</body>
</html>