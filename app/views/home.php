<!-- Hero Slider -->
<section class="relative">
    <div class="swiper-container h-96">
        <div class="swiper-wrapper">
            <?php foreach ($banners as $banner): ?>
            <div class="swiper-slide bg-cover bg-center" style="background-image: url('/<?= $banner['image'] ?>');">
                <div class="h-full flex items-center bg-black bg-opacity-40">
                    <div class="container mx-auto px-4 text-white">
                        <h1 class="text-4xl md:text-6xl font-bold"><?= $banner['title'] ?></h1>
                        <p class="mt-4 text-lg"><?= $banner['subtitle'] ?></p>
                        <a href="<?= $banner['link'] ?>" class="mt-6 inline-block bg-rose-500 hover:bg-rose-600 px-6 py-3 rounded-full text-lg">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Kategori -->
<section class="py-12 container mx-auto px-4">
    <h2 class="text-3xl font-semibold text-center mb-8">Kategori Produk</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php foreach ($categories as $cat): ?>
        <a href="/products?category=<?= $cat['slug'] ?>" class="bg-rose-50 p-4 rounded-lg text-center hover:shadow-md transition">
            <img src="/<?= $cat['image'] ?>" alt="<?= $cat['name'] ?>" class="w-16 h-16 mx-auto rounded-full object-cover">
            <h3 class="mt-3 font-medium"><?= $cat['name'] ?></h3>
        </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- Produk Terbaru -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-semibold text-center mb-8">Produk Terbaru</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php foreach ($products as $product): ?>
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <a href="/product/<?= $product['slug'] ?>">
                    <img src="/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="w-full h-48 object-cover rounded-t-lg">
                </a>
                <div class="p-4">
                    <h3 class="font-medium"><?= $product['name'] ?></h3>
                    <p class="text-rose-500 font-bold mt-1"><?= formatRupiah($product['sale_price'] ?: $product['price']) ?></p>
                    <button class="add-to-cart mt-3 w-full bg-rose-500 text-white py-2 rounded-full" data-id="<?= $product['id'] ?>">+ Keranjang</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Produk Terlaris, Testimoni, Artikel dll. Similar sections -->
<!-- (other sections omitted for brevity but would follow same pattern) -->
