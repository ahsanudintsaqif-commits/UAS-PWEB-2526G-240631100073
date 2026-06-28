<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    if ($password === 'admin123') { // Autentikasi statis sederhana untuk UAS
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Password salah! (Gunakan password: admin123)";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login | InvenTrack PAGAR NUSA UTM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style>body { font-family: 'Be Vietnam Pro', sans-serif; }</style>
</head>
<body class="min-h-screen flex items-center justify-center bg-[#f8f9ff] p-4">
    <main class="w-full max-w-[1100px] bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row min-h-[600px]">
        <section class="hidden md:flex md:w-1/2 bg-[#005c55] text-white flex-col justify-between p-12">
            <div>
                <div class="flex items-center gap-4 mb-12">
                    <div class="w-12 h-12 bg-white rounded-lg p-2 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[#005c55] text-3xl font-bold">shield</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">InvenTrack</h1>
                        <p class="text-[10px] tracking-widest opacity-80 uppercase">PAGAR NUSA UTM</p>
                    </div>
                </div>
                <h2 class="text-4xl font-bold mb-6 leading-tight">Lestarikan Budaya Melalui Digitalisasi</h2>
                <p class="opacity-80">Sistem manajemen inventaris terintegrasi yang dirancang untuk memfasilitasi administrasi UKM Pagar Nusa Universitas Trunojoyo Madura.</p>
            </div>
            <p class="text-xs opacity-60">© 2026 Pendidikan Informatika UTM</p>
        </section>

        <section class="w-full md:w-1/2 flex flex-col justify-center p-8 md:p-12">
            <div class="w-full max-w-sm mx-auto">
                <h3 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang</h3>
                <p class="text-gray-500 mb-8 text-sm">Masuk ke dashboard untuk mengelola inventaris organisasi.</p>
                
                <?php if(isset($error)): ?>
                    <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-4 border border-red-200"><?= $error; ?></div>
                <?php endif; ?>

                <form method="POST" action="" class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email atau Username</label>
                        <input class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#005c55]/20 focus:border-[#005c55] outline-none" name="email" placeholder="admin@pagarnusa.utm" required type="text"/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#005c55]/20 focus:border-[#005c55] outline-none" name="password" placeholder="••••••••" required type="password"/>
                    </div>
                    <button type="submit" name="login" class="w-full py-3.5 bg-[#005c55] hover:bg-[#0f766e] text-white font-semibold rounded-lg shadow-md transition-all">Masuk Sekarang</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>