<?php
    require __DIR__ . '/../../includes/config.php';

    if (isset($_GET['id_kursus'])) {
        $id_kursus = $_GET['id_kursus'];

        $query = "DELETE FROM kursus WHERE id_kursus = :id_kursus";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':id_kursus', $id_kursus);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dihapus!'); window.location.replace('/pages/kursus/index.php');</script>";
        } else {
            echo "<script>alert('Data tidal berhasil dihapus!');</script>";
        }
    }
?>