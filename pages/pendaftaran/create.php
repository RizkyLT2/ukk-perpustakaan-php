<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>
    <?php
        $query = "SELECT * FROM siswa";
        $stmt = $pdo->query($query);
        $dataSiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $query = "SELECT * FROM kursus";
        $stmt = $pdo->query($query);
        $dataKursus = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Tambah Data</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="/pages/pendaftaran/" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Siswa</label>
                        <select name="nama" id="nama" class="form-control">
                            <option selected disabled>-- pilih nama siswa --</option>
                            <?php foreach ($dataSiswa as $key => $data) : ?>
                                <option value="<?= $data['id_siswa'] ?>"><?= $data['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_kursus" class="form-label">Nama Kursus</label>
                        <select name="nama_kursus" id="nama_kursus" class="form-control">
                            <option selected disabled>-- Pilih Nama Kursus -- </option>
                            <?php foreach ($dataKursus as $key => $data) : ?>
                                <option value="<?= $data['id_kursus'] ?>"><?= $data['nama_kursus'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_daftar" class="form-label">Tanggal Pendaftaran</label>
                        <input type="date" name="tanggal_daftar" class="form-control" id="tanggal_daftar">
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
            $id_siswa = $_POST['nama'];
            $id_kursus = $_POST['nama_kursus'];
            $tanggal_daftar = $_POST['tanggal_daftar'];

            $sql = "INSERT INTO pendaftaran (id_siswa, id_kursus, tanggal_daftar) VALUES (:id_siswa, :id_kursus, :tanggal_daftar)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':id_siswa', $id_siswa);
            $stmt->bindParam(':id_kursus', $id_kursus);
            $stmt->bindParam(':tanggal_daftar', $tanggal_daftar);
            
            if ($stmt->execute()) {
                echo "<script>alert('Data berhasil ditambah!'); window.location.replace('/pages/pendaftaran/index.php');</script>";
            } else {
                echo "Failed to create user.";
            }
        }
    ?>

<?php include __DIR__ . '/../../includes/footer.php'; ?>