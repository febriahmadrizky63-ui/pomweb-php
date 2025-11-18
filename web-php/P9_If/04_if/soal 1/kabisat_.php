<?php
// index.php
$result = '';
$inputValue = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil input
    $inputValue = isset($_POST['tahun']) ? trim($_POST['tahun']) : '';

    // Validasi: harus diisi dan bilangan bulat (boleh negatif jika perlu)
    if ($inputValue === '') {
        $result = 'Error: Masukkan tahun.';
    } elseif (!preg_match('/^-?\d+$/', $inputValue)) {
        $result = 'Error: Masukkan angka bulat untuk tahun (contoh: 2024).';
    } else {
        $tahun = (int)$inputValue;

        // Aturan tahun kabisat:
        // - Jika habis dibagi 400 -> kabisat
        // - Jika habis dibagi 4 tetapi tidak habis dibagi 100 -> kabisat
        // - Selain itu bukan kabisat
        if ($tahun % 400 === 0 || ($tahun % 4 === 0 && $tahun % 100 !== 0)) {
            $result = "Tahun " . htmlspecialchars((string)$tahun) . " adalah <strong>tahun kabisat</strong>.";
        } else {
            $result = "Tahun " . htmlspecialchars((string)$tahun) . " <strong>bukan tahun kabisat</strong>.";
        }
    }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Cek Tahun Kabisat</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body { font-family: Arial, sans-serif; max-width:640px; margin:40px auto; padding:16px; }
    label, input, button { display:block; }
    input[type="number"] { padding:8px; width:200px; margin-top:6px; }
    button { margin-top:12px; padding:8px 12px; }
    .result { margin-top:18px; padding:12px; border-radius:6px; background:#f4f4f4; }
    .error { color:#a00; }
  </style>
</head>
<body>
  <h1>Cek Tahun Kabisat</h1>

  <form method="post" action="">
    <label for="tahun">Masukkan tahun:</label>
    <!-- type=number dengan step=1 mendorong input bulat, tapi server-side validation tetap dilakukan -->
    <input id="tahun" name="tahun" type="number" step="1" value="<?= htmlspecialchars($inputValue) ?>" required>
    <button type="submit">Cek</button>
  </form>

  <?php if ($result !== ''): ?>
    <div class="result <?= (strpos($result,'Error') === 0) ? 'error' : '' ?>">
      <?= $result ?>
    </div>
  <?php endif; ?>

  <hr>
  <h3>Penjelasan singkat</h3>
  <p>Aturan tahun kabisat: <em>tahun</em> adalah kabisat jika <strong>habis dibagi 400</strong>, atau <strong>habis dibagi 4 tetapi tidak habis dibagi 100</strong>.</p>
  <p>Contoh: 2000 kabisat (karena 2000 % 400 == 0). 1900 bukan kabisat (habis dibagi 100 tapi tidak 400). 2024 kabisat (habis dibagi 4 dan tidak habis dibagi 100).</p>
</body>
</html>
