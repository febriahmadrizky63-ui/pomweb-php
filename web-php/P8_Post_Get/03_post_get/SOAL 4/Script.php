<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Mahasiswa Baru - Universitas X</title>
</head>
<body>
    <h2>Form Pendaftaran Mahasiswa X</h2>
    <form method="get" action="">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama"><br><br>

        <label>Tempat Lahir:</label><br>
        <input type="text" name="tempat_lahir"><br><br>

        <label>Tanggal Lahir:</label><br>
        <select name="tanggal">
            <?php
            for($i=1; $i<=31; $i++){
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <select name="bulan">
            <?php
            for($i=1; $i<=12; $i++){
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <select name="tahun">
            <?php
            for($i=1980; $i<=2005; $i++){
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select><br><br>

        <label>Alamat Rumah:</label><br>
        <textarea name="alamat" rows="3" cols="30"></textarea><br><br>

        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="jk" value="Pria"> Pria
        <input type="radio" name="jk" value="Wanita"> Wanita<br><br>

        <label>Asal Sekolah:</label><br>
        <input type="text" name="asal_sekolah"><br><br>

        <label>Nilai UAN:</label><br>
        <input type="text" name="nilai_uan"><br><br>

        <input type="submit" name="kirim" value="Kirim">
        <input type="reset" value="Reset">
    </form>

    <hr>

    <?php
    if (isset($_GET['kirim'])) {
        $nama = $_GET['nama'];
        $tempat_lahir = $_GET['tempat_lahir'];
        $tanggal = $_GET['tanggal'];
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $alamat = $_GET['alamat'];
        $jk = $_GET['jk'];
        $asal_sekolah = $_GET['asal_sekolah'];
        $nilai_uan = $_GET['nilai_uan'];

        echo "<h3>Terimakasih <b>$nama</b> sudah mengisi form pendaftaran.</h3>";
        echo "Nama Lengkap : $nama<br>";
        echo "Tempat Lahir : $tempat_lahir<br>";
        echo "Tanggal Lahir : $tanggal-$bulan-$tahun<br>";
        echo "Alamat Rumah : $alamat<br>";
        echo "Jenis Kelamin : $jk<br>";
        echo "Asal Sekolah : $asal_sekolah<br>";
        echo "Nilai UAN : $nilai_uan<br>";
    }
    ?>
</body>
</html>