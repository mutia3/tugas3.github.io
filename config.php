    <?php
    $host = "localhost";
    $username = "nama_pengguna";
    $password = "";
    $database = "wisata";

    // Membuat koneksi
    $conn = mysqli_connect($host, $username, $password, $database);

    // Memeriksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    ?>
    
