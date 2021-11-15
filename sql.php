<?php

$server="localhost";
$username="root";
$password="";
$database="db_mahasiswa"; // Ganti sesuai dengan nama database

$conn=new mysqli($server, $username, $password, $database);

if($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

/**
 * insert
 * Fungsi untuk memasukkan data ke dalam tabel
 * Dalam kasus ini ada database mahasiswa dengan tabel identitas
 * 
 * @param data
 * Data yang bakalan diupdate pada tabel
 * isi sesuai dengan kolom tabel yang ingin dimasukkan
 */
function insert($data) {
    global $conn;

    $npm=htmlspecialchars($data["npm"]);
    $nama=htmlspecialchars($data["nama"]);
    $alamat=htmlspecialchars($data["alamat"]);
    $tgl_lahir=$data["tgl_lahir"];
    $jk=$data["jk"];
    $email=$data["email"];

    $query="INSERT INTO identitas(npm,nama,alamat,tgl_lahir,jk,email) 
            VALUES ('$npm','$nama','$alamat','$tgl_lahir','$jk','$email');";

    return $conn->query($query);
}

/**
 * update
 * Fungsi untuk mengubah data yang sudah ada pada tabel
 * 
 * @param id 
 * Primary key yang ingin diubah datanya
 * 
 * @param data
 * Data yang bakalan diupdate pada tabel
 */
function update($id,$data) {
    global $conn;

    $npm=htmlspecialchars($data["npm"]);
    $nama=htmlspecialchars($data["nama"]);
    $alamat=htmlspecialchars($data["alamat"]);
    $tgl_lahir=$data["tgl_lahir"];
    $jk=$data["jk"];
    $email=$data["email"];

    $query="UPDATE identitas SET 
                npm='$npm',
                nama='$nama',
                alamat='$alamat',
                tgl_lahir='$tgl_lahir',
                jk='$jk',
                email='$email'
            WHERE npm='$id';";
            
    return $conn->query($query);
}

/**
 * delete
 * Fungsi untuk menghapus data yang sudah ada pada tabel
 * 
 * @param id
 * Primary key yang ingin dihapus pada database
 */
function delete($id) {
    global $conn;

    $query="DELETE FROM identitas WHERE npm='$id'";
    return $conn->query($query);
}

?>