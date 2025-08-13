<?php include __DIR__ . '../../../includes/config.php'; ?>
<?php include __DIR__ . '../../../includes/header.php'; ?>

    <?php

    

        $query = "SELECT * FROM tbl_user";
        $stmt = $pdo->query($query);
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <div class="card border-radius p-4">
        <!-- baris judul halaman dan tombol tambah -->
        <div class="row align-items-center">
            <div class="col">
                <h1>List Data Pengguna</h1>
            </div>
            <div class="col text-end">
                <a href="create.php" class="btn btn-outline-primary"> 
                    Tambah Data Pengguna
                </a>
            </div>
        </div>
        <!-- baris untuk tabel -->
        <div class="row mt-4">
            <div class="col">
                <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
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
                                <?= $data['nama'] ?>
                            </td>
                            <td>
                                <?= $data['email'] ?>
                            </td>
                            <td class="text-center">
                                <a href="/pages/users/detail.php?user_id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-info">Detail</a>
                                <a href="/pages/users/edit.php?user_id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-warning">Ubah</a>
                                <a href="/pages/users/delete.php?user_id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <!-- End Looping Foreach -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include __DIR__ . '../../../includes/footer.php'; ?>