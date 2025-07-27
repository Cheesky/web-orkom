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
      padding: 20px 40px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
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
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
    }

    input[type="text"],
    input[type="file"],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 2px solid #e0e0e0;
      border-radius: 12px;
      outline-color: #;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .btn {
      background-color: #7886C7;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      transition: 0.3s ease;
      font-weight: 600;
    }

    .btn:hover {
      background-color: #732d91;
    }

    .flex-buttons {
      display: flex;
      justify-content: space-between;
      gap: 20px;
    }

    @media (max-width: 600px) {
      .flex-buttons {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>SPOT!</h1>
    <nav>
      
      <a href="index.php" style="color:white; text-decoration:none; font-weight:600;">Home</a>
    </nav>
  </header>

  <div class="container">
    <h2><img src="icon_search.png"> Cari Spot</h2>
    <form action="proses_cari.php" method="post">
      <div class="form-group">
        <label for="gedung">Lokasi Gedung</label>
        <select id="gedung" name="gedung">
          <option value="">-- Pilih --</option>
          <option value="Gedung Lama">Gedung Lama</option>
          <option value="Gedung Baru">Gedung Baru</option>
        </select>
      </div>
      <div class="form-group">
        <label for="intensitas">Intensitas Keramaian</label>
        <select id="intensitas" name="intensitas">
          <option value="">-- Pilih --</option>
          <option value="sepi">Sepi</option>
          <option value="sedang">Sedang</option>
          <option value="ramai">Ramai</option>
        </select>
      </div>
      <div class="form-group">
        <label for="wifi">Kecepatan Wifi</label>
        <select id="wifi" name="wifi">
          <option value="">-- Pilih --</option>
          <option value="lambat">Lambat</option>
          <option value="sedang">Sedang</option>
          <option value="cepat">Cepat</option>
        </select>
      </div>
      <div class="form-group">
        <label for="fasilitas">Fasilitas (bisa pilih lebih dari satu)</label>
        <label><input type="checkbox" name="toilet"> Dekat toilet</label>
        <label><input type="checkbox" name="colokan"> Ada Charger</label>
        <label><input type="checkbox" name="ac"> AC</label>
      </div>
      <div class="form-group">
        <label for="waktu">Waktu</label>
        <select id="waktu" name="waktu">
          <option value="">-- Pilih --</option>
          <option value="pagi">Pagi</option>
          <option value="siang">Siang</option>
          <option value="sore">Sore</option>
        </select>
      </div>
      <button type="submit" class="btn">Cari Spot</button>
    </form>
  </div>

 