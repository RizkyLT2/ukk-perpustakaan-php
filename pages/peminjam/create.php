<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>
    <?php
        $query = "SELECT * FROM tbl_siswa";
        $stmt = $pdo->query($query);
        $dataSiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $query = "SELECT * FROM tbl_buku";
        $stmt = $pdo->query($query);
        $dataBuku = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Tambah Data Buku</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="/pages/peminjam/" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="NamaSiswa" class="form-label">Nama Siswa</label>
                        <select name="NamaSiswa" id="NamaSiswa" class="form-control">
                            <option selected disabled>-- pilih nama siswa --</option>
                            <?php foreach ($dataSiswa as $key => $data) : ?>
                                <option value="<?= $data['id_siswa'] ?>"><?= $data['nama_siswa'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="NamaBuku" class="form-label">Nama Buku</label>
                        <select name="NamaBuku" id="NamaBuku" class="form-control">
                            <option selected disabled>-- Pilih Nama Buku -- </option>
                            <?php foreach ($dataBuku as $key => $data) : ?>
                                <option value="<?= $data['id_buku'] ?>"><?= $data['judul'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="tanggalPeminjaman" class="form-label">Tanggal peminjaman</label>
                        <input type="date" name="tanggalPeminjaman" class="form-control" id="tanggalPeminjaman">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPemulangan" class="form-label">Tanggal Pemulangan</label>
                        <input type="date" name="tanggalPemulangan" class="form-control" id="tanggalPemulangan">
                    </div>
                    <div class="mb-3">
                        <label for="tahun-terbit" class="form-label">Status</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="Dipinjam" name="status" id="status">
                                <label class="form-check-label" for="status">
                                    Dipinjam
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="Dibatalkan" name="status" id="status" checked>
                                <label class="form-check-label" for="status">
                                    Dibatalkan
                                </label>
                            </div>
                        </div>
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
            $id_buku = $_POST['NamaBuku'];
            $id_siswa = $_POST['NamaSiswa'];
            $tanggal_pinjam = $_POST['tanggalPeminjaman'];
            $tanggal_pengembalian = $_POST['tanggalPemulangan'];
            $status_peminjam = $_POST['status'];

            $sql = "INSERT INTO tbl_peminjam (id_buku, id_siswa, tanggal_pinjam, tanggal_pengembalian, status) VALUES (:id_buku, :id_siswa, :tanggal_pinjam, :tanggal_pengembalian, :status_peminjam)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':id_buku', $id_buku);
            $stmt->bindParam(':id_siswa', $id_siswa);
            $stmt->bindParam(':tanggal_pinjam', $tanggal_pinjam);
            $stmt->bindParam(':tanggal_pengembalian', $tanggal_pengembalian);
            $stmt->bindParam(':status_peminjam', $status_peminjam);
            
            if ($stmt->execute()) {
                echo "<script>alert('Data berhasil ditambah!'); window.location.replace('/pages/peminjam/index.php');</script>";
            } else {
                echo "Failed to create user.";
            }
        }
    ?>

<?php include __DIR__ . '/../../includes/footer.php'; ?>