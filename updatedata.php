<!DOCTYPE html>
<html>
<head>
    <title>Lihat Data Kasir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Warna latar belakang untuk halaman */
            color: #333; /* Warna teks */
        }

        h1 {
            text-align: center;
            color: #336699; /* Warna untuk judul */
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff; /* Warna latar belakang untuk tabel */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan untuk tabel */
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd; /* Garis bawah untuk sel tabel */
            border-right: 1px solid #ddd; /* Garis kanan untuk sel tabel */
        }

        th {
            background-color: #f2f2f2; /* Warna latar belakang untuk sel header tabel */
        }

        tr:last-child td {
            border-bottom: none; /* Menghilangkan garis bawah pada baris terakhir */
        }

        tr:hover {
            background-color: #f2f2f2; /* Warna latar belakang saat baris dihover */
        }
    </style>
</head>
<body>
    <h1>Data Kasir</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Kehadiran</th>
            <th>Tanggal</th>
        </tr>
        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "db_kasir";

        $conn = new mysqli($host, $user, $pass, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM admin";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Menampilkan data dalam tabel HTML
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["kehadiran"] . "</td>";
                echo "<td>" . $row["tanggal"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data admin</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
