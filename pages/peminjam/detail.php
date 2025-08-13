<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <?php
        
        if (isset($_GET['peminjam_id'])) {
            $peminjam_id = $_GET['peminjam_id'];
            $query = "SELECT * FROM tbl_peminjam where id_peminjam = " . $peminjam_id . " limit 1";
            $stmt = $pdo->query($query);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $query = "SELECT * FROM tbl_siswa";
            $stmt = $pdo->query($query);
            $dataSiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $query = "SELECT * FROM tbl_buku";
            $stmt = $pdo->query($query);
            $dataBuku = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $query = "
            SELECT tbl_peminjam.*, tbl_buku.judul, tbl_siswa.nama_siswa FROM tbl_peminjam 
            join tbl_buku on tbl_peminjam.id_buku = tbl_buku.id_buku
            join tbl_siswa on tbl_peminjam.id_siswa = tbl_siswa.id_siswa
            ";
            $stmt = $pdo->query($query);
            $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } 
    ?>

    <div class="card border-radius p-4">
        <!-- baris judul halaman dan tombol tambah -->
        <div class="row align-items-center">
            <div class="col">
                <h1>Edit Data</h1>
            </div>
            <div class="col text-end">
                <a href="/pages/peminjam/" class="btn btn-sm btn-outline-secondary"> 
                    Kembali
                </a>
            </div>
        </div>
        <!-- baris untuk tabel -->
        <div class="row mt-4">
            <div class="col">
                <div class="mb-3">
                    <label for="NamaSiswa" class="form-label">Nama Siswa</label>
                    <?php foreach ($dataSiswa as $key => $data) : ?>
                        <p><?= $data['nama_siswa'] ?></p>
                    <?php endforeach; ?>
                </div>
                <div class="mb-3">
                    <label for="inputPengarang" class="form-label">Nama Buku</label>
                    <p><?= $data['judul'] ?></p>
                </div>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>