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
    
/* css untuk layout foto profil */
.profile-section {
  display: flex;
  align-items: center;
  padding: 50px;
  background-color: #fff !important;
  gap: 20px;
}

.profile-pic {
  width: 250px;
  height: 250px;
  border-radius: 50%; /* Membuat foto bulat */
  object-fit: cover;
  border: 4px solid #2c3e50;
}

.profile-text h2 {
  margin: 0 0 10px;
  font-size: 34px;
  color: #2c3e50;
}

.profile-text p {
  margin: 0;
  font-size: 24px;
  color: #34495e;
}

/* layout keahlian */
.keahlian-section {
  padding: 40px 20px;
  background-color: #fff;
}

.keahlian-container {
  max-width: 900px;
  margin: auto;
}

.keahlian-title {
  font-size: 32px;
  margin-bottom: 20px;
  text-align: center;
  color: #333;
}

.keahlian-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
}

.keahlian-card {
  flex: 1 1 250px;
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.keahlian-card h3 {
  margin-bottom: 10px;
  color: #1a1a1a;
  font-size: 34px;
}

.keahlian-card ul {
  list-style-type: disc;
  padding-left: 20px;
  color: #555;
}

.keahlian-card ul li {
  margin-bottom: 6px;
  font-size: 24px;
}

/* css proyek Unggulan */
.proyek-section {
  padding: 40px 20px;
  background-color: #fff;
}

.proyek-container {
  max-width: 97%;
  margin: auto;
}

.proyek-title {
  font-size: 32px;
  margin-bottom: 20px;
  text-align: center;
  color: #2c3e50;
}

.proyek-scroll {
  display: flex;
  flex-direction: column;
  gap: 20px;
  max-height: 400px; /* Tinggi area scroll */
  overflow-y: auto;
  padding-right: 10px;
}

.proyek-card {
  min-width: 340px;
  background: white;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  flex-shrink: 0;
  padding: 15px;
}

.proyek-card img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 10px;
}

.proyek-card h3 {
  margin: 10px 0 5px;
  font-size: 34px;
  color: #34495e;
}

.proyek-card p {
  font-size: 24px;
  color: #555;
}

/* Scrollbar halus untuk proyek (opsional styling scroll) */
.proyek-scroll::-webkit-scrollbar {
  height: 8px;
}

.proyek-scroll::-webkit-scrollbar-thumb {
  background-color: #ccc;
  border-radius: 10px;
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
      
      /* css untuk layout foto profil */
    .profile-section {
    flex-direction: column;
    text-align: center;
  }
  .profile-text h2 {
  font-size: 18px;
}
  .profile-text p {
  font-size: 14px;
}

/* layout keahlian */
  .keahlian-grid {
    flex-direction: column;
    align-items: center;
  }

  .keahlian-card {
    flex: 1 1 100%;
    max-width: 90%;
  }

  .keahlian-title {
    font-size: 16px;
  }
  
  /* css proyek Unggulan */
  .proyek-title {
    font-size: 22px;
  }

  .proyek-card {
    min-width: 80%;
    padding: 12px;
  }

  .proyek-card img {
    height: 160px;
  }

  .proyek-card h3 {
    font-size: 18px;
  }

  .proyek-card p {
    font-size: 13px;
  }

  .proyek-scroll {
    gap: 15px;
    padding-bottom: 8px;
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
  <div class="header-title">Dashboard</div>
  <div class="navbar">
    <a href="Dashboard.php" class="nav-link">Beranda</a>
    <a href="Proyek.php" class="nav-link">Proyek</a>
    <a href="Kontak1.html" class="nav-link">Kontak</a>
  </div>
  <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
</div>
  
  <!-- Sidebar -->
  <div class="sidebar" id="sidebarMenu">
    <!-- admin, guru, siswa -->
    <a href="Dashboard.php">Beranda</a>
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

<div class="profile-section">
  <img src="IMG-20250420-WA0003.jpg" alt="Foto Profil" class="profile-pic">
  <div class="profile-text">
    <h2>Tentang Saya</h2>
    <p>Halo! Nama saya Taufik, seorang mahasiswa Ilmu Komputer yang bersemangat dalam dunia teknologi, desain, dan pengembangan web. Saya percaya bahwa teknologi bukan hanya alat, tetapi jembatan untuk menciptakan solusi, membagikan ide, dan memperkuat dampak sosial.

Saya sedang menempuh pendidikan di jurusan Ilmu Komputer, dengan fokus pada pengembangan perangkat lunak, desain antarmuka, dan analisis data. Di sela kuliah, saya aktif mengerjakan proyek-proyek pribadi dan kolaboratif, seperti membuat sistem informasi sekolah, desain UI/UX, dan konten edukatif untuk media sosial.</p>
  </div>
</div>

<section id="keahlian" class="keahlian-section">
  <div class="keahlian-container">
    <h2 class="keahlian-title">Keahlian Saya</h2>

    <div class="keahlian-grid">
      <div class="keahlian-card">
        <h3>Frontend Development</h3>
        <ul>
          <li>HTML, CSS, JavaScript</li>
          <li>Responsive Web Design</li>
          <li>Bootstrap</li>
        </ul>
      </div>

      <div class="keahlian-card">
        <h3>Programming & Tools</h3>
        <ul>
          <li>Python, C++, JavaScript</li>
          <li>Figma, Canva</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="proyek" class="proyek-section">
  <div class="proyek-container">
    <h2 class="proyek-title">Proyek Unggulan</h2>

    <div class="proyek-scroll">
      <div class="proyek-card">
        <img src="project1.jpg" alt="Proyek 1">
        <h3>Sistem Informasi Sekolah</h3>
        <p>Aplikasi web untuk manajemen data siswa, guru, dan nilai.</p>
      </div>

      <div class="proyek-card">
        <img src="project2.jpg" alt="Proyek 2">
        <h3>Website Lembaga Dakwah Kampus</h3>
        <p>Website yang menampilkan informasi mengenai Lembaga Dakwah Kampus</p>
      </div>

      <div class="proyek-card">
        <img src="project3.jpg" alt="Proyek 3">
        <h3>Dashboard Penilaian Poin</h3>
        <p>Dashboard interaktif untuk pelaporan dan pemantauan poin siswa.</p>
      </div>
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