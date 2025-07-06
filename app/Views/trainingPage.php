<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VibeVolley - Training</title>
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
                <h2 style="color: white; font-size: 2.5em; margin-bottom: 20px;">🔒 Training Access Required</h2>
                <p style="color: rgba(255, 255, 255, 0.8); font-size: 1.2em; margin-bottom: 30px;">
                    Upgrade your membership to access our comprehensive training programs and resources.
                </p>
                <a href="/upgrade-tier" class="upgrade-btn" style="display: inline-block; background: linear-gradient(135deg, #ff4757, #ff3742); color: white; padding: 15px 30px; border-radius: 25px; text-decoration: none; font-weight: 600; font-size: 1.1em; transition: all 0.3s ease;">
                    Upgrade Membership
                </a>
            </div>
            <?php else: ?>
            <div class="page-header">
                <h1>Volleyball Training</h1>
                <p>Master the fundamentals and advanced techniques with our comprehensive training programs</p>
            </div>

            <!-- Technique Section (all tiers except 0) -->
            <div class="section">
                <div class="section-header">
                    <h2>🏐 Technique Training</h2>
                </div>
                <div class="image-container">
                    <div class="image-card">
                        <img src="serve.jpg" alt="Serve Technique" onclick="openModal('https://youtu.be/g5sX0LCitgs?si=uJa0K72mONxjNFvy')" style="cursor:pointer;">
                        <div class="image-card-content">
                            <h3>Serve Technique</h3>
                            <p>Master the perfect serve with proper form and power</p>
                            
                        </div>
                    </div>
                    <div class="image-card" onclick="openModal('https://youtu.be/7nKfkwERMac?si=xVRWH1vJlq6Z4fD-')" style="cursor:pointer;">
                        <img src="bumppass.jpeg" alt="Bump Pass">
                        <div class="image-card-content">
                            <h3>Bump Pass</h3>
                            <p>Learn the essential bump pass for ball control</p>
                        </div>
                    </div>
                    <div class="image-card" onclick="openModal('https://youtu.be/sFxs0EPD68Q?si=c9IXTtXAIkDsLw5B')" style="cursor:pointer;">
                        <img src="settechnique.jpeg" alt="Set Technique">
                        <div class="image-card-content">
                            <h3>Set Technique</h3>
                            <p>Perfect your setting skills for team coordination</p>
                        </div>
                    </div>
                    <div class="image-card" onclick="openModal('https://youtu.be/CSIhUzuAVAM?si=5Vwbs_0mp01FPvrs')" style="cursor:pointer;">
                        <img src="spike.jpg" alt="Spike Approach">
                        <div class="image-card-content">
                            <h3>Spike Approach</h3>
                            <p>Develop powerful and accurate spike techniques</p>
                        </div>
                    </div>
                    <div class="image-card" onclick="openModal('https://youtu.be/AOCp5wUOrXk?si=XoQYVbYebxsu5vP9')" style="cursor:pointer;">
                        <img src="block.jpeg" alt="Block Positioning">
                        <div class="image-card-content">
                            <h3>Block Positioning</h3>
                            <p>Master defensive blocking strategies</p>
                        </div>
                    </div>
                    <div class="image-card" onclick="openModal('https://youtu.be/HtTuI_iDifA?si=vFl5KjyNRqRq0C1i')" style="cursor:pointer;">
                        <img src="digdefense.jpeg" alt="Dig Defense">
                        <div class="image-card-content">
                            <h3>Dig Defense</h3>
                            <p>Learn effective defensive digging techniques</p>
                        </div>
                    </div>
                    <div class="image-card" onclick="openModal('https://youtu.be/eg0Yx8VI-ek?si=ggk3cpgL32zeSHII')" style="cursor:pointer;">
                        <img src="floatserve.jpg" alt="Float Serve">
                        <div class="image-card-content">
                            <h3>Float Serve</h3>
                            <p>Master the unpredictable float serve</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Physical Training Section (tier 2 and 3) -->
            <?php if ($tier == 2 || $tier == 3): ?>
            <div class="section">
                <div class="section-header">
                    <h2>💪 Physical Training</h2>
                </div>
                <div class="image-container">
                    <div class="physical-card" onclick="openModal('https://youtu.be/V8i3lWQckqc?si=r3zqh0sq9fCPOiQ2')" style="cursor:pointer;">
                        <h3>Agility Drill</h3>
                        <p>Improve your quick movements and reflexes</p>
                    </div>
                    <div class="physical-card" onclick="openModal('https://youtu.be/nUEhTONypg4?si=vKM2ieFgl4vQfzBN')" style="cursor:pointer;">
                        <h3>Jump Training</h3>
                        <p>Enhance your vertical leap and power</p>
                    </div>
                    <div class="physical-card" onclick="openModal('https://youtu.be/Nu9ChmvyHfA?si=P5bGVpBnfkKeSQQL')" style="cursor:pointer;">
                        <h3>Strength Exercise</h3>
                        <p>Build core strength and muscle power</p>
                    </div>
                    <div class="physical-card" onclick="openModal('https://youtu.be/i--0z1Z9-Zw?si=GS7-_J2bcfBzgmko')" style="cursor:pointer;">
                        <h3>Endurance Run</h3>
                        <p>Improve stamina and cardiovascular fitness</p>
                    </div>
                    <div class="physical-card" onclick="openModal('https://youtu.be/gCmjld4jnd4?si=1AJrjl8fHolQZCnO')" style="cursor:pointer;">
                        <h3>Core Stability</h3>
                        <p>Strengthen your core for better balance</p>
                    </div>
                    <div class="physical-card" onclick="openModal('')" style="cursor:pointer;">
                        <h3>Speed Burst</h3>
                        <p>Develop explosive speed and acceleration</p>
                    </div>
                    <div class="physical-card" onclick="openModal('https://youtu.be/NVYwy5bg6wc?si=5QfSNdqSZ19f1dje')" style="cursor:pointer;">
                        <h3>Flexibility Stretch</h3>
                        <p>Increase flexibility and prevent injuries</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>
    <div id="videoModal">
        <button class="close-btn" onclick="closeModal()">&times;</button>
        <iframe id="youtubeFrame" src="" allowfullscreen allow="autoplay; encrypted-media"></iframe>
    </div>

    <script>
        function openModal(url) {
            const embedUrl = convertToEmbed(url);
            document.getElementById('youtubeFrame').src = embedUrl;
            document.getElementById('videoModal').style.display = 'flex';
        }

        function closeModal() {
            const frame = document.getElementById('youtubeFrame');
            frame.src = '';
            document.getElementById('videoModal').style.display = 'none';
        }

        function convertToEmbed(url) {
            let videoId = '';
            if (url.includes('youtu.be')) {
                videoId = url.split('youtu.be/')[1].split('?')[0];
            } else if (url.includes('watch?v=')) {
                videoId = url.split('v=')[1].split('&')[0];
            }
            return `https://www.youtube.com/embed/${videoId}?autoplay=1`;
        }
        

    </script>
</body>
</html>