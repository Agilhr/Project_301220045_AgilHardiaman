<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manajemen Webinar - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8f9fa; }
        .container { max-width: 1000px; margin-top: 40px; }
        .table th, .table td { vertical-align: middle; }
    </style>
</head>
<body>
    <div class="container">
        <h3>Manajemen Webinar</h3>
        <a href="<?php echo base_url('index.php/admin/add_webinar'); ?>" class="btn btn-success mb-3">Tambah Webinar</a>
        <table class="table table-bordered table-hover bg-white">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Pembicara</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($webinars)): ?>
                    <tr><td colspan="6" class="text-center">Belum ada webinar.</td></tr>
                <?php else: $no=1; foreach($webinars as $w): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($w['title']); ?></td>
                        <td><?php echo htmlspecialchars($w['speaker_name']); ?></td>
                        <td><?php echo htmlspecialchars($w['webinar_date']); ?></td>
                        <td><?php echo htmlspecialchars($w['status']); ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/admin/edit_webinar/'.$w['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?php echo base_url('index.php/admin/delete_webinar/'.$w['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus webinar ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
        <a href="<?php echo base_url('index.php/admin_dashboard?menu=content'); ?>" class="btn btn-secondary mt-3">Kembali ke Content Management</a>
    </div>
</body>
</html> 