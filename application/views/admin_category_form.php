<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo isset($category) ? 'Edit' : 'Tambah'; ?> Kategori - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8f9fa; }
        .container { max-width: 600px; margin-top: 40px; }
    </style>
</head>
<body>
    <div class="container">
        <h3><?php echo isset($category) ? 'Edit' : 'Tambah'; ?> Kategori</h3>
        <form action="<?php echo isset($category) ? base_url('index.php/admin/update_category/'.$category['id']) : base_url('index.php/admin/save_category'); ?>" method="post">
            <div class="form-group">
                <label for="name">Nama Kategori</label>
                <input type="text" class="form-control" name="name" id="name" required value="<?php echo isset($category) ? htmlspecialchars($category['name']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" required value="<?php echo isset($category) ? htmlspecialchars($category['slug']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" rows="3"><?php echo isset($category) ? htmlspecialchars($category['description']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="icon">Icon (class fontawesome)</label>
                <input type="text" class="form-control" name="icon" id="icon" value="<?php echo isset($category) ? htmlspecialchars($category['icon']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="color">Warna (hex)</label>
                <input type="text" class="form-control" name="color" id="color" value="<?php echo isset($category) ? htmlspecialchars($category['color']) : '#3498db'; ?>">
            </div>
            <div class="form-group">
                <label for="is_active">Status</label>
                <select class="form-control" name="is_active" id="is_active">
                    <option value="1" <?php if(isset($category) && $category['is_active']==1) echo 'selected'; ?>>Aktif</option>
                    <option value="0" <?php if(isset($category) && $category['is_active']==0) echo 'selected'; ?>>Nonaktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url('index.php/admin/categories'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html> 