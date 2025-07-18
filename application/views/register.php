<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Money Mentor Pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #3498db 0%, #27ae60 100%);
            min-height: 100vh;
        }
        .register-card {
            max-width: 420px;
            margin: 40px auto;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.15);
            background: #fff;
            padding: 32px 28px 24px 28px;
        }
        .logo-text {
            font-size: 2rem;
            font-weight: bold;
            color: #3498db;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }
        .register-title {
            font-size: 1.25rem;
            color: #2c3e50;
            margin-bottom: 18px;
        }
        .btn-primary {
            background: linear-gradient(90deg, #3498db 60%, #27ae60 100%);
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #27ae60 60%, #3498db 100%);
        }
        .form-group label {
            font-weight: 500;
            color: #34495e;
        }
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52,152,219,.15);
        }
        .login-link {
            color: #3498db;
            font-weight: 500;
        }
        @media (max-width: 576px) {
            .register-card {
                padding: 18px 8px 12px 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-card mt-5">
            <div class="text-center mb-3">
                <div class="logo-text">Money Mentor Pro</div>
                <div class="register-title">Buat Akun Baru</div>
            </div>
            <?php if(validation_errors()): ?>
                <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
            <?php endif; ?>
            <form action="<?php echo base_url('index.php/register/submit'); ?>" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required value="<?php echo set_value('username'); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required value="<?php echo set_value('email'); ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" required value="<?php echo set_value('first_name'); ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" required value="<?php echo set_value('last_name'); ?>">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" id="role" required>
                        <option value="user" <?php echo set_select('role', 'user', TRUE); ?>>User</option>
                        <option value="admin" <?php echo set_select('role', 'admin'); ?>>Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
            <div class="text-center mt-3">
                <span>Sudah punya akun? <a class="login-link" href="<?php echo base_url('index.php/login'); ?>">Login di sini</a></span>
            </div>
        </div>
    </div>
</body>
</html> 