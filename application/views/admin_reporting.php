<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reporting - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8f9fa; }
        .container { max-width: 1100px; margin-top: 40px; }
        .stat-box { background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(44,62,80,0.07); padding: 18px 12px; text-align: center; margin-bottom: 18px; }
        .stat-value { font-size: 2rem; font-weight: bold; color: #27ae60; }
        .stat-label { color: #34495e; font-size: 1rem; }
        .table th, .table td { vertical-align: middle; }
    </style>
</head>
<body>
    <div class="container">
        <h3>Reporting</h3>
        <div class="row mb-4">
            <div class="col-md-3 col-6"><div class="stat-box"><div class="stat-value"><?php echo $stat['user']; ?></div><div class="stat-label">User</div></div></div>
            <div class="col-md-3 col-6"><div class="stat-box"><div class="stat-value"><?php echo $stat['artikel']; ?></div><div class="stat-label">Artikel</div></div></div>
            <div class="col-md-3 col-6"><div class="stat-box"><div class="stat-value"><?php echo $stat['video']; ?></div><div class="stat-label">Video</div></div></div>
            <div class="col-md-3 col-6"><div class="stat-box"><div class="stat-value"><?php echo $stat['webinar']; ?></div><div class="stat-label">Webinar</div></div></div>
        </div>
        <h5>Aktivitas User (Dummy)</h5>
        <table class="table table-bordered table-hover bg-white mb-4">
            <thead class="thead-light">
                <tr><th>Username</th><th>Aktivitas</th><th>Waktu</th></tr>
            </thead>
            <tbody>
                <?php foreach($aktivitas as $a): ?>
                <tr>
                    <td><?php echo htmlspecialchars($a['username']); ?></td>
                    <td><?php echo htmlspecialchars($a['aktivitas']); ?></td>
                    <td><?php echo htmlspecialchars($a['waktu']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h5>Konten Terpopuler (Dummy)</h5>
        <table class="table table-bordered table-hover bg-white">
            <thead class="thead-light">
                <tr><th>Tipe</th><th>Judul</th><th>Jumlah Akses</th></tr>
            </thead>
            <tbody>
                <?php foreach($populer as $p): ?>
                <tr>
                    <td><?php echo htmlspecialchars($p['tipe']); ?></td>
                    <td><?php echo htmlspecialchars($p['judul']); ?></td>
                    <td><?php echo htmlspecialchars($p['jumlah']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?php echo base_url('index.php/admin_dashboard?menu=report'); ?>" class="btn btn-secondary mt-3">Kembali ke Reporting</a>
    </div>
</body>
</html> 