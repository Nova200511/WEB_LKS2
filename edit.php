<?php include 'config.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM alat WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $foto);
        $conn->query("UPDATE alat SET nama='$nama', foto='$foto' WHERE id=$id");
    } else {
        $conn->query("UPDATE alat SET nama='$nama' WHERE id=$id");
    }
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Alat</title><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Edit Alat</h2>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required>
    <img src="uploads/<?= $data['foto'] ?>" height="60"><br>
    <input type="file" name="foto" accept="image/*">
    <button type="submit">Update</button>
</form>
</body>
</html>
