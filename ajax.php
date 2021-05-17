<?php
require_once('baglan.php');
//var_dump($_GET,$_POST);

if($_GET['type'] == 'giris.php')
{
    $kadi= $_POST['kadi'];
    $sifre = $_POST['sifre'];
    if(!$kadi || !$sifre)
    {
        echo "bos";
    }
    else
    {
        $girisyap = $db ->prepare("SELECT * FROM kullanici WHERE eposta =:kadi AND sifre=:sifre");
        $girisyap->bindParam('kadi', $kadi, PDO::PARAM_STR);
        $girisyap->bindValue('sifre', $sifre, PDO::PARAM_STR);
        $girisyap->execute();
        $count = $girisyap->rowCount();
        $row  = $girisyap->fetch(PDO::FETCH_ASSOC);
        if($count == 1 && !empty($row))
        {
           
            $_SESSION['user_id']  = $row['id'];
            $_SESSION['ad']  = $row['ad_soyad'];
            $_SESSION['rol'] = $row['k_rol'];

            echo "ok";
        }
        else
        {
            echo 'hata';
        } 
        
    }
}

/*else if($_GET['type'] == 'uye_ol.php')
{   
 
    $ad_soyad=$_POST['ad_soyad'];
    $eposta = $_POST['eposta'];
    $cinsiyet=$_POST['cinsiyet'];
    $tc_no=$_POST['tc_no'];
    $tel_no=$_POST['tel_no'];
    $sifre=$_POST['sifre'];

    if( !$eposta|| !$sifre || !$ad_soyad || !$cinsiyet || !$tc_no || !$tel_no)
    {
        echo "bos";
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
            echo "ok";
        }
        else
        {
            echo "hata";
            

        }

    }
}

*/
