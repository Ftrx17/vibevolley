<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VibeVolley - Products</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
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

        .cart-icon {
            position: relative;
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .cart-icon:hover {
            background: rgba(255,255,255,0.1);
        }

        #cart-count {
            position: absolute;
            top: -8px;
            right: -10px;
            background: linear-gradient(45deg, #ff4757, #ff3742);
            color: white;
            font-size: 11px;
            padding: 2px 6px;
            border-radius: 50%;
            font-weight: 600;
        }

        /* Main Content */
        main {
            padding: 60px 5%;
            min-height: calc(100vh - 80px);
        }

        .main-content {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .page-header {
            text-align: center;
            margin-bottom: 60px;
            color: white;
        }

        .page-header h1 {
            font-size: 3.5em;
            font-weight: 800;
            margin-bottom: 15px;
            background: linear-gradient(45deg, #fff, #f1f2f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-header p {
            font-size: 1.2em;
            color: rgba(255, 255, 255, 0.8);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .product-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
        }

        .product-image {
            position: relative;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.1);
        }

        .wishlist-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 18px;
            color: #555555;
            cursor: pointer;
            background-color: rgba(255,255,255,0.9);
            padding: 8px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .wishlist-icon:hover {
            color: #ff4757;
            background-color: rgba(255,255,255,1);
            transform: scale(1.1);
        }

        .product-content {
            padding: 25px;
        }

        .brand-name {
            font-size: 12px;
            color: #ff4757;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .product-title {
            font-size: 16px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
            line-height: 1.4;
            height: 44px;
            overflow: hidden;
        }

        .product-details {
            color: #7f8c8d;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .price-section {
            margin-bottom: 15px;
        }

        .current-price {
            font-size: 18px;
            font-weight: 700;
            color: #ff4757;
            margin-right: 10px;
        }

        .original-price {
            font-size: 14px;
            color: #95a5a6;
            text-decoration: line-through;
            margin-right: 10px;
        }

        .discount-badge {
            background: linear-gradient(45deg, #ff4757, #ff3742);
            color: white;
            font-size: 11px;
            padding: 4px 8px;
            border-radius: 12px;
            font-weight: 600;
        }

        .rating {
            display: flex;
            align-items: center;
            font-size: 13px;
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        .stars {
            margin-right: 8px;
        }

        .stars .fas {
            color: #f8b400;
        }

        .stars .far {
            color: #ddd;
        }

        .btn-add-to-cart {
            width: 100%;
            padding: 12px 20px;
            background: linear-gradient(45deg, #ff4757, #ff3742);
            color: #ffffff;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(255, 71, 87, 0.3);
        }

        .btn-add-to-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(255, 71, 87, 0.4);
            background: linear-gradient(45deg, #ff3742, #ff4757);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            nav {
                gap: 20px;
            }
            
            .product-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 25px;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 15px 5%;
                flex-direction: column;
                gap: 15px;
            }
            
            nav {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .page-header h1 {
                font-size: 2.5em;
            }
            
            .product-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
            }
            
            .product-content {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 2em;
            }
            
            .product-grid {
                grid-template-columns: 1fr;
            }
            
            nav {
                font-size: 12px;
                gap: 10px;
            }
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

    <?php if (session()->getFlashdata('success')): ?>
        <div style="background:rgba(46,213,115,0.1);border:1px solid #2ed573;color:#2ed573;padding:12px 20px;border-radius:8px;margin:20px auto 0 auto;max-width:500px;text-align:center;font-weight:600;">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <div id="cart-feedback" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:rgba(46,213,115,0.97);border:2px solid #2ed573;color:#fff;padding:28px 40px;border-radius:16px;z-index:9999;box-shadow:0 8px 32px rgba(44,62,80,0.13);font-size:1.2em;font-weight:700;text-align:center;">
    </div>

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
            <div class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-count">0</span>
            </div>
        </nav>
    </header>

    <main>
        <div class="main-content">
            <div class="page-header">
                <h1>Volleyball Gear</h1>
                <p>Premium equipment for every level of player</p>
            </div>

            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="/<?= esc($product['image']) ?>" alt="<?= esc($product['name']) ?>">
                        <i class="far fa-heart wishlist-icon"></i>
                    </div>
                    <div class="product-content">
                        <div class="brand-name">VibeVolley</div>
                        <h3 class="product-title"><?= esc($product['name']) ?></h3>
                        <div class="product-details">
                            <p><?= esc($product['description']) ?></p>
                        </div>
                        <div class="price-section">
                            <?php $tier = session('tier_ID'); ?>
                            <?php
                                $discount = 0;
                                if ($tier == 1) $discount = 0.05;
                                elseif ($tier == 2) $discount = 0.10;
                                elseif ($tier == 3) $discount = 0.15;
                                $discounted = $product['price'] * (1 - $discount);
                            ?>
                            <?php if ($discount > 0): ?>
                                <span class="current-price">MYR <?= number_format($discounted, 2) ?></span>
                                <span class="original-price">MYR <?= number_format($product['price'], 2) ?></span>
                                <span class="discount-badge">
                                    -<?= $discount * 100 ?>%
                                </span>
                            <?php else: ?>
                                <span class="current-price">MYR <?= number_format($product['price'], 2) ?></span>
                            <?php endif; ?>
                        </div>
                        <form method="post" action="/cart/add">
                            <input type="hidden" name="product_id" value="<?= esc($product['id']) ?>">
                            <input type="hidden" name="product_name" value="<?= esc($product['name']) ?>">
                            <input type="hidden" name="product_price" value="<?= esc($product['price']) ?>">
                            <button type="submit" class="btn-add-to-cart">Add to Cart</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <script>
    // Fetch cart count on page load
    function updateCartCount() {
        fetch('/cart/count')
            .then(response => response.json())
            .then(data => {
                document.getElementById('cart-count').textContent = data.count;
            });
    }
    document.addEventListener('DOMContentLoaded', function() {
        updateCartCount();
        // Make cart icon a link to /cart
        document.querySelector('.cart-icon').addEventListener('click', function() {
            window.location.href = '/cart';
        });
        // Add to Cart AJAX
        document.querySelectorAll('.btn-add-to-cart').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var form = btn.closest('form');
                var formData = new FormData(form);
                fetch('/cart/add-ajax', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('cart-count').textContent = data.count;
                    // Show feedback as a dialog for 1 second
                    var feedback = document.getElementById('cart-feedback');
                    feedback.textContent = 'Added to cart successfully!';
                    feedback.style.display = 'block';
                    setTimeout(function() {
                        feedback.style.display = 'none';
                    }, 1000);
                });
            });
        });
    });
    </script>

</body>
</html>