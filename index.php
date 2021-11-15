<?php 

require "sql.php";

session_start();

$isLoggedIn=false;

if(isset($_SESSION["username"])) {
    $isLoggedIn=true;
    $mahasiswa=$conn->query("SELECT * FROM identitas");
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>

        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    </head>
    <body>
        <main>
            <?php if($isLoggedIn) : ?>
                <button class="btn btn-success" onclick="location.href='./process/insert.php'">
                    Tambah Data
                </button>

                <?php if($mahasiswa->num_rows > 0) : ?>
                    <table class="table">
                        <thead>
                            <th scope="col">NPM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            <?php foreach($mahasiswa as $mhs) : ?>
                                <tr>
                                    <td><?= $mhs["npm"] ?></td>
                                    <td><?= $mhs["nama"] ?></td>
                                    <td><?= $mhs["alamat"] ?></td>
                                    <td><?= $mhs["tgl_lahir"] ?></td>
                                    <td><?= $mhs["jk"] ?></td>
                                    <td><?= $mhs["email"] ?></td>
                                    <td>
                                        <?php
                                        
                                        $npm=$mhs["npm"];

                                        ?>

                                        <button onclick="location.href='./process/update.php?npm=<?= $npm ?>'" class="btn btn-outline-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                            Edit
                                        </button>
                                        <button onclick="location.href='./process/delete.php?npm=<?= $npm ?>'" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>No data is available</p>

                <?php endif; ?>

                <button onclick="location.href='./logout.php'" class="btn btn-outline-warning">Logout</button>
            <?php else : ?>
                <div class="bg-danger">
                    <p class="text-light">Anda belum login, silahkan login terlebih dahulu</p>
                    <button onclick="location.href='login.php'" class="btn btn-warning">Login</button>
                </div>
            <?php endif; ?>
        </main>
        <script src="assets/bootstrap/js/bootstrap.js"></script>
    </body>
</html>