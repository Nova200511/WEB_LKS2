<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Alat</title>
    <link rel="stylesheet" href="style.css">
</head>
    <div class="triangle-left"></div>
    <div class="triangle-right"></div>>
<body>

<div class="header">
    <h2>Daftar Alat</h2>
    <a href="add.php" class="btn add">+ Tambah Alat</a>
</div>
<table>
    <div class="card-container">
        <?php
        $result = $conn->query("SELECT * FROM alat");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>
                    <img src='uploads/{$row['foto']}' alt='{$row['nama']}'>
                    <h3>{$row['nama']}</h3>
                    <div class='actions'>
                        <a href='edit.php?id={$row['id']}' class='btn edit'>Edit</a>
                        <a href='delete.php?id={$row['id']}' class='btn delete' onclick='return confirm(\"Hapus?\")'>Hapus</a>
                    </div>
                </div>";
        }
        ?>
    </div>

</table>

</body>

</html>
