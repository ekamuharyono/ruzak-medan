<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to Our Store</h1>
    <div id="product-list"></div>

    <script>
        // Fetch daftar produk dari API
        fetch('/api/products.php')
            .then(response => response.json())
            .then(data => {
                const products = data.products.map(product => `
                    <div>
                        <h2>${product.name}</h2>
                        <p>Price: Rp${product.price}</p>
                        <a href="checkout.php?id=${product.id}">Checkout</a>
                    </div>
                `).join('');
                document.getElementById('product-list').innerHTML = products;
            })
            .catch(error => console.error('Error fetching products:', error));
    </script>
</body>
</html>
