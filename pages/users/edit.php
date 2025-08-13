<?php require __DIR__ . '/../../includes/config.php'; ?>
<?php include __DIR__ . '/../../includes/header.php'; ?>

    <?php
        
        if (isset($_GET['id_user'])) {
            $id_user = $_GET['id_user'];
            $query = "SELECT * FROM users where id_user = " . $id_user . " limit 1";
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
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" id="username" placeholder="Masukkan username anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password anda">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    </div>
                </form>

                <?php 
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST['username'];
                        $password = $_POST['password'];                        

                        $query = "UPDATE users SET username = :username";

                        if ($password !== '') {
                            $query .= ", password = :password";
                        }

                        $query .= " WHERE id_user = :id_user";
                        
                        $stmt = $pdo->prepare($query);
                        
                        $stmt->bindParam(':id_user', $id_user);
                        $stmt->bindParam(':username', $username);
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