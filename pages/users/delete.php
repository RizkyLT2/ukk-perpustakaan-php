<?php
    require __DIR__ . '/../../includes/config.php';

    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];

        $query = "DELETE FROM tbl_user WHERE id = :id";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':id', $user_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dihapus!'); window.location.replace('/pages/users/index.php');</script>";
        } else {
            echo "<script>alert('Data tidal berhasil dihapus!');</script>";
        }
    }
?>