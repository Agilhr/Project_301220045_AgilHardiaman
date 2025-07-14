<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard - Money Mentor Pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: linear-gradient(135deg, #3498db 0%, #27ae60 100%); min-height: 100vh; }
        .admin-card { max-width: 500px; margin: 60px auto; border-radius: 16px; box-shadow: 0 8px 32px rgba(44,62,80,0.15); background: #fff; padding: 32px 28px 24px 28px; }
        .logo-text { font-size: 2rem; font-weight: bold; color: #3498db; letter-spacing: 1px; margin-bottom: 8px; }
        .admin-title { font-size: 1.1rem; color: #2c3e50; margin-bottom: 18px; }
        .btn-danger { font-weight: 600; letter-spacing: 1px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="admin-card mt-5">
            <div class="text-center mb-3">
                <div class="logo-text">Money Mentor Pro</div>
                <div class="admin-title">Admin Dashboard</div>
            </div>
            <div class="alert alert-success text-center">Akses admin berhasil! Selamat datang, <b>Admin</b>.</div>
            <div class="text-center mb-3">
                <a href="<?php echo base_url('index.php/admin/logout'); ?>" class="btn btn-danger">Logout Admin</a>
            </div>
            <div class="text-center">
                <a href="<?php echo base_url('index.php/dashboard'); ?>">Kembali ke Dashboard User</a>
            </div>
        </div>
    </div>
</body>
</html> 