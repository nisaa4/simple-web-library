<?php
include 'koneksi.php';

// Periksa jika parameter ID buku telah diberikan
if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];

    // Ambil data buku berdasarkan ID
    $sql = "SELECT * FROM tb_databuku WHERE id_buku='$id_buku'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Tampilkan formulir untuk mengubah data
    } else {
        echo "Data buku tidak ditemukan.";
    }
} else {
    echo "ID buku tidak diberikan.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $kategori = $_POST['kategori'];
    $penerbit = $_POST['penerbit'];
    $penulis = $_POST['penulis'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Menyiapkan dan mengeksekusi kueri SQL untuk mengubah data
    $sql = "UPDATE tb_databuku SET judul_buku='$judul_buku', kategori='$kategori', penerbit='$penerbit', penulis='$penulis', stok='$stok', harga='$harga' WHERE id_buku='$id_buku'";

    if ($conn->query($sql) === TRUE) {
        // Jika data berhasil diubah, arahkan pengguna kembali ke halaman index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Ubah Data Buku</h1>
    <form action="" method="POST">
        <label for="id">ID Buku:</label><br>
        <input type="text" id="id_buku" name="id_buku" value="<?php echo $row['id_buku']; ?>" readonly><br>

        <label for="judul">Judul Buku:</label><br>
        <input type="text" id="judul" name="judul_buku" value="<?php echo $row['judul_buku']; ?>" required><br>

        <label for="kategori">Kategori:</label><br>
        <input type="text" id="kategori" name="kategori" value="<?php echo $row['kategori']; ?>" required><br>

        <label for="penerbit">Penerbit:</label><br>
        <input type="text" id="penerbit" name="penerbit" value="<?php echo $row['penerbit']; ?>" required><br>

        <label for="penulis">Penulis:</label><br>
        <input type="text" id="penulis" name="penulis" value="<?php echo $row['penulis']; ?>" required><br>

        <label for="stok">Stok:</label><br>
        <input type="number" id="stok" name="stok" value="<?php echo $row['stok']; ?>" required><br>

        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>