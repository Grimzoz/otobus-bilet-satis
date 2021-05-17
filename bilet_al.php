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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilet Satın Al</title>
</head>

<body>


    <?php

    require_once('baglan.php');
    include('ust_menu.php');
    include('giris.php');
    include('uye_ol.php');
    $k_no = $_GET['koltuk'];
    $biletsec = $_GET['count'];

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
    $id = $row['id'];
    $k_tarih = $row['k_tarih'];
    $fiyat = $row['fiyat'];
    $kalkis_adi = $row['kalkis_adi'];
    $varis_adi = $row['varis_adi'];
    $firma_adi = $row['firma_adi'];
    $tipi = $row['tipi'];
    $kapasite = $row['kapasite'];
    $guzergah = $row['guzergah_ad'];
    ?>
    <?php
    error_reporting(0);
    if ($_SESSION['user_id']) {
        $k_sorgu = $db->prepare("SELECT * FROM kullanici WHERE id=" . $_SESSION['user_id']);
        $k_sorgu->execute();
        $count = $k_sorgu->rowCount();
        $row  = $k_sorgu->fetch(PDO::FETCH_ASSOC);
        $s_ad = $row['ad_soyad'];
        $s_eposta = $row['eposta'];
        $s_cinsiyet = $row['cinsiyet'];
        $s_tel = $row['tel_no'];
        $s_tc = $row['tc_no'];
    }


    ?>

    <div class="container">

        <div class="row-12">
            <div class="col-sm-1 mt-5 px-5" style="margin-left:-5%; ">
                <div class="card" style="width: 30rem;border-radius: 10px;">
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" style="font-size:200%"><?php echo $firma_adi ?></h5>
                        </center>
                        <br>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $k_tarih ?></h6>
                        <p class="card-text">
                            <label for="">Kalkış</label><br>
                            <?php echo $kalkis_adi ?>
                        </p>
                        <p class="card-text">
                            <label for="">Varış</label><br>
                            <?php echo $varis_adi ?>
                        </p>
                        <p class="card-text">
                            <label for="">Koltuk No</label><br>
                            <?php echo $k_no ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-5" style="margin-left:-7%;">
                <div class="container d-flex justify-content-center">
                    <div class="card" style="width:40%; border-radius: 10px;">
                        <div class="card-body">
                            <div class="card-title bg-light text-dark" style="border-radius: 10px;">
                                <h1 class="modal-title text-center" id="exampleModalLongTitle">BİLET SATIN AL</h1>
                            </div>



                            <form method="POST" name="satinal_form" id="satinal_form">

                                <?php
                                $kullanici_id = $_SESSION['user_id'];
                                if (isset($_SESSION['user_id'])) {
                                ?>
                                    <center> Üye Bilgilerimi Kullan

                                        <input type="checkbox" name="myCheck" id="myCheck" onclick="myFunction()">


                                    </center>

                                <?php } ?>
                                <div id="text" style="display: block;">
                                    <div class="form-label-group">
                                        <label for="adsoyad">Ad Soyad</label>
                                        <input type="text" name="adi_soyadi" class="form-control" id="adi_soyadi" placeholder="Ad Soyad">
                                    </div>
                                    <br>
                                    <div class="form-label-group">
                                        <label for="inputEmail">E-Posta</label>
                                        <input type="text" name="e-posta" class="form-control" id="e-posta" placeholder="E-Posta" autofocus>
                                    </div>
                                    <br>

                                    <div class="form-label-group">
                                        <label for="tc">TC Kimlik No</label>
                                        <input type="text" name="tc_num" class="form-control" id="tc_num" placeholder="TC No">
                                    </div>
                                    <br>

                                    <div class="form-label-group">
                                        <label for="cinsiyet">Cinsiyet</label>
                                        <br>
                                        <label for="erkek">Erkek</label>
                                        <input type="radio" id="cinsiyet1" name="cinsiyet1" value="E">
                                        <br>
                                        <label for="kadin">Kadın</label>
                                        <input type="radio" id="cinsiyet1" name="cinsiyet1" value="K">
                                    </div>
                                    <br>

                                    <div class="form-label-group">
                                        <label for="tcno">Telefon Numarası</label>
                                        <input type="text" name="tel_num" class="form-control" id="tel_num" placeholder="Telefon No">
                                    </div>
                                    <br>
                                </div>


                                <input type="submit" class="btn btn-lg btn-secondary btn-block text-uppercase" id="satin_al" name="satin_al" value="Satın Al">

                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-1 mt-5 px-5" style="margin-left: 49%;">
                <div class="card" style="width: 30rem; border-radius: 10px;">
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" style="font-size:200%; ">GÜZERGAH</h5>
                        </center>
                        <br>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $k_tarih ?></h6>
                        <p class="card-text">
                            <label for=""></label><br>
                            <?php echo $guzergah ?>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="deneme" value="1">
    <?php

    if (isset($_POST['satin_al'])) {

        $adi_soyadi = $_POST['adi_soyadi'];
        $e_posta = $_POST['e-posta'];
        $cinsiyeti = $_POST['cinsiyet1'];
        $tc_num = $_POST['tc_num'];
        $tel_num = $_POST['tel_num'];
        $deneme = 1;

        if (isset($_POST['myCheck'])) {
            $sorgu = $db->prepare("INSERT INTO biletler(kullanici_id,ad_soyad,eposta,cinsiyet,tc_no,tel_no,koltuk_no,sefer_id,durum) VALUES(?,?,?,?,?,?,?,?,?)");
            $sorgu->bindParam(1, $kullanici_id, PDO::PARAM_INT);
            $sorgu->bindParam(2, $s_ad, PDO::PARAM_STR);
            $sorgu->bindParam(3, $s_eposta, PDO::PARAM_STR);
            $sorgu->bindParam(4, $s_cinsiyet, PDO::PARAM_STR);
            $sorgu->bindParam(5, $s_tc, PDO::PARAM_STR);
            $sorgu->bindParam(6, $s_tel, PDO::PARAM_STR);
            $sorgu->bindParam(7, $k_no, PDO::PARAM_INT);
            $sorgu->bindParam(8, $biletsec, PDO::PARAM_INT);
            $sorgu->bindParam(9, $deneme, PDO::PARAM_INT);

            if ($sorgu->execute()) {

                echo "<script>alert('Satın Alma Başarılı!');</script>";
                header("Refresh: 1; url=bilet_bilgi.php");
                $_SESSION['name'] = $s_ad;
                $_SESSION['postae'] = $s_eposta;
                $_SESSION['cinsiyeti'] = $s_cinsiyet;
                $_SESSION['tc_num'] = $s_tc;
                $_SESSION['tel_num'] = $s_tel;
                $_SESSION['biletsec'] = $biletsec;
                $_SESSION['koltuk'] = $k_no;
                
            } else {
                echo "<script>alert('Satın Alma Başarısız!');</script>";
            }
        } else {
            if (!$e_posta || !$adi_soyadi || !$cinsiyeti || !$tc_num || !$tel_num) {
                echo "<script>alert('Boş Geçilemez');</script>";
            } else {

                
                $sorgu = $db->prepare("INSERT INTO biletler(ad_soyad,eposta,cinsiyet,tc_no,tel_no,koltuk_no,sefer_id,durum) VALUES(?,?,?,?,?,?,?,?)");
                $sorgu->bindParam(1, $adi_soyadi, PDO::PARAM_STR);
                $sorgu->bindParam(2, $e_posta, PDO::PARAM_STR);
                $sorgu->bindParam(3, $cinsiyeti, PDO::PARAM_STR);
                $sorgu->bindParam(4, $tc_num, PDO::PARAM_STR);
                $sorgu->bindParam(5, $tel_num, PDO::PARAM_STR);
                $sorgu->bindParam(6, $k_no, PDO::PARAM_INT);
                $sorgu->bindParam(7, $biletsec, PDO::PARAM_INT);
                $sorgu->bindParam(8, $deneme, PDO::PARAM_INT);

                if ($sorgu->execute()) {
                    echo "<script>alert('Satın Alma Başarılı!');</script>";
                    /*if(isset($_GET['koltuk']))
                    {
                        $deneme = 1;
                        //$idne =1;
                    }
                    $sorgu = $db->prepare("UPDATE biletler SET durum = ? WHERE koltuk_no = ?");
                    $sorgu->bindParam(1, $deneme);
                    $sorgu->bindParam(2, $k_no);
                    $sorgu->execute();*/
                    header("Refresh: 1; url=bilet_bilgi.php");
                    $_SESSION['name'] = $adi_soyadi;
                    $_SESSION['postae'] = $e_posta;
                    $_SESSION['cinsiyeti'] = $cinsiyeti;
                    $_SESSION['tc_num'] = $tc_num;
                    $_SESSION['tel_num'] = $tel_num;
                    $_SESSION['biletsec'] = $biletsec;
                    $_SESSION['koltuk'] = $k_no;
                } else {
                    echo "<script>alert('Satın Alma Başarısız!');</script>";
                }
            }
        }
    }



    ?>
    <script>
        function myFunction() {

            var checkBox = document.getElementById("myCheck");

            var text = document.getElementById("text");

            if (checkBox.checked == true) {
                text.style.display = "none";
            } else {
                text.style.display = "block";
            }
        }
    </script>
</body>

</html>