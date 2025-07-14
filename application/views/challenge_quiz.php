<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Challenge Quiz - Money Mentor Pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: linear-gradient(135deg, #3498db 0%, #27ae60 100%); min-height: 100vh; }
        .quiz-card { max-width: 700px; margin: 40px auto; border-radius: 16px; box-shadow: 0 8px 32px rgba(44, 62, 80, 0.15); background: #fff; padding: 32px 28px 24px 28px; }
        .quiz-title { font-size: 1.5rem; font-weight: bold; color: #3498db; margin-bottom: 18px; }
        .question { font-weight: 500; color: #2c3e50; margin-bottom: 8px; }
        .choices label { display: block; margin-bottom: 6px; cursor: pointer; }
        .score-box { background: #eafaf1; border-radius: 10px; padding: 18px 12px; margin-bottom: 18px; text-align: center; font-size: 1.2rem; color: #27ae60; font-weight: bold; }
        @media (max-width: 576px) { .quiz-card { padding: 18px 8px 12px 8px; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="quiz-card mt-5">
            <div class="quiz-title mb-3">Challenge Quiz - Money Mentor Pro</div>
            <?php if(isset($score)): ?>
                <div class="score-box">Skor Akhir Anda: <?php echo $score; ?>/10</div>
                <a href="<?php echo base_url('index.php/dashboard'); ?>" class="btn btn-primary">Kembali ke Dashboard</a>
            <?php else: ?>
            <form method="post" autocomplete="off">
                <?php foreach($questions as $i => $q): ?>
                    <div class="mb-3">
                        <div class="question"><?php echo ($i+1).'. '.$q['question']; ?></div>
                        <div class="choices">
                            <?php foreach($q['choices'] as $opt): ?>
                                <label><input type="radio" name="answers[<?php echo $i; ?>]" value="<?php echo substr($opt,0,1); ?>" required> <?php echo $opt; ?></label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-success btn-block">Submit Jawaban</button>
            </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html> 