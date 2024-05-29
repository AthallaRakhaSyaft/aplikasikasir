<?php
if (isset($_POST['submit'])) {
    // Ambil nilai dari form
    $vid = $_POST['vid'];
    $vnama = $_POST['vnama'];
    $vkehadiran = $_POST['vkehadiran'];
    $vtanggal = date('Y-m-d'); // Mengambil tanggal saat ini dengan format Y-m-d

    // Sisipkan koneksi ke database
    include "conn.php";

    // Buat pernyataan SQL
    $query = "INSERT INTO admin (id, nama, kehadiran, tanggal) VALUES ('$vid', '$vnama', '$vkehadiran', '$vtanggal')";
    
    // Jalankan pernyataan SQL
    $result = mysqli_query($conn, $query);

    // Periksa apakah data berhasil disimpan
    if ($result) {
        echo "<script>
                alert('Data Berhasil Diinput');
                window.location='retrieve.php';
              </script>";           
    } else {
        echo "<script>
                alert('Data Gagal Diinput');
                window.location='createdata.php';
              </script>";
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
} else { 
?>               

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Kasir</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h3>Form Input Admin</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="vid">Id:</label>
                <input type="text" name="vid" id="vid" class="input-field">
            </div>
            <div class="form-group">
                <label for="vnama">Nama:</label>
                <input type="text" name="vnama" id="vnama" class="input-field">
            </div>
            <div class="form-group">
                <label for="vkehadiran">Kehadiran:</label>
                <input type="text" name="vkehadiran" id="vkehadiran" class="input-field">
            </div>

            <div class="form-group">
            <b><p>Tanggal:</p></b>
            <div id="datetime"></div>

            <p></p>
            <input type="submit" name="submit" value="Simpan" class="submit-button">
        </form>
    </div>
    
    <script>
     function displayDateTime() {
        var now = new Date();
        var date = now.toLocaleDateString();
        
        document.getElementById('datetime').innerHTML = date; // Menampilkan tanggal dan waktu
    }

    setInterval(displayDateTime, 1000); // Memperbarui setiap detik
   
    </script>

</body>
</html>

<?php
}
?>
