<?php
$host     = "localhost";
$username = "root";
$password = "";
$database = "inventrack_db";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) { // Percabangan cek koneksi
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi 1: Mengambil data barang (Read)
function ambilSemuaInventaris($koneksi) {
    $query = "SELECT * FROM inventaris ORDER BY id DESC";
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi 2: Pewarnaan badge status otomatis
function dapatkanBadgeStatus($status) {
    switch (strtolower($status)) {
        case 'available':
            return 'bg-[#005c55]/10 text-[#005c55] border border-[#005c55]/20';
        case 'rented':
            return 'bg-red-100 text-red-700 border border-red-200';
        case 'maintenance':
            return 'bg-amber-100 text-amber-700 border border-amber-200';
        default:
            return 'bg-gray-100 text-gray-700';
    }
}
?>