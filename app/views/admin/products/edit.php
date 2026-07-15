<div>
    <h1 class="text-2xl font-bold mb-6"><?= isset($product) ? 'Edit Produk' : 'Tambah Produk' ?></h1>
    <form action="<?= isset($product) ? '/admin/products/update/'.$product['id'] : '/admin/products/store' ?>" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-700 p-6 rounded shadow space-y-4 max-w-2xl">
        <?= csrf_field() ?>
        <div>
            <label class="block text-sm font-medium">Nama Produk</label>
            <input type="text" name="name" value="<?= old('name', $product['name'] ?? '') ?>" required class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-900 dark:border-gray-600 focus:ring-rose-500">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium">SKU</label>
                <input type="text" name="sku" value="<?= old('sku', $product['sku'] ?? '') ?>" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-900 dark:border-gray-600">
            </div>
            <div>
                <label class="block text-sm font-medium">Harga</label>
                <input type="number" name="price" value="<?= old('price', $product['price'] ?? '') ?>" required class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-900 dark:border-gray-600">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium">Kategori</label>
            <select name="category_id" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-900 dark:border-gray-600">
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= (($product['category_id'] ?? '') == $cat['id']) ? 'selected' : '' ?>><?= $cat['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium">Brand</label>
            <select name="brand_id" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-900 dark:border-gray-600">
                <?php foreach ($brands as $brand): ?>
                    <option value="<?= $brand['id'] ?>" <?= (($product['brand_id'] ?? '') == $brand['id']) ? 'selected' : '' ?>><?= $brand['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium">Gambar</label>
            <input type="file" name="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
            <?php if (isset($product['image'])): ?>
                <img src="/<?= $product['image'] ?>" class="mt-2 w-24 h-24 object-cover rounded">
            <?php endif; ?>
        </div>
        <button type="submit" class="bg-rose-500 text-white px-6 py-2 rounded">Simpan</button>
    </form>
</div>
