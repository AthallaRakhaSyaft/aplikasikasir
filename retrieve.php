<?php
include "conn.php";

// Check if the delete parameter is passed in the URL
if(isset($_GET['delete']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete query
    $delete_query = "DELETE FROM admin WHERE id = $id";

    // Execute the delete query
    if(mysqli_query($conn, $delete_query)) {
        // If deletion is successful, redirect back to the same page
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Fetch all records from the database
$query  = "SELECT * FROM admin";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Presensi Kasir</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulir Presensi Kasir</h1>
        <a href='createdata.php'>Tambah Data</a>
        <table cellpadding='5' border='1'>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Nama</th>
                <th>Kehadiran</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
            <?php
            $no = 1;
            while($rec = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>$no</td>
                        <td>$rec[id]</td>
                        <td>$rec[nama]</td>
                        <td>$rec[kehadiran]</td>
                        <td>$rec[tanggal]</td>
                        <td>
                            <button><a href='updatedata.php?id=$rec[id]'>Lihat</a></button>
                            <p></p>
                            <button><a href='{$_SERVER['PHP_SELF']}?delete=true&id=$rec[id]'>Hapus</a></button>
                        </td>
                    </tr>";
                $no++;            
            }
            ?>
        </table>
    </div>
</body>
</html>

