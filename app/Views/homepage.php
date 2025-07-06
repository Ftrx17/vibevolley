<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>VibeVolley Club - Where Passion Meets Power</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style2.css" />
  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
</head>
<body>

  <!-- Hero Section -->
  <header class="hero-container">
    <video autoplay muted loop class="hero-video">
      <source src="volleyball.mp4" type="video/mp4" />
    </video>
    <div class="hero-overlay">
      <nav class="navbar">
        <div class="logo">VibeVolley</div>
        <ul>
          <li><a href="/training-page">Training</a></li>
          <li><a href="/resources">Resources</a></li>
          <li><a href="/product-page">Shop</a></li>
          <li class="dropdown">
            <a href="/profile" class="dropdown-toggle">Profile <i class="fas fa-caret-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="/profile">Profile</a></li>
              <?php if (session()->get('user_id')): ?>
                <li><a href="/logout">Logout</a></li>
              <?php else: ?>
                <li><a href="/login">Login</a></li>
              <?php endif; ?>
            </ul>
          </li>
        </ul>
      </nav>

      <div class="hero-text">
        <h1>Where Passion Meets Power</h1>
        <p>Join the Vibe. Play Volleyball with Purpose.</p> 
        <br><br>
        <?php if (session()->get('user_id')): ?>
          <a href="/upgrade-tier" class="btn-main">Upgrade/Change Membership</a>
        <?php else: ?>
          <a href="#tiers" class="btn-main">View Memberships</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <!-- Membership Tiers -->
  <?php if (!session()->get('user_id')): ?>
  <section id="tiers" class="tier-section">
    <h2>Choose Your Membership</h2>
    <div class="card-container">
      <div class="tier-card">
        <h3>🏅 Rookie</h3>
        <p>Shop access only (standard prices). No training or resources access. Basic membership.</p>
        <ul>
          <li>Shop access only (standard prices)</li>
          <li>No training or resources access</li>
          <li>Basic membership</li>
        </ul>
        <a href="/signup" class="btn-tier">Select Tier</a>
      </div>

      <div class="tier-card featured">
        <h3>🥈 Plus</h3>
        <p>Technique training videos. 5% shop discount. Basic training access.</p>
        <ul>
          <li>Technique training videos</li>
          <li>5% shop discount</li>
          <li>Basic training access</li>
        </ul>
        <a href="/signup" class="btn-tier">Select Tier</a>
      </div>

      <div class="tier-card">
        <h3>🥇 Gold</h3>
        <p>Technique & physical training. Mental training tips in resources. 10% shop discount. Meal planner access.</p>
        <ul>
          <li>Technique & physical training</li>
          <li>Mental training tips in resources</li>
          <li>10% shop discount</li>
          <li>Meal planner access</li>
        </ul>
        <a href="/signup" class="btn-tier">Select Tier</a>
      </div>

      <div class="tier-card">
        <h3>👑 Platinum</h3>
        <p>All training content. All resources access. Online Consultation with Professional Coach. 15% shop discount. Complete premium access.</p>
        <ul>
          <li>All training content</li>
          <li>All resources access</li>
          <li>Online Consultation with Professional Coach</li>
          <li>15% shop discount</li>
          <li>Complete premium access</li>
        </ul>
        <a href="/signup" class="btn-tier">Select Tier</a>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php if (session()->get('user_id')): ?>
    <div style="max-width: 700px; margin: 30px auto 0 auto; padding: 24px 32px; background: rgba(255,255,255,0.18); border-radius: 22px; box-shadow: 0 8px 32px rgba(44,62,80,0.18); text-align: center; backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1.5px solid rgba(255,255,255,0.35);">
      <h2 style="font-size:2em; font-weight:800; margin-bottom:8px; color:#2B2D42; text-shadow:0 2px 12px rgba(102,126,234,0.08);">
        Welcome back, <?= esc(session()->get('user_name')) ?>!
        <?php
          $tier = session()->get('tier_ID');
          $tierNames = [0 => 'Rookie', 1 => 'Plus', 2 => 'Gold', 3 => 'Platinum'];
          $tierIcons = [0 => '🏅', 1 => '🥈', 2 => '🥇', 3 => '👑'];
          $tierName = $tierNames[$tier] ?? 'Member';
          $tierIcon = $tierIcons[$tier] ?? '🏅';
        ?>
        <span style="font-size:1.1em; margin-left:10px; vertical-align:middle; padding:4px 16px; border-radius:20px; background:linear-gradient(90deg,#e0e7ff,#f8fafc); color:#764ba2; font-weight:700; display:inline-block; box-shadow:0 2px 8px rgba(102,126,234,0.10);">
          <?= $tierIcon . ' ' . $tierName ?>
        </span>
      </h2>
      <?php
        $offers = [
          0 => 'Upgrade your membership to unlock exclusive discounts and resources!',
          1 => 'As a Plus member, enjoy 5% off all shop items!',
          2 => 'Gold members get 10% off shop items and access to premium resources!',
          3 => 'Platinum members enjoy 15% off, all resources, and VIP perks!'
        ];
        $offer = $offers[$tier] ?? '';
      ?>
      <div style="margin-top:10px; font-size:1.1em; color:#2ed573; font-weight:600; text-shadow:0 2px 8px rgba(46,213,115,0.10);">
        <?= $offer ?>
      </div>
    </div>
  <?php endif; ?>

  <!-- About -->
  <section id="about">
    <h2>About VibeVolley</h2>
    <p style="max-width:700px;margin:0 auto 18px auto;font-size:1.15em;line-height:1.7;">
      VibeVolley is a dynamic, inclusive volleyball club dedicated to empowering players of all ages and skill levels. Our mission is to foster a love for the game, promote teamwork, and help every member reach their full potential—on and off the court. We offer a range of training programs, competitive opportunities, and community events, all led by passionate, experienced coaches. Whether you're a beginner or a seasoned athlete, you'll find a supportive environment, top-notch resources, and a vibrant volleyball community at VibeVolley.
    </p>
    <div style="max-width:700px;margin:32px auto 0 auto;">
      <h3 style="color:#ffff;font-size:1.3em;margin-bottom:12px;">Meet Our Staff</h3>
      <div style="display:flex;flex-wrap:wrap;gap:24px;justify-content:center;">
        <div style="background:rgba(255,255,255,0.85);border-radius:16px;padding:18px 24px;text-align:center;box-shadow:0 2px 12px rgba(44,62,80,0.08);width:200px;">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJ6D7MfyhLh5DdB5SEDkFHIYC3WTXT8Bp4jA&s" alt="Dan Lewis" style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid #2ed573;margin-bottom:10px;">
          <div style="font-weight:700;color:#2B2D42;">Dan Lewis</div>
          <div style="color:#764ba2;font-size:0.98em;">Senior Head Coach</div>
        </div>
        <div style="background:rgba(255,255,255,0.85);border-radius:16px;padding:18px 24px;text-align:center;box-shadow:0 2px 12px rgba(44,62,80,0.08);width:200px;">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Alex Tan" style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid #667eea;margin-bottom:10px;">
          <div style="font-weight:700;color:#2B2D42;">Alex Tan</div>
          <div style="color:#764ba2;font-size:0.98em;">Assistant Coach</div>
        </div>
        <div style="background:rgba(255,255,255,0.85);border-radius:16px;padding:18px 24px;text-align:center;box-shadow:0 2px 12px rgba(44,62,80,0.08);width:200px;">
          <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Maya Lee" style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid #ff4757;margin-bottom:10px;">
          <div style="font-weight:700;color:#2B2D42;">Maya Lee</div>
          <div style="color:#764ba2;font-size:0.98em;">Club Manager</div>
        </div>
      </div>
    </div>
    <div style="max-width:700px;margin:48px auto 0 auto;">
      <h3 style="color:#ffff;font-size:1.3em;margin-bottom:12px;">Website Policy</h3>
      <ul style="font-size:1.05em;line-height:1.7;color:#ffff;padding-left:18px;">
        <li><strong>Privacy:</strong> We respect your privacy and protect your personal data. Information is used only for club operations and never shared without consent.</li>
        <li><strong>Security:</strong> All transactions and sensitive data are encrypted and securely processed.</li>
        <li><strong>Membership:</strong> Memberships are non-transferable and subject to club terms. Upgrades and renewals are available online.</li>
        <li><strong>Conduct:</strong> All members are expected to uphold a positive, respectful environment both online and in person.</li>
        <li><strong>Content:</strong> All resources, training materials, and media are for personal use only and may not be redistributed without permission.</li>
      </ul>
    </div>
  </section>

  <!-- Events -->
  <section id="events">
    <h2>Upcoming Events</h2>
    <ul>
      <li><strong>SpikeFest 2025:</strong> August 15 @ Beach Court</li>
      <li><strong>Drill & Skill Camp:</strong> Sept 1 - 3 @ Indoor Hall</li>
    </ul>
  </section>

  <!-- Contact -->
  <section id="contact">
    <h2>Let's Talk!</h2>
    <form>
      <input type="text" placeholder="Your Name" required />
      <input type="email" placeholder="Your Email" required />
      <textarea placeholder="Message..." required></textarea>
      <button type="submit">Send</button>
    </form>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 VibeVolley. All rights reserved.</p>
  </footer>

  <style>
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
  .dropdown-toggle i {
    font-size: 1em;
    margin-left: 6px;
    color: #fff;
    display: inline-block;
    vertical-align: middle;
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
    list-style: none;
    padding: 0;
  }
  .dropdown-menu li a {
    color: #2B2D42;
    padding: 12px 20px;
    display: block;
    text-decoration: none;
    font-weight: 500;
    background: #fff;
    border-bottom: 1px solid #f0f0f0;
    transition: background 0.2s;
  }
  .dropdown-menu li:last-child a {
    border-bottom: none;
  }
  .dropdown-menu li a:hover {
    background: #e0e7ff;
  }
  .dropdown:hover .dropdown-menu {
    display: block;
  }
  .dropdown:hover .dropdown-toggle {
    background: rgba(255,255,255,0.1);
  }
  </style>

</body>
</html> 