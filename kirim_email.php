<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Konfigurasi database (XAMPP)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_penilaian"; // Ganti dengan nama database kamu

// Ambil data dari form
$nama   = htmlspecialchars($_POST["nama"]);
$email  = htmlspecialchars($_POST["email"]);
$subjek = htmlspecialchars($_POST["subjek"]);
$pesan  = htmlspecialchars($_POST["pesan"]);

// Simpan ke database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO pesan_kontak (nama, email, subjek, pesan) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nama, $email, $subjek, $pesan);
$stmt->execute();
$stmt->close();
$conn->close();

// Kirim email
$mail = new PHPMailer(true);

try {
    // SMTP Gmail
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'taufikpayapo7@gmail.com';       // Ganti
    $mail->Password   = 'taufik 12345678@';        // Ganti
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Dari dan ke
   $mail->setFrom('taufikpayapo7@gmail.com', 'Nama Kamu'); // Harus email yang sama dengan SMTP Username
$mail->addReplyTo($email, $nama);  // Buat balasan email
$mail->addAddress('taufikpayapo7@gmail.com'); // Tujuan email kamu


    // Isi email
    $mail->isHTML(false);
    $mail->Subject = $subjek;
    $mail->Body    = "Nama: $nama\nEmail: $email\n\nPesan:\n$pesan";

    $mail->send();
    echo "<script>alert('Pesan berhasil dikirim dan disimpan!'); window.location.href = 'index.php';</script>";
} catch (Exception $e) {
    echo "Gagal kirim email. Error: {$mail->ErrorInfo}";
}
?>
