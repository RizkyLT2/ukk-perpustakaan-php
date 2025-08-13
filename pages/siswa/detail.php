<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <?php
        
        if (isset($_GET['siswa_id'])) {
            $siswa_id = $_GET['siswa_id'];
            $query = "SELECT * FROM tbl_siswa where id_siswa = " . $siswa_id . " limit 1";
            $stmt = $pdo->query($query);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
        }
        $query = "
            SELECT tbl_peminjam.*, tbl_buku.judul, tbl_siswa.nama_siswa FROM tbl_peminjam 
            join tbl_buku on tbl_peminjam.id_buku = tbl_buku.id_buku
            join tbl_siswa on tbl_peminjam.id_siswa = tbl_siswa.id_siswa
            where tbl_peminjam.id_siswa =
        " . $_GET['siswa_id'];
        $stmt = $pdo->query($query);
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    ?>

    <div class="card border-radius p-4">
        <!-- baris judul halaman dan tombol tambah -->
        <div class="row align-items-center">
            <div class="col">
                <h1>Edit Data Pengguna</h1>
            </div>
            <div class="col text-end">
                <a href="/pages/siswa/" class="btn btn-sm btn-outline-secondary"> 
                    Kembali
                </a>
            </div>
        </div>
        <!-- baris untuk tabel -->
        <div class="row mt-4">
            <div class="col">
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama Siswa</label>
                    <p><?= $data['nama_siswa']?></p>
                </div>
                <div class="mb-3">
                    <label for="inputKelas" class="form-label">Kelas</label>
                    <p><?= $data['kelas']?></p>
                </div>
                <dev class="mb-3">
                    <label for="inputNoInduk" class="form-label">No Induk</label>
                    <p><?= $data['nomor_induk'] ?></p>
                </dev>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Judul</th>
                            <th>status</th>
                            <th>tanggal Pinjam</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Start Looping Foreach -->
                        <?php foreach ($datas as $key => $data) : ?>
                        <tr>
                            <td>
                                <?= $key + 1 ?>
                            </td>
                            <td>
                                <?= $data['nama_siswa'] ?>
                            </td>
                            <td>
                                <?= $data['judul'] ?>
                            </td>
                            <td>
                                <?= $data['status'] ?>
                            </td>
                            <td>
                                <?= $data['tanggal_pinjam'] ?>
                            </td>
                            <td class="text-center">
                                <a href="/pages/peminjam/detail.php?peminjam_id=<?= $data['id_peminjam'] ?>" class="btn btn-sm btn-outline-info">Detail</a>
                                <a href="/pages/peminjam/edit.php?peminjam_id=<?= $data['id_peminjam'] ?>" class="btn btn-sm btn-outline-warning">Ubah</a>
                                <a href="/pages/peminjam/delete.php?peminjam_id=<?= $data['id_peminjam'] ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <!-- End Looping Foreach -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>