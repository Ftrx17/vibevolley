// payment.js

// Handle free tier upgrade
document.addEventListener('DOMContentLoaded', function() {
    const freeUpgradeBtn = document.getElementById('freeUpgradeBtn');
    if (freeUpgradeBtn) {
        freeUpgradeBtn.addEventListener('click', async function() {
            const msg = document.getElementById('upgradeMessage');
            msg.textContent = 'Processing upgrade...';
            msg.style.color = '#fff';
            
            try {
                const userId = new URL(window.location.href).searchParams.get('user_id');
                const tier = new URL(window.location.href).searchParams.get('tier');
                
                const data = {
                    user_id: userId,
                    amount: 0,
                    tier: tier
                };
                
                console.log('Sending upgrade data:', data);
                
                const res = await fetch('/api/payment', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });
                
                console.log('Response status:', res.status);
                const result = await res.json();
                console.log('Response data:', result);
                
                if (res.ok && result.success) {
                    msg.style.color = '#0f0';
                    msg.textContent = 'Upgrade successful! Redirecting...';
                    setTimeout(() => window.location.href = '/login', 1500);
                } else {
                    msg.style.color = '#f00';
                    msg.textContent = result.message || 'Upgrade failed.';
                }
            } catch (err) {
                console.error('Upgrade error:', err);
                msg.style.color = '#f00';
                msg.textContent = 'Network error.';
            }
        });
    }
});

// Only add payment form listener if the form exists
const paymentForm = document.getElementById('paymentForm');
if (paymentForm) {
    paymentForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const form = e.target;
        const savedCard = form.saved_card ? form.saved_card.value : '';
        let data = {
            user_id: form.user_id.value,
            amount: form.amount.value
        };
        if (form.tier && form.tier.value) {
            data.tier = form.tier.value;
        }
        if (savedCard) {
            data.saved_card = savedCard;
        } else {
            data.card_number = form.card_number.value;
            data.expiry_date = form.expiry_date.value;
            data.cvv = form.cvv.value;
        }
        const msg = document.getElementById('paymentMessage');
        msg.textContent = '';
        try {
            const res = await fetch('/api/payment', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            const result = await res.json();
            if (res.ok && result.success) {
                msg.style.color = '#0f0';
                msg.textContent = 'Payment successful!';
                setTimeout(() => window.location.href = '/login', 1500);
            } else {
                msg.style.color = '#f00';
                msg.textContent = result.message || 'Payment failed.';
            }
        } catch (err) {
            msg.style.color = '#f00';
            msg.textContent = 'Network error.';
        }
    });
}

// Set tier from URL param
(function() {
    function getParam(name) {
        const url = new URL(window.location.href);
        return url.searchParams.get(name);
    }
    const tierField = document.getElementById('tier');
    if (tierField) {
        tierField.value = getParam('tier') || '';
    }
})();
