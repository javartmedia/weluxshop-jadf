<div>
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow">
            <h3 class="text-gray-500 dark:text-gray-300">Produk</h3>
            <p class="text-3xl font-bold"><?= $stats['products'] ?></p>
        </div>
        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow">
            <h3 class="text-gray-500 dark:text-gray-300">Pesanan</h3>
            <p class="text-3xl font-bold"><?= $stats['orders'] ?></p>
        </div>
        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow">
            <h3 class="text-gray-500 dark:text-gray-300">Pelanggan</h3>
            <p class="text-3xl font-bold"><?= $stats['customers'] ?></p>
        </div>
        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow">
            <h3 class="text-gray-500 dark:text-gray-300">Pendapatan</h3>
            <p class="text-3xl font-bold"><?= formatRupiah($stats['revenue']) ?></p>
        </div>
    </div>
    <div class="mt-8 bg-white dark:bg-gray-700 p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Grafik Penjualan (30 Hari)</h2>
        <canvas id="salesChart" height="100"></canvas>
    </div>
    <div class="mt-8 bg-white dark:bg-gray-700 p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Produk Terlaris</h2>
        <ul>
            <?php foreach ($topProducts as $product): ?>
                <li class="flex justify-between py-2 border-b dark:border-gray-600">
                    <span><?= $product['name'] ?></span>
                    <span class="font-bold"><?= $product['sold'] ?> terjual</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('salesChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode(array_column($salesChart, 'date')) ?>,
        datasets: [{
            label: 'Penjualan',
            data: <?= json_encode(array_column($salesChart, 'total')) ?>,
            borderColor: '#f43f5e',
            tension: 0.1
        }]
    }
});
</script>
