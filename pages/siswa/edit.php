<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <?php
        
        if (isset($_GET['siswa_id'])) {
            $siswa_id = $_GET['siswa_id'];
            $query = "SELECT * FROM tbl_siswa where id_siswa = " . $siswa_id . " limit 1";
            $stmt = $pdo->query($query);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
        } 
    ?>

    <div class="card border-radius p-4">
        <!-- baris judul halaman dan tombol tambah -->
        <div class="row align-items-center">
            <div class="col">
                <h1>Edit Data Siswa</h1>
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
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="inputNama" class="form-label">Nama Siswa</label>
                        <input type="text" name="nama_siswa" value="<?= $data['nama_siswa'] ?>" class="form-control" id="inputName" placeholder="Masukkan Nama Siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputKelas" class="form-label">Kelas</label>
                        <input type="text" name="kelas" value="<?= $data['kelas'] ?>" class="form-control" id="inputKelas" placeholder="Masukkan Kelas Siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputnoinduk" class="form-label">no induk</label>
                        <input type="int" name="nomor_induk" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    </div>
                </form>

                <?php 
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nama = $_POST['nama_siswa'];
                        $kelas = $_POST['kelas'];
                        $nomor_induk = $_POST['nomor_induk'];                        

                        $query = "UPDATE tbl_siswa SET nama_siswa = :nama_siswa, kelas = :kelas";

                        $query .= " WHERE id_siswa = :id_siswa";
                        
                        $stmt = $pdo->prepare($query);
                        
                        $stmt->bindParam(':id_siswa', $siswa_id);
                        $stmt->bindParam(':nama_siswa', $nama);
                        $stmt->bindParam(':kelas', $kelas);
                        
                        if ($stmt->execute()) {
                            echo "<script>alert('Data berhasil diubah!'); window.location.replace('/pages/siswa/index.php');</script>";
                        } else {
                            echo "<script>alert('Data tidal berhasil ditambah!');</script>";
                        }
                    }
                
                ?>

            </div>
        </div>
    </div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>