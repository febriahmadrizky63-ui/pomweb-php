<?php
// Ambil bulan saat ini (1–12)
$bulan = date("n");

switch ($bulan) {
    case 1:
        $namaBulan = "Januari";
        $hari = 31;
        break;

    case 2:
        $namaBulan = "Februari";

        // Cek tahun kabisat
        $tahun = date("Y");
        if ($tahun % 400 == 0 || ($tahun % 4 == 0 && $tahun % 100 != 0)) {
            $hari = 29;
        } else {
            $hari = 28;
        }
        break;

    case 3:
        $namaBulan = "Maret";
        $hari = 31;
        break;

    case 4:
        $namaBulan = "April";
        $hari = 30;
        break;

    case 5:
        $namaBulan = "Mei";
        $hari = 31;
        break;

    case 6:
        $namaBulan = "Juni";
        $hari = 30;
        break;

    case 7:
        $namaBulan = "Juli";
        $hari = 31;
        break;

    case 8:
        $namaBulan = "Agustus";
        $hari = 31;
        break;

    case 9:
        $namaBulan = "September";
        $hari = 30;
        break;

    case 10:
        $namaBulan = "Oktober";
        $hari = 31;
        break;

    case 11:
        $namaBulan = "November";
        $hari = 30;
        break;

    case 12:
        $namaBulan = "Desember";
        $hari = 31;
        break;

    default:
        $namaBulan = "Tidak diketahui";
        $hari = "???";
}

echo "<h2>Bulan Saat Ini: $namaBulan</h2>";
echo "<p>Jumlah hari: <strong>$hari hari</strong></p>";
?>
