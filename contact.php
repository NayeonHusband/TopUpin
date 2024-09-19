<?php
include 'assets/includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    if (send_contact_message($name, $email, $message)) {
        $success = "Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.";
    } else {
        $error = "Gagal mengirim pesan. Silakan coba lagi.";
    }
}
?>

<section class="contact">
    <div class="container">
        <h1>Hubungi Kami</h1>
        <?php if (isset($success)): ?>
            <p class="success"><?php echo $success; ?></p>
        <?php elseif (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="contact.php" method="POST">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Pesan:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
        </form>
        <div class="contact-info">
            <h2>Informasi Kontak</h2>
            <p><strong>Alamat:</strong> Jl. Contoh No. 123, Jakarta</p>
            <p><strong>Telepon:</strong> (021) 1234-5678</p>
            <p><strong>Email:</strong> info@tokoonlinesaya.com</p>
        </div>
    </div>
</section>

<?php include 'assets/includes/footer.php'; ?>
