<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Produk</h1>
    <div class="flex flex-col md:flex-row gap-6">
        <aside class="w-full md:w-1/4">
            <form method="GET" class="space-y-4">
                <input type="text" name="search" placeholder="Cari..." value="<?= $search ?>" class="w-full rounded border-gray-300">
                <select name="category" class="w-full rounded border-gray-300">
                    <option value="">Semua Kategori</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['slug'] ?>" <?= $category == $cat['slug'] ? 'selected' : '' ?>><?= $cat['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="brand" class="w-full rounded border-gray-300">
                    <option value="">Semua Brand</option>
                    <?php foreach ($brands as $b): ?>
                        <option value="<?= $b['slug'] ?>" <?= $brand == $b['slug'] ? 'selected' : '' ?>><?= $b['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="sort" class="w-full rounded border-gray-300">
                    <option value="newest" <?= $sort == 'newest' ? 'selected' : '' ?>>Terbaru</option>
                    <option value="price_asc" <?= $sort == 'price_asc' ? 'selected' : '' ?>>Harga Terendah</option>
                    <option value="price_desc" <?= $sort == 'price_desc' ? 'selected' : '' ?>>Harga Tertinggi</option>
                </select>
                <button type="submit" class="w-full bg-rose-500 text-white py-2 rounded">Filter</button>
            </form>
        </aside>
        <div class="flex-1">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
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
            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                <?php if ($totalPages > 1): ?>
                    <nav class="inline-flex">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a href="?<?= http_build_query(array_merge($_GET, ['page'=>$i])) ?>" class="px-3 py-2 border <?= $i==$page?'bg-rose-500 text-white':'hover:bg-gray-100' ?>"><?= $i ?></a>
                        <?php endfor; ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
