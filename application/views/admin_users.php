<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manajemen User - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8f9fa; }
        .container { max-width: 1000px; margin-top: 40px; }
        .table th, .table td { vertical-align: middle; }
    </style>
</head>
<body>
    <div class="container">
        <h3>Manajemen User</h3>
        <table class="table table-bordered table-hover bg-white">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($users)): ?>
                    <tr><td colspan="6" class="text-center">Belum ada user.</td></tr>
                <?php else: $no=1; foreach($users as $u): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($u['username']); ?></td>
                        <td><?php echo htmlspecialchars($u['email']); ?></td>
                        <td><?php echo htmlspecialchars($u['role']); ?></td>
                        <td><?php echo $u['is_active'] ? 'Aktif' : 'Nonaktif'; ?></td>
                        <td>
                            <?php if($u['is_active']): ?>
                                <a href="<?php echo base_url('index.php/admin/deactivate_user/'.$u['id']); ?>" class="btn btn-sm btn-warning">Nonaktifkan</a>
                            <?php else: ?>
                                <a href="<?php echo base_url('index.php/admin/activate_user/'.$u['id']); ?>" class="btn btn-sm btn-success">Aktifkan</a>
                            <?php endif; ?>
                            <a href="<?php echo base_url('index.php/admin/reset_password/'.$u['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Reset password user ini ke user123?')">Reset Password</a>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
        <a href="<?php echo base_url('index.php/admin_dashboard?menu=user'); ?>" class="btn btn-secondary mt-3">Kembali ke User Management</a>
    </div>
</body>
</html> 