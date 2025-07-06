<!DOCTYPE html>
<html>
<head>
    <title>Add Product - Admin</title>
    <link rel="stylesheet" href="/cart.css">
    <style>
        .form-container { max-width: 400px; margin: 60px auto; background: #fff; border-radius: 18px; box-shadow: 0 8px 32px rgba(44,62,80,0.13); padding: 40px 32px 32px 32px; }
        h1 { color: #2ed573; font-size: 2em; margin-bottom: 20px; font-weight: 800; text-align: center; }
        label { display: block; margin-bottom: 8px; font-weight: 600; }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; margin-bottom: 18px; border-radius: 6px; border: 1px solid #ccc; font-size: 1em; }
        .submit-btn { width: 100%; background: linear-gradient(45deg, #2ed573, #1dd1a1); color: #fff; padding: 12px; border: none; border-radius: 8px; font-size: 1.1em; font-weight: 700; cursor: pointer; }
        .submit-btn:hover { background: linear-gradient(45deg, #1dd1a1, #2ed573); }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add Product</h1>
        <form method="post" action="/admin/addProduct">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
            <label for="description">Description</label>
            <input type="text" name="description" id="description">
            <label for="price">Price (MYR)</label>
            <input type="number" name="price" id="price" step="0.01" required>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" required>
            <button type="submit" class="submit-btn">Add Product</button>
        </form>
    </div>
</body>
</html>
