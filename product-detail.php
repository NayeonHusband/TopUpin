<?php 
include 'assets/includes/header.php';

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = get_product($product_id);

if (!$product) {
    echo "<p>Produk tidak ditemukan.</p>";
    include 'assets/includes/footer.php';
    exit;
}
?>

<section class="product-detail">
    <div class="container">
        <div class="product-image">
            <img src="assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        </div>
        <div class="product-info">
            <h1><?php echo $product['name']; ?></h1>
            <p class="price">Harga: Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
            <p class="description"><?php echo $product['description']; ?></p>
            <form action="cart.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <label for="quantity">Jumlah:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
                <button type="submit" name="add_to_cart" class="btn-buy">Tambah ke Keranjang</button>
            </form>
        </div>
    </div>
</section>

<?php include 'assets/includes/footer.php'; ?>
