<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | VibeVolley</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="login.css">
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
  </style>
</head>
<body>


  <div class="wrapper">
    <form id="loginForm">
      <h2>Login</h2>
      
      <?php if (session()->getFlashdata('error')): ?>
        <div class="error-message">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>
      
      <?php if (session()->getFlashdata('success')): ?>
        <div class="success-message">
          <?= session()->getFlashdata('success') ?>
        </div>
      <?php endif; ?>
      
      <div class="input-field">
        <input type="email" name="email" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="/signup">Register</a></p>
      </div>
      <div id="loginMessage" style="margin-top:15px;color:#fff;"></div>
    </form>
  </div>
  <script>
    document.getElementById('loginForm').addEventListener('submit', async function(e) {
      e.preventDefault();
      const form = e.target;
      const email = form.email.value;
      const password = form.password.value;
      const msg = document.getElementById('loginMessage');
      msg.textContent = '';
      try {
        const res = await fetch('/api/login', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ email, password })
        });
        const data = await res.json();
        if (res.ok && data.redirect) {
          localStorage.setItem('token', data.token);
          msg.style.color = '#0f0';
          msg.textContent = 'Login successful! Redirecting...';
          setTimeout(() => window.location.href = data.redirect, 1200);
        } else {
          msg.style.color = '#f00';
          msg.textContent = data.message || data.error || 'Login failed.';
        }
      } catch (err) {
        msg.style.color = '#f00';
        msg.textContent = 'Network error.';
      }
    });
  </script>
</body>
</html> 