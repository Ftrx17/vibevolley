<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Product Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
            color: white;
        }

        /* Main Content */
        main {
            padding: 40px 5%;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
            color: white;
            margin-top: 60px;
        }

        .page-header h1 {
            font-size: 3em;
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
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.9em;
            box-shadow: 0 8px 25px rgba(255, 71, 87, 0.3);
            z-index: 10;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 71, 87, 0.4);
            background: linear-gradient(45deg, #ff3742, #ff4757);
            color: white;
        }

        /* Glass Container */
        .glass-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .glass-container::before {
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

        /* Action Buttons */
        .action-buttons {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-product-btn {
            background: linear-gradient(45deg, #2ed573, #1dd1a1);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 1.1em;
            box-shadow: 0 8px 25px rgba(46, 213, 115, 0.3);
        }

        .add-product-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(46, 213, 115, 0.4);
            background: linear-gradient(45deg, #1dd1a1, #2ed573);
            color: white;
        }

        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .stat-number {
            font-size: 2.5em;
            font-weight: 800;
            color: #2ed573;
            margin-bottom: 10px;
        }

        .stat-label {
            color: white;
            font-weight: 600;
            font-size: 1.1em;
        }

        /* Table Styling */
        .table-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }

        .table {
            background: transparent;
            color: white;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, rgba(255, 71, 87, 0.2), rgba(46, 213, 115, 0.2));
            color: white;
            font-weight: 600;
            border: none;
            padding: 20px 15px;
            font-size: 1em;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .table tbody, .table tbody tr, .table tbody td {
            background: rgba(44, 62, 80, 0.85) !important;
            color: #fff !important;
        }
        .table tbody tr:hover, .table tbody tr:hover td {
            background: rgba(102, 126, 234, 0.3) !important;
            color: #fff !important;
        }

        .table tbody td {
            border: none;
            padding: 20px 15px;
            font-weight: 500;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Action Buttons in Table */
        .action-buttons-cell {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .btn-edit {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 8px 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.9em;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            color: white;
        }

        .btn-delete {
            background: linear-gradient(45deg, #ff4757, #ff3742);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 8px 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.9em;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 71, 87, 0.3);
            background: linear-gradient(45deg, #ff3742, #ff4757);
            color: white;
        }

        /* Price Styling */
        .price {
            font-weight: 700;
            color: #2ed573;
            font-size: 1.1em;
        }

        .stock {
            display: inline-block;
            min-width: 60px;
            text-align: center;
            font-weight: 700;
            font-size: 1em;
            padding: 8px 18px;
            border-radius: 999px;
            margin: 0 0 0 8px;
            box-shadow: 0 4px 18px rgba(44,62,80,0.10), 0 1.5px 6px rgba(0,0,0,0.08);
            background: rgba(255,255,255,0.10);
            border: 1.5px solid rgba(255,255,255,0.25);
            backdrop-filter: blur(8px);
            letter-spacing: 0.5px;
            transition: background 0.2s, color 0.2s, border 0.2s;
        }
        .stock-high {
            color: #2ed573;
            border-color: #2ed57355;
            background: linear-gradient(90deg, rgba(46,213,115,0.13) 0%, rgba(46,213,115,0.09) 100%);
        }
        .stock-medium {
            color: #ffc107;
            border-color: #ffc10755;
            background: linear-gradient(90deg, rgba(255,193,7,0.13) 0%, rgba(255,193,7,0.09) 100%);
        }
        .stock-low {
            color: #ff4757;
            border-color: #ff475755;
            background: linear-gradient(90deg, rgba(255,71,87,0.13) 0%, rgba(255,71,87,0.09) 100%);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2.5em;
            }
            
            .glass-container {
                padding: 20px;
            }
            
            .table-container {
                padding: 15px;
            }
            
            .table thead th,
            .table tbody td {
                padding: 15px 10px;
                font-size: 0.9em;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 15px;
            }
            
            .stats-cards {
                grid-template-columns: 1fr;
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
        <a href="/admin" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>

        <div class="page-header">
        <h1>Product Management</h1>
            <p>Manage your VibeVolley product inventory and catalog</p>
        </div>

        <div class="glass-container">
            <div class="action-buttons">
                <a href="/admin/addProduct" class="add-product-btn">
                    <i class="fas fa-plus"></i> Add New Product
                </a>
            </div>

            <div class="stats-cards">
                <div class="stat-card">
                    <div class="stat-number"><?= count($products) ?></div>
                    <div class="stat-label">Total Products</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?= array_sum(array_column($products, 'stock')) ?></div>
                    <div class="stat-label">Total Stock</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">MYR <?= number_format(array_sum(array_column($products, 'price')), 2) ?></div>
                    <div class="stat-label">Total Value</div>
                </div>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-box"></i> Name</th>
                            <th><i class="fas fa-info-circle"></i> Description</th>
                            <th><i class="fas fa-tag"></i> Price</th>
                            <th><i class="fas fa-warehouse"></i> Stock</th>
                            <th><i class="fas fa-cogs"></i> Actions</th>
            </tr>
                    </thead>
                    <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                            <td><strong>#<?= esc($product['id']) ?></strong></td>
                            <td><strong><?= esc($product['name']) ?></strong></td>
                <td><?= esc($product['description']) ?></td>
                            <td class="price">MYR <?= number_format($product['price'], 2) ?></td>
                            <td>
                                <span class="stock <?= $product['stock'] > 10 ? 'stock-high' : ($product['stock'] > 5 ? 'stock-medium' : 'stock-low') ?>">
                                    <?= esc($product['stock']) ?> units
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons-cell">
                                    <a href="/admin/editProduct/<?= esc($product['id']) ?>" class="btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="/admin/deleteProduct/<?= esc($product['id']) ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                </td>
            </tr>
            <?php endforeach; ?>
                    </tbody>
        </table>
    </div>
        </div>
    </main>
</body>
</html>
