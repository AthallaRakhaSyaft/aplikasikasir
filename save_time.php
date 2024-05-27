<?php
// Include file koneksi ke database
include "conn.php";

// Ambil waktu yang dikirimkan dari formulir
$time = $_POST['time'];

// Query untuk menyimpan waktu ke dalam database
$query = "INSERT INTO waktu (waktu) VALUES ('$time')";

// Jalankan query
if(mysqli_query($conn, $query)) {
    echo "Waktu berhasil disimpan ke database.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
