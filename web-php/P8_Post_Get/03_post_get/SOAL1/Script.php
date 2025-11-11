<!DOCTYPE html>
<html>
<head>
    <title>Hitung Saldo Akhir Tabungan</title>
</head>
<body>
    <h2>Hitung Saldo Akhir Tabungan</h2>

    <form method="post" action="">
        <label>Saldo Awal (Rp):</label><br>
        <input type="number" name="saldo_awal" required><br><br>

        <label>Bunga per Bulan (%):</label><br>
        <input type="number" step="0.01" name="bunga" required><br><br>

        <label>Lama (bulan):</label><br>
        <input type="number" name="lama" required><br><br>

        <input type="submit" name="hitung" value="Hitung">
        <input type="reset" value="Reset">
    </form>

    <hr>

    <?php
    if (isset($_POST['hitung'])) {
        $saldo_awal = $_POST['saldo_awal'];
        $bunga = $_POST['bunga'];
        $lama = $_POST['lama'];

        // Hitung saldo akhir
        $saldo_akhir = $saldo_awal * pow((1 + ($bunga / 100)), $lama);

        echo "<h3>Hasil Perhitungan:</h3>";
        echo "Saldo Awal: Rp " . number_format($saldo_awal, 0, ',', '.') . "<br>";
        echo "Bunga per Bulan: " . $bunga . "%<br>";
        echo "Lama Menabung: " . $lama . " bulan<br>";
        echo "<strong>Saldo Akhir: Rp " . number_format($saldo_akhir, 0, ',', '.') . "</strong>";
    }
    ?>
</body>
</html>
