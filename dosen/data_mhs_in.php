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

$query = "SELECT * FROM dosen";
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
    <?php
    $query = "SELECT * FROM mahasiswa";
    $sql_ppl= mysqli_query($db, $query) or die (mysqli_error($db));
    $data = mysqli_fetch_array ($sql_ppl);
    $nbsp = ', '

    ?>
    <div class="isi">
        <div class="bgdosen isi-bgmhs isi-bgmhs-in">
            <h2 style="text-align:center;padding-bottom:10px;">Data Mahasiswa</h2>
            <div class="isi-datadiri">
                <div class="isi-datadiri-foto">
                    <img src="../aset/img/ppl/ayaya.jpeg">
                </div>
                <div class="isi-datadiri-text">
                    <ul>
                        <li style="font-weight: bold;text-align:center; font-size: 18px;"><?=$data['nama']?></li>
                        <li><?=$data['nim']?></li>
                        <li><?=$data['alamat'], $nbsp, $data['kota']?></li>
                        <li><?=$data['prodi']?></li>
                        <li>Universitas Diponegoro</li>
                    </ul>
                </div>
            </div>

            <div class="isi-dataakademik">
                <div class="isi-dataakademik-smt">
                    <div class="semester semester-1">
                        Semester 1
                    </div>
                    <div class="semester semester-2">
                        Semester 2
                    </div>
                    <div class="semester semester-3">
                        Semester 3
                    </div>
                    <div class="semester semester-4">
                        Semester 4
                    </div>
                    <div class="semester semester-5">
                        Semester 5
                    </div>
                    <div class="semester semester-6">
                        Semester 6
                    </div>
                    <div class="semester semester-7">
                        Semester 7
                    </div>
                    <div class="semester semester-8">
                        Semester 8
                    </div>
                    <div class="semester semester-9">
                        Semester 9
                    </div>
                    <div class="semester semester-10">
                        Semester 10
                    </div>
                    <div class="semester semester-11">
                        Semester 11
                    </div>
                    <div class="semester semester-12">
                        Semester 12
                    </div>
                    <div class="semester semester-13">
                        Semester 13
                    </div>
                    <div class="semester semester-14">
                        Semester 14
                    </div>

                </div>
                <div class="isi-dataakademik-nilai">

                </div>
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