<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <?php
        
        if (isset($_GET['id_kursus'])) {
            $id_kursus = $_GET['id_kursus'];
            $query = "SELECT * FROM kursus where id_kursus = " . $id_kursus . " limit 1";
            $stmt = $pdo->query($query);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
        } 
    ?>

    <div class="card border-radius p-4">
        <!-- baris judul halaman dan tombol tambah -->
        <div class="row align-items-center">
            <div class="col">
                <h1>Edit Data Kursus</h1>
            </div>
            <div class="col text-end">
                <a href="/pages/kursus/" class="btn btn-sm btn-outline-secondary"> 
                    Kembali
                </a>
            </div>
        </div>
        <!-- baris untuk tabel -->
        <div class="row mt-4">
            <div class="col">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama_kursus" class="form-label">Nama kursus</label>
                        <input type="text" name="nama_kursus" value="<?= $data['nama_kursus'] ?>" class="form-control" id="nama_kursus" placeholder="Masukkan Nama kursus" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" value="<?= $data['deskripsi'] ?>" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi kursus" required>
                    </div>
                    <div class="mb-3">
                        <label for="biaya" class="form-label">biaya</label>
                        <input type="number" name="biaya" value="<?= $data['biaya'] ?>" class="form-control" id="biaya">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    </div>
                </form>

                <?php 
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nama_kursus = $_POST['nama_kursus'];
                        $deskripsi = $_POST['deskripsi'];
                        $biaya = $_POST['biaya'];                        

                        $query = "UPDATE kursus SET nama_kursus = :nama_kursus, deskripsi = :deskripsi, biaya = :biaya";

                        $query .= " WHERE id_kursus = :id_kursus";
                        
                        $stmt = $pdo->prepare($query);
                        
                        $stmt->bindParam(':id_kursus', $id_kursus);
                        $stmt->bindParam(':nama_kursus', $nama_kursus);
                        $stmt->bindParam(':deskripsi', $deskripsi);
                        $stmt->bindParam(':biaya', $biaya);
                        
                        if ($stmt->execute()) {
                            echo "<script>alert('Data berhasil diubah!'); window.location.replace('/pages/kursus/index.php');</script>";
                        } else {
                            echo "<script>alert('Data tidal berhasil ditambah!');</script>";
                        }
                    }
                
                ?>

            </div>
        </div>
    </div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>