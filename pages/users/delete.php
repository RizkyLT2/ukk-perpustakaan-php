<?php
    require __DIR__ . '/../../includes/config.php';

    if (isset($_GET['id_user'])) {
        $id_user = $_GET['id_user'];

        $query = "DELETE FROM users WHERE id_user = :id_user";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':id_user', $id_user);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dihapus!'); window.location.replace('/pages/users/index.php');</script>";
        } else {
            echo "<script>alert('Data tidal berhasil dihapus!');</script>";
        }
    }
?>