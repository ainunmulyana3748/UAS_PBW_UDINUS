<?php
// Proses form akan dilakukan di bagian atas
$koneksi = mysqli_connect("localhost", "root", "", "webdailyjurnal");

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $username = $_POST['username'];
    $tanggal = date("Y-m-d H:i:s");

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    $uploadFolder = "uploads/";
    if (!is_dir($uploadFolder)) {
        mkdir($uploadFolder); // buat folder kalau belum ada
    }

    move_uploaded_file($tmp, $uploadFolder . $gambar);

    // Simpan ke database
    $query = "INSERT INTO article (judul, isi, gambar, tanggal, username) 
            VALUES ('$judul', '$isi', '$gambar', '$tanggal', '$username')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $message = "<div class='alert alert-success'>Data berhasil disimpan!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Gagal: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-5">
    <h2 class="mb-4">Tambah Data</h2>

    <!-- Tampilkan pesan jika ada -->
    <?php if (isset($message)) echo $message; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
</body>

</html>