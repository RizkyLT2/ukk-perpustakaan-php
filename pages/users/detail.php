<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <?php
        
        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
            $query = "SELECT * FROM tbl_user where id = " . $user_id . " limit 1";
            $stmt = $pdo->query($query);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
        } 
    ?>

    <div class="card border-radius p-4">
        <!-- baris judul halaman dan tombol tambah -->
        <div class="row align-items-center">
            <div class="col">
                <h1>Edit Data Pengguna</h1>
            </div>
            <div class="col text-end">
                <a href="/pages/users/" class="btn btn-sm btn-outline-secondary"> 
                    Kembali
                </a>
            </div>
        </div>
        <!-- baris untuk tabel -->
        <div class="row mt-4">
            <div class="col">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Nama</label>
                    <p><?= $data['nama']?></p>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <p><?= $data['email']?></p>
                </div>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>