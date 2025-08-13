<?php require __DIR__ . '/../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Project</title>
        <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/style.css" rel="stylesheet">
    </head>
    <body class="d-flex align-items-center py-4">
        
        <main class="form-signin w-100 m-auto">
            <div class="container">
                <div class="d-flex jusify-content-center">
                    <img class="mb-4 mx-auto text-center" src="/assets/img/kitakale-vertikal-logo.png" alt="" width="200">
                </div>
                <div class="card p-4">
                    <form action="" method="post">
                        <h1 class="h3 mb-3 fw-normal">Silahkan Login!</h1>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                        <p class="mt-5 mb-3 text-body-secondary text-center">© 2024 - copyright of kitakale</p>
                    </form>
                </div>
            </div>
        </main>

        <?php

            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM tbl_user WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['nama'] = $user['nama'];
                    echo "<script>alert('Berhasil masuk!'); window.location.replace('/index.php');</script>";
                    // Redirect to the dashboard or home page
                } else {
                    echo "<script>alert('Invalid email or password.')</script>";
                }
            }
        ?>

    </body>
</html>