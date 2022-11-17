<?php
    session_start();
    require_once('../db_login.php');

    if(isset($_POST['proses'])){

    $direktori = "file_khs/";
    $file_name=$_FILES['NamaFile']['name'];
    move_uploaded_file($_FILES['NamaFile']['tmp_name'],$direktori.$file_name);

    mysqli_query($db, "INSERT INTO dokumen_khs SET FILE='$file_name'");

    echo '<script language="javascript">';
    echo 'alert("Berhasil Upload")';
    echo '</script>';
    }
    
    if(!isset($_SESSION['role'])){
        header('Location: ../index.php');
    }
    if($_SESSION['role']=='dosen'){
        header('Location: ../dosen/dashboard_dosen.php');
    } 
    if($_SESSION['role']=='departemen'){
        header('Location: ../departemen');
    }
    if($_SESSION['role']=='operator'){
        header('Location: ../operator/dashboard_op.php');
    }
    $query = "SELECT * FROM mahasiswa INNER JOIN skripsi";
    $sql_ppl= mysqli_query($db, $query) or die (mysqli_error($db));
    $data = mysqli_fetch_array ($sql_ppl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../aset/css/style.css">
    <title>Data Skripsi Mahasiswa</title>
</head>
<body>
    <div class="top">
        <div class="logo_undip">
            <img src="../aset/img/PPL/logo-undip-01.png" alt="logo-undip-01.png">
        </div>

        <div class="ddaction">
            <div class="ddprofile" onclick="menuToggle();">
                <img src="../aset/img/ppl/ayaya.jpeg" style="width:60px;height:auto; border-radius:50%;">
            </div>
            <div class="ddmenu">
                <h3><?=$data['nama']?><br><span><?=$data['prodi']?></span></h3>
                <ul>
                    <li><img src="../aset/img/ppl/edit.png" style="width:50px;height:auto;"><a href="edit_mhs.php"> Edit </a></li>
                    <li><img src="../aset/img/ppl/logout.png" style="width:50px;height:auto;"><a href="../index.php"> Logout </a></li>
                </ul>
            </div>
        </div>
        
        <div class="text">UNIVERSITAS DIPONEGORO</div>
    </div>
    <div class="bar">
        <div class="navbar">
            <a href="dashboard_mhs.php">Dashboard</a>
            <a href="irs_mhs.php">Data IRS</a>
            <a href="khs_mhs.php">Data KHS</a>
            <a href="pkl_mhs.php">PKL</a>
            <a href="skripsi_mhs.php">Skripsi</a>
            </div> 
        </div>
    </div>
    <div class="isi">
        <div class="card card-skripsi">
            <div class="text text-skripsi">Entry Skripsi
            </div>
            <div class="isi-text">
                <div>Status</div>
                <div class="form-group skripsi-form">
                    <div>
                    <input name="status" id="status" class="form-control" value="<?=$data['status_skripsi']?>"> 
                    </div>
                </div>
                <div>Tanggal Lulus Sidang</div>
                <div class="form-group skripsi-form">
                    <div>
                    <input name="tgl_lulus_sidang" id="tgl_lulus_sidang" class="form-control" value="<?=$data['tgl_lulus']?>"> 
                    </div>
                </div>
                <div>Lama Studi Semester</div>
                <div class="form-group skripsi-form">
                    <div>
                    <input name="lama_studi" id="lama_studi" class="form-control" value="<?=$data['lama_studi']?>"><br> 
                    </div>
                </div>
            </div>
            <div class="nilaiskripsi">
                Nilai Skripsi <br>
                <div class="nilaiskripsi-show"><?=$data['nilai_skripsi']?></div>
            </div>
            <!-- <div class="buttonskripsi">
                Skripsi
                <br>
                <a href="#" class="button-skripsi-mhs">Upload data Skripsi</a>
            </div> -->
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="NamaFile">
                <input type="submit" name="proses" value="Upload">
            </form>
    </div>
    <script>
        function menuToggle(){
            const toggleMenu = document.querySelector('.ddmenu');
            toggleMenu.classList.toggle('active')
        }
    </script>
</body>
</html>