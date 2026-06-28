<?php
require_once 'koneksi.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = "DELETE FROM inventaris WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Barang berhasil dihapus!'); window.location.href='inventaris.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus aset!'); window.location.href='inventaris.php';</script>";
    }
} else {
    header("Location: inventaris.php");
    exit;
}
?>