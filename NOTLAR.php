

data-toggle="modal" data-target="#uyelik"


<div class="container d-flex justify-content-center">
    <div class="card " style="width:50%;">
        <div class="card-body">
         <form  method="post" id="uyelik_form" onsubmit="return false;">
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
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button">Üye Ol</button>
                    </form>
                
        </div>
    </div>
</div>

$ad_soyad=$_POST['ad_soyad'];
        $eposta = $_POST['eposta'];
        $cinsiyet=$_POST['cinsiyet'];
        $tc_no=$_POST['tc_no'];
        $tel_no=$_POST['tel_no'];
        $sifre=$_POST['sifre'];
    
        
        
            
            
            //$sorgu->bindParam(4, $_SESSION['user_id']);
           // $sorgu->execute();
    
    
           if($sorgu = $db->prepare("INSERT INTO kullanici(ad_soyad,eposta,cinsiyet,tc_no,tel_no,sifre) VALUES(?,?,?,?,?,?)"))
           {
                $sorgu->bindParam(1, $ad_soyad, PDO::PARAM_STR);
                $sorgu->bindParam(2, $eposta, PDO::PARAM_STR);
                $sorgu->bindParam(3, $cinsiyet, PDO::PARAM_STR);
                $sorgu->bindParam(4, $tc_no, PDO::PARAM_STR);
                $sorgu->bindParam(5, $tel_no, PDO::PARAM_STR);
                $sorgu->bindParam(6, $sifre, PDO::PARAM_STR);
                $sorgu->execute();
                echo 'ok';
                
           }
           else
           {
               echo 'hata';
           }


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

        $sorgu=$db->prepare("SELECT * FROM seferler
INNER JOIN otobusler ON seferler.id = otobusler.id
INNER JOIN firmalar ON seferler.id = firmalar.id
INNER JOIN sehirler ON seferler.id = sehirler.sehir_id
 ");

$sorgu->execute();
$count = $sorgu->rowCount();
$row  = $sorgu->fetch(PDO::FETCH_ASSOC);
$id =$row['id']
?>

<div class="container d-flex justify-content-center">
    <div class="card " style="width:60%;">
        <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Otobüs</th>
                <th scope="col">Kalkış Yeri</th>
                <th scope="col">Varış Yeri</th>
                <th scope="col">Fiyat</th>
                <th scope="col">Firma Adi</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td><?=$row['marka_model'];?></td>
                <td><?=$row['sehir_adi'];?></td>
                <td><?=$row['sehir_adi'];?></td>
                <td><?=$row['sehir_adi'];?></td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                </tr>
            </tbody>
            </table>

            <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                </tr>
            </tbody>
        </table>
       
        </div>
    </div>
</div>



<table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Firma</th>
                <th scope="col">Kalkış Yeri</th>
                <th scope="col">Varış Yeri</th>
                <th scope="col">Fiyat</th>
                </tr>
            </thead>
            <tbody>
            <?php
			 foreach($sorgu as $listele)
             {?>
             <tr>
                <th scope="row"><?=$listele['id'];?></th>
                <td><?=$listele['firma_id'];?></td>
                <td><?=$listele['kalkis'];?></td>
                <td><?=$listele['varis'];?></td>
                <td><?=$listele['fiyat'];?></td>
                </tr>
				 
			 <?php 
            } 
            ?>
                
            </tbody>
            </table>





            ?>
    <?php
			 foreach($sorgu as $listele)
             {
                 ?>
             <br>
            <div class="container d-flex justify-content-center">
               <a href="#?id=<?php echo $id;?>" >
                <div class="bilet-sec ">
                    
                        <div class="row">
                            <div class="col">
                                <label for="firma" class="mt-5"><?=$listele['firma_adi'];?></label>
                            </div>
                            <div class="col">
                                <label for="firma" class="mt-5"><?=$listele['k_tarih'];?></label>
                            </div>
                            <div class="col">
                                <label for="firma" class="mt-4"><?=$listele['adi'];?></label>
                                <br>
                                <label for="">-</label>
                                <br>
                                <label for="firma" class=""><?=$listele['adi'];?></label>
                            </div>
                            <div class="col">
                                <label for="firma" class="mt-5"><?=$listele['fiyat'];?>₺</label>
                            </div>
                            <div class="col">
                                <button type="button"  class="btn btn-danger mt-5">KOLTUK SEÇ</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
                <br>
			 <?php 
            } 
?>


POPULER1

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
    <title>İstanbul - Ankara</title>
</head>

<body>

    <?php
    require_once('baglan.php');
    include('ust_menu.php');
    include('giris.php');
    include('uye_ol.php');

    $sorgu = $db->prepare("SELECT 
s.id,
fiyat,
k_tarih,
firma_adi,
tipi,
(SELECT adi FROM duraklar WHERE durak_id=s.kalkis)kalkis_adi,
(SELECT adi FROM duraklar WHERE durak_id=s.varis)varis_adi
 FROM seferler s
INNER JOIN firmalar f ON s.firma_id = f.id
INNER JOIN otobusler o ON s.otobus_id = o.id
WHERE kalkis = 48 AND varis = 90");
    $sorgu->execute();
    $count = $sorgu->rowCount();
    $row  = $sorgu->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];

    ?>

    <h1 class="modal-title text-center" id="exampleModalLongTitle">İSTANBUL - ANKARA</h1>

    <?php
    foreach ($sorgu as $listele) { ?>
        <br>
        <div class="container">
            <a href="#?id=<?php echo $id; ?>">
                <div class="bilet-sec ">

                    <div class="row">
                        <div class="col">
                            <label for="firma" style="font-size:150%" class="mt-5"><?= $listele['firma_adi']; ?></label>
                        </div>
                        <div class="col">
                            <label for="firma" class="mt-5"><?= $listele['k_tarih']; ?></label>
                        </div>
                        <div class="col" style="font-size:85%">
                            <label for="tipi" style="font-size:150%"><?= $listele['tipi']; ?></label>
                            <br>
                            <label for="firma"><?= $listele['kalkis_adi']; ?></label>
                            <br>
                            <label for="" style="font-size:150%">></label>
                            <br>
                            <label for="firma"><?= $listele['varis_adi']; ?></label>
                        </div>
                        <div class="col">
                            <label for="firma" style="font-size:150%" class="mt-5"><?= $listele['fiyat']; ?>₺</label>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger mt-5">KOLTUK SEÇ</button>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <br>
    <?php
    }
    ?>
    



    <br>
    <br>
    <br>
    <?php
    include('footer.php');
    ?>

</body>

</html>






<?php
    
    foreach ($sorgu as $listele)
     { 
         ?>
        <br>
        <form method="post" action="">
            <div class="container">
                <div class="bilet-sec" id="bilet-sec">
                    <div class="row">
                        <div class="col">
                            <label for="firma" style="font-size:150%" class="mt-5"><?= $listele['firma_adi']; ?></label>
                        </div>
                        <div class="col">
                            <label for="firma" class="mt-5"><?= $listele['k_tarih']; ?></label>
                        </div>
                        <div class="col" style="font-size:85%">
                            <label for="tipi" style="font-size:150%"><?= $listele['tipi']; ?></label>
                            <br>
                            <label for="firma"><?= $listele['kalkis_adi']; ?></label>
                            <br>
                            <label for="" style="font-size:150%">></label>
                            <br>
                            <label for="firma"><?= $listele['varis_adi']; ?></label>
                        </div>
                        <div class="col">
                            <label for="firma" style="font-size:150%" class="mt-5"><?= $listele['fiyat']; ?>₺</label>
                        </div>
                        <div class="col">
                            <button type="button" id="koltuk-sec" class="btn btn-danger mt-5" >KOLTUK SEÇ</button>
                        </div>
                        
                        <hr style="width: 95%; margin-left:2%;" ></hr>
                        
                        <div class="secim-yap" id="secim-yap">
                    
                        </div>
                        <br>
                    </div>  
                </div>
            </div>
     </form>
        <br>
    <?php
    }
?>