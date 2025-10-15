<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
include 'db.php';

// Fetch uploaded photos
$sql = "SELECT foto_varias FROM fotos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy - Upload de Fotos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Álbum - Upload de Fotos</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="foto" accept="image/*" required>
            <button type="submit">Enviar Foto</button>
        </form>
        <h2>Fotos Enviadas</h2>
        <div class="gallery">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $foto_path = $row['foto_varias'];
                    echo "<div class='photo-item'>";
                    echo "<img src='" . $foto_path . "' alt='Foto' style='max-width: 200px; margin: 10px;'>";
                    echo "<form action='delete.php' method='post' style='display: inline;'>";
                    echo "<input type='hidden' name='foto_path' value='" . $foto_path . "'>";
                    echo "<button type='submit' class='delete-btn'>Remover</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhuma foto enviada ainda.</p>";
            }
            ?>
        </div>
        <a href="logout.php" style="color: #ffffff; text-decoration: none; margin-top: 20px; display: inline-block;">Logout</a>
    </div>
</body>
</html>
