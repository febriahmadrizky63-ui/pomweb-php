<?php
// Jumlah total uang yang dimiliki ibu
$jumlahUang = 1575250;

// ====================
// Proses menghitung jumlah masing-masing pecahan
// ====================

// Hitung berapa lembar uang Rp 100.000
$a = floor($jumlahUang / 100000); // floor() digunakan agar hasilnya dibulatkan ke bawah
$sisa = $jumlahUang % 100000;     // % digunakan untuk mencari sisa setelah diambil pecahan 100.000

// Hitung berapa lembar uang Rp 50.000 dari sisa sebelumnya
$b = floor($sisa / 50000);
$sisa = $sisa % 50000;

// Hitung berapa lembar uang Rp 20.000 dari sisa berikutnya
$c = floor($sisa / 20000);
$sisa = $sisa % 20000;

// Hitung berapa lembar uang Rp 5.000 dari sisa berikutnya
$d = floor($sisa / 5000);
$sisa = $sisa % 5000;

// Hitung berapa keping uang Rp 100 dari sisa berikutnya
$e = floor($sisa / 100);
$sisa = $sisa % 100;

// Hitung berapa keping uang Rp 50 dari sisa terakhir
$f = floor($sisa / 50);
$sisa = $sisa % 50;

// ====================
// Menampilkan hasil perhitungan ke browser
// ====================
echo "<h2>Pecahan Uang Ibu</h2>";

echo "Jumlah Rp. 100.000 : " . $a . " lembar<br/>";
echo "Jumlah Rp. 50.000 : " . $b . " lembar<br/>";
echo "Jumlah Rp. 20.000 : " . $c . " lembar<br/>";
echo "Jumlah Rp. 5.000 : " . $d . " lembar<br/>";
echo "Jumlah Rp. 100 : " . $e . " keping<br/>";
echo "Jumlah Rp. 50 : " . $f . " keping<br/>";
?>