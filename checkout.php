<?php 
include 'assets/includes/header.php';

// Pastikan pengguna sudah login sebelum checkout
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Ambil data keranjang dari session
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<section class="checkout">
    <div class="container">
        <h1>Checkout</h1>
        <form action="process_order.php" method="POST">
            <div class="form-group">
                <label for="name">Nama Lengkap:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat Pengiriman:</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <h2>Ringkasan Pesanan</h2>
            <table class="order-summary">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>Rp <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php $total += $item['price'] * $item['quantity']; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"><strong>Total</strong></td>
                        <td><strong>Rp <?php echo number_format($total, 0, ',', '.'); ?></strong></td>
                    </tr>
                </tfoot>
            </table>
            <button type="submit" class="btn-primary">Proses Pembayaran</button>
        </form>
    </div>
</section>

<?php include 'assets/includes/footer.php'; ?>
