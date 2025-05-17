<?php include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $foto);
    $conn->query("INSERT INTO alat (nama, foto) VALUES ('$nama', '$foto')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Alat</title><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Tambah Alat</h2>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="nama" placeholder="Nama alat" required>
    <input type="file" name="foto" accept="image/*" required>
    <button type="submit">Simpan</button>
</form>
</body>
</html>
