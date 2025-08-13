<?php
    require __DIR__ . '/../../includes/config.php';

    if (isset($_GET['peminjam_id'])) {
        $peminjam_id = $_GET['peminjam_id'];

        $query = "DELETE FROM tbl_peminjam WHERE id_peminjam = :id_peminjam";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':id_peminjam', $peminjam_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dihapus!'); window.location.replace('/pages/peminjam/index.php');</script>";
        } else {
            echo "<script>alert('Data tidal berhasil dihapus!');</script>";
        }
    }
?>