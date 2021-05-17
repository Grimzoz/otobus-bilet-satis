<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    require_once('baglan.php');
    include('ust_menu.php');
    $sorgu = $db->prepare("SELECT * FROM biletler b
    INNER JOIN seferler s ON b.sefer_id = s.id
    INNER JOIN duraklar d ON s.kalkis = d.durak_id
    WHERE kullanici_id=" . $_SESSION['user_id']);
    $sorgu->execute();
    $count = $sorgu->rowCount();

    ?>
    <?php
    $a_sorgu = $db->prepare("SELECT * FROM seferler");
    $a_sorgu->execute();
    $count = $a_sorgu->rowCount();

    ?>

    <?php

    ?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Ad Soyad</th>
                <th scope="col">Cinsiyet</th>
                <th scope="col">E-Posta</th>
                <th scope="col">TC Kimlik No</th>
                <th scope="col">Telefon Numarası</th>
                <th scope="col">Kalkış</th>
                <th scope="col">Güzergah</th>
                <th scope="col">Koltuk</th>


            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($sorgu as $listele) { ?>
                <tr>
                    <th scope="row"><?= $listele['ad_soyad']; ?></th>
                    <td><?= $listele['cinsiyet']; ?></td>
                    <td><?= $listele['eposta']; ?></td>
                    <td><?= $listele['tc_no']; ?></td>
                    <td><?= $listele['tel_no']; ?></td>
                    <td><?= $listele['sefer_id']; ?></td>
                    <td><?= $listele['guzergah_id']; ?></td>
                    <td><?= $listele['koltuk_no']; ?></td>
                </tr>

            <?php

            }
            ?>

        </tbody>
    </table>
</body>

</html>