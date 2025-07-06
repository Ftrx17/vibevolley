<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - VibeVolley</title>
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
            min-height: 100vh;
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

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-info {
            text-align: right;
        }

        .admin-name {
            font-weight: 600;
            color: #2ed573;
        }

        .admin-role {
            font-size: 0.9em;
            color: rgba(255, 255, 255, 0.7);
        }

        .logout-btn {
            background: linear-gradient(45deg, #ff4757, #ff3742);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.9em;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 71, 87, 0.3);
        }

        /* Main Content */
        main {
            padding: 40px 5%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 50px;
            color: white;
        }

        .dashboard-header h1 {
            font-size: 3em;
            font-weight: 800;
            margin-bottom: 15px;
            background: linear-gradient(45deg, #fff, #f1f2f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .dashboard-header p {
            font-size: 1.2em;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Statistics Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            font-size: 3em;
            margin-bottom: 15px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-number {
            font-size: 2.5em;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1.1em;
            color: #7f8c8d;
            font-weight: 500;
        }

        /* Glass-like Management Buttons */
        .management-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .management-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
            position: relative;
            overflow: hidden;
        }

        .management-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            border-radius: 25px;
            z-index: -1;
        }

        .management-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
            z-index: 1;
        }

        .management-card:hover::after {
            left: 100%;
        }

        .management-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .management-icon {
            font-size: 4em;
            margin-bottom: 20px;
            background: linear-gradient(45deg, #ff4757, #2ed573);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            z-index: 2;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        }

        .management-title {
            font-size: 1.8em;
            font-weight: 700;
            color: white;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .management-desc {
            font-size: 1.1em;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
            position: relative;
            z-index: 2;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header {
                padding: 15px 5%;
                flex-direction: column;
                gap: 15px;
            }
            
            .dashboard-header h1 {
                font-size: 2.5em;
            }
            
            .management-container {
                grid-template-columns: 1fr;
            }
            
            .management-card {
                padding: 30px 20px;
            }
            
            .stats-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
            }
        }

        @media (max-width: 480px) {
            .dashboard-header h1 {
                font-size: 2em;
            }
            
            .management-card {
                padding: 25px 15px;
            }
            
            .stat-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">VibeVolley Admin</div>
        <div class="header-right">
            <div class="admin-info">
                <div class="admin-name"><?= esc(session()->get('user_name') ?? 'Admin') ?></div>
                <div class="admin-role">Administrator</div>
            </div>
            <a href="/logout" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </header>

    <main>
        <div class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <p>Manage your VibeVolley community and products</p>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number"><?= $total_users ?? 0 ?></div>
                <div class="stat-label">Total Members</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="stat-number"><?= $total_products ?? 0 ?></div>
                <div class="stat-label">Total Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="stat-number"><?= $total_orders ?? 0 ?></div>
                <div class="stat-label">Total Orders</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-number"><?= $active_members ?? 0 ?></div>
                <div class="stat-label">Active Members</div>
            </div>
        </div>

        <!-- Management Buttons -->
        <div class="management-container">
            <a href="/admin/members" class="management-card">
                <div class="management-icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <div class="management-title">Member Management</div>
                <div class="management-desc">
                    Manage member accounts, view membership status, update tiers, and monitor member activity. 
                    Access detailed member information and payment status.
                </div>
            </a>
            <a href="/admin/products" class="management-card">
                <div class="management-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="management-title">Product Management</div>
                <div class="management-desc">
                    Add, edit, and remove products from the shop. Manage inventory, update prices, 
                    and control product availability for your members.
                </div>
            </a>
        </div>


    </main>

    <script>
        // Auto-refresh statistics every 30 seconds
        setInterval(() => {
            location.reload();
        }, 30000);
    </script>
</body>
</html> 