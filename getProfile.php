<?php
include 'koneksi.php';

// Mendefinisikan endpoint untuk getProfile
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $username = $_GET['username'];

    // Query untuk mendapatkan profil pengguna berdasarkan username
    $query = "SELECT * FROM siswa WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Mengisi data profil pengguna ke dalam array response
        $response['status'] = 'success';
        $response['message'] = 'Profil ditemukan.';
        $response['data']['nis'] = $row['nis'];
        $response['data']['nama'] = $row['nama'];
        $response['data']['tempat_lahir'] = $row['tempat_lahir'];
        $response['data']['tanggal_lahir'] = $row['tanggal_lahir'];
        $response['data']['umur'] = $row['umur'];

        echo json_encode($response);
    } else {
        // Profil tidak ditemukan
        $response['status'] = 'error';
        $response['message'] = 'Profil tidak ditemukan.';
        echo json_encode($response);
    }
}

// Menutup koneksi database
mysqli_close($connection);
?>
