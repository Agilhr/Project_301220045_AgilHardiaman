<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Access - Money Mentor Pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: linear-gradient(135deg, #3498db 0%, #27ae60 100%); min-height: 100vh; }
        .admin-card { max-width: 400px; margin: 60px auto; border-radius: 16px; box-shadow: 0 8px 32px rgba(44,62,80,0.15); background: #fff; padding: 32px 28px 24px 28px; }
        .logo-text { font-size: 2rem; font-weight: bold; color: #3498db; letter-spacing: 1px; margin-bottom: 8px; }
        .admin-title { font-size: 1.1rem; color: #2c3e50; margin-bottom: 18px; }
        .btn-primary { background: linear-gradient(90deg, #3498db 60%, #27ae60 100%); border: none; font-weight: 600; letter-spacing: 1px; }
        .btn-primary:hover { background: linear-gradient(90deg, #27ae60 60%, #3498db 100%); }
    </style>
</head>
<body>
    <div class="container">
        <div class="admin-card mt-5">
            <div class="text-center mb-3">
                <div class="logo-text">Money Mentor Pro</div>
                <div class="admin-title">Masukkan Password Admin</div>
            </div>
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form action="<?php echo base_url('index.php/admin/verify'); ?>" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="admin_password">Password Admin</label>
                    <input type="password" class="form-control" name="admin_password" id="admin_password" required autofocus>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Masuk Admin</button>
            </form>
            <div class="text-center mt-3">
                <a href="<?php echo base_url('index.php/dashboard'); ?>">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html> 