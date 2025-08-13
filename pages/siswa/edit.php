<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <?php
        
        if (isset($_GET['id_siswa'])) {
            $id_siswa = $_GET['id_siswa'];
            $query = "SELECT * FROM siswa where id_siswa = " . $id_siswa . " limit 1";
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
                        <label for="nama" class="form-label">Nama Siswa</label>
                        <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" id="nama" placeholder="Masukkan Nama Siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" value="<?= $data['email'] ?>" class="form-control" id="email" placeholder="Masukkan Email Siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">no Hp</label>
                        <input type="number" name="no_hp" value="<?= $data['no_hp'] ?>" class="form-control" id="no_hp">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    </div>
                </form>

                <?php 
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $no_hp = $_POST['no_hp'];                        

                        $query = "UPDATE siswa SET nama = :nama, email = :email, no_hp = :no_hp";

                        $query .= " WHERE id_siswa = :id_siswa";
                        
                        $stmt = $pdo->prepare($query);
                        
                        $stmt->bindParam(':id_siswa', $id_siswa);
                        $stmt->bindParam(':nama', $nama);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':no_hp', $no_hp);
                        
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