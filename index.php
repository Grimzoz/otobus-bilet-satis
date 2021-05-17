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
  <meta charset="UTF-8">
  <title>Anasayfa</title>
</head>

<body>

  <?php
  require_once('baglan.php');
  include('ust_menu.php');
  include('giris.php');
  include('uye_ol.php');

  /*$girisyap = $db ->prepare("SELECT * FROM seferler");
$girisyap->execute();
$count = $girisyap->rowCount();
$row  = $girisyap->fetch(PDO::FETCH_ASSOC);
$kalkis =$row['kalkis'];*/

  ?>



  <div class="container-fluid w-50 mt-3 mb-3 g-5" style="margin-left: 5%; margin-top:5%;">
    <div class="card w-50 mb-5 g-5" style="border-radius: 10px; border:0px">
      <div class="card-body align-self-center">
        <label><i class="fa fa-map-marker"></i> Nereden</label>

        <form method="POST" action="sefer_arama.php" name="sefer_arama_form" id="sefer_arama_form">
          <select class="form-select form-select-lg mb-3" name="kalkis" id="kalkis" aria-label=".form-select-sm example" style="width :100%;">
            <?php
            $sorgu = $db->prepare("SELECT * FROM duraklar ORDER BY sehir_id ASC");
            $sorgu->execute();
            $count = $sorgu->rowCount();

            if ($sorgu->rowCount() > 0) {
              while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                $id = $sonuc['durak_id'];
                $sehir = $sonuc['adi'];
                $kalkis = $_POST['kalkis'];
                echo "<option value=" . $id . ">" . $sehir . "</option>";
              }
            ?>

          </select>

        <?php
            }
        ?>

        <label><i class="fa fa-map-marker"></i> Nereye</label>
        <select class="form-select form-select-lg mb-3" name="varis" id="varis" aria-label=".form-select-sm example" style="width :100%;">
          <?php
          $sorgu = $db->prepare("SELECT * FROM duraklar ORDER BY sehir_id ASC");
          $sorgu->execute();
          $count = $sorgu->rowCount();
          if ($sorgu->rowCount() > 0) {
            while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
              $id = $sonuc['durak_id'];
              $sehir = $sonuc['adi'];

              echo "<option value=" . $id . ">" . $sehir . "</option>";
            }
          ?>

        </select>
      <?php
          }
      ?>

      <label for="birthday"><i class="fa fa-calendar"></i> Yolculuk Tarihi</label>
      <br>
      <input type="date" id="date-time" name="date-time" class="form-control" required>
      <br>
      <br>
      <input type="submit" value="Bilet Ara" name="sefer_arama" id="sefer_arama" class="btn btn-primary w-100">
        </form>
      </div>
    </div>
    
    

  </div>

  <div class="arka_ust mb-5">
    <img src="img/arka_ust.jpg" width="100%" height="350px" alt="">
  </div>



  <br><br>
  <h1 class="modal-title text-center mt-5 mb-3" id="exampleModalLongTitle">POPÜLER SEYAHATLER</h1>

  <br>

  <div class="row row-cols-1 row-cols-md-3 g-5">

    <div class="col">
      <div class="card" style="width:100%; border-radius:10px; ">
        <div class="card-header">
          İstanbul - Ankara
        </div>
        <img src="img/ankara.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="populer1.php" class="btn btn-primary ">Bilet Al</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width:100%; border-radius: 10px; ">
        <div class="card-header">
          İstanbul - İzmir
        </div>
        <img src="img/izmir.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="populer2.php" class="btn btn-primary">Bilet Al</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width:100%; border-radius: 10px; ">
        <div class="card-header">
          İstanbul - Çanakkale
        </div>
        <img src="img/canakkale.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="populer3.php" class="btn btn-primary">Bilet Al</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width:100%; border-radius: 10px;">
        <div class="card-header">
          İzmir - Bursa
        </div>
        <img src="img/ankara.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="populer4.php" class="btn btn-primary">Bilet Al</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width:100%; border-radius: 10px; ">
        <div class="card-header">
          Ankara - Eskişehir
        </div>
        <img src="img/eskisehir.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="populer5.php" class="btn btn-primary">Bilet Al</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width:100%; border-radius: 10px; ">
        <div class="card-header">
          İstanbul - Kars
        </div>
        <img src="img/kars.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="populer6.php" class="btn btn-primary ">Bilet Al</a>
        </div>
      </div>
    </div>

  </div>

  <br>
  <?php
  include('footer.php');
  ?>

</body>

</html>