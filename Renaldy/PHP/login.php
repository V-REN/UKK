<?php 
  if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama_lengkap'];
    $text = $nik .",". $nama ."\n";
    $fp = fopen('config.txt', 'a+');

    if (fwrite($fp, $text)) {
      echo '<script>alert("Anda berhasil Masuk!");</script>';
    }
  }
      else if (isset($_POST['masuk'])) {
        //echo '<script>alert("berhasil");</script>';
        $data = file_get_contents("config.txt");
        $contents = explode("\n", $data);

        foreach ($contents as $values) {
          $login = explode(",", $values);
          $nik = $login[0];
          $nama = $login[1];

          if ($nik == $_POST['nik'] && $nama == $_POST['nama_lengkap']) {
            session_start();
            $_SESSION['username'] = $nama;
            header('location:home.php');
          }else{
            echo '<script>alert("gagal");</script>';
          }
        }
      }

?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="../CSS/login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<form action="" method="POST" class="login-box" >
  <h2>Login</h2>
  <table align="center" class="user-box">
    <tr>
      <td><label>nik</label><input type="text" name="nik" required></td>
    </tr>
    <tr>
      <td><label>nama</label><input type="text" name="nama_lengkap" required ></td>
    </tr>
    <tr>
      <td><input class="login" type="submit" name="daftar" value="Submit" required></td>
      <td><input class="login" type="submit" name="masuk" value="Login" required></td>
    </tr>
</table>
</form>
</body>
</html>