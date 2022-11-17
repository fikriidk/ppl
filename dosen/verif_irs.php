<?php
session_start();

require_once('../db_login.php');

if(!isset($_SESSION['role'])){
    header('Location: ../index.php');
}
if($_SESSION['role']=='mahasiswa'){
    header('Location: ../mahasiswa/dashboard_mhs.php');
} 
if($_SESSION['role']=='departemen'){
    header('Location: ../departemen');
}
if($_SESSION['role']=='operator'){
    header('Location: ../operator/dashboard_op.php');
} 

$query = "SELECT * FROM dosen INNER JOIN mahasiswa";
$sql_ppl= mysqli_query($db, $query) or die (mysqli_error($db));
$data = mysqli_fetch_array ($sql_ppl);

// $role=$_SESSION['role'];
// $query = "SELECT * FROM user 
//             INNER JOIN dosen ON user.role=dosen.role 
//             WHERE user.role='$role'";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../aset/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Data Mahasiswa</title>
</head>
<body>
    <div class="top">
        <div class="logo_undip">
            <img src="../aset/img/PPL/logo-undip-01.png" alt="logo-undip-01.png">
        </div>

        <div class="ddaction">
            <div class="ddprofile" onclick="menuToggle();">
                <img src="../aset/img/PPL/note.jpg" style="width:60px;height:auto; border-radius:50%;">
            </div>
            <div class="ddmenu">
                <h3><?=$data['nama']?><br><span><?=$data['prodi']?></span></h3>
                <ul>
                    <li><img src="../aset/img/ppl/logout.png" style="width:50px;height:auto;"><a href="../index.php"> Logout </a></li>
                </ul>
            </div>
        </div>

        <div class="text">UNIVERSITAS DIPONEGORO</div>
    </div>

    <div class="bar">
        <div class="navbar">
            <a href="dashboard_dosen.php">Dashboard</a>
            <a href="data_mhs.php">Data Mahasiswa</a>
            <a href="verif_irs.php">Data IRS Mahasiswa</a>
            <a href="data_pkl.php">Data PKL Mahasiswa</a>
            <a href="data_skripsi.php">Data Skripsi Mahasiswa</a>
            </div> 
        </div>
    </div>
    <div class="isi">
        <div class="bgdosen isi-bgmhs">
            <div class="search">
                SEARCH
            </div>
            <div class="isi-data-mhs">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Status IRS</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td>
                            <a href="data_mhs_in.php"><?=$data['nama']?></a>    
                        </td>
                        <td><?=$data['nim']?></td>
                        <td>-</td>
                        <td>Verifikasi</td>
                    </tr>
                </table>
                

            </div>
        </div>
    </div>

    <script>
        function menuToggle(){
            const toggleMenu = document.querySelector('.ddmenu');
            toggleMenu.classList.toggle('active')
        }
    </script>

</body>
</html>