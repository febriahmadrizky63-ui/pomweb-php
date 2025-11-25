<?php
// bunga_tabungan.php
function fmtRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// default values
$saldo_awal = isset($_POST['saldo_awal']) ? (float)$_POST['saldo_awal'] : 1000000;
$bulan = isset($_POST['bulan']) ? (int)$_POST['bulan'] : 12;

$history = [];
$total_interest = 0.0;
$monthly_fee = 9000.0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // basic validation
    if ($saldo_awal < 0) $saldo_awal = 0;
    if ($bulan < 0) $bulan = 0;

    $saldo = $saldo_awal;
    for ($m = 1; $m <= $bulan; $m++) {
        // pilih rate tahunan berdasarkan saldo saat ini
        if ($saldo < 1100000.0) {
            $annual_rate = 0.03; // 3% p.a.
        } else {
            $annual_rate = 0.04; // 4% p.a.
        }

        $bunga_bulanan = $saldo * ($annual_rate / 12.0);
        $saldo = $saldo + $bunga_bulanan - $monthly_fee;

        $history[] = [
            'bulan' => $m,
            'rate_annual' => $annual_rate,
            'bunga' => $bunga_bulanan,
            'saldo_akhir' => $saldo
        ];

        $total_interest += $bunga_bulanan;
    }
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Simulasi Bunga Tabungan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        input[type="number"] { padding: 6px; width: 200px; }
        table { border-collapse: collapse; width: 100%; margin-top: 12px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: right; }
        th { background: #f2f2f2; text-align: center; }
        .left { text-align: left; }
        .form-row { margin-bottom: 8px; }
        .btn { padding: 8px 12px; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Simulasi Bunga Tabungan</h2>

    <p><strong>Gambar soal (file upload):</strong> <code>/mnt/data/07e72833-0280-4db2-a866-51e923a4aa0d.png</code></p>

    <form method="post" action="">
        <div class="form-row">
            <label class="left">Saldo awal (Rp): </label>
            <input type="number" name="saldo_awal" value="<?php echo htmlspecialchars($saldo_awal); ?>" step="1" min="0" required>
        </div>

        <div class="form-row">
            <label class="left">Lama (bulan): </label>
            <input type="number" name="bulan" value="<?php echo htmlspecialchars($bulan); ?>" step="1" min="0" required>
        </div>

        <button type="submit" class="btn">Hitung</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h3>Hasil simulasi</h3>
        <p>Saldo awal: <strong><?php echo fmtRupiah($saldo_awal); ?></strong></p>
        <p>Biaya administrasi per bulan: <strong><?php echo fmtRupiah($monthly_fee); ?></strong></p>
        <p>Total bunga yang diterima selama <?php echo $bulan; ?> bulan: <strong><?php echo fmtRupiah($total_interest); ?></strong></p>
        <p>Saldo akhir setelah <?php echo $bulan; ?> bulan: <strong><?php echo fmtRupiah($saldo); ?></strong></p>

        <?php if (count($history) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Rate p.a.</th>
                        <th>Bunga bulan ini</th>
                        <th>Saldo akhir bulan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($history as $row): ?>
                        <tr>
                            <td><?php echo $row['bulan']; ?></td>
                            <td><?php echo ($row['rate_annual'] * 100) . ' %'; ?></td>
                            <td><?php echo fmtRupiah($row['bunga']); ?></td>
                            <td><?php echo fmtRupiah($row['saldo_akhir']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>

    <p style="margin-top:20px; font-size:0.9em; color:#555;">
        Catatan: bunga dihitung tiap bulan sebagai (saldo * (bunga_tahunan / 12)), kemudian biaya administrasi Rp 9.000 dipotong.
    </p>
</body>
</html>
