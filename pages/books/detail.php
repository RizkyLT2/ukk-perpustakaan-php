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
                <h1>Edit Data Pengguna</h1>
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
                <div class="mb-3">
                    <label for="inputJudul" class="form-label">Judul</label>
                    <p><?= $data['judul']?></p>
                </div>
                <div class="mb-3">
                    <label for="inputPengarang" class="form-label">Pengarang</label>
                    <p><?= $data['pengarang']?></p>
                </div>
                <dev class="mb-3">
                    <label for="inputTahun_terbit" class="form-label">Tahun_terbit</label>
                    <p><?= $data['tahun_terbit'] ?></p>
                </dev>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>