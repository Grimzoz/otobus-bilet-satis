<!DOCTYPE html>
<html lang="tr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="y_style.css" crossorigin="anonymous">
    <script src="js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/app.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include('yonetim_menu.php');
    require_once('baglan.php');

    $sorgu = $db->prepare("SELECT 
    s.id,
    fiyat,
    k_tarih,
    (SELECT marka_model FROM otobusler o WHERE o.id = s.otobus_id)otobus_adi,
    (SELECT kapasite FROM otobusler o WHERE o.id = s.otobus_id)kapasite,
    (SELECT tipi FROM otobusler o WHERE o.id = s.otobus_id)tipi,
    (SELECT firma_adi FROM firmalar f WHERE f.id = s.firma_id)firma_adi,
    (SELECT adi FROM duraklar WHERE durak_id=s.kalkis)kalkis_adi,
    (SELECT adi FROM duraklar WHERE durak_id=s.varis)varis_adi
    FROM seferler s ORDER BY id DESC
");

    $sorgu->execute();
    $count = $sorgu->rowCount();
    $link = "<script>window.open('https://www.google.com.tr/?,'width=710,height=555,left=160,top=170')</script>";
    ?>


    <div class="container d-flex justify-content-center">
        <div class="card" style="width:60%;">
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row-12">
                        <div class="col-sm-6">
                            <label for="" class="text-center">Arama</label>
                            <input type="text" name="arama" id="arama" class="form-control">
                        </div>
                        <div class="col-sm-5 "  style="margin-top: 3.8%;">
                            <button class="btn btn-primary" name="arama_btn">ARA</button>
                        </div>
                    </div>
                </form>


                <?php
                
                
                if (isset($_GET['arama_btn'])) {
                    $arama = $_GET['arama'];
                    $sorgu = $db->prepare('SELECT 
                    s.id,
                    fiyat,
                    k_tarih,
                    (SELECT marka_model FROM otobusler o WHERE o.id = s.otobus_id)otobus_adi,
                    (SELECT kapasite FROM otobusler o WHERE o.id = s.otobus_id)kapasite,
                    (SELECT tipi FROM otobusler o WHERE o.id = s.otobus_id)tipi,
                    (SELECT firma_adi FROM firmalar f WHERE f.id = s.firma_id)firma_adi,
                    (SELECT adi FROM duraklar WHERE durak_id=s.kalkis)kalkis_adi,
                    (SELECT adi FROM duraklar WHERE durak_id=s.varis)varis_adi
                    FROM seferler s  INNER JOIN duraklar ON s.kalkis = duraklar.durak_id WHERE adi LIKE :keywords ORDER BY id DESC');
                    $sorgu->bindValue(':keywords', '%' . $arama . '%');
                    $sorgu->execute();
                    
                } 

                ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Sefer Numarası</th>
                            <th scope="col">Otobüs</th>
                            <th scope="col">Kalkış Yeri</th>
                            <th scope="col">Varış Yeri</th>
                            <th scope="col">Kalkış Tarihi</th>
                            <th scope="col">Fiyat</th>
                            <th scope="col">Firma Adi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="get" action="tum_bilet.php">
                            <?php

                            foreach ($sorgu as $listele) { ?>

                                <tr>
                                    <th scope="row">

                                    <th scope="col"><input type="submit" name="bilet_id" id="bilet_id" class="btn btn-primary" value="<?php echo $listele['id']; ?>"></th>
                                    </th>
                                    <td><?= $listele['otobus_adi']; ?></td>
                                    <td><?= $listele['kalkis_adi']; ?></td>
                                    <td><?= $listele['varis_adi']; ?></td>
                                    <td><?= $listele['k_tarih']; ?></td>
                                    <td><?= $listele['fiyat']; ?>₺</td>
                                    <td><?= $listele['firma_adi']; ?></td>

                                </tr>

                            <?php

                            }
                            ?>
                        </form>

                    </tbody>
                </table>
            </div>
        </div>
    </div>







</body>

</html>