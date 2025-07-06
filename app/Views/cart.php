<!DOCTYPE html>
<html>
<head>
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" href="/cart.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
        }
        .cart-container {
            max-width: 700px;
            margin: 50px auto;
            background: rgba(255,255,255,0.97);
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(44,62,80,0.13);
            padding: 40px 32px 32px 32px;
        }
        h1 {
            text-align: center;
            color: #2B2D42;
            font-size: 2.5em;
            margin-bottom: 10px;
            font-weight: 800;
        }
        h2 {
            color: #D90429;
            font-size: 1.3em;
            margin-bottom: 25px;
            text-align: center;
        }
        .cart-total {
            text-align: right;
            font-size: 1.3em;
            color: #2B2D42;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .clear-btn {
            display: inline-block;
            padding: 10px 22px;
            background: linear-gradient(45deg, #ff4757, #ff3742);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 16px rgba(255, 71, 87, 0.13);
            margin-top: 10px;
            cursor: pointer;
        }
        .clear-btn:hover {
            background: linear-gradient(45deg, #ff3742, #ff4757);
            box-shadow: 0 8px 24px rgba(255, 71, 87, 0.18);
        }
        .checkout-btn {
            display: inline-block;
            padding: 10px 22px;
            background: linear-gradient(45deg, #2ed573, #1dd1a1);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 16px rgba(46, 213, 115, 0.13);
            margin-top: 10px;
            margin-left: 10px;
            cursor: pointer;
        }
        .checkout-btn:hover {
            background: linear-gradient(45deg, #1dd1a1, #2ed573);
            box-shadow: 0 8px 24px rgba(46, 213, 115, 0.18);
        }
        .back-link {
            display: inline-block;
            margin-bottom: 25px;
            padding: 8px 18px;
            background: #2B2D42;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1em;
            font-weight: 500;
            transition: background 0.2s;
        }
        .back-link:hover {
            background: #1a1c2e;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #f9fafb;
            margin-bottom: 25px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(44,62,80,0.06);
        }
        th, td {
            padding: 16px 10px;
            border-bottom: 1px solid #e5e7eb;
            text-align: center;
            font-size: 1em;
        }
        th {
            background: #e0e7ff;
            color: #2B2D42;
            font-weight: 700;
        }
        tr:last-child td {
            border-bottom: none;
        }
        .cart-empty {
            text-align: center;
            color: #888;
            font-size: 1.1em;
            margin: 40px 0;
        }
        .error-message {
            background: rgba(255, 71, 87, 0.1);
            border: 1px solid #ff4757;
            color: #ff4757;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        @media (max-width: 600px) {
            .cart-container {
                padding: 18px 4px;
            }
            th, td {
                padding: 10px 4px;
                font-size: 0.95em;
            }
            h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <h1>Shopping Cart</h1>
        <a href="/product-page" class="back-link">&larr; Continue Shopping</a>
        <h2>Your Cart</h2>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <?php if (empty($cart)) : ?>
            <p class="cart-empty">Your cart is empty.</p>
        <?php else : ?>
            <table style="width:100%;border-radius:12px;overflow:hidden;">
                <thead style="background:#e3e8ff;">
                    <tr>
                        <th>Name</th>
                        <th>Price<?php if (!empty($discount) && $discount > 0): ?> <span style='color:#2ed573;font-size:0.9em;'>(-<?= (int)($discount*100) ?>%)</span><?php endif; ?></th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= esc($item['name']) ?></td>
                        <td>
                            <?php if (!empty($item['discount']) && $item['discount'] > 0): ?>
                                <span style="text-decoration:line-through;color:#888;font-size:0.95em;">MYR <?= number_format($item['original_price'], 2) ?></span><br>
                                <span style="color:#2ed573;font-weight:700;">MYR <?= number_format($item['discounted_price'], 2) ?></span>
                            <?php else: ?>
                                MYR <?= number_format($item['original_price'], 2) ?>
                            <?php endif; ?>
                        </td>
                        <td><?= esc($item['quantity']) ?></td>
                        <td>MYR <?= number_format($item['discounted_price'] * $item['quantity'], 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="cart-total">Total: MYR <?= number_format($total, 2) ?></div>
            <a href="/cart/clear" class="clear-btn">Clear Cart</a>
            <button onclick="proceedToCheckout()" class="checkout-btn">Checkout</button>
        <?php endif; ?>
    </div>

    <script>
        function proceedToCheckout() {
            console.log('Checkout button clicked');
            
            // First check if user is logged in
            fetch('/debug')
                .then(response => response.text())
                .then(data => {
                    console.log('Debug info:', data);
                    
                    // Check if user is logged in by looking for user_id in the response
                    if (data.includes('Session user_id: null')) {
                        alert('Please log in to proceed to checkout.');
                        window.location.href = '/login';
                        return;
                    }
                    
                    // If logged in, proceed to checkout
                    window.location.href = '/checkout';
                })
                .catch(error => {
                    console.error('Error checking login status:', error);
                    // If debug fails, try checkout directly
                    window.location.href = '/checkout';
                });
        }
    </script>
</body>
</html>
