<?php 
include 'assets/includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    add_to_cart($product_id, $quantity);
}

$cart_items = [];
$total = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $product = get_product($product_id);
        if ($product) {
            $cart_items[] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'subtotal' => $product['price'] * $quantity
            ];
            $total += $product['price'] * $quantity;
        }
    }
}
?>

<section class="cart">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <?php if (empty($cart_items)): ?>
            <p>Keranjang belanja Anda kosong.</p>
        <?php else: ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td>Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>Rp <?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
                            <td>
                                <form action="cart.php" method="POST">
                                    <input type="hidden" name="remove_from_cart" value="<?php echo $item['id']; ?>">
                                    <button type="submit" class="btn-remove">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td><strong>Rp <?php echo number_format($total, 0, ',', '.'); ?></strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="cart-actions">
                <a href="products.php" class="btn-secondary">Lanjutkan Belanja</a>
                <a href="checkout.php" class="btn-primary">Proses Pembayaran</a>
            </div>
        <?php endif; ?>
    </div>
</
