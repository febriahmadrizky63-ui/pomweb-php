<?php
// ===========================
// Data Awal
// ===========================

// Saldo awal tabungan ibu di bank
$saldoAwal = 1000000; // Rp 1.000.000

// Bunga per bulan dalam bentuk desimal (0,25% = 0.0025)
$bunga = 0.0025;

// Lama menabung dalam bulan
$bulan = 11;

// ===========================
// Perhitungan Saldo Akhir
// ===========================

// Menggunakan rumus bunga majemuk (bunga berbunga tiap bulan):
// Saldo Akhir = Saldo Awal * (1 + bunga)^bulan
$saldoAkhir = $saldoAwal * pow((1 + $bunga), $bulan);

// ===========================
// Menampilkan Hasil ke Browser
// ===========================

echo "<h2>Perhitungan Saldo Tabungan</h2>";

// Menampilkan data awal
echo "Saldo awal : Rp " . number_format($saldoAwal, 2, ',', '.') . "<br>";
echo "Bunga per bulan : " . ($bunga * 100) . "%<br>";
echo "Lama menabung : " . $bulan . " bulan<br><br>";

// Menampilkan hasil saldo akhir
echo "<strong>Saldo akhir setelah " . $bulan . " bulan adalah : Rp " . number_format($saldoAkhir, 2, ',', '.') . "</strong>";
?>