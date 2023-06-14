<?php
include 'koneksi.php';

// Mendefinisikan endpoint untuk login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Mengenkripsi password menggunakan MD5

    $query = "SELECT * FROM siswa WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // Login berhasil
        $response['status'] = 'success';
        $response['message'] = 'Login berhasil.';
        echo json_encode($response);
    } else {
        // Login gagal
        $response['status'] = 'error';
        $response['message'] = 'Username atau password salah.';
        echo json_encode($response);
    }
}

// Menutup koneksi database
mysqli_close($connection);
?>
