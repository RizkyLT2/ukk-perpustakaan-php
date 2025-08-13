<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Tambah Data Siswa</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="/pages/siswa/" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="Nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="Masukkan Nama Siswa">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang-buku" class="form-label">kelas</label>
                        <input type="text" name="kelas" class="form-control" id="kelas-siswa" placeholder="Masukkan kelas siswa">
                    </div>
                    <div class="mb-3">
                        <label for="nomor_induk" class="form-label">No Induk</label>
                        <input type="int" name="nomor_induk" class="form-control" id="nomor_induk">
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

            $nama = $_POST['nama_siswa'];
            $kelas = $_POST['kelas'];
            $nomor_induk = $_POST['nomor_induk'];

            $sql = "INSERT INTO tbl_siswa (nama_siswa, kelas, nomor_induk) VALUES (:nama_siswa, :kelas, :nomor_induk)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':nama_siswa', $nama);
            $stmt->bindParam(':kelas', $kelas);
            $stmt->bindParam(':nomor_induk', $nomor_induk);
            
            if ($stmt->execute()) {
                echo "<script>alert('Data berhasil ditambah!'); window.location.replace('/pages/siswa/index.php');</script>";
            } else {
                echo "Failed to create user.";
            }
        }
    ?>

<?php include __DIR__ . '/../../includes/footer.php'; ?>