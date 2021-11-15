<?php

require "../sql.php";

$invalid=FALSE; // Kalo ada kesalahan pada insert, ditandain sama variabel ini

if(isset($_POST["save"])) {
    if(insert($_POST) === TRUE) {
        header("Location: ../index.php");
    } else {
        $invalid=TRUE;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Data</title>
        
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/styles/form.css">
    </head>
    <body>
        <?php if($invalid) : ?>
            <div class="bg-danger">
                <p class="text-light">Invalid insert</p>
            </div>
        <?php endif; ?>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input 
                    type="text" 
                    class="form-control"
                    name="npm"
                    id="npm"
                    autocomplete="off"
                    required
                >
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input 
                    type="text" 
                    class="form-control"
                    name="nama"
                    id="nama"
                    autocomplete="off"
                    required
                >
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea 
                    name="alamat" 
                    id="alamat" 
                    rows="3" 
                    class="form-control"
                ></textarea>
            </div>
            <div class="mb-3">
                <label for="tgl-lahir" class="form-label">Tanggal Lahir</label>
                <input 
                    type="date"
                    name="tgl_lahir"
                    id="tgl-lahir"
                    class="form-control"
                >
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <div id="genders">
                    <div id="boy">
                        <input 
                            type="radio"
                            class="btn-check"
                            name="jk"
                            id="laki"
                            value="L"
                        >
                        <label for="laki" class="btn btn-outline-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
                            </svg>
                            Laki-laki
                        </label>
                    </div>
                    <div id="girl">
                        <input 
                            type="radio"
                            class="btn-check"
                            name="jk"
                            id="perempuan"
                            value="P"
                        >
                        <label for="perempuan" class="btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"/>
                            </svg>
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control"
                >
            </div>
            <div id="options">
                <button type="submit" name="save" class="btn btn-success">Save</button>
                <button onclick="location.href='../index.php'" class="btn btn-outline-warning">Back</button>
            </div>
        </form>

        <script src="../assets/bootstrap/js/bootstrap.js"></script>
    </body>
</html>