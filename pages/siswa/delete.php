<?php
    require __DIR__ . '/../../includes/config.php';

    if (isset($_GET['siswa_id'])) {
        $siswa_id = $_GET['siswa_id'];

        $query = "DELETE FROM tbl_siswa WHERE id_siswa = :id_siswa";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':id_siswa', $siswa_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dihapus!'); window.location.replace('/pages/siswa/index.php');</script>";
        } else {
            echo "<script>alert('Data tidal berhasil dihapus!');</script>";
        }
    }
?>