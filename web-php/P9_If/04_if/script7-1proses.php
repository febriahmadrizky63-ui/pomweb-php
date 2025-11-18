<html>
<head>
    <title>Mencari Bilangan Terbesar dari 3 Bilangan</title>
</head>
<body>
    <h1>Mencari Bilangan Terbesar dari 3 Bilangan</h1>

    <?php
    // Membaca input dari form (script7-1.php)
    $bilangan1 = $_POST['bil1']; // membaca input bilangan pertama
    $bilangan2 = $_POST['bil2']; // membaca input bilangan kedua
    $bilangan3 = $_POST['bil3']; // membaca input bilangan ketiga

    echo "Bilangan yang dimasukkan: $bilangan1, $bilangan2, $bilangan3 <hr>";

    // =================================================================
    // cara ke - 1
    // Idenya adalah mencari bilangan X yang terbesar dari bil 1 dan bil 2. 
    // Lalu X dibandingkan dengan bilangan ke-3. 
    // Jika X > dari bil 3, maka X adalah max dari semua bilangan. Jika tidak, maka bil 3 sbg max nya

    if ($bilangan1 > $bilangan2) {
        $maxSementara = $bilangan1;
    } else {
        $maxSementara = $bilangan2;
    }

    if ($bilangan3 > $maxSementara) {
        $maxAkhir = $bilangan3;
    } else {
        $maxAkhir = $maxSementara;
    }

    echo "<p>Nilai maksimum (Cara 1) dari " . $bilangan1 . ", " . $bilangan2 . ", dan " . $bilangan3 . " adalah: " . $maxAkhir . "</p>";

    // =================================================================
    // cara ke - 2
    // Idenya adalah langsung membandingkan masing-masing bilangan dengan bilangan lain 
    // menggunakan operator AND (&&) dalam if...else if...else.

    if (($bilangan1 > $bilangan2) && ($bilangan1 > $bilangan3)) {
        $maxAkhir = $bilangan1;
    } else {
        if (($bilangan2 > $bilangan1) && ($bilangan2 > $bilangan3)) {
            $maxAkhir = $bilangan2;
        } else {
            $maxAkhir = $bilangan3; 
        }
    }

    echo "<p>Nilai maksimum (Cara 2) dari " . $bilangan1 . ", " . $bilangan2 . ", dan " . $bilangan3 . " adalah: " . $maxAkhir . "</p>";

    // =================================================================
    // cara ke - 3
    // Idenya hampir sama dengan cara ke- 1, tapi tidak dengan mencari max sementara, 
    // melainkan menggunakan nested if secara langsung.

    if ($bilangan1 > $bilangan2)
    {
        if ($bilangan1 > $bilangan3) {
            $maxAkhir = $bilangan1;
        } else {
            $maxAkhir = $bilangan3;
        }
    }
    else // bil2 >= bil1
    {
        if ($bilangan2 > $bilangan3) {
            $maxAkhir = $bilangan2;
        } else {
            $maxAkhir = $bilangan3;
        }
    }

    echo "<p>Nilai maksimum (Cara 3) dari " . $bilangan1 . ", " . $bilangan2 . ", dan " . $bilangan3 . " adalah: " . $maxAkhir . "</p>";
    
    ?>
</body>
</html>