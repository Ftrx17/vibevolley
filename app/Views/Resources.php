<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VibeVolley - Resource</title>
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

        /* Section Styling */
        .section {
            margin-bottom: 60px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .section h2 {
            font-size: 2.2em;
            font-weight: 700;
            color: white;
            margin-bottom: 10px;
        }

        .view-more {
            color: #2ed573;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 20px;
            background: rgba(46, 213, 115, 0.1);
        }

        .view-more:hover {
            background: rgba(46, 213, 115, 0.2);
            transform: translateX(5px);
        }

        /* Image Container */
        .image-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .image-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .image-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
        }

        .image-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .image-card:hover img {
            transform: scale(1.1);
        }

        .image-card-content {
            padding: 20px;
            text-align: center;
        }

        .image-card h3 {
            font-size: 1.2em;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .image-card p {
            color: #7f8c8d;
            font-size: 0.9em;
            line-height: 1.5;
        }

        /* Physical Training Cards */
        .physical-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .physical-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255, 71, 87, 0.3), rgba(46, 213, 115, 0.3));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .physical-card:hover::before {
            opacity: 1;
        }

        .physical-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .physical-card h3 {
            font-size: 1.3em;
            font-weight: 600;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .physical-card p {
            font-size: 0.9em;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            nav {
                gap: 20px;
            }
            
            .image-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
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
            
            .section {
                padding: 30px 20px;
            }
            
            .section h2 {
                font-size: 1.8em;
            }
            
            .image-container {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 15px;
            }
            
            .image-card img {
                height: 150px;
            }
        }

        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 2em;
            }
            
            .section {
                padding: 25px 15px;
            }
            
            .image-container {
                grid-template-columns: 1fr;
            }
            
            nav {
                font-size: 12px;
                gap: 10px;
            }
        }
        #videoModal {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.85);
            justify-content: center;
            align-items: center;
        }

        #videoModal iframe {
            width: 90%;
            max-width: 800px;
            aspect-ratio: 16/9;
            border: none;
        }

        #videoModal .close-btn {
            position: absolute;
            top: 40px;
            right: 40px;
            font-size: 35px;
            color: white;
            cursor: pointer;
            background: transparent;
            border: none;
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

        /* Enhanced Meal Dropdown Styling */
        .nutrition-toggle-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9em;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .nutrition-toggle-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        .nutrition-toggle-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .nutrition-toggle-btn:hover::before {
            left: 100%;
        }

        .nutrition-info {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 250, 252, 0.95) 100%);
            border-radius: 15px;
            padding: 20px;
            margin-top: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            transform-origin: top;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
            transform: scaleY(0);
            max-height: 0;
            overflow: hidden;
        }

        .nutrition-info.show {
            opacity: 1;
            transform: scaleY(1);
            max-height: 300px;
        }

        .nutrition-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nutrition-info li {
            padding: 8px 0;
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.95em;
            transition: all 0.3s ease;
        }

        .nutrition-info li:last-child {
            border-bottom: none;
        }

        .nutrition-info li:hover {
            background: rgba(102, 126, 234, 0.05);
            padding-left: 10px;
            border-radius: 8px;
        }

        .nutrition-info strong {
            color: #2c3e50;
            font-weight: 600;
        }

        .nutrition-info span {
            color: #667eea;
            font-weight: 500;
        }

        .nutrition-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
            margin-left: 10px;
        }

        .nutrition-badge.carbs {
            background: rgba(46, 213, 115, 0.1);
            color: #2ed573;
            border: 1px solid rgba(46, 213, 115, 0.3);
        }

        .nutrition-badge.protein {
            background: rgba(255, 71, 87, 0.1);
            color: #ff4757;
            border: 1px solid rgba(255, 71, 87, 0.3);
        }

        .nutrition-badge.fat {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        .nutrition-badge.calories {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            border: 1px solid rgba(102, 126, 234, 0.3);
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

        <main>
            <div class="main-content">
            <?php $tier = session('tier_ID'); ?>
            
            <?php if ($tier == 0): ?>
            <!-- Upgrade Message for Tier 0 -->
            <div class="section" style="text-align: center; padding: 60px 40px;">
                <h2 style="color: white; font-size: 2.5em; margin-bottom: 20px;">🔒 Resources Access Required</h2>
                <p style="color: rgba(255, 255, 255, 0.8); font-size: 1.2em; margin-bottom: 30px;">
                    Upgrade your membership to access our comprehensive resources and training materials.
                </p>
                <a href="/upgrade-tier" class="upgrade-btn" style="display: inline-block; background: linear-gradient(135deg, #ff4757, #ff3742); color: white; padding: 15px 30px; border-radius: 25px; text-decoration: none; font-weight: 600; font-size: 1.1em; transition: all 0.3s ease;">
                    Upgrade Membership
                </a>
            </div>
            <?php else: ?>
            <div class="page-header">
                <h1>Resources</h1>
                <p>Master the fundamentals and advanced techniques with our comprehensive training programs</p>
            </div>

            <!-- Mental Training Tips Section -->
            <?php if ($tier == 2 || $tier == 3): ?>
            <div class="section">
                <div class="section-header">
                    <h2>Mental Training Tips</h2>
                </div>
                <div class="image-container">
                    <div class="image-card">
                    <div class="image-card-content">
                        <h3>Mental Toughness Mini Book</h3>
                        <p>Injecting Mental Toughness into Your Volleyball Game.</p>
                        <a href="https://cdn2.sportngin.com/attachments/document/0144/2711/Mental_Toughness_Mini_Book__2.pdf" target="_blank" class="view-more" style="display:inline-block; margin-top:10px;">Open PDF →</a>
                    </div>
                    </div>
                    <div class="image-card">
                    <div class="image-card-content">
                        <h3>Brain Training for Volleyball</h3>
                        <p>A Guide to Teaching Focus, Leadership and Winning Attitude.</p>
                        <a href="https://cdn1.sportngin.com/attachments/document/6e1a-3100727/Brain-Training-for-VB-Digital-Version.pdf" target="_blank" class="view-more" style="display:inline-block; margin-top:10px;">Open PDF →</a>
                    </div>
                    </div>
                    <div class="image-card">
                    <div class="image-card-content">
                        <h3>Volleyball Development Matrix</h3>
                        <p>One Sport Three Discipline</p>
                        <a href="https://volleyball.ca/uploads/About/LTAD/VDM_May_8_2023_EN.pdf" target="_blank" class="view-more" style="display:inline-block; margin-top:10px;">Open PDF →</a>
                    </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- All Resources Section (if present) -->
            <?php if ($tier == 3): ?>
       
            

            <!-- Meal Planner Section -->
            <div class="section">
                <div class="section-header">
                <h2>🍱 Meal Planner</h2>
                </div>

                <h3 style="color:white; margin: 20px 0 10px;">🍳 Breakfast</h3>
                <div class="image-container">
                    <div class="image-card">
                    <img src="https://www.eatingwell.com/thmb/uyECc6gYIfSfgQ0t-NbPXSfSxvE=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/banana-oatmeal-b38b2229d8a7447094f7eca0cbafb908.jpg" alt="Oatmeal">
                    <div class="image-card-content">
                        <h3>Oatmeal & Banana</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>42g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>6g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>5g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>250 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>Oatmeal, banana, honey</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="image-card">
                    <img src="https://umamipot.com/wp-content/uploads/2024/01/tamago-sando.jpg" alt="Egg Sandwich">
                    <div class="image-card-content">
                        <h3>Egg Sandwich</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>28g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>14g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>11g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>320 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>Whole wheat bread, egg, mayo</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="image-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-Gm83WoyhyFiDrIBqouikXxNPP7WCbys0cw&s" alt="Fruit Bowl">
                    <div class="image-card-content">
                        <h3>Fruit Bowl</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>38g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>2g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>0g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>170 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>Apple, kiwi, grapes, pineapple</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="image-card">
                    <img src="https://images.immediate.co.uk/production/volatile/sites/30/2021/02/Protein-pancakes-b64bd40.jpg" alt="Pancakes">
                    <div class="image-card-content">
                        <h3>Protein Pancakes</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>30g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>12g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>8g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>290 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>Oats, eggs, banana, protein powder</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>

                <h3 style="color:white; margin: 30px 0 10px;">🍛 Lunch</h3>
                <div class="image-container">
                    <div class="image-card">
                    <img src="https://www.tasteofhome.com/wp-content/uploads/2018/01/Chicken-Rice-Bowl_EXPS_TOHAM25_25774_P2_MD_04_24_10b.jpg" alt="Chicken Rice">
                    <div class="image-card-content">
                        <h3>Chicken Rice Bowl</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>50g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>35g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>10g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>500 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>Chicken breast, brown rice, broccoli</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="image-card">
                    <img src="https://www.wellplated.com/wp-content/uploads/2016/05/Healthy-Italian-Pasta-Salad-with-Pepperoni.jpg" alt="Pasta Salad">
                    <div class="image-card-content">
                        <h3>Healthy Pasta Salad</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>45g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>15g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>12g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>420 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>Whole grain pasta, veggies, olive oil</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="image-card">
                    <img src="https://marleyspoon.com/media/recipes/125653/main_photos/large/low_cal_baked_barramundi-2b6a9664ddc7e64336e393326093b400.jpeg" alt="Fish Quinoa">
                    <div class="image-card-content">
                        <h3>Fish & Quinoa</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>35g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>32g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>9g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>450 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>White fish, quinoa, spinach</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="image-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsXQ6CawyEIMDmL__DlEBfNY9LLcwfDVAoGw&s" alt="Turkey Wrap">
                    <div class="image-card-content">
                        <h3>Turkey Wrap</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>40g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>25g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>7g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>410 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>Turkey, lettuce, wrap, mustard</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>

                <h3 style="color:white; margin: 30px 0 10px;">🍲 Dinner</h3>
                <div class="image-container">
                    <div class="image-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRy2cjwhBfqPg9iyJRk83GKenbppZ48lTupdw&s" alt="Salmon Dinner">
                    <div class="image-card-content">
                        <h3>Grilled Salmon & Veggies</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>20g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>30g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>12g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>390 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>Salmon, carrots, zucchini, olive oil</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="image-card">
                    <img src="https://thewoksoflife.com/wp-content/uploads/2024/10/tofu-soup-17.jpg" alt="Tofu Soup">
                    <div class="image-card-content">
                        <h3>Tofu Veggie Soup</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>18g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>12g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>4g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>220 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>Tofu, cabbage, miso, mushroom</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="image-card">
                    <img src="https://www.licious.in/blog/wp-content/uploads/2022/11/shutterstock_310087187-600x413.jpg" alt="Chicken Salad">
                    <div class="image-card-content">
                        <h3>Chicken Garden Salad</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>15g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>28g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>10g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>340 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>Chicken, lettuce, tomato, cucumber</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="image-card">
                    <img src="https://prorganiq.com/cdn/shop/articles/protein-in-1-bowl-dal_b6b22341-2662-4e13-85fa-497089ef7ef4.jpg?v=1740979822" alt="Lentil Bowl">
                    <div class="image-card-content">
                        <h3>Lentil Protein Bowl</h3>
                        <button class="nutrition-toggle-btn" onclick="toggleNutrition(this)">
                            <i class="fas fa-info-circle"></i> Nutrition Info
                        </button>
                        <div class="nutrition-info">
                            <ul>
                                <li>
                                    <strong>Carbs:</strong>
                                    <span>40g <span class="nutrition-badge carbs">Energy</span></span>
                                </li>
                                <li>
                                    <strong>Protein:</strong>
                                    <span>20g <span class="nutrition-badge protein">Muscle</span></span>
                                </li>
                                <li>
                                    <strong>Fat:</strong>
                                    <span>6g <span class="nutrition-badge fat">Healthy</span></span>
                                </li>
                                <li>
                                    <strong>Calories:</strong>
                                    <span>360 kcal <span class="nutrition-badge calories">Total</span></span>
                                </li>
                                <li>
                                    <strong>Ingredients:</strong>
                                    <span>Lentils, spinach, bell peppers</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
        <div class="section" style="text-align: center;">
        <h2 style="color: white;">📘 Inspiration</h2>
        <a href="https://cdn1.sportngin.com/attachments/document/0130/7668/Dean_Smith_Life_lessons.pdf#_ga=2.30231935.1578489392.1751758865" 
           target="_blank" class="view-more">10 Life Lessons from Dean Smith →</a>
      </div>
    </div>

        <!-- Contact WhatsApp Section -->
        <div class="section">
            <h2 style="color: white; margin-bottom: 10px;">Contact Coach for Consultation</h2>
            <p style="color: rgba(255,255,255,0.8); margin-bottom: 20px;">Consultation available during office hours (8AM - 6PM)</p>
            <div style="display: flex; align-items: center; gap: 20px;">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJ6D7MfyhLh5DdB5SEDkFHIYC3WTXT8Bp4jA&s" 
                    alt="Contact Person" 
                    style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #2ed573;">
                
                <div>
                    <h3 style="color: white; margin-bottom: 5px;">Dan Lewis</h3>
                    <p style="color: rgba(255,255,255,0.8); margin-bottom: 10px;">Senior Head Coach Canada</p>
                    <p style="color: rgba(255,255,255,0.8); margin-bottom: 10px;">📞 1-613-601-9363</p>
                    <a href="https://wa.me/16136019363" target="_blank" class="view-more" style="display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fab fa-whatsapp" style="font-size: 18px;"></i> WhatsApp Now
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </main>
    <?php endif; ?>
    <script>
        function toggleNutrition(button) {
            const info = button.nextElementSibling;
            const isShown = info.classList.contains('show');
            
            if (isShown) {
                info.classList.remove('show');
                button.innerHTML = '<i class="fas fa-info-circle"></i> Nutrition Info';
            } else {
                info.classList.add('show');
                button.innerHTML = '<i class="fas fa-times-circle"></i> Hide Info';
            }
        }
    </script>

</body>
</html>