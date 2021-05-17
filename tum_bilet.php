<!DOCTYPE html>
<html lang="en">

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
    error_reporting(0);
    include('yonetim_menu.php');
    require_once('baglan.php');
    //$bilet_id = $_SESSION['bilet_id'];
    //$sorgu = $db->prepare("SELECT * FROM biletler WHERE id=" .$bilet_id);
    $sorgu = $db->prepare("SELECT * FROM biletler b
    INNER JOIN seferler s ON b.sefer_id = s.id WHERE s.id=" . (int)$_GET['bilet_id']);
    $sorgu->execute();
    $count = $sorgu->rowCount();
   
    
    //$sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);

    /*    $sorgu = $db->prepare("SELECT * FROM biletler");
    $sorgu->execute();
    $count = $sorgu->rowCount();*/

    ?>

    <div class="container " style="margin-left: 27%;">
        <div class="card " style="width:80%;">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ad Soyad</th>
                            <th scope="col">Cinsiyet</th>
                            <th scope="col">E-Posta</th>
                            <th scope="col">Tc No</th>
                            <th scope="col">Tel_No</th>
                            <th scope="col">Koltuk_No</th>
                            <th scope="col">Fiyat</th>
                            <th scope="col">Güzergah</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($sorgu as $listele) { ?>
                            <tr>
                                <th scope="row"><?= $listele['id']; ?></th>
                                <td><?= $listele['ad_soyad']; ?></td>
                                <td><?= $listele['cinsiyet']; ?></td>
                                <td><?= $listele['eposta']; ?></td>
                                <td><?= $listele['tc_no']; ?></td>
                                <td><?= $listele['tel_no']; ?></td>
                                <td><?= $listele['koltuk_no']; ?></td>
                                <td><?= $listele['fiyat']; ?></td>
                                <td><?= $listele['guzergah_id']; ?></td>
                                
                            </tr>

                        <?php
                        }
                        ?>
            </div>
        </div>
    </div>






</body>

</html>