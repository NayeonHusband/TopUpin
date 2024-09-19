<?php include 'assets/includes/header.php'; ?>

<section class="products">
    <div class="container">
        <h1>Daftar Produk</h1>
        <div class="product-grid">
            <?php
            $products = get_products();
            foreach ($products as $product) {
                echo '<div class="product-card">';
                echo '<img src="assets/images/' . $product['image'] . '" alt="' . $product['name'] . '">';
                echo '<h3>' . $product['name'] . '</h3>';
                echo '<p>Harga: Rp ' . number_format($product['price'], 0, ',', '.') . '</p>';
                echo '<a href="product-detail.php?id=' . $product['id'] . '" class="btn-detail">Lihat Detail</a>';
                echo '<button class="btn-buy" data-id="' . $product['id'] . '">Beli Sekarang</button>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>

<?php include 'assets/includes/footer.php'; ?>
