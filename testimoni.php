<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_penilaian"; // Ganti sesuai database kamu

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT nama, pesan, tanggal FROM testimoni ORDER BY tanggal DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<div class='testimoni-card'>";
    echo "<p><strong>" . htmlspecialchars($row['nama']) . ":</strong> " . htmlspecialchars($row['pesan']) . "</p>";
    echo "<small>Dikirim pada: " . $row['tanggal'] . "</small>";
    echo "</div>";
  }
} else {
  echo "<p>Tidak ada testimoni yang tersedia.</p>";
}

$conn->close();
?>
