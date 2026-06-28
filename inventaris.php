<?php
require_once 'koneksi.php';
$data_barang = ambilSemuaInventaris($koneksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Data Inventaris - InvenTrack</title>
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
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#005c55]/5 text-[#005c55] font-semibold text-sm" href="inventaris.php"><span class="material-symbols-outlined text-xl">inventory_2</span> Inventaris</a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-500 hover:bg-gray-50 text-sm" href="tambah.php"><span class="material-symbols-outlined text-xl">add_circle</span> Tambah Barang</a>
            </nav>
        </div>
        <a class="flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg text-sm font-semibold" href="index.php"><span class="material-symbols-outlined text-xl">logout</span> Keluar</a>
    </aside>

    <div class="flex-1 ml-64 flex flex-col">
        <header class="h-16 border-b border-gray-100 bg-white/80 backdrop-blur px-8 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-lg font-bold text-gray-700">Daftar Manajemen Barang</h2>
            <a href="tambah.php" class="bg-[#005c55] hover:bg-[#0f766e] text-white px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 shadow-sm">+ Tambah Barang</a>
        </header>

        <main class="p-8">
            <div class="bg-white rounded-xl border border-gray-100 overflow-hidden shadow-sm">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/70 border-b border-gray-100 text-xs font-bold uppercase text-gray-400 tracking-wider">
                            <th class="px-6 py-4">Item</th>
                            <th class="px-6 py-4">Kategori</th>
                            <th class="px-6 py-4">Stok</th>
                            <th class="px-6 py-4">Kondisi</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php if (empty($data_barang)): ?>
                            <tr><td colspan="6" class="px-6 py-8 text-center text-gray-400">Belum ada data barang tercatat.</td></tr>
                        <?php else: ?>
                            <?php foreach ($data_barang as $barang): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-semibold text-gray-800 text-sm"><?= htmlspecialchars($barang['nama_barang']); ?></p>
                                    <p class="text-[11px] text-gray-400 font-mono"><?= $barang['kode_aset']; ?></p>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500"><?= htmlspecialchars($barang['kategori']); ?></td>
                                <td class="px-6 py-4 text-sm font-medium"><?= $barang['stok']; ?> Pcs</td>
                                <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($barang['kondisi']); ?></td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-block px-3 py-1 rounded-full text-[11px] font-bold <?= dapatkanBadgeStatus($barang['status_barang']); ?>">
                                        <?= $barang['status_barang']; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="edit.php?id=<?= $barang['id']; ?>" class="text-[#005c55] hover:underline text-sm font-semibold">Edit</a>
                                    <a href="hapus.php?id=<?= $barang['id']; ?>" onclick="return confirm('Hapus barang ini dari sistem?')" class="text-red-600 hover:underline text-sm font-semibold">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>