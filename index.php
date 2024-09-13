<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <style>
        /* CSS DISINI  */


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Form styling */
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        button[type="submit"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="text"] {
            width: 300px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Button styling */
        a[href="tambah.php"] button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        a[href="tambah.php"] button:hover {
            background-color: #218838;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            form {
                flex-direction: column;
                align-items: center;
            }
        }

        /* CSS UNTUK TOMBOL UBAH HAPUS */

        .edit-button {
            background-color: #007bff;
            /* Biru */
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .delete-button {
            background-color: #dc3545;
            /* Merah */
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }


        .edit-button:hover,
        .delete-button:hover {
            background-color: #c0c0c0;
        }

        footer {
            background-color: #f4f4f4;
            margin-top: 12%;
            padding: 1em;
            text-align: end;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>

<body>
    <h1>Data Buku</h1>
    <a href="tambah.php"><button>Tambah Data</button></a>

    <!-- Formulir Pencarian -->
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Cari Buku...">
        <button type="submit">Cari</button>
    </form>

    <table border="1">
        <tr>
            <th>ID Buku</th>
            <th>Judul Buku</th>
            <th>Kategori</th>
            <th>Penerbit</th>
            <th>Penulis</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>

        <?php
        include 'koneksi.php';

        // Query pencarian
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $sql = "SELECT * FROM tb_databuku 
                WHERE id_buku LIKE '%$search%' 
                OR judul_buku LIKE '%$search%' 
                OR kategori LIKE '%$search%' 
                OR penerbit LIKE '%$search%' 
                OR penulis LIKE '%$search%'
                OR stok LIKE '%$search%'
                OR harga LIKE '%$search%'
                ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data dari setiap baris
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_buku"] . "</td>";
                echo "<td>" . $row["judul_buku"] . "</td>";
                echo "<td>" . $row["kategori"] . "</td>";
                echo "<td>" . $row["penerbit"] . "</td>";
                echo "<td>" . $row["penulis"] . "</td>";
                echo "<td>" . $row["stok"] . "</td>";
                echo "<td>" . $row["harga"] . "</td>";
                echo "<td>";
                echo "<a href='ubah.php?id=" . $row["id_buku"] . "'><button class='edit-button'>Ubah</button></a> | ";
                echo "<a href='hapus.php?id=" . $row["id_buku"] . "'><button class='delete-button'>Hapus</button></a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'> Data tidak ditemukan </td></tr>";
        }

        // Menutup koneksi ke database
        $conn->close();
        ?>

    </table>

    <footer>
        <p>&copy; 2024 by Nia Saraswati <br> all rights reserved.</p>
    </footer>
</body>

</html>