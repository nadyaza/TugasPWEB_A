<?php
include("config.php");

if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    // Proses upload gambar
    $foto_siswa_name = $_FILES['foto_siswa']['name'];
    $foto_siswa_tmp = $_FILES['foto_siswa']['tmp_name'];
    $upload_path = 'uploads/';  // Sesuaikan dengan nama folder Anda

    move_uploaded_file($foto_siswa_tmp, $upload_path . $foto_siswa_name);

    // Simpan informasi ke database
    $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto_siswa) VALUES ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$foto_siswa_name')";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: index.php?status=sukses');
    } else {
        header('Location: index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
