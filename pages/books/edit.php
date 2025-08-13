<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <?php
        
        if (isset($_GET['books_id'])) {
            $books_id = $_GET['books_id'];
            $query = "SELECT * FROM tbl_buku where id_buku = " . $books_id . " limit 1";
            $stmt = $pdo->query($query);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
        } 
    ?>

    <div class="card border-radius p-4">
        <!-- baris judul halaman dan tombol tambah -->
        <div class="row align-items-center">
            <div class="col">
                <h1>Edit Data Buku</h1>
            </div>
            <div class="col text-end">
                <a href="/pages/books/" class="btn btn-sm btn-outline-secondary"> 
                    Kembali
                </a>
            </div>
        </div>
        <!-- baris untuk tabel -->
        <div class="row mt-4">
            <div class="col">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="inputJudul" class="form-label">Judul</label>
                        <input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control" id="inputName" placeholder="Masukkan judul buku" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPengarang" class="form-label">Pengarang</label>
                        <input type="text" name="pengarang" value="<?= $data['pengarang'] ?>" class="form-control" id="inputEmail" placeholder="Masukkan pengarang buku" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputtahun_terbit" class="form-label">Tahun</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    </div>
                </form>

                <?php 
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $judul = $_POST['judul'];
                        $pengarang = $_POST['pengarang'];
                        $tahun_terbit = $_POST['tahun_terbit'];                        

                        $query = "UPDATE tbl_buku SET judul = :judul, pengarang = :pengarang";

                        $query .= " WHERE id_buku = :id_buku";
                        
                        $stmt = $pdo->prepare($query);
                        
                        $stmt->bindParam(':id_buku', $books_id);
                        $stmt->bindParam(':judul', $judul);
                        $stmt->bindParam(':pengarang', $pengarang);
                        
                        if ($stmt->execute()) {
                            echo "<script>alert('Data berhasil diubah!'); window.location.replace('/pages/books/index.php');</script>";
                        } else {
                            echo "<script>alert('Data tidal berhasil ditambah!');</script>";
                        }
                    }
                
                ?>

            </div>
        </div>
    </div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>