<?php
if (isset($_POST['submit'])) {
    $vid = $_POST['vid'];
    $vnama = $_POST['vnama'];
    $vkehadiran = $_POST['vkehadiran'];
    
    include "conn.php";
    $query = "INSERT INTO admin VALUES ('$vid', '$vnama', '$vkehadiran')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>
                alert('Data Berhasil Diinput');window.location='retrieve.php';
                </script>";           
    } else {
        echo "<script>
                alert('Data Gagal Diinput');window.location='createdata.php';
                </script>";
    }
    mysqli_close($conn);
} else { 
?>               

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Admin</title>
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
            <input type="submit" name="submit" value="Simpan" class="submit-button">
        </form>
    </div>
</body>
</html>

<?php
}
?>
