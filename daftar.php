<?php
include 'koneksi.php';

// Mendefinisikan endpoint untuk insert
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari request body
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Mengenkripsi password menggunakan MD5
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $umur = $_POST['umur'];

    // Query untuk melakukan insert ke tabel
    $query = "INSERT INTO siswa (nis, nama, username, password, tempat_lahir, tanggal_lahir, umur) VALUES ('$nis', '$nama', '$username', '$password', '$tempat_lahir', '$tanggal_lahir', '$umur')";

    if (mysqli_query($connection, $query)) {
        // Insert berhasil
        $response['status'] = 'success';
        $response['message'] = 'Data berhasil ditambahkan.';
        echo json_encode($response);
    } else {
        // Insert gagal
        $response['status'] = 'error';
        $response['message'] = 'Gagal menambahkan data: ' . mysqli_error($connection);
        echo json_encode($response);
    }
}

// Menutup koneksi database
mysqli_close($connection);
?>
