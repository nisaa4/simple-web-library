<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data</title>
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

        p {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="hidden"],
        button[type="submit"],
        button[type="button"] {
            width: 100px;
            padding: 10px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"] {
            background-color: #dc3545;
            /* Merah */
            color: #fff;
        }

        button[type="button"] {
            background-color: #007bff;
            /* Biru */
            color: #fff;
        }

        button[type="submit"]:hover,
        button[type="button"]:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <h1>Konfirmasi Hapus Data Buku</h1>
    <p>Apakah Anda yakin ingin menghapus data buku ini?</p>
    <form action="" method="POST">
        <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>">
        <button type="submit" name="hapus">Ya</button>
        <a href="index.php"><button type="button">Tidak</button></a>
    </form>
</body>

<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];

    $sql = "SELECT * FROM tb_databuku WHERE id_buku='$id_buku'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    } else {
        echo "Data buku tidak ditemukan.";
    }
} else {
    echo "ID buku tidak diberikan.";
}

if (isset($_POST['hapus'])) {
    $id_buku = $_POST['id_buku'];
    $sql = "DELETE FROM tb_databuku WHERE id_buku='$id_buku'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

</html>