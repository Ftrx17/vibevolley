<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | VibeVolley</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="signup.css">
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
    </style>
</head>
<body>
    

    <div class="wrapper">
        <form id="signupForm">
            <h2>Sign Up</h2>
            <div class="input-field">
                <input type="text" name="full_name" required>
                <label>Full Name</label>
            </div>
            <div class="input-field">
                <input type="tel" name="phone_num" required>
                <label>Phone Number</label>
            </div>
            <div class="input-field">
                <input type="text" name="address" required>
                <label>Address</label>
            </div>
            <div class="input-field">
                <input type="date" name="DOB" required>
                <label>Date of Birth</label>
            </div>
            <div class="input-field">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="input-field">
                <select name="tier" required>
                    <option value="">Select Tier</option>
                    <option value="Normal">Normal</option>
                    <option value="Plus">Plus</option>
                    <option value="Gold">Gold</option>
                    <option value="Platinum">Platinum</option>
                </select>
            </div>
            <button type="submit">Sign Up</button>
            <div class="register">
                <p>Already have an account? <a href="/login">Login</a></p>
            </div>
            <div id="signupMessage" style="margin-top:15px;color:#fff;"></div>
        </form>
    </div>
    <script>
        document.getElementById('signupForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const form = e.target;
            const data = {
                full_name: form.full_name.value,
                phone_num: form.phone_num.value,
                address: form.address.value,
                DOB: form.DOB.value,
                email: form.email.value,
                password: form.password.value,
                tier: form.tier.value
            };
            const msg = document.getElementById('signupMessage');
            msg.textContent = '';
            try {
                const res = await fetch('/api/signup', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });
                const result = await res.json();
                if (res.ok && result.redirect) {
                    msg.style.color = '#0f0';
                    msg.textContent = 'Sign up successful! Redirecting...';
                    setTimeout(() => window.location.href = result.redirect, 1200);
                } else {
                    msg.style.color = '#f00';
                    msg.textContent = result.message || result.error || 'Sign up failed.';
                }
            } catch (err) {
                msg.style.color = '#f00';
                msg.textContent = 'Network error.';
            }
        });
    </script>
</body>
</html> 