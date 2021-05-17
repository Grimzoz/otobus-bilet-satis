<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <?php

    include('ust_menu.php');
    $sorgu = $db->prepare("SELECT * FROM kullanici where id=" . $_SESSION['user_id']);
    $sorgu->execute();
    $count = $sorgu->rowCount();
    $row  = $sorgu->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];
    ?>

    <div class="container-xl mt-5">
        <div class="row">
            <div class="col-xl-4">
                <div class="profil">
                    <div class="kutu">
                        <img src="img/profile.png"  width="100%" height="250px" alt="">
                    </div>
                    <center><p style="font-size: 35px;" class="mt-5"><?= $row['ad_soyad']; ?></p></center>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="bilgi-panel">
                    <div class="card-body" style="width:75%; margin-left: 12%;">
                        <p style="font-size: 15px;" class="mt-5">Ad Soyad</p>
                        <input type="text" class="form-control bg-white" disabled  value="<?= $row['ad_soyad']; ?>">
                        <p style="font-size: 15px;" class="mt-5 ">TC Kimlik Numarası</p>
                        <input type="text" class="form-control bg-white" disabled value="<?= $row['tc_no']; ?>">
                        <p style="font-size: 15px;" class="mt-5">E-Posta</p>
                        <input type="text" class="form-control bg-white " disabled value="<?= $row['eposta']; ?>">
                        <p style="font-size: 15px;" class="mt-5">Cinsiyet</p>
                        <input type="text" class="form-control bg-white" disabled value="<?= $row['cinsiyet']; ?>">
                        <p style="font-size: 15px;" class="mt-5">Telefon Numarası</p>
                        <input type="text" class="form-control bg-white" disabled value="<?= $row['tel_no']; ?>">
                        <p style="font-size: 15px;" class="mt-5">Şifre</p>
                        <input type="text" class="form-control bg-white" disabled value="<?= $row['sifre']; ?>">
                        <a href="profil_guncelle.php?id=<?php echo $id; ?>" style="width: 100%;" class="btn btn-primary mt-5">Güncelle</a>
                    </div>
                    <div class="bos" style="width: 100%; height:100px">
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>

</html>