<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo isset($article) ? 'Edit' : 'Tambah'; ?> Artikel - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8f9fa; }
        .container { max-width: 700px; margin-top: 40px; }
    </style>
</head>
<body>
    <div class="container">
        <h3><?php echo isset($article) ? 'Edit' : 'Tambah'; ?> Artikel</h3>
        <form action="<?php echo isset($article) ? base_url('index.php/admin/update_article/'.$article['id']) : base_url('index.php/admin/save_article'); ?>" method="post">
            <div class="form-group">
                <label for="title">Judul Artikel</label>
                <input type="text" class="form-control" name="title" id="title" required value="<?php echo isset($article) ? htmlspecialchars($article['title']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="category_id">Kategori</label>
                <select class="form-control" name="category_id" id="category_id" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach($categories as $c): ?>
                        <option value="<?php echo $c['id']; ?>" <?php if(isset($article) && $article['category_id']==$c['id']) echo 'selected'; ?>><?php echo htmlspecialchars($c['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="content">Isi Artikel</label>
                <textarea class="form-control" name="content" id="content" rows="7" required><?php echo isset($article) ? htmlspecialchars($article['content']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="author_id">Penulis</label>
                <select class="form-control" name="author_id" id="author_id" required>
                    <option value="">Pilih Penulis</option>
                    <?php foreach($authors as $u): ?>
                        <option value="<?php echo $u['id']; ?>" <?php if(isset($article) && $article['author_id']==$u['id']) echo 'selected'; ?>><?php echo htmlspecialchars($u['username']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="draft" <?php if(isset($article) && $article['status']=='draft') echo 'selected'; ?>>Draft</option>
                    <option value="published" <?php if(isset($article) && $article['status']=='published') echo 'selected'; ?>>Published</option>
                    <option value="archived" <?php if(isset($article) && $article['status']=='archived') echo 'selected'; ?>>Archived</option>
                </select>
            </div>
            <div class="form-group">
                <label for="featured_image">Featured Image (URL)</label>
                <input type="text" class="form-control" name="featured_image" id="featured_image" value="<?php echo isset($article) ? htmlspecialchars($article['featured_image']) : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url('index.php/admin/articles'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html> 