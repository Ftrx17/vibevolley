<!DOCTYPE html>
<html>
<head>
    <title>Checkout - VibeVolley</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/cart.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            line-height: 1.6;
        }

        /* Header */
        header {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            color: #ffffff;
            padding: 20px 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(45deg, #ff4757, #2ed573);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(255, 71, 87, 0.5);
        }

        nav {
            display: flex;
            align-items: center;
            gap: 30px;
            font-size: 14px;
            font-weight: 500;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s ease;
            position: relative;
        }

        nav a:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-2px);
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            width: 0;
            height: 2px;
            background: #ff4757;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        nav a:hover::after {
            width: 80%;
        }

        .checkout-container {
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
            font-size: 2.2em;
            margin-bottom: 10px;
            font-weight: 800;
        }
        h2 {
            color: #2B2D42;
            font-size: 1.5em;
            margin-bottom: 15px;
            font-weight: 600;
        }
        .order-summary {
            margin-bottom: 30px;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
        }
        .payment-section {
            margin-top: 30px;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
        }
        .pay-btn {
            display: inline-block;
            padding: 12px 28px;
            background: linear-gradient(45deg, #2ed573, #1dd1a1);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 16px rgba(46, 213, 115, 0.13);
            margin-top: 10px;
            cursor: pointer;
        }
        .pay-btn:hover {
            background: linear-gradient(45deg, #1dd1a1, #2ed573);
            box-shadow: 0 8px 24px rgba(46, 213, 115, 0.18);
        }
        .add-card-btn {
            display: inline-block;
            margin-top: 10px;
            background: #667eea;
            color: #fff;
            padding: 8px 18px;
            border-radius: 8px;
            border: none;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }
        .add-card-btn:hover {
            background: #5a6fd8;
        }
        .cart-total {
            text-align: right;
            font-size: 1.3em;
            color: #2B2D42;
            font-weight: 700;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #e9ecef;
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
        .success-message {
            background: rgba(46, 213, 115, 0.1);
            border: 1px solid #2ed573;
            color: #2ed573;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
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
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 1em;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        li:last-child {
            border-bottom: none;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-toggle {
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            background: #fff;
            min-width: 140px;
            box-shadow: 0 8px 32px rgba(44,62,80,0.13);
            border-radius: 10px;
            z-index: 1001;
            margin-top: 8px;
            overflow: hidden;
        }
        .dropdown-menu a {
            color: #2B2D42;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            font-weight: 500;
            background: #fff;
            border-bottom: 1px solid #f0f0f0;
            transition: background 0.2s;
        }
        .dropdown-menu a:last-child {
            border-bottom: none;
        }
        .dropdown-menu a:hover {
            background: #e0e7ff;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .dropdown:hover .dropdown-toggle {
            background: rgba(255,255,255,0.1);
        }
    </style>
</head>
<body>
    <header>
        <a href="homepage" style="text-decoration: none;">
            <div class="logo">VibeVolley</div>
        </a>
        <nav>
            <a href="training-page">Training</a>
            <a href="resources">Resources</a>
            <a href="product-page">Shop</a>
            <div class="dropdown">
                <a href="profile" class="dropdown-toggle">Profile <i class="fas fa-caret-down"></i></a>
                <div class="dropdown-menu">
                    <a href="profile">Profile</a>
                    <a href="logout">Logout</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="checkout-container">
        <h1>Checkout</h1>
        <a href="/cart" class="back-link">&larr; Back to Cart</a>
        
        <?php if (session()->getFlashdata('success')): ?>
            <div class="success-message">
                <?= session('success') ?>
            </div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message">
                <?= session('error') ?>
            </div>
        <?php endif; ?>
        
        <div class="order-summary">
            <h2>Order Summary</h2>
            <?php if (empty($cart)) : ?>
                <p>Your cart is empty.</p>
                <a href="/product-page" class="back-link">Continue Shopping</a>
            <?php else : ?>
                <ul>
                    <?php foreach ($cart as $item): ?>
                        <li><?= esc($item['name']) ?> x <?= esc($item['quantity']) ?> -
                            <?php if (!empty($item['discount']) && $item['discount'] > 0): ?>
                                <span style="text-decoration:line-through;color:#888;font-size:0.95em;">MYR <?= number_format($item['original_price'], 2) ?></span>
                                <span style="color:#2ed573;font-weight:700;">MYR <?= number_format($item['discounted_price'], 2) ?></span>
                            <?php else: ?>
                                MYR <?= number_format($item['original_price'], 2) ?>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="cart-total">Total: MYR <?= number_format($total, 2) ?><?php if (!empty($discount) && $discount > 0): ?> <span style='color:#2ed573;font-size:0.9em;'>(-<?= (int)($discount*100) ?>%)</span><?php endif; ?></div>
            <?php endif; ?>
        </div>
        
        <?php if (!empty($cart)) : ?>
        <div class="payment-section">
            <h2>Payment Method</h2>
            <?php if (!empty($cards)) : ?>
                <form method="post" action="/checkout/placeOrder">
                    <label for="card_id">Select Payment Card:</label>
                    <select name="card_id" id="card_id" required>
                        <?php foreach ($cards as $card): ?>
                            <option value="<?= esc($card['card_id']) ?>">**** **** **** <?= substr($card['card_number'], -4) ?> (Exp: <?= esc($card['expiry_date']) ?>)</option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="pay-btn">Pay Now - MYR <?= number_format($total, 2) ?></button>
                </form>
                <form method="get" action="/checkout/addCard">
                    <button type="submit" class="add-card-btn">Add New Card</button>
                </form>
            <?php else : ?>
                <p>No saved payment cards found.</p>
                <form method="get" action="/checkout/addCard">
                    <button type="submit" class="add-card-btn">Add Payment Card</button>
                </form>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
