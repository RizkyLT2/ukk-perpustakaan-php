<?php
    require __DIR__ . '/../../includes/config.php';

    if (isset($_GET['books_id'])) {
        $books_id = $_GET['books_id'];

        $query = "DELETE FROM tbl_buku WHERE id_buku = :id_buku";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':id_buku', $books_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dihapus!'); window.location.replace('/pages/books/index.php');</script>";
        } else {
            echo "<script>alert('Data tidal berhasil dihapus!');</script>";
        }
    }
?>