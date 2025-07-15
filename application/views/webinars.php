<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Webinar - Money Mentor Pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: linear-gradient(135deg, #3498db 0%, #27ae60 100%); min-height: 100vh; }
        .webinar-card { max-width: 900px; margin: 40px auto; border-radius: 16px; box-shadow: 0 8px 32px rgba(44, 62, 80, 0.15); background: #fff; padding: 32px 28px 24px 28px; }
        .webinar-title { font-size: 1.5rem; font-weight: bold; color: #3498db; margin-bottom: 18px; }
        .table th, .table td { vertical-align: middle; }
        .btn-back { margin-bottom: 18px; }
        @media (max-width: 576px) { .webinar-card { padding: 18px 8px 12px 8px; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="webinar-card mt-5">
            <div class="webinar-title mb-3">Daftar Webinar Edukasi</div>
            <a href="<?php echo base_url('index.php/dashboard'); ?>" class="btn btn-secondary btn-back">Kembali ke Dashboard</a>
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Pembicara</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($webinars)): ?>
                        <tr><td colspan="5" class="text-center">Belum ada webinar.</td></tr>
                    <?php else: foreach($webinars as $w): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($w['title']); ?></td>
                            <td><?php echo date('d M Y', strtotime($w['webinar_date'])); ?></td>
                            <td><?php echo htmlspecialchars($w['speaker_name']); ?></td>
                            <td><?php echo htmlspecialchars($w['status']); ?></td>
                            <td><a href="<?php echo base_url('index.php/dashboard/webinar_detail/'.$w['id']); ?>" class="btn btn-info btn-sm">Detail</a></td>
                        </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html> 