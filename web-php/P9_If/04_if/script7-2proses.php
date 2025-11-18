<html>
<head>
    <title>Mencari Status Bilangan</title>
</head>
<body>
    <h1>Mencari Status Bilangan</h1>
<?php
// Menerima input dari form (dari input name="bil")
$bilangan = $_POST['bil'];

echo "<h3>Hasil Pengujian Bilangan " . $bilangan . "</h3>";
echo "<hr>";

// =================================================================
// cara ke - 1
// Menggunakan nested if untuk langsung mencetak status
echo "<h4>Cara 1: Mencetak Langsung</h4>";
if ($bilangan > 0) {
    echo "<p>Bilangan " . $bilangan . " adalah positif</p>";
} else {
    if ($bilangan < 0) {
        echo "<p>Bilangan " . $bilangan . " adalah negatif</p>";
    } else {
        echo "<p>Bilangan " . $bilangan . " adalah nol</p>";
    }
}

// =================================================================
// cara ke - 2
// Menggunakan nested if untuk menyimpan status ke variabel, lalu mencetak variabel
echo "<h4>Cara 2: Menyimpan ke Variabel</h4>";
if ($bilangan > 0) {
    $status = "positif";
} else {
    if ($bilangan < 0) {
        $status = "negatif";
    } else {
        $status = "nol";
    }
}

echo "<p>Bilangan " . $bilangan . " adalah bilangan " . $status . ".</p>";
?>
</body>
</html>