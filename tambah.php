<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $kat = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $jumlah = (int)$_POST['jumlah'];
    $kondisi = mysqli_real_escape_string($koneksi, $_POST['kondisi']);
    
    $rand_id = rand(100, 999);
    $kode_aset = "INV-" . strtoupper(substr($kat, 0, 3)) . "-" . $rand_id;
    $status = "Available";

    $query = "INSERT INTO inventaris (kode_aset, nama_barang, kategori, stok, kondisi, status_barang) 
              VALUES ('$kode_aset', '$nama', '$kat', '$jumlah', '$kondisi', '$status')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Aset sukses disimpan!'); window.location.href='inventaris.php';</script>";
    } else {
        echo "<script>alert('Gagal: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Tambah Barang - InvenTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style>body { font-family: 'Be Vietnam Pro', sans-serif; }</style>
</head>
<body class="bg-[#f8f9ff] flex text-gray-800 min-h-screen">
    <aside class="w-64 bg-white border-r border-gray-100 fixed h-full p-6 flex flex-col justify-between">
        <div class="space-y-8">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[#005c55] text-3xl font-bold">shield</span>
                <div><h1 class="text-lg font-bold text-[#005c55]">InvenTrack</h1><p class="text-[9px] uppercase tracking-wider text-gray-400 font-bold">Rental PN UTM</p></div>
            </div>
            <nav class="space-y-1">
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-500 hover:bg-gray-50 text-sm" href="dashboard.php"><span class="material-symbols-outlined text-xl">grid_view</span> Dashboard</a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-500 hover:bg-gray-50 text-sm" href="inventaris.php"><span class="material-symbols-outlined text-xl">inventory_2</span> Inventaris</a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#005c55]/5 text-[#005c55] font-semibold text-sm" href="tambah.php"><span class="material-symbols-outlined text-xl">add_circle</span> Tambah Barang</a>
            </nav>
        </div>
        <a class="flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg text-sm font-semibold" href="index.php"><span class="material-symbols-outlined text-xl">logout</span> Keluar</a>
    </aside>

    <div class="flex-1 ml-64 flex flex-col">
        <header class="h-16 border-b border-gray-100 bg-white/80 backdrop-blur px-8 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-lg font-bold text-gray-700">Registrasi Barang Baru</h2>
        </header>

        <main class="p-8 max-w-2xl">
            <form method="POST" action="" class="bg-white p-8 rounded-xl border border-gray-100 shadow-sm space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Barang</label>
                    <input type="text" name="nama_barang" placeholder="Misal: Golok Seni, Sabuk, dll." required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#005c55]/20 focus:border-[#005c55] outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <select name="kategori" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#005c55]/20 focus:border-[#005c55] outline-none">
                        <option value="Latihan & Tanding">Latihan & Tanding</option>
                        <option value="Perlengkapan Seni">Perlengkapan Seni</option>
                        <option value="Fasilitas Penunjang">Fasilitas Penunjang</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah / Stok</label>
                    <input type="number" name="jumlah" placeholder="0" min="1" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#005c55]/20 focus:border-[#005c55] outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kondisi Fisik</label>
                    <select name="kondisi" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#005c55]/20 focus:border-[#005c55] outline-none">
                        <option value="Sangat Baik">Sangat Baik</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                    </select>
                </div>
                <div class="pt-4 flex justify-end gap-3">
                    <a href="inventaris.php" class="px-5 py-2.5 rounded-lg border border-gray-200 text-gray-500 font-semibold text-sm hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-[#005c55] hover:bg-[#0f766e] text-white font-bold rounded-lg text-sm shadow-sm">Simpan Aset</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>