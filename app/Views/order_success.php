<!DOCTYPE html>
<html>
<head>
    <title>Order Success - VibeVolley</title>
    <link rel="stylesheet" href="/cart.css">
    <style>
        .success-container {
            max-width: 500px;
            margin: 80px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(44,62,80,0.13);
            padding: 40px 32px 32px 32px;
            text-align: center;
        }
        h1 {
            color: #2ed573;
            font-size: 2.2em;
            margin-bottom: 10px;
            font-weight: 800;
        }
        .order-details {
            margin: 20px 0;
            font-size: 1.1em;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            background: #667eea;
            color: #fff;
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
        .back-link:hover {
            background: #2ed573;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h1>Order Placed!</h1>
        <div class="order-details">
            <p>Your order #<?= esc($order_id) ?> has been placed successfully.</p>
            <p>Total Paid: <strong>MYR <?= number_format($total, 2) ?></strong></p>
        </div>
        <a href="/product-page" class="back-link">Continue Shopping</a>
    </div>
</body>
</html>
