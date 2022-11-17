<?php
session_start();

if(!isset($_SESSION['role'])){
    header('Location: ../index.php');
}
if($_SESSION['role']=='mahasiswa'){
    header('Location: ../mahasiswa/dashboard_mhs.php');
} 
if($_SESSION['role']=='dosen'){
    header('Location: ../dosen/dashboard_dosen.php');
}
if($_SESSION['role']=='operator'){
    header('Location: ../operator/dashboard_op.php');
} 

require_once('../db_login.php');
$role=$_SESSION['role'];
$query = "SELECT * FROM user 
            INNER JOIN departemen ON user.role=departemen.role 
            WHERE user.role='$role'";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../aset/css/style5.css">
    <title>Dashboard Mahasiswa</title>
</head>
<body>
    <div class="top">
        <div class="logo_undip">
            <img src="../aset/img/PPL/logo-undip-01.png" alt="logo-undip-01.png">
        </div>
        <div class="logo_profile">
            <img src="../aset/img/PPL/bg remove/logo profile bg remove.png" alt="profile">
        </div>
        <div class="logout">
            <a href="../index.php">Logout</a>
        </div>
        <div class="judul" style="text-align: center">DATA OPERATOR <br> DEPARTEMEN INFORMATIKA</div>
    </div>
    <div class="sum">
        <div class="sumTenaga">
            <div class="sumTenaga-img">
                <img src="../aset/img/PPL/bg remove/logo_orang-removebg-preview.png" alt="logo_orang-removebg-preview.png.png">
                <div class="sumTenagaPendidik">
                    <p>Jumlah Tenaga Pendidik</p>
                </div>
                <div class="sumTenagaPendidik2">
                    <p>25</p>
                </div>
            </div>
            <div class="sumTenaga2">
                <img src="../aset/img/PPL/bg remove/logo_orang_rame-removebg-preview.png" alt="logo_orang_rame-removebg-preview.png">
                <div class="sumJumlahMhs">
                    <p>Jumlah Mahasiswa</p>
                </div>
                <div class="sumJumlahMhs2">
                    <p>2300</p>
                </div>
            </div>
            <div class="sumTenaga3">
                <img src="../aset/img/PPL/bg remove/png-transparent-black-square-academic-cap-art-computer-icons-square-academic-cap-graduation-ceremony-graduated-angle-hat-graduate-university-removebg-preview.png" style="max-width: 100px;max-height: 100px;">
                <div class="sumJumlahMhs">
                    <p>Jumlah Alumni</p>
                </div>
                <div class="sumJumlahMhs2">
                    <p>245</p>
                </div>
            </div>
            <div class="sumTenaga4">
                <img src="../aset/img/PPL/bg remove/logo_kalender-removebg-preview.png" style="max-width: 100px;max-height: auto;">
                <div class="sumJumlahMhs">
                    <p>Tahun Akademik</p>
                </div>
                <div class="sumJumlahMhs2">
                    <p>2020/Ganjil</p>
                </div>
            </div>
            <div class="isian">
                <div class="dosen">
                    <img src="../aset/img/PPL/bg remove/logo_data_2-removebg-preview.png" alt="logo_dosen-removebg-preview.png">
                    <p align="center" class="datadosen">Data Akademik</p>
                </div>
                <div class="mhs">
                    <img src="../aset/img/PPL/bg remove/logo_orang_rame-removebg-preview.png" alt="logo_orang_rame-removebg-preview.png">
                    <p align="center" class="datamhs">Data Pengguna</p>
                </div>
                <div class="nilai">
                    <img src="../aset/img/PPL/bg remove/logo archive data.png" alt="logo_stack_data-removebg-preview.png"
                    style="max-width: 100px;max-height: 100px;">
                    <p align="center" class="rekapnilai">Master Data</p>
                </div>
            </div>
        </div>
    </div>
    <div class="botom-line"></div>
</body>
</html>



