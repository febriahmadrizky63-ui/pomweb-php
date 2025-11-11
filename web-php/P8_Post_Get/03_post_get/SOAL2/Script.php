<!DOCTYPE html>
<html>
<head>
    <title>Hitung Pecahan Uang</title>
</head>
<body>
    <h2>Hitung Pecahan Uang</h2>

    <form method="post" action="">
        <label>Masukkan Jumlah Uang (Rp):</label><br>
        <input type="number" name="jumlah_uang" required><br><br>

        <input type="submit" name="hitung" value="Hitung">
        <input type="reset" value="Reset">
    </form>

    <hr>

    <?php
    if (isset($_POST['hitung'])) {
        $jumlah = $_POST['jumlah_uang'];

        $pecahan = [100000, 50000, 20000, 5000, 100, 50];
        $hasil = [];

        $sisa = $jumlah;
        foreach ($pecahan as $uang) {
            $hasil[$uang] = intdiv($sisa, $uang);
            $sisa = $sisa % $uang;
        }

        echo "<h3>Hasil Perhitungan Pecahan:</h3>";
        echo "Jumlah uang: Rp " . number_format($jumlah, 0, ',', '.') . "<br><br>";

        foreach ($hasil as $nilai => $lembar) {
            echo "Rp " . number_format($nilai, 0, ',', '.') . " : " . $lembar . " lembar<br>";
        }

        echo "<br>Sisa uang yang tidak bisa dipecah: Rp " . number_format($sisa, 0, ',', '.');
    }
    ?>
</body>
</html>