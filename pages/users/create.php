<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Tambah Data Pengguna</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="/pages/users/" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama-pengguna" class="form-label">Nama</label>
                        <input type="name" name="name" class="form-control" id="nama-pengguna" placeholder="Masukkan nama anda">
                    </div>
                    <div class="mb-3">
                        <label for="email-pengguna" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email-pengguna" placeholder="Masukkan email anda">
                    </div>
                    <div class="mb-3">
                        <label for="password-pengguna" class="form-label">password</label>
                        <input type="password" name="password" class="form-control" id="password-pengguna" placeholder="Masukkan password anda">
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

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $created_at = date("Y-m-d H:i:s");

            // Hashing the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO tbl_user (nama, email, password) VALUES (:name, :email, :password)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            
            if ($stmt->execute()) {
                echo "<script>alert('Data berhasil ditambah!'); window.location.replace('/pages/users/index.php');</script>";
            } else {
                echo "Failed to create user.";
            }
        }
    ?>

<?php include __DIR__ . '/../../includes/footer.php'; ?>