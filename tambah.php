<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Buku</title>

    <style>
        /* Reset default margin and padding */
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

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
    </style>
</head>

<body>
    <h1>Tambah Data Buku</h1>
    <form action="" method="POST">
        <label for="id">ID Buku</label><br>
        <input type="text" id="id_buku" name="id_buku" required><br>

        <label for="judul">Judul Buku</label><br>
        <input type="text" id="judul" name="judul_buku" required><br>

        <label for="kategori">Kategori</label><br>
        <input type="text" id="kategori" name="kategori" required><br>

        <label for="penerbit">Penerbit</label><br>
        <input type="text" id="penerbit" name="penerbit" required><br>

        <label for="penulis">Penulis</label><br>
        <input type="text" id="penulis" name="penulis" required><br>

        <label for="stok">Stok</label><br>
        <input type="number" id="stok" name="stok" required><br>

        <label for="harga">Harga</label><br>
        <input type="number" id="harga" name="harga" required><br><br>

        <button type="submit">Tambah Data</button>
    </form>
</body>
<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $kategori = $_POST['kategori'];
    $penerbit = $_POST['penerbit'];
    $penulis = $_POST['penulis'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Menyiapkan dan mengeksekusi kueri SQL untuk menambahkan data
    $sql = "INSERT INTO tb_databuku (id_buku, judul_buku, kategori, penerbit, penulis, stok, harga) 
            VALUES ('$id_buku', '$judul_buku', '$kategori', '$penerbit', '$penulis', '$stok', '$harga')";

    if ($conn->query($sql) === TRUE) {
        // Jika data berhasil ditambahkan, arahkan pengguna ke halaman index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>


</html>