<?php include __DIR__ . '../../../includes/config.php'; ?>
<?php include __DIR__ . '../../../includes/header.php'; ?>

    <?php

    

        $query = "SELECT * FROM siswa";
        $stmt = $pdo->query($query);
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <div class="card border-radius p-4">
        <!-- baris judul halaman dan tombol tambah -->
        <div class="row align-items-center">
            <div class="col">
                <h1>List Data Siswa</h1>
            </div>
            <div class="col text-end">
                <a href="/pages/siswa/create.php" class="btn btn-outline-primary"> 
                    Tambah Data Siswa
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
                            <th>No Hp</th>
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
                            <td>
                                <?= $data['no_hp'] ?>
                            </td>
                            <td class="text-center">
                                <a href="/pages/siswa/edit.php?id_siswa=<?= $data['id_siswa'] ?>" class="btn btn-sm btn-outline-warning">Ubah</a>
                                <a href="/pages/siswa/delete.php?id_siswa=<?= $data['id_siswa'] ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
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