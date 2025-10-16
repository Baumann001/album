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
      
        
        <h2>olá, está página é um pouco da história da minha família, um pedaço de nossas lemnbranças, dos momentos mais importantes</h2>
        <div class="gallery">
            

        <audio class="player" controls>
            Your browser does not support the audio element.
        </audio>
        <div class="lyric">Lyrics will appear here</div>
        <script src="script.js"></script>

    
        </div>
        <a href="logout.php" style="color: #ffffff; text-decoration: none; margin-top: 20px; display: inline-block;">Logout</a>

        <a href="larissa.php">
        <button type= "button">Larissa</button>
        </a>

        <br>

        <a href="gustavo.php">
    <button type= "button">Gustavo</button>
     </a>
    </div>

    <script src="teste.js"></script>

</body>
</html>
