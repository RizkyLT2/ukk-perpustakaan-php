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
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="inputNamaSiswa" class="form-label">Nama Siswa</label>
                        <select name="NamaSiswa" id="NamaSiswa" class="form-control">
                            <?php foreach ($dataSiswa as $key => $data) : ?>
                                <option value="<?= $data['id_siswa'] ?>"><?= $data['nama_siswa'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputJudul" class="form-label">Judul Buku</label>
                        <select name="NamaBuku" id="NamaBuku" class="form-control">
                            <?php foreach ($dataBuku as $key => $data) : ?>
                                <option value="<?= $data['id_buku'] ?>"><?= $data['judul'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="mb-3">
                            <label for="tanggalPeminjaman" class="form-label">Tanggal peminjaman</label>
                            <input type="date" name="tanggalPeminjaman" class="form-control" id="tanggalPeminjaman">
                        </div>
                        <div class="mb-3">
                            <label for="tanggalPemulangan" class="form-label">Tanggal Pemulangan</label>
                            <input type="date" name="tanggalPemulangan" class="form-control" id="tanggalPemulangan">
                        </div>
                    <div class="mb-3">
                        <label for="inputStatus" class="form-label">status</label>
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
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    </div>
                </form>

                <?php 
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id_buku = $_POST['NamaBuku'];
                    $id_siswa = $_POST['NamaSiswa'];
                    $tanggal_pinjam = $_POST['tanggalPeminjaman'];
                    $tanggal_pengembalian = $_POST['tanggalPemulangan'];
                    $status_peminjam = $_POST['status'];

                    $query = "UPDATE tbl_peminjam SET id_buku = :id_buku, id_siswa = :id_siswa, tanggal_pinjam = :tanggal_pinjam, tanggal_pengembalian = :tanggal_pengembalian, status = :status_peminjam";

                    $query .= " WHERE id_peminjam = :id_peminjam";
                        
                    $stmt = $pdo->prepare($query);

                    $stmt->bindParam(':id_buku', $id_buku); 
                    $stmt->bindParam(':id_peminjam', $peminjam_id);
                    $stmt->bindParam(':id_siswa', $id_siswa);
                    $stmt->bindParam(':tanggal_pinjam', $tanggal_pinjam);
                    $stmt->bindParam(':tanggal_pengembalian', $tanggal_pengembalian);
                    $stmt->bindParam(':status_peminjam', $status_peminjam);
                    
                    var_dump ($id_buku, $id_siswa, $tanggal_pinjam, $tanggal_pengembalian, $status_peminjam);
                    if ($stmt->execute()) {
                        echo "<script>alert('Data berhasil ditambah!'); window.location.replace('/pages/peminjam/index.php');</script>";
                    } else {
                        echo "Failed to create user.";
                        }
                    }
                
                ?>

            </div>
        </div>
    </div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>