<?php
$result = '';
$jamKerjaInput = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $jamKerjaInput = isset($_POST['jam']) ? trim($_POST['jam']) : '';

    if ($jamKerjaInput === '' || !is_numeric($jamKerjaInput) || $jamKerjaInput < 0) {
        $result = "<span style='color:red;'>Masukkan jumlah jam kerja yang valid!</span>";
    } else {
        $jam = (int)$jamKerjaInput;

        $upahNormal = 2000;
        $upahLembur = 3000;

        if ($jam <= 48) {
            $total = $jam * $upahNormal;
        } else {
            $jamNormal = 48;
            $jamLembur = $jam - 48;

            $total = ($jamNormal * $upahNormal) + ($jamLembur * $upahLembur);
        }

        $result = "Total upah untuk $jam jam kerja adalah <strong>Rp " . number_format($total, 0, ',', '.') . "</strong>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Hitung Upah Karyawan</title>
<style>
    body { font-family: Arial, sans-serif; max-width:600px; margin:40px auto; }
    input { padding:8px; width:140px; margin-top:6px; }
    button { padding:8px 12px; margin-top:12px; }
    .result { margin-top:15px; padding:12px; background:#f3f3f3; border-radius:6px; }
</style>
</head>
<body>

<h2>Hitung Upah Karyawan Honorer</h2>

<form method="post">
    <label>Masukkan jumlah jam kerja per minggu:</label>
    <input type="number" name="jam" value="<?= htmlspecialchars($jamKerjaInput) ?>" min="0" required>
    <button type="submit">Hitung Upah</button>
</form>

<?php if ($result !== ''): ?>
<div class="result">
    <?= $result ?>
</div>
<?php endif; ?>

</body>
</html>
