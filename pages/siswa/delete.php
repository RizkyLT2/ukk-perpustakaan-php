<?php
    require __DIR__ . '/../../includes/config.php';

    if (isset($_GET['id_siswa'])) {
        $id_siswa = $_GET['id_siswa'];

        $query = "DELETE FROM siswa WHERE id_siswa = :id_siswa";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':id_siswa', $id_siswa);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dihapus!'); window.location.replace('/pages/siswa/index.php');</script>";
        } else {
            echo "<script>alert('Data tidal berhasil dihapus!');</script>";
        }
    }
?>