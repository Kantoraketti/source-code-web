<?php
require 'function.php';
//ambil data 
$beau = query("SELECT * FROM informasi_beasiswa ORDER BY id DESC LIMIT 3");
$query = query("SELECT * FROM informasi_beasiswa ORDER BY id DESC LIMIT 6")

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="CSS/header.css">
  <link rel="stylesheet" href="CSS/beranda.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <title>Scholar.co</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light" id="navbar-bg">
    <img src="img/logo.svg" alt="" class="logo-img" width="200px">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a href="#jumbostron" class="nav-link text-white">Dashboard</a>
        </li>
        <li class="nav-item">
          <a href="index2.php" class="nav-link text-white">Scholarship</a>
        </li>
        <li class="nav-item">
          <a href="#about-us" class="nav-link text-white">About US</a>
        </li>
        <li class="nav-item">
          <a href="#footer" class="nav-link text-white">Service</a>
        </li>
        <li class="nav-item">
          <a href="#footer" class="nav-link text-white">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="jumbotron jumbotron-fluid" id="jumbostron">
    <div class="container">
      <h1 class="title-jumbostron">SCHOLAR.co</h1>
      <h2 class="desc-jumbostron">Informasi Beasiswa</h2>
    </div>
  </div>

  <div class="index" id="index">
    <div class="row">
      <div class="leftcolumn">
        <div class="row justify-content-sm-left ml-auto" id="cards">
          <?php $i = 1; ?>
          <?php foreach ($beau as $beasiswa) : ?>
            <div class="col-sm-auto">
              <div class="card fakeimg" style="width: 18rem">
                <h5><?= $beasiswa['nama_beasiswa'] ?></h5>
                <img class="card-img mt-1" src='img/<?= $beasiswa['gambar'] ?>' alt="">
                <h6 class="mt-2">Deadline Beasiswa : <?= $beasiswa['tanggal'] ?></h6>
                <br>
                <button class="button-submit text-light"><a href="<?= $beasiswa['link'] ?>" class="link">Daftar Beasiswa</a></button>
              </div>
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
        </div>

        <?php
        global $conn;
        $result = mysqli_query($conn, "SELECT *FROM informasi_beasiswa ORDER BY id DESC LIMIT 2");
        while ($results = mysqli_fetch_assoc($result)) :
        ?>
          <div class="card ml-auto mt-4">
            <h2 class="text-info"><b>New Post</b></h2>
            <h4><?= $results['nama_beasiswa'] ?></h4> <br>
            <div class="row">
              <div class=" col-sm-4 mb-4">
                <img src="img/<?= $results['gambar'] ?>" alt="" width="100%">
              </div>
              <div class="col-sm-8">
                <h6>Deskripsi</h6>
                <p><?= $results['deskripsi'] ?></p>
                <button class="button-submit text-light"><a href="<?= $results['link'] ?>" class="link">Daftar Beasiswa</a></button>
              </div>
            </div>
          </div>
        <?php endwhile; ?>

      </div>
      <div class="rightcolumn">
        <div class="card" id="about-us">
          <h2>About Me</h2>
          <img src="img/img1.jpg" alt="about us" height="200px">
          <p>Some text about me in culpa qui officia deserunt mollit anim</p>
        </div>
        <div class="card">
          <h3>Popular Post</h3>

          <?php foreach ($query as $nama) : ?>
            <a href="#">
              <div class="fakeimg bg-info text-light"><?= $nama['nama_beasiswa'] ?></div>
            </a><br>
          <?php
          endforeach;
          ?>

        </div>
        <div class="card">
          <h3>Follow Me</h3>
          <p>Some text</p>
        </div>
      </div>
    </div>

  </div>

  <!-- About US -->

  <!-- Footer -->
  <footer id="footer">
    <div class="row footer-row">
      <div class="col-lg-4">
        <h5 class="text-footer">company</h5>
      </div>
      <div class="col-lg-4">
        <h5 class="text-footer">contact</h5>
      </div>
      <div class="col-lg-4">
        <h5 class="text-footer">adress</h5>
      </div>
    </div>
  </footer>
  <div class="copyrights">Copyrights</div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>