<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../aset/css/style.css">
    <title>Dashboard Mahasiswa</title>
    <?php
    session_start();
    require_once('../db_login.php');

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
    // $role=$_SESSION['role'];
    // $query = "SELECT * FROM user 
    //             INNER JOIN mahasiswa ON user.role=mahasiswa.role 
    //             WHERE user.role='$role'";

    $query = "SELECT * FROM mahasiswa";
    $sql_ppl= $db->query($query);
    $data = $sql_ppl->fetch_array(); 
    ?>

</head>
    <body>
        <div class="top">
            <div class="logo_undip">
                <img src="../aset/img/PPL/logo-undip-01.png" alt="logo-undip-01.png">
            </div>

            <div class="ddaction">
                <div class="ddprofile" oncinputck="menuToggle();">
                    <img src="../aset/img/ppl/ayaya.jpeg" style="width:60px;height:auto; border-radius:50%;">
                </div>
                <div class="ddmenu">
                    <h3>AYAYA <br><span>Informatika S1</span></h3>
                    <ul>
                        <input><img src="../aset/img/ppl/edit.png" style="width:50px;height:auto;"><a href="edit_mhs.php"> Edit </a></input>
                        <input><img src="../aset/img/ppl/logout.png" style="width:50px;height:auto;"><a href="../index.php"> Logout </a></input>
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
        
        <div class="edit-board">
            <div class="edit-isi-text">Edit</div>
            <div class="edit-isi">
                <div class="isi-profile">
                    <img src="../aset/img/ppl/ayaya.jpeg">
                    <a href="#" class="button-edit-img">Upload</a>
                </div>
                
                <form class="isi-data" action="update-data-by-id.php" method="POST">
                    <ul hidden for="mahasiswa_id">
                        <input
                        type="text"
                        name="mahasiswa_id"
                        value="<?=$data['mahasiswa_id']?>"
                        />
                    </ul>
                     
                    <ul for="nama">Nama Lengkap
                        <small style="color: red; margin-left: 10px" name="nim"></small> 
                        <input
                        type="text"
                        name="nama"
                        value="<?=$data['nama']?>"
                        />
                    </ul>
                    <ul for="nim">NIM
                    <small style="color: red; margin-left: 10px" name="nim"></small>
                        <input
                        type="text"
                        name="nim"
                        value="<?=$data['nim']?>"
                        />
                    </ul>
                    <ul for="fakultas">Fakultas
                    <small style="color: red; margin-left: 10px" name="fakultas"></small>
                        <input
                        type="text"
                        name="fakultas"
                        value="<?=$data['fakultas']?>"
                        />
                    </ul>
                    <ul for="prodi">Prodi
                        <small style="color: red; margin-left: 10px" name="prodi"></small>
                        <input
                        type="text"
                        name="prodi"
                        value="<?=$data['prodi']?>"
                        />
                    </ul>
                    <ul for="angkatan">Angkatan
                        <small style="color: red; margin-left: 10px"></small>
                        <input
                        type="text"
                        name="angkatan"
                        value="<?=$data['angkatan']?>"
                        />
                    </ul>
                    <ul for="alamat" name="alamat">Alamat
                        <ol>
                            <input
                            type="text"
                            name="alamat"
                            value="<?=$data['alamat']?>"
                            />
                        </ol>
                    </ul> 
                    <ul for="kota" name="kota">Kabupaten/Kota
                        <ol>
                            <input
                            type="text"
                            name="kota"
                            value="<?=$data['kota']?>"
                            />
                        </ol>
                    </ul> 
                    <ul for="provinsi" name="provinsi">Provinsi
                        <ol>
                            <input
                            type="text"
                            name="provinsi"
                            value="<?=$data['provinsi']?>"
                            />
                        </ol>
                    </ul> 
                    <ul for="email" name="email">Email
                        <ol>
                            <input
                            type="text"
                            name="email"
                            value="<?=$data['email']?>"
                            />
                        </ol>
                    </ul> 
                    <ul for="no_tlp" name="no_tlp">Nomor HP
                        <ol>
                            <input
                            type="text"
                            name="no_tlp"
                            value="<?=$data['no_tlp']?>"
                            />
                        </ol>
                    </ul> 
                    
                    <button type="submit" name ="update" class="button-edit-data">Update</button>
                </form>
            </div>
        </div>  
    

        <script>
            function menuToggle(){
                const toggleMenu = document.querySelector('.ddmenu');
                toggleMenu.classinputst.toggle('active')
            }
        </script>
    </body>
</html>