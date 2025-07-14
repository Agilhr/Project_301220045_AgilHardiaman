<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard - Money Mentor Pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: linear-gradient(135deg, #3498db 0%, #27ae60 100%); min-height: 100vh; }
        .admin-layout { display: flex; min-height: 100vh; }
        .sidebar {
            width: 220px;
            background: #2c3e50;
            color: #fff;
            padding: 32px 0 0 0;
            min-height: 100vh;
        }
        .sidebar .logo-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: #3498db;
            letter-spacing: 1px;
            margin-bottom: 32px;
            text-align: center;
        }
        .sidebar .nav-link {
            color: #fff;
            font-weight: 500;
            padding: 14px 32px;
            border-radius: 0;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: #3498db;
            color: #fff;
        }
        .main-content {
            flex: 1;
            background: #f8f9fa;
            padding: 40px 32px 32px 32px;
        }
        .admin-title { font-size: 1.3rem; color: #2c3e50; margin-bottom: 18px; font-weight: 600; }
        .logout-btn { margin-top: 32px; }
        @media (max-width: 768px) {
            .admin-layout { flex-direction: column; }
            .sidebar { width: 100%; min-height: auto; padding: 16px 0 0 0; }
            .main-content { padding: 18px 8px; }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <div class="sidebar">
            <div class="logo-text">Money Mentor Pro</div>
            <nav class="nav flex-column">
                <a class="nav-link<?php echo (!isset($_GET['menu'])||$_GET['menu']=='dashboard')?' active':''; ?>" href="?menu=dashboard">Dashboard</a>
                <a class="nav-link<?php echo (isset($_GET['menu'])&&$_GET['menu']=='content')?' active':''; ?>" href="?menu=content">Content Management</a>
                <a class="nav-link<?php echo (isset($_GET['menu'])&&$_GET['menu']=='user')?' active':''; ?>" href="?menu=user">User Management</a>
                <a class="nav-link<?php echo (isset($_GET['menu'])&&$_GET['menu']=='report')?' active':''; ?>" href="?menu=report">Reporting</a>
                <a class="nav-link logout-btn" href="<?php echo base_url('index.php/admin/logout'); ?>">Logout Admin</a>
            </nav>
        </div>
        <div class="main-content">
            <?php $menu = isset($_GET['menu']) ? $_GET['menu'] : 'dashboard'; ?>
            <?php if($menu=='dashboard'): ?>
                <div class="admin-title">Admin Dashboard</div>
                <div class="alert alert-success">Selamat datang di halaman admin Money Mentor Pro!</div>
                <ul>
                    <li>Kelola artikel, video, kategori, webinar</li>
                    <li>Kelola user</li>
                    <li>Lihat statistik & laporan</li>
                </ul>
            <?php elseif($menu=='content'): ?>
                <div class="admin-title">Content Management</div>
                <div class="mb-3"><b>Artikel</b> | <b>Video Tutorial</b> | <b>Kategori</b> | <b>Webinar</b></div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100"><div class="card-body text-center">
                            <h5 class="card-title">Artikel</h5>
                            <p class="card-text">Kelola semua artikel di platform.</p>
                            <a href="<?php echo base_url('index.php/admin/articles'); ?>" class="btn btn-primary">Kelola Artikel</a>
                        </div></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100"><div class="card-body text-center">
                            <h5 class="card-title">Video Tutorial</h5>
                            <p class="card-text">Kelola video tutorial edukasi.</p>
                            <a href="<?php echo base_url('index.php/admin/videos'); ?>" class="btn btn-info">Kelola Video</a>
                        </div></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100"><div class="card-body text-center">
                            <h5 class="card-title">Kategori</h5>
                            <p class="card-text">Kelola kategori artikel & video.</p>
                            <a href="<?php echo base_url('index.php/admin/categories'); ?>" class="btn btn-success">Kelola Kategori</a>
                        </div></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100"><div class="card-body text-center">
                            <h5 class="card-title">Webinar</h5>
                            <p class="card-text">Kelola event webinar edukasi.</p>
                            <a href="<?php echo base_url('index.php/admin/webinars'); ?>" class="btn btn-warning text-white">Kelola Webinar</a>
                        </div></div>
                    </div>
                </div>
            <?php elseif($menu=='user'): ?>
                <div class="admin-title">User Management</div>
                <div class="card mb-3"><div class="card-body">[Dummy] Tabel daftar user, tombol aktivasi/deaktivasi, reset password.</div></div>
            <?php elseif($menu=='report'): ?>
                <div class="admin-title">Reporting</div>
                <div class="card mb-3"><div class="card-body">[Dummy] Statistik website: jumlah user, artikel, video, webinar, dsb.</div></div>
                <div class="card mb-3"><div class="card-body">[Dummy] Tabel aktivitas user.</div></div>
                <div class="card mb-3"><div class="card-body">[Dummy] Daftar artikel/video/webinar terpopuler.</div></div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html> 