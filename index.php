<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Alat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Daftar Alat</h2>
<a href="add.php" class="btn">Tambah Alat</a>
<table>
    <tr><th>Foto</th><th>Nama</th><th>Aksi</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM alat");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td><img src='uploads/{$row['foto']}' height='60'></td>
            <td>{$row['nama']}</td>
            <td>
                <a href='edit.php?id={$row['id']}'>Edit</a> |
                <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Hapus?\")'>Hapus</a>
            </td>
        </tr>";
    }
    ?>
</table>
</body>
</html>
