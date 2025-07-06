<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upgrade Membership | VibeVolley</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }
        .upgrade-container {
            max-width: 600px;
            margin: 60px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(44,62,80,0.13);
            padding: 40px 32px 32px 32px;
            text-align: center;
        }
        h1 {
            color: #2B2D42;
            font-size: 2em;
            margin-bottom: 20px;
            font-weight: 800;
        }
        .tier-list {
            display: flex;
            flex-direction: column;
            gap: 24px;
            margin: 30px 0;
        }
        .tier-option {
            background: #f8fafc;
            border: 2px solid #e0e7ff;
            border-radius: 12px;
            padding: 24px 20px;
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: border 0.2s;
        }
        .tier-option.selected {
            border: 2px solid #667eea;
            background: #e0e7ff;
        }
        .tier-info {
            flex: 1;
        }
        .tier-title {
            font-size: 1.2em;
            font-weight: 700;
            color: #2B2D42;
        }
        .tier-desc {
            color: #555;
            font-size: 1em;
            margin: 6px 0 0 0;
        }
        .tier-price {
            font-size: 1.1em;
            font-weight: 700;
            color: #667eea;
            margin-left: 24px;
        }
        .upgrade-btn {
            margin-top: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 14px 36px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 1.1em;
            transition: all 0.3s;
        }
        .upgrade-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(45deg, #ff4757, #ff3742);
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.9em;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 8px 25px rgba(255, 71, 87, 0.3);
        }
        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 71, 87, 0.4);
            background: linear-gradient(45deg, #ff3742, #ff4757);
        }
        .upgrade-container {
            position: relative;
        }
    </style>
</head>
<body>
    <div class="upgrade-container">
        <a href="/homepage" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Home
        </a>
        <h1>Upgrade Your Membership</h1>
        <form id="upgradeForm">
            <div class="tier-list">
                <?php foreach ($tiers as $tier): ?>
                <?php if (isset($current_tier) && $current_tier == $tier['tier_ID']) continue; ?>
                <label class="tier-option">
                    <input type="radio" name="tier" value="<?= esc($tier['tier_ID']) ?>" data-amount="<?= esc($tier['member_cost']) ?>" style="margin-right:18px;">
                    <div class="tier-info">
                        <div class="tier-title"><?= esc($tier['tier_name']) ?></div>
                        <div class="tier-desc">
                            <?php if ($tier['tier_ID'] == 0): ?>
                                • Shop access only (standard prices)<br>
                                • No training or resources access<br>
                                • Basic membership
                            <?php elseif ($tier['tier_ID'] == 1): ?>
                                • Technique training videos<br>
                                • 5% shop discount<br>
                                • Basic training access
                            <?php elseif ($tier['tier_ID'] == 2): ?>
                                • Technique & physical training<br>
                                • Mental training tips in resources<br>
                                • 10% shop discount<br>
                                • Meal planner access
                            <?php elseif ($tier['tier_ID'] == 3): ?>
                                • All training content<br>
                                • All resources access<br>
                                • Online Consultation with Professional Coach<br>
                                • 15% shop discount<br>
                                • Complete premium access
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tier-price">MYR <?= number_format($tier['member_cost'], 2) ?></div>
                </label>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="upgrade-btn" disabled>Upgrade</button>
        </form>
    </div>
    <script>
    // Highlight selected tier
    const form = document.getElementById('upgradeForm');
    const options = form.querySelectorAll('.tier-option');
    const radios = form.querySelectorAll('input[type=radio][name=tier]');
    const btn = form.querySelector('.upgrade-btn');
    radios.forEach(radio => {
        radio.addEventListener('change', function() {
            options.forEach(opt => opt.classList.remove('selected'));
            this.closest('.tier-option').classList.add('selected');
            btn.disabled = false;
        });
    });
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const selected = form.querySelector('input[name=tier]:checked');
        if (!selected) return;
        const tier = selected.value;
        const amount = selected.getAttribute('data-amount');
        // Get user_id from PHP session
        const userId = <?= json_encode(session()->get('user_id')) ?>;
        if (!userId) {
            alert('You must be logged in to upgrade.');
            return;
        }
        // Redirect to payment page with tier
        window.location.href = `/payment?user_id=${userId}&amount=${amount}&tier=${tier}`;
    });
    </script>
</body>
</html> 