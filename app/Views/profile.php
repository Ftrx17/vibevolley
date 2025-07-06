<!DOCTYPE html>
<html>
<head>
    <title>User Profile - VibeVolley</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
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

        .profile-container { 
            max-width: 800px; 
            margin: 50px auto; 
            background: rgba(255,255,255,0.97); 
            border-radius: 18px; 
            box-shadow: 0 8px 32px rgba(44,62,80,0.13); 
            padding: 40px 32px 32px 32px; 
        }
        h1 { color: #2B2D42; font-size: 2.2em; margin-bottom: 10px; font-weight: 800; text-align: center; }
        h2 { color: #2B2D42; font-size: 1.5em; margin: 30px 0 15px 0; font-weight: 600; }
        .user-info { margin-bottom: 30px; }
        .orders-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 14px 10px; border-bottom: 1px solid #e5e7eb; text-align: center; }
        th { background: #e0e7ff; color: #2B2D42; font-weight: 700; }
        tr:last-child td { border-bottom: none; }

        /* Add Card Section */
        .add-card-section {
            margin-top: 40px;
            padding: 30px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .card-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group input {
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .add-card-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .add-card-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .success-message {
            background: rgba(46, 213, 115, 0.1);
            border: 1px solid #2ed573;
            color: #2ed573;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }

        .error-message {
            background: rgba(255, 71, 87, 0.1);
            border: 1px solid #ff4757;
            color: #ff4757;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }

        /* Responsive Design */
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

            .card-form {
                grid-template-columns: 1fr;
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

        /* Membership Countdown Styling */
        .countdown {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.9em;
            display: inline-block;
            background: rgba(46, 213, 115, 0.1);
            border: 1px solid rgba(46, 213, 115, 0.3);
        }

        .countdown.warning {
            background: rgba(255, 71, 87, 0.1);
            border: 1px solid rgba(255, 71, 87, 0.3);
            color: #ff4757 !important;
        }

        .user-info p {
            margin-bottom: 12px;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .user-info p:last-child {
            border-bottom: none;
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

    <div class="profile-container">
        <h1>User Profile</h1>
        
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

        <div class="user-info">
            <p><strong>Name:</strong> <?= esc($user['full_name'] ?? 'N/A') ?></p>
            <p><strong>Email:</strong> <?= esc($user['email'] ?? 'N/A') ?></p>
            <?php if ($membership_expiry): ?>
                <p><strong>Membership Expiry:</strong> <?= esc(date('F j, Y', strtotime($membership_expiry))) ?></p>
                <p><strong>Days Remaining:</strong> <span class="countdown <?= (int)$countdown <= 7 ? 'warning' : ''; ?>"><?= esc($countdown) ?></span></p>
            <?php else: ?>
                <p><strong>Membership Status:</strong> <span style="color: #ff4757; font-weight: 600;">No active membership</span></p>
            <?php endif; ?>
        </div>

        <h2>Order History</h2>
        <table class="orders-table">
            <tr>
                <th>Order ID</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= esc($order['id']) ?></td>
                <td>MYR <?= number_format($order['total'], 2) ?></td>
                <td><?= esc($order['status']) ?></td>
                <td><?= esc($order['created_at']) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="add-card-section">
            <h2>Saved Payment Cards</h2>
            <?php if (!empty($cards)): ?>
                <table class="orders-table" style="margin-bottom: 30px;">
                    <tr>
                        <th>Card Number</th>
                        <th>Expiry Date</th>
                        <th>CVV</th>
                    </tr>
                    <?php foreach ($cards as $card): ?>
                    <tr>
                        <td>**** **** **** <?= esc(substr($card['card_number'], -4)) ?></td>
                        <td><?= esc(date('m/Y', strtotime($card['expiry_date']))) ?></td>
                        <td><?= esc($card['cvv']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p style="margin-bottom: 30px; color: #888;">No cards saved yet.</p>
            <?php endif; ?>
            <h2>Add Payment Card</h2>
            <form id="addCardForm">
                <?= csrf_field() ?>
                <div class="card-form">
                    <div class="form-group full-width">
                        <label for="card_number">Card Number</label>
                        <input type="text" id="card_number" name="card_number" maxlength="16" required placeholder="1234 5678 9012 3456">
                    </div>
                    <div class="form-group">
                        <label for="expiry">Expiry Date</label>
                        <input type="month" id="expiry" name="expiry" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" maxlength="4" required placeholder="123">
                    </div>
                </div>
                <button type="submit" class="add-card-btn">Add Card</button>
                <div id="addCardMessage" style="margin-top:15px;"></div>
            </form>
            <script>
            document.getElementById('addCardForm').addEventListener('submit', async function(e) {
                e.preventDefault();
                const form = e.target;
                const data = {
                    card_number: form.card_number.value,
                    expiry: form.expiry.value,
                    cvv: form.cvv.value
                };
                // CSRF token
                const csrfToken = form.querySelector('input[name=\'csrf_test_name\']').value;
                const msg = document.getElementById('addCardMessage');
                msg.textContent = '';
                try {
                    const res = await fetch('/profile/addCard', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(data)
                    });
                    const result = await res.json();
                    if (res.ok && result.success) {
                        msg.style.color = '#2ed573';
                        msg.textContent = 'Card added successfully!';
                        form.reset();
                        setTimeout(() => window.location.reload(), 1000);
                    } else {
                        msg.style.color = '#ff4757';
                        msg.textContent = result.message || 'Failed to add card.';
                    }
                } catch (err) {
                    msg.style.color = '#ff4757';
                    msg.textContent = 'Network error.';
                }
            });
            </script>
        </div>
    </div>

    <script>
        // Real-time countdown update
        function updateCountdown() {
            const countdownElement = document.querySelector('.countdown');
            if (countdownElement) {
                const expiryDate = '<?= $membership_expiry ?? "" ?>';
                if (expiryDate) {
                    const today = new Date();
                    const expiry = new Date(expiryDate);
                    const diffTime = expiry - today;
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    
                    if (diffDays > 0) {
                        countdownElement.textContent = diffDays + ' days';
                        countdownElement.className = 'countdown' + (diffDays <= 7 ? ' warning' : '');
                    } else {
                        countdownElement.textContent = '0 days';
                        countdownElement.className = 'countdown warning';
                    }
                }
            }
        }

        // Update countdown every hour
        setInterval(updateCountdown, 3600000); // 1 hour in milliseconds
        
        // Initial update
        updateCountdown();
    </script>
</body>
</html>
