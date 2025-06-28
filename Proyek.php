<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Penilaian Poin</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      height: 100vh;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #2c3e50;
      color: white;
      padding: 20px;
    }

    .header-title {
      font-size: 34px;
      flex-shrink: 0;
      margin-right: 40px;
    }

    .navbar {
      display: flex;
      gap: 15px;
    }

    .nav-link {
      color: white;
      text-decoration: none;
      font-size: 25px;
      padding: 10px 15px;
      border-radius: 5px;
    }

    .nav-link:hover {
      background-color: #34495e;
      padding: 25px;
    }
    
    .nav-link.right-align{
      margin-left: auto;
    }

    .main-content {
      padding: 30px;
      background-color: #fff;
    }
    
    .menu-toggle {
      display: none;
      background-color: #fff;
      color: white;
    }

    /* Sidebar */
    .sidebar {
      display: none;
      flex-direction: column;
      background-color: #2c3e50;
      position: fixed;
      top: 0;
      right: 0;
      width: 220px;
      height: 100%;
      padding: 20px;
      z-index: 999;
      transform: translateX(100%);
      transition: transform 0.3s ease;
    }

    .sidebar.active {
      transform: translateX(0);
      display: flex;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      margin-bottom: 15px;
      font-size: 16px;
      padding: 10px;
      border-radius: 5px;
    }

    .sidebar a:hover {
      background-color: #34495e;
    }
    
  /* layout Proyek terbaru */  
  .proyek-terbaru-section {
  padding: 40px 20px;
  margin-top: 20px;
  background-color: #fff;
  max-height: 900px; /* Tinggi maksimum layout */
  overflow-y: auto; /* Scroll ke bawah jika isi banyak */
}

.proyek-terbaru-container {
  max-width: 1200px;
  margin: auto;
}

.proyek-terbaru-title {
  font-size: 32px;
  margin-bottom: 20px;
  text-align: center;
  color: #2c3e50;
}

.proyek-terbaru-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(380px, 3fr));
  gap: 20px;
}

.proyek-terbaru-card {
  background: white;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  padding: 16px;
  display: flex;
  flex-direction: column;
  text-decoration: none; /* hilangkan underline link */
  color: inherit; /* gunakan warna teks default */
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.proyek-terbaru-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.proyek-terbaru-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 6px;
  margin-bottom: 10px;
}

.proyek-terbaru-card h3 {
  font-size: 34px;
  color: #34495e;
  margin: 10px 0 5px;
}

.proyek-terbaru-card p {
  font-size: 24px;
  color: #555;
  margin-bottom: 5px;
}

.proyek-terbaru-card .deskripsi {
  font-size: 16px;
  color: #666;
  margin-top: 8px;
}

/* Scrollbar styling */
.proyek-terbaru-section::-webkit-scrollbar {
  width: 8px;
}

.proyek-terbaru-section::-webkit-scrollbar-thumb {
  background: #bbb;
  border-radius: 10px;
}

.proyek-terbaru-section::-webkit-scrollbar-thumb:hover {
  background: #999;
}

/* css testimoni */
.testimoni-section {
  padding: 60px 20px;
  background-color: #fff;
}

.testimoni-container {
  max-width: 96%;
  margin: auto;
}

.testimoni-title {
  font-size: 34px;
  margin-bottom: 20px;
  text-align: center;
  color: #2c3e50;
}

/* daftar pesan pelanggan */
.testimoni-list {
  height: 600px; /* Atur tinggi tetap */
  overflow-y: auto; /* Scroll hanya di dalam sini */
  margin-bottom: 20px;
  padding: 15px;
  background-color: #fff;
  border-radius: 10px;
  border: 1px solid #ccc;
  box-shadow: 0 2px 6px rgba(0,0,0,0.08);
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.testimoni-card {
  padding: 10px;
  margin-bottom: 10px;
  background-color: #ecf0f1;
  border-radius: 6px;
  font-size: 24px;
  color: #34495e;
}

/* form input */
.testimoni-form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.testimoni-form input,
.testimoni-form textarea {
  padding: 10px;
  font-size: 24px;
  border: 1px solid #bbb;
  border-radius: 6px;
}

.testimoni-form textarea {
  resize: vertical;
  min-height: 80px;
}

.testimoni-form button {
  padding: 16px;
  font-size: 24px;
  background-color: #2c3e50;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
}

.testimoni-form button:hover {
  background-color: #34495e;
}

.testimoni-list::-webkit-scrollbar {
  width: 8px;
}

.testimoni-list::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 10px;
}

