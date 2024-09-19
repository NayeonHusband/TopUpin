<?php include 'assets/includes/header.php'; ?>

<section class="hero">
    <div class="container">
        <h1>Selamat Datang di Toko Online Kami</h1>
        <p>Temukan produk terbaik dengan harga terjangkau!</p>
        <a href="products.php" class="btn-primary">Belanja Sekarang</a>
    </div>
</section>

<section class="featured-products">
    <div class="container">
        <h2>Produk Unggulan</h2>
        <div class="product-scroll">
            <?php
            $featured_products = get_products(4);
            foreach ($featured_products as $product) {
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
