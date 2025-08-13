<?php
    require __DIR__ . '/../../includes/config.php';

    if (isset($_GET['id_pendaftaran'])) {
        $id_pendaftaran = $_GET['id_pendaftaran'];

        $query = "DELETE FROM pendaftaran WHERE id_pendaftaran = :id_pendaftaran";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':id_pendaftaran', $id_pendaftaran);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dihapus!'); window.location.replace('/pages/pendaftaran/index.php');</script>";
        } else {
            echo "<script>alert('Data tidal berhasil dihapus!');</script>";
        }
    }
?>