<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manajemen Kategori - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8f9fa; }
        .container { max-width: 900px; margin-top: 40px; }
        .table th, .table td { vertical-align: middle; }
    </style>
</head>
<body>
    <div class="container">
        <h3>Manajemen Kategori</h3>
        <a href="<?php echo base_url('index.php/admin/add_category'); ?>" class="btn btn-success mb-3">Tambah Kategori</a>
        <table class="table table-bordered table-hover bg-white">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($categories)): ?>
                    <tr><td colspan="6" class="text-center">Belum ada kategori.</td></tr>
                <?php else: $no=1; foreach($categories as $c): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($c['name']); ?></td>
                        <td><?php echo htmlspecialchars($c['slug']); ?></td>
                        <td><?php echo htmlspecialchars($c['description']); ?></td>
                        <td><?php echo $c['is_active'] ? 'Aktif' : 'Nonaktif'; ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/admin/edit_category/'.$c['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?php echo base_url('index.php/admin/delete_category/'.$c['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus kategori ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
        <a href="<?php echo base_url('index.php/admin_dashboard?menu=content'); ?>" class="btn btn-secondary mt-3">Kembali ke Content Management</a>
    </div>
</body>
</html> 