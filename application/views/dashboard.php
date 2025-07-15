<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard - Money Mentor Pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #3498db 0%, #27ae60 100%);
            min-height: 100vh;
        }
        .dashboard-card {
            max-width: 900px;
            margin: 40px auto;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.15);
            background: #fff;
            padding: 32px 28px 24px 28px;
        }
        .logo-text {
            font-size: 2rem;
            font-weight: bold;
            color: #3498db;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }
        .dashboard-title {
            font-size: 1.25rem;
            color: #2c3e50;
            margin-bottom: 18px;
        }
        .stat-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 18px 12px;
            margin-bottom: 18px;
            text-align: center;
        }
        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: #27ae60;
        }
        .stat-label {
            color: #34495e;
            font-size: 1rem;
        }
        .progress {
            height: 18px;
            border-radius: 10px;
        }
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #3498db;
            margin-top: 24px;
            margin-bottom: 12px;
        }
        .list-group-item {
            border: none;
            padding-left: 0;
        }
        .quick-actions {
            margin: 18px 0 24px 0;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
        }
        .avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #3498db;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            font-weight: bold;
            margin-right: 10px;
        }
        .logout-btn {
            position: absolute;
            top: 24px;
            right: 32px;
        }
        @media (max-width: 576px) {
            .dashboard-card {
                padding: 18px 8px 12px 8px;
            }
            .logout-btn {
                right: 10px;
                top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="<?php echo base_url('index.php/login/logout'); ?>" class="btn btn-outline-danger btn-sm logout-btn">Logout</a>
        <div class="dashboard-card mt-5 position-relative">
            <div class="d-flex align-items-center justify-content-center mb-3">
                <div class="avatar"><?php echo strtoupper(substr($user['username'],0,2)); ?></div>
                <div>
                    <div class="logo-text">Money Mentor Pro</div>
                    <div class="dashboard-title">Dashboard - Selamat datang, <b><?php echo htmlspecialchars($user['username']); ?></b></div>
                </div>
            </div>
            <?php if(isset($user['role']) && $user['role'] === 'admin'): ?>
            <div class="text-center mb-3">
                <a href="<?php echo base_url('index.php/admin'); ?>" class="btn btn-dark">Masuk Admin</a>
            </div>
            <?php endif; ?>
            <div class="quick-actions">
                <a href="<?php echo base_url('index.php/dashboard/simulasi'); ?>" class="btn btn-success">Mulai Simulasi</a>
                <a href="<?php echo base_url('index.php/dashboard/challenge_quiz'); ?>" class="btn btn-warning text-white">Ikuti Challenge</a>
                <a href="<?php echo base_url('index.php/dashboard/articles'); ?>" class="btn btn-primary">Baca Artikel</a>
                <a href="#webinar" class="btn btn-info text-white">Daftar Webinar</a>
            </div>
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="stat-value"><?php echo $statistik['artikel_dibaca']; ?></div>
                        <div class="stat-label">Artikel Dibaca</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="stat-value"><?php echo $statistik['simulasi_dilakukan']; ?></div>
                        <div class="stat-label">Simulasi Dilakukan</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="stat-value"><?php echo $statistik['skor_quiz']; ?></div>
                        <div class="stat-label">Skor Quiz Rata-rata</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="stat-value"><?php echo $statistik['progress_belajar']; ?>%</div>
                        <div class="stat-label">Progress Belajar</div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $statistik['progress_belajar']; ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-title">Rekomendasi Artikel</div>
            <ul class="list-group mb-3">
                <?php foreach($rekomendasi['artikel'] as $a): ?>
                    <li class="list-group-item">• <a href="#detail-artikel" class="text-primary"><?php echo htmlspecialchars($a['title']); ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="section-title">Rekomendasi Webinar</div>
            <ul class="list-group mb-3">
                <?php foreach($rekomendasi['webinar'] as $w): ?>
                    <li class="list-group-item">• <a href="#detail-webinar" class="text-info"><?php echo htmlspecialchars($w['title']); ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="section-title">Rekomendasi Challenge</div>
            <ul class="list-group">
                <?php foreach($rekomendasi['challenge'] as $c): ?>
                    <li class="list-group-item">• <a href="#detail-challenge" class="text-warning"><?php echo htmlspecialchars($c['title']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html> 