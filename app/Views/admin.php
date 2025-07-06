<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - Member Management</title>
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

    /* Filter Section */
    .filter-section {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      padding: 25px;
      margin-bottom: 30px;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .filter-section h3 {
      color: white;
      font-weight: 600;
      margin-bottom: 20px;
      font-size: 1.3em;
    }

    .form-control, .form-select {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: white;
      border-radius: 15px;
      padding: 12px 20px;
      font-size: 1em;
      transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
      background: rgba(255, 255, 255, 0.15);
      border-color: #ff4757;
      box-shadow: 0 0 0 3px rgba(255, 71, 87, 0.1);
      color: white;
    }

    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.7);
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
      color: #ffffff;
      border-collapse: separate;
      border-spacing: 0;
    }

    .table thead th {
      background: linear-gradient(135deg, rgba(102, 126, 234, 0.7), rgba(118, 75, 162, 0.7));
      color: #fff;
      font-weight: 700;
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

    /* Style select dropdowns and form elements */
    .table select, .form-select, .form-control {
      background: rgba(255,255,255,0.15);
      color: #fff;
      border: 1px solid rgba(255,255,255,0.3);
      border-radius: 10px;
      padding: 8px 16px;
      font-size: 1em;
      font-weight: 500;
      transition: background 0.2s, color 0.2s;
    }
    .table select:focus, .form-select:focus, .form-control:focus {
      background: rgba(102,126,234,0.2);
      color: #fff;
      outline: none;
      border-color: #2ed573;
    }
    .table select option {
      color: #333;
      background: #fff;
    }

    /* Status Badges */
    .status-badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 0.85em;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .status-paid {
      background: rgba(46, 213, 115, 0.2);
      color: #2ed573;
      border: 1px solid rgba(46, 213, 115, 0.3);
    }

    .status-unpaid {
      background: rgba(255, 71, 87, 0.2);
      color: #ff4757;
      border: 1px solid rgba(255, 71, 87, 0.3);
    }

    /* Buttons */
    .btn-glass {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: white;
      border-radius: 15px;
      padding: 10px 20px;
      font-weight: 600;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .btn-glass:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-2px);
      color: white;
    }

    .btn-edit {
      background: linear-gradient(45deg, #667eea, #764ba2);
      color: white;
      border: none;
      border-radius: 15px;
      padding: 8px 16px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-edit:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
      color: white;
    }

    .btn-save {
      background: linear-gradient(45deg, #2ed573, #1dd1a1);
      color: white;
      border: none;
      border-radius: 15px;
      padding: 12px 30px;
      font-weight: 600;
      transition: all 0.3s ease;
      font-size: 1.1em;
    }

    .btn-save:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(46, 213, 115, 0.3);
      color: white;
    }

    /* Loading Animation */
    .loading-container {
      text-align: center;
      padding: 40px;
      color: white;
    }

    .spinner-custom {
      width: 3rem;
      height: 3rem;
      border: 3px solid rgba(255, 255, 255, 0.3);
      border-top: 3px solid #ff4757;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Modal Styling */
    .modal-content {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      color: white;
    }

    .modal-header {
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .modal-footer {
      border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    .btn-close {
      filter: invert(1);
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
      <h1>Member Management</h1>
      <p>Manage your VibeVolley community members and their membership status</p>
    </div>

    <div class="glass-container">
      <div class="filter-section">
        <h3><i class="fas fa-filter"></i> Search & Filter</h3>
        <div class="row">
          <div class="col-md-6 mb-3">
            <input type="text" id="searchName" class="form-control" placeholder="Search by member name...">
          </div>
          <div class="col-md-6 mb-3">
      <select id="filterPayment" class="form-select">
        <option value="">All Payment Status</option>
        <option value="paid">Paid</option>
        <option value="unpaid">Unpaid</option>
      </select>
    </div>
  </div>
      </div>

      <div class="table-container">
        <table class="table">
          <thead>
            <tr>
              <th><i class="fas fa-user"></i> Name</th>
              <th><i class="fas fa-envelope"></i> Email</th>
              <th><i class="fas fa-crown"></i> Tier</th>
              <th><i class="fas fa-credit-card"></i> Payment Status</th>
              <th><i class="fas fa-calendar"></i> Membership Expiry</th>
              <th><i class="fas fa-clock"></i> Countdown</th>
              <th><i class="fas fa-cogs"></i> Actions</th>
        </tr>
      </thead>
      <tbody id="userTable">
            <tr>
              <td colspan="7" class="text-center">
                <div class="loading-container">
                  <div class="spinner-custom"></div>
                  <p class="mt-3">Loading members...</p>
                </div>
              </td>
            </tr>
      </tbody>
    </table>
  </div>

      <div class="d-flex justify-content-end mt-4">
        <button class="btn-save" id="saveAllBtn">
          <i class="fas fa-save"></i> Save All Changes
    </button>
  </div>
</div>
  </main>

<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Member Tier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="editUserId">
        <label class="form-label">Tier:</label>
        <select id="editTier" class="form-select">
          <option value="0">Normal</option>
          <option value="1">Plus</option>
          <option value="2">Gold</option>
          <option value="3">Platinum</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveEdit">Save</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/script.js"></script>
</body>
</html> 