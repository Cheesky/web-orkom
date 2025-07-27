<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cari Spot Belajar</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #f7f7f7;
      color: #333;
    }

    header {
    background-color: #7886C7;
    padding: 20px 50px;
    position: sticky;
    top: 0;
    z-index: 999;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  .header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: auto;
  }

  .logo {
    color: white;
    font-size: 24px;
    font-weight: bold;
    letter-spacing: 2px;
  }

  .nav {
    list-style: none;
    display: flex;
    gap: 30px;
    margin: 0;
    padding: 0;
  }

  .nav li a {
    color: #FFF2F2;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s;
  }

  .nav li a:hover {
    color: #ffdd57;
  }

  /* Highlight link berdasarkan target */
  #home:target ~ header .nav li a[href="#home"],
  body:not(:has(:target)) .nav li a[href="#home"] {
    color: #ffdd57;
  }

  #cari:target ~ header .nav li a[href="#cari"] {
    color: #ffdd57;
  }

  #tambah:target ~ header .nav li a[href="#tambah"] {
    color: #ffdd57;
  }

    header h1 {
      font-size: 24px;
      font-weight: 700;
    }

    .container {
      max-width: 800px;
      margin: 40px auto;
      padding: 30px;
      background-color: white;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }

    h2 {
      color: #7886C7;
      margin-bottom: 30px;
    }

    .card {
      background: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      margin-bottom: 35px;
    }

    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .card img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      display: block;
    }

    .card-content {
      padding: 1rem;
    }

    .card-title {
      font-size: 1.25rem;
      margin: 0 0 0.5rem;
    }

    .card-desc {
      font-size: 0.95rem;
      color: #555;
    }

  </style>
</head>
<body>

<header>
    <div class="header-container">
      <div class="logo">SPOT!</div>
      <ul class="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="form_cari.php">Cari Spot</a></li>
        <li><a href="form_tambah.php">Tambah Spot</a></li>
      </ul>
    </div>
  </header>

  <div class="container">
    <h2><img src="icon_search.png"> Hasil Penelusuran</h2>
    <div class="card">
      <img src="https://pixeldrain.com/api/file/cqzyYvWt" alt="item1" />
      <div class="card-content">
        <h2 class="card-title">About Pengembang</h2>
        <p class="card-desc">Solid</p>
      </div>
    </div>
    <?php
    require ("koneksi.php");  

    $gedung=$_POST["gedung"];
    $intensitas=$_POST["intensitas"];
    $wifi1=$_POST["wifi"];
    $fasilitas = [];
    if (isset($_POST["toilet"])) {
        $fasilitas[] = "toilet";
    }
    
    if (isset($_POST["colokan"])) {
        $fasilitas[] = "colokan";
    }
    
    if (isset($_POST["ac"])) {
        $fasilitas[] = "ac";
    }
    $waktu1=$_POST["waktu"];
    
    $fasilitas_list = "'" . implode("','", $fasilitas) . "'";


    $sql = "
    SELECT 
    tt.nama_tempat,
    tg.nama_gedung,
    tt.foto_tempat,
    GROUP_CONCAT(DISTINCT tf.nama_fasilitas SEPARATOR ', ') AS fasilitas,
    ti.keramaian,
    ti.wifi,
    ti.waktu
FROM orkom.t_tempat tt
JOIN orkom.t_gedung tg ON tt.id_gedung = tg.id_gedung
JOIN orkom.t_fasilitas tf ON tt.id_tempat = tf.id_tempat
JOIN orkom.t_indikator ti ON tt.id_tempat = ti.id_tempat
WHERE tg.nama_gedung = '$gedung'
  AND ti.keramaian = '$intensitas'
  AND ti.wifi = '$wifi1'
  AND ti.waktu = '$waktu1'
  AND tt.id_tempat IN (
      SELECT id_tempat
      FROM orkom.t_fasilitas
      WHERE nama_fasilitas IN ($fasilitas_list)
      GROUP BY id_tempat
  )
GROUP BY 
    tt.nama_tempat,
    tg.nama_gedung,
    tt.foto_tempat,
    ti.keramaian,
    ti.wifi,
    ti.waktu




    ";

    $hasil=mysqli_query($conn,$sql);
    $row=mysqli_fetch_row($hasil);
    do
    {
    list($nama_tempat,$nama_gedung,$foto_tempat,$fasilitas,$keramaian,$wifi,$waktu)=$row;
    echo "<div class='card'>";
    echo "<img src='$foto_tempat' alt='$nama_tempat'/>";
    echo "<div class='card-content'>";
    echo "<h2 class='card-title'>$nama_tempat</h2>";
    echo "<p class='card-desc'>Keramaian: $keramaian<br>WiFi: $wifi<br>Waktu: $waktu<br>Fasilitas : $fasilitas</p>";
    echo "</div>";
    echo "</div>";
    }
    while($row=mysqli_fetch_row($hasil));
    ?>

  </div>
 