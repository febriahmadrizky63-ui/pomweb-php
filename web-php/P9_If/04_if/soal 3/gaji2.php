<?php
$result = '';
$jamInput = '';
$golonganInput = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $jamInput = isset($_POST['jam']) ? trim($_POST['jam']) : '';
    $golonganInput = isset($_POST['golongan']) ? $_POST['golongan'] : '';

    // Daftar upah per golongan
    $upahGolongan = [
        'A' => 4000,
        'B' => 5000,
        'C' => 6000,
        'D' => 7500
    ];

    $upahLembur = 3000; // sama untuk semua golongan

    // Validasi input
    if ($jamInput === '' || !is_numeric($jamInput) || $jamInput < 0) {
        $result = "<span style='color:red;'>Masukkan jumlah jam kerja yang benar!</span>";
    } elseif (!isset($upahGolongan[$golonganInput])) {
        $result = "<span style='color:red;'>Pilih golongan karyawan!</span>";
    } else {
        $jam = (int)$jamInput;
        $upahPerJam = $upahGolongan[$golonganInput];

        // Hitung upah
        if ($jam <= 48) {
            $total = $jam * $upahPerJam;
        } else {
            $jamNormal = 48;
            $jamLembur = $jam - 48;

            $total = ($jamNormal * $upahPerJam) + ($jamLembur * $upahLembur);
        }

        $result = "
            Golongan: <strong>$golonganInput</strong><br>
            Total upah: <strong>Rp " . number_format($total, 0, ',', '.') . "</strong>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Hitung Upah Karyawan Berdasarkan Golongan</title>
<style>
    body { font-family: Arial, sans-serif; max-width:600px; margin:40px auto; }
    input, select { padding:8px; margin-top:6px; width:200px; }
    button { padding:8px 12px; margin-top:12px; }
    .result { margin-top:15px; padding:12px; background:#f2f2f2; border-radius:6px; }
</style>
</head>
<body>

<h2>Hitung Upah Karyawan Berdasarkan Golongan</h2>

<form method="post">
    <label>Jumlah jam kerja per minggu:</label><br>
    <input type="number" name="jam" min="0" required value="<?= htmlspecialchars($jamInput) ?>"><br><br>

    <label>Pilih Golongan:</label><br>
    <select name="golongan" required>
        <option value="">-- Pilih Golongan --</option>
        <option value="A" <?= $golonganInput=='A' ? 'selected' : '' ?>>A (Rp 4.000)</option>
        <option value="B" <?= $golonganInput=='B' ? 'selected' : '' ?>>B (Rp 5.000)</option>
        <option value="C" <?= $golonganInput=='C' ? 'selected' : '' ?>>C (Rp 6.000)</option>
        <option value="D" <?= $golonganInput=='D' ? 'selected' : '' ?>>D (Rp 7.500)</option>
    </select><br><br>

    <button type="submit">Hitung Upah</button>
</form>

<?php if ($result !== ''): ?>
<div class="result">
    <?= $result ?>
</div>
<?php endif; ?>

</body>
</html>
