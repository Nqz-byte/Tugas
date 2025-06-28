<?php
// Konfigurasi koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_penilaian"; // Ganti dengan nama database kamu

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = htmlspecialchars($_POST['nama']);
$pesan = htmlspecialchars($_POST['pesan']);

// Validasi sederhana
if (!empty($nama) && !empty($pesan)) {
    // Siapkan dan eksekusi query
    $stmt = $conn->prepare("INSERT INTO testimoni (nama, pesan) VALUES (?, ?)");
    $stmt->bind_param("ss", $nama, $pesan);

    if ($stmt->execute()) {
        echo "<script>
                alert('Testimoni berhasil dikirim!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Gagal menyimpan testimoni: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Nama dan pesan tidak boleh kosong.";
}

$conn->close();
?>
