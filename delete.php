<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['foto_path'])) {
    $foto_path = $_POST['foto_path'];

    // Delete from database
    $sql = "DELETE FROM fotos WHERE foto_varias = '$foto_path'";
    if ($conn->query($sql) === TRUE) {
        // Delete file from server
        if (file_exists($foto_path)) {
            unlink($foto_path);
        }
        echo "Foto removida com sucesso.";
    } else {
        echo "Erro ao remover foto: " . $conn->error;
    }
}
?>
<a href="index.php">Voltar</a>
