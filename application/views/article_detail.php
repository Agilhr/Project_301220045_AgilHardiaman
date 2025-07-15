<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Detail Artikel - Money Mentor Pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: linear-gradient(135deg, #3498db 0%, #27ae60 100%); min-height: 100vh; }
        .detail-card { max-width: 800px; margin: 40px auto; border-radius: 16px; box-shadow: 0 8px 32px rgba(44, 62, 80, 0.15); background: #fff; padding: 32px 28px 24px 28px; }
        .article-title { font-size: 2rem; font-weight: bold; color: #3498db; margin-bottom: 8px; }
        .meta { color: #888; font-size: 0.95rem; margin-bottom: 18px; }
        .content { color: #2c3e50; font-size: 1.1rem; margin-bottom: 18px; }
        .btn-back { margin-top: 18px; }
        @media (max-width: 576px) { .detail-card { padding: 18px 8px 12px 8px; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="detail-card mt-5">
            <div class="article-title"><?php echo htmlspecialchars($article['title']); ?></div>
            <div class="meta">
                Kategori: <?php echo htmlspecialchars($article['category_id']); ?> |
                Penulis: <?php echo htmlspecialchars($article['author_id']); ?> |
                Tanggal: <?php echo date('d M Y', strtotime($article['created_at'])); ?>
            </div>
            <div class="content"><?php echo nl2br(htmlspecialchars($article['content'])); ?></div>
            <a href="<?php echo base_url('index.php/dashboard/articles'); ?>" class="btn btn-secondary btn-back">Kembali ke Daftar Artikel</a>
        </div>
    </div>
</body>
</html> 