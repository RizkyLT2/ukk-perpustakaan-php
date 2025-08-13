<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Tambah Data Kursus</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="/pages/kursus/" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama_kursus" class="form-label">Nama Kursus</label>
                        <input type="text" name="nama_kursus" class="form-control" id="nama_kursus" placeholder="Masukkan Nama kursus ">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi Kursus">
                    </div>
                    <div class="mb-3">
                        <label for="biaya" class="form-label">Biaya</label>
                        <input type="number" name="biaya" class="form-control" id="biaya">
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

            $nama_kursus = $_POST['nama_kursus'];
            $deskripsi = $_POST['deskripsi'];
            $biaya = $_POST['biaya'];

            $sql = "INSERT INTO kursus (nama_kursus, deskripsi, biaya) VALUES (:nama_kursus, :deskripsi, :biaya)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':nama_kursus', $nama_kursus);
            $stmt->bindParam(':deskripsi', $deskripsi);
            $stmt->bindParam(':biaya', $biaya);
            
            if ($stmt->execute()) {
                echo "<script>alert('Data berhasil ditambah!'); window.location.replace('/pages/kursus/index.php');</script>";
            } else {
                echo "Failed to create user.";
            }
        }
    ?>

<?php include __DIR__ . '/../../includes/footer.php'; ?>