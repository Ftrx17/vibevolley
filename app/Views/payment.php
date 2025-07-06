<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment | Volleyball Club</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="wrapper">
        <?php 
        $request = \Config\Services::request();
        $amount = $request->getGet('amount');
        $tier = $request->getGet('tier');
        ?>
        
        <?php if ($amount == 0 || $tier == 0): ?>
        <!-- Free Tier Upgrade -->
        <div style="text-align: center; padding: 40px 20px;">
            <h2>Upgrade to Normal Membership</h2>
            <p style="color: #fff; margin: 20px 0;">This membership is free! No payment required.</p>
            <button id="freeUpgradeBtn" style="background: #4CAF50; color: white; padding: 15px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                Confirm Free Upgrade
            </button>
            <div id="upgradeMessage" style="margin-top:15px;color:#fff;"></div>
        </div>
        <?php else: ?>
        <form id="paymentForm">
            <h2>Membership Payment</h2>
            <input type="hidden" name="user_id" id="user_id" value="">
            <input type="hidden" name="amount" id="amount" value="">
            <input type="hidden" name="tier" id="tier" value="">
            <?php if (!empty($cards)): ?>
            <div class="input-field">
                <label for="saved_card">Select Saved Card</label>
                <select name="saved_card" id="saved_card">
                    <option value="">-- Use a new card --</option>
                    <?php foreach ($cards as $card): ?>
                        <option value="<?= esc($card['card_id']) ?>">**** **** **** <?= esc(substr($card['card_number'], -4)) ?> (Exp: <?= esc($card['expiry_date']) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php endif; ?>
            <div id="cardFields">
                <div class="input-field">
                    <input type="text" name="card_number" maxlength="16" id="card_number" required>
                    <label>Card Number</label>
                </div>
                <div class="input-field">
                    <input type="month" name="expiry_date" id="expiry_date" required>
                    <label>Expiry Date</label>
                </div>
                <div class="input-field">
                    <input type="text" name="cvv" maxlength="4" id="cvv" required>
                    <label>CVV</label>
                </div>
            </div>
            <div class="input-field">
                <input type="text" id="amountDisplay" disabled>
                <label>Amount to Pay</label>
            </div>
            <button type="submit">Make Payment</button>
            <div id="paymentMessage" style="margin-top:15px;color:#fff;"></div>
        </form>
        <?php endif; ?>
    </div>
    <script>
    // Set user_id and amount from URL params
    function getParam(name) {
        const url = new URL(window.location.href);
        return url.searchParams.get(name);
    }
    
    // Only set form values if the payment form exists
    const userIdField = document.getElementById('user_id');
    const amountField = document.getElementById('amount');
    const amountDisplay = document.getElementById('amountDisplay');
    
    if (userIdField) userIdField.value = getParam('user_id') || '';
    if (amountField) amountField.value = getParam('amount') || '';
    if (amountDisplay) amountDisplay.value = getParam('amount') ? 'RM ' + parseFloat(getParam('amount')).toFixed(2) : '';

    // Hide card fields if a saved card is selected
    const savedCard = document.getElementById('saved_card');
    const cardFields = document.getElementById('cardFields');
    if (savedCard && cardFields) {
        savedCard.addEventListener('change', function() {
            if (this.value) {
                cardFields.style.display = 'none';
                const cardNumber = document.getElementById('card_number');
                const expiryDate = document.getElementById('expiry_date');
                const cvv = document.getElementById('cvv');
                if (cardNumber) cardNumber.required = false;
                if (expiryDate) expiryDate.required = false;
                if (cvv) cvv.required = false;
            } else {
                cardFields.style.display = '';
                const cardNumber = document.getElementById('card_number');
                const expiryDate = document.getElementById('expiry_date');
                const cvv = document.getElementById('cvv');
                if (cardNumber) cardNumber.required = true;
                if (expiryDate) expiryDate.required = true;
                if (cvv) cvv.required = true;
            }
        });
    }
    </script>
    <script src="payment.js"></script>
</body>
</html> 