.testimoni-list::-webkit-scrollbar-thumb {
  background: #bbb;
  border-radius: 10px;
}

.testimoni-list::-webkit-scrollbar-thumb:hover {
  background: #999;
}

/* layout sosial media */
.sosmed-section {
  padding: 40px 20px;
  background-color: #fff;
}

.sosmed-container {
  max-width: 97%;
  margin: auto;
}

.sosmed-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
  justify-items: center;
  align-items: center;
}

.sosmed-card {
  background-color: #ecf0f1;
  border-radius: 12px;
  padding: 20px;
  width: 100%;
  height: 150px;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: transform 0.3s;
  text-decoration: none;
}

.sosmed-card:hover {
  transform: scale(1.05);
  cursor: pointer;
}

.sosmed-card img {
  max-height: 80px;
  max-width: 100px;
  object-fit: contain;
}

.site-footer {
  background-color: #2c3e50;
  color: white;
  padding: 30px 20px;
  margin-top: 40px;
}

.footer-container {
  max-width: 960px;
  margin: auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.footer-container p {
  margin: 0 0 10px;
  font-size: 24px;
}
    
    /* Responsive */
    @media (max-width: 768px) {
      .header-title {
        font-size: 24px;
      }
      
      .navbar {
        display: none;
      }
      
      .menu-toggle {
        display: block;
        font-size: 24px;
        border: none;
        color: white !important;
        cursor: pointer;
      }
      
      /* layout proyek terbaru */
      .proyek-terbaru-title {
  font-size: 22px;
}

.proyek-terbaru-card h3 {
  font-size: 18px;
}

.proyek-terbaru-card p {
  font-size: 14px;
 }
 
   /* css Testimoni */
.testimoni-title {
  font-size: 20px;
}

.testimoni-card {
  font-size: 14px;
}

.testimoni-form input,
.testimoni-form textarea,
.testimoni-form button {
  font-size: 14px;
}

/* css sosial media */
.sosmed-grid {
  grid-template-columns: 1fr;
  gap: 20px;
}

.sosmed-card {
  height: 120px;
}

.sosmed-card img {
  max-height: 60px;
}

.site-footer {
  padding: 20px 10px;
}

.footer-container p {
  font-size: 14px;
 }
}
  </style>
</head>

<body>

<div class="header">
  <div class="header-title">Proyek</div>
  <div class="navbar">
    <a href="index.php" class="nav-link">Beranda</a>
    <a href="Proyek.php" class="nav-link">Proyek</a>
    <a href="Kontak1.html" class="nav-link">Kontak</a>
  </div>
  <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
</div>
  
  <!-- Sidebar -->
  <div class="sidebar" id="sidebarMenu">
    <!-- admin, guru, siswa -->
    <a href="index.php">Beranda</a>
    <!-- admin dan guru -->
    <a href="Proyek.php">Proyek</a>
    <!-- admin -->
    <a href="Kontak1.html">Kontak</a>
    <!-- admin dan guru -->
  </div>

<script>
  const sidebar = document.getElementById('sidebarMenu');

  function toggleSidebar() {
    sidebar.classList.toggle('active');
  }

  // Tutup sidebar saat klik di luar
  document.addEventListener('click', function(event) {
    const isClickInside = sidebar.contains(event.target) || event.target.classList.contains('menu-toggle');

    if (!isClickInside && sidebar.classList.contains('active')) {
      sidebar.classList.remove('active');
    }
  });
</script>

<section class="proyek-terbaru-section">
  <div class="proyek-terbaru-container">
    <h2 class="proyek-terbaru-title">Proyek Terbaru</h2>
    
    <div class="proyek-terbaru-grid">
<a href="https://contoh-proyek1.com" target="_blank" class="proyek-terbaru-card">
  <img src="https://via.placeholder.com/400x200.png?text=Proyek+1" alt="Proyek 1">
  <h3>Website E-Commerce</h3>
  <p><strong>Tools:</strong> HTML, CSS, JavaScript</p>
  <p class="deskripsi">Sebuah platform toko online yang responsif dengan fitur keranjang belanja dan pembayaran.</p>
</a>

<!-- Kartu Proyek 2 -->
<a href="https://contoh-proyek2.com" target="_blank" class="proyek-terbaru-card">
  <img src="https://via.placeholder.com/400x200.png?text=Proyek+2" alt="Proyek 2">
  <h3>Aplikasi Kuis Edukasi</h3>
  <p><strong>Tools:</strong> React, Firebase</p>
  <p class="deskripsi">Aplikasi kuis interaktif untuk pelajar dengan fitur penilaian otomatis dan leaderboard.</p>
</a>

<!-- Kartu Proyek 2 -->
<a href="https://contoh-proyek2.com" target="_blank" class="proyek-terbaru-card">
  <img src="https://via.placeholder.com/400x200.png?text=Proyek+2" alt="Proyek 2">
  <h3>Aplikasi Kuis Edukasi</h3>
  <p><strong>Tools:</strong> React, Firebase</p>
  <p class="deskripsi">Aplikasi kuis interaktif untuk pelajar dengan fitur penilaian otomatis dan leaderboard.</p>
</a>

<!-- Kartu Proyek 2 -->
<a href="https://contoh-proyek2.com" target="_blank" class="proyek-terbaru-card">
  <img src="https://via.placeholder.com/400x200.png?text=Proyek+2" alt="Proyek 2">
  <h3>Aplikasi Kuis Edukasi</h3>
  <p><strong>Tools:</strong> React, Firebase</p>
  <p class="deskripsi">Aplikasi kuis interaktif untuk pelajar dengan fitur penilaian otomatis dan leaderboard.</p>
</a>

<!-- Kartu Proyek 2 -->
<a href="https://contoh-proyek2.com" target="_blank" class="proyek-terbaru-card">
  <img src="https://via.placeholder.com/400x200.png?text=Proyek+2" alt="Proyek 2">
  <h3>Aplikasi Kuis Edukasi</h3>
  <p><strong>Tools:</strong> React, Firebase</p>
  <p class="deskripsi">Aplikasi kuis interaktif untuk pelajar dengan fitur penilaian otomatis dan leaderboard.</p>
</a>
    </div>
  </div>
</section>

<section id="testimoni" class="testimoni-section">
  <div class="testimoni-container">
    <h2 class="testimoni-title">Testimoni Pelanggan</h2>

    <!-- Area pesan-pesan -->
 <div class="testimoni-list" id="testimoniList">
  <?php include("testimoni.php"); ?>
      <div class="testimoni-card">
        <p><strong>Rizki:</strong> Sistemnya sangat membantu! 👍</p>
      </div>
      <div class="testimoni-card">
        <p><strong>Santi:</strong> Tampilan dashboardnya keren dan mudah dipakai.</p>
      </div>
      <div class="testimoni-card">
        <p><strong>Santi:</strong> Tampilan dashboardnya keren dan mudah dipakai.</p>
     </div>

    <!-- Form kirim testimoni -->
    <form class="testimoni-form" method="POST" action="simpan_testimoni.php">
      <input type="text" name="nama" placeholder="Nama Anda" required>
      <textarea name="pesan" placeholder="Tulis testimoni Anda..." required></textarea>
      <button type="submit">Kirim</button>
    </form>
  </div>
</section>

<section class="sosmed-section">
  <div class="sosmed-container">
    <div class="sosmed-grid">
      <a href="https://www.facebook.com/nama-akunmu" target="_blank" class="sosmed-card">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook">
      </a>
      <a href="https://www.instagram.com/nama-akunmu" target="_blank" class="sosmed-card">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Instagram">
      </a>
      <a href="https://www.twitter.com/nama-akunmu" target="_blank" class="sosmed-card">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter">
      </a>
    </div>
  </div>
</section>

<footer class="site-footer">
  <div class="footer-container">
    <p>&copy; 2025 Taufikurahman Payapo. All rights reserved.</p>
  </div>
</footer>
</body>
</html>