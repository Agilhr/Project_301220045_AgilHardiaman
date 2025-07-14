<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simulasi Investasi - Money Mentor Pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: linear-gradient(135deg, #3498db 0%, #27ae60 100%); min-height: 100vh; }
        .simulasi-card { max-width: 500px; margin: 40px auto; border-radius: 16px; box-shadow: 0 8px 32px rgba(44,62,80,0.15); background: #fff; padding: 32px 28px 24px 28px; }
        .logo-text { font-size: 2rem; font-weight: bold; color: #3498db; letter-spacing: 1px; margin-bottom: 8px; }
        .simulasi-title { font-size: 1.25rem; color: #2c3e50; margin-bottom: 18px; }
        .btn-primary { background: linear-gradient(90deg, #3498db 60%, #27ae60 100%); border: none; font-weight: 600; letter-spacing: 1px; }
        .btn-primary:hover { background: linear-gradient(90deg, #27ae60 60%, #3498db 100%); }
        .result-box { background: #f8f9fa; border-radius: 10px; padding: 18px 12px; margin-top: 18px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="simulasi-card mt-5">
            <div class="text-center mb-3">
                <div class="logo-text">Money Mentor Pro</div>
                <div class="simulasi-title">Simulasi Investasi</div>
            </div>
            <form action="<?php echo base_url('index.php/dashboard/simulasi'); ?>" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="initial_amount">Dana Awal (Rp)</label>
                    <input type="number" class="form-control" name="initial_amount" id="initial_amount" required min="0" value="<?php echo isset($result) ? $result['initial'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="monthly_contribution">Investasi Bulanan (Rp)</label>
                    <input type="number" class="form-control" name="monthly_contribution" id="monthly_contribution" required min="0" value="<?php echo isset($result) ? $result['monthly'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="duration_months">Durasi (bulan)</label>
                    <input type="number" class="form-control" name="duration_months" id="duration_months" required min="1" value="<?php echo isset($result) ? $result['duration'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="expected_return_rate">Jenis Investasi</label>
                    <select class="form-control" name="expected_return_rate" id="expected_return_rate" required>
                        <option value="">Pilih Jenis Investasi</option>
                        <?php foreach($products as $p): ?>
                            <option value="<?php echo $p['rate']; ?>" <?php if(isset($result) && $result['rate']==$p['rate']) echo 'selected'; ?>><?php echo $p['name'].' (Estimasi '.$p['rate'].'%/tahun)'; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Hitung Simulasi</button>
            </form>
            <?php if(isset($result)): ?>
            <div class="result-box mt-4">
                <h5>Hasil Estimasi Investasi</h5>
                <p><b>Dana Akhir:</b> Rp <?php echo number_format($result['final'],0,',','.'); ?></p>
                <p><b>Dana Awal:</b> Rp <?php echo number_format($result['initial'],0,',','.'); ?><br>
                <b>Investasi Bulanan:</b> Rp <?php echo number_format($result['monthly'],0,',','.'); ?><br>
                <b>Durasi:</b> <?php echo $result['duration']; ?> bulan<br>
                <b>Estimasi Return:</b> <?php echo $result['rate']; ?>% per tahun</p>
            </div>
            <?php endif; ?>
            <div class="text-center mt-3">
                <a href="<?php echo base_url('index.php/dashboard'); ?>">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html> 