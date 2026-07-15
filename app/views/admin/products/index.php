<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Produk</h1>
        <a href="/admin/products/create" class="bg-rose-500 text-white px-4 py-2 rounded">Tambah Produk</a>
    </div>
    <div class="bg-white dark:bg-gray-700 shadow overflow-hidden rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Gambar</th>
                    <th class="px-6 py-3 text-left">Nama</th>
                    <th class="px-6 py-3">Harga</th>
                    <th class="px-6 py-3">Stok</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="px-6 py-4"><img src="/<?= $product['image'] ?>" alt="" class="w-12 h-12 object-cover rounded"></td>
                    <td class="px-6 py-4"><?= $product['name'] ?></td>
                    <td class="px-6 py-4 text-center"><?= formatRupiah($product['price']) ?></td>
                    <td class="px-6 py-4 text-center"><?= $product['stock'] ?></td>
                    <td class="px-6 py-4 text-center">
                        <a href="/admin/products/edit/<?= $product['id'] ?>" class="text-blue-500 mr-2">Edit</a>
                        <a href="/admin/products/delete/<?= $product['id'] ?>" onclick="return confirm('Yakin?')" class="text-red-500">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
