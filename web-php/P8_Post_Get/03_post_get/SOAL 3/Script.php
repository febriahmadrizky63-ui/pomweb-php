<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Mahasiswa Baru</title>
</head>
<body>
    <h2>Form Pendaftaran Mahasiswa Baru Universitas X</h2>

    <form method="post" action="">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Tempat Lahir:</label><br>
        <input type="text" name="tempat_lahir" required><br><br>

        <label>Tanggal Lahir:</label><br>
        <select name="tanggal">
            <?php for ($i = 1; $i <= 31; $i++) echo "<option value='$i'>$i</option>"; ?>
        </select>
        <select name="bulan">
            <?php for ($i = 1; $i <= 12; $i++) echo "<option value='$i'>$i</option>"; ?>
        </select>
        <select name="tahun">
            <?php for ($i = 1980; $i <= 2005; $i++) echo "<option value='$i'>$i</option>"; ?>
        </select><br><br>

        <label>Alamat Rumah:</label><br>
        <textarea name="alamat" rows="3" cols="30" required></textarea><br><br>

        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="jk" value="Pria" required> Pria
        <input type="radio" name="jk" value="Wanita"> Wanita<br><br>

        <label>Asal Sekolah:</label><br>
        <input type="text" name="asal_sekolah" required><br><br>

        <label>Nilai UAN:</label><br>
        <input type="number" step="0.01" name="nilai_uan" required><br><br>

        <input type="submit" name="kirim" value="Kirim">
        <input type="reset" value="Reset">
    </form>

    <hr>

    <?php
    if (isset($_POST['kirim'])) {
        $nama = $_POST['nama'];
        $tempat = $_POST['tempat_lahir'];
        $tgl = $_POST['tanggal'];
        $bln = $_POST['bulan'];
        $thn = $_POST['tahun'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];
        $asal = $_POST['asal_sekolah'];
        $nilai = $_POST['nilai_uan'];

        echo "<h3>Terimakasih <b>$nama</b> sudah mengisi form pendaftaran.</h3>";
        echo "<table cellpadding='5'>";
        echo "<tr><td>Nama Lengkap</td><td>: $nama</td></tr>";
        echo "<tr><td>Tempat Lahir</td><td>: $tempat</td></tr>";
        echo "<tr><td>Tanggal Lahir</td><td>: $tgl-$bln-$thn</td></tr>";
        echo "<tr><td>Alamat Rumah</td><td>: $alamat</td></tr>";
        echo "<tr><td>Jenis Kelamin</td><td>: $jk</td></tr>";
        echo "<tr><td>Asal Sekolah</td><td>: $asal</td></tr>";
        echo "<tr><td>Nilai UAN</td><td>: $nilai</td></tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
