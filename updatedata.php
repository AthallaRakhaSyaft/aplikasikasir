<!DOCTYPE html>
<html>
<head>
    <title>Lihat Data Admin</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Data Admin</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Kehadiran</th>
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
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data admin</td></tr>";
        }
        $conn->close();
        ?>

        <style>
            /* styles.css */

    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0; /* Background color for the entire page */
    }

    h1 {
    text-align: center;
    color: #333; /* Color for the heading */
    }

    table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff; /* Background color for the table */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow effect for the table */
    }

    th, td {
    padding: 8px;
    border-bottom: 1px solid #ddd; /* Bottom border for table cells */
    }

    th {
    background-color: #f2f2f2; /* Background color for table header cells */
}

tr:nth-child(even) {
    background-color: #f9f9f9; /* Background color for even rows */
}

tr:hover {
    background-color: #f2f2f2; /* Background color for hovered rows */
}

        </style>   
    </table>
</body>
</html>
