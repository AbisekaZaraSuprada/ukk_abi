    <?php
    session_start();
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);  


    $sql = mysqli_prepare($koneksi, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($sql, "ss", $username, $password); 
    mysqli_stmt_execute($sql);
    $result = mysqli_stmt_get_result($sql);

    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $data = mysqli_fetch_array($result);


        $_SESSION['username'] = $data['username'];
        $_SESSION['userid'] = $data['userid'];
        $_SESSION['status'] = 'login';


        session_regenerate_id();

        echo "<script>
            alert('Login berhasil');
            location.href='../admin/index.php';
        </script>";
    } else {
        echo "<script>
            alert('Username atau Password salah!');
            location.href='../login.php';
        </script>";
    }

    mysqli_stmt_close($sql);
    ?>
