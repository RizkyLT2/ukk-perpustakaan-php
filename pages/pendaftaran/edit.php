<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <?php
        
        if (isset($_GET['id_pendaftaran'])) {
            $id_pendaftaran = $_GET['id_pendaftaran'];
            $query = "SELECT * FROM pendaftaran where id_pendaftaran = " . $id_pendaftaran . " limit 1";
            $stmt = $pdo->query($query);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $query = "SELECT * FROM siswa";
            $stmt = $pdo->query($query);
            $dataSiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $query = "SELECT * FROM kursus";
            $stmt = $pdo->query($query);
            $dataKursus = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } 
    ?>

    <div class="card border-radius p-4">
        <!-- baris judul halaman dan tombol tambah -->
        <div class="row align-items-center">
            <div class="col">
                <h1>Edit Data</h1>
            </div>
            <div class="col text-end">
                <a href="/pages/pendaftaran/" class="btn btn-sm btn-outline-secondary"> 
                    Kembali
                </a>
            </div>
        </div>
        <!-- baris untuk tabel -->
        <div class="row mt-4">
            <div class="col">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Siswa</label>
                        <select name="nama" id="nama" class="form-control">
                            <?php foreach ($dataSiswa as $key => $data) : ?>
                                <option value="<?= $data['id_siswa'] ?>"><?= $data['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_kursus" class="form-label">Nama kursus</label>
                        <select name="nama_kursus" id="nama_kursus" class="form-control">
                            <?php foreach ($dataKursus as $key => $data) : ?>
                                <option value="<?= $data['id_kursus'] ?>"><?= $data['nama_kursus'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="mb-3">
                            <label for="tanggal_daftar" class="form-label">Tanggal Pendaftaran</label>
                            <input type="date" name="tanggal_daftar" class="form-control" id="tanggal_daftar">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    </div>
                </form>

                <?php 
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id_siswa = $_POST['nama'];
                    $id_kursus = $_POST['nama_kursus'];
                    $tanggal_daftar = $_POST['tanggal_daftar'];

                    $query = "UPDATE pendaftaran SET id_siswa = :id_siswa, id_kursus = :id_kursus, tanggal_daftar = :tanggal_daftar";

                    $query .= " WHERE id_pendaftaran = :id_pendaftaran";
                        
                    $stmt = $pdo->prepare($query);

                    $stmt->bindParam(':id_siswa', $id_siswa); 
                    $stmt->bindParam(':id_pendaftaran', $id_pendaftaran);
                    $stmt->bindParam(':id_kursus', $id_kursus);
                    $stmt->bindParam(':tanggal_daftar', $tanggal_daftar);
                    
                    if ($stmt->execute()) {
                        echo "<script>alert('Data berhasil ditambah!'); window.location.replace('/pages/pendaftaran/index.php');</script>";
                    } else {
                        echo "Failed to create user.";
                        }
                    }
                
                ?>

            </div>
        </div>
    </div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>