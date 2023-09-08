<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "spk_pem_kost";

// // Membuat koneksi
// $conn = new mysqli($servername, $username, $password, $database);

// // Memeriksa koneksi
// if ($conn->connect_error) {
//     die("Koneksi gagal: " . $conn->connect_error);
// }

// Konfigurasi database
define('DB_HOST', 'localhost'); // Ganti dengan host database Anda
define('DB_USERNAME', 'root'); // Ganti dengan username database Anda
define('DB_PASSWORD', ''); // Ganti dengan password database Anda
define('DB_NAME', 'ta_vicky'); // Ganti dengan nama database Anda

// Konfigurasi URL
define('BASE_URL', 'http://localhost/ta_vicky/'); // Ganti dengan URL dasar website Anda

// Fungsi untuk menghubungkan ke database
function connectDatabase()
{
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    return $conn;
}

$koneksi = connectDatabase();


// Mendapatkan URL saat ini
$current_url = $_SERVER['REQUEST_URI'];

// Membagi URL menjadi segmen berdasarkan tanda "/" sebagai delimiter
$segments = explode('/', trim($current_url, '/'));


?>