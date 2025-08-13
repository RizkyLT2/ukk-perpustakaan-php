<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Tambah Data Buku</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="/pages/books/" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="judul-buku" class="form-label">judul</label>
                        <input type="text" name="judul" class="form-control" id="judul-buku" placeholder="Masukkan judul buku">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang-buku" class="form-label">Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" id="pengarang-buku" placeholder="Masukkan pengarang buku">
                    </div>
                    <div class="mb-3">
                        <label for="tahun-terbit" class="form-label">Tahun Terbit</label>
                        <input type="date" name="tahun-terbit" class="form-control" id="tahun-terbit">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            date_default_timezone_set('Asia/Jakarta');

            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            $tahun_terbit = $_POST['tahun_terbit'];

            $sql = "INSERT INTO tbl_buku (judul, pengarang, tahun_terbit) VALUES (:judul, :pengarang, :tahun_terbit)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':judul', $judul);
            $stmt->bindParam(':pengarang', $pengarang);
            $stmt->bindParam(':tahun_terbit', $tahun_terbit);
            
            if ($stmt->execute()) {
                echo "<script>alert('Data berhasil ditambah!'); window.location.replace('/pages/books/index.php');</script>";
            } else {
                echo "Failed to create user.";
            }
        }
    ?>

<?php include __DIR__ . '/../../includes/footer.php'; ?>