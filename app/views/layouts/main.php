<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'WeluxShop' ?></title>
    <meta name="description" content="<?= $meta_description ?? 'Beauty Clinic & Skincare E-Commerce' ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-800">
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <!-- Navbar implemented inline -->
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/" class="text-3xl font-bold text-rose-500">WeluxShop</a>
            <nav class="hidden md:flex space-x-6">
                <a href="/" class="hover:text-rose-500">Home</a>
                <a href="/products" class="hover:text-rose-500">Produk</a>
                <a href="/treatments" class="hover:text-rose-500">Treatment</a>
                <a href="/articles" class="hover:text-rose-500">Artikel</a>
                <a href="/promos" class="hover:text-rose-500">Promo</a>
                <a href="/contact" class="hover:text-rose-500">Kontak</a>
            </nav>
            <div class="flex items-center space-x-4">
                <?php if (isLoggedIn()): ?>
                    <a href="/cart" class="relative"><svg>...</svg><span id="cart-count" class="absolute -top-2 -right-2 bg-rose-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">0</span></a>
                    <a href="/account" class="hover:text-rose-500">Akun</a>
                    <a href="/logout" class="hover:text-rose-500">Logout</a>
                <?php else: ?>
                    <a href="/login" class="hover:text-rose-500">Masuk</a>
                    <a href="/register" class="bg-rose-500 text-white px-4 py-2 rounded-full">Daftar</a>
                <?php endif; ?>
            </div>
            <button id="mobile-menu-button" class="md:hidden">☰</button>
        </div>
        <!-- Mobile menu -->
    </header>
    <main class="min-h-screen">
        <?= $content ?>
    </main>
    <!-- Footer Premium -->
    <footer class="bg-gray-900 text-white py-10">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h4 class="text-xl font-bold text-rose-400 mb-4">WeluxShop</h4>
                <p>Klinik Kecantikan & Skincare Premium terpercaya.</p>
            </div>
            <div>
                <h5 class="font-semibold mb-2">Informasi</h5>
                <ul class="space-y-1">
                    <li><a href="/about" class="hover:text-rose-400">Tentang Kami</a></li>
                    <li><a href="/contact" class="hover:text-rose-400">Kontak</a></li>
                    <li><a href="/faq" class="hover:text-rose-400">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-semibold mb-2">Layanan</h5>
                <ul class="space-y-1">
                    <li><a href="/treatments" class="hover:text-rose-400">Treatment</a></li>
                    <li><a href="/products" class="hover:text-rose-400">Produk</a></li>
                    <li><a href="/booking" class="hover:text-rose-400">Booking</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-semibold mb-2">Ikuti Kami</h5>
                <div class="flex space-x-3">
                    <!-- social icons -->
                </div>
            </div>
        </div>
        <div class="text-center mt-8 text-gray-400 text-sm">© <?= date('Y') ?> WeluxShop. All rights reserved.</div>
    </footer>
    <script src="/assets/js/app.js"></script>
</body>
</html>
