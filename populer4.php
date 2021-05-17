<!DOCTYPE html>
<html lang="tr">

<head>

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İzmir-Bursa</title>

</head>

<body>

    <?php
    error_reporting(0);
    require_once('baglan.php');
    include('ust_menu.php');
    include('giris.php');
    include('uye_ol.php');
    include('tarih.php');

    $sorgu = $db->prepare("SELECT 
    s.id,
    fiyat,
    k_tarih,
    firma_adi,
    tipi,
    kapasite,
    (SELECT adi FROM duraklar WHERE durak_id=s.kalkis)kalkis_adi,
    (SELECT adi FROM duraklar WHERE durak_id=s.varis)varis_adi
    FROM seferler s
    INNER JOIN firmalar f ON s.firma_id = f.id
    INNER JOIN otobusler o ON s.otobus_id = o.id
    WHERE kalkis = 50 AND varis = 89");
    $sorgu->execute();
    $count = $sorgu->rowCount();
    

    //$row  = $sorgu->fetch(PDO::FETCH_ASSOC);
    //$id = $row['id'];
    //$s_sayi = $sorgu->rowCount();

    ?>
    <?php


    $a_sorgu = $db->prepare("SELECT * FROM biletler");
    $a_sorgu->execute();
    $count = $a_sorgu->rowCount();
    $row  = $a_sorgu->fetch(PDO::FETCH_ASSOC);
    $bosmu = $row['durum'];

    ?>

<?php
    $i = 0;
    if ($sorgu->rowCount() <= 0) {
        echo "<script>alert('İstediğiniz Kriterde Sefer Bulunamadı!');</script>";
        header("Refresh: 1; url=index.php");
    }

    if ($sorgu->rowCount() > 0) {

        while ($row = $sorgu->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $k_tarih = $row['k_tarih'];
            $fiyat = $row['fiyat'];
            $kalkis_adi = $row['kalkis_adi'];
            $varis_adi = $row['varis_adi'];
            $firma_adi = $row['firma_adi'];
            $tipi = $row['tipi'];
            $kapasite = $row['kapasite'];
            $guzergahlar = $row['guzergahlar'];

            $i++;
    ?>
            <br>

            <div class="container">
                <div class="bilet-sec" id="bilet-sec-<?php echo $id ?>">

                    <div class="row">
                        <div class="col">
                            <label for="firma" type="text" style="font-size:150%" class="mt-5"><?= $firma_adi ?></label>

                        </div>
                        <div class="col">
                            <label for="firma" style="font-size:130%" class="mt-5">Sefer Tarihi</label>
                            <label for="firma" class="mt-3"><?= $k_tarih ?></label>
                        </div>
                        <div class="col" style="font-size:85%">
                            <label for="tipi" style="font-size:150%"><?= $tipi ?></label>
                            <br>
                            <label for="firma"><?= $kalkis_adi ?></label>
                            <br>
                            <label for="" style="font-size:150%">></label>
                            <br>
                            <label for="firma"><?= $varis_adi ?></label>
                            <br>

                        </div>
                        <div class="col">
                            <label for="firma" style="font-size:150%" class="mt-5"><?= $fiyat ?>₺</label>
                        </div>
                        <div class="col">

                            <a href="#<?php echo $id ?>" name="count" value=<?php echo $id ?> class="btn btn-danger mt-5 koltuk-sec" id="koltuk-sec_<?php echo $id ?>" onclick="koltuk_sec(<?php echo $id; ?>)">KOLTUK SEÇ</a>
                            <!--<input type="submit" class="btn btn-danger mt-5 koltuk-sec" value="KOLTUK SEÇ"
                             id="koltuk-sec_<?php echo $id ?>" onclick="koltuk_sec(<?php echo $id; ?>)">-->
                            <a href="#" class="btn btn-secondary mt-5 koltuk-kapa buton-ayar dipslay_none" id="koltuk-kapa_<?php echo $id ?>" onclick="koltuk_kapa(<?php echo $id; ?>)">KAPAT</a>
                        </div>
                        <hr style="width: 90%; margin-left:4%;">
                        <form action="bilet_al.php" method="get">
                            <label class="guzergah dipslay_none" style="margin-top:0%; color:black;" id="guzergah_<?php echo $id ?>">
                                <?php echo $guzergahlar ?>
                            </label>
                            <div class="row">

                                <div class="otobus dipslay_none col-sm-8" style="margin-top:0%" id="otobus_<?php echo $id ?>">


                                    <div class="koltuklar">

                                        <table>
                                            <?php
                                            $b_sorgu = $db->prepare("SELECT * FROM biletler where sefer_id =" . $id);
                                            $b_sorgu->execute();
                                            $koltuklar = [];
                                            while ($row2 = $b_sorgu->fetch(PDO::FETCH_ASSOC)) {
                                                $koltuklar[] = $row2['koltuk_no'];
                                            }
                                            for ($a = 1; $a <= $kapasite; $a++) {

                                            ?>


                                                <input type="text" hidden name="count" type="text" value="<?php echo $id ?>">

                                                <?php
                                                if (in_array($a, $koltuklar)) {

                                                ?>
                                                    <?php
                                                    if ($tipi == '2+1') {


                                                        if ($a == 9) {
                                                    ?>
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;



                                                        <?php
                                                        }


                                                        if ($a == 14) {
                                                        ?>
                                                            <br>
                                                        <?php
                                                        }
                                                        if ($a == 22) {
                                                        ?>
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                        <?php
                                                        }
                                                        if ($a == 27) {
                                                        ?>
                                                            <br>
                                                            <div class="araci" style="margin-top: 10%; ">
                                                            </div>

                                                        <?php
                                                        }
                                                    }
                                                    if ($tipi == '2+2') {
                                                        if ($a == 7) {
                                                        ?>
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;

                                                        <?php
                                                        }
                                                        if ($a == 12) {
                                                        ?>
                                                            <br>
                                                        <?php
                                                        }
                                                        if ($a == 18) {
                                                        ?>
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;

                                                        <?php
                                                        }
                                                        if ($a == 23) {
                                                        ?>
                                                            <br>
                                                            <div class="araci" style="margin-top: 5%; ">
                                                            </div>
                                                        <?php
                                                        }
                                                        if ($a == 34) {
                                                        ?>
                                                            <br>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    <tr>


                                                        <input disabled type="submit" style="width: 43px;" name="koltuk" class="k_<?php echo $a ?> btn btn-danger" value="<?php echo $a ?>">
                                                    </tr>
                                                <?php

                                                } else {

                                                ?>

                                                    <?php
                                                    if ($tipi == '2+1') {


                                                        if ($a == 9) {
                                                    ?>
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;



                                                        <?php
                                                        }


                                                        if ($a == 14) {
                                                        ?>
                                                            <br>
                                                        <?php
                                                        }
                                                        if ($a == 22) {
                                                        ?>
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                        <?php
                                                        }
                                                        if ($a == 27) {
                                                        ?>
                                                            <br>
                                                            <div class="araci" style="margin-top: 10%; ">
                                                            </div>

                                                        <?php
                                                        }
                                                    }
                                                    if ($tipi == '2+2') {
                                                        if ($a == 7) {
                                                        ?>
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;

                                                        <?php
                                                        }
                                                        if ($a == 12) {
                                                        ?>
                                                            <br>
                                                        <?php
                                                        }
                                                        if ($a == 18) {
                                                        ?>
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;

                                                        <?php
                                                        }
                                                        if ($a == 23) {
                                                        ?>
                                                            <br>
                                                            <div class="araci" style="margin-top: 5%; ">
                                                            </div>
                                                        <?php
                                                        }
                                                        if ($a == 34) {
                                                        ?>
                                                            <br>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    <tr>

                                                        <input type="submit" name="koltuk" style="width: 43px;" class="k_<?php echo $a ?> btn btn-primary" value="<?php echo $a ?>">
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            <?php
                                            }

                                            ?>
                                        </table>

                                    </div>

                                </div>
                        </form>

                        <div class="col-sm-2 " style="margin-top:15%;">

                            <div disabled style="background-color: #d9534f; width:50px; height:50px; margin-top:-75%; margin-left:15%;" class="bos dipslay_none" id="bos_<?php echo $id ?>">
                                <label style="margin-left:120%; margin-top:20%;">DOLU</label>
                            </div>
                            <div disabled style="background-color: #0275d8; width:50px; height:50px;margin-left:15%; margin-top:5%;" class="dolu dipslay_none" id="dolu_<?php echo $id ?>">
                                <label style="margin-left:120%; margin-top:20%;">BOŞ</label>
                            </div>

                            <img src="img/steering-wheel.png" class="direksiyon" alt="" style="margin-left: -1000%; margin-top:-30%;">


                        </div>

                        <div class="col-sm-1 dvm-btn dipslay_none" id="dvm-btn_<?php echo $id ?> ">


                        </div>

                    </div>

                </div>
            </div>
            </div>

            <br>
    <?php
        }
    }
    ?>

    </form>

    <script>
        /*$('.koltuk-kapa').attr('style','display:none');
        $('#koltuk-kapa_'+id).attr('style','display:none');*/
        $(".koltuk-kapa").hide();
        $(".dvm-btn").hide();



        function koltuk_sec(id) {

            $('.otobus').addClass('dipslay_none');
            $('.otobus').removeClass('dipslay_block');
            $('#otobus_' + id).addClass('dipslay_block');

            $('.guzergah').addClass('dipslay_none');
            $('.guzergah').removeClass('dipslay_block');
            $('#guzergah_' + id).addClass('dipslay_block');


            $('.dvm-btn').addClass('dipslay_none');
            $('.dvm-btn').removeClass('dipslay_block');
            $('#dvm-btn_' + id).addClass('dipslay_block');


            $('.bos').addClass('dipslay_none');
            $('.bos').removeClass('dipslay_block');
            $('#bos_' + id).addClass('dipslay_block');

            $('.dolu').addClass('dipslay_none');
            $('.dolu').removeClass('dipslay_block');
            $('#dolu_' + id).addClass('dipslay_block');



            $('.bilet-sec').attr('style', 'height:120px');
            $('#bilet-sec-' + id).attr('style', 'height:400px');
            $('.koltuk-kapa').attr('style', 'display:block');
            $('#koltuk-kapa_' + id).attr('style', 'display:block');

            $(".koltuk-kapa").show();
            $(".koltuk-sec").hide();
        }

        function koltuk_kapa(id) {

            $('.otobus').addClass('dipslay_none');
            $('.otobus').removeClass('dipslay_block');
            $('#otobus_' + id).addClass('dipslay_none');
            $('.bilet-sec').attr('style', 'height:120px');

            $('.guzergah').addClass('dipslay_none');
            $('.guzergah').removeClass('dipslay_block');
            $('#guzergah_' + id).addClass('dipslay_none');


            $('.dvm-btn').addClass('dipslay_none');
            $('.dvm-btn').removeClass('dipslay_block');
            $('#dvm-btn_' + id).addClass('dipslay_none');

            $('.dolu').addClass('dipslay_none');
            $('.dolu').removeClass('dipslay_block');
            $('#dolu_' + id).addClass('dipslay_none');

            $('.bos').addClass('dipslay_none');
            $('.bos').removeClass('dipslay_block');
            $('#bos_' + id).addClass('dipslay_none');

            $('#bilet-sec-' + id).attr('style', 'height:120px');
            $(".koltuk-kapa").hide();
            $(".koltuk-sec").show();
            /*$('.koltuk-kapa').attr('style','display:none');
            $('#koltuk-kapa_'+id).attr('style','display:none'); */
            /*('.koltuk-sec').attr('style','display:display');
            $('#koltuk-sec_'+id).attr('style','display:display'); */


        }
    </script>


    <br>
    <br>
    <br>
    <?php
    include('footer.php');
    ?>

</body>

</html>