<?php
// Ambil ID produk dari query string
$productId = $_GET['id'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Checkout</h1>
    <form id="checkout-form">
        <input type="hidden" name="productId" value="<?= htmlspecialchars($productId) ?>">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1" required>
        <button type="submit">Submit</button>
    </form>
    <p id="response-message"></p>

    <script>
        document.getElementById('checkout-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData);

            // Kirim data ke API checkout
            fetch('/api/checkout.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('response-message').textContent = data.message;
            })
            .catch(error => console.error('Error during checkout:', error));
        });
    </script>
</body>
</html>
