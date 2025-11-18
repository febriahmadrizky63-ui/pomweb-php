<?php
// Mengambil nomor bulan saat ini (1-12). Contoh: $angkaBln = date("n"); 
// Untuk pengujian, Anda bisa mengganti date("n") dengan angka, misalnya:
$angkaBln = 11; 

switch ($angkaBln)
{
    case 1: $namaBln = "Januari";
        break;
    case 2: $namaBln = "Pebruari";
        break;
    case 3: $namaBln = "Maret";
        break;
    case 4: $namaBln = "April";
        break;
    case 5: $namaBln = "Mei";
        break;
    case 6: $namaBln = "Juni";
        break;
    case 7: $namaBln = "Juli";
        break;
    case 8: $namaBln = "Agustus";
        break;
    case 9: $namaBln = "September";
        break;
    case 10: $namaBln = "Oktober";
        break;
    case 11: $namaBln = "Nopember"; // Di gambar tertulis "Nopember"
        break;
    case 12: $namaBln = "Desember";
        break;
    default: $namaBln = "Bulan tidak valid";
        break;
}

echo "Nama bulan sekarang adalah: " . $namaBln;
?>