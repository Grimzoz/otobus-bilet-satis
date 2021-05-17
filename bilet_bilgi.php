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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Bilet</title>
</head>

<body>
    <?php




    ?>
    <?php

    require_once('baglan.php');
    include('ust_menu.php');
    $biletsec = $_SESSION['biletsec'];
    $sorgu = $db->prepare("SELECT 
    s.id,
    fiyat,
    k_tarih,
    firma_adi,
    tipi,
    kapasite,
    (SELECT guzergah_adi FROM guzergah WHERE id=s.guzergah_id)guzergah_ad,
    (SELECT adi FROM duraklar WHERE durak_id=s.kalkis)kalkis_adi,
    (SELECT adi FROM duraklar WHERE durak_id=s.varis)varis_adi
    FROM seferler s
    INNER JOIN firmalar f ON s.firma_id = f.id
    INNER JOIN otobusler o ON s.otobus_id = o.id
    WHERE s.id =" . $biletsec);
    $sorgu->execute();
    $count = $sorgu->rowCount();
    $row  = $sorgu->fetch(PDO::FETCH_ASSOC);
    
    $gelen_veri = $_SESSION['name'];
    $posta_veri = $_SESSION['postae'];
    $cins_veri = $_SESSION['cinsiyeti'];
    $tc_veri = $_SESSION['tc_num'];
    $tel_veri = $_SESSION['tel_num'];
    $koltuk = $_SESSION['koltuk'];

    $k_tarih = $row['k_tarih'];
    $fiyat = $row['fiyat'];
    $kalkis_adi = $row['kalkis_adi'];
    $varis_adi = $row['varis_adi'];
    $firma_adi = $row['firma_adi'];
    //$tipi = $row['tipi'];
    $kapasite = $row['kapasite'];
    $guzergah = $row['guzergah_ad'];


    //var_dump($gelen_veri,$posta_veri,$cins_veri,$tc_veri,$tel_veri);

    ?>
    <div class="container">

        <div class="row-12">

            <div class="col-md-3 mt-5">
                <div class="container d-flex justify-content-center">
                    <div class="card" style="width:40%; border-radius: 10px;">
                        <div class="card-body">
                            <div class="card-title bg-light text-dark" style="border-radius: 10px;">
                                <h1 class="modal-title text-center" id="exampleModalLongTitle">BİLET BİLGİSİ</h1>
                                <h3 class="modal-title text-center" id="exampleModalLongTitle"><?php echo $firma_adi?></h3>
                            </div>
                            <div class="row">
                                <div class="col-6 " style="margin-left:3%;">
                                    <label for="inputEmail" class="text-center">TC Kimlik</label>
                                    <p><?php echo $tc_veri ?></p>
                                    <label for="adsoyad">Ad Soyad</label>
                                    <p><?php echo $gelen_veri ?></p>

                                    <label for="inputEmail" class="text-center">E-Posta</label>
                                    <p><?php echo $posta_veri ?></p>

                                    <label for="Cinsiyet" class="text-center">Cinsiyet</label>
                                    <p><?php if ($cins_veri == "K") {
                                            echo 'Kadın';
                                        } else {
                                            echo 'Erkek';
                                        }
                                        ?></p>
                                    <label for="telefon" class="text-center">Telefon Numarası</label>
                                    <p><?php echo $tel_veri ?></p>
                                </div>


                                <div class="col-5" style="margin-left:5%;">
                                    <label for="inputEmail" class="text-center">Kalkış-Varış</label>
                                    <p><?php echo  $kalkis_adi." ".$varis_adi ?></p>

                                    <label for="adsoyad">Koltuk No</label>
                                    <p><?php echo $koltuk ?></p>

                                    <label for="inputEmail" class="text-center">Kalkış Tarihi</label>
                                    <p><?php echo $k_tarih?> </p>

                                    <label for="adsoyad">Fiyat</label>
                                    <p><?php echo $fiyat?>₺</p>

                                    
                                </div>
                                <label for="guzergah" class="text-center wd-100">Güzergah</label>
                                    <p class="text-center"><?php echo $guzergah?></p>

                            </div>

                            <a href="index.php" class="btn btn-lg btn-secondary btn-block text-uppercase" id="satin_al" name="satin_al">Tamam</a>
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>