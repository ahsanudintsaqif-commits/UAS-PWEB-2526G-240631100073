<?php
session_start();
require_once 'koneksi.php';
$data = ambilSemuaInventaris($koneksi);
$total_items = count($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Dashboard - InvenTrack Rental</title>
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
                <div>
                    <h1 class="text-lg font-bold text-[#005c55]">InvenTrack</h1>
                    <p class="text-[9px] uppercase tracking-wider text-gray-400 font-bold">Rental PN UTM</p>
                </div>
            </div>
            <nav class="space-y-1">
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#005c55]/5 text-[#005c55] font-semibold text-sm" href="dashboard.php"><span class="material-symbols-outlined text-xl">grid_view</span> Dashboard</a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-500 hover:bg-gray-50 text-sm" href="inventaris.php"><span class="material-symbols-outlined text-xl">inventory_2</span> Inventaris</a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-500 hover:bg-gray-50 text-sm" href="tambah.php"><span class="material-symbols-outlined text-xl">add_circle</span> Tambah Barang</a>
            </nav>
        </div>
        <a class="flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg text-sm font-semibold" href="index.php"><span class="material-symbols-outlined text-xl">logout</span> Keluar</a>
    </aside>

    <div class="flex-1 ml-64 flex flex-col">
        <header class="h-16 border-b border-gray-100 bg-white/80 backdrop-blur px-8 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-lg font-bold text-gray-700">Beranda Sistem</h2>
            <div class="flex items-center gap-3">
                <div class="text-right"><p class="text-sm font-bold">Tsaqif Ahsanuddin</p><p class="text-[10px] text-gray-400">240631100073</p></div>
                <div class="w-8 h-8 rounded-full bg-[#005c55] text-white flex items-center justify-center font-bold text-xs">TA</div>
            </div>
        </header>

        <main class="p-8 space-y-8">
            <section class="bg-[#0a4d46] text-white p-10 rounded-xl flex items-center gap-8 shadow-sm">
                <div class="w-24 h-24 bg-white/10 rounded-full flex items-center justify-center text-4xl">🥋</div>
                <div>
                    <h3 class="text-2xl font-bold mb-2">Selamat Datang di InvenTrack Pagar Nusa UTM</h3>
                    <p class="text-sm text-emerald-100/80 max-w-xl">Kelola, pantau, dan amankan distribusi aset perlengkapan pencak silat dalam satu sistem pangkalan data terpusat.</p>
                </div>
            </section>

            <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex items-center gap-5">
                    <div class="w-12 h-12 rounded-lg bg-emerald-50 text-[#005c55] flex items-center justify-center"><span class="material-symbols-outlined text-2xl">inventory</span></div>
                    <div><p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Total Ragam Aset</p><h4 class="text-2xl font-bold"><?= $total_items; ?> Kategori</h4></div>
                </div>
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex items-center gap-5">
                    <div class="w-12 h-12 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center"><span class="material-symbols-outlined text-2xl">sync_alt</span></div>
                    <div><p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Status Operasional</p><h4 class="text-2xl font-bold">Aktif</h4></div>
                </div>
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex items-center gap-5">
                    <div class="w-12 h-12 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center"><span class="material-symbols-outlined text-2xl">verified_user</span></div>
                    <div><p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Hak Akses</p><h4 class="text-2xl font-bold">Administrator</h4></div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>