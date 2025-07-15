<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Detail Webinar - Money Mentor Pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: linear-gradient(135deg, #3498db 0%, #27ae60 100%); min-height: 100vh; }
        .detail-card { max-width: 800px; margin: 40px auto; border-radius: 16px; box-shadow: 0 8px 32px rgba(44, 62, 80, 0.15); background: #fff; padding: 32px 28px 24px 28px; }
        .webinar-title { font-size: 2rem; font-weight: bold; color: #3498db; margin-bottom: 8px; }
        .meta { color: #888; font-size: 0.95rem; margin-bottom: 18px; }
        .content { color: #2c3e50; font-size: 1.1rem; margin-bottom: 18px; }
        .btn-back { margin-top: 18px; }
        @media (max-width: 576px) { .detail-card { padding: 18px 8px 12px 8px; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="detail-card mt-5">
            <div class="webinar-title"><?php echo htmlspecialchars($webinar['title']); ?></div>
            <div class="meta">
                Tanggal: <?php echo date('d M Y', strtotime($webinar['webinar_date'])); ?> |
                Pembicara: <?php echo htmlspecialchars($webinar['speaker_name']); ?> |
                Status: <?php echo htmlspecialchars($webinar['status']); ?>
            </div>
            <div class="content"><?php echo nl2br(htmlspecialchars($webinar['description'])); ?></div>
            <a href="<?php echo base_url('index.php/dashboard/webinars'); ?>" class="btn btn-secondary btn-back">Kembali ke Daftar Webinar</a>
        </div>
    </div>
</body>
</html> 