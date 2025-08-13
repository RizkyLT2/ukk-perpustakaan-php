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
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nama</label>
                        <input type="text" name="name" value="<?= $data['nama'] ?>" class="form-control" id="inputName" placeholder="Masukkan nama anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control" id="inputEmail" placeholder="Masukkan email anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Masukkan password anda">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    </div>
                </form>

                <?php 
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];                        

                        $query = "UPDATE tbl_user SET nama = :name, email = :email";

                        if ($password !== '') {
                            $query .= ", password = :password";
                        }

                        $query .= " WHERE id = :id";
                        
                        $stmt = $pdo->prepare($query);
                        
                        $stmt->bindParam(':id', $user_id);
                        $stmt->bindParam(':name', $name);
                        $stmt->bindParam(':email', $email);
                        if ($password !== '') {
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            $stmt->bindParam(':password', $hashed_password);
                        }
                        
                        if ($stmt->execute()) {
                            echo "<script>alert('Data berhasil diubah!'); window.location.replace('/pages/users/index.php');</script>";
                        } else {
                            echo "<script>alert('Data tidal berhasil ditambah!');</script>";
                        }
                    }
                
                ?>

            </div>
        </div>
    </div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>